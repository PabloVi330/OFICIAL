<?php
require_once("../models/EnviosModels.php");
require_once("../models/ArticulosModels.php");

class EnvioController
{

	private $envio;
	private $articulo;

	public function __construct()
	{
		$this->envio = new EnvioModel();

		$this->articulo = new ArticuloModel();
	}

	public function crearEnvio()
	{
		 //echo "<pre>";
		 //print_r($_POST);
		 //echo "</pre>";
         //exit();
		$crearEnvio = $this->envio->crearEnvio($_POST);
		
		if ($crearEnvio == "ok") {
			// echo "se creo el envio <br>";
			$detalle = json_decode($_POST["detalle_E"], true);
			for ($i = 0; $i < count($detalle); $i++) {
				$canti = intval($detalle[$i]['cantidad_envio']);
				$responseStock = $this->articulo->reducirStockTraspaso($detalle[$i]["id"], $detalle[$i]["cantidad_envio"],$detalle[$i]["codigo"], $_POST["fk_id_sucursal1"]);
				if ($responseStock == "ok")  {
					// echo "redujo el stock del almacen <br>";
					$busqueda = $this->articulo->buscarArticuloEnSucursal($_POST["fk_id_sucursal"], $detalle[$i]["codigo"]);
					// echo "<pre>";
					// print_r($busqueda);
					// echo "</pre>";
					//exit();
					if ($busqueda != "NO") {
						// echo "encontro el articulo procedera  a umentar el stock <br>";
						$incrementarStock = $this->articulo->sumarStock($busqueda["id_articulo"], $detalle[$i]["cantidad_envio"]);
						if ($incrementarStock == "ok") {
							echo json_encode($incrementarStock);
						} else {
							//echo json_encode($incrementarStock);
						}
					} else {

						// echo "no encontro este articulo en la sucrsal buscara los datos el el alamcen <br>";
						$articuloB = $this->articulo->obtenerArticuloPorID($detalle[$i]["id"]);


						if ($articuloB) {
							$articulo1 = $articuloB;
							// echo "encontro los datos datos ahora lo creara <br>";
							$articulo1['fk_id_sucursal'] = $_POST['fk_id_sucursal'];
							$articulo1['stock_A']  = $canti;
							$articulo1['imagenes'] = $articuloB['imagenes_A'];
							// echo "<pre>";
							// print_r($articulo1);	
							// echo "</pre>";
							$crearArticuloEnvio  = $this->articulo->crearArticuloEnvio($articulo1, $canti, $_POST['fk_id_sucursal']);
							if ($crearArticuloEnvio == "ok") {
								echo json_encode($crearArticuloEnvio);
							}
						}
					}
				} else {
					echo json_encode($responseStock);
				}
			}
		} else {
			echo json_encode($crearEnvio);
		}
	}

	// public function eliminarEnvio()
	// {
	// 	 $envio = $this->envio->obtenerEnviosPorID($_POST['id_envio']);
	// 	echo "<pre>";
	// 	print_r($envio);
	// 	echo "</pre>";
	// 	$detalle_E = json_decode($envio["detalle_E"], true);
	// 	echo "<pre>";
	// 	print_r($detalle_E);
	// 	echo "</pre>";
	// 	//$eliminarEnvio = $this->envio->eliminarEnvio($_POST['id_envio']);
		
	// 	if (true) {

	// 		//echo "se creo el envio <br>";
	// 		for ($i = 0; $i < count($detalle_E); $i++) {
	// 			$canti = intval($detalle_E[$i]['cantidad']);
	// 			$responseStock = $this->articulo->reducirStock($detalle_E[$i]["id"], $detalle_E[$i]["cantidad"]);
	// 			if ($responseStock) {
	// 				//	echo "redujo el stock del almacen <br>";
	// 				$busqueda = $this->articulo->buscarArticuloEnSucursal($_POST["fk_id_sucursal"], $detalle_E[$i]["codigo"]);
	// 				// echo "<pre>";
	// 				// print_r($busqueda);
	// 				// echo "</pre>";

	// 				if ($busqueda) {
	// 					//echo "encontro el articulo procedera  a umentar el stock <br>";
	// 					$incrementarStock = $this->articulo->sumarStock($busqueda["id_articulo"], $detalle_E[$i]["cantidad"]);
	// 					if ($incrementarStock) {
	// 						echo json_encode($incrementarStock);
	// 					} else {
	// 						echo json_encode($incrementarStock);
	// 					}
	// 				} else {

	// 					//echo "no encontro este articulo en la sucrsal buscara los datos el el alamcen <br>";
	// 					$articuloB = $this->articulo->obtenerArticuloPorID($detalle_E[$i]["id"]);


	// 					if ($articuloB) {
	// 						$articulo1 = $articuloB;
	// 						//echo "encontro los datos datos ahora lo creara <br>";
	// 						$articulo1['fk_id_sucursal'] = $_POST['fk_id_sucursal'];
	// 						$articulo1['stock_A']  = $canti;
	// 						$articulo1['imagenes'] = $articuloB['imagenes_A'];
	// 						// echo "<pre>";
	// 						// print_r($articulo1);	
	// 						// echo "</pre>";
	// 						$crearArticulo  = $this->articulo->crearArticuloEnvio($articulo1, $canti, $_POST['fk_id_sucursal']);
	// 						if ($crearArticulo) {
	// 							echo json_encode($crearArticulo);
	// 						}
	// 					}
	// 				}
	// 			} else {
	// 				echo json_encode($responseStock);
	// 			}
	// 		}
	// 	} else {
	// 		//echo json_encode($response);
	// 	}
	// }
	public function obtenerEnvios()
	{
		$envios =	$this->envio->obtenerEnvios();
		echo json_encode($envios);
	}
	public function recibirEnvio (){
		$recibirEnvio = $this->envio->recibirEnvio($_POST['id_envio']);
		echo json_encode($recibirEnvio);
	} 
}

$controller = new EnvioController();

if (isset($_GET['action'])  && $_GET['action'] == "crearEnvio") {
	$controller->crearEnvio();
}

if (isset($_GET['action'])  && $_GET['action'] == "obtenerEnvios") {
	$controller->obtenerEnvios();
}

if (isset($_GET['action'])  && $_GET['action'] == "recibirEnvio") { 
	$controller->recibirEnvio();
}

// if (isset($_GET['action'])  && $_GET['action'] == "eliminarEnvio") { 
// 	$controller->eliminarEnvio();
// }