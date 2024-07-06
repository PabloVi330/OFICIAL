<?php
require_once('../TCPDF/tcpdf.php');
require_once('../models/ComprasModels.php');
require_once('../models/ArticulosModels.php');
require_once('../models/SucursalesModels.php');
require_once('../models/ProveedoresModels.php');


class imprimirFactura{



public function traerImpresionFactura(){

$id_compra = $_GET['id_compra'];
$comprasModels = new ComprasModel();
$sucursalModels = new Sucursal();
$proveedorModels =  new ProveedorModel();

$compra = $comprasModels->obtenerCompraPorId($id_compra);
$sucursal = $sucursalModels->obtenerSucursal($compra['fk_id_sucursal']);
$proveedor = $proveedorModels->obtenerProveedorPorId($compra['proveedor_C']);

$comprasModels->imprimirCompras($id_compra);
$detalle = json_decode($compra['detalle_C'],true);
$costo = $compra['costo_C'];
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
					Dirección: $sucursal[direccion_S]

				</div>

			</td>
 
			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px; font-size:11px;">
					
					<br>
					Teléfono:$sucursal[telefono_S]
					
					<br>
				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br>NOTA Nro:{$compra['id_compra']}</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------
$bloque2 = null;
if (is_array($compra)) {

$bloque2 = <<<EOF

	<table >
		
		<tr>
		   
			<td style="width:140px"><img src="images/back.jpg"></td>
			<td style="width:340px; color:#153959; font-size: 30px; font-weight: bold;">NOTA DE COMPRA</td>
		
		</tr>

	</table>

	<table style="font-size:13px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Comprador: $compra[nombre_usuario] 

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $compra[fecha_C]

			</td>

		</tr>

		<tr>
		   
			<td style="border: 1px solid #666; background-color:white; width:540px">Proveedor: $proveedor[nombre_Pro]</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;
}



$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:12px; padding:5px 10px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">Codigo</td>
		<td style="border: 1px solid #666; background-color:white; width:240px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($detalle as $key => $item) {

$c = new ArticuloModel();
$cc = $c->obtenerArticuloPorId($item['id']);
$descripcion =  json_decode($cc['descripcion_A'], true);
$des = $descripcion['detalle'];
$valorUnitario = number_format($item["precio_neto"], 2);
$precioTotal = number_format($item["subtotal"], 2);

$bloque4 = <<<EOF

	<table style="font-size:13px; padding:5px 2px;">

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">
				$cc[codigo_A]
			</td>
			<td style="border: 1px solid #666; background-color:white; width:240px; text-align:center">
				$des
			</td>

			<td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">
				$item[cantidad_compra]
			</td>

			<td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">Bs
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Bs 
				$precioTotal
			</td>


		</tr>

	</table>


EOF;

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
				Bs $costo
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

$factura = new imprimirFactura();
$factura -> traerImpresionFactura();
