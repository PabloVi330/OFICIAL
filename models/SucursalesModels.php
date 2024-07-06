<?php
require_once 'db_conection.php';
class Sucursal
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    public function crearSucursal($data)
    {
        try {
            $query = "INSERT INTO sucursal (nombre_S, direccion_S, telefono_S, estado_S) VALUES (:nombre_S, :direccion_S, :telefono_S, :estado_S)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":nombre_S", $data['nombre_S']);
            $stmt->bindValue(':direccion_S', $data['direccion_S']);
            $stmt->bindValue(':telefono_S', $data['telefono_S']);
            $stmt->bindValue(':estado_S', 1);

            $stmt->execute();

            // Recuperar el ID del objeto insertado
            $lastInsertId = $this->conn->lastInsertId();

            // Consulta para obtener los datos de la sucursal insertada
            $query = "SELECT * FROM sucursal WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_sucursal", $lastInsertId);
            $stmt->execute();

            // Devolver los datos de la sucursal insertada
            $sucursal = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cerrar la conexión
            $this->conn = null;

            return $sucursal; // Devolver el objeto insertado
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }


    public function obtenerSucursales()
    {

        try {
            $query = "SELECT * FROM sucursal order by id_sucursal desc";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $this->conn = null;
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return [];
        }
    }

    public function obtenerSucursalPorId($id)
    {
        $idd = intval($id);
        $query = "SELECT * FROM sucursal WHERE id_sucursal = :id_sucursal";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_sucursal", $idd);
            $stmt->execute();
            //$this->conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //$this->conn = null;
            return $e->getMessage();
        }
    }


    public function editarSucursal($data)
    {
        try {
            $query = "UPDATE sucursal SET nombre_S = :nombre_S, direccion_S = :direccion_S, telefono_S = :telefono_S WHERE id_sucursal = :id_sucursal";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":nombre_S", $data['Enombre_S']);
            $stmt->bindValue(":direccion_S", $data['Edireccion_S']);
            $stmt->bindValue(":telefono_S", $data['Etelefono_S']);
            $stmt->bindValue(':id_sucursal', $data['Eid_sucursal']);

            $stmt->execute();

            // Consulta para obtener los datos actualizados de la sucursal
            $query = "SELECT * FROM sucursal WHERE id_sucursal = :id_sucursal";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_sucursal", $data['Eid_sucursal']);
            $stmt->execute();
            $sucursalActualizada = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cerrar la conexión
            $this->conn = null;

            return $sucursalActualizada; // Devolver los datos actualizados de la sucursal
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    public function eliminarSucursal($data)
    {
        try {
            $query = "DELETE FROM sucursal WHERE id_sucursal = :id_sucursal";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_sucursal", $data['id_sucursal']);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }
}
