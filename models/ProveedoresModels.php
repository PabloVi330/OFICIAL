<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'db_conection.php';
class ProveedorModel
{
    private $conn;
    private $table = 'proveedores';

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    public function crearProveedor($data)
    {
        try {
            $query = 'INSERT INTO ' . $this->table . '
                    (nombre_Pro, direccion_Pro, telefono_Pro)
                    VALUES
                    (:nombre_Pro, :direccion_Pro, :telefono_Pro)';

            $stmt = $this->conn->prepare($query);

            //$data['password_U'] = password_hash($data['password_U'], PASSWORD_DEFAULT);
            $stmt->bindParam(':nombre_Pro', $data['nombre_Pro']);
            $stmt->bindParam(':direccion_Pro', $data['direccion_Pro']);
            $stmt->bindParam(':telefono_Pro', $data['telefono_Pro']);
            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    // Obtener todos los Clientes
    public function obtenerProveedores()
    {
        try {

            $query = "SELECT * FROM proveedores";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $this->conn = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return [];
        }
    }


 

    // Obtener un usuario por ID
    public function obtenerProveedorPorId($id_proveedor)
    {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_proveedor = :id_proveedor';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_proveedor', $id_proveedor);
            $stmt->execute();
            $this->conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }


    public function editarProveedor($data)
    {
        try {
            $query = 'UPDATE ' . $this->table . '
                    SET
                    nombre_Pro = :nombre_Pro,
                    direccion_Pro = :direccion_Pro,
                    telefono_Pro = :telefono_Pro
                    WHERE id_proveedor = :id_proveedor';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id_proveedor', $data['Eid_proveedor']);
            $stmt->bindParam(':nombre_Pro', $data['Enombre_Pro']);
            $stmt->bindParam(':direccion_Pro', $data['Edireccion_Pro']);
            $stmt->bindParam(':telefono_Pro', $data['Etelefono_Pro']);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    // Eliminar un usuario
    public function eliminarProveedor($id_proveedor)
    {
        try {

            $query = 'DELETE FROM ' . $this->table . ' WHERE id_proveedor = :id_proveedor';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_proveedor', $id_proveedor);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }
}
