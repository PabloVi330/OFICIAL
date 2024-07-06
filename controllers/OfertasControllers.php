<?php
require_once '../models/OfertasModels.php';

class OfertasController
{
    private $ofertas;

    public function __construct()
    {
        $this->ofertas = new OfertasModel();
    }

    public function crearOferta()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibir datos del formulario
            $data = $_POST;
            // Procesar imágenes si se han enviado  5453129748
            if (!empty($_FILES['imagen']['name'][0])) {
                $uploadDir = 'uploads/ofertas/';
                $uploadedImages = [];
                $numimg = 0;

                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    $imageName = basename($_FILES['imagen']['name'][$key]);
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $nombre = date('Y-m-d H:i:s');
                    $nuevo_nombre = str_replace(":", ".", $nombre);
                    $newImageName = $nuevo_nombre . '.' . $imageExtension;
                    $targetPath = $uploadDir . $newImageName;
                    $numimg++;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $uploadedImages[] = $newImageName; // Almacenar el nuevo nombre de la imagen
                    } else {
                        // Manejo de errores
                        $error = error_get_last();
                        echo "Error al mover la imagen $imageName: " . $error['message'];
                    }
                }

                if (!empty($uploadedImages)) {
                    echo "Imágenes recibidas: ";
                    foreach ($uploadedImages as $img) {
                        echo "$img, ";
                    }
                } else {
                    echo "No se recibieron imágenes";
                }
            } else {
                $uploadedImages = ['marca.png'];
            }
            $img = json_encode($uploadedImages);
            $data['imagen']  = $img;

            $response = $this->ofertas->crearOferta($data);
            echo json_encode($response);
        }
    }

    public function obtenerOfertas()
    {
        $response = $this->ofertas->obtenerOfertas();
        echo json_encode($response);
    }

    public function editarMarca()
    {
        $data = $_POST;
        if (!empty($_FILES['imagen']['name'][0])) {
            $uploadDir = 'uploads/ofertas/';
            $uploadedImages = [];
            $numimg = 0;
            foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                $imageName = basename($_FILES['imagen']['name'][$key]);
                $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                $nombre = date('Y-m-d H:i:s');
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
            $data['imagen']  = $img;
        } else {
            $data['imagen']  =  $_POST['imagen'];
        }

        $response = $this->ofertas->editarMarca($data);
        echo json_encode($response);
    }

    public function eliminarOferta()
    {
        $response = $this->ofertas->eliminarOferta($_POST);
        echo json_encode($response);
    }
}

$controller = new OfertasController();


// Comprobar si se ha hecho una solicitud AJAX
if (isset($_GET['action']) && $_GET['action'] == 'crearOferta') {
    $controller->crearOferta();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerOfertas') {
    $controller->obtenerOfertas();
}

if (isset($_GET['action']) && $_GET['action'] == 'edidarMarca') {
    $controller->editarMarca();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarOferta') {
    $controller->eliminarOferta();
}
