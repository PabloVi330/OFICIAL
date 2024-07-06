<?php
require_once('../models/CopiasModels.php');
require_once('../models/MaquinasModels.php');

class CopiasController
{

  private $copia; 
  private $maquina;
  public function __construct()
  {
    $this->copia = new CopiasModel();
    $this->maquina = new MaquinaModel(); 
  }
  public function crearVales()
  {
    $data = $_POST;
    $subTotal = $_POST['copias']  * $_POST['precio'];
    $data['sub_total'] = $subTotal;
    $data['tipo_pago'] = 1;
    $crearCopia = $this->copia->crearCopia($data);
    if ($crearCopia) {
      $c_final = $this->maquina->actualizarContadorFinal($data['fk_id_maquina'], $data['copias']);
      if ($c_final) {
        echo json_encode($c_final);
      }
    } else {
      echo json_encode($crearCopia);
    }
  }

  public function eliminarCopia()
  {
    $copiaBuscada = $this->copia->obtenerCopiasPorId($_POST['id_copia']);
    $eliminarCopia = $this->copia->eliminarCopia($_POST['id_copia']);
    if ($eliminarCopia) {
      $c_final = $this->maquina->reducirContadorFinal($copiaBuscada['fk_id_maquina'], $copiaBuscada['copias']);
      if ($c_final) {
        echo json_encode($c_final);
      }
    } else {
      echo json_encode($copiaBuscada);
    }
  }

  public function pagarPendiente()
  {
    $response = $this->copia->pagarEfectivo($_POST['id_copia'], $_POST['fecha']);
    echo json_encode($response);
  }


  public function obtenerCopiasPorusuarios()
  {
    $response = $this->copia->obtenerCopiasPorUsuarios($_POST['fk_id_maquina']);
    echo json_encode($response);
  }
  public function obtenerCopias()
  {
    $response = $this->copia->obtenerCopias($_GET['tipo']);
    echo json_encode($response);
  }


  public function obtenerTiposCopiasPorUsuario()
  {
    $response = $this->copia->obtenerTiposCopiasPorUsuario($_GET['tipo']);
    echo json_encode($response);
  }
}

$controller = new CopiasController();

if (isset($_GET['action']) && $_GET['action'] == 'crearVales') {

  $controller->crearVales();
}

if (isset($_GET['action']) && $_GET['action'] == 'eliminarCopia') {

  $controller->eliminarCopia();
}

if (isset($_GET['action']) && $_GET['action'] == 'pagarPendiente') {

  $controller->pagarPendiente();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerCopias') {

  $controller->obtenerCopias();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerCopiasPorUsuarios') {

  $controller->obtenerCopiasPorusuarios();
}

if (isset($_GET['action']) && $_GET['action'] == 'obtenerTiposCopiasPorUsuario') {

  $controller->obtenerTiposCopiasPorUsuario();
}
