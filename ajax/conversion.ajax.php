<?php
require_once "../controladores/conversion.controlador.php";
require_once "../modelos/conversion.modelo.php";

class dataGraficos{
    
    public $anio;
    
    public function mostrarDataGraficos(){
        
        $item = 'anio';

        $valor = $this->anio;
        
        $datos = ControladorConversion::ctrMostrarDatos($item, $valor);

        echo json_encode($datos);
    }

}

/*=============================================
DATA GRAFICOS ANUAL
=============================================*/ 

$dataGraficos = new dataGraficos();
$dataGraficos -> anio = $_POST["anio"];
$dataGraficos -> mostrarDataGraficos();



?>