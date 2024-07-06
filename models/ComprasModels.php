<?php
session_start();

require_once 'db_conection.php';

class ComprasModel
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }



 
    public function obtenerCompras()
    {

        if ($_SESSION['area_U'] == 'administrador' && $_SESSION['tipo_U'] == 1) {
            try {
                $query = "SELECT 
                            c.*,
                            s.nombreS AS nombre_sucursal,
                            u.nombre_U AS nombre_usuario,
                            pro.nombre_Pro AS nombre_proveedor
                          FROM 
                              compras AS c
                          LEFT JOIN  
                              sucursal AS s ON c.fk_id_sucursal = s.id_sucursal
                          LEFT JOIN  
                              usuario AS u ON c.fk_id_usuario = u.id_usuario
                            LEFT JOIN  
                              proveedores AS pro ON c.proveedor_C = pro.id_proveedor
                           ORDER BY c.id_compra DESC";
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        } else {
            try {
               $usuario = $_SESSION['id_usuario'];
                    $query = "SELECT 
                                c.*,
                                s.nombreS AS nombre_sucursal,
                                u.nombre_U AS nombre_usuario,
                                pro.nombre_Pro AS nombre_proveedor
                              FROM 
                                compras AS c
                              LEFT JOIN  
                                sucursal AS s ON c.fk_id_sucursal = s.id_sucursal
                              LEFT JOIN  
                                usuario AS u ON c.fk_id_usuario = u.id_usuario
                              LEFT JOIN  
                                proveedores AS pro ON c.proveedor_C = pro.id_proveedor
                              WHERE  
                                c.fk_id_usuario =  $usuario";
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

    public function obtenerCompraPorId($id_compra)
    {
        try {
            $query = "SELECT 
                            c.*,
                            s.nombreS AS nombre_sucursal,
                            u.nombre_U AS nombre_usuario
                        FROM 
                            compras AS c
                        LEFT JOIN  
                            sucursal AS s ON c.fk_id_sucursal = s.id_sucursal
                        LEFT JOIN  
                            usuario AS u ON c.fk_id_usuario = u.id_usuario 
                        WHERE id_compra = :id_compra";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_compra', $id_compra);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error de la base de datos
            return false;
        }
    }



    public function imprimirCompras($id_compra)
	{
		try {
			$sql = "UPDATE compras SET impreso_C = impreso_C + 1 WHERE id_compra = :id_compra";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':id_compra', $id_compra);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return "Error al incrementar el valor de impreso_E: " . $e->getMessage();
		}
	}



    public function crearCompra($data)
    {
        
        try {
            $query = "INSERT INTO compras (fk_id_sucursal, fk_id_usuario, proveedor_C,  detalle_C,costo_C, impreso_C) VALUES (:fk_id_sucursal, :fk_id_usuario, :proveedor_C, :detalle_C,:costo_C, :impreso_C)";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':fk_id_sucursal', $data['fk_id_sucursal']);
            $stmt->bindParam(':fk_id_usuario', $_SESSION['id_usuario']);
            $stmt->bindParam(':proveedor_C', $data['proveedor_C']);
            $stmt->bindParam(':detalle_C', $data['detalle_C']);
            $stmt->bindParam(':costo_C', $data['costo_C']);
            $stmt->bindValue(':impreso_C', 0);
            $stmt->execute();
            return "ok";
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        session_destroy();
    }



    public function updateCompra($id, $data)
    {
        try {
            $query = "UPDATE compras SET fk_id_sucursal = :fk_id_sucursal, fk_id_usuario = :fk_id_usuario, proveedor_C = :proveedor_C, fecha_C = :fecha_C, costo_C = :costo_C, comprobante_C = :comprobante_C, impreso_C = :impreso_C WHERE id_compra = :id_compra";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':fk_id_sucursal', $data['fk_id_sucursal']);
            $stmt->bindParam(':fk_id_usuario', $data['fk_id_usuario']);
            $stmt->bindParam(':proveedor_C', $data['proveedor_C']);
            $stmt->bindParam(':fecha_C', $data['fecha_C']);
            $stmt->bindParam(':costo_C', $data['costo_C']);
            $stmt->bindParam(':comprobante_C', $data['comprobante_C']);
            $stmt->bindParam(':impreso_C', $data['impreso_C']);
            $stmt->bindParam(':id_compra', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejar el error de la base de datos
            return false;
        }
    }

    public function eliminarCompra($id_compra)
    {
        try {
            $query = "DELETE FROM compras WHERE id_compra = :id_compra";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_compra', $id_compra);
            if( $stmt->execute())
             return true;
            else
             return false;
        } catch (PDOException $e) {
            // Manejar el error de la base de datos
            return $e->getMessage();
        }
    }
}
