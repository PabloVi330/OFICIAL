<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosVentas
{

	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/

	public function mostrarTablaProductosVentas()
	{

		$item = null;
		$valor = null;
		$orden = "id";

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		if (count($productos) == 0) {

			echo '{"data": []}';

			return;
		}
		$datosJson = '{
		  "data": [';

		for ($i = 0; $i < count($productos); $i++) {

			/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

			$imagen = "<img src='" . $productos[$i]["imagen"] . "' width='40px'>";

			/*=============================================
 	 		STOCK
  			=============================================*/

			if ($productos[$i]["stock"] <= 10) {

				$stock = "<button class='btn btn-danger'>" . $productos[$i]["stock"] . "</button>";
			} else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15) {

				$stock = "<button class='btn btn-warning'>" . $productos[$i]["stock"] . "</button>";
			} else {

				$stock = "<button class='btn btn-success'>" . $productos[$i]["stock"] . "</button>";
			}
            $botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='" . $productos[$i]["id"] . "'>Agregar</button></div>";
			/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

			$data = "<div class='card' style='width: 100%;    background-color: #012738;width: 100%;display: flex;padding: 15px;flex-direction: column;border-radius: 15px;'><img class='card-img-top ' width='70%' src='" . $productos[$i]["imagen"] . "' alt='Card image cap' style='margin: auto;padding-top: 15px;' ><div class='card-body'><h5 class='card-title'style='color: white;'>" . $productos[$i]["descripcion"] . "</h5></div><div class='row' style='    display: flex;justify-content:space-between;border: #b0b0b0 solid 2px;padding: 5px;border-radius: 15px;width: 80%;margin: auto;'><div class='col-6'>".$stock." </div><div class='col-6'>".$botones."</div></div></div>";


			

			$datosJson .= '[
				"' . $data. '"
			    ],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .=   '] 

		 }';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas->mostrarTablaProductosVentas();