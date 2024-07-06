<?php
require_once '../models/ZonasModels.php';
class SucursalController
{

    private $zona;

    public function __construct()
    {
        $this->zona = new Zona();
    }

    public function crearZona()
    {
        $data = $_POST;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibir datos del formulario
            $data = $_POST;
            // Procesar imágenes si se han enviado  5453129748
            if (!empty($_FILES['imagen']['name'][0])) {
                $uploadDir = 'uploads/zonas/';
                $uploadedImages = [];
                
                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['imagen']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $nombre = date('Y-m-d H:i:s');
                    $nuevo_nombre = str_replace(":", ".", $nombre);
                    $newImageName = $nuevo_nombre . '.' . $imageExtension;
                    $targetPath = $uploadDir . $newImageName;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $uploadedImages[] = $newImageName; // Almacenar el nuevo nombre de la imagen
                    } else {
                        // Manejo de errores
                        $error = error_get_last();
                        echo "Error al mover la imagen $imageName: " . $error['message'];
                    }
                }
            } else {
                $uploadedImages = ['marca.png'];
            }
            $img = json_encode($uploadedImages);
            $data['imagen']  = $img;

            $response = $this->zona->crearZona($data);
            echo json_encode($response);
        }
    }

    public function obtenerZonas()
    {
        $obtenerSucursales = $this->zona->obtenerZonas();
        echo json_encode($obtenerSucursales);
    }

    public function obtenerZonaPorId()
    {
        $id = intval($_POST['id_zona']);
        $obtenerZonaPorId =  $this->zona->obtenerZonaPorId($id);
        echo json_encode($obtenerZonaPorId);
    }

    public function editarZona()
    {
        $response = $this->zona->editarZona($_POST);
        echo json_encode($response);
    }

    public function eliminarZona()
    {
        $response = $this->zona->eliminarZona($_POST);
        echo json_encode($response);
    }
}
$controller = new SucursalController();

if (isset($_GET['action']) && $_GET['action'] == 'crearZona') {
    $controller->crearZona();
}

if (isset($_GET['action']) && $_GET['action'] == 'edidarZona') {
    $controller->editarZona();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarZona') {
    $controller->eliminarZona();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerZonaPorId') {
    $controller->obtenerZonaPorId();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerZonas') {
    $controller->obtenerZonas();
}
