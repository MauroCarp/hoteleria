<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

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

                                    setlocale(LC_ALL, 'es_ES');

                                    foreach ($registros as $key => $registroMes) {

                                      $monthNum  = $registroMes['mes'];

                                      $dateObj   = DateTime::createFromFormat('!m', $monthNum);

                                      $monthName = strftime('%B', $dateObj->getTimestamp());

                                      if($first){

                                         echo "<li class='tabs active' id='".$monthName."'><a href='#tab_".$contador."' data-toggle='tab'>".$monthName."</a></li>";
                                         
                                      }else{
                                          
                                          echo "<li class='tabs' id='".$monthName."'><a href='#tab_".$contador."' data-toggle='tab'>".$monthName."</a></li>";

                                      }

                                      $first = false;

                                      $contador++;

                                    }

                                ?>
                       
                                  <li class='tabs' id='stadistica'><a href='#tab_estadistica' data-toggle='tab'>Estadistica Anual</a></li>

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


<script>


  //   // CICLO COMPLETO
  //     var poblacionSexo = document.getElementById('pieChart').getContext('2d');
  //     window.myPie = new Chart(poblacionSexo, configPSS);

      
  //     var adpv = document.getElementById('barChart').getContext('2d');
  //     var chartAdpvGeneral = new Chart(adpv, {
  //       type: 'bar',
  //       data: configADPV,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Adpv'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         },
  //         scales: {
  //             yAxes: [{
  //                 ticks: {
  //                     suggestedMin: 0,
  //                     suggestedMax: <?php // echo $promedioAdpvCC;?>
  //                 }
  //             }]
  //         }
  //       }
  //     });

  //     var dias = document.getElementById('barChart1').getContext('2d');
  //     var chartDiasGeneral = new Chart(dias, {
  //       type: 'bar',
  //       data: configDias,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Dias'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

  //     var kgIng = document.getElementById('barChart2').getContext('2d');
  //     var chartKgIngGeneral = new Chart(kgIng, {
  //       type: 'bar',
  //       data: configKgIng,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Kg Ingreso'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

  //     var kgEgr = document.getElementById('barChart3').getContext('2d');
  //     var chartkgEgrGeneral = new Chart(kgEgr, {
  //       type: 'bar',
  //       data: configKgEgr,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Kg Salida'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

      
  //     var kgProd = document.getElementById('barChart4').getContext('2d');
  //     var chartkgProdGeneral = new Chart(kgProd, {
  //       type: 'bar',
  //       data: configKgProd,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Kg Prod.'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });


  //   ////// RECRIA PASTORIL ///////

  //     var porcentajePoblacionRP = document.getElementById('pieChart1RP').getContext('2d');
  //     window.myPie = new Chart(porcentajePoblacionRP, configPPRP);
    
      
  //     var adpvRP = document.getElementById('barChartRP').getContext('2d');
  //     var chartAdpvRPGeneral = new Chart(adpvRP, {
  //       type: 'bar',
  //       data: configADPVRP,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Adpv'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         },
  //         scales: {
  //             yAxes: [{
  //                 ticks: {
  //                     suggestedMin: 0,
  //                     suggestedMax: <?php // echo $promedioAdpvRP;?>
  //                 }
  //             }]
  //         }
  //       }
  //     });

  //     var diasRP = document.getElementById('barChart1RP').getContext('2d');
  //     var chartDiasRPGeneral = new Chart(diasRP, {
  //       type: 'bar',
  //       data: configDiasRP,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Dias'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });


  //     var kgProdRP = document.getElementById('barChart4RP').getContext('2d');
  //     var chartKgProdRPGeneral = new Chart(kgProdRP, {
  //       type: 'bar',
  //       data: configKgProdRP,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });


    
  //   ////// RECRIA CORRAL ///////



  //     var porcentajePoblacionRC = document.getElementById('pieChart1RC').getContext('2d');
  //     window.myPie = new Chart(porcentajePoblacionRC, configPPRC);
      

      
  //     var adpvRC = document.getElementById('barChartRC').getContext('2d');
  //     var chartAdpvRCGeneral = new Chart(adpvRC, {
  //       type: 'bar',
  //       data: configADPVRC,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Adpv'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         },
  //         scales: {
  //             yAxes: [{
  //                 ticks: {
  //                     suggestedMin: 0,
  //                     suggestedMax: <?php // echo $promedioAdpvRC;?>
  //                 }
  //             }]
  //         }
  //       }
  //     });

  //     var diasRC = document.getElementById('barChart1RC').getContext('2d');
  //     var chartDiasRCGeneral = new Chart(diasRC, {
  //       type: 'bar',
  //       data: configDiasRC,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Dias'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

  //     var kgProdRC = document.getElementById('barChart4RC').getContext('2d');
  //     var chartKgProdRCGeneral = new Chart(kgProdRC, {
  //       type: 'bar',
  //       data: configKgProdRC,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

        
  //   ////// TERMINACION ///////

  //     var porcentajePoblacionT = document.getElementById('pieChart1T').getContext('2d');
  //     window.myPie = new Chart(porcentajePoblacionT, configPPT);
      

      
  //     var adpvT = document.getElementById('barChartT').getContext('2d');
  //     var chartAdpvTGeneral = new Chart(adpvT, {
  //       type: 'bar',
  //       data: configADPVT,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Adpv'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         },
  //         scales: {
  //             yAxes: [{
  //                 ticks: {
  //                     suggestedMin: 0,
  //                     suggestedMax: <?php //echo $promedioAdpvT;?>
  //                 }
  //             }]
  //         }
  //       }
  //     });

  //     var diasT = document.getElementById('barChart1T').getContext('2d');
  //     var chartDiasTGeneral = new Chart(diasT, {
  //       type: 'bar',
  //       data: configDiasT,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //           text: 'Prom. Dias'
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });

  //     var kgProdT = document.getElementById('barChart4T').getContext('2d');
  //     var chartKgProdTGeneral = new Chart(kgProdT, {
  //       type: 'bar',
  //       data: configKgProdT,
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: 'top',
  //         },
  //         title: {
  //           display: false,
  //         },
  //         plugins: {
  //           labels: {
  //             render: 'value'
  //           }
  //         }
  //       }
  //     });



  // })
</script> 
