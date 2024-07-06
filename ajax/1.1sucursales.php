<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sucursales</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Sucursales</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>



        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total de sucursales <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center
                    justify-content-end gap-2 mb-3">

                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#agregarSucursal"><i class="bx bx-plus
                                me-1"></i> Nueva Sucursal</button>

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
            <div class="row" id="card-container">

            </div>
        </div>




        <!-- =================MODAL CREAR SUCURSAL-->
        <div id="agregarSucursal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nueva sucursal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearSucursal" class="dropzone p-0">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Nombre</label>
                                                        <input class="form-control" type="text" id="nombre_S" name="nombre_S">
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="example-text-input" class="form-label">Direccion</label>
                                                        <input class="form-control" type="text" id="direccion_S" name="direccion_S">
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="example-text-input" class="form-label">Telefono</label>
                                                        <input class="form-control" type="number" id="telefono_S" name="telefono_S">
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
                                                waves-light" id="guardarSucursal">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- ===============MODAL EDITAR SUCURSAL -->
        <div id="editarSucursal" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar sucursal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" id="formEditarSucursal">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="Eid_sucursal" class="form-label">ID</label>
                                                <input class="form-control" type="hidden" id="Eid_sucursal" name="Eid_sucursal">
                                            </div>
                                            <div class="col-12">
                                                <label for="Enombre_S" class="form-label">Nombre</label>
                                                <input class="form-control" type="text" id="Enombre_S" name="Enombre_S">
                                            </div>

                                            <div class="col-12">
                                                <label for="Edireccion_S" class="form-label">Direccion</label>
                                                <input class="form-control" type="text" id="Edireccion_S" name="Edireccion_S">
                                            </div>
                                            <div class="col-12">
                                                <label for="Etelefono_S" class="form-label">Telefono</label>
                                                <input class="form-control" type="number" id="Etelefono_S" name="Etelefono_S">
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
                                                waves-light" id="editarSucursalE">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <!-- ========================================================================================================================= -->


    <!-- Required datatable js -->
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
        var sucursales = null;
        async function obteberSucursales() {
            try {
                const response = await $.ajax({
                    url: "./controllers/SucursalesControllers.php?action=obtenerSucursales",
                });
                return response;
            } catch (error) {
                throw error;
            }
        }
        async function iniciar() {
            try {
                const respuesta = await obteberSucursales();
                sucursales = JSON.parse(respuesta);
                console.log(sucursales);
                $("#cantidad").text(sucursales.length)
                cargar(sucursales);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }

        function cargar(sucursales1) {
            if (sucursales1.length > 0) {
                sucursales1.forEach(function(sucursal) {
                    var cardHTML = `
                    <div class="col-xl-4 col-sm-6 ">
                        <div class="card text-center" id="card-${sucursal.id_sucursal}">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>

                                <div class="mx-auto mb-4">
                                    <img src="https://e7.pngegg.com/pngimages/690/730/png-clipart-computer-icons-share-icon-icon-design-cafe-shop-cdr-text.png" alt=""
                                        class="rounded me-2" class="rounded me-2" style="max-width: 100%;height:300px;" data-holder-rendered="true">
                                </div>
                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombreS">
                                         ${sucursal.nombre_S}
                                      </span>
                                      </a>
                                </h5>
                                <p class="text-muted mb-2">
                                   <span class="direccionS">
                                   ${sucursal.direccion_S}
                                   </span>
                                </p>
                            </div>

                            <div class="btn-group" role="group">
                                     <button id="${sucursal.id_sucursal}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> Editar
                                      </button>
                                        
                                    <button id="${sucursal.id_sucursal}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> Eliminar 
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container').append(cardHTML);

                });
            } else {

                var cardHTML = `
                <div class="my-5 pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-5">
                                    <h1 class="display-1 fw-semibold">4<span class="text-primary mx-2">0</span>4</h1>
                                    <h4 class="text-uppercase">No hay Sucursales</h4>
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

                $('#card-container').append(cardHTML);

            }

        }
        iniciar();

        // ==============================================================
        // ================================= CREAR SUCURSAL==============
        // ============================================================== 
        $("#guardarSucursal").on("click", function(e) {
            e.preventDefault();
            var formData = new FormData($("#formCrearSucursal")[0]);
            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagenes[]", imageFiles[i]);
            }
            $.ajax({
                type: "POST",
                url: './controllers/SucursalesControllers.php?action=crearSucursal',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#agregarSucursal').modal('hide');
                    $('#formCrearSucursal')[0].reset();
                    $('#card-container').empty();
                    if (true) {
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
            var idSucursal = $(this).attr('id');
            console.log("ID de la sucursal seleccionada:", idSucursal);
            $.ajax({
                type: "POST",
                url: "./controllers/SucursalesControllers.php?action=obtenerSucursalPorId",
                data: {
                    id_sucursal: idSucursal
                },
                dataType: "json", // Esperamos recibir datos en formato JSON
                success: function(data) {
                    $('#Eid_sucursal').val(data.id_sucursal);
                    $('#Enombre_S').val(data.nombre_S);
                    $('#Edireccion_S').val(data.direccion_S);
                    $('#Etelefono_S').val(data.telefono_S);

                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener datos:", error);
                    alert("Error al obtener datos: " + error);
                }
            });


            // Muestra el modal de edición
            $('#editarSucursal').modal('show');
        });



        //----------------guardando cambios
        $('#editarSucursalE').click(function() {
            var formData = $('#formEditarSucursal').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/SucursalesControllers.php?action=edidarSucursal',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#editarSucursal').modal('hide');
                    $('#formEditarSucursal')[0].reset();
                    console.log(response);
                    var card = $('#card-' + response.id_sucursal);
                    card.find('.nombreS').text(response.nombre_S);
                    card.find('.direccionS').text(response.direccion_S);
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La sucursal se ha editado correctamente.',
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
            var idSucursal = $(this).attr('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Realmente deseas eliminar esta sucursal?',
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
                        url: './controllers/SucursalesControllers.php?action=eliminarSucursales',
                        data: {
                            id_sucursal: idSucursal
                        },
                        success: function(response) {

                            if (response == '"ok"') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'La sucursal eliminado correctamente.',
                                });
                                var tarjetaAEliminar = $('#card-' + idSucursal);
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