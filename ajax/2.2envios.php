<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

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


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Entregas</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Entregas</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>



        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="mb-3">
                    <h5 class="card-title">Total de productos <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="d-flex align-items-center gap-1 mb-4">
                    <!-- 
                    <div class="input-group">
                        <input type="text" class="form-control hola" data-input aria-describedby="date2" placeholder="Fecha" id="date2">
                        <button class="input-group-text" id="date2" data-toggle><i class="bx bx-calendar-event"></i></button>
                    </div> -->

                    <div class="input-group datepicker-range">
                        <input type="text" class="form-control flatpickr-input" data-input aria-describedby="date1" id="fecha" placeholder="Rango de fechas">
                        <button class="input-group-text" id="date1" data-toggle><i class="bx bx-calendar-event"></i></button>
                    </div>
                </div>
            </div>

            
        </div>

        <div>
            <div class="row" id="card-container-zonas">

            </div>
        </div>
        <!-- ==============SUCURSALES -->
        <div>
            <div class="row" id="card-container-productos">

            </div>
        </div>




        <!-- =================MODAL CREAR Ruta-->
        <div id="modalCrearRuta" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nueva ruta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearRuta" class="dropzone p-0">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <h5 class="font-size-14 mb-3"></h5>
                                            <div class="row">

                                                <div class="mb-3">
                                                    <label for="fk_id_zona" class="form-label font-size-13 text-muted">Seleccionar Zona</label>
                                                    <select class="form-control" data-trigger name="fk_id_zona" id="fk_id_zona" requerid>
                                                        <option value="">Seleccionar Sucursal</option>

                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Ruta </label>
                                                    <input class="form-control" type="text" id="nombre_R" name="nombre_R">
                                                </div>

                                                <div class="col-12">
                                                    <label for="example-text-input" class="form-label"> Numero</label>
                                                    <input class="form-control" type="text" id="numero_R" name="numero_R">
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- CARGA DE IMAGENES -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Imagenes</h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="fallback">
                                                        <input name="imagen" type="file" enctype="multipart/form-data">
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                        </div>
                                                        <h5>Drop files here or click to upload.</h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn
                                                btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="crearRuta">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- ===============MODAL EDITAR ZONA -->
        <div id="modalEditarRuta" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar ruta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" id="formEditarRutas">
                                        <div class="row">

                                            <div class="col-12">
                                                <input class="form-control" type="hidden" id="Eid_ruta" name="Eid_ruta">
                                            </div>

                                            <div class="col-12">
                                                <input type="hidden" name="Efoto_U" id="Efoto_U">
                                                <div class="mb-3">
                                                    <label for="Efk_id_zona" class="form-label font-size-13 text-muted">Seleccionar Zona</label>
                                                    <select class="form-control" data-trigger name="Efk_id_zona" id="Efk_id_zona" requerid>
                                                        <option value="">Seleccionar Sucursal</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label for="Enumero_R" class="form-label">Numero</label>
                                                <input class="form-control" type="text" id="Enumero_R" name="Enumero_R">
                                            </div>

                                            <div class="col-12">
                                                <label for="Enombre_R" class="form-label">Nombre </label>
                                                <input class="form-control" type="text" id="Enombre_R" name="Enombre_R">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn
                                                btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="editarRutas">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <!-- ========================================================================================================================= -->

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

    <!-- Datatable init js -->
    <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dropzone").dropzone();
        });
    </script>

    <!-- choices js -->
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>

    <script>
        var productos = null;

        var dateInput = $(".hola").flatpickr({
            onChange: function(selectedDates, dateStr, instance) {
                selectedDate = dateStr;
                iniciar1(selectedDate);
                $('#fecha').val('');
            }
        });

        $("#date2").on("click", function() {
            dateInput.open();
        });

        var cambioCount = 0;

        $('#fecha').on('input', function() {
            cambioCount++;
            if (cambioCount > 1) {
                var fecha = $(this).val();
                $('#card-container-productos').empty();
                iniciar(fecha);
                cambioCount = 0;
            }


        });


        async function obteberVentas(fecha) {
            try {
                var sql = '';
                let partes = fecha.split(' to ');
                if (partes.length !== 2) {
                    var fecha = partes[0];
                    sql = `SELECT * FROM ventas WHERE  DATE(ventas.fecha) = '${fecha}'`;
                } else {
                    var fechaInicio = partes[0];
                    var fechaFin = partes[1];
                    sql = `SELECT * FROM ventas WHERE  DATE(ventas.fecha) BETWEEN '${fechaInicio}' AND '${fechaFin}'`;
                }


                console.log(fechaInicio);
                console.log(fechaFin);

                const response = await $.ajax({
                    url: './controllers/VentasControllers.php?action=obtenerVentasPorCore',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        sql: sql
                    }
                });

                console.log(response);
                let productoContador = {};
                console.log(response)
                response.forEach(venta => {
                    let productos = JSON.parse(venta.productos);
                    productos.forEach(producto => {
                        if (productoContador[producto.id]) {
                            productoContador[producto.id].cantidad += parseInt(producto.cantidad);
                        } else {
                            productoContador[producto.id] = {
                                cantidad: parseFloat(producto.cantidad),
                                descripcion: producto.descripcion,
                                id: producto.id
                            };
                        }
                    });
                });
                console.log(productoContador)
                return productoContador;
            } catch (error) {
                throw error;
            }
        }

        async function iniciar(fecha) {
            try {
                const respuesta = await obteberVentas(fecha);
                productos = respuesta;
                console.log(productos);
                cargar(productos);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }


        function cargar(productos) {


            if (Object.keys(productos).length > 0) {
                for (let productoId in productos) {
                    if (productos.hasOwnProperty(productoId)) {
                        let producto = productos[productoId];
                        var cardHTML = `
                        <div class="col-xl-3 col-6 ">
                            <div class="card text-center" id="card-${producto.id}">
                                <div class="card-body">
                                    <div class="dropdown text-end">
                                        <a class="text-muted dropdown-toggle font-size-16"
                                            href="#" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                    </div>

                                    <div class="mx-auto mb-4">
                                        <img src="" alt=""
                                            class="rounded me-2" class="rounded me-2" style="max-width: 100%;" data-holder-rendered="true">
                                    </div>

                                    <h5 class="font-size-16 mb-1">
                                        <a href="#" class="text-dark">
                                        <span class="nombreR">
                                        ${producto.descripcion}
                                        </span>
                                        </a>
                                    </h5>
                                    <h5 class="font-size-16 mb-1">
                                        <a href="#" class="text-dark">
                                        <span class="nombreR">
                                        ${producto.cantidad}
                                        </span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>`;

                        $('#card-container-productos').append(cardHTML);

                    }
                }
            } else {
                console.log('No hay productos para mostrar.');
            }



        }

        // ==============================================================
        // ================================= CREAR RUTA================
        // ============================================================== 



        var zonas = null;
        async function obteberZonas() {
            try {
                const response = await $.ajax({
                    url: "./controllers/ZonasControllers.php?action=obtenerZonas",
                });

                return response;
            } catch (error) {
                throw error;
            }
        }
        async function iniciarZonas() {
            try {
                const respuesta = await obteberZonas();
                zonas = JSON.parse(respuesta);
                console.log(zonas);
                $("#cantidad").text(zonas.length)
                cargarZonas(zonas);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }

        function cargarZonas(zonas1) {
            if (zonas1.length > 0) {
                zonas1.forEach(function(zona) {
                    var img = JSON.parse(zona.coordenadas_Z)
                    console.log(img);
                    var cardHTML = `
                    <div class="col-xl-3 col-6 ">
                        <div class="card text-center" id="card-${zona.id_zona}">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>

                                <div class="mx-auto mb-4">
                                    <img src="./controllers/uploads/zonas/${img[0]}" alt=""
                                        class="rounded me-2" class="rounded me-2" style="max-width: 100%;" data-holder-rendered="true">
                                </div>
                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombreZ">
                                         ${zona.nombre_Z}
                                      </span>
                                      </a>
                                </h5>
                                <p class="text-muted mb-2">
                                   <span class="referenciaZ">
                                   ${zona.referencia_Z}
                                   </span>
                                </p>
                            </div>

                            <div class="btn-group" role="group">
                                     <button id="${zona.id_zona}" type="button" class="btn  btn-outline-danger waves-effect waves-light imprimirPdf">
                                          <i class=" fas fa-file-pdf fa-2x" >
                                           </i> 
                                      </button> 
                            
                                     <button id="${zona.id_zona}" type="button" class="btn  btn-outline-success waves-effect waves-light imprimirExcel">
                                          <i class=" fas fa-file-excel fa-2x">
                                           </i> 
                                      </button>                               
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-zonas').append(cardHTML);

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

                $('#card-container-zonas').append(cardHTML);

            }

        }
        iniciarZonas();

        $.ajax({
            url: "./controllers/ZonasControllers.php?action=obtenerZonas", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#fk_id_zona');
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
            url: "./controllers/RutasControllers.php?action=obtenerUltimaRuta", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var numero = parseInt(data.numero_R) + 1;
                $("#numero_R").val(numero);
            }
        });


        $("#crearRuta").on("click", function(e) {
            e.preventDefault();
            var formData = new FormData($("#formCrearRuta")[0]);
            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagen[]", imageFiles[i]);
            }
            $.ajax({
                type: "POST",
                url: './controllers/RutasControllers.php?action=crearRuta',
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (typeof response == 'object') {
                        $('#modalCrearRuta').modal('hide');
                        $('#card-container-productos').empty();
                        var formulario = document.getElementById("formCrearRuta");
                        var dropzone = Dropzone.forElement("#formCrearRuta");
                        formulario.reset();
                        dropzone.removeAllFiles();
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La sucursal se ha editado correctamente.',
                        });
                        iniciar();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: response,
                        });
                    }
                },
                error: function(error) {

                    let errorMessage = "Ocurrió un error al conectar con el controlador.";

                    if (error.status === 0) {
                        errorMessage = "No se pudo establecer conexión con el servidor.";
                    } else if (error.status === 404) {
                        errorMessage = "No se encontró el recurso solicitado.";
                    } else if (error.status === 500) {
                        errorMessage = "Error interno del servidor.";
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                    });

                }
            });
        });


        // ==============================================================
        // ================================= imprimir RUTA=============
        // ============================================================== 
        $(document).on("click", ".imprimirExcel", function() {
            var idZona = $(this).attr('id');
            var fecha = $('#fecha').val();

            if (fecha) {
                var url = 'pdfs/excel.php?fecha=' + encodeURIComponent(fecha) + '&idZona=' + encodeURIComponent(idZona);
                window.open(url, '_blank');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Seleccione una fecha ",
                });
            }
        });

        $(document).on("click", ".imprimirPdf", function() {
            var idZona = $(this).attr('id');
            var fecha = $('#fecha').val();

            if (fecha) {
                var url = 'pdfs/nota_envio.php?fecha=' + encodeURIComponent(fecha) + '&idZona=' + encodeURIComponent(idZona);
                window.open(url, '_blank');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Seleccione una fecha ",
                });
            }
        });


        //----------------guardando cambios
        $('#editarRutas').on('click', function(e) {
            console.log("edi")
            var formData = $('#formEditarRutas').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/RutasControllers.php?action=edidarRuta',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#modalEditarRuta').modal('hide');
                    $('#formEditarRutas')[0].reset();
                    console.log(" datos actualizados");
                    console.log(response);
                    var card = $('#card-' + response.id_ruta);
                    card.find('.nombreR').text(response.nombre_R);
                    card.find('.numeroR').text(response.numero_R);
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La Zona se ha editado correctamente.',
                    });
                },
                error: function(error) {

                }
            });
        });




        // ==============================================================
        // ================================= ELIMINAR SUCURSAL===========
        // ============================================================== 


        // Evento de clic para el botón de eliminar
        $(document).on("click", ".eliminar", function() {
            var idRuta = $(this).attr('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Realmente deseas eliminar esta Ruta?',
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
                        url: './controllers/RutasControllers.php?action=eliminarRuta',
                        data: {
                            id_ruta: idRuta
                        },
                        success: function(response) {

                            if (response == '"ok"') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'La sucursal eliminado correctamente.',
                                });
                                var tarjetaAEliminar = $('#card-' + idRuta);
                                tarjetaAEliminar.fadeOut(300, function() {
                                    tarjetaAEliminar.remove();
                                });

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Érror',
                                    text: 'La sucursal no se eliminado correctamente.' + response,
                                });
                            }
                        },
                        error: function(error) {
                            console.log('Error en la petición AJAX:', error);
                        }
                    });
                }
            });
        });
    </script>