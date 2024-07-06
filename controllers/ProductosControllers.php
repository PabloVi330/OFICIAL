<?php
require_once '../models/ProductosModels.php';

header("Access-Control-Allow-Origin: https://redextel.quirquincho-digital.com");


header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");




class ProductosController
{
    private $producto;

    public function __construct()
    {
        $this->producto = new ProductoModel();
    }


    public function crearProducto()
    {
        $data = $_POST;

        $nombresImagenes = [];
        if (!empty($_FILES['imagenes']['name'][0])) {
            $directorioDestino = 'uploads/products/';

            $imagenes = $_FILES['imagenes'];
            foreach ($imagenes['tmp_name'] as $key => $tmp_name) {

                // Redimensionar la imagen
                $imagen = imagecreatefromstring(file_get_contents($tmp_name));
                $anchoOriginal = imagesx($imagen);
                $altoOriginal = imagesy($imagen);
                $anchoNuevo = 500;
                $altoNuevo = 500;
                $imagenRedimensionada = imagecreatetruecolor($anchoNuevo, $altoNuevo);
                imagecopyresampled($imagenRedimensionada, $imagen, 0, 0, 0, 0, $anchoNuevo, $altoNuevo, $anchoOriginal, $altoOriginal);

                // Guardar la imagen redimensionada
                $nombre = date('Y-m-d-H-i-s');
                $nuevo_nombre = str_replace("-", ".", $nombre);
                $img = $nuevo_nombre . '.png';
                $rutaArchivo = $directorioDestino . $img;
                if (imagepng($imagenRedimensionada, $rutaArchivo)) {
                    $nombresImagenes[] = $img;
                } else {
                    // Manejar errores si la carga de la imagen falla
                }

                imagedestroy($imagenRedimensionada);
                imagedestroy($imagen);
            }
        } else {
            $nombresImagenes = ["producto.jpg"];
        }
        $img = json_encode($nombresImagenes);
        $data['imagen']  = $img;
        $response = $this->producto->crearProducto($data);

        echo json_encode($response);
    }


    public function editarProducto()
    {
        $data = $_POST;
        // echo '<pre>';print_r($data);echo '</pre>';
        // echo '<pre>';print_r($_FILES);echo '</pre>';
        if (!empty($_FILES['Eimagenes']['name'][0])) {
            $directorioDestino = 'uploads/products/';

            $imagenes = $_FILES['Eimagenes'];
            foreach ($imagenes['tmp_name'] as $key => $tmp_name) {

                // Redimensionar la imagen
                $imagen = imagecreatefromstring(file_get_contents($tmp_name));
                $anchoOriginal = imagesx($imagen);
                $altoOriginal = imagesy($imagen);
                $anchoNuevo = 500;
                $altoNuevo = 500;
                $imagenRedimensionada = imagecreatetruecolor($anchoNuevo, $altoNuevo);
                imagecopyresampled($imagenRedimensionada, $imagen, 0, 0, 0, 0, $anchoNuevo, $altoNuevo, $anchoOriginal, $altoOriginal);

                // Guardar la imagen redimensionada
                $nombre = date('Y-m-d-H-i-s');
                $nuevo_nombre = str_replace("-", ".", $nombre);
                $img = $nuevo_nombre . '.png';
                $rutaArchivo = $directorioDestino . $img;
                if (imagepng($imagenRedimensionada, $rutaArchivo)) {
                    $nombresImagenes[] = $img;
                } else {
                    // Manejar errores si la carga de la imagen falla
                }

                imagedestroy($imagenRedimensionada);
                imagedestroy($imagen);
            }
            $img = json_encode($nombresImagenes);
            $data['Eimagen']  = $img;
        } 
        $response = $this->producto->editarProducto($data);

       
        echo json_encode($response);
    }



    public function eliminarProducto()
    {
        $response = $this->producto->eliminarProducto($_POST);
        echo json_encode($response);
    }


    public function obtenerProductos()
    {
        $response = $this->producto->obtenerProductos();
        echo json_encode($response);
    }


    public function obtenerProductosVentas()
    {
        $response = $this->producto->obtenerProductosVentas();
        echo json_encode($response);
    }


    public function obtenerProductoPorId()
    {

        $response = $this->producto->obtenerProductoPorID($_POST["id_producto"]);
        echo json_encode($response);
    }

    public function obtenerArticuloPorCategoria()
    {

        $response = $this->producto->obtenerProductoPorDescripcion($_POST["id_categoria"]);
        echo json_encode($response);
    }

    public function obtenerArticuloPorDescripcion()
    {
        //echo json_encode($_POST);
        $response = $this->producto->obtenerProductoPorDescripcion($_POST['descripcion_A']);
        echo  json_encode($response);
    }
    public function filtrarProductos()
    {
        $response = $this->producto->filtrarProductos($_POST['query']);
        echo json_encode($response);
    }



    public function productosPorCategoria()
    {
        $response = $this->producto->productosPorCategoria();
        echo json_encode($response);
    }
}



$controller = new ProductosController();

if (isset($_GET['action']) && $_GET['action'] == 'productosPorCategoria') {
    $controller->productosPorCategoria();
}

if (isset($_GET['action']) && $_GET['action'] == 'crearProducto') {
    $controller->crearProducto();
}

if (isset($_GET['action']) && $_GET['action'] == 'editarProducto') {
    $controller->editarProducto();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarProducto') {
    $controller->eliminarProducto();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerProductos') {
    $controller->obtenerProductos();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerProductosVentas') {
    $controller->obtenerProductosVentas();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerProductoPorId') {
    $controller->obtenerProductoPorId();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerArticuloPorCategoria') {
    $controller->obtenerArticuloPorCategoria();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerArticuloPorDescripcion') {
    $controller->obtenerArticuloPorDescripcion();
}

if (isset($_GET['action']) && $_GET['action'] == 'filtrarProductos') {
    $controller->filtrarProductos();
}
 