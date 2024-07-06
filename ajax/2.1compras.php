<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- flatpickr css -->
<link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css">

<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    @keyframes parpadeo {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .parpadeo {
        animation: parpadeo 1s infinite;
    }
</style>
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

    .compatibilidad-cell {
        max-height: 40px;
        /* Establece la altura máxima deseada */
        overflow: hidden;
        /* Oculta el texto que se desborda */
        word-wrap: break-word;
        /* Permite que el texto se envuelva dentro de la caja si es necesario */
    }
</style>
</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Compras</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Compras</a></li>
                            <li class="breadcrumb-item active">Compras</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <!-- Left sidebar -->
            <div class="card detalles col-12">
                <div class="row p-2">
                    <div class=" col-lg-3 col-sm-12 mb-2">
                        <button type="button" class="btn btn-danger btn-block
                        waves-effect waves-light w-100 t-center mb-3" data-bs-toggle="modal" data-bs-target="#composemodal">
                            <i class=" fas fa-cart-plus"></i>
                            Agregar
                        </button>
                    </div>

                    <div class="col-lg-9 col-sm-12 ">

                        <form action="" class="form-control row d-flex" id="formCompras">
                            <div class="col-lg-3 col-sm-12 m-2">
                                <select class="form-control" name="proveedor_C" id="proveedor_C">
                                    <option value=""> Seleccionar Proveedor</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-12 m-2">
                                <select class="form-control" name="fk_id_sucursal" id="fk_id_sucursal">
                                    <option value=""> Seleccionar Sucursal</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-12 m-2">
                                <input type="hidden" step="any" class="form-control" id="costo_C" name="costo_C">
                            </div>
                            <input type="hidden" id="detalle_C" name="detalle_C">
                        </form>
                    </div>

                </div>
            </div>
            <!-- End Left sidebar -->

            <!-- Right Sidebar -->
            <div class=" compras col-12">

                <div class="row" id="compras">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title row">

                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mb-4">
                                                <img src="assets/images/logo.png" alt="" height="100" style="color: red;">
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="mb-4">
                                                <h4 class="float-end font-size-16">Invoice #</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <p class="mb-1">Cochamba y la Plata</p>
                                        <!-- <p class="mb-1"><i class="mdi mdi-email align-middle me-1"></i> abc@123.com</p> -->
                                        <p><i class="mdi mdi-phone align-middle me-1"></i> 67200201</p>
                                    </div>


                                    <!-- <div class="col-lg-6">
                                        <h5 class="font-size-15 mb-3">Billed To:</h5>
                                        <h5 class="font-size-14 mb-2">Richard Saul</h5>
                                        <p class="mb-1">1208 Sherwood Circle
                                            Lafayette, LA 70506</p>
                                        <p class="mb-1">RichardSaul@rhyta.com</p>
                                        <p>337-256-9134</p>
                                    </div> -->
                                </div>
                                <hr class="my-4">

                                <div class="py-2 mt-3">
                                    <h5 class="font-size-15">Order summary</h5>
                                </div>
                                <div class="p-4 border rounded">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0" id="tabla-ventas">
                                            <thead>
                                                <tr>
                                                    <th style="width: 70px;">No.</th>
                                                    <th style="width: 70px;">ID.</th>
                                                    <th>Item</th>
                                                    <th class="text-end" style="width: 120px;">Precio Comp.</th>
                                                    <th class="text-end" style="width: 120px;">Precio Dist.</th>
                                                    <th class="text-end" style="width: 120px;">Precio Tec.</th>
                                                    <th class="text-end" style="width: 120px;">Precio Pub.</th>
                                                    <th class="text-end" style="width: 120px;">Cantidad</th>
                                                    <th class="text-end" style="width: 120px;">Medida</th>
                                                    <th class="text-end" style="width: 120px;">Sub Total</th>
                                                    <th class="text-end" style="width: 120px;">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                <tr>
                                                    <th scope="row" colspan="8" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0" id="total">$1010.00</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-print-none mt-3">
                                    <div class="float-end">
                                        <a href="#" class="btn btn-primary w-md waves-effect waves-light" id="crearCompra"> Guardar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end Col -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal -->
    <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-size-16" id="composemodalTitle">New
                        Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <table id='datatable-articulos' class="table
                                        table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Marca</th>
                                    <th>Umed.</th>
                                    <th>P. Neto</th>
                                    <th>P. Dis.</th>
                                    <th>P. Tec.</th>
                                    <th>P. Pub-</th>
                                    <th>Accio.</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- ==========================================================
    -----------------TABLA DE COMPRAS -----------------------------
    ========================================================== -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-4">
                                <button type="button" class="btn btn-light
                                        waves-effect waves-light"><i class="bx
                                            bx-plus me-1"></i>Lista de compras</button>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center gap-1
                                    mb-4">
                                <div class="input-group datepicker-range">
                                    <input type="text" class="form-control
                                            flatpickr-input" data-input aria-describedby="date1">
                                    <button class="input-group-text" id="date1" data-toggle><i class="bx
                                                bx-calendar-event"></i></button>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-link text-muted py-1
                                            font-size-16 shadow-none
                                            dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx
                                                bx-dots-horizontal-rounded"></i>
                                    </a>

                                    <ul class="dropdown-menu
                                            dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="table-responsive">
                        <table id="datatable-compras" class="table align-middletable-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comprador</th>
                                    <th>Proveedor</th>
                                    <th>Fecha</th>
                                    <th>Costo</th>
                                    <th>Impreso</th>
                                    <th>Download Pdf</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>


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

    <script>
        function recargar() {
            var tableArt = $('#datatable-articulos').DataTable();
            tableArt.ajax.reload();
            var tableCompras = $('#datatable-compras').DataTable();
            tableCompras.ajax.reload();
            var tableVentas = $('#tabla-ventas').DataTable();
            tableVentas.clear().draw();
            $("#formCompras")[0].reset();

        }
        //ANCHOR - LLAMADA A ARTICULOS
        $(document).ready(function() {
            var table = $('#datatable-articulos').DataTable({
                lengthChange: true,
                buttons: [
                    'copy', 'excel', 'pdf', 'colvis'
                ],
                ajax: {
                    url: './controllers/ArticulosControllers.php?action=obtenerArticulos',
                    dataSrc: ''
                },
                columns: [{
                        data: 'id_articulo'
                    },
                    {
                        data: 'codigo_A'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            if (data.descripcion_A !== null) {
                                //var descripcion_A = JSON.parse(data.descripcion_A.descripcion_A);
                                console.log(data.descripcion_A)
                                descripcion_A = data.descripcion_A.detalle
                                // Dividir la cadena en segmentos de 20 caracteres
                                var segmentos = [];
                                for (var i = 0; i < descripcion_A.length; i += 20) {
                                    segmentos.push(descripcion_A.substring(i, i + 20));
                                }

                                // Crear un bloque de HTML con saltos de línea para cada segmento
                                var descripcionHtml = segmentos.map(function(segmento) {
                                    return `<div>${segmento}</div>`;
                                }).join('');

                                return `<img src="controllers/uploads/products/" alt="" class="avatar-lg rounded-circle me-4">
                            <a href="#" class="text-body">${descripcionHtml}</a>`;
                            } else {
                                return `<img src="controllers/uploads/products/" alt="" class="avatar-lg rounded-circle me-4">
                            <a href="#" class="text-body">SN</a>`;
                            }
                        }
                    },
                    {
                        data: 'nombre_categoria'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Combina los valores de los cuatro campos en un solo string
                            var uno = row.stock_sucursal_1
                            var dos = row.stock_sucursal_2
                            var tres = row.stock_sucursal_3
                            var cuatro = row.stock_sucursal_4
                            return ` <div class="row w-100" >
                                  <div class=" ${uno <= 6 ? 'parpadeo' : ''}  badge badge-soft-info font-size-14 m-1">REDEX.  <i class="fas fa-laptop-house"></i>_ ${uno}</div> 

                                  <div class="${dos <= 6 ? 'parpadeo' : ''} badge badge-soft-success font-size-14 m-1">COD. <i class="fas fa-laptop-house"></i>_ ${dos}</div>

                                  <div class=" ${tres <= 6 ? 'parpadeo' : ''} badge badge-soft-warning font-size-14 m-1">TOLSEN <i class="fas fa-laptop-house"></i>_ ${tres}</div>
                                  
                                  <div class=" ${cuatro <= 6 ? 'parpadeo' : ''} badge badge-soft-primary font-size-14 m-1">EX TER.  <i class="fas fa-laptop-house"></i>_ ${cuatro}</div>
                               
                            </div>`;
                        }
                    },
                    {
                        data: 'nombre_marca'
                    },
                    {
                        data: 'unimed_A'
                    },
                    {
                        data: 'precio_neto_A',
                        render: function(data, type, row) {
                            // Devolver el contenido de la celda con el color aplicado y estilos
                            return `<div class="badge badge-soft-secondary font-size-14"><i class="fas fa-laptop-house"></i> ${data}</div>`;
                        }
                    },
                    {
                        data: 'precio_distribucion_A',
                        render: function(data, type, row) {
                            // Devolver el contenido de la celda con el color aplicado y estilos
                            return `<div class="badge badge-soft-danger font-size-14"><i class="fas fa-laptop-house"></i> ${data}</div>`;
                        }
                    },
                    {
                        data: 'precio_tecnico_A',
                        render: function(data, type, row) {
                            // Devolver el contenido de la celda con el color aplicado y estilos
                            return `<div class="badge badge-soft-info font-size-14"><i class="fas fa-laptop-house"></i> ${data}</div>`;
                        }
                    },
                    {
                        data: 'precio_publico_A',
                        render: function(data, type, row) {
                            // Devolver el contenido de la celda con el color aplicado y estilos
                            return `<div class="badge badge-soft-dark font-size-14"><i class="fas fa-laptop-house"></i> ${data}</div>`;
                        }
                    },

                    {
                        data: null,
                        render: function(data, type, row) {

                            return ` <button class="btn btn-sm btn-info agregar_A btn-lg" id="add${row.id_articulo}" >
                            <i class="fas fa-cart-plus fa-2x"></i>
                        </button>`;
                        }
                    }
                ]
            });

        });

        //FIXME - LLAMADA A COMPRAS
        $(document).ready(function() {

            var table = $('#datatable-compras').DataTable({
                lengthChange: false,
                order: [
                    [0, "desc"]
                ],
                ajax: {
                    url: './controllers/ComprasControllers.php?action=obtenerCompras',
                    dataSrc: ''
                },
                columns: [{
                        data: 'id_compra'
                    },
                    {
                        data: 'nombre_usuario'
                    },
                    {
                        data: 'nombre_proveedor'
                    },
                    {
                        data: 'fecha_C'
                    },
                    {
                        data: 'costo_C'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            if (data.impreso_C == 0) {
                                return `<div class="badge badge-soft-warning font-size-12">Pendiente</div>`;
                            } else {
                                return `<div class="badge badge-soft-success ont-size-12">Impreso ${data.impreso_C}</div>`
                            }

                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {

                            return `<div>
                                        <a href="pdfs/nota_compra.php?id_compra=${data.id_compra}" target="_blank">
                                          <button type="button" class="btn
                                                    btn-soft-light btn-sm w-xs
                                                    waves-effect btn-label
                                                    waves-light"><i class="bx
                                                        bx-download label-icon"></i>
                                                Pdf
                                            </button>
                                        </a>
                                    </div>`;
                        }
                    },

                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="btn btn-sm btn-info btn-editar  btn-lg" data-id="1"><i class="fas fa-edit fa-2x"></i></button>  <button class="btn btn-sm btn-danger eliminarCompra " id="${data.id_compra}"><i class="fas fa-trash-alt fa-2x"></i></button>`;
                        }
                    }
                ]
            });


            //LINK - llamada a los -proveedors 
            $.ajax({
                url: './controllers/ProveedoresControllers.php?action=obtenerProveedores', // Ajusta la ruta correcta
                dataType: 'json',
                success: function(data) {
                    var select = $('#proveedor_C');
                    select.empty();
                    select.append($('<option>', {


                        value: '',
                        text: 'Seleccionar Proveedor'
                    }));
                    $.each(data, function(key, value) {
                        select.append($('<option>', {
                            value: value.id_proveedor,
                            text: value.nombre_Pro
                        }));
                    });
                }
            });

            //LINK - llamada a los -proveedors 
            $.ajax({
                url: './controllers/SucursalesControllers.php?action=obtenerSucursales', // Ajusta la ruta correcta
                dataType: 'json',
                success: function(data) {
                    var select = $('#fk_id_sucursal');
                    select.empty();
                    select.append($('<option>', {


                        value: '',
                        text: 'Seleccionar Sucursal'
                    }));
                    $.each(data, function(key, value) {
                        select.append($('<option>', {
                            value: value.id_sucursal,
                            text: value.nombreS
                        }));
                    });
                }
            });

        });


        var carrito = [];

        function calcularTotal() {
            let total = 0;
            for (var i = 0; i < carrito.length; i++) {
                total = total + parseFloat(carrito[i].subtotal);
            }
            console.log(total);
            $('#total').text(total);
            $('#costo_C').val(total);
            $('input[type="number"]').on('wheel', function(e) {
                e.preventDefault();
            });
        }
        // Función para agregar una nueva fila de producto al carrito
        function agregarFila(data) {
            var id = data.id_articulo;
            var codigo = data.codigo_A;
            var descripcion = data.descripcion_A.detalle;
            var precio_neto = data.precio_neto_A;
            var precio_distribucion = data.precio_distribucion_A;
            var precio_tecnico = data.precio_tecnico_A;
            var precio_publico = data.precio_publico_A;
            var stock = data.stock_A;
            var unimed = data.unimed_A;
            var cantidad = parseInt(data.cantidad_A);
            var cantidad_compra = 1;
            var producto = {
                id: id,
                codigo: codigo,
                descripcion: descripcion,
                precio_neto: precio_neto,
                precio_distribucion: precio_distribucion,
                precio_tecnico: precio_tecnico,
                precio_publico: precio_publico,
                stock: stock,
                cantidad: cantidad,
                subtotal: precio_neto,
                stock: stock,
                cantidad_compra: cantidad_compra,
                unimed: unimed,
            }
            carrito.push(producto)

            let nuevaFila = `
                <tr>
                    <style>
                        .descripcion-cell {
                            max-width: 200px; /* El ancho máximo deseado para la descripción */
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        }
                    </style>

                
                        <th scope="row">${carrito.length}</th>
                        <td>
                            <p class="font-size-13 text-muted mb-0 codigo" value="">${producto.codigo}</p>
                        </td>
                         <td style="display:none">
                            <p class="font-size-13 text-muted mb-0 id" value="">${producto.id}</p>
                        </td>
                        <td class="descripcion-cell">
                            <p class="font-size-13 text-muted mb-0" value="">${descripcion} </p>
                        </td>
                        <td > <input type="number" step="any" class="form-control precioNeto" value="${precio_neto}"></td>
                        <td > <input type="number" step="any" class="form-control precioDist" value="${precio_distribucion}"></td>
                        <td > <input type="number" step="any" class="form-control precioTec" value="${precio_tecnico}"></td>
                        <td > <input type="number" step="any" class="form-control precioPub" value="${precio_publico}"></td>
                        <td > <input type="number" class="form-control cantidad" value="1" min="1">  </td>
                        <td > <input type="text" class="form-control unimed" disabled="true" value="${unimed}" min="1"></td>
                        <td class="text-end subtotal" value="">${precio_neto}</td>
                        <td> <button class="btn btn-sm btn-danger btn-eliminar" id="${id}"><i class="fas fa-trash-alt fa-2x"></i></button></td>
                </tr>`;
            $(nuevaFila).insertBefore('#tabla-ventas tbody tr:last');
            console.log(carrito)
            calcularTotal();
        }

        $('#tabla-ventas').on('click', '.btn-eliminar', function() {
            // Obtener el id del elemento en el que se hizo clic
            var id = $(this).attr('id');
            // Eliminar la fila correspondiente
            $(this).closest('tr').remove();
            var btnAdd = $('#add' + id);
            btnAdd.prop('disabled', false);
            carrito = carrito.filter(function(producto) {
                return producto.id != id;
            })
            calcularTotal();
        })



        // Agrega un producto al carrito cuando se hace clic en él
        $("#datatable-articulos").on("click", ".agregar_A", function() {
            var row = $(this).closest('tr'); // Obtener la fila más cercana al botón "Editar"
            var data = $('#datatable-articulos').DataTable().row(row).data();
            $(this).prop('disabled', true);
            console.log(data);
            agregarFila(data)
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El producto se ha agregado al carrito correctamente.',
                showConfirmButton: false, // Para ocultar el botón "Aceptar"
                timer: 1000 // El mensaje se cerrará automáticamente después de 2 segundos (ajusta el tiempo según tus necesidades)
            });

        });


        $('#tabla-ventas').on('input', '.precioNeto, .precioDist, .precioTec, .precioPub, .cantidad', function() {
            let row = $(this).closest('tr');
            let id = parseInt(row.find('.id').text());
            let precioNeto = parseFloat(row.find('.precioNeto').val());
            let precioDist = parseFloat(row.find('.precioDist').val());
            let precioTec = parseFloat(row.find('.precioTec').val());
            let precioPub = parseFloat(row.find('.precioPub').val());
            let cantidad = parseFloat(row.find('.cantidad').val());
            let subtotal = cantidad * precioNeto;

            // Calcular los nuevos precios
            precioDist = (precioNeto / 0.92).toFixed(2); // Aumento del 5%
            precioTec = (precioDist / 0.95).toFixed(2) // Aumento del 10%
            precioPub = (precioDist / 0.8).toFixed(2) // Aumento del 15%

            var productoExistente = carrito.find(item => item.id == id);

            if (productoExistente) {
                // Actualizar el producto existente
                productoExistente.precio_neto = precioNeto;
                productoExistente.precio_distribucion = precioDist;
                productoExistente.precio_tecnico = precioTec;
                productoExistente.precio_publico = precioPub;
                productoExistente.cantidad_compra = cantidad;
                productoExistente.subtotal = subtotal;
            }

            // Actualizar los campos en la interfaz
            row.find('.precioDist').val(precioDist);
            row.find('.precioTec').val(precioTec);
            row.find('.precioPub').val(precioPub);
            row.find('.subtotal').text(subtotal);

            console.log(carrito);
            calcularTotal();
        });



        // Escuchar clic en el botón "Guardar Carrito" 
        $('#crearCompra').on('click', function() {
            $('#detalle_C').val(JSON.stringify(carrito));
            var formData = $('#formCompras').serialize();
            $.ajax({
                type: 'POST',
                url: './controllers/ComprasControllers.php?action=crearCompra',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response == '"ok"') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Compra guardada corectamente',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "inicio.php#2.1compras.php";
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Érror',
                            text: 'Error al guardar los datos de compra',
                            confirmButtonText: 'Ok'
                        });
                    }
                    recargar();
                    reloadTables();
                    var filasAeliminar = $('#tabla-ventas tbody tr');
                    filasAeliminar.each(function() {
                        $(this).remove();
                    });
                    carrito = [];
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Érror',
                        text: 'No se pudo Conectar con el Controlador',
                        confirmButtonText: 'Ok'
                    });
                }
            });
        });


        $("#datatable-compras").on("click", ".eliminarCompra", function(e) {
            e.preventDefault();
            var idCompra = $(this).attr('id');
            Swal.fire({
                title: '¿Eliminar Compra?',
                text: '¿Estas seguro de que quierews eliminar esta compra ?',
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
                        url: './controllers/ComprasControllers.php?action=eliminarCompra',
                        data: {
                            id_compra: idCompra
                        },
                        success: function(response) {
                            if (response === 'true') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'La compra se elimino correctamente.',
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Érror',
                                    text: 'No se pudo eliminar la compra.',
                                });
                            }
                            reloadTables();
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Érror',
                                text: 'No se pudo conetcar con el controlar de compras.',
                            });
                        }
                    });
                }
            });

        });

        function reloadTables() {
            var miTablaCompras = $('#datatable-compras').DataTable();
            miTablaCompras.ajax.reload();
            var miTablaArticulos = $('#datatable-articulos').DataTable();
            miTablaArticulos.ajax.reload();
        }

        // Calcular el total inicial
        calcularTotal();
    </script>