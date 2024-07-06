<?php
require_once 'db_conection.php';
class MarcaModel {
    private $conn;

    public function __construct() {
        $this->conn = DBConnection::getInstance();
    }

    public function crearMarca($categoria) {
        try {
            $sql = "INSERT INTO marcas (nombre_marca, foto_marca) VALUES (:nombre_marca, :foto_marca)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nombre_marca',$categoria['nombre_marca']);
            $stmt->bindValue(':foto_marca',$categoria['foto_marca']);
            $stmt->execute();
            return "Categoría creada con éxito";
        } catch (PDOException $e) {
            return "Error al crear la categoría: " . $e->getMessage();
        }
    }

    public function obtenerMarcas() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marcas");
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
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

    public function eliminarMarca($data) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM marcas WHERE id_marca = :id_marca");
            $stmt->bindParam(':id_marca', $data['id_marca']);
            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>
