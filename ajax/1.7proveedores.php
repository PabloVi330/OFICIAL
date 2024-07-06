<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
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
                    <h4 class="mb-sm-0 font-size-18">Proveedores</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Proveedores</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- =================MODAL CREAR NUEVO USUARIO-->

        <button type="button" class="btn btn-primary
                                waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearProveedor">
            Nuevo Proveedor</button>

        <div id="modalCrearProveedor" class="modal fade " tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel">Registrar Nuevo Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearProveedor" class="dropzone p-0">

                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="col-12">
                                                        <label for="nombre_Pro" class="form-label">Nombre:</label>
                                                        <input class="form-control" type="text" id="nombre_Pro" name="nombre_Pro" requerid>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="direccion_Pro" class="form-label">Direccion:</label>
                                                        <input class="form-control" type="text" id="direccion_Pro" name="direccion_Pro" requerid>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="telefono_Pro" class="form-label">Telefono</label>
                                                        <input class="form-control" type="number" id="telefono_Pro" name="telefono_Pro" requerid>
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
                                                btn-secondary waves-effect" data-bs-dismiss="modal" id="limpiar">Cerrar</button>
                            <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light " id="guardarProveedor">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>


        <!-- ==============TABLA DE SUCURSALES -->
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id='datatable-Proveedores' class="table
                            table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>


                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div>
        </div>

        <!-- ===============MODAL EDITAR SUCURSAL -->
        <div id="modalEditarProveedor" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Editar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card">
                                <form action="#" id="formEditarProveedor" class="dropzone p-0">

                                    <!-- CARGA DE DATROS -->
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div>
                                                    <h5 class="font-size-14 mb-3"></h5>
                                                    <div class="row">
                                                        <input type="hidden" name="Eid_Proveedor" id="Eid_Proveedor">

                                                        <div class="col-12">
                                                            <label for="Enombre_Pro" class="form-label">Nombre:</label>
                                                            <input class="form-control" type="text" id="Enombre_Pro" name="Enombre_Pro" requerid>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="Edireccion_Pro" class="form-label">Direccion:</label>
                                                            <input class="form-control" type="text" id="Edireccion_Pro" name="Edireccion_Pro" requerid>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="Etelefono_Pro" class="form-label">Telefono</label>
                                                            <input class="form-control" type="number" id="Etelefono_Pro" name="Etelefono_Pro" requerid>
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
                            <!-- end card -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn
                                                btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="editarProveedor">Guardar Cambios</button>
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
    <script src="assets/libs/@simonwep/pickr/pickr.min.js"></script>
    <script src="assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

    <!-- datepicker js -->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-advanced.init.js"></script>
    <script src="assets/libs/selectize/selectize.js"></script>
    <script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    <script>
        function resetForm() {
            var formulario = document.getElementById("formCrearProveedor");
            var dropzone = Dropzone.forElement("#formCrearProveedor");
            formulario.reset();
            dropzone.removeAllFiles();
            var table = $('#datatable-Proveedores').DataTable();
            table.ajax.reload();

        }

        $(document).ready(function() {
            $("#limpiar").on("click", function(e) {
                e.preventDefault();
                resetForm();
            })

        });


        // ======== LLAMADA A LA TABLA 
        $(document).ready(function() {
            var table = $('#datatable-Proveedores').DataTable({
                lengthChange: true,
                buttons: [
                    'copy', 'excel', 'pdf', 'colvis'
                ],
                ajax: {
                    url: './controllers/ProveedoresControllers.php?action=obtenerProveedores',
                    dataSrc: ''
                },
                columns: [{
                        data: 'id_proveedor'
                    },
                    {
                        data: 'nombre_Pro'
                    },
                    {
                        data: 'direccion_Pro'
                    },
                    {
                        data: 'telefono_Pro'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-sm btn-info btn-editar  btn-lg" data-id="' + row.id_proveedor + '"><i class="fas fa-edit fa-2x"></i></button>  <button class="btn btn-sm btn-danger btn-eliminar" data-id="' + row.id_proveedor + '"><i class="fas fa-trash-alt fa-2x"></i></button>';
                        }
                    }
                ]
            });

            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'copy', 'excel', 'pdf', 'colvis'
                ]
            });

            table.buttons().container()
                .appendTo('#datatable-Proveedores_wrapper .col-md-6:eq(0)');

            $(".dataTables_length select").addClass('form-select form-select-sm');
        });


        /* ==============================
        -------------CREAR PROVEEDOR--------------
        =================================== */


        $("#guardarProveedor").on("click", function(e) {
            e.preventDefault();

            var formData = new FormData($("#formCrearProveedor")[0]);
            var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append("imagenes[]", imageFiles[i]);
            }

            $.ajax({
                type: "POST",
                url: "./controllers/ProveedoresControllers.php?action=crearProveedor",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response == '"ok"') {
                        $('#modalCrearProveedor').modal('hide');
                        resetForm();
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'El Proveedor se ha creado correctamente.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'El Proveedor no se ha creado correctamente.' + response,
                        });
                    }


                },
                error: function(error) {
                    console.log("Error en la petición AJAX:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'El Proveedor se ha creado correctamente.' + error.message,
                    });
                }
            });
        });


        /*================================================================
        -------------------EDITAR Proveedor--------------------------
        =================================================================*/

        $('#datatable-Proveedores').on('click', '.btn-editar', function() {
            var idProveedor = $(this).data('id');
            console.log(idProveedor);
            $.ajax({
                type: 'POST',
                url: './controllers/ProveedoresControllers.php?action=obtenerProveedorPorId',
                data: {
                    id_proveedor: idProveedor
                },
                dataType: 'json',
                success: function(response) {
                    console.log("Respuesta del servidor:", response);

                    $('#Eid_proveedor').val(idProveedor);
                    $('#Enombre_Pro').val(response.nombre_Pro);
                    $('#Edireccion_Pro').val(response.direccion_Pro);
                    $('#Etelefono_Pro').val(response.telefono_Pro);

                    $('#modalEditarProveedor').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
            $('#editarProveedor').click(function() {

                var formData = $('#formEditarProveedor').serialize();
                $.ajax({
                    type: 'POST',
                    url: './controllers/ProveedoresControllers.php?action=editarProveedor',
                    data: formData,
                    success: function(response) {
                        if (response == '"ok"') {
                            $('#modalEditarProveedor').modal('hide');
                            resetForm();
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'El proveedor fue actualizado correctamente',
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Érror',
                                text: 'El proveedor no  fue actualizado correctamente' + response,
                            });
                        }
                    },
                    error: function(error) {

                    }
                });
            });

        });



        /*============================================================
        ------------ELIMINAR Proveedor--------------------------
        ============================================================*/

        $(document).ready(function() {
            $('#datatable-Proveedores').on('click', '.btn-eliminar', function() {
                var idProveedor = $(this).data('id'); // Obtener el ID de la sucursal desde el atributo data-id
                console.log(idProveedor)

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¿Realmente deseas eliminar este Proveedor?',
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
                            url: './controllers/ProveedoresControllers.php?action=eliminarProveedor',
                            data: {
                                id_proveedor: idProveedor
                            },
                            success: function(response) {
                                resetForm();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'El usuario se elimino correctamente.',
                                });
                            },
                            error: function(error) {
                                console.log('Error en la petición AJAX:', error);
                            }
                        });
                    }
                });
            });
        })
    </script>