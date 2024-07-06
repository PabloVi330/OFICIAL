<?php
include_once '../models/ClientesModels.php';

class ClienteController
{

    private $cliente;

    public function __construct()
    {

        $this->cliente = new ClienteModel();
    }


    public function crearCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $uploadedImages = [];
            if (!empty($_FILES['imagen']['name'][0])) {
                $uploadDir = 'uploads/clientes/';
                $numimg = 0;
                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['imagen']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $ci = $data['codigo']; // Cambia 'codigoP' por la clave correcta en $_POST
                    // Construir un nuevo nombre de imagen usando el código del producto
                    $newImageName = $ci . $numimg . '.' . $imageExtension;
                    $targetPath = $uploadDir . $newImageName;
                    $numimg++;
                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $uploadedImages[] = $newImageName; // Almacenar el nuevo nombre de la imagen
                    } else {
                        echo "Error al mover la imagen $imageName";
                    }
                }
            } else {
                $uploadedImages = ['usuario.jpg'];
            }
            $img = json_encode($uploadedImages);
            $data['imagenes']  = $img;

            $response = $this->cliente->crearCliente($data);
            echo json_encode($response);
        }
    }


    public function obtenerClientes()
    {
        $response = $this->cliente->obtenerClientes();
        $jsonResponse = json_encode($response);


        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Error al codificar JSON: " . json_last_error_msg();
        } else {
            echo $jsonResponse;
        }
    }

    // Obtener un usuario por ID en formato JSON
    public function obtenerClientePorID()
    {

        $response = $this->cliente->obtenerClientePorID($_POST['id_cliente']);
        echo json_encode($response);
    }

    // Actualizar un usuario
    public function editarCliente()
    {
        //echo '<pre>';print_r($_POST);echo '</pre>';
        $response = $this->cliente->editarCliente($_POST);
        echo json_encode($response);
    }

    // Eliminar un usuario
    public function eliminarCliente()
    {
        $response = $this->cliente->eliminarCliente($_POST['id_cliente']);
        echo json_encode($response);
    }

    public function filtrarClientes()
    {
        $response = $this->cliente->filtrarClientes($_POST['query']);
        echo json_encode($response);
    }

}
$controller = new ClienteController();

if (isset($_GET['action']) && $_GET['action'] == 'crearCliente') {
    $controller->crearCliente();
}

if (isset($_GET['action']) && $_GET['action'] == 'editarCliente') {
    $controller->editarCliente();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarCliente') {
    $controller->eliminarCliente();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerClientes') {
    $controller->obtenerClientes();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerClientePorId') {
    $controller->obtenerClientePorID();
}
if (isset($_GET['action']) && $_GET['action'] == 'filtrarClientes') {
    $controller->filtrarClientes();
}
