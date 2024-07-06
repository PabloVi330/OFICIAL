<?php
session_start();
?>
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />

<!-- data tables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- ================================================================
        -------------------- TITULOS --------------------------------
        ================================================================ -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Mantenimientos</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Mantenimientos</a></li>
                            <li class="breadcrumb-item active">Mantenimientos</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- =================================================================
        --------------------- SUBT TITULOS ------------------------
        ================================================================= -->

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Cantidad de Mantenimientos<span class="text-muted
                            fw-normal ms-2" id="numeroMantenimientos">(834)</span></h5>
                </div>
            </div>


        </div>
        <!-- end row -->


        <!--=================================================
        ---------------CREAR MANTENIMIENTO-----------
        ===================================================== -->
        <div class="row">
            <div class="col-lg-4 col-md-12 ">
                <button type="button" class="btn btn-primary
                                waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalCrearOferta">
                    <i class=" fas fa-plus-circle"></i> Nueva Oferta
                </button>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
                <input type="text" class="form-control" id="buscador" placeholder="Buscar... " style="width: 200px;">
            </div>

        </div>

        <hr>


        <div id="modalCrearOferta" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Registrar nueva Oferta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearOferta" class="dropzone p-0">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="mb-3">
                                                        <label for="nombre_C" class="form-label">Fecha Limite</label>
                                                        <input class="form-control" type="date" id="fecha" name="fecha">
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
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal" id="limpiar">Cerrar</button>
                        <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light" id="guardarOferta">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    </div>


</div>

<!-- =====================================================
    -------------------CARDS-----------------------
    =======================================================-->

<div class="row p-5" id="card-container">
    <!-- los cards vienen aqui -->
</div>











</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<!-- init js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- select2 js -->
<script src="assets/libs/select2/select2.full.min.js"></script>

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
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        $(".dropzone").dropzone();
        $('input[type="number"]').on('wheel', function(e) {
            e.preventDefault();
        });

    });
</script>

<script>
    var ofertas = null;
    async function obteberMaquinas() {
        try {
            const response = await $.ajax({
                url: "./controllers/OfertasControllers.php?action=obtenerOfertas",
            });
            return response;
        } catch (error) {
            throw error;
        }
    }
    async function iniciar() {
        try {
            const respuesta = await obteberMaquinas();
            ofertas = JSON.parse(respuesta);
            $("#numeroMantenimientos").text(ofertas.length)
            cargar(ofertas);
        } catch (error) {
            console.error("Error en la solicitud Ajax:", error);
        }
    }

    function cargar(ofertas1) {
        if (ofertas1.length > 0) {
            ofertas1.forEach(function(item) {
                var foto = JSON.parse(item.imagen);
                var fecha = true;
                var fechaActual = new Date();
                var año = fechaActual.getFullYear();
                // Obtener el mes y agregar un cero adelante si es necesario (los meses en JavaScript van de 0 a 11)
                var mes = ("0" + (fechaActual.getMonth() + 1)).slice(-2);
                // Obtener el día y agregar un cero adelante si es necesario
                var dia = ("0" + fechaActual.getDate()).slice(-2);
                // Formatear la fecha
                var fechaFormateada = año + "-" + mes + "-" + dia;

                var fechaOferta = new Date(item.fecha).getTime();
                var fe = new Date(fechaFormateada).getTime();
                console.log("fecha actual " + fe);
                console.log("fecha oferta " + fechaOferta);
                // Comparar las fechas en milisegundos
                if (fechaOferta < fe) {
                    fecha = false;
                    console.log("cambio las el estado")
                } else {
                    console.log("no cambio el; estado")
                }
                var cardHTML = `
                    <div class="col-xl-4 col-sm-6 ">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>                                    
                                </div>
                                <div class="mx-auto mb-4">
                                    <img src="http://localhost/extelsin/controllers/uploads/ofertas/${foto[0]}" alt=""
                                        class="rounded me-2" class="rounded me-2" style="max-width: 100%;height:300px;" data-holder-rendered="true">
                                </div>
                                <h5 class="font-size-16 mb-1"><a href="#"
                                        class="text-dark">${item.fecha}</a></h5>
                                <p class="text-muted mb-2"></p>
                            </div>

                            <div class="btn-group" role="group">
                                ${fecha?
                                    ` <button type="button" class="btn btn-outline-success
                                    waves-effect waves-light"><i class="bx bx-loader bx-spin font-size-16
                                        align-middle me-2"></i> Activo</button>`
                                    : `<button type="button" class="btn btn-outline-warning
                                        waves-effect waves-light"> <i class="bx bx-hourglass bx-spin font-size-16
                                    align-middle me-2"></i>Pasado</button>`
                                }
                                    <button type="button" class="btn btn-soft-danger
                                    waves-effect  btn-label waves-light eliminar " id="${item.id_ofertas}"><i class="fas fa-trash-alt"></i> Eliminar</button>
                            </div>
                           <br>
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
                                    <h4 class="text-uppercase">No hay Servicios</h4>
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


    //ANCHOR BUSCADOR        =================================================================================================================================================================================================
    $("#buscador").on("input", function() {
        const consulta = $(this).val();
        console.log(consulta);
        const resultados = buscar(consulta);
        $('#card-container').empty();
        cargar(resultados);
    });


    function buscar(query) {

        const resultados = maquinas.filter((objeto) => {
            const descripcion = objeto.descripcion.toLowerCase();
            const modelo = objeto.modelo.toLowerCase();
            const usuario = objeto.nombre_usuario.toLowerCase();
            query = query.toLowerCase();
            return descripcion.includes(query) || modelo.includes(query) || usuario.includes(query);
        });

        return resultados;
    }



    //FIXME - CREAR OFERTAS =============================================================================================================================================================================================

    $("#guardarOferta").on("click", function(e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del botón

        var formData = new FormData($("#formCrearOferta")[0]);

        // Obtén los archivos de imagen seleccionados
        var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();

        // Agrega los archivos de imagen al FormData
        for (var i = 0; i < imageFiles.length; i++) {
            formData.append("imagen[]", imageFiles[i]);
        }
        $.ajax({
            type: "POST",
            url: './controllers/OfertasControllers.php?action=crearOferta',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                //console.log("Respuesta del servidor:", response);
                $('#modalCrearOferta').modal('hide');
                resetForm();
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'La Oferta se ha editado correctamente.',
                });
            },
            error: function(error) {
                console.log("Error en la petición AJAX:", error);

            }
        });
    });

    //TODO -  EDITAR MANTENIMIENTO =================================================================================================================================================================================================

    $(document).on('click', '.editar', function(e) {
        e.preventDefault();
        var idMantenimiento = $(this).attr('id');
        console.log(idMantenimiento)
        $.ajax({
            type: 'POST',
            url: './controllers/MantenimientosControllers.php?action=obtenerMantenimientoPorId',
            data: {
                id_mantenimiento: idMantenimiento
            },
            dataType: 'json',
            cache: false,
            success: function(response) {
                console.log("Respuesta del servidor:", response);
                if (response.total < response.importe) {
                    // Deshabilitar la opción con id="entrado"
                    $("#Eestado #entrado").prop("disabled", true);
                    console.log('toatl menor o igual ')
                } else {
                    $("#Eestado #entrado").prop("enabled", true);
                    console.log('bdrgdfgdf ')
                }
                var fk_id_usuario = response.fk_id_usuario;
                $.ajax({
                    type: 'GET',
                    url: './controllers/UsuariosControllers.php?action=obtenerUsuarios',
                    dataType: 'json',
                    cache: false,
                    success: function(response) {
                        var usuarioDeseado = response.find(function(usuario) {
                            return usuario.id_usuario == fk_id_usuario;
                        });

                        var selectUsuario = $('#Efk_id_usuario');
                        selectUsuario.empty();

                        selectUsuario.append($('<option>', {
                            value: usuarioDeseado.id_usuario,
                            text: usuarioDeseado.nombre_U
                        }));

                        // Recorre la respuesta y agrega opciones al select
                        $.each(response, function(index, usuario) {
                            if (usuario.id_usuario !== fk_id_usuario) {
                                selectUsuario.append($('<option>', {
                                    value: usuario.id_usuario, // El valor del ID de la sucursal
                                    text: usuario.nombre_U // El nombre de la sucursal
                                }));
                            }

                        });

                        // Abre el modal
                        $('#modalEditarMantenimiento').modal('show');

                        // Puedes agregar más asignaciones de campos aquí
                    },
                    error: function(error) {
                        console.error('Error en la petición AJAX:', error);
                    }
                });

                $('#Eid_mantenimiento').val(idMantenimiento);
                $('#Efoto').val(response.foto);
                var selectCliente = $('#Efk_id_cliente');
                selectCliente.empty();
                selectCliente.append($('<option>', {
                    value: response.fk_id_cliente,
                    text: response.nombre_cliente
                }));
                $('#Emodelo').val(response.modelo)
                $('#Eserial').val(response.serial)
                $('#Econtador').val(response.contador);
                $('#Efecha').val(response.fecha_recepcion);
                $('#Efecha_entrega').val(response.fecha_entrega)
                $('#Edescripcion').val(response.descripcion)

                $('#Etipo').val(response.tipo);
                var selectedText = $('#Etipo option:selected').text();
                $('#Etipo').find('option').filter(function() {
                    return $(this).text() === selectedText;
                }).prop('selected', true);

                $('#Eestado').val(response.estado);
                var selectedText = $('#Eestado option:selected').text();
                $('#Eestado').find('option').filter(function() {
                    return $(this).text() === selectedText;
                }).prop('selected', true);

                if (response.costo == 1) {
                    $('#switch4').prop('checked', true);
                } else {
                    $('#switch4').prop('checked', false);
                }

                $('#Eimporte').val(response.importe);

                $('#Etotal').val(response.total)
            }
        });

        $('#editarMantenimiento').click(function() {
            var costo = $('#switch4').prop('checked') ? 1 : 0;
            $('#Ecosto').val(costo);
            var formData = $('#formEditarMantenimiento').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/MantenimientosControllers.php?action=editarMantenimiento',
                data: formData,
                cache: false,
                success: function(response) {
                    $('#card-container').empty();

                    if (response != 0) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Mantenimiento actualizado Correctamente',
                        }).then((result) => {
                            // El código aquí se ejecutará después de que el usuario haya interactuado con el diálogo
                            if (result.isConfirmed) {
                                // Aquí puedes lanzar otra función o hacer lo que necesites después de la confirmación
                                //window.location.href = "inicio.php#3.1mantenimiento.php";
                                resetForm();
                                iniciar();
                            }
                        });

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'Error al actualizar el manteniento',
                        });
                    }
                    $('#modalEditarMantenimiento').modal('hide');
                },
                error: function(error) {

                }
            });


        });
    });


    //FIXME - ELIMINAR MANTENIMIENTO =================================================================================================================================================================================
    $(document).on('click', '.eliminar', function(e) {
        e.preventDefault();
        var idOferta = $(this).attr('id'); // Obtener el ID de la sucursal desde el atributo data-id
        console.log(idOferta)
        // Mostrar un SweetAlert2 de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Realmente deseas eliminar esta Oferta',
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
                    url: './controllers/OfertasControllers.php?action=eliminarOferta',
                    data: {
                        id_ofertas: idOferta
                    },
                    cache: false,
                    success: function(response) {
                        $('#card-container').empty();
                        resetForm();
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'El mantenimiwnto  se elimino correctamente.',
                        });
                        iniciar();
                    },
                    error: function(error) {
                        console.log('Error en la petición AJAX:', error);
                    }
                });
            }
        });
    });

    //STUB   FUNCIONES DE LIMPIAR Y RESETEAR ================================================================================================================== =================================================
    $(".limpiar").on("click", function(e) {
        e.preventDefault();
        resetForm();
    })

    function resetForm() {
        var formulario = document.getElementById("formCrearOferta");
        var dropzone = Dropzone.forElement("#formCrearOferta");
        formulario.reset();
        dropzone.removeAllFiles();
      
        $('#card-container').empty();
        iniciar();
    }
</script>