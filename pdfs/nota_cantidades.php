<?php
require_once('../TCPDF/tcpdf.php');
require_once('../models/MantenimientosModels.php');
require_once('../models/VentasModels.php');

class MyPDF extends TCPDF
{
    // Método para definir el pie de página
    public function Footer()
    {
        // Configura el pie de página
        $this->SetY(-15); // Posición vertical a 15 mm del final de la página
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Despues de la recepcion del equipo tiene un plazo de 90 dias para el recojo cado contrario se le sumaran costo de almasenaje - Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C');
    }
}

class imprimirFactura
{

    private $total;

    public function traerImpresionFactura()
    {
        
        $id_mantenimiento = $_GET['id_mantenimiento'];
        $mantenimiento = new MantenimientoModel();
        $m = $mantenimiento->obtenerMantenimientoPorId($id_mantenimiento);
        $venta = new VentaModel();
        $v = $venta->obtenerVentasPorFiltro('fk_id_mantenimiento', $id_mantenimiento);
        
       
        $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->startPageGroup();

        $pdf->AddPage();

       

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
    
                <td style="background-color:white; width:110px; text-align:center; color:red"><br><br>NOTA N.<br>{$m['id_mantenimiento']}</td>
    
            </tr>
    
        </table>
    
    
    EOF;

            $pdf->writeHTML($bloque1, false, false, false, false, '');

            // ---------------------------------------------------------
            $bloque2 = null;
            if (is_array($m)) {

    $bloque2 = <<<EOF
    
        <table >
            
            <tr>
               
                <td style="width:140px"><img src="images/back.jpg"></td>
                <td style="width:340px; color:#153959; font-size: 30px; font-weight: bold;">NOTA DE SERVICIO</td>
            
            </tr>
    
        </table>
    
        <table style="font-size:11px; padding:5px 10px;">
        
            <tr>
            
                <td style="border: 1px solid #666; background-color:white; width:390px">
    
                    Cliente: $m[nombre_cliente] 
    
                </td>
    
                <td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
                
                    Fecha: $m[fecha_recepcion]
    
                </td>
    
            </tr>
    
            <tr>
               
                <td style="border: 1px solid #666; background-color:white; width:190px">Modelo: $m[modelo]</td>
                <td style="border: 1px solid #666; background-color:white; width:200px">Serial: $m[serial]</td>
                <td style="border: 1px solid #666; background-color:white; width:150px">Tipo: $m[tipo]</td>
    
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
    
        <table style="font-size:11px; padding:5px 10px;">
    
            <tr>
            <td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">N.Venta</td>
            <td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Producto</td>
            <td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
            <td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Valor Unit.</td>
            <td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Valor Total</td>
    
            </tr>
    
        </table>
    
    EOF;

            $pdf->writeHTML($bloque3, false, false, false, false, '');

            // ---------------------------------------------------------[{"id":"1","descripcion":"SIN nada de descripcion","precio":"200","cantidad":1,"subtotal":"200","stock":"100"}]

    for ($i=0; $i <count($v) ; $i++) { 
            $this->total  =   $this->total + $v[$i]['importe_V'];
            $id_venta = $v[$i]["id_venta"];
            $detalle = json_decode($v[$i]['detalle_V'], true);
            if($v[$i]['estado_V'] == "CANCELADO"){
                foreach ($detalle as $key => $item) {

                    $bloque4 = <<<EOF
        
                        <table style="font-size:11px; padding:5px 10px;">
                    
                            <tr>
                                <td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">
                                $id_venta
                                </td>
                                <td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">
                                $item[descripcion]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">
                                    $item[cantidad]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:white; width:80px; text-align:center">Bs
                                $item[precio]
                                </td>
                    
                                <td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Bs 
                                $item[subtotal]
                                </td>
                    
                    
                            </tr>
                    
                        </table>
                    
                    
                    EOF;
    
                    $pdf->writeHTML($bloque4, false, false, false, false, '');
                }
            }
            if($v[$i]['estado_V'] == "POR PAGAR"){
                foreach ($detalle as $key => $item) {

                    $bloque4 = <<<EOF
        
                        <table style="font-size:11px; padding:5px 10px;">
                    
                            <tr>
                                <td style="border: 1px solid #666; background-color:orange; width:40px; text-align:center">
                                $id_venta
                                </td>
                                <td style="border: 1px solid #666; background-color:orange; width:260px; text-align:center">
                                $item[descripcion]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:orange; width:80px; text-align:center">
                                    $item[cantidad]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:orange; width:80px; text-align:center">Bs
                                $item[precioUnit]
                                </td>
                    
                                <td style="border: 1px solid #666; background-color:orange; width:80px; text-align:center">Bs 
                                $item[subtotal]
                                </td>
                    
                    
                            </tr>
                    
                        </table>
                    
                    
                    EOF;
    
                    $pdf->writeHTML($bloque4, false, false, false, false, '');
                }

            }

    }      
 // ---------------------------------------------------------llamda a reparaciones
$rep = $mantenimiento->obtenerReparacionFiltro('fk_id_mantenimiento', $id_mantenimiento);

foreach ($rep as $key => $item) {
    $sub = 0;
    $sub = $sub + $item['cantidad'] * $item['precio'] ;
    $this->total = $this->total + ($item['cantidad'] * $item['precio']);
                    $bloque4 = <<<EOF
        
                        <table style="font-size:11px; padding:5px 10px;">
                    
                            <tr>
                                <td style="border: 1px solid #666; background-color:aliceblue; width:40px; text-align:center">
                                $item[id_reparacion]
                                </td>
                                <td style="border: 1px solid #666; background-color:aliceblue; width:260px; text-align:center">
                                $item[detalle]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:aliceblue; width:80px; text-align:center">
                                    $item[cantidad]
                                </td>
                    
                                <td style="border: 1px solid #666;  background-color:aliceblue; width:80px; text-align:center">Bs
                                $item[precio]
                                </td>
                    
                                <td style="border: 1px solid #666; background-color:aliceblue; width:80px; text-align:center">Bs 
                                 $sub
                                </td>
                    
                    
                            </tr>
                    
                        </table>
                    
                    
                    EOF;
    
                    $pdf->writeHTML($bloque4, false, false, false, false, '');
                }


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
                    Bs $this->total
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
            $pdf->SetAutoPageBreak(true, 140);
    



        // ---------------------------------------------------------
        //SALIDA DEL ARCHIVO 

        $pdf->Output('Nota_Venta.pdf');
    }
}

$factura = new imprimirFactura();
$factura->traerImpresionFactura();
