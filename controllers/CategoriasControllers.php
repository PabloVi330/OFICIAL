<?php
require_once '../models/CategoriasModels.php';
header("Access-Control-Allow-Origin: https://redextel.quirquincho-digital.com");


header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class CategoriaController
{
    private $categoria;

    public function __construct()
    {
        $this->categoria = new CategoriaModel();
    }

    public function crearCategoria()
    {
        echo 
        $response = $this->categoria->crearCategoria($_POST);
        echo json_encode($response);
    }

    public function obtenerCategorias()
    {
        $response = $this->categoria->obtenerCategorias();
        echo json_encode($response);
    }

    public function editarCategoria()
    {
        $response = $this->categoria->editarCategoria($_POST);
        echo json_encode($response);
    }

    public function eliminarCategoria()
    {
        $response = $this->categoria->eliminarCategoria($_POST);
        echo json_encode($response);
    }
}
$controller = new CategoriaController();
// Comprobar si se ha hecho una solicitud AJAX
if (isset($_GET['action']) && $_GET['action'] == 'crearCategoria') {
    $controller->crearCategoria();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerCategorias') {
    $controller->obtenerCategorias();
}

if (isset($_GET['action']) && $_GET['action'] == 'edidarCategorias') {
    $controller->editarCategoria();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarCategorias') {
    $controller->eliminarCategoria();
}
