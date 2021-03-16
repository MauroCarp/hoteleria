<?php

require_once "conexion.php";

class ModeloArchivos{

	/*=============================================
	MOSTRAR ARCHIVOS
	=============================================*/

	static public function mdlMostrarArchivos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT(archivo) FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT(archivo) FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	BORRAR ARCHIVO
	=============================================*/

	static public function mdlBorrarArchivo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE archivo = :nombreArchivo");

		$stmt -> bindParam(":nombreArchivo", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}