<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'db_conection.php';
class UsuarioModel
{
    private $conn;
    private $table = 'usuarios';

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    // Crear un nuevo usuario
    public function crearUsuario($data)
    {
        $query = 'INSERT INTO ' . $this->table . '
                    (nombre, usuario, password, perfil, rutas, foto, estado)
                    VALUES
                    (:nombre, :usuario, :password, :perfil, :rutas,:foto, :estado)';

        $stmt = $this->conn->prepare($query);

        // Limpiar y vincular los parámetros
        //$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':usuario', $data['usuario']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':perfil', $data['perfil']);
        $stmt->bindParam(':rutas', $data['listaRutas']);
        $stmt->bindParam(':foto', $data['foto']);
        $stmt->bindParam(':estado', $data['estado']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios()
    {
        try {
            $query = "SELECT * FROM usuarios ";
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            return [];
        }
    }

    // Obtener todos los usuarios
    public function obtenerUsuariosPorSucursal()
    {
        try {
            $suc = $_SESSION['fk_id_sucursal'];
            $query = "SELECT u.*, s.nombreS
            FROM usuario u
            JOIN sucursal s ON u.fk_id_sucursal = s.id_sucursal
            WHERE fk_id_sucursal = $suc";
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            return [];
        }
    }

    // Obtener un usuario por ID
    public function obtenerUsuarioPorID($id_usuario)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un usuario
    public function editarUsuario($data)
    {
        try {
            $query = 'UPDATE ' . $this->table . '
                    SET
                    nombre = :nombre,
                    perfil = :perfil,
                    foto = :foto,
                    rutas = :rutas
                    WHERE id = :id ';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nombre', $data['Enombre']);
            $stmt->bindParam(':perfil', $data['Eperfil']);
            $stmt->bindParam(':foto', $data['Efoto']);
            $stmt->bindParam(':rutas', $data['ElistaRutas']);
            $stmt->bindParam(':id', $data['id']);

            $stmt->execute();

            $query = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $data['id']);
            $stmt->execute();
            $usuarioActualizado = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->conn = null;
            return $usuarioActualizado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Eliminar un usuario
    public function eliminarUsuario($data)
    {
        try {
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id_usuario']);

            $stmt->execute();
            return 'ok';
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
