<?php

require 'vendor/autoload.php'; // Ajusta la ruta según tu configuración
include('../models/db_conection.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once('../TCPDF/tcpdf.php');
require_once('../models/VentasModels.php');
require_once('../models/ZonasModels.php');

$spreadsheet = new Spreadsheet();

// Obtener la hoja activa
$sheet = $spreadsheet->getActiveSheet();
$estiloTituloColumnas = [
    'font' => [
        'bold' => true,
        'size' => 9,
        'color' => [
            'rgb' => 'FFFFFF'
        ]
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '538DD5'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ]
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ]
];

$idZona = $_GET['idZona'];
$ventas = new VentaModel();
$zona =  new Zona();
$datosZona =  $zona->obtenerZonaPorId($idZona);
$sql = '';

if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $dates = explode(' to ', $fecha);

    if (count($dates) !== 2) {

        $sql = "SELECT * FROM ventas WHERE DATE(ventas.fecha) ='$fecha' AND id_zona = $idZona ";
    } else {
        $dates = explode(' to ', $fecha);
        $startDate = $dates[0];
        $endDate = $dates[1];
        $sql = "SELECT * FROM ventas WHERE DATE(ventas.fecha) BETWEEN '$startDate' AND '$endDate' AND id_zona = $idZona ";
    }
}

// Inicializar variables
$tt = 0;
$it = 0;
$ventasResultado = $ventas->obtenerVentasPorCore($sql);

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

$fila = 4;
// Iterar sobre clientes

$sheet->mergeCells('A' . $fila . ':C' . $fila);
$sheet->setCellValue('A' . $fila, "Entregas de productos ->" . $sql);
$sheet->getStyle('A' . $fila . ':C' . $fila)->applyFromArray($estiloTituloColumnas);

// Incrementar la fila para los encabezados
$fila++;

$sheet->getColumnDimension('A')->setWidth(10);
$sheet->setCellValue('A' . $fila, 'Numero');
$sheet->getColumnDimension('B')->setWidth(45);
$sheet->setCellValue('B' . $fila, 'Producto');
$sheet->getColumnDimension('C')->setWidth(10);
$sheet->setCellValue('C' . $fila, 'cantidad');
$sheet->getStyle('A' . $fila . ':C' . $fila)->applyFromArray($estiloTituloColumnas);

$fila++;
foreach ($productoContador as $producto) {

    $sheet->setCellValue('A' . $fila, $producto['cantidad']);
    $sheet->setCellValue('B' . $fila, $producto['descripcion']);
    $sheet->setCellValue('C' . $fila, $producto['cantidad']);
    $fila++;
}

// Crear un escritor
$writer = new Xlsx($spreadsheet);

// Configurar encabezados para la descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="inventario.xlsx"');
header('Cache-Control: max-age=0');

// Enviar el archivo al navegador
$writer->save('php://output');
exit();
