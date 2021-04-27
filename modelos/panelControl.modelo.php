<?php

require_once "conexion.php";

class ModeloPanelControl{

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
	
	/*=============================================
	MOSTRAR ULTIMOS 6
	=============================================*/

	static public function mdlMostrarUltimos($tabla,$campo,$cantidad){

		$stmt = Conexion::conectar()->prepare("SELECT $campo FROM $tabla ORDER BY periodoTime ASC LIMIT $cantidad");

		$stmt -> execute();

		return $stmt -> fetchAll();
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR DATOS
	=============================================*/

	static public function MdlMostrarDato($tabla,$campo,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT $campo FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			
			return $stmt -> fetch();

	}

	

}