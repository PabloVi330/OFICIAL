<?php
require_once '../models/ComprasModels.php';
require_once '../models/ArticulosModels.php';

class ComprasController
{
    private $comprasModel;
    private $articulo;

    public function __construct()
    {
        $this->comprasModel = new ComprasModel();
        $this->articulo = new ArticuloModel();
    }



    //NOTE - METODOS  FIJOS
    public function crearCompra()
    {
        //echo '<pre>';print_r($_POST);echo '</pre>';
        $crearCompra = $this->comprasModel->crearCompra($_POST);
        $fkIdSucursal = $_POST['fk_id_sucursal'];
        if ($crearCompra == "ok") {
           // echo 'creo la compra';
            $detalle = json_decode($_POST['detalle_C']);
            for ($i = 0; $i < count($detalle); $i++) {

                $stock = $detalle[$i]->cantidad * $detalle[$i]->cantidad_compra;
                $precio = $detalle[$i]->precio_neto;
                $id = $detalle[$i]->id;
                $codigo = $detalle[$i]->codigo;
                $precio_distribucion = $detalle[$i]->precio_distribucion;
                $precio_tecnico = $detalle[$i]->precio_tecnico;
                $precio_publico = $detalle[$i]->precio_publico;
                $codigo = $detalle[$i]->codigo;
                $actualizarProducto = $this->articulo->editarArticuloCompra($stock, $precio, $codigo,  $fkIdSucursal);
                if ($actualizarProducto == "ok") {
                    //echo 'sumo al stock';
                    $actualizarPrecio = $this->articulo->editarArticuloCompraPrecioVenta($precio, $precio_distribucion, $precio_tecnico, $precio_publico, $codigo);
                    if ($actualizarPrecio == "ok") {
                       // echo 'cambio loas precioas';
                    }
                }
            }
            echo json_encode($crearCompra);
        } else {
            echo json_encode($crearCompra);
        }
    }





    //TODO -  METOD0S DE LLAMADAS A COMPRAS
    public function obtenerCompras()
    {
        $response = $this->comprasModel->obtenerCompras();
        echo json_encode($response);
    }

    public function obtenerComprasPorId($id)
    {
        $response = $this->comprasModel->obtenerCompraPorId($id);
        echo json_encode($response);
    }

    public function eliminarCompra()
    {
        $compra = $this->comprasModel->obtenerCompraPorId($_POST['id_compra']);
        $detalle_C = json_decode($compra['detalle_C'], true);
        $eliminarCompra = $this->comprasModel->eliminarCompra($_POST['id_compra']);
        if ($eliminarCompra) {
            for ($i = 0; $i < count($detalle_C); $i++) {
                $total =  $detalle_C[$i]['cantidad'] *  $detalle_C[$i]['cantidad1'];
                $reducirStock = $this->articulo->reducirStock($detalle_C[$i]['id'], $total);
                if ($reducirStock) {
                    echo json_encode($reducirStock);
                }
            }
        }
    }
}



$controller = new ComprasController();

if (isset($_GET['action']) && $_GET['action'] == 'crearCompra') {
    $controller->crearCompra();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerCompras') {
    $controller->obtenerCompras();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarCompra') {
    $controller->eliminarCompra();
}
