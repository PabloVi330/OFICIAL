<?php

if( $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reportes de ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes de ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="input-group">

          <button type="button" class="btn btn-default" id="daterange-btn2">
           
            <span>
              <i class="fa fa-calendar"></i> 

              <?php

                if(isset($_GET["fechaInicial"])){

                  echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
                
                }else{
                 
                  echo 'Rango de fecha';

                }

              ?>
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        <div class="box-tools pull-right">

        <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

           echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

        }         

        ?>
           
           <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>

        </div>
         
      </div>

      <div class="box-body">
        
        <div class="row">

          
          <div class="col-xs-12">
            
            <?php
        
            include "reportes/grafico-ventas.php";
            include "reportes/graficos_dias.php";

            ?>

          </div>

           <div class="col-md-6 col-xs-12">
             
            <?php

            include "reportes/productos-mas-vendidos.php";

            ?>

           </div>

            <div class="col-md-6 col-xs-12">
             
            <?php

            include "reportes/vendedores.php";

            ?>

           </div>

           <div class="col-md-6 col-xs-12">
             
            <?php

            include "reportes/compradores.php";

            ?>

           </div>
          
        </div>

      </div>
      
    </div>

  </section>
 
 </div>
<script>
  /*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango2") != null){

$("#daterange-btn2 span").html(localStorage.getItem("capturarRango2"));


}else{

$("#daterange-btn2 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn2').daterangepicker(
{
  ranges   : {
    'Hoy'       : [moment(), moment()],
    'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
    'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
    'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
    'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  },
  startDate: moment(),
  endDate  : moment()
},
function (start, end) {
  $('#daterange-btn2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

  var fechaInicial = start.format('YYYY-MM-DD');

  var fechaFinal = end.format('YYYY-MM-DD');

  var capturarRango = $("#daterange-btn2 span").html();
 
   localStorage.setItem("capturarRango2", capturarRango);

   window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

}

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function(){

localStorage.removeItem("capturarRango2");
localStorage.clear();
window.location = "reportes";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensright .ranges li").on("click", function(){

var textoHoy = $(this).attr("data-range-key");

if(textoHoy == "Hoy"){

  var d = new Date();
  
  var dia = d.getDate();
  var mes = d.getMonth()+1;
  var año = d.getFullYear();

  if(mes < 10){

    var fechaInicial = año+"-0"+mes+"-"+dia;
    var fechaFinal = año+"-0"+mes+"-"+dia;

  }else if(dia < 10){

    var fechaInicial = año+"-"+mes+"-0"+dia;
    var fechaFinal = año+"-"+mes+"-0"+dia;

  }else if(mes < 10 && dia < 10){

    var fechaInicial = año+"-0"+mes+"-0"+dia;
    var fechaFinal = año+"-0"+mes+"-0"+dia;

  }else{

    var fechaInicial = año+"-"+mes+"-"+dia;
      var fechaFinal = año+"-"+mes+"-"+dia;

  } 

    localStorage.setItem("capturarRango2", "Hoy");

    window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

} 

})





</script>