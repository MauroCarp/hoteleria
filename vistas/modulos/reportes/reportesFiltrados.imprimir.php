<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}
   function formatearFecha($fecha){
     $nuevaFecha = explode('-',$fecha);
     $nuevaFecha = $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
     return $nuevaFecha;
  
}

include 'ajax/datosReporte.ajax.php';

?>
<div class="content-wrapper">
<table>
      
      <tr>
    
        <td>
    
          <img src="vistas/img/plantilla/logo-barlovento-impresion.png" alt="barlovento SRL" style="height:35px!important;">

        </td>
    
        <td>

          <p class="btn" style="cursor:default;font-size:1.1em;">Peridodo: <?php echo formatearFecha($fechaInicial)." / ".formatearFecha($fechaFinal);?>  </p>

        </td>
    
      </tr>
    
    </table>
  <div class="box">
   
    <section class="content">

          <div class="row">

                <div class="col-md-12" id="reportesFiltrados">

                    <?php include('imprimir/cicloCompletoFiltrado.imprimir.php'); ?>
                   
                    <div class="saltopagina"></div>

                    <?php include('imprimir/recriaPastorilFiltrado.imprimir.php'); ?>

                    <div class="saltopagina"></div>

                    <?php include('imprimir/recriaCorralFiltrado.imprimir.php'); ?>

                    <div class="saltopagina"></div>
                
                    <?php include('imprimir/terminacionFiltrado.imprimir.php'); ?>

                </div>
          </div>

    </section>

    </div>

</div>
 
<div class="saltopagina"></div>

<div id="modalAlimento">
  
  <div class="modal-dialog">

    <div class="modal-content" style="width:800px;">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h2 class="modal-title">Alimento Diario consumido durante Proceso Productivo</h2>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Grafico -->

            <div class="generarGraficoAlimentos">
              
              <h2>GENERAL</h2>
                  
              <div class="box-header with-border">
              
                <div class="row">
                  
                  <div class="col-md-12">
                    
                    <div class="box box-success">
                      
                      <div class="box-body">
                        
                        <div class="chart">
                          
                          <canvas id="alimentoConsumidoGeneral"></canvas>
                      
                        </div>
                      
                      </div>
                    
                    </div>

                  </div>

                </div>

              </div>
        
            </div>

          </div>

        </div>

    </div>

  </div>

</div>

<script>

$(function () {
        function stringToNumber(array){
          for (let index = 0; index < array.length; index++) {
              array[index] = parseFloat(array[index]);
          }
        }

        var cantidad = <?php echo $cantidad;?>;

        var resultados = [<?php echo $label;?>];
  
        var datosGraficos = <?php echo $datosGraficos;?>;
        var kgConsumidos = datosGraficos[0]['kg'].split(',');
        var adpvGeneral = datosGraficos[0]['adpv'].split(',');
        var conversion = datosGraficos[0]['conv'].split(',');
        stringToNumber(adpvGeneral);
        stringToNumber(kgConsumidos);
        stringToNumber(kgConsumidos);
        
        function generarGraficoAlimento(idCanvas,adpvData,kgConsumidos,conversion){

          var ctx = document.getElementById(idCanvas).getContext('2d');
          new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Ciclo Completo','R. Pastoril', 'R. Corral', 'Terminacion'],
            datasets: [{
              type: 'line',
              label: 'ADPV',
              borderColor: window.chartColors.red,
              fill:false,
              yAxisID: 'A',
              data: adpvData
            },{
              label: 'CONVERSIÓN MS',
              type: 'bar',
              yAxisID: 'A',
              data: conversion,
              fill:false,
              borderColor: window.chartColors.blue,
              backgroundColor: window.chartColors.blue,
              borderWidth: 2

            }]
            },
          options: {
            scales: {
            yAxes: [{
              id: 'A',
              type: 'linear',
              position: 'left',
              ticks: {
                suggestedMin: 0,
                suggestedMax: 2
              }
            }]
            },
            plugins:{
              labels:{
                render: 'value'
              }
            }
          }
          });

        }

        generarGraficoAlimento('alimentoConsumidoGeneral',adpvGeneral,kgConsumidos,conversion);
        var contador = 1;


        resultados.forEach(element => {
          var tab = '<h2>' + element + '</h2>';
          console.log(element);
          
          var grafico =   '<div class="box-header with-border"><div class="row">';
          grafico    +=     '<div class="col-md-12">';
          grafico    +=       '<div class="box box-success">';
          grafico    +=         '<div class="box-body">';
          grafico    +=           '<div class="chart">';
          grafico    +=             '<canvas id="alimentoConsumidoFiltro' + contador + '"></canvas>';
          grafico    +=           '</div></div></div></div></div></div>';

          $('.generarGraficoAlimentos').append(tab);
          $('.generarGraficoAlimentos').append(grafico);

          var idCanvas = 'alimentoConsumidoFiltro' + contador;
          var adpvData =  datosGraficos[contador]['adpv'].split(',');
          var kgConsumidos =  datosGraficos[contador]['kg'].split(',');
          conversion = datosGraficos[contador]['conv'].split(',');
          stringToNumber(adpvData);
          stringToNumber(kgConsumidos);
          
          generarGraficoAlimento(idCanvas,adpvData,kgConsumidos,conversion);
          contador++;
        });

        var color = Chart.helpers.color;

        function opciones(configuracion){
          var opciones = {
            type: 'bar',
            data: configuracion,
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
              },
              legend: {
                labels: {
                    boxWidth: 5
                }
              },
              scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
            }
          }
          return opciones;
        }


        //POBLACION
        var configPCC = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                <?php echo $poblacionCC;?>
              ],
              backgroundColor: [
                <?php echo $coloresCC;?> 
              ],
              label: 'Porcentaje'
            }],
            labels: [
              <?php   echo $label;?>
            ]
          },
          options: {
            responsive: true,
            title: {
              display: false,
            },
            legend: {
              labels: {
                  boxWidth: 5
              }
            }

          }
        };

        var configPRP = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                <?php echo $poblacionRP;?>
              ],
              backgroundColor: [
                <?php echo $coloresRP;?> 
              ],
              label: 'Porcentaje'
            }],
            labels: [
              <?php   echo $label;?>
            ]
          },
          options: {
            responsive: true,
            title: {
              display: false,
            },
            legend: {
              labels: {
                  boxWidth: 5
              }
            }

          }
        };

        var configPRC = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                <?php echo $poblacionRC;?>
              ],
              backgroundColor: [
                <?php echo $coloresRC;?> 
              ],
              label: 'Porcentaje'
            }],
            labels: [
              <?php   echo $label;?>
            ]
          },
          options: {
            responsive: true,
            title: {
              display: false,
            },
            legend: {
              labels: {
                  boxWidth: 5
              }
            }

          }
        };

        var configPT = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                <?php echo $poblacionT;?>
              ],
              backgroundColor: [
                <?php echo $coloresT;?> 
              ],
              label: 'Porcentaje'
            }],
            labels: [
              <?php   echo $label;?>
            ]
          },
          options: {
            responsive: true,
            title: {
              display: false,
            },
            legend: {
              labels: {
                  boxWidth: 5
              }
            }

          }
        };

        // CANTIDAD

          //CC
          var configCantidadCC = {
            labels: [
              'Animales'
            ],
            datasets:[
              <?php 
                echo $cantidadCC;
              ?> 
            ]
          };

          //RP
          var configCantidadRP = {
            labels: [
              'Animales'
            ],
            datasets:[
              <?php 
                echo $cantidadRP;
              ?> 
            ]
          };

          //RC
          var configCantidadRC = {
            labels: [
              'Animales'
            ],
            datasets:[
              <?php 
                echo $cantidadRC;
              ?> 
            ]
          };

          //T
          var configCantidadT = {
            labels: [
              'Animales'
            ],
            datasets:[
              <?php 
                echo $cantidadT;
              ?> 
            ]
          };


        // ADPV

          //CC
          var configAdpvCC = {
            labels: [
              'Kg Prom'
            ],
            datasets:[
              <?php 
                echo $adpvCC;
              ?> 
            ]
          };

          //RP
          var configAdpvRP = {
            labels: [
              'Kg Prom'
            ],
            datasets:[
              <?php 
                echo $adpvRP;
              ?> 
            ]
          };

          //RC
          var configAdpvRC = {
            labels: [
              'Kg Prom'
            ],
            datasets:[
              <?php 
                echo $adpvRC;
              ?> 
            ]
          };

          //T
          var configAdpvT = {
            labels: [
              'Kg Prom'
            ],
            datasets:[
              <?php 
                echo $adpvT;
              ?> 
            ]
          };


        // DIAS

          //CC
          var configDiasCC = {
            labels: [
              'Días Prom.'
            ],
            datasets:[
              <?php 
                echo $diasCC;
              ?> 
            ]
          };

          //RP
          var configDiasRP = {
            labels: [
              'Días Prom.'
            ],
            datasets:[
              <?php 
                echo $diasRP;
              ?> 
            ]
          };

          //RC
          var configDiasRC = {
            labels: [
              'Días Prom.'
            ],
            datasets:[
              <?php 
                echo $diasRC;
              ?> 
            ]
          };

          //T
          var configDiasT = {
            labels: [
              'Días Prom.'
            ],
            datasets:[
              <?php 
                echo $diasT;
              ?> 
            ]
          };


        
        

        // KG ING

          //CC
          var configKgIngCC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgIngCC;
              ?> 
            ]
          };

          //RP
          var configKgIngRP = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgIngRP;
              ?> 
            ]
          };

          //RC
          var configKgIngRC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgIngRC;
              ?> 
            ]
          };

          //T
          var configKgIngT = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgIngT;
              ?> 
            ]
          };


        // KG EGR 

          //CC
          var configKgEgrCC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgEgrCC;
              ?> 
            ]
          };

          //RP
          var configKgEgrRP = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgEgrRP;
              ?> 
            ]
          };

          //RC
          var configKgEgrRC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgEgrRC;
              ?> 
            ]
          };

          //T
          var configKgEgrT = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgEgrT;
              ?> 
            ]
          };


        // KG PROD 

          //CC
          var configKgProdCC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgProdCC;
              ?> 
            ]
          };

          //RP
          var configKgProdRP = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgProdRP;
              ?> 
            ]
          };

          //RC
          var configKgProdRC = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgProdRC;
              ?> 
            ]
          };

          //T
          var configKgProdT = {
            labels: [
              'Kg Prom.'
            ],
            datasets:[
              <?php 
                echo $kgProdT;
              ?> 
            ]
          };

        // GRAFICOS ADPV
          var barChartFiltrado = document.getElementById('barChartFiltrado').getContext('2d');      
          var adpvCC = new Chart(barChartFiltrado, opciones(configAdpvCC) );

          var barChartRPFiltrado = document.getElementById('barChartRPFiltrado').getContext('2d');
          var adpvRP = new Chart(barChartRPFiltrado, opciones(configAdpvRP) );

          var barChartRCFiltrado = document.getElementById('barChartRCFiltrado').getContext('2d');
          var adpvRC = new Chart(barChartRCFiltrado, opciones(configAdpvRC) );

          var barChartTFiltrado = document.getElementById('barChartTFiltrado').getContext('2d');
          var adpvT = new Chart(barChartTFiltrado, opciones(configAdpvT) );

       
        // GRAFICOS DIAS
          var barChart1Filtrado = document.getElementById('barChart1Filtrado').getContext('2d');      
          var diasCC = new Chart(barChart1Filtrado, opciones(configDiasCC) );

          var barChart1RPFiltrado = document.getElementById('barChart1RPFiltrado').getContext('2d');
          var diasRP = new Chart(barChart1RPFiltrado, opciones(configDiasRP) );

          var barChart1RCFiltrado = document.getElementById('barChart1RCFiltrado').getContext('2d');
          var diasRC = new Chart(barChart1RCFiltrado, opciones(configDiasRC) );

          var barChart1TFiltrado = document.getElementById('barChart1TFiltrado').getContext('2d');
          var diasT = new Chart(barChart1TFiltrado, opciones(configDiasT) );

        // GRAFICOS KG ING
          var barChart2Filtrado = document.getElementById('barChart2Filtrado').getContext('2d');      
          var kgIngCC = new Chart(barChart2Filtrado, opciones(configKgIngCC) );

          var barChart2RPFiltrado = document.getElementById('barChart2RPFiltrado').getContext('2d');
          var kgIngRP = new Chart(barChart2RPFiltrado, opciones(configKgIngRP) );

          var barChart2RCFiltrado = document.getElementById('barChart2RCFiltrado').getContext('2d');
          var kgIngRC = new Chart(barChart2RCFiltrado, opciones(configKgIngRC) );

          var barChart2TFiltrado = document.getElementById('barChart2TFiltrado').getContext('2d');
          var kgIngT = new Chart(barChart2TFiltrado, opciones(configKgIngT) );
        
        // GRAFICOS KG EGR
          var barChart3Filtrado = document.getElementById('barChart3Filtrado').getContext('2d');      
          var kgEgrCC = new Chart(barChart3Filtrado, opciones(configKgEgrCC) );

          var barChart3RPFiltrado = document.getElementById('barChart3RPFiltrado').getContext('2d');
          var kgEgrRP = new Chart(barChart3RPFiltrado, opciones(configKgEgrRP) );

          var barChart3RCFiltrado = document.getElementById('barChart3RCFiltrado').getContext('2d');
          var kgEgrRC = new Chart(barChart3RCFiltrado, opciones(configKgEgrRC) );

          var barChart3TFiltrado = document.getElementById('barChart3TFiltrado').getContext('2d');
          var kgEgrT = new Chart(barChart3TFiltrado, opciones(configKgEgrT) );

        // GRAFICOS KG PROD
          var barChart4Filtrado = document.getElementById('barChart4Filtrado').getContext('2d');      
          var kgProdCC = new Chart(barChart4Filtrado, opciones(configKgProdCC) );

          var barChart4RPFiltrado = document.getElementById('barChart4RPFiltrado').getContext('2d');
          var kgProdRP = new Chart(barChart4RPFiltrado, opciones(configKgProdRP) );

          var barChart4RCFiltrado = document.getElementById('barChart4RCFiltrado').getContext('2d');
          var kgProdRC = new Chart(barChart4RCFiltrado, opciones(configKgProdRC) );

          var barChart4TFiltrado = document.getElementById('barChart4TFiltrado').getContext('2d');
          var kgProdT = new Chart(barChart4TFiltrado, opciones(configKgProdT) );

        // GRAFICOS POBLACION
          var porcentajePoblacion = document.getElementById('pieChart1Filtrado').getContext('2d');
          var poblacionCC = new Chart(porcentajePoblacion, configPCC);

          var porcentajePoblacionRP = document.getElementById('pieChart1RPFiltrado').getContext('2d');
          var poblacionRP = new Chart(porcentajePoblacionRP, configPRP);

          var porcentajePoblacionRC = document.getElementById('pieChart1RCFiltrado').getContext('2d');
          var poblacionRC = new Chart(porcentajePoblacionRC, configPRC);

          var porcentajePoblacionT = document.getElementById('pieChart1TFiltrado').getContext('2d');
          var poblacionT = new Chart(porcentajePoblacionT, configPT);

          $('.main-footer').hide();

          setTimeout(function () { window.print(); }, 1300);
          window.onfocus = function () { setTimeout('window.close();', .2);}

})
</script> 
