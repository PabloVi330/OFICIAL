<?php
require_once('../TCPDF/tcpdf.php');
require_once('../models/VentasModels.php');
require_once('../models/ProductosModels.php');


class imprimirFactura
{



	public function traerImpresionFactura()
	{

		$id_venta = $_GET['id_venta'];
		$ventasModels = new VentaModel();
		$venta = $ventasModels->obtenerVentasPorId($id_venta);
		$ventasModels->imprimirVenta($id_venta);
		//echo "<pre>"; print_r( $venta); echo "</pre>";

		$detalle = json_decode($venta['productos'], true);
		$total_V = number_format($venta['total'], 2, ',', '.');
		$estado_V = $venta['estado'];

		$timestamp = strtotime($venta['fecha']);
		$fecha = date("Y-m-d", $timestamp);
		$hora = date("H:i:s", $timestamp);
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		//echo '<pre>';print_r($venta);echo '</pre>';
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

					<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>NOTA N.<br>$venta[total]</td>

				</tr>

			</table>


		EOF;



		$pdf->writeHTML($bloque1, false, false, false, false, '');

		// ---------------------------------------------------------
		$bloque2 = null;
		if (is_array($venta)) {
			$bloque2 = <<<EOF

					<table >
						<tr>
							<td style="width:140px"><img src="images/back.jpg"></td>
							<td style="width:340px; color:#153959; font-size: 30px; font-weight: bold;">NOTA DE VENTA</td>
						</tr>

					</table>

					<table style="font-size:13px; padding:5px 10px;">
						<tr>
							<td style="border: 1px solid #666; background-color:white; width:390px">
								Cliente: $venta[nombre_cliente]  -- Cel. 
							</td>
							<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
								Fecha: $fecha
							</td>
						</tr>
						<tr>
							<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $venta[nombre_usuario]</td>
						</tr>
						<tr>
						<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>
						</tr>
					</table>

				EOF;


			$pdf->writeHTML($bloque2, false, false, false, false, '');

			$bloque3 = <<<EOF

					<table style="font-size:10px; padding:5px 10px;">

						<tr>
						<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">item</td>
						<td style="border: 1px solid #666; background-color:white; width:230px; text-align:center">Producto</td>
						<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Cantidad</td>
						<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Valor Unit.</td>
						<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Valor Total</td>
						</tr>

					</table>

				EOF;

			$pdf->writeHTML($bloque3, false, false, false, false, '');

			// ---------------------------------------------------------
			$num = 1;
			foreach ($detalle as $key => $item) {

				$c = new ProductoModel();
				$cc = $c->obtenerProductoPorId($item['id']);
				$des = $cc['descripcion'];


				$valorUnitario = number_format($item["precio_venta"], 2, ',', '.');
				$precioTotal = number_format($item["sub_total"], 2, ',', '.');


				$bloque4 = <<<EOF
			
				<table style="font-size:9px; padding:5px 10px;">

					<tr>
						<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
							$num
						</td>

						<td style="border: 1px solid #666; background-color: white; width: 230px; text-align: center; display: flex; align-items: flex-start;">
							
								$des
							
						</td>

					


						<td style="border: 1px solid #666;  background-color:white; width:70px; text-align:center">
							$item[cantidad]
						</td>

						<td style="border: 1px solid #666;  background-color:white; width:70px; text-align:center">Bs
						$valorUnitario
						</td>
						
						

						<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Bs 
							$precioTotal
						</td>


					</tr>

				</table>


			EOF;

				$num++;

				$pdf->writeHTML($bloque4, false, false, false, false, '');
			}





			// ---------------------------------------------------------


			$bloque5 = <<<EOF

					<table style="font-size:13px; padding:5px 10px;">
				
						<tr>
				
							<td style="background-color:white; width:340px; text-align:center"></td>
				
							<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>
				
							<td style="border-bottom: 1px solid #666;  background-color:white; width:100px; text-align:center"></td>
				
						</tr>
						
							
				
						<tr>
						
							<td style="border-right: 1px solid #666;  background-color:white; width:340px; text-align:center"></td>
				
							<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
								Total:
							</td>
							
							<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
								Bs $total_V
							</td>
				
						</tr>
						<tr>
						
							<td style="width:140px"><img src="images/back.jpg"></td>
							<td style="width:140px"><img src="images/back.jpg"></td>
						
						
						</tr>
						<tr>
						
						<td style="width:140px"><img src="images/back.jpg"></td>
						<td style="width:140px"><img src="images/back.jpg"></td>
					
					
					</tr>
					<tr>
						
					<td style="width:140px"><img src="images/back.jpg"></td>
					<td style="width:140px"><img src="images/back.jpg"></td>
				
				
				</tr>
						
						<tr>
						
							<td style="width:140px"><img src="images/back.jpg"></td>
							<td style="width:140px"><img src="images/back.jpg"></td>
							<td style="width:340px; color:#153959; font-size: 15px; font-weight: bold;">   !Gracias por su preferencia!!!!!</td>
						
						</tr>
				
						
				
				
					</table>
				
				EOF;

			$pdf->writeHTML($bloque5, false, false, false, false, '');



			// ---------------------------------------------------------
			//SALIDA DEL ARCHIVO 

			$pdf->Output('Nota_Venta.pdf');
		}
	}
}

$factura = new imprimirFactura();
$factura->traerImpresionFactura();
