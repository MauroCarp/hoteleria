<?php
function formatearFecha($fecha){
	$fecha = explode('-',$fecha);
	$nuevaFecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
	return $nuevaFecha;
}

$rango = explode('/',$_GET['rango']);

$fechaInicial = $rango[0];

$fechaFinal = $rango[1];

$item = null;

$valor = null;

$item2 = 'fechaSalida';

$cantidadAnimales = ControladorDatos::ctrContarAnimalesRango($item, $valor,$item2,$fechaInicial,$fechaFinal);

$cantidadAnimales = $cantidadAnimales[0][0];

$campo = 'diasCC';

$cantidadDias = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fechaInicial,$fechaFinal);

$cantidadDias = $cantidadDias[0][0];

$promedioDias = $cantidadDias / $cantidadAnimales;

$campo = 'adpvCC';

$adpv = ControladorDatos::ctrSumarCampoRango($item, $valor,$campo,$item2,$fechaInicial,$fechaFinal);

$adpv = $adpv[0][0];

$adpvPromedio = $adpv / $cantidadAnimales;


$campo = 'MAX(kgSalidaCC)';

$pesoMaximo = ControladorDatos::ctrMostrarDatosRango($campo, $item, $valor,$item2,$fechaInicial,$fechaFinal);

$pesoMaximo = $pesoMaximo[0][0];

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

  </section>

  <section class="content">
    
    <div class="row">

      <div class="col-md-4">
    
          <div class="col-md-4">
            
            <div class="form-group has-feedback">
    
              <label class="control-label" for="desde">Desde</label>
    
              <div class="input-group">
    
                <input type="number" class="form-control data-number" style="padding-right:10px;font-weight:bold;font-size:2em;" id="desde" value="0">
    
                <span class="input-group-addon"><b> Kg </b></span>
    
              </div>   
    
            </div>

          </div>
            
          <div class="col-md-4">

            <div class="form-group has-feedback">
    
              <label class="control-label" for="hasta">Hasta</label>

              <div class="input-group">

                <input type="number" class="form-control data-number" style="padding-right:10px;font-weight:bold;font-size:2em;" id="hasta" value="<?php echo $pesoMaximo;?>">

                <span class="input-group-addon"><b> Kg </b></span>

              </div>   

            </div>
                        
          </div>
          
          <div class="col-md-4">
            
            <div class="form-group has-feedback">
              
              <label class="control-label" for="ver">&nbsp</label>

              <div class="input-group">

                <input type="submit" class="form-control btn btn-primary data-ver" id="ver" value="Ver">

                <span class="input-group-addon"><b><i class="fa fa-eye"></i></b></span>

              </div>   

            </div>
                      
          </div>
                  
      </div>  

      <div class="col-md-4">
      
        <div class="form-group has-feedback">
    
          <label class="control-label">Periodo</label>

          <div class="input-group">

            <b style="font-size:1.7em;color:rgb(100,150,200)"><?php echo formatearFecha($fechaInicial).' / '.formatearFecha($fechaFinal);?></b>

          </div>   

        </div>

      </div>    

    </div>

  <br>

    <div class="row">

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow">
          
          <div class="inner" id="panelCantidad">
            
            <h3><?php echo $cantidadAnimales;?></h3>

            <h3>Cant. Animales<h3>
          
          </div>
          
          <div class="icon" style="padding-top:10px;">
            
          <i class="icon-COW"></i>
          
          </div>

        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua">
          
          <div class="inner">
          
            <h3><span id="panelAdpv"><?php echo number_format($adpvPromedio,2);?></span> Kg</h3>

            <h3>ADPV</h3>
          
          </div>
          <div class="icon">
          
          <i class="fa fa-arrow-up"></i></i>
          
          </div>
          
        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green">
          
          <div class="inner">
            
            <h3><span id="panelEstadia"><?php echo round($promedioDias);?></span> D&iacute;as</h3>
            
            <h3>Estadia</h3>
        
          </div>
          
          <div class="icon" style="padding-top:10px;">
          
          <i class="icon-corral"></i>
          
          </div>
          
        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow">
          
          <div class="inner">
          
            <h3><span id="panelParticipacion">100</span> %</h3>

            <h3>Participaci&oacute;n</h3>
        
          </div>
          
          <div class="icon">
          
          <i class="fa fa-percent"></i>
          
          </div>

        </div>

      </div>

  </section>

  <div class="row">

    <div class="col-md-12" id="reportesGeneral">

      <div class="nav-tabs-custom">

        <ul class="nav nav-tabs" style="font-size:1.em;">

          <li class="tabs active"><a href="#tab_1" id="consumos" data-toggle="tab"><b>Consumos</b></a></li>

          <li class="tabs" id="poblacion"><a href="#tab_2" data-toggle="tab"><b>Poblacion</b></a></li>

          <li class="tabs" id="produccion"><a href="#tab_3" data-toggle="tab"><b>Producci&oacute;n</b></a></li>

        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="consumos">
            <h1>Consumos</h1>
            <?php ////include('reportes/cicloCompleto.php'); ?>
          
          </div>

          <div class="tab-pane poblacion" id="tab_2">

            <h1>poblacion</h1>
          <?php //include('reportes/recriaPastoril.php'); ?>

          </div>

          <div class="tab-pane produccion" id="tab_3">

            <h1>produccion</h1>
          <?php //include('reportes/recriaCorral.php'); ?>

          </div>

        </div>

      </div>

    </div>
  
  </div>
</div>

