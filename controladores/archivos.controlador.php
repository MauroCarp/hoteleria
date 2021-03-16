<?php

class ControladorArchivos{

	/*=============================================
	MOSTRAR ARCHIVOS
	=============================================*/

	static public function ctrMostrarArchivos($item, $valor,$tabla){

		$respuesta = ModeloArchivos::MdlMostrarArchivos($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	BORRAR ARCHIVOS
	=============================================*/

	static public function ctrBorrarArchivos(){

		if(isset($_GET["nombreArchivo"])){

			$tabla = $_GET['tabla'];
			$datos = $_GET["nombreArchivo"];

			$respuesta = ModeloArchivos ::mdlBorrarArchivo($tabla, $datos);
			var_dump($respuesta);
			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Los registros han sido borrados correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "archivosCarga";

								}
							})

				</script>';

			}		

		}

	}


}
	


