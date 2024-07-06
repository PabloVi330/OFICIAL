<?php

require_once('../models/VentasModels.php');
require_once('../models/ProductosModels.php');
require_once('../models/db_conection.php');

class VentaController
{
   private $db;
   private $venta;
   private $producto;
   public function __construct()
   {
      $this->venta = new VentaModel();
      $this->producto = new ProductoModel();
      $this->db = DBConnection::getInstance();
   }

   public function crearVenta()
   {
      // echo '<pre>';
      // print_r($_POST);
      // echo '</pre>';

      $detalle_V = json_decode($_POST['detalle_V'], true);
      $importe_V = floatval($_POST['importe_V']);
      $efectivo_V = $_POST['efectivo_V'];
      $neto_V = floatval($_POST['neto_V']);
      $_POST['estado_V'] = 'pedido';
      $_POST['ganancia_V'] =  $importe_V - $neto_V;
      $_POST['ss'] = 2;
      $arrayInsertados = [];
      $transactionStarted = false;
      $pos = 0;
      $stockDB = 0;
      try {
         $this->db->beginTransaction();
         $transactionStarted = true;

         for ($i = 0; $i < count($detalle_V); $i++) {
            $idArticulo = $detalle_V[$i]['id'];
            $cantidadVenta = $detalle_V[$i]['cantidad'];

            // Verificar stock disponible
            $productoPorId = $this->producto->obtenerProductoPorID($idArticulo);
            $stock = $productoPorId['stock'];

            if ($stock >= $cantidadVenta) {
               // Reducir stock
               $reducirStock = $this->producto->reducirStock($idArticulo, $cantidadVenta);
               $arrayInsertados[] = $detalle_V[$i];
            } else {
               $pos = $i;
               $stockDB = $stock;
               $detalle_V[$i]['stock_db'] = $stock;
               echo json_encode($detalle_V[$i]);
            }
         }

         $crearVenta = $this->venta->crearVenta($_POST);
         echo json_encode($crearVenta);
         $this->db->commit();
      } catch (Exception $e) {
         if ($transactionStarted) {
            $this->db->rollBack();
            $hola = 0;
            foreach ($arrayInsertados as $detalle) {
               $hola ++;
               $idArticulo = $detalle['id'];
               $cantidadVenta = $detalle['cantidad'];
               // Restaurar el stock
               $stmt = $this->db->prepare("UPDATE productos SET stock = stock + :cantidad WHERE id = :id");
               $stmt->execute(['cantidad' => $cantidadVenta, 'id' => $idArticulo]);
               echo json_encode($detalle);
            }
         }
         echo "Error en la venta: " . $e->getMessage();
      }
   }


   public function eliminarVenta()
   {
      $venta = $this->venta->obtenerVentasPorId($_POST['id_venta']);
      $detalle_V = json_decode($venta['productos'], true);
      $eliminarVenta = $this->venta->eliminarVenta($_POST['id_venta']);
      if ($eliminarVenta == "ok") {
         for ($i = 0; $i < count($detalle_V); $i++) {
            $reducirStock = $this->producto->sumarStockAlEliminar($detalle_V[$i]['id'], $detalle_V[$i]['cantidad']);
            if ($reducirStock) {
               //echo json_encode($reducirStock);
            }
         }
         echo json_encode($eliminarVenta);
      }
   }

   public function obtenerVentas()
   {
      //print_r($_GET);
      if (isset($_GET['date'])) {
         $fecha = $_GET['date'];
         $dates = explode(' to ', $fecha);

         if (count($dates) !== 2) {

            $ventas = $this->venta->obtenerVentasPorFecha($fecha);
         } else {
            $startDate = $dates[0];
            $endDate = $dates[1];
            $ventas = $this->venta->obtenerVentasPorRangoFecha($startDate, $endDate);
         }

         echo json_encode($ventas);
      } else {
         $ventas = $this->venta->obtenerVentas();
         echo json_encode($ventas);
      }
   }

   public function obtenerVentasPorId()
   {

      $ventas = $this->venta->obtenerVentasPorId($_POST['id_venta']);
      echo json_encode($ventas);
   }

   public function obtenerVentasPorFecha()
   {


      $fecha = trim($_GET['date']);
      echo $fecha;

      $response = $this->venta->obtenerVentasPorFecha($fecha);
      echo json_encode($response);
   }
   public function obtenerVentasPorCore()
   {
      $venta = $this->venta->obtenerVentasPorCore($_POST['sql']);
      echo json_encode($venta);
   }
   public function pagarCredito()
   {
      $venta = $this->venta->pagarCredito($_POST['id_venta'], $_POST['monto_V']);
      echo json_encode($venta);
   }
   public function confirmarTransferencia()
   {
      $venta = $this->venta->confirmarTransferencia($_POST['id_venta']);
      echo json_encode($venta);
   }
}

$controller = new VentaController();

if (isset($_GET['action']) && $_GET['action'] == 'crearVenta') {
   $controller->crearVenta();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarVenta') {
   $controller->eliminarVenta();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerVentas') {
   $controller->obtenerVentas();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerVentasPorId') {
   $controller->obtenerVentasPorId();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerVentasPorFecha') {
   $controller->obtenerVentasPorFecha();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerVentasPorCore') {
   $controller->obtenerVentasPorCore();
}
if (isset($_GET['action']) && $_GET['action'] == 'pagarCredito') {
   $controller->pagarCredito();
}
if (isset($_GET['action']) && $_GET['action'] == 'confirmarTransferencia') {
   $controller->confirmarTransferencia();
}
