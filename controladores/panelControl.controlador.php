<?php
class ControladorPanelControl{

	/*=============================================
	MOSTRAR DATOS CAJAS
	=============================================*/

	static public function ctrMostrarDatosCajas($campo, $item, $valor){

		$tabla = "controlpanel";

		$respuesta = ModeloPanelControl::MdlMostrarDatosCajas($tabla,$campo, $item, $valor);

		return $respuesta;

	}
	
	static public function ctrMostrarUltimos($campo,$cantidad){

		$tabla = "controlpanel";

		$respuesta = ModeloPanelControl::MdlMostrarUltimos($tabla,$campo,$cantidad);

		return $respuesta;

	}
	
	static public function ctrMostrarDato($campo,$item,$valor){

		$tabla = "controlpanel";

		$respuesta = ModeloPanelControl::MdlMostrarDato($tabla,$campo,$item,$valor);

		return $respuesta;

	}

	static public function ctrChequear($campo,$condition){

		$tabla = "controlpanel";

		$respuesta = ModeloPanelControl::MdlChequear($tabla,$campo,$condition);

		return $respuesta;

	}

	static public function ctrMostrarDataPorAnio($item,$valor){
		
		$tabla = 'controlpanel';

		$respuesta = ModeloPanelControl::mdlMostrarDataPorAnio($tabla,$item,$valor);

		$datos = array('precioKgMS'=>array(),
								'conversionMS'=>array(),
								'adpv'=>array(),
								'poblacionProm'=>array(),
								'estadiaProm'=>array(),
								'indiceReposicion'=>array(),
							);
		for ($i=0; $i <sizeof($respuesta) ; $i++) { 
	
			$arrayIndex = substr($respuesta[$i]['periodo'],5);

			$arrayIndex = ($arrayIndex < 10) ? substr($arrayIndex,1) : $arrayIndex ;

			$datos['precioKgMS'][$arrayIndex] =  $respuesta[$i]['CKgRacPromMS'];
			$datos['conversionMS'][$arrayIndex] =  $respuesta[$i]['converMSEstADPV'];
			$datos['adpv'][$arrayIndex] =  $respuesta[$i]['converMSEstADPV'];
			$datos['poblacionProm'][$arrayIndex] =  $respuesta[$i]['poblDiaPromPeriodo'];
			$datos['estadiaProm'][$arrayIndex] =  $respuesta[$i]['estadiaProm'];
			$datos['indiceReposicion'][$arrayIndex] =  $respuesta[$i]['indiceReposicion'];

		}

		return $datos;
	}
	
}

