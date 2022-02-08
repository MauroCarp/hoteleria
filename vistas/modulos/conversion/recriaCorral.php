<div class="row">

    <!-- KG ING -->
      
    <div class="col-md-4">
      
        <div class="box box-success">
      
            <div class="box-header with-border">
        
            <h3 class="box-title">Kg Ingreso</h3>
        
            </div>
      
            <div class="box-body">
      
                <div class="chart">
            
                    <canvas id="kgIngChartRC<?php echo $mes;?>" style="height:230px"></canvas>
            
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

                    <canvas id="kgEgrChartRC<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="kgProdChartRC<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="adpvChartRC<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="diasChartRC<?php echo $mes;?>" style="height:230px"></canvas>

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

                    <canvas id="conversionChartRC<?php echo $mes;?>" style="height:230px"></canvas>

                </div>

            </div>
      
      </div>

    </div> 

</div>

<script>

    // DIAS

        data = [(<?php echo $value['diasRC'];?>)];
        
        label = ['Prom. Dias'];

        label2 = 'Dias';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'diasChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // ADPV

        data = [ <?php echo $value['adpvRC'];?> ];

        label = ['Prom. Adpv'];

        label2 = 'Kg';

        config = generarConfigBarChart(label,data,label2);

        idChart = 'adpvChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // KG ING

        data = [<?php echo $value['kgIngRC'];?>];
    
        label = ['Prom. Kg Ingreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgIngChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG EGR

        data = [<?php echo $value['kgEgrRC'];?>];
    
        label = ['Prom. Kg Egreso'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgEgrChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


    // KG PROD

        data = [<?php echo $value['kgProdRC'];?>];
            
        label = ['Prom. Kg Produc.'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'kgProdChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)

    // CONVERCION

        data = [<?php echo $value['convMsRC'];?>];
            
        label = ['Conversion MS'];

        config = generarConfigBarChart(label,data,label2);

        idChart = 'conversionChartRC' + <?php echo $mes?> 

        generarChartResumen(idChart,config)


</script>
