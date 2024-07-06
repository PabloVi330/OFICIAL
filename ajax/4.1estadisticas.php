<?php
session_start();
$area = $_SESSION['area_U'];
?>
 <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 <!-- flatpickr css -->
 <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css">

 <!-- DataTables -->
 <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 <!-- Responsive datatable examples -->
 <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 <!-- selecte -->
 <link href="assets/libs/select2/select2.min.css" />
 <link href="assets/libs/selectize/selectize.css" rel="stylesheet" type="text/css" />
 <div class="page-content">
     <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                     <h4 class="mb-sm-0 font-size-18">Reportes</h4>

                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Red Extel </a></li>
                             <li class="breadcrumb-item active">Reportes</li>
                         </ol>
                     </div>

                 </div>
             </div>
         </div>
         <!-- end page title -->



         <!-- CARDS DE CANTIDADES -->
         <div class="row">
             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body ">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Usuarios</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value text-center" id="usuarios"></span>
                                 </h4>
                             </div>

                             <div class="col-6">
                                 <i class=" fas fa-user-check fa-4x"></i>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-success text-success">activos</span>
                             <span class="ms-1 text-muted font-size-13">sin observaciones</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Grupos</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" id="grupos">0</span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <i class=" far fa-object-group fa-4x"></i>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-primary text-danger">Activos</span>
                             <span class="ms-1 text-muted font-size-13">Homologados</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col-->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Clientes</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" id="clientes"></span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <i class="fas fa-user-tag fa-4x"></i>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-success text-success">+
                                 Activos</span>
                             <span class="ms-1 text-muted font-size-13">Sin Observasiones</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Proveedores</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" id="proveedores">9</span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <i class=" fas fa-house-user fa-4x"></i>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-info text-success">Activos</span>
                             <span class="ms-1 text-muted font-size-13">Since
                                 last week</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->
         </div><!-- end row-->



         <div class="container-fluid">

             <!-- start page title -->
             <div class="row">
                 <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center
            justify-content-between">
                         <h4 class="mb-sm-0 font-size-18">Ventas</h4>

                         <div class="page-title-right">
                             <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript:
                            void(0);">Charts</a></li>
                                 <li class="breadcrumb-item active">Apexcharts</li>
                             </ol>
                         </div>

                     </div>
                 </div>
             </div>
             <!-- end page title -->
             <?php if ($area == "administrador" ) {
             ?>
             <div class="row">
                 <div class="col-xl-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title mb-0">Ventas Mensuales</h4>
                         </div>
                         <div class="card-body">

                             <div id="chart"></div>
                         </div>
                     </div><!--end card-->
                 </div>
             </div>
             <?php }  ?>



             <div class="d-flex align-items-center gap-1 mb-4">

             </div>

             <div class="row">
             <?php if ($area == "administrador" ) {
             ?>

                 <div class="col-xl-6">
                     <div class="row">
                         <div class="input-group datepicker-range col-lg-4">
                             <input type="text" class="form-control flatpickr-input " data-input aria-describedby="rango1" id="rango1" placeholder="Rango de fechas">
                             <button class="input-group-text" id="rango1" data-toggle><i class="bx bx-calendar-event"></i></button>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title mb-0">Ventas Por Usuarios</h4>
                         </div>
                         <div class="card-body">
                             <div id="ventasUsuario"></div>
                         </div>
                     </div><!--end card-->
                 </div>
                 <?php }  ?>

                 <div class="col-xl-6">
                     <div class="row">
                         <div class="input-group datepicker-range col-lg-4">
                             <input type="text" class="form-control flatpickr-input " data-input aria-describedby="rango" id="rango" placeholder="Rango de fechas">
                             <button class="input-group-text" id="rango" data-toggle><i class="bx bx-calendar-event"></i></button>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title mb-0">Ventas Por Usuario</h4>

                         </div>
                         <div class="card-body">
                             <div id="usuario" data-colors='[" #5156be" ,"#2ab57d" ,"#fd625e" ,"#ffbf53" ]' class="apex-charts" dir="ltr"></div>
                         </div>
                     </div><!--end card-->

                 </div>
             </div>
             <!-- end row -->


         </div> <!-- container-fluid -->


     </div>
     <!-- container-fluid -->
 </div>
 <!-- End Page-content -->



 <!-- flatpickr js -->
 <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
 <!-- apexcharts js -->
 <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

 <!-- apexcharts init -->
 <!--ckeditor js-->
 <script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
 <!-- email editor init -->
 <script src="assets/js/pages/email-editor.init.js"></script>
 <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
 <!-- Buttons examples -->
 <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
 <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
 <script src="assets/libs/jszip/jszip.min.js"></script>
 <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
 <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
 <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
 <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
 <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
 <!-- Responsive examples -->
 <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
 <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

 <!-- Datatable init js -->
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
 <!-- flatpickr js -->
 <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

 <!-- Required datatable js -->
 <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
 <!-- Responsive examples -->
 <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
 <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
 <!-- init js -->
 <script src="assets/js/pages/invoices-list.init.js"></script>
 <script src="assets/libs/selectize/selectize.js"></script>


 <script>
     $('#checkAll').on('change', function() {
         $('.table-check .form-check-input').prop('checked', $(this).prop("checked"));
     });
     $('.table-check .form-check-input').change(function() {
         if ($('.table-check .form-check-input:checked').length == $('.table-check .form-check-input').length) {
             $('#checkAll').prop('checked', true);
         } else {
             $('#checkAll').prop('checked', false);
         }
     });
 </script>
 <script>
     $(document).ready(function() {

         // Consulta SQL para obtener las ventas por mes
         var sql = "SELECT YEAR(fecha) AS anio, MONTH(fecha) AS mes, FORMAT(SUM(total), 2) AS total_ventas FROM ventas GROUP BY YEAR(fecha), MONTH(fecha) ORDER BY YEAR(fecha), MONTH(fecha);";

         $.ajax({
             url: './controllers/VentasControllers.php?action=obtenerVentasPorCore',
             method: 'POST',
             dataType: 'json',
             data: {
                 sql: sql
             },
             success: function(response) {
                 // Procesar la respuesta JSON
                 const seriesData = response.map(v => parseFloat(v.total_ventas.replace(/,/g, '')));
                 const categories = response.map(v => `${v.anio}-${v.mes.toString().padStart(2, '0')}`);

                 var options = {
                     series: [{
                         name: 'Ventas',
                         data: seriesData
                     }],
                     chart: {
                         height: 350,
                         type: 'line',
                         zoom: {
                             enabled: true // Habilitar el zoom
                         }
                     },
                     title: {
                         text: 'Total de Ventas por Mes'
                     },
                     xaxis: {
                         categories: categories
                     },
                     yaxis: {
                         labels: {
                             formatter: function(value) {
                                 return value.toLocaleString('en-US', {
                                     minimumFractionDigits: 2,
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     },
                     tooltip: {
                         y: {
                             formatter: function(value) {
                                 return value.toLocaleString('en-US', {
                                     minimumFractionDigits: 2,
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     }
                 };

                 // Crear y renderizar el gráfico
                 var chart = new ApexCharts(document.querySelector("#chart"), options);
                 chart.render();
             },
             error: function(xhr, status, error) {
                 console.error('Error al obtener los datos:', error);
             }
         });

         $.ajax({
             url: './controllers/VentasControllers.php?action=obtenerVentasPorCore',
             method: 'POST',
             dataType: 'json',
             data: {
                 sql: "SELECT usuarios.nombre AS nombre_vendedor, id_vendedor, SUM(ventas.total) AS total_sum, COUNT(ventas.id) AS ventas_count FROM ventas INNER JOIN usuarios ON ventas.id_vendedor = usuarios.id WHERE DATE(ventas.fecha) = '2024-05-18' GROUP BY id_vendedor, usuarios.nombre;"
             },
             success: function(response) {
                 console.log("response")

                 console.log(response)

             },
             error: function(xhr, status, error) {
                 console.error('Error al obtener los datos:', error);
             }
         });



     });
 </script>

 <script>
     var cambioCount = 0;
     var selectedDate = "";
     var chartUsuario = ''
     $('#rango1').on('change', function() {
         cambioCount++;
         if (cambioCount > 1) {
             console.log('El valor del input ha cambiado a:', $(this).val());
             var dateRange = $(this).val();
             selectedDate = dateRange;
             cambioCount = 0;
             if (chartUsuario) {
                 chartUsuario.destroy(); // Destruir el gráfico existente si lo hay
             }

             ventasUsuarios(selectedDate);
         }
     });
     var hoy = new Date();
     var dia = hoy.getDate().toString().padStart(2, '0');
     var mes = (hoy.getMonth() + 1).toString().padStart(2, '0');
     var año = hoy.getFullYear();

     var selectedDate = `${año}-${mes}-${dia}`

     function ventasUsuarios(fechas) {
         var sql = ''
         let partes = fechas.split(' to ');
         if (partes.length !== 2) {
             let fecha = partes[0];
             sql = `SELECT usuarios.nombre AS nombre_vendedor, id_vendedor, SUM(ventas.total) AS total_sum, COUNT(ventas.id) AS ventas_count FROM ventas INNER JOIN usuarios ON ventas.id_vendedor = usuarios.id WHERE DATE(ventas.fecha) = '${fecha}' GROUP BY id_vendedor, usuarios.nombre;`

         } else {
             let fechaInicio = partes[0];
             let fechaFin = partes[1];
             sql = `SELECT usuarios.nombre AS nombre_vendedor, id_vendedor, SUM(ventas.total) AS total_sum, COUNT(ventas.id) AS ventas_count FROM ventas INNER JOIN usuarios ON ventas.id_vendedor = usuarios.id WHERE DATE(ventas.fecha) BETWEEN '${fechaInicio}' AND '${fechaFin}'  GROUP BY id_vendedor, usuarios.nombre;`
         }

         console.log(sql)

         $.ajax({
             url: './controllers/VentasControllers.php?action=obtenerVentasPorCore',
             method: 'POST',
             dataType: 'json',
             data: {
                 sql: sql
             },
             success: function(response) {
                 console.log("Response1:", response);

                 // Extraer nombres de vendedores, sumas totales de ventas y cantidades de ventas
                 const nombresVendedores = response.map(data => data.nombre_vendedor);
                 const sumasVentas = response.map(data => data.total_sum);
                 const cantidadesVentas = response.map(data => data.ventas_count);

                 // Configuración del gráfico
                 var options = {
                     chart: {
                         type: 'bar',
                         zoom: {
                             enabled: true // Habilitar el zoom
                         }
                     },
                     series: [{
                         name: 'Total de Ventas',
                         data: sumasVentas.map(num => num.toLocaleString('es-ES', {
                             maximumFractionDigits: 2
                         }))
                     }],
                     xaxis: {
                         categories: nombresVendedores
                     },
                     yaxis: [{
                         title: {
                             text: 'Total de Ventas'
                         },
                         labels: {
                             formatter: function(val) {
                                 return val.toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     }, {
                         opposite: true,
                         title: {
                             text: 'Cantidad de Ventas'
                         },
                         labels: {
                             formatter: function(val) {
                                 return val.toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     }],
                     tooltip: {
                         y: {
                             formatter: function(value, {
                                 seriesIndex,
                                 dataPointIndex,
                                 w
                             }) {
                                 var totalFormatted = sumasVentas[dataPointIndex].toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                                 var ventasFormatted = cantidadesVentas[dataPointIndex].toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                                 return 'Total: ' + totalFormatted + ' (Ventas: ' + ventasFormatted + ')';
                             }
                         }
                     },
                     title: {
                         text: 'Ventas por Vendedor',
                         align: 'center'
                     },
                     dataLabels: {
                         enabled: true,
                         formatter: function(value, {
                             seriesIndex,
                             dataPointIndex,
                             w
                         }) {
                             return 'Ventas: ' + cantidadesVentas[dataPointIndex].toLocaleString('es-ES', {
                                 maximumFractionDigits: 2
                             });
                         },
                         offsetX: 0,
                         offsetY: -20,
                         style: {
                             fontSize: '12px',
                             colors: ["#304758"]
                         }
                     }
                 };



                 // Crear y renderizar el gráfico
                 chartUsuario = new ApexCharts(document.querySelector("#ventasUsuario"), options);
                 chartUsuario.render();
             },
             error: function(xhr, status, error) {
                 console.error('Error al obtener los datos:', error);
             }
         });
     }

     ventasUsuarios(selectedDate);
 </script>

 <script>
     var storedSessionDataJSON = localStorage.getItem('sessionData');
     var storedSessionData = JSON.parse(storedSessionDataJSON);
     var idUsuario = storedSessionData.id_usuario;
     console.log(storedSessionData);
     var cambioCount = 0;
     var selectedDate = "";
     var venta = ''
     $('#rango').on('change', function() {
         cambioCount++;
         if (cambioCount > 1) {
             console.log('El valor del input ha cambiado a:', $(this).val());
             var dateRange = $(this).val();
             selectedDate = dateRange;
             cambioCount = 0;
             if (venta) {
                 venta.destroy(); // Destruir el gráfico existente si lo hay
             }

             ventasUsuario(selectedDate);
         }
     });

     var hoy = new Date();
     var dia = hoy.getDate().toString().padStart(2, '0');
     var mes = (hoy.getMonth() + 1).toString().padStart(2, '0');
     var año = hoy.getFullYear();

     var selectedDate = `${año}-${mes}-${dia}`

     function ventasUsuario(fechas) {
         var sql = ''
         let partes = fechas.split(' to ');
         if (partes.length !== 2) {
             let fecha = partes[0];
             sql = `SELECT usuarios.nombre AS nombre_vendedor, id_vendedor, SUM(ventas.total) AS total_sum, COUNT(ventas.id) AS ventas_count FROM ventas INNER JOIN usuarios ON ventas.id_vendedor = usuarios.id WHERE DATE(ventas.fecha) = '${fecha}'AND id_vendedor = ${idUsuario};`

         } else {
             let fechaInicio = partes[0];
             let fechaFin = partes[1];
             sql = `SELECT usuarios.nombre AS nombre_vendedor, id_vendedor, SUM(ventas.total) AS total_sum, COUNT(ventas.id) AS ventas_count FROM ventas INNER JOIN usuarios ON ventas.id_vendedor = usuarios.id WHERE DATE(ventas.fecha) BETWEEN '${fechaInicio}' AND '${fechaFin}' AND id_vendedor = ${idUsuario};`
         }

         console.log(sql)

         $.ajax({
             url: './controllers/VentasControllers.php?action=obtenerVentasPorCore',
             method: 'POST',
             dataType: 'json',
             data: {
                 sql: sql
             },
             success: function(response) {
                 console.log("Response:", response);

                 // Extraer nombres de vendedores, sumas totales de ventas y cantidades de ventas
                 const nombresVendedores = response.map(data => data.nombre_vendedor);
                 const sumasVentas = response.map(data => data.total_sum);
                 const cantidadesVentas = response.map(data => data.ventas_count);

                 // Configuración del gráfico
                 var options = {
                     chart: {
                         type: 'bar'
                     },
                     series: [{
                         name: 'Total de Ventas',
                         data: sumasVentas.map(num => num.toLocaleString('es-ES', {
                             maximumFractionDigits: 2
                         }))
                     }],
                     xaxis: {
                         categories: nombresVendedores
                     },
                     yaxis: [{
                         title: {
                             text: 'Total de Ventas'
                         },
                         labels: {
                             formatter: function(val) {
                                 return val.toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     }, {
                         opposite: true,
                         title: {
                             text: 'Cantidad de Ventas'
                         },
                         labels: {
                             formatter: function(val) {
                                 return val.toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                             }
                         }
                     }],
                     tooltip: {
                         y: {
                             formatter: function(value, {
                                 seriesIndex,
                                 dataPointIndex,
                                 w
                             }) {
                                 var totalFormatted = sumasVentas[dataPointIndex].toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                                 var ventasFormatted = cantidadesVentas[dataPointIndex].toLocaleString('es-ES', {
                                     maximumFractionDigits: 2
                                 });
                                 return 'Total: ' + totalFormatted + ' (Ventas: ' + ventasFormatted + ')';
                             }
                         }
                     },
                     title: {
                         text: 'Tus Ventas Del dia',
                         align: 'center'
                     },
                     dataLabels: {
                         enabled: true,
                         formatter: function(value, {
                             seriesIndex,
                             dataPointIndex,
                             w
                         }) {
                             return 'Ventas: ' + cantidadesVentas[dataPointIndex].toLocaleString('es-ES', {
                                 maximumFractionDigits: 2
                             });
                         },
                         offsetX: 0,
                         offsetY: -20,
                         style: {
                             fontSize: '12px',
                             colors: ["#304758"]
                         }
                     }
                 };



                 // Crear y renderizar el gráfico
                 venta = new ApexCharts(document.querySelector("#usuario"), options);
                 venta.render();
             },
             error: function(xhr, status, error) {
                 console.error('Error al obtener los datos:', error);
             }
         });
     }

     ventasUsuario(selectedDate);
 </script>