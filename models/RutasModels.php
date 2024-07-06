<?php
require_once 'db_conection.php';
class Ruta
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    public function crearRuta($data)
    {
        try {
            $query = "INSERT INTO rutas (fk_id_zona, nombre_R, numero_R ) VALUES (:fk_id_zona, :nombre_R, :numero_R)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":fk_id_zona", $data['fk_id_zona']);
            $stmt->bindValue(':nombre_R', $data['nombre_R']);
            $stmt->bindValue(':numero_R', $data['numero_R']);

            $stmt->execute();

            // Recuperar el ID del objeto insertado
            $lastInsertId = $this->conn->lastInsertId();

            // Consulta para obtener los datos de la sucursal insertada
            $query = "SELECT * FROM rutas WHERE id_ruta = :id_ruta";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_ruta", $lastInsertId);
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


    public function obtenerRutas()
    {

        try {


            $query = "SELECT rutas.*, zona.* FROM rutas 
                        INNER JOIN zona ON rutas.fk_id_zona = zona.id_zona";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $this->conn = null;
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return [];
        }
    }

    public function obtenerRutaPorId($id)
    {
        $idd = intval($id);
        $query = "SELECT * FROM rutas WHERE id_ruta = :id_ruta";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_ruta", $idd);
            $stmt->execute();
            //$this->conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //$this->conn = null;
            return $e->getMessage();
        }
    }


    public function obtenerUltimaRuta()
    {
        try {
            $query = "SELECT * FROM rutas order by id_ruta desc LIMIT 1";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $this->conn = null;
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return [];
        }
    }


    public function editarRuta($data)
    {
        try {
            $query = "UPDATE rutas SET fk_id_zona = :fk_id_zona, nombre_R = :nombre_R, numero_R = :numero_R WHERE id_ruta = :id_ruta";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":fk_id_zona", $data['Efk_id_zona']);
            $stmt->bindValue(":nombre_R", $data['Enombre_R']);
            $stmt->bindValue(":numero_R", $data['Enumero_R']);
            $stmt->bindValue(':id_ruta', $data['Eid_ruta']);

            $stmt->execute();

            // Consulta para obtener los datos actualizados de la sucursal
            $query = "SELECT * FROM rutas WHERE id_ruta = :id_ruta";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_ruta", $data['Eid_ruta']);
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

    public function eliminarRuta($data)
    {
        try {
            $query = "DELETE FROM rutas WHERE id_ruta = :id_ruta";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_ruta", $data['id_ruta']);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }
}
