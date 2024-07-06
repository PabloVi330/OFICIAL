<?php
require_once('db_conection.php');
session_start();
class VentaModel
{

    private $conn;

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }

    public  function crearVenta($data)
    {

        try {
            $fechaDeseada = date("Y-m-d");

            $query = "INSERT INTO ventas (id_zona, id_ruta, id_cliente, id_vendedor, productos, impuesto, neto, total, estado) VALUES (:id_zona, :id_ruta, :id_cliente, :id_vendedor, :productos,  :impuesto, :neto, :total, :estado) ";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_zona', $_SESSION['zona_U'], PDO::PARAM_STR);
            $stmt->bindParam(':id_ruta', $_SESSION['ruta_U'], PDO::PARAM_STR);
            $stmt->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
            $stmt->bindParam(':id_vendedor', $_SESSION['id_usuario'], PDO::PARAM_INT);
            $stmt->bindParam(':productos', $data['detalle_V'], PDO::PARAM_STR);
            $stmt->bindParam(':impuesto', $data['ganancia_V'], PDO::PARAM_STR);
            $stmt->bindParam(':neto', $data['neto_V'], PDO::PARAM_STR);
            $stmt->bindParam(':total', $data['importe_V'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $data['estado_V'], PDO::PARAM_STR);
            $stmt->execute();

            return  "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }





    public function obtenerVentas()
    {

        try {
            $query = "SELECT 
            ventas.*,
            clientes.nombre AS nombre_cliente,
            usuarios.nombre AS nombre_vendedor
        FROM 
            ventas 
        INNER JOIN 
            clientes ON ventas.id_cliente = clientes.id
        INNER JOIN 
            usuarios ON ventas.id_vendedor = usuarios.id
        WHERE 
            YEAR(ventas.fecha) = YEAR(CURDATE()) AND MONTH(ventas.fecha) = MONTH(CURDATE());";

            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function eliminarVenta($id_venta)
    {
        try {
            $query = 'DELETE FROM ventas WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_venta);

            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
           return $e->getMessage();
        }
    }


    public function imprimirVenta($id_venta)
    {
        try {
            $sql = "UPDATE ventas SET impreso_V = impreso_V + 1 WHERE id_venta = :id_venta";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_venta', $id_venta);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Error al incrementar el valor de impreso_E: " . $e->getMessage();
        }
    }


    public function obtenerVentasPorId($id_venta)
    {
        try {
            $query = "SELECT 
                            v.*,
                            u.nombre AS nombre_usuario,
                            c.nombre AS nombre_cliente
                        FROM 
                            ventas AS v
                        LEFT JOIN  
                            usuarios AS u ON v.id_vendedor = u.id 
                        LEFT JOIN 
                            clientes AS c ON v.id_cliente = c.id
                        WHERE v.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_venta);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error de la base de datos
            return $e->getMessage();
        }
    }

    public function obtenerVentasPorFecha($fecha)
    {
        try {
            $query = "SELECT 
                            ventas.*, 
                            clientes.nombre AS nombre_cliente, 
                            usuarios.nombre AS nombre_vendedor 
                        FROM 
                            ventas 
                        INNER JOIN 
                            clientes ON ventas.id_cliente = clientes.id 
                        INNER JOIN 
                            usuarios ON ventas.id_vendedor = usuarios.id 
                        WHERE 
                            DATE(ventas.fecha) = '$fecha';
                        ";

            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function obtenerVentasPorRangoFecha($fechaInicio, $fechaFin)
    {
        try {
            $query = "SELECT 
                            ventas.*, 
                            clientes.nombre AS nombre_cliente, 
                            usuarios.nombre AS nombre_vendedor 
                        FROM 
                            ventas 
                        INNER JOIN 
                            clientes ON ventas.id_cliente = clientes.id 
                        INNER JOIN 
                            usuarios ON ventas.id_vendedor = usuarios.id 
                        WHERE 
                            DATE(ventas.fecha) BETWEEN '$fechaInicio' AND '$fechaFin';
        
                        ";

            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function obtenerVentasPorCore($query)
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }



    public function pagarCredito($id_venta, $monto_V)
    {
        try {
            $sql = "UPDATE ventas SET monto_V = :monto_V WHERE id_venta = :id_venta";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':monto_V', $monto_V);
            $stmt->bindParam(':id_venta', $id_venta);
            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return "Error al incrementar el valor de impreso_E: " . $e->getMessage();
        }
    }

    public function confirmarTransferencia($id_venta)
    {
        try {
            $sql = "UPDATE ventas SET verificado_V = 'SI' WHERE id_venta = :id_venta";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_venta', $id_venta);
            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return "Error al incrementar el valor de impreso_E: " . $e->getMessage();
        }
    }
}
