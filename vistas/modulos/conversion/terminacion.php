<div class="row">

    <!-- KG ING -->
      
    <div class="col-md-4">
      
        <div class="box box-success">
      
            <div class="box-header with-border">
        
            <h3 class="box-title">Kg Ingreso</h3>
        
            </div>
      
            <div class="box-body">
      
                <div class="chart">
            
                    <canvas id="kgIngChartT<?php echo $mes;?>" style="height:230px"></canvas>
            
                </div>
      
            </div>

        </div>
        
    </div>

    <!-- KG EGR -->

    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Kg Salida</h3>

            </div>

            <div class="box-body">

                <div class="chart">

                    <canvas id="kgEgrChartT<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>

        </div>
       
    </div>

    <!-- KG PROD -->
    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Kg Produc.</h3>

            </div>

            <div class="box-body">

                <div class="chart">

                    <canvas id="kgProdChartT<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>

        </div>
        
    </div>

</div>

<div class="row">
    
    <!-- ADPV -->
    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">ADPV</h3>

            </div>

            <div class="box-body">

                <div class="chart">

                    <canvas id="adpvChartT<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>

        </div>

    </div>

    <!-- DIAS -->
    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Días</h3>

            </div>

            <div class="box-body">

                <div class="chart">

                    <canvas id="diasChartT<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>

        </div>

    </div>

    <!-- CONVERSION -->
    <div class="col-md-4">  
    
      <div class="box box-success">
      
          <div class="box-header with-border">
          
            <h3 class="box-title">Conversi&oacute;n</h3>

          </div>
          
            <div class="box-body">

                <div class="chart">

                    <canvas id="conversionChartT<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>
      
      </div>

    </div> 

</div>

<script>

    // DIAS

        data = [Math.round(<?php echo $value['diasT'];?>)];
        
        label = ['Prom. Dias'];

        label2 = 'Dias';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'diasChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // ADPV

        data = [ <?php echo $value['adpvT'];?> ];

        label = ['Prom. Adpv'];

        label2 = 'Kg';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'adpvChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // KG ING

        data = [<?php echo $value['kgIngT'];?>];
    
        label = ['Prom. Kg Ingreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgIngChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG EGR

        data = [<?php echo $value['kgEgrT'];?>];
    
        label = ['Prom. Kg Egreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgEgrChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG PROD

        data = [<?php echo $value['kgProdT'];?>];
            
        label = ['Prom. Kg Produc.'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgProdChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // CONVERCION

        data = [<?php echo $value['convMsT'];?>];
        
        label = ['Conversion MS'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'conversionChartT' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

</script>
