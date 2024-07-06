<?php
require_once 'db_conection.php';
class CategoriaModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }

    public function crearCategoria($categoria)
    {
        try {
            $sql = "INSERT INTO categorias (categoria) VALUES (:categoria)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':catergoria', $categoria['categoria']);
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
             $this->conn = null;
            return "Error al crear la categoría: " . $e->getMessage();
        }
    }

    public function obtenerCategorias()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM categorias");
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
             $this->conn = null;
            return $categorias;
        } catch (PDOException $e) {
             $this->conn = null;
            return "Error al obtener las categorías: " . $e->getMessage();
        }
    }

    public function editarCategoria($data)
    {
        try {
            $sql = "UPDATE categoria SET nombre_C = :nombre_C, estado_C = :estado_C WHERE id_categoria = :id_categoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre_C', $data['Enombre_C']);
            $stmt->bindParam(':estado_C', $data['Eestado_C']);
            $stmt->bindValue(':id_categoria', $data['Eid_categoria']);
            $stmt->execute();
             $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
             $this->conn = null;
            return "Error al actualizar la categoría: " . $e->getMessage();
        }
    }

    public function eliminarCategoria($data)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
            $stmt->bindParam(':id_categoria', $data['id_categoria']);
            $stmt->execute();
            return "ok";
        } catch (PDOException $e) {
             $this->conn = null;
            return "Error al eliminar la categoría: " . $e->getMessage();
        }
    }
}
