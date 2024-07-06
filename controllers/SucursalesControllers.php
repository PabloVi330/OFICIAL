<?php
require_once '../models/SucursalesModels.php';
class SucursalController {

    private $sucursal;

    public function __construct() {
        $this->sucursal = new Sucursal();
    }

    public function crearSucursal() {
        $data = $_POST; 
        $crearSucursal =  $this->sucursal->crearSucursal($data);
        echo json_encode($crearSucursal);
    }

    public function obtenerSucursales() {
        $obtenerSucursales = $this->sucursal->obtenerSucursales();
        echo json_encode($obtenerSucursales);
    }

    public function obtenerSucursalPorId() {
        $id = intval($_POST['id_sucursal']);
        $obtenerSucrsalPorId =  $this->sucursal->obtenerSucursalPorId($id);
        echo json_encode($obtenerSucrsalPorId);
    }

    public function editarSucursal() {
        $response = $this->sucursal->editarSucursal($_POST);
        echo json_encode($response);
    }

    public function eliminarSucursal() {
        $response = $this->sucursal->eliminarSucursal($_POST);
        echo json_encode($response);
    }
}
$controller = new SucursalController();

if (isset($_GET['action']) && $_GET['action'] == 'crearSucursal') {
    $controller->crearSucursal();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerSucursales') {
    $controller->obtenerSucursales();
}
if (isset($_GET['action']) && $_GET['action'] == 'edidarSucursal') {
    $controller->editarSucursal();
}
if (isset($_GET['action']) && $_GET['action'] == 'eliminarSucursales') {
    $controller->eliminarSucursal();
}
if (isset($_GET['action']) && $_GET['action'] == 'obtenerSucursalPorId') {
    $controller->obtenerSucursalPorId();
}