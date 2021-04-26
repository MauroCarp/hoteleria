<?php

$periodos = $_GET['periodos'];

$cantidadPeriodos = sizeof(explode('/',$_GET['periodos']));

$periodosExplode = explode('/',$_GET['periodos']);

$meses = Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

// DATA ULTIMOS 6 PERIODOS

  $cantidad = 6;

  // LABELS

  $campo = 'periodo';

  $ultimosLabels = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // CONVERSION

  $campo = 'converMSEstADPV';

  $conversion = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // COSTO KG MS

  $campo = 'CKgRacPromMS';

  $costoKgMS = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // POBLACION

  $campo = 'poblDiaPromPeriodo';

  $poblacion = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // ESTADIA

  $campo = 'estadiaProm';

  $estadia = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // $ KG PRODUCIDO

  $campo = 'CProdKgAES';

  $costoKgProd = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // MARGEN TECNICO POR CABEZAS SALIDAS

  $campo = 'margenTecKgProd';

  $margenTec = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

// CABEZAS SALIDAS

  $campo = 'cabTrazSalidas';

  $cabSalidas = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // CONSUMO SOJA

  $campo = 'consumoSoja';

  $consumoSoja = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

  // CONSUMO MAIZ

  $campo = 'consumoMaiz';

  $consumoMaiz = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);


  $dataGraficos = array();


  for ($i=0; $i < sizeof($ultimosLabels) ; $i++) { 
      
      $tempExp = explode('-',$ultimosLabels[$i][0]);

      $temp = number_format($tempExp[1]);

      $temp = $meses[$temp - 1];

      $dataGraficos['Labels'][] = $temp." ".$tempExp[0];

      $dataGraficos['Conversion'][] = $conversion[$i][0];
      
      $dataGraficos['CostoKgMS'][] = $costoKgMS[$i][0];

      $dataGraficos['Poblacion'][] = $poblacion[$i][0];

      $dataGraficos['Estadia'][] = $estadia[$i][0];

      $dataGraficos['KgProd'][] = $costoKgProd[$i][0];
      
      $dataGraficos['MargenTec'][] = number_format(($margenTec[$i][0] * $cabSalidas[$i][0]),2,'.','');     
      
      $dataGraficos['ConsumoSoja'][] = $consumoSoja[$i][0];
      
      $dataGraficos['ConsumoMaiz'][] = $consumoMaiz[$i][0];

  }

  $dataGraficos = json_encode($dataGraficos);
  
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>
    <br>

  </section>

  <div class="row">

    <div class="col-md-12" id="reportesGeneral">

      <div class="nav-tabs-custom">

        <ul class="nav nav-tabs" id="solapasPeriodos" style="font-size:1.em;">

          <?php

          for ($i=0; $i < $cantidadPeriodos ; $i++) { 
            
            
            $periodoExplode = explode('-',$periodosExplode[$i]);

            $mesNumero = number_format($periodoExplode[1]);

          ?>
            
            <li class="tabs <?php echo ($i == 0) ? 'active' : '';?>"><a href="#periodo_<?php echo $i + 1; ?>" data-toggle="tab"><b><?php echo $meses[$mesNumero - 1]." ".$periodoExplode[0];?></b></a></li>
          
          <?php
          }
          ?>

        </ul>

        <div class="tab-content" id="contenidoSolapaPeriodos" style="padding-bottom:0px;">

          <?php

          for ($i=0; $i < $cantidadPeriodos ; $i++) { ?>
            
            <div class="tab-pane <?php echo ($i == 0) ? 'active' : '';?>" id="periodo_<?php echo $i + 1;?>">
                    
              <?php include('reportes/panelControl/cajasPanelControl.php'); ?>

              <div class="nav-tabs-custom">

                <ul class="nav nav-tabs" style="font-size:1.em;">

                  <li class="tabs active"><a href="#tab_1_<?php echo $i + 1;?>" data-toggle="tab"><b>Consumos</b></a></li>

                  <li class="tabs"><a href="#tab_2_<?php echo $i + 1;?>" data-toggle="tab"><b>Poblacion</b></a></li>

                  <li class="tabs"><a href="#tab_3_<?php echo $i + 1;?>" data-toggle="tab"><b>Producci&oacute;n</b></a></li>

                </ul>

                <div class="tab-content" style="padding-bottom:0px;">

                  <div class="tab-pane active" id="tab_1_<?php echo $i + 1;?>">

                    <?php include 'reportes/panelControl/consumos.php'; ?>

                  </div>

                  <div class="tab-pane poblacion" id="tab_2_<?php echo $i + 1;?>">

                    <?php include 'reportes/panelControl/poblacion.php'; ?>

                  </div>

                  <div class="tab-pane produccion" id="tab_3_<?php echo $i + 1;?>">

                  <?php include('reportes/panelControl/produccion.php'); ?>

                  </div>
                
                </div>

              </div> 

            </div> 
    
          <?php
          }
          ?>
        
        </div> 
    
      </div> 
    
    </div> 
  
  </div> 

</div> 

<script>
function generarColores(cantidad,tipo){

  let coloresBg = ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'];

  let coloresBr = ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'];

  let colores = [];

  for (let index = 0; index < cantidad; index++) {

    if(tipo == 'bg'){
      
      colores.push(coloresBg[index])
      
    }else{
      
      colores.push(coloresBr[index]);
      
    }
    
  }

  return colores;

}

function generarGraficoBarSimple(registros,divId,labels,tituloLabel){

  let coloresBg = generarColores(registros.length,'bg');
          
  let coloresBr = generarColores(registros.length,'br');
          
  let ctx = document.getElementById(divId).getContext('2d');

  let myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: tituloLabel,
                                        data: registros,
                                        backgroundColor: coloresBg,
                                        borderColor: coloresBr,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                  scales: {
                                      yAxes: [{
                                          ticks: {
                                              beginAtZero: true
                                          }
                                      }]
                                    },
                                    plugins: {
                                      labels: {
                                        render: 'value'
                                      },
                                      legend: {
                                        display: false,
                                        
                                      }
                                    }
                                }
                              });   

  return myChart; 

}

function generarGraficoBarDoble(divId,labels,consumoSoja,consumoMaiz){
  
  let ctx = document.getElementById(divId).getContext('2d');
 
  let myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                  labels  : labels,
                                  datasets: [
                                    {
                                      label               : 'Soja',
                                      type                : 'bar',
                                      backgroundColor     : 'rgba(154,215,117,0.9)',
                                      borderColor         : 'rgba(154,215,117, 1)',
                                      data                : consumoSoja,
                                      yAxisID             : 'A',

                                    },
                                    {
                                      label               : 'Maiz',
                                      type                : 'bar',
                                      backgroundColor     : 'rgba(255, 206, 86, 0.2)',
                                      borderColor         : 'rgba(255, 206, 86, 1)',
                                      data                : consumoMaiz,
                                      yAxisID             : 'B',

                                    }
                                  ]
                                },
                                options: {
                                  scales: {
                                    xAxes: [{
                                          gridLines: {
                                              color: "rgba(0, 0, 0, 0)",
                                          }
                                      }],
                                      yAxes: [{
                                        id: 'A',
                                        type: 'linear',
                                        position: 'left',
                                        ticks: {
                                              beginAtZero: true
                                          },
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                        }, {
                                          id: 'B',
                                          type: 'linear',
                                          position: 'right',
                                          ticks: {
                                                beginAtZero: true
                                            },
                                          gridLines: {
                                          color: "rgba(0, 0, 0, 0)",
                                            }
                                        }
                                        
                                      ]
                                  
                                    },
                                    plugins: {
                                      labels: {
                                        render: 'value'
                                      },
                                      legend: {
                                        display: false,
                                        
                                      }
                                    }
                                }
                              });


  return myChart; 

}

meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

let periodos = <?php echo "'".$_GET['periodos']."'";?>;

periodos = periodos.split('/');

let url = 'ajax/datosPanelControl.ajax.php';

for (let index = 0; index < periodos.length; index++) {


  let data = 'periodo=' + periodos[index];

  $.ajax({
    
    method: 'POST',
    
    url: url,
    
    data: data,
    
    success: function(response){

      response = JSON.parse(response);

      if(response.CajaPoblacion != null){

        $('#CostoDiario' + (index + 1)).html(response.Consumo1);

        $('#datoConsumo' + (index + 1)).html(response.Consumo2);

        $('#datosPoblacionales' + (index + 1)).html(response.Poblacion);

        $('#kgCarneRinde' + (index + 1)).html(response.Produccion1);

        $('#costoMargeKg' + (index + 1)).html(response.Produccion2);
        
        $('#panelPoblacion' + (index + 1)).html(response.CajaPoblacion);
        
        $('#panelConversion' + (index + 1)).html(response.CajaConversion);

        $('#panelAdpv' + (index + 1)).html(response.CajaAdpv);

        $('#panelPrecioKiloProd' + (index + 1)).html(response.CajaKgProd);

        $('#panelEstadia' + (index + 1)).html(response.CajaEstadia);


      }else{

        $('#periodo_' + (index + 1 )).html('<h1>No hay resultados</h1>');
      }

    }

  });

  // GRAFICOS
  
  let urlGraficos = 'ajax/graficosPanelControl.ajax.php';

  let dataGraficos = <?php echo $dataGraficos;?>;

  data = 'periodo=' + periodos[index];

  
  $.ajax({
    
    method: 'POST',
    
    url:urlGraficos,
    
    data:data,
    
    success:function(response){
      
      response = JSON.parse(response);
      
      dataGraficos['Conversion'].push(response['Conversion']);
      dataGraficos['CostoKgMS'].push(response['CostoKgMS']);
      dataGraficos['Poblacion'].push(response['Poblacion']);
      dataGraficos['Estadia'].push(response['Estadia']);
      dataGraficos['KgProd'].push(response['KgProd']);
      dataGraficos['MargenTec'].push((response['MargenTec'] * response['CabSalidas']).toFixed(2));
      dataGraficos['ConsumoSoja'].push(response['ConsumoSoja']);
      dataGraficos['ConsumoMaiz'].push(response['ConsumoMaiz']);

      
      let tempExp = periodos[index].split('-');

      let temp = parseInt(tempExp[1]);

      temp = meses[temp - 1];

      dataGraficos['Labels'].push(temp + " " + tempExp[0]);

      // CONVERSION
      let divId = 'graficoConversion' + (index + 1);

      generarGraficoBarSimple(dataGraficos['Conversion'],divId,dataGraficos['Labels'],'Conversión');

      // COSTO KG MS
      divId = 'graficoCostoKgMS' + (index + 1);

      generarGraficoBarSimple(dataGraficos['CostoKgMS'],divId,dataGraficos['Labels'],'$ Kg de MS');
      
      // POBLACION
      divId = 'graficoPoblacion' + (index + 1);

      generarGraficoBarSimple(dataGraficos['Poblacion'],divId,dataGraficos['Labels'],'Población Prom.');
      
      // ESTADIA
      divId = 'graficoEstadia' + (index + 1);

      generarGraficoBarSimple(dataGraficos['Estadia'],divId,dataGraficos['Labels'],'Estadia Prom.');
      
      // $ Kg Prod
      divId = 'graficoCostoKgProd' + (index + 1);

      generarGraficoBarSimple(dataGraficos['KgProd'],divId,dataGraficos['Labels'],'$ Kg Prod.');
      
      // MARGEN TEC * CAB SALIDAS 
      divId = 'graficoMargenTec' + (index + 1);
      
      generarGraficoBarSimple(dataGraficos['MargenTec'],divId,dataGraficos['Labels'],'Margen Tec. x Cab Salidas');

      // CONSUMOS SOJA Y MAIZ
      divId = 'graficoSojaMaiz' + (index + 1);    

      generarGraficoBarDoble(divId,dataGraficos['Labels'],dataGraficos['ConsumoSoja'],dataGraficos['ConsumoMaiz']);
    
    }

  });



}

</script>

