<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Usuarios</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Usuarios</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- =================MODAL CREAR NUEVO USUARIO-->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total de usuarios <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center
                    justify-content-end gap-2 mb-3">

                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario"><i class="bx bx-plus
                                me-1"></i> Nuevo usuario</button>

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

        <!-- ============== USUARIOS -->
        <div>
            <div class="row" id="card-container-usuarios">

            </div>
        </div>


        <!-- ================== MODAL CREAR USUARIO -->
        <div id="modalCrearUsuario" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel"> <i class=" fas fa-user-check fa-2x"></i>Registrar nuevo usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearUsuario" class="dropzone p-0">

                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Seleccionar Ruta</label>
                                                            <select class="form-control" data-trigger name="rutas" id="rutas" requerid>
                                                                <option value="">Seleccionar Ruta</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="listaRutas" id="listaRutas">

                                                    <div class="row" id="lista_rutas">

                                                    </div>


                                                    <div class="col-lg-4 col-md-6">
                                                        <label for="usuario" class="form-label">Usuario</label>
                                                        <input class="form-control" type="text" id="usuario" name="usuario" requerid>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6">
                                                        <label for="password" class="form-label">Constrasena</label>
                                                        <input class="form-control" type="text" id="password" name="password" requerid>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6">
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                        <input class="form-control" type="text" id="nombre" name="nombre" requerid>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="perfil" class="form-label font-size-13 text-muted">Perfil</label>
                                                            <select class="form-control" data-trigger name="perfil" id="perfil" requerid>
                                                                <option value="">Seleccionar Area</option>
                                                                <option value="administrador">Administrador</option>
                                                                <option value="supervisor">Supervisor</option>
                                                                <option value="ventas">Ventas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                        <!-- end card body -->

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
                                    </div>
                                    <!-- end card -->
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light " id="guardarUsuario">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>



        <!-- ===============MODAL EDITAR USUARIO -->
        <div id="modalEditarUsuario" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class=" fas fa-user-edit fa-2x"></i> Editar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <form action="#" id="formEditarUsuario" class="dropzone p-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="hidden" name="Efoto" id="Efoto">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="Erutas" class="form-label font-size-13 text-muted">Seleccionar Ruta</label>
                                                            <select class="form-control" data-trigger name="Erutas" id="Erutas" requerid>
                                                                <option value="">Seleccionar Ruta</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="ElistaRutas" id="ElistaRutas">

                                                    <div class="row" id="Elista_rutas">

                                                    </div>


                                                    <div class="col-lg-4 col-md-6">
                                                        <label for="Enombre" class="form-label">Nombre</label>
                                                        <input class="form-control" type="text" id="Enombre" name="Enombre" requerid>
                                                    </div>


                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="Eperfil" class="form-label font-size-13 text-muted">Perfil</label>
                                                            <select class="form-control" data-trigger name="Eperfil" id="Eperfil" requerid>
                                                                <option value="">Seleccionar Area</option>
                                                                <option value="administrador">Administrador</option>
                                                                <option value="supervisor">Supervisor</option>
                                                                <option value="ventas">Ventas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                        <!-- end card body -->

                                        <!-- CARGA DE IMAGENES -->
                                        <div class="row">
                                            <img width="200px" height="200px" src="assets/images/users/avatar-4.jpg">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Imagenes</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div>

                                                            <div class="fallback">
                                                                <input name="Eimagenes" type="file" enctype="multipart/form-data">
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

                                    </div>
                                </form>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="editarUsuario">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <!-- ======================================b=================================================================================== -->

    <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            $(".dropzone").dropzone();
        });
    </script>

    <script>
        function resetForm() {
            var formulario = document.getElementById("formEditarUsuario");
            var dropzone = Dropzone.forElement("#formEditarUsuario");
            formulario.reset();
            dropzone.removeAllFiles();

            var table1 = $('#datatable-usuarios').DataTable();
            table1.ajax.reload(function() {
                // Verifica si la columna existe antes de intentar reinicializarla
                if (table1.cell(0, 2) !== undefined) {
                    // Reinicializa y redibuja la tercera columna (índice 2) de la primera fila
                    table1.cell(0, 2).invalidate().draw();
                    console.log('Columna reinicializada correctamente');
                } else {
                    console.error('La columna no existe en la tabla.');
                }
            });


        }

        $(".limpiar").on("click", function(e) {
            e.preventDefault();
            $('#lista_rutas').empty();
            $('#Elista_rutas').empty();
            resetForm();
            console.log('limpiado')
        })



        var usuarios = null;
        async function obteberUsuarios() {
            try {
                const response = await $.ajax({
                    url: "./controllers/UsuariosControllers.php?action=obtenerUsuarios",
                });

                return response;
            } catch (error) {
                throw error;
            }
        }
        async function iniciar() {
            try {
                const respuesta = await obteberUsuarios();
                usuarios = JSON.parse(respuesta);
                console.log(usuarios);
                $("#cantidad").text(usuarios.length)
                cargar(usuarios);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }

        function cargar(usuarios1) {
            if (usuarios1.length > 0) {
                usuarios1.forEach(function(usuario) {

                    var cardHTML = `
                    <div class="col-xl-3 col-6 ">
                        <div class="card text-center" id="card-${usuario.id}">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>

                                <div class="mx-auto mb-4">
                                    <img src="./controllers/uploads/users/${usuario.foto}" alt=""
                                        class="rounded me-2" class="rounded me-2" style="max-width: 100%;" data-holder-rendered="true">
                                </div>
                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombre">
                                         Nombre:${usuario.nombre}
                                      </span>
                                      </a>
                                </h5>
                                <p class="text-muted mb-2">
                                   <span class="perfil">
                                   ${usuario.perfil}
                                   </span>
                                </p>
                            </div>                                

                            <div class="btn-group" role="group">
                                     <button id="${usuario.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> Editar
                                      </button>
                                        
                                    <button id="${usuario.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> Eliminar 
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-usuarios').append(cardHTML);

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




        // // ======================================================
        // -------------------------CREAR USUARIO ----------------
        // ======================================================== 
        $.ajax({
            url: "./controllers/RutasControllers.php?action=obtenerRutas", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#rutas');
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


        $('#rutas').change(function() {
            var selectedOption = $(this).val();
            var selectedOptionText = $(this).find('option:selected').text();
            console.log(selectedOptionText)
            if (true) {
                var alertDiv = $('<div>', {
                    class: 'alert alert-success alert-dismissible alert-label-icon label-arrow fade show',
                    role: 'alert',
                    html: '<i class="mdi mdi-check-all label-icon"></i><strong></strong>-' + selectedOptionText + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                });

                $('#lista_rutas').append(alertDiv);

            } else {
                $('#lista_rutas').empty();
            }
        });

        $("#guardarUsuario").on("click", function(e) {
            e.preventDefault();
            var valores = $('#lista_rutas').text();
            $('#listaRutas').val(valores.trim());
            // Obtén los datos del formulario
            var formData = new FormData($("#formCrearUsuario")[0]);

            // Obtén los archivos de imagen seleccionados
            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();

            // Agrega los archivos de imagen al FormData
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagenes[]", imageFiles[i]);
            }
            // Realiza la petición AJAX
            $.ajax({
                type: "POST",
                url: "./controllers/UsuariosControllers.php?action=crearUsuarios",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(response) {
                    console.log("Respuesta del servidor:", response);
                    if (response) {
                        $('#modalCrearUsuario').modal('hide');
                        $('#formCrearUsuario')[0].reset();

                        // Recargar la tabla DataTables
                        var table = $('#datatable-usuarios').DataTable();
                        table.ajax.reload();

                        // Mostrar SweetAlert2 de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'El usuarios se ha creado correctamente.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Éxito',
                            text: 'El usuarios se ha creado correctamente.',
                        });

                    }
                },
                error: function(error) {
                    console.log("Error en la petición AJAX:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'El usuarios se ha creado correctamente.' + error.message,
                    });
                }
            });
        });







        // // ======================================================
        // -------------------------EDITAR USUARIO ----------------
        // ========================================================



        $.ajax({
            url: "./controllers/RutasControllers.php?action=obtenerRutas", // Ajusta la ruta correcta
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#Erutas');
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

        function obtenerValoresListaRutas() {
            var valores = $('#Elista_rutas').text(); // O puedes usar .html() si necesitas el HTML dentro del div
            console.log(valores.trim());
            // Hacer lo que necesites con los valores obtenidos
        }

        $('#Erutas').change(function() {
            var selectedOption = $(this).val();
            var selectedOptionText = $(this).find('option:selected').text();
            console.log(selectedOptionText)
            if (true) {
                var alertDiv = $('<div>', {
                    class: 'alert alert-success alert-dismissible alert-label-icon label-arrow fade show',
                    role: 'alert',
                    html: '<i class="mdi mdi-check-all label-icon"></i><strong></strong>-' + selectedOptionText + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                });

                $('#Elista_rutas').append(alertDiv);
                obtenerValoresListaRutas();
            } else {
                $('#Elista_rutas').empty();
            }
        });

        $(document).on("click", ".editar", function() {
            var idUsuario = $(this).attr('id');
            console.log("ID de la sucursal seleccionada:", idUsuario);
           
            $.ajax({
                type: "POST",
                url: "./controllers/UsuariosControllers.php?action=obtenerUsuarioPorId",
                data: {
                    id_usuario: idUsuario
                },
                dataType: "json",
                cache: false,
                success: function(data) {

                    console.log(data);
                    var rutas = data.rutas.split("-");
                    console.log(rutas);
                    $('#Elista_rutas').empty();
                    for (var i = 0; i < rutas.length; i++) {
                        var alertDiv = $('<div>', {
                            class: 'alert alert-success alert-dismissible alert-label-icon label-arrow fade show',
                            role: 'alert',
                            html: '<i class="mdi mdi-check-all label-icon"></i><strong></strong> ' + rutas[i] + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                        });

                        $('#Elista_rutas').append(alertDiv);
                    }
                    $('#id').val(data.id);
                    $('#Enombre').val(data.nombre);
                    $('#Efoto').val(data.foto);

                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener datos:", error);
                    alert("Error al obtener datos: " + error);
                }
            });


            // Muestra el modal de edición
            $('#modalEditarUsuario').modal('show');
        });




        //----------------guardando cambios
        $('#editarUsuario').click(function(e) {

            var valores = $('#Elista_rutas').text();
            $('#ElistaRutas').val(valores.trim());
            
            var formData = new FormData($("#formEditarUsuario")[0]);

            var imageFiles = $(".dropzone")[1].dropzone.getAcceptedFiles();

            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("Eimagenes[]", imageFiles[i]);
            }
           
            $.ajax({
                type: "POST",
                url: './controllers/UsuariosControllers.php?action=editarUsuario',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                    
                    $('#modalEditarUsuario').modal('hide');

                    console.log(response);
                    var card = $('#card-' + response.id);
                    card.find('.nombre').text(response.nombre);
                    card.find('.perfil').text(response.direccion);
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


        // ===============================================================
        // ---------------------ELIMINAR USUARIO--------------------------
        // ===============================================================

        $(document).on("click", ".eliminar", function() {
            var idUsuario = $(this).attr('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Realmente deseas eliminar este usuario?',
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
                        url: './controllers/UsuariosControllers.php?action=eliminarUsuario',
                        data: {
                            id_usuario: idUsuario
                        },
                        success: function(response) {

                            if (response == '"ok"') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'La usuario eliminado correctamente.',
                                });
                                var tarjetaAEliminar = $('#card-' + idUsuario);
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