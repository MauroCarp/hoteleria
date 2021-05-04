<div class="row">

    <div class="col-md-4">

        <div class="box box-success">
                
            <div class="box-header with-border">
            
                <i class="fa fa-dollar"></i>

                <h3 class="box-title">Datos Poblacionales</h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            
                <table class="table table-striped" id="datosPoblacionales<?php echo $i + 1;?>">
                    
                
                </table>
            
            </div>
            
        </div>

    </div>

    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Poblaci&oacute;n Diaria Promedio</h3>

            </div>
        

            <div class="box-body">

                <div class="chart">

                    <canvas id="graficoPoblacion<?php echo $i + 1;?>"></canvas>

                </div>

            </div>

        </div>

    </div>
 
    <div class="col-md-4">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Estadia Promedio</h3>

            </div>
        

            <div class="box-body">

                <div class="chart">

                    <canvas id="graficoEstadia<?php echo $i + 1;?>"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>
