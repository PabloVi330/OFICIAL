<?php
require_once 'db_conection.php';
class Zona
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    public function crearZona($data)
    {
        try {
            $query = "INSERT INTO zona (nombre_Z, referencia_Z, coordenadas_Z) VALUES (:nombre_Z, :referencia_Z, :coordenadas_Z)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":nombre_Z", $data['nombre_Z']);
            $stmt->bindValue(':referencia_Z', $data['referencia_Z']);
            $stmt->bindValue(':coordenadas_Z', $data['imagen']);

            $stmt->execute();

            $lastInsertId = $this->conn->lastInsertId();

            $query = "SELECT * FROM zona WHERE id_zona = :id_zona";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_zona", $lastInsertId);
            $stmt->execute();
            $sucursal = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cerrar la conexión
            $this->conn = null;

            return $sucursal; // Devolver el objeto insertado
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }


    public function obtenerZonas()
    {
        
        try {
            $query = "SELECT * FROM zona order by id_zona desc";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $this->conn = null;
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return []; 
        }
    }



    public function obtenerZonaPorId($id)
    {
        $idd = intval($id);
        $query = "SELECT * FROM zona WHERE id_zona = :id_zona";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_zona", $idd);
            $stmt->execute();
            //$this->conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //$this->conn = null;
            return $e->getMessage();
        }
    }


    public function editarZona($data)
    {
        try {
            $query = "UPDATE zona SET nombre_Z = :nombre_Z, referencia_Z = :referencia_Z WHERE id_zona = :id_zona";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":nombre_Z", $data['Enombre_Z']);
            $stmt->bindValue(":referencia_Z", $data['Ereferencia_Z']);
            $stmt->bindValue(':id_zona', $data['Eid_zona']);

            $stmt->execute();

            // Consulta para obtener los datos actualizados de la sucursal
            $query = "SELECT * FROM zona WHERE id_zona = :id_zona";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_zona", $data['Eid_zona']);
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

    public function eliminarZona($data)
    {
        try {
            $query = "DELETE FROM zona WHERE id_zona= :id_zona";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_zona", $data['id_zona']);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }
}
