<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaProductos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);	
  		//print_r($productos) ;

  		if(count($productos) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 
            $nameImage = $productos[$i]["imagen"];
		  	$imagen = "<div class='border'><img src='".$nameImage."' width='150px'>  </div>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $productos[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($productos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group' ><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group' style='margin: 5px'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

            $product_id = $productos[$i]["id"];
            $codigo = $productos[$i] ["codigo"];
            $marca = $productos[$i]["marca"];
  			$nombre = $productos[$i]["descripcion"];
  			$precio_compra = $productos[$i]["precio_compra"];
  			$precio_venta = $productos[$i]["precio_venta"];
  			$ventas  = $productos[$i]["ventas"];
  	

  			$card  = "<div class='card border' sstyle='width: 100%;  width: 100%;display: flex;padding: 15px;flex-direction: column;border-radius: 15px;'><div class='card-body'><h4 class='card-title' style='font-weight:bold'>".$product_id. "&nbsp;&nbsp;&nbsp; ". $nombre."</h4></div><ul class='list-group list-group-flush'><li class='list-group-item ' style='padding: 5px;'>Stock&nbsp;&nbsp;&nbsp;&nbsp;".$stock." </li><li class='list-group-item'style='padding: 8px;'><div class='row border' style='display:table-cell'><strong>Compra </strong>".$precio_compra."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Venta </strong>".$precio_venta."</div></li><li class='list-group-item'style='padding: 8px;'>". $marca ."</li></ul></div>";

		 
		  	$datosJson .='[
		  	      "'.$card.'",
			      "'.$imagen.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$botones.'"
			     
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
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

