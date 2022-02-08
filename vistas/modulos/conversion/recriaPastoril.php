<div class="row">

    <!-- KG ING -->
      
    <div class="col-md-4">
      
        <div class="box box-success">
      
            <div class="box-header with-border">
        
            <h3 class="box-title">Kg Ingreso</h3>
        
            </div>
      
            <div class="box-body">
      
                <div class="chart">
            
                    <canvas id="kgIngChartRP<?php echo $mes;?>" style="height:230px"></canvas>
            
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

                    <canvas id="kgEgrChartRP<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="kgProdChartRP<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="adpvChartRP<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="diasChartRP<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="conversionChartRP<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>
      
      </div>

    </div> 

</div>

<script>

    // DIAS

        data = [Math.round(<?php echo $value['diasRP'];?>)];
        
        label = ['Prom. Dias'];

        label2 = 'Dias';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'diasChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // ADPV

        data = [ <?php echo $value['adpvRP'];?> ];

        label = ['Prom. Adpv'];

        label2 = 'Kg';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'adpvChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // KG ING

        data = [<?php echo $value['kgIngRP'];?>];
    
        label = ['Prom. Kg Ingreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgIngChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG EGR

        data = [<?php echo $value['kgEgrRP'];?>];
    
        label = ['Prom. Kg Egreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgEgrChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG PROD

        data = [<?php echo $value['kgProdRP'];?>];
            
        label = ['Prom. Kg Produc.'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgProdChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // CONVERCION

        data = [<?php echo $value['convMsRP'];?>];
            
        label = ['Conversion MS'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'conversionChartRP' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

</script>
