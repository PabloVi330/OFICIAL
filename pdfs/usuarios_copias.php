<?php
require_once('../TCPDF/tcpdf.php');
require_once('../models/CopiasModels.php');
require_once('../models/FallasModel.php');
require_once('../models/UsuariosModels.php');
require_once('../models/MaquinasModels.php');
class imprimirFactura
{



	public function traerImpresionFactura()
	{

		$idUsuario = $_GET['idUsuario'];
		$idMaquina = $_GET['idMaquina'];
		$copias = new CopiasModel();
		$fallas = new FallasModel();
		$usuario = new UsuarioModel();
		$maquina = new MaquinaModel();
		$tiposCopias = $copias->obtenerCopiasPorTipo();
		$tiposFallas =  $fallas->obtenerFallasPorUsuario($idUsuario);
		$datosUsuario = $usuario->obtenerUsuarioPorID($idUsuario);
		$datosMaquina = $maquina->obtenerMaquinasPorId($idMaquina);
		//echo '<pre>';print_r($tiposFallas); echo '</pre>';
		// echo '<pre>';print_r($datosUsuario);echo '</pre>';
		// echo '<pre>';print_r($datosMaquina);echo '</pre>';
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
										Dirección: 6 de octubre junin y ayacucho #555

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

								<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>$datosMaquina[modelo_M]<br>$datosMaquina[serial_M]</td>

							</tr>

						</table>


					EOF;

		$pdf->writeHTML($bloque1, false, false, false, false, '');

		// ---------------------------------------------------------
		$bloque2 = null;
		if (is_array($tiposCopias)) {

			$bloque2 = <<<EOF

						<table >
							
							<tr>
							
								<td style="width:140px"><img src="images/back.jpg"></td>
								<td style="width:340px; color:#153959; font-size: 30px; font-weight: bold;">REPORTE DE COPIAS</td>
							
							</tr>

						</table>

						<table style="font-size:13px; padding:5px 10px;">
						
							<tr>
							
								<td style="border: 1px solid #666; background-color:white; width:390px">

									Operador : $datosUsuario[nombre_U] 

								</td>

								<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
								
									Fecha: 

								</td>

							</tr>

							<tr>
							
								<td style="border: 1px solid #666; background-color:white; width:540px">Cliente:</td>

							</tr>

							<tr>
							
							<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

							</tr>

						</table>

			EOF;
	    }



		$pdf->writeHTML($bloque2, false, false, false, false, '');




		for ($i = 0; $i < count($tiposCopias); $i++) {
			$copias = new CopiasModel();
			$copiasUsuario = $copias->obtenerCopiasPorUsuario($idUsuario, $tiposCopias[$i]['tipo']);

			// echo '<pre>';
			// print_r($copiasUsuario);
			// echo '</pre>';
			$titulo = $tiposCopias[$i]['tipo'];
			$bloque3 = <<<EOF

				<table style="font-size:10px; padding:5px 10px;">
				<tr>
					
				<td style="border-bottom: 1px bold solid #666 ; font-size:20px; font-weight: bold; color:#051922; width:540px">$titulo</td>

				</tr>
					<tr>
					<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha</td>
					<td style="border: 1px solid #666; background-color:white; width:190px; text-align:center">Cliente</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Numero</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">vales</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Copias</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Sobremate</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Precio</td>
					<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">sub total</td>

					</tr>

				</table>

			EOF;

			$pdf->writeHTML($bloque3, false, false, false, false, '');

			// ------------contenidos---------------------------------------------
			$total = 0;
			foreach ($copiasUsuario as $key => $copias) {

				$total += $copias['sub_total'];

				$bloque4 = <<<EOF

					<table style="font-size:8px; padding:5px 10px;">

						<tr  style="font-size:8px;">
							<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">
								$copias[fecha]
							</td>

							<td style="border: 1px solid #666; background-color:white; width:190px; text-align:center">
								$copias[nombre_cliente]
							</td>

							<td style="border: 1px solid #666;  background-color:white; width:50px; text-align:center">
								$copias[codigo]
							</td>

							<td style="border: 1px solid #666;  background-color:white; width:50px; text-align:center">
								$copias[vales]
							</td>

							<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center"> 
								$copias[copias]
							</td>
							<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">
								$copias[sobrantes]
							</td>
							<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">
								$copias[precio]
							</td>
							<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">
								$copias[sub_total]
							</td>


						</tr>

					</table>
				EOF;

				$pdf->writeHTML($bloque4, false, false, false, false, '');
			}

			// --------------totales-------------------------------------------

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
										Bs $total
									</td>

								</tr>

							</table>

						EOF;

			$pdf->writeHTML($bloque5, false, false, false, false, '');
		}

		// -----------Fallas---------------------------------------------

		if (true) {
			$totalFallas = 0;
			$bloque6 = <<<EOF

				<table style="font-size:10px; padding:5px 10px;">
				<tr>
					
				<td style="border-bottom: 1px bold solid #666 ; font-size:20px; font-weight: bold; color:#051922; width:540px">Fallas</td>

				</tr>
					<tr>
					<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha</td>
					<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Tipo</td>
					<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Copias</td>
					<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Precio</td>
					<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">sub total</td>

					</tr>

				</table>

			EOF;

			$pdf->writeHTML($bloque6, false, false, false, false, '');

			// ------------contenidos---------------------------------------------
			$total = 0;
			foreach ($tiposFallas as $key => $falla) {

				$totalFallas += $falla['sub_total_F'];

				$bloque7 = <<<EOF

					<table style="font-size:8px; padding:5px 10px;">

						<tr  style="font-size:8px;">
							<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">
								$falla[fecha_F]
							</td>

							<td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">
								$falla[tipo_F]
							</td>

							<td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">
								$falla[cantidad_F]
							</td>

							<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center"> 
								$falla[precio_F]
							</td>
							<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">
								$falla[sub_total_F]
							</td>
						</tr>

					</table>
				EOF;

				$pdf->writeHTML($bloque7, false, false, false, false, '');
			}

			// --------------totales-------------------------------------------

			$bloque8 = <<<EOF

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
										Bs $totalFallas
									</td>

								</tr>

							</table>

						EOF;

			$pdf->writeHTML($bloque8, false, false, false, false, '');
		}



		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO 

		$pdf->Output('ddd.pdf');
	}
}

$factura = new imprimirFactura();
$factura->traerImpresionFactura();
