<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Productos</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Productos</a></li>
                            <li class="breadcrumb-item active">registros</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- =================MODAL CREAR CATEGORIA-->

        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="mb-3">
                    <h5 class="card-title">Total de productos <span id="cantidad" class="text-muted
                            fw-normal ms-2">(0)</span></h5>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="mb-3 " style="width: 50%; margin: auto; ">
                    <input type="text" class="form-control" style="border-radius: 20px;" id="serch">
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearProducto"><i class="bx bx-plus
                                me-1"></i> Nuevo producto</button>

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

        <!-- ============== PRODUCTOS -->
        <div>
            <div class="row" id="card-container-productos">

            </div>
        </div>


        <div id="modalCrearProducto" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel">Registrar nuevo producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formCrearProducto" class="dropzone p-0" enctype="multipart/form-data">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="codigo" class="form-label">Codigo</label>
                                                        <input class="form-control" type="text" id="codigo" name="codigo" required>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label for="id_categoria" class="form-label font-size-13 text-muted">Seleccionar
                                                                Categorias</label>
                                                            <select class="form-control" data-trigger name="id_categoria" id="id_categoria" <option value="">Seleccionar</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="descripcion" class="form-label">Descripcion</label>
                                                        <input class="form-control" type="text" id="descripcion" name="descripcion">
                                                    </div>


                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="stock" class="form-label">Stock</label>
                                                        <input class="form-control" type="number" id="stock" name="stock" min="1">
                                                    </div>

                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="precio_compra" class="form-label">Precio
                                                            Net.</label>
                                                        <input class="form-control" type="number" id="precio_compra" name="precio_compra" step="any">
                                                    </div>

                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="precio_venta" class="form-label">Precio
                                                            Venta.</label>
                                                        <input class="form-control" type="number" id="precio_venta" name="precio_venta" step="any">
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
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
                        <div class="modal-footer">
                            <button type="button" class="btn
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal"> Cerrar</button>
                            <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light " id="crearProducto">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>


        <!-- MODAL EDITAR ARTICULOS -->
        <div id="modalEditarProducto" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel">Registrar nuevo producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" id="formEditarProducto" class="dropzone p-0" enctype="multipart/form-data">
                                <!-- CARGA DE DATROS -->
                                <div class="col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div>
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="row">

                                                    <input type="hidden" name="Eid_producto" id="Eid_producto">
                                                    <input type="hidden" name="Eimagen" id="Eimagen">

                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="Ecodigo" class="form-label">Codigo</label>
                                                        <input class="form-control" type="text" id="Ecodigo" name="Ecodigo" required>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label for="Eid_categoria" class="form-label font-size-13 text-muted">Seleccionar
                                                                Categorias</label>
                                                            <select class="form-control" data-trigger name="Eid_categoria" id="Eid_categoria" <option value="">Seleccionar</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Edescripcion" class="form-label">Descripcion</label>
                                                        <input class="form-control" type="text" id="Edescripcion" name="Edescripcion">
                                                    </div>


                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="Estock" class="form-label">Stock</label>
                                                        <input class="form-control" type="number" id="Estock" name="Estock" min="1">
                                                    </div>

                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="Eprecio_compra" class="form-label">Precio
                                                            Net.</label>
                                                        <input class="form-control" type="number" id="Eprecio_compra" name="Eprecio_compra" step="any">
                                                    </div>

                                                    <div class="col-lg-4 col-md-12">
                                                        <label for="Eprecio_venta" class="form-label">Precio
                                                            Venta.</label>
                                                        <input class="form-control" type="number" id="Eprecio_venta" name="Eprecio_venta" step="any">
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <div class="row">
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
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn
                                                btn-secondary waves-effect limpiar" data-bs-dismiss="modal"> Cerrar</button>
                            <button type="button" class="btn
                                                btn-primary waves-effect
                                                waves-light " id="editarProducto">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>

<script src="assets/libs/dropzone/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        $(".dropzone").dropzone();
    });
</script>


<script>
    var productos = null;
    async function obteberProductos() {
        try {
            const response = await $.ajax({
                url: "./controllers/ProductosControllers.php?action=obtenerProductos",
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
                                     <button id="${producto.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> 
                                      </button>
                                        
                                    <button id="${producto.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i>
                                    </button>                                
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


    $(".limpiar").on("click", function(e) {
        e.preventDefault();
        resetForm();
    })

    function resetForm() {
        var formulario = document.getElementById("formCrearProducto");
        var dropzone = Dropzone.forElement("#formCrearProducto");
        formulario.reset();
        dropzone.removeAllFiles();

        var formulario1 = document.getElementById("formEditarProducto");
        var dropzone1 = Dropzone.forElement("#formEditarProducto");
        formulario1.reset();
        dropzone1.removeAllFiles();

    }
    $(document).ready(function() {

        $('input[type="number"]').on('wheel', function(e) {
            e.preventDefault();
        });

    })





    $(document).ready(function() {


        //=============CARGAR CATEGORIAS  =================
        $.ajax({
            url: './controllers/CategoriasControllers.php?action=obtenerCategorias',
            dataType: 'json',
            cache: false,
            success: function(data) {
                var select = $('#id_categoria');
                select.empty();
                select.append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                }));
                $.each(data, function(key, value) {
                    select.append($('<option>', {
                        value: value.id,
                        text: value.categoria
                    }));
                });
            }
        });

    });


    // ================================================
    // -------------CREAR PRODUCTO --------------------
    // ================================================

    // var myDropzone = new Dropzone("#formularioP", {
    //     paramName: "imagenes[]", // Nombre del campo en el formulario
    //     maxFilesize: 5, // Tamaño máximo en MB
    //     maxFiles: 5, // Número máximo de archivos permitidos
    //     acceptedFiles: "image/*", // Acepta solo archivos de imagen
    //     addRemoveLinks: true, // Muestra el enlace para eliminar archivos
    //     dictRemoveFile: "Eliminar", // Texto para el enlace de eliminación
    //     init: function() {
    //         this.on("success", function(file, response) {});
    //         this.on("removedfile", function(file) {
    //             // Manejar la eliminación de archivos (si es necesario)
    //             console.log("Archivo eliminado: " + file.name);
    //         });
    //     }
    // });

    $("#crearProducto").on("click", function(e) {
        e.preventDefault();

        var formData = new FormData($("#formCrearProducto")[0]);

        var imageFiles = $(".dropzone")[0].dropzone.getAcceptedFiles();

        for (var i = 0; i < imageFiles.length; i++) {
            formData.append("imagenes[]", imageFiles[i]);
        }

        $.ajax({
            type: "POST",
            url: "./controllers/ProductosControllers.php?action=crearProducto",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(producto) {
                console.log("Respuesta del servidor:", producto);
                if (true) {
                    $('#modalCrearProducto').modal('hide');
                    resetForm();
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'El articulo se a creado Correctamente',
                    });
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
                                <div class="mx-auto mb-2">
                                    <img src="./controllers/uploads/products/${img[0]}" alt=""
                                        class="rounded "  style="max-width: 100%;" data-holder-rendered="true">
                                </div>

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
                                     <button id="${producto.id}" type="button" class="btn  btn-outline-success waves-effect waves-light editar">
                                          <i class="fas fa-edit">
                                           </i> 
                                      </button>
                                        
                                    <button id="${producto.id}"type="button" class="btn btn-outline-danger waves-effect waves-light eliminar"> 
                                       <i class="fas fa-trash-alt fa-1x">
                                       </i>
                                    </button>                                
                            </div>
                        </div>
                        <!-- end card -->
                    </div>`;

                    $('#card-container-productos').prepend(cardHTML);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'El producto no se guardo en  la base de datos',
                    });
                }
            },
            error: function(error) {
                console.log("Error en la petición AJAX:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Érror',
                    text: 'error no se pudo hacer la petision AJAX:',
                });
            }
        });
    });
    var idFila = 0;



    // ================================================
    // -------------EDITAR PRODUCTO --------------------
    // ================================================

    $(document).on("click", ".editar", function() {
        var idProducto = $(this).attr('id');
        console.log("ID de la producto seleccionada:", idProducto);
        $.ajax({
            type: "POST",
            url: "./controllers/ProductosControllers.php?action=obtenerProductoPorId",
            data: {
                id_producto: idProducto
            },
            dataType: "json", // Esperamos recibir datos en formato JSON
            success: function(data) {
                console.log(data);
                var id_categoria = data.id_categoria;
                $.ajax({
                    type: 'POST',
                    url: './controllers/CategoriasControllers.php?action=obtenerCategorias',
                    dataType: 'json',
                    success: function(response) {
                        var categoriaDeseada = response.find(function(categoria) {
                            return categoria.id == id_categoria;
                        });
                        console.log("Sucursal encontrada:", categoriaDeseada);
                        var selectCategoria = $('#Eid_categoria');
                        selectCategoria.empty();

                        selectCategoria.append($('<option>', {
                            value: categoriaDeseada.id,
                            text: categoriaDeseada.categoria
                        }));

                        $.each(response, function(index, categoria) {
                            if (categoria.id !== id_categoria) {
                                selectCategoria.append($('<option>', {
                                    value: categoria.id,
                                    text: categoria.categoria
                                }));
                            }

                        });

                    },
                    error: function(error) {
                        console.error('Error en la petición AJAX:', error);
                    }
                });

                $('#Eid_producto').val(idProducto);
                $('#Ecodigo').val(data.codigo);
                $('#Edescripcion').val(data.descripcion);
                $('#Eimagen').val(data.imagen);
                $('#Estock').val(data.stock);
                $('#Eprecio_compra').val(data.precio_compra);
                $('#Eprecio_venta').val(data.precio_venta);
                $('#modalEditarProducto').modal('show');

            },
            error: function(xhr, status, error) {
                console.error("Error al obtener datos:", error);
                alert("Error al obtener datos: " + error);
            }
        });

    });


    //----------------guardando cambios
    $('#editarProducto').on('click', function(e) {
        var formData = new FormData($("#formEditarProducto")[0]);

        var imageFiles = $(".dropzone")[1].dropzone.getAcceptedFiles();

        for (var i = 0; i < imageFiles.length; i++) {
            formData.append("Eimagenes[]", imageFiles[i]);
        }
        $.ajax({
            type: 'POST',
            url: './controllers/ProductosControllers.php?action=editarProducto',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response) {
                resetForm();
                var img = JSON.parse(response.imagen);
                var card = $('#card-' + response.id);
                card.find('.imagen').attr('src', './controllers/uploads/products/' + img[0]);
                card.find('.descripcion').text(response.descripcion);
                card.find('.precioCompra').text(response.precio_compra);
                card.find('.precioVenta').text(response.precio_venta);
                card.find('.stock').text(response.stock);
                $('#modalEditarProducto').modal('hide');
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





    // ================================================
    // -------------ELIMINAR PRODUCTO --------------------
    // ================================================

    $(document).on("click", ".eliminar", function() {
        var idProducto = $(this).attr('id');
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Realmente deseas eliminar este Producto?',
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
                    url: './controllers/ProductosControllers.php?action=eliminarProducto',
                    data: {
                        id_producto: idProducto
                    },
                    success: function(response) {

                        if (response == '"ok"') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'La Producto eliminado correctamente.',
                            });
                            var tarjetaAEliminar = $('#card-' + idProducto);
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
        }else{
            iniciar();
        }
    });
</script>