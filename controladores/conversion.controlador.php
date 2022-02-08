<?php
class ControladorConversion{

	/*=============================================
	MOSTRAR DATOS
	=============================================*/

	static public function ctrMostrarDatos($item, $valor){

		$tabla = "conversion";

		$respuesta = ModeloConversion::mdlMostrarDatos($tabla, $item, $valor);

		return $respuesta;

	}



}
	


