<?php
 /// OBTENCION DE DATOS


    /*********
             POBLACION SEGUN SEXO
                                    ********/
    // MACHOS
    $item = 'adpvT';

    $valor = '';

    $item2 = 'sexo';

    $valor2 = 'M';

    $operador = '!=';

    $item3 = 'fechaSalida'; 

    $fecha1 = $fechaInicial;

    $fecha2 = $fechaFinal;
    
    $totalMachos = ControladorDatos::ctrContarDatosRango($item, $valor,$item2, $valor2, $operador,$item3,$fecha1,$fecha2);

    // HEMBRAS
                                    
    $valor2 = 'H';

    $totalHembras = ControladorDatos::ctrContarDatosRango($item, $valor,$item2, $valor2, $operador,$item3,$fecha1,$fecha2);

    /*********
                 % POBLACION
                                    ********/
    $totalAnimalesT = $totalMachos[0] + $totalHembras[0];

    $restoAnimales = $totalAnimalesCC - $totalAnimalesT;

                                    
    /*********
                     ADPV
                                    ********/

    $item = NULL;
    $valor = NULL;
    $campo = 'adpvT';

    $item2 = 'fechaSalida';

    $sumaADPV = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fecha1,$fecha2);

    $totalAdpvT = $sumaADPV[0][0];
    $promedioAdpvT = number_format(($totalAdpvT / $totalAnimalesT),2);

                                
    /*********
                     DIAS 
                                    ********/
    
    $campo = 'diasT';
    $totalDias = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fecha1,$fecha2);

    $totalDiasT = $totalDias[0][0];

    $promedioDiasT = round(($totalDiasT / $totalAnimalesT));
            
    /*********
                    KG INGRESO
                                    ********/
    
    $campo = 'kgIngresoT';
    $kilosIng = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fecha1,$fecha2);

    $kilosIngRR = $kilosIng[0][0];

    $promedioKgIngT = number_format(($kilosIngRR / $totalAnimalesT),2);

    /*********
                    KG SALIDA
                                    ********/
    
    $campo = 'kgSalidaT';
    $kilosEgrPR = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fecha1,$fecha2);

    $kilosEgrPR = $kilosEgrPR[0][0];

    $promedioKgEgrT = number_format(($kilosEgrPR / $totalAnimalesT),2);

                                    
    /*********
                 KG PRODUCCION
                                    ********/

    
    $campo = 'kgProdT';
    $kilosProd = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fecha1,$fecha2);

    $kilosProdT = $kilosProd[0][0];

    $promedioKgProdT = number_format(($kilosProdT / $totalAnimalesT),2);

?>

<h2>Terminaci&oacute;n</h2>

<div class="row">

    <div class="col-md-4">
      <!-- BAR CHART -->
      <div class="box box-success">
          <div class="box-header with-border">
          <h3 class="box-title">ADPV</h3>
          </div>
          <div class="box-body">
          <div class="chart">
              <canvas id="barChartT" style="height:230px"></canvas>
          </div>
          </div>

      </div>
    
    </div>

    <div class="col-md-4">
      <!-- BAR CHART -->
      <div class="box box-success">
          <div class="box-header with-border">
          <h3 class="box-title">Días</h3>
          </div>
          <div class="box-body">
          <div class="chart">
              <canvas id="barChart1T" style="height:230px"></canvas>
          </div>
          </div>

      </div>
    
    </div>

    <div class="col-md-4">  
        
        <!-- DONUT CHART -->
        <div class="box box-danger">
        
            <div class="box-header with-border">
            
            <h3 class="box-title">% Población / Total: <?php echo $totalAnimalesT;?> Animales</h3>

            </div>
            
            <div class="box-body">

                <canvas id="pieChart1T" style="height:150px"></canvas>

            </div>
        
        </div>

    </div>

</div>
<div class="saltopagina"></div>
<div class="row">

      <div class="col-md-4">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Kg Ingreso</h3>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart2T" style="height:230px"></canvas>
            </div>
          </div>

        </div>
        

      </div>

      <div class="col-md-4">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Kg Salida</h3>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart3T" style="height:230px"></canvas>
            </div>
          </div>

        </div>
        

      </div>

      <div class="col-md-4">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Kg Produc.</h3>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart4T" style="height:230px"></canvas>
            </div>
          </div>

        </div>
        

      </div>

</div>
<!-- <div class="row">
      
    <div class="col-md-4">  
    -->
        <!-- DONUT CHART -->
    <!--    <div class="box box-danger">
        
            <div class="box-header with-border">
            
            <h3 class="box-title">Población según Sexo</h3>


            </div>
            
            <div class="box-body">

                <canvas id="pieChartT" style="height:100px"></canvas>
              
            </div>
        
        </div>

    </div>

          

</div> -->


<script>

var configPSST = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
					<?php

					$resultado = $totalMachos[0].",".$totalHembras[0].",";
					echo $resultado;

					?>
					],
					backgroundColor: [
					window.chartColors.red,
					window.chartColors.orange,
					],
					label: 'Sexo'
				}],
				labels: [
				'Macho',
				'Hembra'
				]
			},
			options: {
				responsive: true,
				title: {
					display: false,
                },
                labels:{
                    render:'value',
                    fontSize: 14,
                    fontStyle: 'bold',
                    fontColor: '#000',
                    fontFamily: '"Lucida Console", Monaco, monospace'
                },
                plugins:{
                    labels:{
                        render: 'value'
                    }
                }

			}
};

var configPPT = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
                        <?php 
                        echo $totalAnimalesT.",".$restoAnimales.",";
                        ?>
					],
					backgroundColor: [
					window.chartColors.red,
					window.chartColors.orange,
					],
					label: 'value'
				}],
				labels: [
                    'Población T','Resto Población'
				]
			},
			options: {
				responsive: true,
				title: {
					display: false,
				}

			}
};

var color = Chart.helpers.color;

var configADPVT = {
  labels: [
    'Prom. Adpv'
  ],
  datasets: [{
    label: 'Kg. Prom',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1, 

    data: [
    <?php
    echo $promedioAdpvT;
    ?>
    ]
  }]

};

var configDiasT = {
  labels: [
    'Prom. Dias'
  ],
  datasets: [{
    label: 'Dias Prom.',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1, 

    data: [
    <?php
    echo $promedioDiasT;
    ?>
    ]
  }]

};


var configKgIngT = {
  labels: [
    'Kg Ingreso Prom.'
  ],
  datasets: [{
    label: 'Kg Ingreso Prom.',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1, 

    data: [
    <?php
    echo $promedioKgIngT;
    ?>
    ]
  }]

};

var configKgEgrT = {
  labels: [
    'Kg Salida Prom.'
  ],
  datasets: [{
    label: 'Kg Salida Prom.',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1, 

    data: [
    <?php
    echo $promedioKgEgrT;
    ?>
    ]
  }]

};

var configKgProdT = {
  labels: [
    'Kg Produc. Promedio'
  ],
  datasets: [{
    label: 'Kg Produc. Promedio',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1, 

    data: [
    <?php
    echo $promedioKgProdT;
    ?>
    ]
  }]

};



</script>
