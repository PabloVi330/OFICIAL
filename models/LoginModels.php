<?php
require_once 'db_conection.php';
class LoginModel
{
    private $conn;
    private $table = 'usuario';

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }

    // Obtener un usuario por ID
    public function login($usuario, $password)
    {
        try {


            $query = 'SELECT  * FROM usuarios WHERE usuarios.usuario = :usuario';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $passDB = $resultado['password'];

                // Ahora, compara la contraseña ingresada con la almacenada en la base de datos.
                if ($password == $passDB) {

                    echo "Contraseña válida. Inicio de sesión exitoso.";
                    return  $resultado;
                } else {

                    echo "Contraseña incorrecta. Inténtalo nuevamente.";
                }
            } else {
                echo "Usuario no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }





    // Crear un nuevo usuario
    public function crearUsuario($data)
    {
        $query = 'INSERT INTO ' . $this->table . '
                    (fk_id_sucursal, usuario_U, password_U, nombre_U, ci_U, area_U, tipo_U, correo_U, telefono_U, estado_U, foto_U)
                    VALUES
                    (:fk_id_sucursal, :usuario_U, :password_U, :nombre_U, :ci_U,:area_U, :tipo_U, :correo_U, :telefono_U, :estado_U, :foto_U)';

        $stmt = $this->conn->prepare($query);

        // Limpiar y vincular los parámetros
        $data['password_U'] = password_hash($data['password_U'], PASSWORD_DEFAULT);
        $stmt->bindParam(':fk_id_sucursal', $data['sucursal_U']);
        $stmt->bindParam(':usuario_U', $data['usuario_U']);
        $stmt->bindParam(':password_U', $data['password_U']);
        $stmt->bindParam(':nombre_U', $data['nombre_U']);
        $stmt->bindParam(':ci_U', $data['ci_U']);
        $stmt->bindParam(':area_U', $data['area_U']);
        $stmt->bindParam(':tipo_U', $data['tipo_U']);
        $stmt->bindParam(':correo_U', $data['correo_U']);
        $stmt->bindParam(':telefono_U', $data['telefono_U']);
        $stmt->bindValue(':estado_U', 1);
        $stmt->bindParam(':foto_U', $data['imagenes']);

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
            $query = "SELECT u.*, s.nombreS
            FROM usuario u
            JOIN sucursal s ON u.fk_id_sucursal = s.id_sucursal";
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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_usuario = :id_usuario';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar un usuario
    public function editarUsuario($data)
    {
        $query = 'UPDATE ' . $this->table . '
                    SET
                    fk_id_sucursal = :fk_id_sucursal,
                    usuario_U = :usuario_U,
                    nombre_U = :nombre_U,
                    area_U = :area_U,
                    tipo_U = :tipo_U,
                    correo_U = :correo_U,
                    telefono_U = :telefono_U,
                    estado_U = :estado_U,
                    foto_U = :foto_U
                    WHERE id_usuario = :id_usuario';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_usuario', $data['Eid_usuario']);
        $stmt->bindParam(':fk_id_sucursal', $data['Esucursal_U']);
        $stmt->bindParam(':usuario_U', $data['Eusuario_U']);
        $stmt->bindParam(':nombre_U', $data['Enombre_U']);
        $stmt->bindParam(':area_U', $data['Earea_U']);
        $stmt->bindParam(':tipo_U', $data['Etipo_U']);
        $stmt->bindParam(':correo_U', $data['Ecorreo_U']);
        $stmt->bindParam(':telefono_U', $data['Etelefono_U']);
        $stmt->bindParam(':estado_U', $data['Eestado_U']);
        $stmt->bindParam(':foto_U', $data['Efoto_U']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un usuario
    public function eliminarUsuario($data)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_usuario = :id_usuario';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $data['id_usuario']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
