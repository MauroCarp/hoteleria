<?php
require_once "../controladores/datos.controlador.php";
require_once "../modelos/datos.modelo.php";

$rango = explode('/',$_POST['rango']);

$fechaInicial = $rango[0];

$fechaFinal = $rango[1];

$kgInicial = $_POST['kgInicial'];

$kgFinal = $_POST['kgFinal'];

$respuesta = array();

$item = null;

$valor = null;

$item2 = 'kgSalidaCC';

$item3 = 'fechaSalida';


// CANTIDAD TOTAL DE ANIMALES

$cantidadAnimales = ControladorDatos::ctrContarAnimalesRango($item, $valor,$item3,$fechaInicial,$fechaFinal);

$cantidadAnimalesTotal = $cantidadAnimales[0][0];

// CANTIDAD ANIMALES

$cantidadAnimales = ControladorDatos::ctrContarAnimalesRangoDoble($item, $valor,$item2,$kgInicial,$kgFinal,$item3,$fechaInicial,$fechaFinal);

$cantidadAnimales = $cantidadAnimales[0][0];

$respuesta['cantidadAnimales'] = $cantidadAnimales;

// ESTADIA

$campo = 'diasCC';

$cantidadDias = ControladorDatos::ctrSumarCampoRangoDoble($item,$valor,$campo,$item2,$kgInicial,$kgFinal,$item3,$fechaInicial,$fechaFinal);

$cantidadDias = $cantidadDias[0][0];

$promedioDias = $cantidadDias / $cantidadAnimales;

$respuesta['estadia'] = $promedioDias;

// ADPV

$campo = 'adpvCC';

$adpv = ControladorDatos::ctrSumarCampoRangoDoble($item, $valor,$campo,$item2,$kgInicial,$kgFinal,$item3,$fechaInicial,$fechaFinal);

$adpv = $adpv[0][0];

$adpvPromedio = $adpv / $cantidadAnimales;

$respuesta['adpv'] = $adpvPromedio;

// PARTICIPACION

$participacion = ($cantidadAnimales * 100) / $cantidadAnimalesTotal;

$respuesta['participacion'] = $participacion;

$respuestaJSON = json_encode($respuesta);

print_r($respuestaJSON);

?>