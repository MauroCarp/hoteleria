<?php
require_once "../controladores/conversion.controlador.php";
require_once "../modelos/conversion.modelo.php";

function formatearFecha($fecha){

    $fecha = explode('-',$fecha);

    $nuevaFecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

    return $nuevaFecha;

}

class tablaModal{
    
    public $tropa;
    
    public function mostrarTablaModal(){
        
        $item = 'tropa';
        $valor = $this->tropa;
        $orden = 'fechaSalida';
        $datos = ControladorDatos::ctrMostrardatosTabla($item, $valor,$orden);

    }

}

/*=============================================
ACTIVAR TABLA DE MODAL
=============================================*/ 
$activarModal = new TablaModal();
$activarModal -> tropa = $_POST["tropa"];
$activarModal -> mostrarTablaModal();



?>