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
            <div class="col-lg-4">
                <div class="mb-3">
                    <h5 class="card-title">Total de clientes <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="mb-3 " style="width: 50%; margin: auto; ">
                    <input type="text" class="form-control" style="border-radius: 20px;" id="serch">
                </div>
            </div>

            <div class="col-lg-4">
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
            <div class="row" id="card-container-clientes">

            </div>
        </div>




        <!-- =================MODAL CREAR CLIENTE-->
        <div id="modalCrearCliente" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nuevo cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearCliente" class="dropzone p-0">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <h5 class="font-size-14 mb-3"></h5>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label for="id_ruta" class="form-label font-size-13 text-muted">Seleccionar
                                                            Ruta</label>
                                                        <select class="form-control" data-trigger name="id_ruta" id="id_ruta">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-lg-6 col-md-12">
                                                    <label for="codigo" class="form-label">Codigo </label>
                                                    <input class="form-control" type="text" id="codigo" name="codigo">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre </label>
                                                    <input class="form-control" type="text" id="nombre" name="nombre">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Telefono</label>
                                                    <input class="form-control" type="text" id="telefono" name="telefono">
                                                </div>

                                                <div class="col-12">
                                                    <label for="direccion" class="form-label"> Direccion</label>
                                                    <input class="form-control" type="text" id="direccion" name="direccion">
                                                </div>

                                                <div class="col-12">
                                                    <label for="ubicacion" class="form-label"> Ubicacion</label>
                                                    <input class="form-control" type="text" id="ubicacion" name="ubicacion">
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
                                                waves-light" id="crearCliente">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- ===============MODAL EDITAR ZONA -->
        <div id="modalEditarCliente" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" id="formEditarCliente">
                                        <div class="row">
                                            <input class="form-control" type="hidden" id="Eid_cliente" name="Eid_cliente">
                                            <div class="mb-3">
                                                <label for="Efk_id_ruta" class="form-label font-size-13 text-muted">Seleccionar Zona</label>
                                                <select class="form-control" data-trigger name="Efk_id_ruta" id="Efk_id_ruta" requerid>
                                                    <option value="">Seleccionar Ruta</option>

                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="Enombre" class="form-label">Nombre</label>
                                                <input class="form-control" type="text" id="Enombre" name="Enombre">
                                            </div>
                                            <div class="col-12">
                                                <label for="Etelefono" class="form-label">Telefono</label>
                                                <input class="form-control" type="text" id="Etelefono" name="Etelefono">
                                            </div>

                                            <div class="col-12">
                                                <label for="Edireccion" class="form-label">Direccion</label>
                                                <input class="form-control" type="text" id="Edireccion" name="Edireccion">
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
                                                waves-light" id="editarCliente">Guardar Cambios</button>
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
    <script>
        var clientes = null;
        async function obteberRutas() {
            try {
                const response = await $.ajax({
                    url: "./controllers/ClientesControllers.php?action=obtenerClientes",
                });

                return response;
            } catch (error) {
                throw error;
            }
        }
        async function iniciar() {
            try {
                const respuesta = await obteberRutas();
                clientes = JSON.parse(respuesta);
                console.log(clientes);
                $("#cantidad").text(clientes.length)
                cargar(clientes);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }


        function cargar(clientes1) {
            if (clientes1.length > 0) {
                clientes1.forEach(function(cliente) {

                    var cardHTML = `
                    <div class="col-xl-2 col-6 ">
                        <div class="card text-center" id="card-${cliente.id}">
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

                                <div class="row">
                                    <p class="text-muted mb-2 col-6">
                                    <a href="https://wa.me/+591${cliente.telefono}" target="_blank">
                                    <span class="nombreZ">
                                        <i class="fab fa-whatsapp fa-2x"></i>
                                    </span>
                                    </a>
                                    </p>

                                    <p class="text-muted mb-2 col-6">
                                    <a href="${cliente.ubicacion}" target="_blank">
                                    <span class="numeroR">
                                        <i class=" fas fa-map-marker-alt fa-2x"></i>
                                    </span>
                                    </a>
                                    </p> 
                                </div>

                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombre">
                                       ${cliente.nombre}
                                      </span>
                                      </a>
                                </h5>
                                
                            </div>

                            <div class="btn-group" role="group">
                                     <button id="${cliente.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> 
                                      </button>
                                        
                                    <button id="${cliente.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> 
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-clientes').append(cardHTML);

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

                $('#card-container-clientes').append(cardHTML);

            }

        }
        iniciar();

        // ==============================================================
        // ================================= CREAR CLIENTE================
        // ============================================================== 

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


        $("#crearCliente").on("click", function(e) {

            var formData = new FormData($("#formCrearCliente")[0]);

            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();

            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagen[]", imageFiles[i]);
            }
            $.ajax({
                type: "POST",
                url: "./controllers/ClientesControllers.php?action=crearCliente",
                data: formData,
                contentType: false,
                processData: false,
                cache: true,
                dataType: "json",
                success: function(cliente) {
                    if (typeof cliente == 'object') {
                        $('#modalCrearCliente').modal('hide');
                        $('#card-container-clientes').empty();
                        var formulario = document.getElementById("formCrearCliente");
                        var dropzone = Dropzone.forElement("#formCrearCliente");
                        formulario.reset();
                        dropzone.removeAllFiles();

                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La sucursal se ha editado correctamente.',
                        });

                        var cartHTML = `
                        <div class="col-xl-2 col-6 ">
                                <div class="card text-center" id="card-${cliente.id}">
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

                                        <div class="row">
                                            <p class="text-muted mb-2 col-6">
                                            <a href="https://wa.me/+591${cliente.telefono}" target="_blank">
                                            <span class="nombreZ">
                                                <i class="fab fa-whatsapp fa-2x"></i>
                                            </span>
                                            </a>
                                            </p>

                                            <p class="text-muted mb-2 col-6">
                                            <a href="${cliente.ubicacion}" target="_blank">
                                            <span class="numeroR">
                                                <i class=" fas fa-map-marker-alt fa-2x"></i>
                                            </span>
                                            </a>
                                            </p> 
                                        </div>

                                        <h5 class="font-size-16 mb-1">
                                            <a href="#" class="text-dark">
                                            <span class="nombreS">
                                            ${cliente.nombre}
                                            </span>
                                            </a>
                                        </h5>
                                        
                                    </div>

                                    <div class="btn-group" role="group">
                                            <button id="${cliente.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                                <i class="fas fa-edit">
                                                </i> 
                                            </button>
                                                
                                            <button id="${cliente.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                            <i class="fas fa-trash-alt fa-1x">
                                            </i> 
                                            </button>                                
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>`;

                        $('#card-container-clientes').prepend(cartHTML);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: cliente,
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
        // ================================= EDITAR CLIENTE=============
        // ============================================================== 
        $(document).on("click", ".editar", function() {
            var idCliente = $(this).attr('id');
            console.log("ID de la zona seleccionada:", idCliente);
            $.ajax({
                type: "POST",
                url: "./controllers/ClientesControllers.php?action=obtenerClientePorId",
                data: {
                    id_cliente: idCliente
                },
                dataType: "json", // Esperamos recibir datos en formato JSON
                success: function(data) {

                    var fk_id_ruta = data.id_ruta;
                    $.ajax({
                        type: 'POST',
                        url: './controllers/RutasControllers.php?action=obtenerRutas',
                        dataType: 'json',
                        success: function(response) {
                            var rutaDeseada = response.find(function(ruta) {
                                return ruta.id_ruta == fk_id_ruta;
                            });
                            console.log("Sucursal encontrada:", rutaDeseada);
                            var selectRuta = $('#Efk_id_ruta');
                            selectRuta.empty();

                            selectRuta.append($('<option>', {
                                value: rutaDeseada.id_ruta,
                                text: rutaDeseada.nombre_R
                            }));

                            $.each(response, function(index, ruta) {
                                if (ruta.id_ruta !== fk_id_ruta) {
                                    selectRuta.append($('<option>', {
                                        value: ruta.id_ruta,
                                        text: ruta.nombre_R
                                    }));
                                }

                            });

                        },
                        error: function(error) {
                            console.error('Error en la petición AJAX:', error);
                        }
                    });
                    console.log(data);
                    $('#Eid_cliente').val(data.id);
                    $('#Enombre').val(data.nombre);
                    $('#Etelefono').val(data.telefono);
                    $('#Edireccion').val(data.direccion);
                    $('#modalEditarCliente').modal('show');
                    //$('#Ecoordenadas_Z').val(data.coordenadas_Z);

                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener datos:", error);
                    alert("Error al obtener datos: " + error);
                }
            });


            // Muestra el modal de edición
            $('#mocalEditarCliente').modal('show');
        });


        //----------------guardando cambios
        $('#editarCliente').on('click', function(e) {
            console.log("edi")
            var formData = $('#formEditarCliente').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/ClientesControllers.php?action=editarCliente',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    //$('#modalEditarCliente').modal('hide');
                    //$('#formEditarCliente')[0].reset();
                    console.log(" datos actualizados");
                    console.log(response);
                    var card = $('#card-' + response.id);
                    card.find('.nombre').text(response.nombre);
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

        //BUSCANDO ARTICULOS
        $('#serch').on('input', function() {
            // Obtener el valor del campo de búsqueda
            var query = $(this).val();
            console.log(query);
            $('#cantidad').empty();
            if (query != ' ') {
                $.ajax({
                    url: './controllers/ClientesControllers.php?action=filtrarClientes',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    dataType: 'json', // Suponiendo que la respuesta será JSON
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $('#card-container-clientes').empty();
                        $('#cantidad').text(data.length);
                        cargar(data);
                        if (query == '') {
                            $('#card-container-clientes').empty();
                        }
                    }
                });
            } else {
                iniciar();
            }
        });
    </script>