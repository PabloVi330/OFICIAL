<?php

if ($_SESSION["perfil"] == "Especial") {

    echo '<script>

    window.location = "inicio";

  </script>';

    return;
}



?>
<div class="content-wrapper">

    <section class="content-header">

        <h1 style="color:#153959">

            Administrar Entregas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Entregas</li>

        </ol>

    </section>
    
    


    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <a href="crear-venta">

                    <button style="background-color:#153959; color:white" class="btn btn-primary">

                        Agregar venta

                    </button>

                </a>
                <div class="box-tools pull-right">

                

                    <form id="downloadForm" action="vistas/modulos/descargar-reporte-cantidad.php" method="POST">
                        <input type="hidden" name="productos" id="productosInput" value="">
                        <input type="hidden" name="lista-Productos" value="lista-Productos">
                        <input type="hidden" name="fecha" value="" id="fechaInput">
                        <button class="btn btn-success" type="submit" id="descargar">Descargar Reporte Excel</button>
                    </form>

                  

                </div>


                <div>
                    <span type="button" class="btn btn-default pull-right descargar" id="daterange-btn4" >

                        <span>
                            <i class="fa fa-calendar"></i>

                            <?php

                            if (isset($_GET["fechaInicial"])) {

                                echo $_GET["fechaInicial"] . " - " . $_GET["fechaFinal"];
                            } else {

                                echo 'Rango de fecha';
                            }

                            ?>
                        </span>

                        <i class="fa fa-caret-down"></i>

                    </span>
                </div>

            </div>
            <?php

            if (isset($_GET["fechaInicial"])) {

                $fechaInicial = $_GET["fechaInicial"];
                $fechaFinal = $_GET["fechaFinal"];
            } else {

                $fechaInicial = null;
                $fechaFinal = null;
            }

            $respuesta = ControladorVentas::ctrRangoFechasVentasJSON($fechaInicial, $fechaFinal);


            $s = $respuesta;

            ?>

            <div class="box-body">




            </div>
            <section class="content">
                <div class="row ent" id="ent">



                </div>

            </section>

        </div>

    </section>


    <section class="content">
        <h1 style="color:#153959">

            Preventistas

        </h1>

        <div class="box">

            <div class="box-header with-border">



                <span type="button" class="btn btn-default pull-right" id="daterange-btn4">

                    <span>
                        <i class="fa fa-calendar"></i>

                        <?php

                        if (isset($_GET["fechaInicial"])) {

                            echo $_GET["fechaInicial"] . " - " . $_GET["fechaFinal"];
                        } else {

                            echo 'Rango de fecha';
                        }

                        ?>
                    </span>

                    <i class="fa fa-caret-down"></i>

                </span>

            </div>
            <?php

            if (isset($_GET["fechaInicial"])) {

                $fechaInicial = $_GET["fechaInicial"];
                $fechaFinal = $_GET["fechaFinal"];
            } else {

                $fechaInicial = null;
                $fechaFinal = null;
            }

            $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
            $res = ControladorUsuarios::ctrMostrarUsuarios(null, null);
            $array = array();

            for ($i = 0; $i < count($res); $i++) {
                $total = 0;
                for ($j = 0; $j < count($respuesta); $j++) {
                    $dato = $respuesta[$j]['total'];
                    if ($res[$i]['id'] == $respuesta[$j]['id_vendedor']) {
                        $dato = $respuesta[$j]['total'];
                        $total += $dato;
                    }
                }
                array_push($array, array("usuario" => $res[$i]['nombre'], "ventas" => $total));
            }




            ?>

            <div class="box-body">




            </div>
            <section class="content">
                <div class="row prev" id="prev">
                    <div class="box box-success">

                        <div class="box-header with-border">

                            <h3 class="box-title">Vendedores</h3>

                        </div>

                        <div class="box-body">

                            <div class="chart-responsive">

                                <div class="chart" id="bar-chart2" style="height: 300px;"></div>

                            </div>

                        </div>

                    </div>



                </div>

            </section>

        </div>

    </section>

</div>
<script>
    //BAR CHART
    var bar = new Morris.Bar({
        element: 'bar-chart2',
        resize: true,
        data: [

            <?php
            for ($i = 0; $i < count($array); $i++) {
                $nombre = $array[$i]['usuario'];
                $venta = $array[$i]['ventas'];
                echo "{y: '" . $nombre . "', a: '" . $venta . "'},";
            }


            ?>


        ],
        barColors: ['#0af'],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['ventas'],
        preUnits: 'Bs',
        hideHover: 'auto'
    });
</script>

<script type="text/javascript">
    const products = <?php echo  $s ?>;
    let array = [];
    let total = [];
    let fechaInicial;
    let fechaFinal;

    for (var i = 0; i < products.length; i++) {
        let a = JSON.parse(products[i][4]);

        for (let j = 0; j < a.length; j++) {
            array.push(a[j]);

        }


    }
    console.log(' lleno')
    console.log(array)
    

    function buscar() {

        for (let j = 0; j < array.length; j++) {
            if (total.length < 1) {
                console.log('inicio')
                total.push({
                    "id": array[j].id,
                    "cantidad": array[j].cantidad,
                    "descripcion": array[j].descripcion
                })

            } else {
                var pos = -1;
                var paso = false
                for (let k = 0; k < total.length; k++) {
                    if (total[k].id == array[j].id) {
                        pos = k;
                        paso = true;
                    }

                }
                if (paso) {
                    total[pos] = {
                        "id": total[pos].id,
                        "cantidad": Number(total[pos].cantidad) + Number(array[j].cantidad),
                        "descripcion": array[j].descripcion
                    }

                } else {
                    total.push({
                        "id": array[j].id,
                        "cantidad": array[j].cantidad,
                        "descripcion": array[j].descripcion
                    })
                }



            }
        }

    }
    buscar();
    var colorArray = ['#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
        '#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
        '#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
        '#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
        '#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
        '#0A0D38', '#6E96A9', '#152E4E', '#63AEBF', '#123253', '#0A0D36',
    ];

    let template = ''
    for (let p = 0; p < total.length; p++) {
        template = template + `
                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box " style="background-color:${colorArray[p]}; color:white">

                            <div class="inner">

                                <h4> Codigo: ${total[p].id}</h4>
                                <h3> Cant.  ${total[p].cantidad}</h3>

                                <h4>${total[p].descripcion}</h4>

                            </div>

                            <div class="icon">

                                <i class="ion ion-social-usd"></i>

                            </div>

                            <a href="ventas" class="small-box-footer">

                                Más info <i class="fa fa-arrow-circle-right"></i>

                            </a>

                        </div>

                    </div>
                        `;

    }


    document.getElementById('ent').innerHTML += template;
    
   
    /*=============================================
    VARIABLE LOCAL STORAGE
    =============================================*/

    if (localStorage.getItem("capturarRango3") != null) {

        $("#daterange-btn4 span").html(localStorage.getItem("capturarRango3"));


    } else {

        $("#daterange-btn4 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

    }



    $('#daterange-btn4').daterangepicker(

        {

            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate: moment()
        },
        function(start, end) {

            $('#daterange-btn4 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         fechaInicial = start.format('YYYY-MM-DD');

         fechaFinal = end.format('YYYY-MM-DD');

            var capturarRango = $("#daterange-btn4 span").html();
            console.log(capturarRango);

            localStorage.setItem("capturarRango3", capturarRango);

            window.location = "index.php?ruta=entregas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

        }

    )

    /*=============================================
    CANCELAR RANGO DE FECHAS
    =============================================*/

    $(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function() {

        localStorage.removeItem("capturarRango3");
        localStorage.clear();
        window.location = "ventas";
    })

    /*=============================================
    CAPTURAR HOY
    =============================================*/

    $(".daterangepicker.opensleft .ranges li").on("click", function() {

        var textoHoy = $(this).attr("data-range-key");

        if (textoHoy == "Hoy") {

            var d = new Date();

            var dia = d.getDate();
            var mes = d.getMonth() + 1;
            var año = d.getFullYear();

            // if(mes < 10){

            // 	var fechaInicial = año+"-0"+mes+"-"+dia;
            // 	var fechaFinal = año+"-0"+mes+"-"+dia;

            // }else if(dia < 10){

            // 	var fechaInicial = año+"-"+mes+"-0"+dia;
            // 	var fechaFinal = año+"-"+mes+"-0"+dia;

            // }else if(mes < 10 && dia < 10){

            // 	var fechaInicial = año+"-0"+mes+"-0"+dia;
            // 	var fechaFinal = año+"-0"+mes+"-0"+dia;

            // }else{

            // 	var fechaInicial = año+"-"+mes+"-"+dia;
            //    	var fechaFinal = año+"-"+mes+"-"+dia;

            // }

            dia = ("0" + dia).slice(-2);
            mes = ("0" + mes).slice(-2);

            fechaInicial = año + "-" + mes + "-" + dia;
             fechaFinal = año + "-" + mes + "-" + dia;

            localStorage.setItem("capturarRango3", "Hoy");

            window.location = "index.php?ruta=entregas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

        }

    })
    $(document).ready(function(){
      $('#descargar').on('click', function(e) {
        e.preventDefault();
        var products = JSON.stringify(total);
        var fecha = localStorage.getItem("capturarRango3");
        
        // Establece los valores en el formulario
        $('#productosInput').val(products);
        $('#fechaInput').val(fecha);
        
        // Envía el formulario
        $('#downloadForm').submit();
    });
    });
</script>