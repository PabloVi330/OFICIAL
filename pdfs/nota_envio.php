<?php
require_once('../TCPDF/tcpdf.php');
require_once('../models/VentasModels.php');
require_once('../models/ZonasModels.php');
class imprimirFactura
{



	public function traerImpresionFactura()
	{


		$idZona = $_GET['idZona'];
		$ventas = new VentaModel();
		$zona =  new Zona();
		$datosZona =  $zona->obtenerZonaPorId($idZona);

		$dia = '';


		if (isset($_GET['fecha'])) {
			$fecha = $_GET['fecha'];
			$dates = explode(' to ', $fecha);

			if (count($dates) !== 2) {

				$sql = "SELECT * FROM ventas WHERE DATE(ventas.fecha) ='$fecha' AND id_zona = $idZona ";
				$dia = $fecha;
			} else {
				$dates = explode(' to ', $fecha);
				$startDate = $dates[0];
				$endDate = $dates[1];
				$dia = $fecha;
				$sql = "SELECT * FROM ventas WHERE DATE(ventas.fecha) BETWEEN '$startDate' AND '$endDate' AND id_zona = $idZona ";
			}
		}

		$ventasResultado = $ventas->obtenerVentasPorCore($sql);

		// echo '<pre>';
		// print_r($datosZona);
		// echo '</pre>';
		$productoContador = [];

		foreach ($ventasResultado as $row) {
			// Procesar cada fila
			$productos = json_decode($row['productos'], true);

			foreach ($productos as $producto) {
				$productoId = $producto['id'];
				$productoCantidad = floatval($producto['cantidad']);
				$productoDescripcion = $producto['descripcion'];

				if (isset($productoContador[$productoId])) {
					$productoContador[$productoId]['cantidad'] += $productoCantidad;
				} else {
					$productoContador[$productoId] = [
						'cantidad' => $productoCantidad,
						'descripcion' => $productoDescripcion,
						'id' => $productoId
					];
				}
			}
		}
		// Ordenar los productos alfabéticamente por su descripción
		usort($productoContador, function ($a, $b) {
			return strcmp($a['descripcion'], $b['descripcion']);
		});


		// echo '<pre>';
		// print_r($productoContador);
		// echo '</pre>';



		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->startPageGroup();

		$pdf->AddPage();

		// ---------------------------------------------------------


		$bloque1 = <<<EOF
			<table  >
				<tr style="font-size:13px;">
					<td style="width:150px"><img src="logo.png"></td>
					<td   style="font-size:13px; background-color:white; width:140px">
						<div style="font-size:8.5px; text-align:right; line-height:15px; font-size:11px;">
							<br>
							Dirección: Pdte. Montes Leon y Rodrigues #555
						</div>
					</td>
					<td style="background-color:white; width:140px">
						<div style="font-size:8.5px; text-align:right; line-height:15px; font-size:11px;">
							<br>
							Teléfono: 65420150
							<br>
							74624206
						</div>
					</td>
					<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>NOTA N.<br></td>
				</tr>
			</table>
		EOF;
		$pdf->writeHTML($bloque1, false, false, false, false, '');


		
		$bloque2 = <<<EOF
				<table >
							<tr>
								<td style="width:140px"><img src="images/back.jpg"></td>
								<td style="width:340px; color:#153959; font-size: 30px; font-weight: bold;">NOTA DE VENTA</td>
							</tr>

						</table>

						<table style="font-size:13px; padding:5px 10px;">
							<tr>
								<td style="border: 1px solid #666; background-color:white; width:260px">
											Zona: $datosZona[nombre_Z]
								</td>
								<td style="border: 1px solid #666; background-color:white; width:260px"> 	
											Fecha:  $dia
								</td>		
							</tr>
										
						</table>
						<table >
							<tr>
								<td style="width:140px"><img src="images/back.jpg"></td>
							</tr>
				</table>
EOF;


$pdf->writeHTML($bloque2, false, false, false, false, '');



$bloque3 = <<<EOF

					<table style="font-size:10px; padding:5px 10px;">

						<tr>
						<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center"item</td>
						<td style="border: 1px solid #666; background-color:white; width:300px; text-align:center">Producto</td>
						<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Cantidad</td>
						</tr>

					</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
        $numItem = 1;
		foreach ($productoContador as $key => $item) {

			//$c = new ProductoModel();
			//$cc = $c->obtenerProductoPorId($item['id']);
			$id = $item['id'];
			$des = $item['descripcion'];
			$cant = $item['cantidad'];


			$bloque4 = <<<EOF
		
			<table style="font-size:9px; padding:5px 10px;">
				<tr>
					<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
						$numItem
					</td>

					<td style="border: 1px solid #666; background-color: white; width: 300px; text-align: center; display: flex; align-items: flex-start;">
							$des
					</td>

					<td style="border: 1px solid #666;  background-color:white; width:70px; text-align:center">
						$cant
					</td>

				</tr>
			</table>
		EOF;
		$numItem++;

			$pdf->writeHTML($bloque4, false, false, false, false, '');
		}


		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO 

		$pdf->Output('Nota_Venta.pdf');
	}
}

$factura = new imprimirFactura();
$factura->traerImpresionFactura();
