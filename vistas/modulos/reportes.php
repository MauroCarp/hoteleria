<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

 
  
}
   

?>
<div class="content-wrapper">
  
  <div class="box">
   
    <section class="content" style="padding-top:0;">

          <!-- // FILTROS -->
          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="btn-filtros" data-toggle="modal" data-target="#modalFiltros">
            <b>Filtros </b><i class="fa fa-filter" style="color:#3c8dbc;font-size:1.2em;"></i>
          </button>

          <button class="btn btn-secondary" style="margin-top:10px;margin-bottom:10px;" id="imprimirVentasGeneral">
                  <b>Imprimir Reporte &nbsp </b><i class="fa fa-print" style="color:#3c8dbc;font-size:1.2em;"></i>
          </button>

          <div class="row">

                <div class="col-md-12" id="reportesGeneral">

                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" style="font-size:1.em;">
                      <li class="tabs active"><a href="#tab_1" data-toggle="tab">Ciclo Completo</a></li>
                      <li class="tabs" id="recriaPastoril"><a href="#tab_2" data-toggle="tab">Recr&iacute;a Pastoril</a></li>
                      <li class="tabs" id="recriaCorral"><a href="#tab_3" data-toggle="tab">Recr&iacute;a Corral</a></li>
                      <li class="tabs" id="terminacion"><a href="#tab_4" data-toggle="tab">Terminaci&oacute;n</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        
                        <?php include('reportes/cicloCompleto.php'); ?>
                      
                      </div>

                      <div class="tab-pane recriaPastoril" id="tab_2">
                      <?php include('reportes/recriaPastoril.php'); ?>

                      </div>

                      <div class="tab-pane recriaCorral" id="tab_3">
                      <?php include('reportes/recriaCorral.php'); ?>

                      </div>

                      <div class="tab-pane terminacion" id="tab_4">
                      <?php include('reportes/terminacion.php'); ?>

                      </div>

                    </div>

                  </div>

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
                    <label>Rango de Fechas - General -</label>

                    <button type="button" class="btn btn-default" id="daterange-btn">
                    
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
                    <select class="form-control consignatarios" name="consignatario1" id="consignatario1" onchange=(generarProveedores(this.id,'animales'))>
                      <option value='Consignatario'>Consignatario</option>";

                    <?php
                      $item = null;
                      $valor = null;
                      $variable = 'consignatario';
                      $consignatarios = ControladorDatos::ctrMostrarTropas($variable,$item,$valor);
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
                      <select class="form-control proveedores" name="proveedor1" id="proveedor1" onchange=(generarTropas(this.id,'animales'))>
                      <option value='Proveedor'>Proveedor</option>";
                        <?php
                          
                          $item = null;
                          $valor = null;
                          $variable = 'proveedor';
                          $proveedores = ControladorDatos::ctrMostrarTropas($variable,$item,$valor);
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
                          $tropas = ControladorDatos::ctrMostrarTropas($variable,$item,$valor);
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

          <button type="submit" class="btn btn-primary" id="generarReporte">Generar Reporte</button>

        </div>

    </div>

  </div>

</div>
 

<script>
  $(function () {

    var url = window.location;

    if(url.toString().includes('activo')){
      
      var activo = url.toString().split("=");
      activo = activo[1];

      $('.tabs').each(function(){
        
        $(this).removeClass('active');
        
        var id = $(this).attr('id');
        
        if(id == activo){
          
          $(this).addClass('active');
          
        }
        
      });

      $('.tab-pane').each(function(){
        
        $(this).removeClass('active');

        var clase = $(this).attr('class');
        
        if(clase.includes(activo)){
        
          $(this).addClass('active');
        
        }

      });

    }; 

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

       
    // CICLO COMPLETO
      
    generarGraficoBar('barChart',configADPV,'atZero');
    
    generarGraficoBar('barChart1',configDias,null);
    
    generarGraficoPie('pieChart',configPSS);
    
    generarGraficoBar('barChart2',configKgIng,null);
    
    generarGraficoBar('barChart3',configKgEgr,null);
    
    generarGraficoBar('barChart4',configKgProd,null);
    
    ////// RECRIA PASTORIL ///////
    
    generarGraficoBar('barChartRP',configADPVRP,'atZero');
    
    generarGraficoBar('barChart1RP',configDiasRP,null);
    
    generarGraficoPie('pieChart1RP',configPPRP);
    
    generarGraficoBar('barChart4RP',configKgProdRP,null);
      
    ////// RECRIA CORRAL ///////
    
    generarGraficoBar('barChartRC',configADPVRC,'atZero');
    
    generarGraficoBar('barChart1RC',configDiasRC,null);
    
    generarGraficoPie('pieChart1RC',configPPRC);
    
    generarGraficoBar('barChart4RC',configKgProdRC,null);
    
    ////// TERMINACION ///////
    
    generarGraficoBar('barChartT',configADPVT,'atZero');
    
    generarGraficoBar('barChart1T',configDiasT,null);
    
    generarGraficoPie('pieChart1T',configPPT);
    
    generarGraficoBar('barChart4T',configKgProdT,null);


  })
</script> 
