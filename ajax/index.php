<?php
ini_set('session.cookie_lifetime', 3600); // 1 hora
ini_set('session.gc_maxlifetime', 3600); // 1 hora

session_set_cookie_params(3600);
session_start();

if (!$_SESSION['login']) {
    echo '<script>window.location.href = "./index.php";</script>';
    exit();
}
?>

<!-- DataTables -->
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

<style>
    @keyframes parpadeo {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .parpadeo {
        animation: parpadeo 1s infinite;
    }

    .compatibilidad-cell {
        max-height: 40px;
        /* Establece la altura máxima deseada */
        overflow: hidden;
        /* Oculta el texto que se desborda */
        word-wrap: break-word;
        /* Permite que el texto se envuelva dentro de la caja si es necesario */
    }

    .form-check-input {
        border-color: #ddd;
        /* Color del borde predeterminado */
    }

    /* Estilo para los radio buttons seleccionados */
    .form-check-input:checked {
        border-color: #dc3545 !important;
        /* Cambia el color del borde */
        background-color: #dc3545 !important;
        /* Cambia el color de fondo */
        color: #a20000 !important;
        /* Cambia el color del texto */
    }
</style>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Firefox */
    }

    .compatibilidad-cell {
        max-height: 40px;
        /* Establece la altura máxima deseada */
        overflow: hidden;
        /* Oculta el texto que se desborda */
        word-wrap: break-word;
        /* Permite que el texto se envuelva dentro de la caja si es necesario */
    }
</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- ======================================================
        ----------TITULOS-----------------------------------------
        ========================================================= -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Ventas</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Movimientos</a></li>
                            <li class="breadcrumb-item active">Ventas</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- ======================================================
        ----------REALIZAR COMPRAS----------------------
        ========================================================= -->
        <div class="row">
            <div class="col-12">
                <!-- DATOS DE VENTAS -->
                <div class="email-leftbar card detalles">

                    <div class="mail-list mt-4">
                        <form action="" class="form-control text-center" id="formVentas">

                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalCrearCliente">
                                <i class="fas fa-user-plus"></i>
                                Agregar Cliente
                            </button>


                            <br><br>

                            <select class="form-cont" name="id_cliente" id="id_cliente" requerid>
                                <option value="">Seleccionar Cliente</option>
                            </select>

                            <!-- TIPOS DE VENTAS -->
                            <!-- <div class="col-lg-12 col-md-12">
                                <h5 class="font-size-14 mb-3 text-danger font-weight-bold"><i class="mdi mdi-arrow-right  me-2"></i>TIPO DE VENTA</h5>
                                <div class="form-check mb-3">
                                    <input class="form-check-input " type="radio" name="tipo_V" id="venta" value="venta" checked>
                                    <label class="form-check-label" for="venta">
                                        Venta:
                                    </label>
                                </div>
                            </div> -->
                            <!-- ESTADOS DE VENTA  -->
                            <!-- <div class="col-lg-12 col-md-12" id="estados_ventas">
                                <h5 class="font-size-14 mb-3 text-success font-weight-bold"><i class="mdi mdi-arrow-right text-success me-1"></i>ESTADO DE VENTA</h5>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="estado_V" id="cancelado" value="cancelado" checked>
                                    <label class="form-check-label" for="formRadios1">
                                        Cancelado:
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="estado_V" id="por_pagar" value="por pagar">
                                    <label class="form-check-label" for="formRadios2">
                                        Por Pagar:
                                    </label>
                                </div>
                            </div> -->



                            <input type="hidden" id="detalle_V" name="detalle_V">

                            <div class="mb-3">
                                <input type="hidden" step="any" class="form-control" id="importe_V" name="importe_V">
                                <input type="hidden" step="any" class="form-control" id="neto_V" name="neto_V">
                            </div>


                             <div>
                                <!-- <label for="switch3">Efectivo:</label> -->
                                <input type="hidden" class="form-control" id="efectivo_V" name="efectivo_V">
                            </div>
<!--
                            <br>
                            <div>
                                <h6>Saldo: <span id="saldo_V">0.00</span></h6>
                            </div>

                            <div>
                                <h6>Cambio: <span id="cambio_V">0.00</span></h6>
                            </div> -->

                        </form>
                    </div>
                </div>


                <!-- DETALLE DE -->
                <div class="email-rightbar mb-3 compras">

                    <div class="row" id="compras">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="invoice-title row">

                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="mb-4">
                                                    <img src="assets/images/logo.png" alt="" height="100"><span class="logo-txt"></span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="mb-4">
                                                    <h4 class="float-end font-size-16">Factura # <span id="numeroFactura"></span></h4>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <h5 class="font-size-15 mb-2">Actividad Economica: <span class="mb-1 " id="actitivadEconomicaNota"></span></h5>
                                            <br>

                                            <h5 class="font-size-15 mb-2">Fecha: <span class="mb-1 " id="fechaNota"></span></h5>
                                            <br>

                                            <h5 class="font-size-15 mb-2">Razon social: <span class="mb-1" id="razonSocialNota"></span></h5>

                                        </div>

                                        <div class="col-lg-6">
                                            <h5 class="font-size-15 mb-2`">NI/CI/CEX: <span class="mb-1" id="nitNota"></span></h5>

                                            <br>
                                            <h5 class="font-size-14 mb-2">Cod. Cliente: <span class="mb-1" id="codigoClienteNota"></span></h5>

                                        </div>
                                    </div>
                                    <hr class="my-4">

                                    <div class="py-2 mt-3 d-flex row">
                                        <h5 class="font-size-15 col-4">Detalle de venta</h5>
                                        <div class="col-4"> </div>
                                        <button type="button" class="col-4 btn btn-danger btn-block
                                                waves-effect waves-light " data-bs-toggle="modal" style="float:left" data-bs-target="#composemodal">
                                            <i class=" fas fa-cart-plus"></i>
                                            Agregar Articulos
                                        </button>
                                    </div>

                                    <div class="p-4 border rounded">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap align-middle mb-0" id="tabla-ventas">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 70px;">No.</th>
                                                        <th style="width: 70px;">ID.</th>
                                                        <th>Item</th>
                                                        <th class="text-end" style="width: 120px;">Precio</th>
                                                        <th class="text-end" style="width: 120px;">Cantidad</th>
                                                        <th class="text-end" style="width: 120px;">Sub Total</th>
                                                        <th class="text-end" style="width: 120px;"></th>Eliminar
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <tr>
                                                        <th scope="row" colspan="6" class="border-0 text-end"></th>
                                                        <td class="border-0 text-end">

                                                        </td>
                                                    </tr>

                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th scope="row" colspan="6" class="border-0 text-end">Total</th>
                                                        <td class="border-0 text-end">
                                                            <h4 class="m-0" id="total">Bs 0.00</h4>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-print-none mt-3">

                                        <div class="float-end">
                                            <a href="#" class="btn btn-success w-md waves-effect waves-light" id="crearVenta"> Guardar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- ======================================================
    ----------MODAL DE DATA TABLES ARTICULOS-------------------------
    ========================================================= -->
    <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-size-16" id="composemodalTitle">New
                        Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="col-lg-4 ">
                            <div class="mb-3 " style="width: 50%; margin: auto; ">
                                <input type="text" class="form-control" style="border-radius: 20px;" id="serch">
                            </div>
                        </div>

                        <div class="row" id="card-container-productos">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- ==========================================================
    -----------------TABLA DE VENTAS -----------------------------
    ========================================================== -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-4">
                                <button type="button" class="btn btn-light
                                        waves-effect waves-light"><i class="bx bx-plus me-1"></i>Lista de Ventas</button>
                            </div>
                        </div>
                        <div class="col-sm-auto">

                            <div class="d-flex align-items-center gap-1 mb-4">



                                <div class="input-group datepicker-range">
                                    <input type="text" class="form-control flatpickr-input" data-input aria-describedby="date1" id="fecha" placeholder="Rango de fechas">
                                    <button class="input-group-text" id="date1" data-toggle><i class="bx bx-calendar-event"></i></button>
                                </div>

                            </div>
                            <div class="dropdown">
                                <a class="btn btn-link text-muted py-1
                                            font-size-16 shadow-none
                                            dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx
                                                bx-dots-horizontal-rounded"></i>
                                </a>

                                <ul class="dropdown-menu
                                            dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="table-responsive">
                    <table id="datatable-ventas" class="table align-middletable-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Vendedor</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Download Pdf</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
                <!-- end table responsive -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

<!-- ==========================================================
    ----------------MODAL CREAR CLIENTE--------------------------
    ========================================================== -->


<div id="modalSeleccionar" class="modal fade " tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFullscreenLabel">Seleccionar rutas y Zonas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="#" id="formCrearCliente">

                        <!-- CARGA DE DATROS -->
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div>
                                        <h5 class="font-size-14 mb-3"></h5>
                                        <div class="row">

                                            <div class="mb-3">
                                                <label for="id_zona" class="form-label font-size-13 text-muted">Seleccionar Zona</label>
                                                <select class="form-control" data-trigger name="id_zona" id="id_zona" requerid>
                                                    <option value="">Seleccionar Zona</option>

                                                </select>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="mb-3">
                                                    <label for="id_ruta" class="form-label font-size-13 text-muted">Seleccionar Ruta</label>
                                                    <select class="form-control" data-trigger name="id_ruta" id="id_ruta" requerid>
                                                        <option value="">Seleccionar Ruta</option>

                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end card body -->

                            </div>
                            <!-- end card -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn
                                                btn-secondary waves-effect" data-bs-dismiss="modal" id="limpiar">Cerrar</button>
                    <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light " id="asignarZona">Guardar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>




</div>
<style>
    @keyframes parpadeo {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .parpadeo {
        animation: parpadeo 1s infinite;
    }
</style>

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
    function keepSessionAlive() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log("Sesión renovada con éxito.");
            }
        };
        xhr.open("GET", "keep_session_alive.php", true);
        xhr.send();
    }

    setInterval(keepSessionAlive, 300000);


    $('input[name="metodo_pago_V"]').change(function() {
        var radioSeleccionado = $('input[name="metodo_pago_V"]:checked').val();
        console.log('El radio seleccionado es: ' + radioSeleccionado);
    });


    var sessionData = {
        login: <?php echo json_encode($_SESSION['login']); ?>,
        id_usuario: <?php echo json_encode($_SESSION['id_usuario']); ?>,
        nombre_U: <?php echo json_encode($_SESSION['nombre_U']); ?>,
        area_U: <?php echo json_encode($_SESSION['area_U']); ?>,
        rutas_U: <?php echo json_encode($_SESSION['rutas_U']); ?>,
        foto_U: <?php echo json_encode($_SESSION['foto_U']); ?>,
        zona_U: <?php echo json_encode($_SESSION['zona_U']); ?>,
        ruta_U: <?php echo json_encode($_SESSION['ruta_U']); ?>
    };

    // Convertir el objeto a una cadena JSON
    var sessionDataJSON = JSON.stringify(sessionData);

    // Almacenar en localStorage
    localStorage.setItem('sessionData', sessionDataJSON);

    if (!sessionData.zona_U) {
        console.log('entro')
        $.ajax({
            url: "./controllers/ZonasControllers.php?action=obtenerZonas", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#id_zona');
                select.empty();
                select.append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                }));
                $.each(data, function(key, value) {
                    select.append($('<option>', {
                        value: value.id_zona,
                        text: value.nombre_Z
                    }));
                });
            }
        });

        $.ajax({
            url: "./controllers/RutasControllers.php?action=obtenerRutas", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#id_ruta');
                select.empty();
                select.append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                }));
                $.each(data, function(key, value) {
                    select.append($('<option>', {
                        value: value.id_ruta,
                        text: value.nombre_R
                    }));
                });
            }
        });

        $('#modalSeleccionar').modal('show');

    }

    $('#asignarZona').on('click', function() {
        var zona = $('#id_zona').val();
        var ruta = $('#id_ruta').val();
        $.ajax({
            url: 'ajax/zzsession.php',
            type: 'POST',
            data: {
                zona: zona,
                ruta: ruta
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La venta se guardo  con éxito',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error en la solicitud AJAX: ' + textStatus);
            }
        });

        console.log(sessionData)
    });


    $(document).ready(function() {
        $('#card-container-productos').empty();

        console.log(' se reinicio el CONTAINER');
        //=================CALCULANDO CAMBIOS Y SALDOS 
        $('#efectivo_V').val(0);
        $('#transferencia_V').val(0);

        $('#efectivo_V, #transferencia_V').on('input', function() {


            var efectivo = $('#efectivo_V').val();
            var transferencia = $('#transferencia_V').val();
            var importe = $('#importe_V').val();
            var pago = parseFloat(efectivo) + parseFloat(transferencia);
            var saldo = importe - pago;
            var cambio = pago - importe;
            console.log(pago)


            if (pago > importe) {
                $('#cambio_V').text(cambio.toFixed(2));
                $('#saldo_V').text(0);
            }

            if (pago <= importe) {
                $('#saldo_V').text(saldo.toFixed(2));
                $('#cambio_V').text(0);
            }
        })


        //LINK - llamada a los clientes 
        var selectCliente = $('#id_cliente');
        var inputClasificacion = $('#clasificacionCliente');
        var razonSocialCliente = $('#razonSocialNota');
        var nitCliente = $('#nitNota');
        var codigoCliente = $('#codigoClienteNota');

        selectCliente.selectize({
            valueField: 'id',
            labelField: 'nombre',
            searchField: ['nombre', 'documento'],
            placeholder: 'Seleccionar un cliente',
            load: function(query, callback) {
                $.ajax({
                    url: './controllers/ClientesControllers.php?action=obtenerClientes',
                    dataType: 'json',
                    data: {
                        q: query
                    },
                    success: function(data) {
                        callback(data);
                        console.log(data);
                    }
                });
            },
            onChange: function(value) {

                var selectedClient = this.options[value];
                var idCliente = selectedClient.id;
                var clasificacionCliente = "";
                var razonSocialCliente1 = selectedClient.nombre;
                var nitCliente1 = selectedClient.documento;
                var codigoCliente1 = selectedClient.documento;

                const fechaActual = new Date();


                const año = fechaActual.getFullYear();
                const mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
                const dia = String(fechaActual.getDate()).padStart(2, '0');
                const horas = String(fechaActual.getHours()).padStart(2, '0');
                const minutos = String(fechaActual.getMinutes()).padStart(2, '0');
                const segundos = String(fechaActual.getSeconds()).padStart(2, '0');
                const fechaFormateada = `${año}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;


                console.log(fechaFormateada);
                $('#fechaNota').text(fechaFormateada);

                inputClasificacion.val(clasificacionCliente);
                razonSocialCliente.text(razonSocialCliente1);
                nitCliente.text(nitCliente1);
                codigoCliente.text(codigoCliente1);
                if (clasificacionCliente == 'DISTRIBUCION') {
                    $("#switch3").prop("disabled", true);
                }

            }
        });





        let cambioCount = 0;
        //NOTE - llamada a las ventas =================================================
        var selectedDate = "";


        $('#fecha').on('change', function() {

            cambioCount++;
            if (cambioCount > 1) {
                console.log('El valor del input ha cambiado a:', $(this).val());
                var dateRange = $(this).val();
                selectedDate = dateRange;
                cambioCount = 0;
                tableVentas.ajax.reload();
            }
        });
        var hoy = new Date();
        var dia = hoy.getDate().toString().padStart(2, '0');
        var mes = (hoy.getMonth() + 1).toString().padStart(2, '0');
        var año = hoy.getFullYear();

        var selectedDate = `${año}-${mes}-${dia}`

        // Initialize DataTable
        var tableVentas = $('#datatable-ventas').DataTable({
            lengthChange: false,
            order: [
                [0, "desc"]
            ],
            ajax: {
                url: `./controllers/VentasControllers.php?action=obtenerVentas`,
                dataSrc: '',
                data: function(d) {
                    if (selectedDate) {
                        d.date = selectedDate; // Añadir la fecha seleccionada a los datos de la solicitud
                    }
                }
            },
            columns: [
                // Define tus columnas aquí
                {
                    data: 'id'
                },
                {
                    data: 'nombre_cliente'
                },
                {
                    data: 'nombre_vendedor'
                },
                {
                    data: 'fecha'
                },
                {
                    data: 'total'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var montoPagar = data.importe_V - data.monto_V;
                        if (data.estado == 'pedido') {
                            return `<div class="badge badge-soft-success font-size-12"><i class="fas fa-times"></i> Por Entregar</div>`;
                        } else {
                            return `<div class="badge badge-soft-danger font-size-12 pagar" id="${data.id}"><i class="fas fa-dollar-sign"></i> Entregado</div>`;
                        }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div>
                    <a href="pdfs/nota_venta.php?id_venta=${data.id}" target="_blank">
                        <button type="button" class="btn btn-soft-light btn-sm w-xs waves-effect btn-label waves-light"><i class="bx bx-download label-icon"></i> Pdf</button>
                    </a>
                </div>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-sm btn-danger btn-eliminar" id="${data.id}"><i class="fas fa-trash-alt fa-2x"></i></button>`;
                    }
                }
            ]
        });

        // Configura el evento preXhr.dt una vez, fuera del manejador de Flatpickr
        tableVentas.on('preXhr.dt', function(e, settings, data) {
            if (selectedDate) {
                data.date = selectedDate;
            }
        });




    });

    var productos = null;
    async function obteberProductos() {
        try {
            const response = await $.ajax({
                url: "./controllers/ProductosControllers.php?action=obtenerProductosVentas",
            });
            return response;
        } catch (error) {
            throw error;
        }
    }

    async function iniciar() {
        try {
            const respuesta = await obteberProductos();
            productos = JSON.parse(respuesta);
            console.log(productos);
            $("#cantidad").text(productos.length)
            $('#card-container-productos').empty();
            cargar(productos);
        } catch (error) {
            console.error("Error en la solicitud Ajax:", error);
        }
    }

    function cargar(produtos1) {
        if (produtos1.length > 0) {
            produtos1.forEach(function(producto) {
                var img = JSON.parse(producto.imagen);
                var cardHTML = `
                    <div class="col-xl-2 col-6 ">
                        <div class="card text-center" id="card-${producto.id}">
                            <div class="card-body" style="padding:3px">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>
                                <div class="mx-auto mb-2 ">
                                    <img src="./controllers/uploads/products/${img[0]}" alt=""
                                        class="rounded imagen "  style="max-width: 100%;" data-holder-rendered="true">
                                </div>
                                <input type="hidden" name="id" class="id" value="${producto.id}" >
                                <input type="hidden" name="id" class="codigo" value="${producto.codigo}" >
                                <input type="hidden" name="precioCompra" class="precioCompra" value="${producto.precio_compra}" >
                                <input type="hidden" name="precio_venta" class="precio_venta" value="${producto.precio_venta}" >
                                <input type="hidden" name="descripcion" class="descripcion" value="${producto.descripcion}" >
                                <input type="hidden" name="stock" class="stock" value="${producto.stock}" >

                                <h5 class="font-size-12 mb-12">
                                      <a href="#" class="text-dark">
                                        <span class="descripcion">
                                            ${producto.descripcion}
                                        </span>
                                       </a>
                                </h5>


                                <p class="text-muted mb-2 ">
                                   <span class="precioCompra">
                                       Precio compra: ${producto.precio_compra}
                                   </span>
                                </p>

                                <p class="text-muted mb-2 font-size-9">
                                   <span class="precioVenta">
                                       Precio venta: ${producto.precio_venta}
                                   </span>
                                </p>

                                <span class="stock badge rounded-pill bg-${producto.stock > 5 ? 'success' : 'danger'}">${producto.stock}</span>
                                
                            </div>                                

                            <div class="btn-group" role="group">

                            <div class="col-6">
                             <input class="form-control col-4" type="number" name="cantidad" id="cant-${producto.id}"  class="cantidad" >
                             </div>
                            <div  class="col-6">
                            <button id="${producto.id}" value="" type="button" class="col-6 btn  btn-outline-warning waves-effect waves-light w-100 vender">
                                          <i class="fas fa-cart-plus">
                                           </i> 
                                      </button>
                            </div>
                                                              
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                $('#card-container-productos').append(cardHTML);

            });
        } else {

            var cardHTML = `
                <div class="my-5 pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-5">
                                    <h1 class="display-1 fw-semibold">4<span class="text-primary mx-2">0</span>4</h1>
                                    <h4 class="text-uppercase">No hay Zonas habilitadas</h4>
                                    <div class="mt-5 text-center">
                                        <a class="btn btn-primary waves-effect waves-light" href="index.php">Back to Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-xl-8">
                                <div>
                                    <img src="assets/images/error-img.png" alt="" class="img-fluid"/>
                                </div>
                            </div>
                        
                        </div>
                    
                    </div>
                
                </div>
                    `;

            $('#card-container-usuarios').append(cardHTML);

        }

    }
    iniciar();

    $(document).ready(function() {
        $('#exampleModal').on('click', 'input[name="cantidad"]', function() {
            // Aquí puedes ejecutar el código que desees cuando se haga clic en el input de cantidad dentro del modal
            console.log('Se hizo clic en el input de cantidad dentro del modal');
        });
        //LINK - llamada a los clientes 
        var selectCliente = $('#id_cliente');
        selectCliente.selectize({
            valueField: 'id_cliente', // Campo que contiene el valor del cliente
            labelField: 'nombre_Cl', // Campo que contiene el nombre del cliente
            searchField: 'nombre_Cl', // Campo que se utilizará para la búsqueda
            placeholder: 'Seleccionar un cliente', // Texto de marcador de posición
            load: function(query, callback) {
                // Realiza una solicitud AJAX para obtener la lista de clientes
                $.ajax({
                    url: './controllers/ClientesControllers.php?action=obtenerClientes', // Reemplaza con la URL de tu propia API para obtener clientes
                    dataType: 'json',
                    data: {
                        q: "query" // Término de búsqueda ingresado por el usuario
                    },
                    success: function(data) {
                        callback(data); // Devuelve los resultados a Selectize
                    }
                });
            }
        });
    });


    // ================================================================================================================================================================================================= CREAR VENTAS
    var carrito = []
    $(document).ready(function() {
        carrito = []
        console.log('carrito reseteado0');
        console.log(carrito)
    });



    $(document).off("click", ".vender").on("click", ".vender", function(e) {
        e.preventDefault();
        var idProducto = $(this).attr('id');

        var cardContainer = $(this).closest('.card');
        $(this).prop('disabled', true);
        // Obtener los valores de todos los inputs dentro de la tarjeta
        var id = cardContainer.find('.id').val();
        var codigo = cardContainer.find('.codigo').val();
        var precioCompra = cardContainer.find('.precioCompra').val();
        var precioVenta = cardContainer.find('.precio_venta').val();
        var descripcion = cardContainer.find('.descripcion').val();
        var stock = cardContainer.find('.stock').val();
        var cantidad = cardContainer.find('#cant-' + idProducto).val(); // Nuevo input añadido

        var producto = {
            id: id,
            codigo: codigo,
            descripcion: descripcion,
            precio_compra: precioCompra,
            precio_venta: precioVenta,
            stock: stock,
            cantidad: cantidad
        }
        $.ajax({
            type: 'POST',
            url: './controllers/ProductosControllers.php?action=obtenerProductoPorId',
            data: {
                id_producto: idProducto
            },
            dataType: 'json',
            cache: false,
            success: function(response) {
                var canti = parseFloat(response.stock)
                if (canti >= producto.cantidad) {

                    agregarFila(producto);
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Se agrego correctamente.'
                    });

                    return
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'no hayh sificientpo stock.'
                    });
                }
            },
            error: function(error) {
                console.log('Error en la petición AJAX:', error);
            }
        });

    });


    function formatNumber(number) {
        return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    function calcularTotal() {
        console.log('se esta sumando las ')
        let total = 0;
        let neto = 0;
        for (var i = 0; i < carrito.length; i++) {
            total = total + parseFloat(carrito[i].sub_total);
            neto = neto + parseFloat(carrito[i].neto_total);
        }

        let formattedNumber = formatNumber(total);

        $('#total').text(formattedNumber);
        $('#importe_V').val(total);
        $('#neto_V').val(neto);
        $('input[type="number"]').on('wheel', function(e) {
            e.preventDefault();
        });
    }

    var a = 1;

    function agregarFila(data) {

        console.log('agrando ', a)
        a++
        var id = data.id;
        var codigo = data.codigo;
        var descripcion = data.descripcion;
        var precio_compra = data.precio_compra;
        var precio_venta = data.precio_venta;
        var cantidad = data.cantidad;
        var stock = data.stock;
        if ('cantidad_venta' in data) {
            cantidad_venta = data.cantidad_venta;
        }

        var producto = {
            id: id,
            codigo: codigo,
            descripcion: descripcion,
            precio_compra: precio_compra,
            precio_venta: precio_venta,
            cantidad: cantidad,
            stock: stock,
            sub_total: precio_venta * cantidad,
            neto_total: precio_compra * cantidad
        }
        var productoExistente = carrito.find(function(producto) {
            return producto.id === id;
        });
        console.log(productoExistente);
        if (productoExistente == null) {
            carrito.push(producto)
        } else {
            console.log('el priodyucto ya existia')
        }
        console.log(carrito)

        let nuevaFila = `
                <tr>
                  <style>
                        .descripcion-cell {
                            max-width: 200px; /* El ancho máximo deseado para la descripción */
                            overflow: hidden; 
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        }
                    </style>
                        <th scope="row">${carrito.length}</th>
                        <td style="display: none;">
                            <p class="font-size-11 text-muted mb-0 id"  id="${producto.id}" value="">${producto.id}</p>
                        </td>
                        <td>
                            <p class="font-size-11 text-muted mb-0 codigo" value="">${producto.codigo}</p>
                        </td>
                        <td class="descripcion-cell ">
                            <p class="font-size-11 text-muted mb-0" value="">${producto.descripcion} </p>
                        </td>
                        <td > <input type="number" step="any" class="form-control price" step="0.01" value="${producto.precio_venta}" disabled></td>

                        <td > <input type="number" step="any" class="form-control quantity" step="0.01"  value="${producto.cantidad}" min="1" max="${producto.stock}">  </td>`


        nuevaFila += `<td class="text-end subtotal" value="">${producto.sub_total.toFixed(2)}</td>
                        <td> <button class="btn btn-sm btn-danger btn-eliminar" step="0.01" id="${id}"><i class="fas fa-trash-alt fa-2x"></i></button></td>
                </tr>`;
        $(nuevaFila).insertBefore('#tabla-ventas tbody tr:last');

        calcularTotal();
    }


    // Escuchar cambios en los campos de precio y cantidad
    $('#tabla-ventas').on('input', '.price, .quantity', function() {


        let row = $(this).closest('tr');
        let id = parseInt(row.find('.id').text());
        let price = parseFloat(row.find('.price').val());
        let quantity = parseFloat(row.find('.quantity').val());
        var sub_total = quantity * price;

        sub_total = parseFloat(sub_total.toFixed(3));
        var productoExistente = carrito.find(item => item.id == id);

        if (productoExistente && productoExistente.stock >= quantity) {
            console.log('sumando')
            productoExistente.precio_venta = price;
            productoExistente.cantidad = quantity;
            productoExistente.sub_total = sub_total;
            row.find('.subtotal').text(sub_total);
        }
        if (productoExistente.stock <= quantity) {

            Swal.fire({
                icon: 'warning',
                title: 'Atencion',
                text: 'El stock a alcanzo  el limite compra de nuevo !!!',
                confirmButtonText: 'Ok'
            });
            $(this).closest('tr');
            productoExistente.cantidad = parseInt(productoExistente.stock);
            productoExistente.sub_total = parseFloat(productoExistente.cantidad * productoExistente.precio_venta);

            row.find('.quantity').val(productoExistente.stock);
            row.find('.subtotal').text(productoExistente.subtotal);


        }

        calcularTotal();
    });

    // eliminar un producto del detalle de envio
    $('#tabla-ventas').on('click', '.btn-eliminar', function() {
        var id = $(this).attr('id');
        console.log(id);
        $(this).closest('tr').remove();
        console.log('#' + id);
        var btnAdd = $('#' + id);
        btnAdd.prop('disabled', false);
        carrito = carrito.filter(function(producto) {
            return producto.id != id;
        })
        calcularTotal();
        console.log(carrito);
    })






    // Escuchar clic en el botón "Guardar Carrito"
    $('#crearVenta').on('click', function() {

        var selectCliente = $('#id_cliente').val();

        if (selectCliente !== "") {
            $('#detalle_V').val(JSON.stringify(carrito));
            var formData = $('#formVentas').serialize();
            var detalleVenta = $('#detalle_V').val();

            $.ajax({
                type: "POST",
                url: "./controllers/VentasControllers.php?action=crearVenta",
                data: formData,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response == 'ok') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La venta se guardo  con éxito',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Falta STOCK ' + response.descripcion,
                            text: 'solo quedan ' + ' ' + response.stock_db + 'y pediste ' + ' ' + response.cantidad
                        });
                    }


                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'No se pudo Conectar con el Controlador',
                        confirmButtonText: 'Ok'
                    });
                }
            });

        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Atencion',
                text: 'Seleccione el cliente !!!',
                confirmButtonText: 'Ok'
            });
        }




    });



    $("#datatable-ventas").on("click", ".btn-editar", function(e) {
        e.preventDefault();
        var idVenta = $(this).attr('id');
        console.log(idVenta);
        Swal.fire({
            title: '¿Editar la Venta?',
            text: '¿deceas editar la venta ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // El usuario confirmó la eliminación, realiza la solicitud AJAX para eliminar la sucursal
                $.ajax({
                    type: 'POST',
                    url: './controllers/VentasControllers.php?action=obtenerVentaPorId',
                    data: {
                        id_venta: idVenta
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(response) {
                        if (response === 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'La venta se elimino correctamente.',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Érror',
                                text: 'No se pudo eliminar la venta.',
                            });
                        }
                        reloadTables();
                        iniciar();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'No se pudo conetcar con el controlar de ventas.',
                        });
                    }
                });
            }
        });

    });


    $("#datatable-ventas").on("click", ".btn-eliminar", function(e) {
        e.preventDefault();
        var idVenta = $(this).attr('id');
        console.log(idVenta);
        Swal.fire({
            title: '¿Eliminar venta?',
            text: '¿Confirmas haber recibido todo los productos ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // El usuario confirmó la eliminación, realiza la solicitud AJAX para eliminar la sucursal
                $.ajax({
                    type: 'POST',
                    url: './controllers/VentasControllers.php?action=eliminarVenta',
                    data: {
                        id_venta: idVenta
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        if (response === 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'La venta se elimino correctamente.',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Érror',
                                text: 'No se pudo eliminar la venta.',
                            });
                        }
                        reloadTables();
                        iniciar();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'No se pudo conetcar con el controlar de ventas.',
                        });
                    }
                });
            }
        });

    });

    function reloadTables() {
        var miTablaVentas = $('#datatable-ventas').DataTable();
        miTablaVentas.ajax.reload();
    }

    // Calcular el total inicial 

    /* ==============================
     -------------GUARDAR CLIENTE--------------
     =================================== */
    var myDropzone = new Dropzone("#formCrearCliente", {
        paramName: "imagenes[]", // Nombre del campo en el formulario
        maxFilesize: 5, // Tamaño máximo en MB
        maxFiles: 5, // Número máximo de archivos permitidos
        acceptedFiles: "image/*", // Acepta solo archivos de imagen
        addRemoveLinks: true, // Muestra el enlace para eliminar archivos
        dictRemoveFile: "Eliminar", // Texto para el enlace de eliminación
        init: function() {
            this.on("success", function(file, response) {});
            this.on("removedfile", function(file) {
                // Manejar la eliminación de archivos (si es necesario)
                console.log("Archivo eliminado: " + file.name);
            });
        }
    });


    $("#guardarCliente").on("click", function(e) {
        e.preventDefault();

        var formData = new FormData($("#formCrearCliente")[0]);


        $.ajax({
            type: "POST",
            url: "./controllers/ClientesControllers.php?action=crearCliente",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response) {
                    $('#modalCrearCliente').modal('hide');
                    var formulario = document.getElementById("formCrearCliente");
                    var dropzone = Dropzone.forElement("#formCrearCliente");
                    formulario.reset();
                    dropzone.removeAllFiles();
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'El cliente se ha creado correctamente.',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'El cliente no se creo',
                    });

                }
            },
            error: function(error) {
                console.log("Error en la petición AJAX:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Érror',
                    text: 'El cliente se ha creado correctamente.' + error.message,
                });
            }
        });
    });

    $("#guardarClienteA").on("click", function(e) {
        e.preventDefault();

        var formData = new FormData($("#formCrearClienteA")[0]);
        var datosFormulario = {};

        // Recorrer el FormData y asignar los valores al nuevo objeto
        formData.forEach(function(value, key) {
            datosFormulario[key] = value;
        });
        console.log(datosFormulario);
        $.ajax({
            type: "POST",
            url: "./controllers/ClientesControllers.php?action=crearCliente",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

                if (response) {
                    $('#modalCrearClienteA').modal('hide');
                    var formulario = document.getElementById("formCrearClienteA");
                    formulario.reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'El cliente se ha creado correctamente.',
                    });

                    //LINK - llamada a los clientes 
                    var idCliente = JSON.parse(response)
                    var selectCliente = $('#id_cliente');
                    var razonSocialCliente = $('#razonSocialNota');
                    var nitCliente = $('#nitNota');
                    var codigoCliente = $('#codigoClienteNota');
                    const fechaActual = new Date();


                    const año = fechaActual.getFullYear();
                    const mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
                    const dia = String(fechaActual.getDate()).padStart(2, '0');
                    const horas = String(fechaActual.getHours()).padStart(2, '0');
                    const minutos = String(fechaActual.getMinutes()).padStart(2, '0');
                    const segundos = String(fechaActual.getSeconds()).padStart(2, '0');
                    const fechaFormateada = `${año}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;


                    $('#fechaNota').text(fechaFormateada);
                    //selectCliente.val(idCliente)

                    console.log("idCliente:", idCliente);
                    $(`#id_cliente option[value=""]`).val(idCliente).text(datosFormulario.razon_social_Cl);


                    razonSocialCliente.text(datosFormulario.razon_social_Cl);
                    nitCliente.text(datosFormulario.nit_Cl);
                    codigoCliente.text(datosFormulario.codigo_Cl);

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'El cliente no se creo',
                    });

                }
            },
            error: function(error) {
                console.log("Error en la petición AJAX:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Érror',
                    text: 'El cliente se ha creado correctamente.' + error.message,
                });
            }
        });
    });

    //BUSCANDO ARTICULOS
    $('#serch').on('input', function() {
        // Obtener el valor del campo de búsqueda
        var query = $(this).val();
        console.log(query);
        $('#cantidad').empty();
        if (query != ' ') {
            $.ajax({
                url: './controllers/ProductosControllers.php?action=filtrarProductos',
                method: 'POST',
                data: {
                    query: query
                },
                dataType: 'json', // Suponiendo que la respuesta será JSON
                cache: false,
                success: function(data) {
                    console.log(data);
                    $('#card-container-productos').empty();
                    $('#cantidad').text(data.length);
                    cargar(data);
                    if (query == '') {
                        $('#contenedor-articulos').empty();
                    }
                }
            });
        } else {
            iniciar();
        }
    });
</script>