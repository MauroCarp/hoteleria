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
	
	
}

