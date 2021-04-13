<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

 
  
}
   
function formatearFecha($fecha){

  $fecha = explode('-',$fecha);

  $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

  return $fecha;
}

include 'ajax/datosReporteMuertesRango.ajax.php';

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reportes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes</li>
    
    </ol>

  </section>
  
  
  <div class="box">
   
    <section class="content" style="padding-top:0;">
          <?php
          
            if($totalMacho == 0 AND $totalHembra == 0){

                echo "<br>
                <div class='row'>
                  
                  <div class='col-md-9'>

                    <div class='info-box' style='padding-bottom:20px;padding-left:10px;padding-top:10px;box-shadow:0px 0px 15px 5px rgba(0, 0, 0, 0.2);'>
                      
                      <span class='info-box-icon bg-info' style='border-radius:10px;background-color:#dc3545;'>
                        
                        <i class='fa fa-times' style='color:white'></i>
                      
                      </span>

                      <div class='info-box-content'>
                        
                        <h1>No se encontraron registros que coincidan con el rango de fechas buscado.</h1>

                      </div>
                    
                      </div>
                    
                    </div>
                  
                  </div>

                </div>
                </div>";

                return;
            }
          
          ?>
          <!-- // FILTROS -->
          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="btn-filtrosMuertes" data-toggle="modal" data-target="#modalFiltros">

            <b>Filtros </b><i class="fa fa-filter" style="color:#3c8dbc;font-size:1.2em;"></i>

          </button>

          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="btn-muertesMes" data-toggle="modal" data-target="#modalMuertesMeses">

            <b>Distribuci&oacute;n Mensual de Muertes </b><i class="icon-muerteIco" style="color:#3c8dbc;font-size:1.2em;"></i>

          </button>

          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="btn-muertesTratadas" data-toggle="modal" data-target="#modalMuertesTratadas">

            <b>Distribuci&oacute;n Muertes Tratadas &nbsp;</b><i class="fa fa-plus-square" style="color:#d834eb;font-size:1.2em;"></i>

          </button>

          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="imprimirMuertesGeneralRango">

            <b>Imprimir Reporte &nbsp </b><i class="fa fa-print" style="color:#3c8dbc;font-size:1.2em;"></i>

          </button>

          <b><?php echo "Rango de Fechas: ".formatearFecha($fechaInicial)." / ".formatearFecha($fechaFinal); ?></b>

          <div class="row">

                <div class="col-md-12" id="reportesMuertes">

                  <?php include 'muertesRango.php'; ?>

                </div>

          </div>

    </section>

  </div>

</div>

<!--=====================================
MODAL FILTROS
======================================-->

<div id="modalFiltros" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Filtros de reportes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Filtros -->

            
            <div class="box-header with-border" id="filtros">
            
              <div class="input-group">
                
                <div class="row">

                  <div class="col-md-8">
                    <label>Rango de Fechas</label>

                    <button type="button" class="btn btn-default" id="daterange-btnMuertes">
                    
                      <span>
                        <i class="fa fa-calendar"></i> 
                          Rango de Fecha
                      </span>

                      <i class="fa fa-caret-down"></i>

                    </button>

                  </div>

                </div>

              </div>
              <br>
              <div class="row">
                
                <div class="col-md-4">

                  <div class="form-group">
                    <label>Consignatario</label>
                    <select class="form-control consignatarios" name="consignatario1" id="consignatario1" onchange=(generarProveedores(this.id,'muertes'))>
                      <option value='Consignatario'>Consignatario</option>";

                    <?php
                      $item = null;
                      $valor = null;
                      $variable = 'consignatario';
                      $consignatarios = ControladorDatosMuertes::ctrMostrarTropas($variable,$item,$valor);
                      asort($consignatarios);
                      foreach ($consignatarios as $key => $value) {
                      echo "<option value='".utf8_decode($value[0])."'>".utf8_decode($value[0])."</option>";
                      }
                    ?>
                    </select>

                  </div>

                </div>

                  <div class="col-md-4">

                    <div class="form-group">
                      <label>Proveedor</label>
                      <select class="form-control proveedores" name="proveedor1" id="proveedor1" onchange=(generarTropas(this.id,'muertes'))>
                      <option value='Proveedor'>Proveedor</option>";
                        <?php
                          
                          $item = null;
                          $valor = null;
                          $variable = 'proveedor';
                          $proveedores = ControladorDatosMuertes::ctrMostrarTropas($variable,$item,$valor);
                          asort($proveedores);
                          foreach ($proveedores as $key => $value) {
                          echo "<option value='".$value[0]."'>".$value[0]."</option>";
                          }
                          
                        ?>
                      </select>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">
                      <label>Tropa</label>
                      <select class="form-control tropas" name="tropa1" id="tropa1" onchange=(bloquearProveedor(this.id))>
                      <option value='Tropa'>Tropa</option>";
                        <?php
                          
                          $item = null;
                          $valor = null;
                          $variable = 'tropa';
                          $tropas = ControladorDatosMuertes::ctrMostrarTropas($variable,$item,$valor);
                          asort($tropas);
                          foreach ($tropas as $key => $value) {
                          echo "<option value='".$value[0]."'>".$value[0]."</option>";
                          }
                          
                        ?>
                      </select>

                    </div>

                  </div>

              </div>

              <div class="row" id="btn-plus">
                <div class="col-md-1">
                  <button type="button" class="btn btn-info" id="comparar"><i class="fa fa-plus"></i></button>
                </div>
              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="generarReporteMuertes">Generar Reporte</button>

        </div>

    </div>

  </div>

</div>
 

<!--=====================================
MODAL GRAFICO DISTRIBUCION MUERTES
======================================-->

<div id="modalMuertesMeses" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width:70%;">

    <div class="modal-content">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Distribuci&oacute;n Mensual de Muertes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Filtros -->

            
            <div class="box-header with-border" id="graficoMuertesMeses">
                   
              <div class="box box-success">

                <div class="box-header with-border">

                  <h3 class="box-title">Distribución Mensual de Muertes General</h3>

                </div>

                <div class="box-body">

                  <div class="chart">

                    <canvas id="muertesMesGeneral" style="height:100%"></canvas>

                  </div>

                </div>

                </div>

              </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL GRAFICO  MUERTES TRATADAS
======================================-->

<div id="modalMuertesTratadas" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width:70%;">

    <div class="modal-content">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Distribuci&oacute;n de Muertes Tratadas</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Filtros -->

            
            <div class="box-header with-border" id="graficoMuertesMeses">
                   
              <div class="box box-success">

                <div class="box-header with-border">

                  <h3 class="box-title">Distribución de Muertes Tratadas General</h3>

                </div>

                <div class="box-body">

                  <div class="chart">

                    <canvas id="muertesTratadasGeneral" style="height:100%"></canvas>

                  </div>

                </div>

                </div>

              </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>


<script>
  $(function () {
    

    var tropas = [];
    <?php 
      foreach ($tropas as $key => $value) {
    ?>
    tropas.push(<?php echo "'".$value[0]."'";?>);
    <?php
      }
    ?>

    localStorage.setItem("tropas", tropas);

    var proveedores = [];
    <?php 
      foreach ($proveedores as $key => $value) {
    ?>
    proveedores.push(<?php echo "'".$value[0]."'";?>);
    <?php
      }
    ?>

   localStorage.setItem("proveedores", proveedores);


   var consignatarios = [];
    <?php 
      foreach ($consignatarios as $key => $value) {
    ?>
    consignatarios.push(<?php echo "'".$value[0]."'";?>);
    <?php
      }
    ?>

   localStorage.setItem("consignatarios", consignatarios);

      generarGraficoPie('muertesMotivo',configMuertesCausa);
      
      generarGraficoPie('porcentajeMotivo',configPorcentajeMuertesCausa);
        
      generarGraficoPie('muertesSexo',configMuertesSexo);
    
      generarGraficoBar('muertesConsignatario',confMuertesConsignatario,'atZero');
    
      generarGraficoBar('muertesProveedor',confMuertesProveedor,'skipFalse');

      
      var datos = <?php echo $datosJson;?>;
      
      var dataSet = datos['muertesMesesGeneral'];
      dataSet.shift();        
      
      var labelsMeses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

      var id = 'muertesMesGeneral';
      
      var valor = 'value';
      
      var colorChart = '#ff6b6b';
     
      graficoChart(dataSet,labelsMeses,id,valor,colorChart);

 
      var muertesTratadas = <?php echo $muertesTratadasJson;?>;
      
      muertesTratadas[0].shift();

      muertesTratadas[1].shift();
      
      colorChart = ['#ff6b6b','#f06bff'];

      var id = 'muertesTratadasGeneral';
      
      var etiqueta = ['','No Tratados','Tratados'];
      
      cantidad = 2;

      graficoChartStack(muertesTratadas,labelsMeses,etiqueta,id,valor,colorChart,cantidad);



  })
</script> 
