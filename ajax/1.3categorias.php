<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Categorias</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Categorias</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- =================MODAL CREAR CATEGORIA-->

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total de categorias <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center
                    justify-content-end gap-2 mb-3">

                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearCategoria"><i class="bx bx-plus
                                me-1"></i> Nueva categoria</button>

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

        <!-- ============== CATEGORIA -->
        <div>
            <div class="row" id="card-container-categorias">

            </div>
        </div>
        <!-- ============== MODAL CATEGORIA ============================================
           ========================================================================-->
        <div id="modalCrearCategoria" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nueva categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearCategoria">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="mb-3">
                                                        <label for="categoria" class="form-label">Nombre</label>
                                                        <input class="form-control" type="text" id="categoria" name="categoria">
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
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="guardarCategoria">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>




        <!-- ===============MODAL EDITAR SUCURSAL -->
        <div id="modalEditarCategoria" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" id="formEditarCategoria">
                                        <div class="row">
                                            <input type="hidden" id="Eid_categoria" name="Eid_categoria">
                                            <div class="col-12">
                                                <label for="Enombre_C" class="form-label">Codigo</label>
                                                <input class="form-control" type="text" id="Enombre_C" name="Enombre_C">
                                            </div>
                                            <hr>
                                            Activo
                                            <div class="col-12 m-a">
                                                <input type="hidden" id="Eestado_C" name="Eestado_C" value="">
                                                <input type="checkbox" id="switch3" switch="bool" name="switch3" />
                                                <label for="switch3" data-on-label="Si" data-off-label="No"></label>
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
                                                waves-light" id="editarCategoria">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>


   
    <!-- choices js -->
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- color picker js -->
    <script src="assets/libs/@simonwep/pickr/pickr.min.js"></script>
    <script src="assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

    <!-- datepicker js -->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>

    <!-- ========================================================================================================================= -->
    <script>
        var categorias = null;
        async function obteberCategorias() {
            try {
                const response = await $.ajax({
                    url: "./controllers/CategoriasControllers.php?action=obtenerCategorias",
                });

                return response;
            } catch (error) {
                throw error;
            }
        }

        async function iniciar() {
            try {
                const respuesta = await obteberCategorias();
                categorias = JSON.parse(respuesta);
                console.log(categorias);
                $("#cantidad").text(categorias.length)
                cargar(categorias);
            } catch (error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        }

        function cargar(categorias1) {
            if (categorias1.length > 0) {
                categorias1.forEach(function(categoria) {

                    var cardHTML = `
                    <div class="col-xl-3 col-6 ">
                        <div class="card text-center" id="card-${categoria.id}">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                </div>

                                <h5 class="font-size-16 mb-1">
                                      <a href="#" class="text-dark">
                                      <span class="nombre">
                                         ${categoria.categoria}
                                      </span>
                                      </a>
                                </h5>
                                
                            </div>                                

                            <div class="btn-group" role="group">
                                     <button id="${categoria.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> Editar
                                      </button>
                                        
                                    <button id="${categoria.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i> Eliminar 
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-categorias').append(cardHTML);

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


        // =================GUARDAR CATEGORIA

        $("#guardarCategoria").on("click", function(e) {
            e.preventDefault();
             console.log('GUARDAR CATEGORIA')
            var formData = new FormData($("#formCrearCategoria")[0]);
        

            $.ajax({
                type: "POST",
                url: './controllers/CategoriasControllers.php?action=crearCategoria',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#modalCrearCategoria').modal('hide');
                    $('#formCrearCategoria')[0].reset();
                    
                    if (response == '"ok"') {
                        $('#card-container-categorias').empty();
                        iniciar();
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La categoria se ha editado correctamente.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'La categoria se ha editado correctamente.' + response,
                        });
                    }

                },
                error: function(error) {
                    console.log("Error en la petición AJAX:", error);

                }
            });
        });


        // ================= EDITAR SUCURSAL 


        $('#datatable-categorias').on('click', '.btn-editar', function() {
            var row = $(this).closest('tr'); // Obtener la fila más cercana al botón "Editar"
            var data = $('#datatable-categorias').DataTable().row(row).data(); // Obtener los datos de la fila
            $('#Eid_categoria').val(data.id_categoria);
            $('#Enombre_C').val(data.nombre_C);
            $('#modalEditarCategoria').modal('show');
            if (data.estado_C == 1) {
                $('#switch3').prop('checked', true);
            } else {
                $('#switch3').prop('checked', false);
            }
        });

        //----------------guardando cambios
        $('#editarCategoria').click(function() {
            var estado_S = $('#switch3').prop('checked') ? 1 : 0;
            $('#Eestado_C').val(estado_S);
            var formData = $('#formEditarCategoria').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/CategoriasControllers.php?action=edidarCategorias',
                data: formData,
                success: function(response) {

                    $('#modalEditarCategoria').modal('hide');
                    $('#formEditarSucursal')[0].reset();

                    var table = $('#datatable-categorias').DataTable();
                    table.ajax.reload();
                    if (response == '"ok"') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La categoria ha editado correctamente.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'La categoria ha editado correctamente.' + response,
                        });
                    }

                },
                error: function(error) {
                    console.log("Error en la petición AJAX:", error);
                }
            });
        });




        //=========ELIMINAR CATEGORIAS


        $('#datatable-categorias').on('click', '.btn-eliminar', function() {
            var idCategoria = $(this).data('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Realmente deseas eliminar esta categoria?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'POST',
                        url: './controllers/ArticulosControllers.php?action=obtenerArticuloPorCategoria',
                        data: {
                            id_categoria: idCategoria
                        },
                        success: function(response) {
                            console.log(JSON.parse(response));

                            if (!JSON.parse(response)) {
                                $.ajax({
                                    type: 'POST',
                                    url: './controllers/CategoriasControllers.php?action=eliminarCategorias',
                                    data: {
                                        id_categoria: idCategoria
                                    },
                                    success: function(response) {
                                        var table = $('#datatable-categorias').DataTable();
                                        table.ajax.reload();
                                        if (response == '"ok"') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Éxito',
                                                text: 'La categoria eliminada correctamente.',
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Érror',
                                                text: 'La categoria no fue  eliminada correctamente.' + response,
                                            });
                                        }
                                    },
                                    error: function(error) {
                                        console.log('Error en la petición AJAX:', error);
                                    }
                                });
                            } else {
                                console.log('si tiene productos asociados ')
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'La categoria tiene productos asociados',
                                });
                            }
                        }

                    });

                }
            });
        });
    </script>