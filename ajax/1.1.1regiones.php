
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Zonas</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">zonas</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>



        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total de zonas <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center
                    justify-content-end gap-2 mb-3">

                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearZona"><i class="bx bx-plus
                                me-1"></i> Nueva zona</button>

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
            <div class="row" id="card-container-zonas">

            </div>
        </div>




        <!-- =================MODAL CREAR ZONA-->
        <div id="modalCrearZona" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nueva zona</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearZona" class="dropzone p-0">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Nombre</label>
                                                        <input class="form-control" type="text" id="nombre_Z" name="nombre_Z">
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="example-text-input" class="form-label"> Referencia</label>
                                                        <input class="form-control" type="text" id="referencia_Z" name="referencia_Z">
                                                    </div>

                                                </div>
                                                <!-- end row -->
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
                                                        <input name="imagenes" type="file" enctype="multipart/form-data">
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
                                                waves-light" id="crearZona">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        
        <!-- ===============MODAL EDITAR ZONA -->
        <div id="modalEditarZona" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar Zona</h5>
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
                                                <label for="Enombre_Z" class="form-label">Nombre</label>
                                                <input class="form-control" type="text" id="Enombre_Z" name="Enombre_Z">
                                            </div>

                                            <div class="col-12">
                                          <label for="Ereferencia_Z" class="form-label">Referencia</label>
                                                <input class="form-control" type="text" id="Ereferencia_Z" name="Ereferencia_Z">
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
    <!-- color picker js -->


    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>

    <script>
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
        async function iniciar() {
            try {
                const respuesta = await obteberZonas();
                zonas = JSON.parse(respuesta);
                console.log(zonas);
                $("#cantidad").text(zonas.length)
                cargar(zonas);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }

        function cargar(zonas1) {
            if (zonas1.length > 0) {
                zonas1.forEach(function(zona) {
                    var img =  JSON.parse(zona.coordenadas_Z)
                    console.log(img);
                    var cardHTML = `
                    <div class="col-xl-3 col-sm-6 ">
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
                                     <button id="${zona.id_zona}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> Editar
                                      </button>
                                        
                                    <button id="${zona.id_zona}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> Eliminar 
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
        iniciar();

        // ==============================================================
        // ================================= CREAR ZONA==============
        // ============================================================== 
        $("#crearZona").on("click", function(e) {
            e.preventDefault();
            var formData = new FormData($("#formCrearZona")[0]);
            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagen[]", imageFiles[i]);
            }
            $.ajax({
                type: "POST",
                url: './controllers/ZonasControllers.php?action=crearZona',
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (typeof response == 'object') {
                        $('#modalCrearZona').modal('hide');
                        $('#card-container-zonas').empty();
                        var formulario = document.getElementById("formCrearZona");
                        var dropzone = Dropzone.forElement("#formCrearZona");
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
            var idZona = $(this).attr('id');
            console.log("ID de la zona seleccionada:", idZona);
            $.ajax({
                type: "POST",
                url: "./controllers/ZonasControllers.php?action=obtenerZonaPorId",
                data: {
                    id_zona: idZona
                },
                dataType: "json", // Esperamos recibir datos en formato JSON
                success: function(data) {
                    console.log(data);
                    $('#Eid_zona').val(data.id_zona);
                    $('#Enombre_Z').val(data.nombre_Z);
                    $('#Ereferencia_Z').val(data.referencia_Z);
                    $('#modalEditarZona').modal('show');
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
        $('#editarZona').on('click',function(e) {
            console.log("edi")
            var formData = $('#formEditarZona').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/ZonasControllers.php?action=edidarZona',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    //$('#modalEditarZona').modal('hide');
                    //$('#formEditarZona')[0].reset();
                    console.log(" datos actualizados");
                    console.log(response);
                    var card = $('#card-' + response.id_zona);
                    card.find('.nombreZ').text(response.nombre_Z);
                    card.find('.referenciaZ').text(response.referencia_Z);
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
            var idZona = $(this).attr('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Realmente deseas eliminar esta Zona?',
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
                        url: './controllers/ZonasControllers.php?action=eliminarZona',
                        data: {
                            id_zona: idZona
                        },
                        success: function(response) {

                            if (response == '"ok"') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'La sucursal eliminado correctamente.',
                                });
                                var tarjetaAEliminar = $('#card-' + idZona);
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