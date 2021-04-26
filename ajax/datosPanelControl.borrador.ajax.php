<?php
require_once "../controladores/panelControl.controlador.php";

require_once "../modelos/panelControl.modelo.php";

$periodos = explode('/',$_POST['periodos']);

$meses = Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$accion = $_POST['accion'];

if ($accion == 'estructura') {
    
    $dataPeriodos = array();

    $dataPeriodos[0]['Cantidad'] = sizeof($periodos);

    for ($i=0; $i < sizeof($periodos); $i++) { 
        
        $item = 'periodo';
        
        $valor = $periodos[$i];
        
        $campo = 'poblDiaPromPeriodo';

        $poblacion = ControladorPanelControl::ctrMostrarDatosCajas($campo,$item,$valor);

        $dataPeriodos[$i+1]['Poblacion'] = $poblacion[0];

        $campo = 'converMSEstADPV';

        $conversion = ControladorPanelControl::ctrMostrarDatosCajas($campo,$item,$valor);

        $dataPeriodos[$i+1]['Conversion'] = $conversion[0];
        
        $campo = 'adpvGanDiaPeriodo';

        $adpv = ControladorPanelControl::ctrMostrarDatosCajas($campo,$item,$valor);

        $dataPeriodos[$i+1]['Adpv'] = $adpv[0];
        
        $campo = 'CProdKgAES';

        $costoKgProd = ControladorPanelControl::ctrMostrarDatosCajas($campo,$item,$valor);

        $dataPeriodos[$i+1]['CostoKgProd'] = $costoKgProd[0];
        
        $campo = 'estadiaProm';

        $estadia = ControladorPanelControl::ctrMostrarDatosCajas($campo,$item,$valor);

        $dataPeriodos[$i+1]['Estadia'] = $estadia[0];

    }
    echo json_encode($dataPeriodos);
}

if ($accion == 'graficos') {
    
    $dataGraficos = array();

    $dataGraficos[0]['Cantidad'] = sizeof($periodos);

    $cantidad = 6;

    $campo = 'periodo';

    $ultimosLabels = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

    // CONVERSION

    $campo = 'converMSEstADPV';
    
    $ultimosDatos = ControladorPanelControl::ctrMostrarUltimos($campo,$cantidad);

    $data = array();

    $labels = array();

    for ($i=0; $i < sizeof($ultimosLabels) ; $i++) { 
        
        $tempExp = explode('-',$ultimosLabels[$i][0]);

        $temp = number_format($tempExp[1]);

        $temp = $meses[$temp - 1];

        $labels[] = $temp." ".$tempExp[0]; 

        $data[] = number_format($ultimosDatos[$i][0],2);

    }
    
    for ($i=0; $i < sizeof($periodos)  ; $i++) { 
        

        $item = 'periodo';

        // CONVERSION
        $campo = 'converMSEstADPV';

        $valor = $periodos[$i];
        
        $conversion = ControladorPanelControl::ctrMostrarDato($campo,$item,$valor);
        
        if($conversion[0] != null){
            
            $dataGraficos['Labels'][$i] = $labels;

            $tempExp = explode('-',$periodos[$i]);

            $temp = number_format($tempExp[1]);

            $temp = $meses[$temp - 1];

            $dataGraficos['Labels'][$i][] = $temp." ".$tempExp[0]; ;

            $dataGraficos['Data'][$i] = $data;
    
            $dataGraficos['Data'][$i][] = number_format($conversion[0],2);

        }

    }

    echo json_encode($dataGraficos);


}
?>