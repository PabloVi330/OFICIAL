
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Clientes</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Clientes</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>



        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total de clientes <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center
                    justify-content-end gap-2 mb-3">

                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearCliente"><i class="bx bx-plus
                                me-1"></i> Nuevo cliente</button>

                    </div>

                    <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16
                            shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else
                                    here</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- ==============SUCURSALES -->
        <div>
            <div class="row" id="card-container-rutas">

            </div>
        </div>




        <!-- =================MODAL CREAR ZONA-->
        <div id="modalCrearCliente" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <form class="needs-validation" id="formEditarZona">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="Eid_zona" class="form-label">ID</label>
                                                <input class="form-control" type="hidden" id="Eid_zona" name="Eid_zona">
                                            </div>
                                            <div class="col-12">
                                                <label for="Enombre_R" class="form-label">Nombre</label>
                                                <input class="form-control" type="text" id="Enombre_R" name="Enombre_R">
                                            </div>

                                            <div class="col-12">
                                                <label for="Enumero_R" class="form-label">Referencia</label>
                                                <input class="form-control" type="text" id="Enumero_R" name="Enumero_R">
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
                                                waves-light" id="editarZona">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <!-- ========================================================================================================================= -->

    <!-- Datatable init js -->
    <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            $(".dropzone").dropzone();
        });
    </script>

    <!-- choices js -->
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>

    <script>
        var ventas = null;
        async function obteberRutas() {
            try {
                const response = await $.ajax({
                    url: "./controllers/VentasControllers.php?action=obtenerVentas",
                    cache: false
                });

                return response;
            } catch (error) {
                throw error;
            }
        }
         async function iniciar() {
            try {
                const respuesta = await obteberRutas();
                ventas = JSON.parse(respuesta);
                console.log(ventas);
                $("#cantidad").text(ventas.length)
                cargar(ventas);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }


        function cargar(ventas1) {
            if (ventas1.length > 0) {
                ventas1.forEach(function(venta) {
                    
                    var cardHTML = `
                    <div class="col-xl-3 col-6 ">
                        <div class="card text-center" id="card-${venta.id_venta}">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>

                                <div class="mx-auto mb-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/6326/6326055.png" alt=""
                                        class="rounded me-2" class="rounded me-2" style="max-width: 100%;" data-holder-rendered="true">
                                </div>

                                <p class="text-muted mb-2">
                                 
                                </p>

                                <p class="text-muted mb-2">
                                  <a href="" target="_blank">
                                   <span class="numeroR">
                                       Ubicacion: <i class=" fas fa-map-marker-alt fa-2x"></i>
                                   </span>
                                   </a>
                                </p>

                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombreS">
                                       Nombre: 
                                      </span>
                                      </a>
                                </h5>
                                
                            </div>

                            <div class="btn-group" role="group">
                                     <button id="${venta.id_venta}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> Editar
                                      </button>
                                        
                                    <button id="${venta.id_venta}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> Eliminar 
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-rutas').append(cardHTML);

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

                $('#card-container-rutas').append(cardHTML);

            }

        }
        iniciar();

        // ==============================================================
        // ================================= CREAR ZONA================
        // ============================================================== 

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
                        $('#modalCrearCliente').modal('hide');
                        $('#card-container-rutas').empty();
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
        // ================================= EDITAR SUCURSAL=============
        // ============================================================== 
        $(document).on("click", ".editar", function() {
            var idRuta = $(this).attr('id');
            console.log("ID de la zona seleccionada:", idRuta);
            $.ajax({
                type: "POST",
                url: "./controllers/ZonasControllers.php?action=obtenerZonaPorId",
                data: {
                    id_zona: idRuta
                },
                dataType: "json", // Esperamos recibir datos en formato JSON
                success: function(data) {
                    console.log(data);
                    $('#Eid_zona').val(data.id_zona);
                    $('#Enombre_R').val(data.nombre_R);
                    $('#Enumero_R').val(data.numero_R);
                    $('#modalEditarRuta').modal('show');
                    //$('#Ecoordenadas_Z').val(data.coordenadas_Z);

                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener datos:", error);
                    alert("Error al obtener datos: " + error);
                }
            });


            // Muestra el modal de edición
            $('#mocalEditarZona').modal('show');
        });


        //----------------guardando cambios
        $('#editarZona').on('click', function(e) {
            console.log("edi")
            var formData = $('#formEditarZona').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/ZonasControllers.php?action=edidarZona',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    //$('#modalEditarRuta').modal('hide');
                    //$('#formEditarZona')[0].reset();
                    console.log(" datos actualizados");
                    console.log(response);
                    var card = $('#card-' + response.id_zona);
                    card.find('.nombreZ').text(response.nombre_R);
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

