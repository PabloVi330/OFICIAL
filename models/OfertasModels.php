<?php
require_once 'db_conection.php';
class OfertasModel {
    private $conn;

    public function __construct() {
        $this->conn = DBConnection::getInstance();
    }

    public function crearOferta($categoria) {
        try {
            $sql = "INSERT INTO ofertas (fecha, estado, imagen) VALUES (:fecha, :estado, :imagen)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':fecha',$categoria['fecha']);
            $stmt->bindValue(':estado', 1);
            $stmt->bindValue(':imagen',$categoria['imagen']);
            $stmt->execute();
            return "ok";

        } catch (PDOException $e) {
            return "Error al crear la categoría: " . $e->getMessage();
        }
    }


    public function obtenerOfertas() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM ofertas");
            $stmt->execute();
            $ofertas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $ofertas;

        } catch (PDOException $e) {
            return "Error al obtener las categorías: " . $e->getMessage();
        }
    }

    public function editarMarca($data) {
        try {
            $sql = "UPDATE marcas SET nombre_marca = :nombre_marca, foto_marca = :foto_marca  WHERE id_marca = :id_marca"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre_marca', $data['Enombre_marca']);
            $stmt->bindParam(':foto_marca', $data['foto_marca']);
            $stmt->bindValue(':id_marca', $data['Eid_marca']);
            $stmt->execute();
            return "ok";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function eliminarOferta($data) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM ofertas WHERE id_ofertas = :id_ofertas");
            $stmt->bindParam(':id_ofertas', $data['id_ofertas']);
            $stmt->execute();
            return "ok";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>
