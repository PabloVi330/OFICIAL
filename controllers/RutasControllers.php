<?php
require_once '../models/RutasModels.php';
class RutaController {

    private $ruta;

    public function __construct() {
        $this->ruta = new Ruta();
    }

    public function crearRuta() {
        $data = $_POST; 
        $crearRuta =  $this->ruta->crearRuta($data);
        echo json_encode($crearRuta);
    }

    public function obtenerRutas() {
        $obtenerRutas = $this->ruta->obtenerRutas();
        echo json_encode($obtenerRutas);
    }

    public function obtenerRutaPorId() {
        $id = intval($_POST['id_ruta']);
        $obtenerRutasPorId =  $this->ruta->obtenerRutaPorId($id);
        echo json_encode($obtenerRutasPorId);
    }

    public function obtenerUltimaRuta() {
        $obtenerUltimaRuta = $this->ruta->obtenerUltimaRuta();
        echo json_encode($obtenerUltimaRuta);
    }

    public function editarRuta() {
        $response = $this->ruta->editarRuta($_POST);
        echo json_encode($response);
    }

    public function eliminarRuta() { 
        $response = $this->ruta->eliminarRuta($_POST);
        echo json_encode($response);
    }
}

$controller = new RutaController();

if (isset($_GET['action']) && $_GET['action'] == 'crearRuta') {
    $controller->crearRuta();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerRutas') {
    $controller->obtenerRutas();
}
if (isset($_GET['action']) && $_GET['action'] == 'edidarRuta') {
    $controller->editarRuta();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarRuta') {
    $controller->eliminarRuta();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerRutaPorId') {
    $controller->obtenerRutaPorId();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerUltimaRuta') {
    $controller->obtenerUltimaRuta();
}