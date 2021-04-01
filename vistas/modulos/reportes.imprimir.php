<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

 
  
}
   

?>
<div class="content-wrapper">
<table>
      
  <tr>

    <td>

      <img src="vistas/img/plantilla/logo-barlovento-impresion.png" alt="barlovento SRL" style="height:35px!important;">

    </td>

  </tr>

</table>
    <div class="box">
    
        <section class="content" style="padding-top:0;">

                    <div class="col-md-12" id="reportesGeneral">

                        <?php include('reportes/imprimir/cicloCompleto.imprimir.php'); ?>
                        
                        <div class="saltopagina"></div>

                        <?php include('reportes/imprimir/recriaPastoril.imprimir.php'); ?>

                        <div class="saltopagina"></div>

                        <?php include('reportes/imprimir/recriaCorral.imprimir.php'); ?>

                        <div class="saltopagina"></div>

                        <?php include('reportes/imprimir/terminacion.imprimir.php'); ?>

                    </div>
            </div>

        </section>

    </div>

</div>

<script>
  $(function () {
    
    // CICLO COMPLETO
      var poblacionSexo = document.getElementById('pieChart').getContext('2d');
      window.myPie = new Chart(poblacionSexo, configPSS);

     
      var adpv = document.getElementById('barChart').getContext('2d');
      var chartAdpvGeneral = new Chart(adpv, {
        type: 'bar',
        data: configADPV,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Adpv'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          },
          scales: {
              yAxes: [{
                  ticks: {
                      suggestedMin: 0,
                      suggestedMax: <?php echo $promedioAdpvCC;?>
                  }
              }]
          }
        }
      });

      var dias = document.getElementById('barChart1').getContext('2d');
      var chartDiasGeneral = new Chart(dias, {
        type: 'bar',
        data: configDias,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Dias'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      var kgIng = document.getElementById('barChart2').getContext('2d');
      var chartKgIngGeneral = new Chart(kgIng, {
        type: 'bar',
        data: configKgIng,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Kg Ingreso'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      var kgEgr = document.getElementById('barChart3').getContext('2d');
      var chartkgEgrGeneral = new Chart(kgEgr, {
        type: 'bar',
        data: configKgEgr,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Kg Salida'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      
      var kgProd = document.getElementById('barChart4').getContext('2d');
      var chartkgProdGeneral = new Chart(kgProd, {
        type: 'bar',
        data: configKgProd,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Kg Prod.'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });


    ////// RECRIA PASTORIL ///////

      // var poblacionSexoRP = document.getElementById('pieChartRP').getContext('2d');
      // window.myPie = new Chart(poblacionSexoRP, configPSSRP);


      var porcentajePoblacionRP = document.getElementById('pieChart1RP').getContext('2d');
      window.myPie = new Chart(porcentajePoblacionRP, configPPRP);
      

      
      var adpvRP = document.getElementById('barChartRP').getContext('2d');
      var chartAdpvRPGeneral = new Chart(adpvRP, {
        type: 'bar',
        data: configADPVRP,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Adpv'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          },
          scales: {
              yAxes: [{
                  ticks: {
                      suggestedMin: 0,
                      suggestedMax: <?php echo $promedioAdpvRP;?>
                  }
              }]
          }
        }
      });

      var diasRP = document.getElementById('barChart1RP').getContext('2d');
      var chartDiasRPGeneral = new Chart(diasRP, {
        type: 'bar',
        data: configDiasRP,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Dias'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      // var kgIngRP = document.getElementById('barChart2RP').getContext('2d');
      // var chartkgIngRPGeneral = new Chart(kgIngRP, {
      //   type: 'bar',
      //   data: configKgIngRP,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      // var kgEgrRP = document.getElementById('barChart3RP').getContext('2d');
      // var chartKgEgrRPGeneral = new Chart(kgEgrRP, {
      //   type: 'bar',
      //   data: configKgEgrRP,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      var kgProdRP = document.getElementById('barChart4RP').getContext('2d');
      var chartKgProdRPGeneral = new Chart(kgProdRP, {
        type: 'bar',
        data: configKgProdRP,
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


    
    ////// RECRIA CORRAL ///////

      // var poblacionSexoRC = document.getElementById('pieChartRC').getContext('2d');
      // window.myPie = new Chart(poblacionSexoRC, configPSSRC);


      var porcentajePoblacionRC = document.getElementById('pieChart1RC').getContext('2d');
      window.myPie = new Chart(porcentajePoblacionRC, configPPRC);
      

      
      var adpvRC = document.getElementById('barChartRC').getContext('2d');
      var chartAdpvRCGeneral = new Chart(adpvRC, {
        type: 'bar',
        data: configADPVRC,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Adpv'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          },
          scales: {
              yAxes: [{
                  ticks: {
                      suggestedMin: 0,
                      suggestedMax: <?php echo $promedioAdpvRC;?>
                  }
              }]
          }
        }
      });

      var diasRC = document.getElementById('barChart1RC').getContext('2d');
      var chartDiasRCGeneral = new Chart(diasRC, {
        type: 'bar',
        data: configDiasRC,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Dias'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      // var kgIngRC = document.getElementById('barChart2RC').getContext('2d');
      // var chartKgIngRCGeneral = new Chart(kgIngRC, {
      //   type: 'bar',
      //   data: configKgIngRC,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      // var kgEgrRC = document.getElementById('barChart3RC').getContext('2d');
      // var chartKgEgrRCGeneral = new Chart(kgEgrRC, {
      //   type: 'bar',
      //   data: configKgEgrRC,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      var kgProdRC = document.getElementById('barChart4RC').getContext('2d');
      var chartKgProdRCGeneral = new Chart(kgProdRC, {
        type: 'bar',
        data: configKgProdRC,
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

        
    ////// TERMINACION ///////

      // var poblacionSexoT = document.getElementById('pieChartT').getContext('2d');
      // window.myPie = new Chart(poblacionSexoT, configPSST);


      var porcentajePoblacionT = document.getElementById('pieChart1T').getContext('2d');
      window.myPie = new Chart(porcentajePoblacionT, configPPT);
      

      
      var adpvT = document.getElementById('barChartT').getContext('2d');
      var chartAdpvTGeneral = new Chart(adpvT, {
        type: 'bar',
        data: configADPVT,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Adpv'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          },
          scales: {
              yAxes: [{
                  ticks: {
                      suggestedMin: 0,
                      suggestedMax: <?php echo $promedioAdpvT;?>
                  }
              }]
          }
        }
      });

      var diasT = document.getElementById('barChart1T').getContext('2d');
      var chartDiasTGeneral = new Chart(diasT, {
        type: 'bar',
        data: configDiasT,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Prom. Dias'
          },
          plugins: {
            labels: {
              render: 'value'
            }
          }
        }
      });

      // var kgIngT = document.getElementById('barChart2T').getContext('2d');
      // var chartKgIngTGeneral = new Chart(kgIngT, {
      //   type: 'bar',
      //   data: configKgIngT,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      // var kgEgrT = document.getElementById('barChart3T').getContext('2d');
      // var chartKgEgrTGeneral = new Chart(kgEgrT, {
      //   type: 'bar',
      //   data: configKgEgrT,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //     },
      //     plugins: {
      //       labels: {
      //         render: 'value'
      //       }
      //     }
      //   }
      // });

      var kgProdT = document.getElementById('barChart4T').getContext('2d');
      var chartKgProdTGeneral = new Chart(kgProdT, {
        type: 'bar',
        data: configKgProdT,
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


    $('.main-footer').hide();

    setTimeout(function () { window.print(); }, 1300);
    window.onfocus = function () { setTimeout('window.close();', .2);}
    })
</script> 
