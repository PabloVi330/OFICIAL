<?php

if ($_SESSION["perfil"] == "Especial") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1 >

      Crear venta 

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-5 col-xs-12">

        <div class="box " >

          <div class=""></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">

              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->



                <div style="display: flex; margin: 6px;">
                  <button><i class="fa fa-user"></i></button>

                  <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>">

                  <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                </div>






                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================-->



                <div style="display: flex;  margin: 6px;">
                  <button ><i class="fa fa-key"></i></button>

                  <?php

                  $item = null;
                  $valor = null;

                  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                  if (!$ventas) {

                    echo '<input style="background-color: #012738;
                    border-radius: 9px;
                    color: white;
                    border: none;" type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001">';
                  } else {

                    foreach ($ventas as $key => $value) {
                    }

                    $codigo = $value["id"] + 1;



                    echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '">';
                  }

                  ?>


                </div>


                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                <div class="form-group">

                  <div class="input-group" style="display: flex;">
                    <button><i class="fa fa-users"></i></button>

                    <select class="form-control  select2 select2-hidden-accessible" id="seleccionarCliente" name="seleccionarCliente" required tabindex="-1" aria-hidden="true" style="width: 220px">

                      <option selected="selected" value="">Seleccionar cliente</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option   value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                      }

                      ?>

                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal"> <i class="fa fa-plus"></i> </button>

                  </div>

                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->

                <div class="form-group row nuevoProducto">



                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->


                <!-- Button trigger modal -->
                <button style="background-color: #012738" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Agregar Producto
                </button>

                <!-- Modal -->
                
              </div>



              <hr>

              <div class="row">

                <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                <div class="col-xs-12 pull-right">

                  <table class="table" style="color: white;width: 100%;">

                    <thead>

                      <tr>
                        <th>Impuesto</th>
                        <th>Total</th>
                      </tr>

                    </thead>

                    <tbody>

                      <tr>

                        <td style="width: 50%">

                          <div class="input-group" >

                            <input style="background-color: #012738;
                                          border-radius: 9px;
                                          color: white;
                                          border: none;" type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="0" required>

                            <input style="background-color: #012738;
                                          border-radius: 9px;
                                          color: white;
                                          border: none;" type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                            <input style="background-color: #012738;
                                          border-radius: 9px;
                                          color: white;
                                          border: none;"type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                            <span style="background-color: #012738;
                                          border-radius: 9px;
                                          color: white;
                                          border: none;" class="input-group-addon"><i class="fa fa-percent"></i></span>

                          </div>

                        </td>

                        <td style="width: 50%">

                          <div class="input-group">

                            <span class="input-group-addon" style="background-color: #012738;
                                                            border-radius: 9px;
                                                            color: white;
                                                            border: none;"><i class="ion ion-social-usd"></i></span>

                            <input style="background-color: #012738;
                                    border-radius: 9px;
                                    color: white;
                                    border: none;"type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                            <input type="hidden" name="totalVenta" id="totalVenta">


                          </div>

                        </td>

                      </tr>

                    </tbody>

                  </table>

                </div>

              </div>

              <hr>

              <!--=====================================
                ENTRADA MÉTODO DE PAGO
               

              <div class="form-group row">

                <div class="col-xs-6" style="padding-right:0px">

                  <div class="input-group">

                    <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                      <option value="">Seleccione método de pago</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="TC">Tarjeta Crédito</option>
                      <option value="TD">Tarjeta Débito</option>
                    </select>

                  </div>

                </div>

                <div class="cajasMetodoPago"></div>

                <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

              </div> ======================================-->

              <br>

            </div>

        </div>

        <div class="box-footer">

          <button type="submit" id="d"class="btn btn-primary pull-right venta">Guardar venta</button>

        </div>

        </form>

        <?php

        $guardarVenta = new ControladorVentas();
        $guardarVenta->ctrCrearVenta();

        ?>

      </div>
	  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content"  >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       


                            <table class="table  dt-responsive tablaVentas" style="width: 100%;">

                              <thead>

                                <tr>

                                  <th style="width: 100%;">Descripcion</th>
                                </tr>

                              </thead>

                            </table>


                        


                      </div>
                    </div>
                  </div>
                </div>



      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box " >

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table class="table tablaVentas">

              <thead>

                <tr>

                  <th>Descripcion</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();

      ?>

    </div>

  </div>

</div>






<!--=====================================
MODAL LISTA
======================================-->
<script>
  /*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}

// })// 

$('.tablaVentas').DataTable({
	"ajax": "ajax/datatable-ventas.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function () {

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			var descripcion = respuesta["descripcion"];
			var stock = respuesta["stock"];
			var precio = respuesta["precio_venta"];

			/*=============================================
			EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
			=============================================*/

			if (stock == 0) {

				swal({
					title: "No hay stock disponible",
					type: "error",
					confirmButtonText: "¡Cerrar!"
				});

				$("button[idProducto='" + idProducto + "']").addClass("btn-primary agregarProducto");

				return;

			}

			$(".nuevoProducto").append(

				'<div class="row" style="padding:5px 15px">' +

				'<!-- Descripción del producto -->' +

				'<div class="col-xs-6" style="padding-right:0px">' +

				'<div class="input-group">' +

				'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button></span>' +

				'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="' + idProducto + '" name="agregarProducto" value="' + descripcion + '" readonly required>' +

				'</div>' +

				'</div>' +

				'<!-- Cantidad del producto -->' +

				'<div class="col-xs-3">' +

				'<input type="number" step="any" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto"  stock="' + stock + '" nuevoStock="' + Number(stock - 1) + '" required>' +

				'</div>' +

				'<!-- Precio del producto -->' +

				'<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +

				'<div class="input-group">' +

				'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

				'<input type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" name="nuevoPrecioProducto" value="' + precio + '" readonly required>' +

				'</div>' +

				'</div>' +

				'</div>')

			// SUMAR TOTAL DE PRECIOS

			sumarTotalPrecios()

			// AGREGAR IMPUESTO

			agregarImpuesto()

			// AGRUPAR PRODUCTOS EN FORMATO JSON

			listarProductos()

			// PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			$(".nuevoPrecioProducto").number(true, 2);

			// MENSAJE DE AGREGADO AL PRODUCTO 




			swal({
				title: "Agregado!",
			text: "",
			type: "success",
			confirmButtonText: "¡Cerrar!"
			});
			$("#myModal").modal('hide');

			localStorage.removeItem("quitarProducto");
			

		}

	})
 
});

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaVentas").on("draw.dt", function () {

	if (localStorage.getItem("quitarProducto") != null) {

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for (var i = 0; i < listaIdProductos.length; i++) {

			$("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").addClass('btn-primary agregarProducto');

		}


	}


})


/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

//const lista = document.querySelector("#listaProductos");


$(".formularioVenta").on("click", "button.quitarProducto", function () {

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if (localStorage.getItem("quitarProducto") == null) {

		idQuitarProducto = [];

	} else {

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({ "idProducto": idProducto });

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='" + idProducto + "']").addClass('btn-primary agregarProducto');

	if ($(".nuevoProducto").children().length == 0) {

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total", 0);

	} else {

		// SUMAR TOTAL DE PRECIOS

		sumarTotalPrecios()

		// AGREGAR IMPUESTO

		agregarImpuesto()

		// AGRUPAR PRODUCTOS EN FORMATO JSON

		listarProductos()

	}

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

var numProducto = 0;

$(".btnAgregarProducto").click(function () {

	numProducto++;

	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$(".nuevoProducto").append(

				'<div class="row" style="padding:5px 15px">' +

				'<!-- Descripción del producto -->' +

				'<div class="col-xs-6" style="padding-right:0px">' +

				'<div class="input-group">' +

				'<span class="form-control-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>' +



				'<select  class="input-group select2 select2-hidden-accessible"  id="producto' + numProducto + '" name="nuevaDescripcionProducto" required tabindex="-1" aria-hidden="true" style="width: 220px"> ' +

				'<option  value="">Seleccione eldsdsdsds</option></select>' +

				'</div>' +

				'</div>' +

				'<!-- Cantidad del producto -->' +

				'<div class="col-xs-3 ingresoCantidad">' +

				'<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="0" stock nuevoStock required>' +

				'</div>' +

				'<!-- Precio del producto -->' +

				'<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +

				'<div class="input-group">' +

				'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

				'<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>' +

				'</div>' +

				'</div>' +

				'</div>');


			// AGREGAR LOS PRODUCTOS AL SELECT 

			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index) {

				if (item.stock != 0) {

					$("#producto" + numProducto).append(

						'<option idProducto="' + item.id + '" value="' + item.descripcion + '">' + item.descripcion + '</option>'
					)


				}

			}

			// SUMAR TOTAL DE PRECIOS

			sumarTotalPrecios()

			// AGREGAR IMPUESTO

			agregarImpuesto()

			// PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			$(".nuevoPrecioProducto").number(true, 2);


		}

	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function () {

	var nombreProducto = $(this).val();

	var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");

	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos = new FormData();
	datos.append("nombreProducto", nombreProducto);


	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
			$(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
			$(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"]) - 1);
			$(nuevoPrecioProducto).val(respuesta["precio_venta"]);
			$(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);

			// AGRUPAR PRODUCTOS EN FORMATO JSON

			listarProductos()

		}

	})
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function () {

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var precioFinal = $(this).val() * precio.attr("precioReal");

	precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	if (Number($(this).val()) > Number($(this).attr("stock"))) {

		/*=============================================
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
		=============================================*/

		$(this).val(0);

		$(this).attr("nuevoStock", $(this).attr("stock"));

		var precioFinal = $(this).val() * precio.attr("precioReal");

		precio.val(precioFinal);

		sumarTotalPrecios();

		swal({
			title: "La cantidad supera el Stock",
			text: "¡Sólo hay " + $(this).attr("stock") + " unidades!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;

	}

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO

	agregarImpuesto()

	// AGRUPAR PRODUCTOS EN FORMATO JSON

	listarProductos()

})

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPrecios() {

	var precioItem = $(".nuevoPrecioProducto");

	var arraySumaPrecio = [];

	for (var i = 0; i < precioItem.length; i++) {

		arraySumaPrecio.push(Number($(precioItem[i]).val()));


	}

	function sumaArrayPrecios(total, numero) {

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total", sumaTotalPrecio);


}

/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

function agregarImpuesto() {

	var impuesto = $("#nuevoImpuestoVenta").val();
	var precioTotal = $("#nuevoTotalVenta").attr("total");

	var precioImpuesto = Number(precioTotal * impuesto / 100);

	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

	$("#nuevoTotalVenta").val(totalConImpuesto);

	$("#totalVenta").val(totalConImpuesto);

	$("#nuevoPrecioImpuesto").val(precioImpuesto);

	$("#nuevoPrecioNeto").val(precioTotal);

}

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

$("#nuevoImpuestoVenta").change(function () {

	agregarImpuesto();

});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalVenta").number(true, 2);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$("#nuevoMetodoPago").change(function () {

	var metodo = $(this).val();

	if (metodo == "Efectivo") {

		$(this).parent().parent().removeClass("col-xs-6");

		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			'<div class="col-xs-4">' +

			'<div class="input-group">' +

			'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

			'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>' +

			'</div>' +

			'</div>' +

			'<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">' +

			'<div class="input-group">' +

			'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

			'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>' +

			'</div>' +

			'</div>'

		)

		// Agregar formato al precio

		$('#nuevoValorEfectivo').number(true, 2);
		$('#nuevoCambioEfectivo').number(true, 2);


		// Listar método en la entrada
		listarMetodos()

	} else {

		$(this).parent().parent().removeClass('col-xs-4');

		$(this).parent().parent().addClass('col-xs-6');

		$(this).parent().parent().parent().children('.cajasMetodoPago').html(

			'<div class="col-xs-6" style="padding-left:0px">' +

			'<div class="input-group">' +

			'<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>' +

			'<span class="input-group-addon"><i class="fa fa-lock"></i></span>' +

			'</div>' +

			'</div>')

	}



})

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function () {

	var efectivo = $(this).val();

	var cambio = Number(efectivo) - Number($('#nuevoTotalVenta').val());

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	nuevoCambioEfectivo.val(cambio);

})

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function () {

	// Listar método en la entrada
	listarMetodos()


})


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos() {

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	for (var i = 0; i < descripcion.length; i++) {

		listaProductos.push({
			"id": $(descripcion[i]).attr("idProducto"),
			"descripcion": $(descripcion[i]).val(),
			"cantidad": $(cantidad[i]).val(),
			"stock": $(cantidad[i]).attr("nuevoStock"),
			"precio": $(precio[i]).attr("precioReal"),
			"total": $(precio[i]).val()
		})

	}

	$("#listaProductos").val(JSON.stringify(listaProductos));

}

/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

function listarMetodos() {

	var listaMetodos = "";

	if ($("#nuevoMetodoPago").val() == "Efectivo") {

		$("#listaMetodoPago").val("Efectivo");

	} else {

		$("#listaMetodoPago").val($("#nuevoMetodoPago").val() + "-" + $("#nuevoCodigoTransaccion").val());

	}

}

/*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEditarVenta", function () {

	var idVenta = $(this).attr("idVenta");

	window.location = "index.php?ruta=editar-venta&idVenta=" + idVenta;


})

/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

function quitarAgregarProducto() {

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductos = $(".quitarProducto");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaVentas tbody button.agregarProducto");

	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for (var i = 0; i < idProductos.length; i++) {

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idProductos[i]).attr("idProducto");

		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for (var j = 0; j < botonesTabla.length; j++) {

			if ($(botonesTabla[j]).attr("idProducto") == boton) {

				$(botonesTabla[j]).removeClass("btn-primary agregarProducto");
				$(botonesTabla[j]).addClass("btn-default");

			}
		}

	}

}

/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

$('.tablaVentas').on('draw.dt', function () {

	quitarAgregarProducto();

})


/*=============================================
BORRAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEliminarVenta", function () {

	var idVenta = $(this).attr("idVenta");

	swal({
		title: '¿Está seguro de borrar la venta?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar venta!'
	}).then(function (result) {
		if (result.value) {

			window.location = "index.php?ruta=ventas&idVenta=" + idVenta;
		}

	})

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function () {

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/factura.php?codigo=" + codigoVenta, "_blank");

})

/*=============================================
RANGO DE FECHAS
=============================================*/
 
$('#daterange-btn1').daterangepicker(

	{

		ranges: {
			'Hoy': [moment(), moment()],
			'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
			'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
			'Este mes': [moment().startOf('month'), moment().endOf('month')],
			'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		startDate: moment(),
		endDate: moment()
	},
	function (start, end) {
		
		$('#daterange-btn1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

		var fechaInicial = start.format('YYYY-MM-DD');

		var fechaFinal = end.format('YYYY-MM-DD');

		var capturarRango = $("#daterange-btn1 span").html();
		console.log(capturarRango);

		localStorage.setItem("capturarRango", capturarRango);

		window.location = "index.php?ruta=ventas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

	}

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function () {

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function () {

	var textoHoy = $(this).attr("data-range-key");

	if (textoHoy == "Hoy") {

		var d = new Date();

		var dia = d.getDate();
		var mes = d.getMonth() + 1;
		var año = d.getFullYear();

		// if(mes < 10){

		// 	var fechaInicial = año+"-0"+mes+"-"+dia;
		// 	var fechaFinal = año+"-0"+mes+"-"+dia;

		// }else if(dia < 10){

		// 	var fechaInicial = año+"-"+mes+"-0"+dia;
		// 	var fechaFinal = año+"-"+mes+"-0"+dia;

		// }else if(mes < 10 && dia < 10){

		// 	var fechaInicial = año+"-0"+mes+"-0"+dia;
		// 	var fechaFinal = año+"-0"+mes+"-0"+dia;

		// }else{

		// 	var fechaInicial = año+"-"+mes+"-"+dia;
		//    	var fechaFinal = año+"-"+mes+"-"+dia;

		// }

		dia = ("0" + dia).slice(-2);
		mes = ("0" + mes).slice(-2);

		var fechaInicial = año + "-" + mes + "-" + dia;
		var fechaFinal = año + "-" + mes + "-" + dia;

		localStorage.setItem("capturarRango", "Hoy");

		window.location = "index.php?ruta=ventas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

	}

})

/*=============================================
ABRIR ARCHIVO XML EN NUEVA PESTAÑA
=============================================*/

$(".abrirXML").click(function () {

	var archivo = $(this).attr("archivo");
	window.open(archivo, "_blank");


})






</script>