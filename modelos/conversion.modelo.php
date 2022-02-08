<?php

require_once "conexion.php";

class ModeloConversion{

	/*=============================================
	MOSTRAR Datos
	=============================================*/

	static public function mdlMostrarDatosCajas($tabla,$campo, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT $campo FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			
			return $stmt -> fetch();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT $campo FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

}