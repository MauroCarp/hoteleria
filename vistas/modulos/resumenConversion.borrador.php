<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>

<script>

  const generarConfigBarChart = (label,data,label2)=>{

    let configuracion = {
        labels: label,
        datasets: [{
        label: label2,
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1, 
        data: data
        }]

    };
            
    return configuracion;
            

  }

  const generarChartResumen = (idChart,config)=>{

    let chart = document.getElementById(idChart).getContext('2d');

    let generarChart = new Chart(chart, {
        type: 'bar',
        data: config,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
    });

  }

  // VARIBLES
  const color = Chart.helpers.color;
  
  let data, label, label2, config, idChart 

</script>

<div class="content-wrapper">
  
    <div class="box">
    
        <section class="content" style="padding-top:0;">

            <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="imprimirResumenConversion">
                    <b>Imprimir Reporte &nbsp </b><i class="fa fa-print" style="color:#3c8dbc;font-size:1.2em;"></i>
            </button>

            <div class="row">

                    <div class="col-md-12">

                        <div class="nav-tabs-custom">

                            <ul class="nav nav-tabs" id="tabsMeses" style="font-size:1.em;">

                                <?php

                                    $item = 'anio';

                                    $valor = $_GET['anio'];
                                    
                                    $registros = ControladorConversion::ctrMostrarDatos($item,$valor);

                                    $first = true;
                                    
                                    $contador = 1;

                                    foreach ($registros as $key => $registroMes) {

                                      $monthNum  = $registroMes['mes'];

                                      $monthName = $meses[$monthNum-1];

                                      if($first){

                                         echo "<li class='tabs active' id='".$monthName."'><a href='#tab_".$contador."' data-toggle='tab'>".$monthName."</a></li>";
                                         
                                      }else{
                                          
                                          echo "<li class='tabs' id='".$monthName."'><a href='#tab_".$contador."' data-toggle='tab'>".$monthName."</a></li>";

                                      }

                                      $first = false;

                                      $contador++;

                                    }

                                ?>
                       
                                  <li class='tabs' id='stadistica'><a href='#tab_estadistica' data-toggle='tab' id="btnEstadistica">Estadistica Anual</a></li>

                            </ul>

                            <div class="tab-content">

                              <?php

                                    $first = true;
                                                                        
                                    $contador = 1;

                                    foreach ($registros as $key => $value) {

                                      $mes = $value['mes'];

                                      if($first){

                                        echo "<div class='tab-pane active' id='tab_".$contador."'>";

                                      }else{

                                        echo "<div class='tab-pane' id='tab_".$contador."'>";

                                      }
                                          
                                      include 'conversion/etapas.php';
                                      
                                      echo "</div>";

                                      $first = false;
                                                                        
                                      $contador++;

                                    }
                                    
                              ?>

                              <div class='tab-pane' id='tab_estadistica'>
                                    
                                <?php
                                  include 'conversion/etapasAnual.php';
                                ?>

                              </div>

                        </div>

                    </div>

            </div>

        </section>

    </div>

</div>