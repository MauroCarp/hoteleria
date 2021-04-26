<?php

$periodos = "'".$_GET['periodos']."'";

$periodosExplode = explode('/',$_GET['periodos']);

$periodo1Explode = explode('-',$periodosExplode[0]);

$mesNumero = number_format($periodo1Explode[1]);

$meses = Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

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

            <li class="tabs active"><a href="#periodo_1" data-toggle="tab"><b><?php echo $meses[$mesNumero - 1]." ".$periodo1Explode[0];?></b></a></li>

          </ul>

          <div class="tab-content" id="contenidoSolapaPeriodos">

            <div class="tab-pane active" id="periodo_1">
                
                <?php include('reportes/panelControl/cajasPanelControl.php'); ?>

                <div class="nav-tabs-custom">

                  <ul class="nav nav-tabs" style="font-size:1.em;">

                    <li class="tabs active"><a href="#tab_1" data-toggle="tab"><b>Consumos</b></a></li>

                    <li class="tabs"><a href="#tab_2" data-toggle="tab"><b>Poblacion</b></a></li>

                    <li class="tabs"><a href="#tab_3" data-toggle="tab"><b>Producci&oacute;n</b></a></li>

                  </ul>

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">

                      <?php include 'reportes/panelControl/consumos.php'; ?>

                    </div>

                    <div class="tab-pane poblacion" id="tab_2">

                    <?php include('reportes/panelControl/poblacion.php'); ?>

                    </div>

                    <div class="tab-pane produccion" id="tab_3">

                    <?php //include('reportes/recriaCorral.php'); ?>

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


/*=============================================
GENERAR REPORTE 
=============================================*/

function generarGraficoBar(idDiv,configuracion,opcion){

  let barChart = document.getElementById(idDiv).getContext('2d');      

  let grafico = new Chart(barChart, opciones(configuracion))

  return grafico;

}

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

function generarReporte(periodos){

  let periodosGet = periodos;

  let url = 'ajax/datosPanelControl.ajax.php';

  let data = 'accion=estructura&periodos=' + periodosGet;

  $.ajax({
    url: url,
    method: 'POST',
    data: data,
    success: function(respuesta){
      
      return respuesta;
      
    }

  })
    .then((response)=>{

      meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

      let respuesta = JSON.parse(response);
      
      let nuevaSolapa = '';
      
      let nuevoContenidoSolapa = '';

      let etiquetaSolapa = '';
            
      periodos = periodos.split('/');
          
      for (let index = 1; index <= respuesta[0].Cantidad; index++) {
        
        etiquetaSolapa = periodos[index-1].split('-');
        
        mesNumero = parseInt(etiquetaSolapa[1]);      

        etiquetaSolapa = meses[mesNumero - 1] + ' ' + etiquetaSolapa[0];

        nuevaSolapa = '<li class="tabs"><a href="#periodo_' + index + '" data-toggle="tab"><b>' + etiquetaSolapa + '</b></a></li>';

        if(index > 1 && respuesta[index].Poblacion == null){

          nuevoContenidoSolapa = '<div class="tab-pane" id="periodo_' + index + '"><h1>No hay resultados</h1></div>';

          $('#solapasPeriodos').append(nuevaSolapa);
          
          $('#contenidoSolapaPeriodos').append(nuevoContenidoSolapa);
        
        }

        if(respuesta[index].Poblacion != null){
        
          if(index == 1){

            $('#panelPoblacion').text(respuesta[index].Poblacion);
            
            $('#panelConversion').text(respuesta[index].Conversion);
    
            $('#panelAdpv').text(respuesta[index].Adpv);
            
            $('#panelPrecioKiloProd').text(respuesta[index].CostoKgProd);
            
            $('#panelEstadia').text(respuesta[index].Estadia);
            
          }else{
          
            nuevoContenidoSolapa = '<div class="tab-pane" id="periodo_' + index + '">';

            nuevoContenidoSolapa += generarCajas(index);
            
            nuevoContenidoSolapa += generarSolapasCPP(index);

            nuevoContenidoSolapa += '</div>';

            $('#contenidoSolapaPeriodos').append(nuevoContenidoSolapa);
            
            $('#solapasPeriodos').append(nuevaSolapa);

            $('#panelPoblacion' + index).text(respuesta[index].Poblacion);
            
            $('#panelConversion' + index).text(respuesta[index].Conversion);
    
            $('#panelAdpv' + index).text(respuesta[index].Adpv);
            
            $('#panelPrecioKiloProd' + index).text(respuesta[index].CostoKgProd);
            
            $('#panelEstadia' + index).text(respuesta[index].Estadia);

          }
          
        
        }
      }


    });

}


$(function(){

  generarReporte(<?php echo $periodos;?>);
  
  let cantidadPeriodos = <?php echo sizeof(explode('/',$periodos));?>;

  let url = 'ajax/ConsumosPanelControl.ajax.php';

  for (let index = 0; index < cantidadPeriodos; index++) {

    let data = 'idNumero=' + (index + 2);

    // GENERAR SOLAPA CONSUMO
    $.ajax({
      method: 'POST',
      url:url,
      data:data,
      success:function(resultado){

        let tabId = 'tab_1' + (index + 2);
console.log(tabId);

        $('#' + tabId).html(resultado);
      }

    });

    
  }
  
  // CARGAR INFO GRAFICOS
  
  url = 'ajax/datosPanelControl.ajax.php';

  data = 'accion=graficos&periodos=' + <?php echo $periodos;?>;
  
  $.ajax({
      
      method:'POST',
      
      data: data,

      url:url,
      
      success:function(respuesta){

        respuesta = JSON.parse(respuesta);
        
        coloresBg = generarColores(respuesta.Data[0].length,'bg');
        
        coloresBr = generarColores(respuesta.Data[0].length,'br');
        
        var ctx = document.getElementById('graficoConversion').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: respuesta.Labels[0],
                datasets: [{
                    label: 'Conversión',
                    data: respuesta.Data[0],
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

      }
      

  });

});

</script>
