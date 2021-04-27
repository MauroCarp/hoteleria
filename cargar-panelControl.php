<?php
error_reporting(E_ERROR | E_PARSE);

require_once('extensiones/excel/php-excel-reader/excel_reader2.php');
require_once('extensiones/excel/SpreadsheetReader.php');
require_once('modelos/conexion.php');


function fechaExcel($fecha){
	$fechaTemp = explode("-",$fecha);
	$nuevaFecha = $fechaTemp[1]."-".$fechaTemp[0]."-".$fechaTemp[2];
	$standarddate = "20".substr($nuevaFecha,6,2) . "-" . substr($nuevaFecha,3,2) . "-" . substr($nuevaFecha,0,2);
	return $standarddate;
}


if( isset($_FILES["nuevosDatos"]) ){

    
    $error = false;
    
	$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
	if(in_array($_FILES["nuevosDatos"]["type"],$allowedFileType)){
        $ruta = "carga/" . $_FILES['nuevosDatos']['name'];
        
		move_uploaded_file($_FILES['nuevosDatos']['tmp_name'], $ruta);
        
        $nombreArchivo = str_replace(' ', '',$_FILES['nuevosDatos']['name']);

		$rowValida = FALSE;
        
        $rowValidaTemp = FALSE;
        
        $rowNumber = 0;
        
        
        $Reader = new SpreadsheetReader($ruta);	
        
        $sheetCount = count($Reader->sheets());
        
		for($i=0;$i<$sheetCount;$i++){

            $Reader->ChangeSheet($i);
            
				foreach ($Reader as $Row){
                    
                    $rowNumber++;

                    if($rowValida == TRUE){   
                        

                        switch ($rowNumber) {
                            
                            case 9:
                                
                                $CSanCabPeriodo = $Row[1];
                                
                                break;

                            case 13:
                                
                                $CDiaAlimTCCab = $Row[1];
                                
                                break;

                            case 15:
                                
                                $CKgRacPromTC = $Row[1];
                                
                                break;

                            case 16:
                                
                                $CKgRacPromMS = $Row[1];
                                
                                break;

                            case 18:
                                
                                $consumTCPondCab = $Row[1];
                                
                                break;

                            case 19:
                                
                                $consumMSPondCab = $Row[1];
                                
                                break;

                            case 20:
                                
                                $converMSEstADPV = $Row[1];
                                
                                break;

                            case 21:
                                
                                $poblDiaPromPeriodo = $Row[1];
                                
                                break;

                            case 22:
                                
                                $totalCabSalida = $Row[1];
                                
                                break;

                            case 23:
                                
                                $muertosPeriodo = $Row[1];
                                
                                break;

                            case 24:
                                
                                $estadiaProm = $Row[1];
                                
                                break;

                            case 25:
                                
                                $cabTrazSalidas = $Row[1];
                                
                                break;

                            case 27:
                                
                                $pesoPromIngSalTraz = $Row[1];
                                
                                break;

                            case 29:
                                
                                $pesoPromEgrTraz = $Row[1];
                                
                                break;

                            case 31:
                                
                                $kilosGanPeriodoTraz = $Row[1];
                                
                                break;

                            case 32:
                                
                                $adpvGanDiaPeriodo = $Row[1];
                                
                                break;

                            case 33:
                                
                                $totalCabFaenadas = $Row[1];
                                
                                break;

                            case 34:
                                
                                $totalKgCarne = $Row[1];
                                
                                break;

                            case 35:
                                
                                $totalPesosFaena = $Row[1];
                                
                                break;

                            case 36:
                                
                                $rinde = $Row[1];
                                
                                break;

                            case 37:
                                
                                $valorKgObtRinde = $Row[1];
                                
                                break;

                            case 38:
                                
                                $porceDesbaste = $Row[1];
                                
                                break;

                            case 39:
                                
                                $CProdKgAlim = $Row[1];
                                
                                break;

                            case 40:
                                
                                $CProdKgAES = $Row[1];
                                
                                break;

                            case 41:
                                
                                $margenTecKgProd = $Row[1];
                                
                                break;

                            case 45:
                                
                                $consumoSoja = $Row[2];
                                
                                break;

                            case 50:
                                
                                $consumoMaiz = $Row[2];
                                
                                break;

                            
                            default:
                                
                                break;
                        }
                        
                    }

					if ($rowNumber == 1) {
                        
                        $periodo = substr($Row[0],-7);

                        $periodo = explode('-',$periodo);

                        $periodo = $periodo[1]."-".$periodo[0];
                        
                        $periodoTime = $periodo."-01";

                        $rowValida = TRUE;

                    }

				}
                

                $sql = "INSERT INTO controlpanel(periodo,periodoTime,CSanCabPeriodo,CDiaAlimTCCab,CKgRacPromTC,CKgRacPromMS,consumTCPondCab,consumMSPondCab,converMSEstADPV,poblDiaPromPeriodo,totalCabSalida,muertosPeriodo,estadiaProm,cabTrazSalidas,pesoPromIngSalTraz,pesoPromEgrTraz,kilosGanPeriodoTraz,adpvGanDiaPeriodo,totalCabFaenadas,totalKgCarne,totalPesosFaena,rinde,valorKgObtRinde,porceDesbaste,CProdKgAlim,CProdKgAES,margenTecKgProd,consumoSoja,consumoMaiz) VALUES('$periodo','$periodoTime','$CSanCabPeriodo','$CDiaAlimTCCab','$CKgRacPromTC','$CKgRacPromMS','$consumTCPondCab','$consumMSPondCab','$converMSEstADPV','$poblDiaPromPeriodo','$totalCabSalida','$muertosPeriodo','$estadiaProm','$cabTrazSalidas','$pesoPromIngSalTraz','$pesoPromEgrTraz','$kilosGanPeriodoTraz','$adpvGanDiaPeriodo','$totalCabFaenadas','$totalKgCarne','$totalPesosFaena','$rinde','$valorKgObtRinde','$porceDesbaste','$CProdKgAlim','$CProdKgAES','$margenTecKgProd','$consumoSoja','$consumoMaiz')";

                mysqli_query($conexion,$sql);

                echo mysqli_error($conexion);

            }

    }

    echo "<script>
    window.location.href = 'index.php?ruta=panelControl&periodos=$periodo';
    </script>";

}
?>