<?php
require_once '../models/MarcasModels.php';

class MarcaController {
    private $marca;

    public function __construct() {
        $this->marca = new MarcaModel();
    }

    public function crearMarca() {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibir datos del formulario
            $data = $_POST;
            // Procesar imágenes si se han enviado  5453129748
            if (!empty($_FILES['foto_marca']['name'][0])) {
                $uploadDir = 'uploads/marcas/';
                $uploadedImages = [];
                $numimg = 0;
                foreach ($_FILES['foto_marca']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['foto_marca']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $nombre = $data['nombre_marca']; // Cambia 'codigoP' por la clave correcta en $_POST
                    // Construir un nuevo nombre de imagen usando el código del producto
                    $newImageName = $nombre . $numimg . '.' . $imageExtension;
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
                $uploadedImages = ['marca.png'];
            }
            $img = json_encode($uploadedImages);
            $data['foto_marca']  = $img;

            $response = $this->marca->crearMarca($data);
            echo json_encode($response);
        }
       
    }

    public function obtenerMarcas() {
        $response = $this->marca->obtenerMarcas();
        echo json_encode($response);
    }

    public function editarMarca() {
        $data = $_POST;
        if (!empty($_FILES['foto_marca']['name'][0])) {
            $uploadDir = 'uploads/marcas/';
            $uploadedImages = [];
            $numimg = 0;
            foreach ($_FILES['foto_marca']['tmp_name'] as $key => $tmp_name) {
                $imageName = basename($_FILES['foto_marca']['name'][$key]);
                $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                $nombre = $data['Enombre_marca']; // Cambia 'codigoP' por la clave correcta en $_POST
                // Construir un nuevo nombre de imagen usando el código del producto
                $newImageName = $nombre . $numimg . '.' . $imageExtension;
                $targetPath = $uploadDir . $newImageName;
                $numimg++;
                if (move_uploaded_file($tmp_name, $targetPath)) {
                    $uploadedImages[] = $newImageName; // Almacenar el nuevo nombre de la imagen
                } else {
                    echo "Error al mover la imagen $imageName";
                }
            }
            if (!empty($uploadedImages)) {
                //echo "Imágenes recibidas: ";
            } else {
                //echo "No se recibieron imágenes";
            }
            $img = json_encode($uploadedImages);
            $data['foto_marca']  = $img;
        } else {
           
            $data['foto_marca']  =  $_POST['Efoto_marca'];
        }
        
        $response = $this->marca->editarMarca($data);
        echo json_encode($response);
    }

    public function eliminarMarca() {
        $response = $this->marca->eliminarMarca($_POST);
         echo json_encode($response);
    }
}
$controller = new MarcaController();
// Comprobar si se ha hecho una solicitud AJAX
if (isset($_GET['action']) && $_GET['action'] == 'crearMarca') {
    $controller->crearMarca();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerMarcas') {
    $controller->obtenerMarcas();
}

if (isset($_GET['action']) && $_GET['action'] == 'edidarMarca') {
    $controller->editarMarca();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarMarca') {
    $controller->eliminarmarca();
}

?>
