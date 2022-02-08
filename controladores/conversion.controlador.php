<?php
class ControladorConversion{

	/*=============================================
	MOSTRAR DATOS
	=============================================*/

	static public function ctrMostrarDatos($item, $valor,$orden){

		$tabla = "compras";

		$respuesta = ModeloDatos::MdlMostrarDatos($tabla, $item, $valor,$orden);

		return $respuesta;
	}



}
	


