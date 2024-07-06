<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'db_conection.php';
class ClienteModel
{
    private $conn;
    private $table = 'clientes';

    public function __construct()
    {
        $this->conn = DBConnection::getInstance();
    }


    public function crearCliente($data)
    {
        //$idUsuario = $_SESSION['id_usuario'];
        try {
            $query = 'INSERT INTO clientes (id_ruta, nombre, documento, telefono, direccion, ubicacion) VALUES (:id_ruta, :nombre, :documento, :telefono, :direccion, :ubicacion)';

            $stmt = $this->conn->prepare($query);

            //$data['password_U'] = password_hash($data['password_U'], PASSWORD_DEFAULT);
            $stmt->bindParam(':id_ruta', $data['id_ruta']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':documento', $data['codigo']);
            $stmt->bindParam(':telefono', $data['telefono']);
            $stmt->bindParam(':direccion', $data['direccion']);
            $stmt->bindParam(':ubicacion', $data['ubicacion']);
            $stmt->execute();
            $idClienteInsertado = $this->conn->lastInsertId();


            // Consulta SQL para obtener el registro completo
            $sql = "SELECT * FROM clientes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $idClienteInsertado);
            $stmt->execute();
            $clienteInsertado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $clienteInsertado;
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    // Obtener todos los Clientes
    public function obtenerClientes()
    {
        try {
            $query = "SELECT * FROM clientes  ORDER BY id DESC";
            $statement = $this->conn->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            return [];
        }
    }


    // Obtener un usuario por ID
    public function obtenerClientePorID($id_cliente)
    {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_cliente);
            $stmt->execute();
            $this->conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }


    public function editarCliente($data)
    {
        try {
            $query = 'UPDATE ' . $this->table . '
                    SET
                    id_ruta = :id_ruta,
                    nombre = :nombre,
                    telefono = :telefono,
                    direccion = :direccion
                    WHERE id = :id';

            $stmt = $this->conn->prepare($query);


            $stmt->bindParam(':id_ruta', $data['Efk_id_ruta']);
            $stmt->bindParam(':nombre', $data['Enombre']);
            $stmt->bindParam(':telefono', $data['Etelefono']);
            $stmt->bindParam(':direccion', $data['Edireccion']);
            $stmt->bindParam(':id', $data['Eid_cliente']);

            if ($stmt->execute()) {

                // SQL para seleccionar el producto actualizado
                $sql = "SELECT * FROM clientes WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id", $data['Eid_cliente']);
                if ($stmt->execute()) {
                    $clienteActualizado = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $clienteActualizado;
                }
            }
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }

    // Eliminar un usuario
    public function eliminarCliente($data)
    {
        try {

            $query = 'DELETE FROM ' . $this->table . ' WHERE id_cliente = :id_cliente';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_cliente', $data);

            $stmt->execute();
            $this->conn = null;
            return "ok";
        } catch (PDOException $e) {
            $this->conn = null;
            return $e->getMessage();
        }
    }


    public function filtrarClientes($nombre)
    {
        try {
            $query = "SELECT * FROM clientes WHERE nombre LIKE :nombre ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);
            $nombre = '%' . $nombre . '%';
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
