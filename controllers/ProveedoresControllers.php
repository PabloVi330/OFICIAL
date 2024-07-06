<?php
include_once '../models/ProveedoresModels.php';

class ProveedorController
{

    private $proveedor;

    public function __construct()
    {

        $this->proveedor = new ProveedorModel();
    }


    public function crearProveedor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            if (!empty($_FILES['imagenes']['name'][0])) {
                $uploadDir = 'uploads/users/';
                $uploadedImages = [];
                $numimg = 0;
                foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['imagenes']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $ci = $data['ci_Cl']; // Cambia 'codigoP' por la clave correcta en $_POST
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
                if (!empty($uploadedImages)) {
                    echo "Imágenes recibidas: ";
                } else {
                    echo "No se recibieron imágenes";
                }
            } else {
                $uploadedImages = ["proveedor.jpg"];
            }
            $img = json_encode($uploadedImages);
            $data['imagenes']  = $img;

            $response = $this->proveedor->crearProveedor($data);
            echo json_encode($response);
        }
    }


    public function obtenerProveedores()
    {
        $response = $this->proveedor->obtenerProveedores();
        echo json_encode($response);
    }


    public function obtenerProveedorPorId()
    {

        $response = $this->proveedor->obtenerProveedorPorId($_POST['id_proveedor']);
        echo json_encode($response);
    }


    public function editarProveedor()
    {

        $response = $this->proveedor->editarProveedor($_POST);
        echo json_encode($response);
    }

   
    public function eliminarProveedor()
    {
        $response = $this->proveedor->eliminarProveedor($_POST['id_proveedor']);
        echo json_encode($response);
    }
}


$controller = new ProveedorController();

if (isset($_GET['action']) && $_GET['action'] == 'crearProveedor') {
    $controller->crearProveedor();
}

if (isset($_GET['action']) && $_GET['action'] == 'editarProveedor') {
    $controller->editarProveedor();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarProveedor') {
    $controller->eliminarProveedor();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerProveedores') {
    $controller->obtenerProveedores();
}


if (isset($_GET['action']) && $_GET['action'] == 'obtenerProveedorPorId') {
    $controller->obtenerProveedorPorId();
}
