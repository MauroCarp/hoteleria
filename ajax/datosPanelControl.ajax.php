<?php
require_once "../controladores/panelControl.controlador.php";

require_once "../modelos/panelControl.modelo.php";

$periodo = $_POST['periodo'];

$item = 'periodo';

$campo = '*';

$valor = $periodo;

$datos = ControladorPanelControl::ctrMostrarDato($campo,$item,$valor);

$respuesta = array();

$respuesta['Consumo1'] = "
    <tbody>

        <tr>
                                
            <td>Costo de Sanidad por Cabeza Per&iacute;odo</td>
            
            <td><span class='badge bg-blue'>".$datos['CSanCabPeriodo']."</span></td>

        </tr>

        <tr>
                                
            <td>Costo Diario en Alimentaci&oacute;n en Tal Cual por Cabeza</td>
            
            <td><span class='badge bg-blue'>".$datos['CDiaAlimTCCab']."</span></td>

        </tr>

        <tr>
                                
            <td>Costo Kilo de Raci&oacute;n Prom. en TC</td>
            
            <td><span class='badge bg-blue'>".$datos['CKgRacPromTC']."</span></td>

        </tr>

        <tr>
                                
            <td>Costo Kilo de Raci&oacute;n Prom. en MS</td>
            
            <td><span class='badge bg-blue'>".$datos['CKgRacPromMS']."</span></td>

        </tr>

    </tbody>
";

$respuesta['Consumo2'] = "
    <tbody>

        <tr>
                                
            <td>Consumo en TC PONDERADO por Cabeza</td>
            
            <td><span class='badge bg-blue'>".$datos['consumTCPondCab']."</span></td>

        </tr>

        <tr>
                                
            <td>Consumo en MS PONDERADO por Cabeza</td>
            
            <td><span class='badge bg-blue'>".$datos['consumMSPondCab']."</span></td>

        </tr>

        <tr>
                                
            <td>Conversión MS ESTIMADA según última ADPV</td>
            
            <td><span class='badge bg-blue'>".$datos['converMSEstADPV']."</span></td>

        </tr>
       
        <tr>
                                
            <td>Consumo de Soja</td>
            
            <td><span class='badge bg-blue'>".$datos['consumoSoja']."</span></td>

        </tr>
       
        <tr>
                                
            <td>Consumo de Maiz</td>
            
            <td><span class='badge bg-blue'>".$datos['consumoMaiz']."</span></td>

        </tr>

    </tbody>
";

$respuesta['Poblacion'] = "
    <tbody>

        <tr>
                                
            <td>Poblaci&oacute;n Diaria Prom. Per&iacute;odo</td>
            
            <td><span class='badge bg-blue'>".$datos['poblDiaPromPeriodo']."</span></td>

        </tr>

        <tr>
                                
            <td>Total Cabezas Salidas (No incluye Muertos)</td>
            
            <td><span class='badge bg-blue'>".$datos['totalCabSalida']."</span></td>

        </tr>

        <tr>
                                
            <td>Muertos en el Per&iacute;odo</td>
            
            <td><span class='badge bg-blue'>".$datos['muertosPeriodo']."</span></td>

        </tr>

        <tr>
                                
            <td>Estadia Promedio</td>
            
            <td><span class='badge bg-blue'>".$datos['estadiaProm']."</span></td>

        </tr>

        <tr>
                                
            <td>Cabezas Trazadas Salidas (No incluye Muertos)</td>
            
            <td><span class='badge bg-blue'>".$datos['cabTrazSalidas']."</span></td>

        </tr>

        <tr>
                                
            <td>Peso Promedio Ingreso/Salidos - Trazados	</td>
            
            <td><span class='badge bg-blue'>".$datos['pesoPromIngSalTraz']."</span></td>

        </tr>

        <tr>
                                
            <td>Peso Promedio Egresos -  Trazados</td>
            
            <td><span class='badge bg-blue'>".$datos['pesoPromEgrTraz']."</span></td>

        </tr>

        <tr>
                                
            <td>Kilos Ganados Periodo - Trazados</td>
            
            <td><span class='badge bg-blue'>".$datos['kilosGanPeriodoTraz']."</span></td>

        </tr>

        <tr>
                                
            <td>ADPV Ganancia Diaria en el Periodo</td>
            
            <td><span class='badge bg-blue'>".$datos['adpvGanDiaPeriodo']."</span></td>

        </tr>

    </tbody>
";

$respuesta['Produccion1'] = "
    <tbody>

        <tr>
                                
            <td>Total Cabezas Faenadas</td>
            
            <td><span class='badge bg-blue'>".$datos['totalCabFaenadas']."</span></td>

        </tr>

        <tr>
                                
            <td>Total Kilos Carne (Faena)</td>
            
            <td><span class='badge bg-blue'>".$datos['totalKgCarne']."</span></td>

        </tr>

        <tr>
                                
            <td>Total $ Faena (Sin Gastos)</td>
            
            <td><span class='badge bg-blue'>".$datos['totalPesosFaena']."</span></td>

        </tr>

        <tr>
                                
            <td>Rinde</td>
            
            <td><span class='badge bg-blue'>".$datos['rinde']."</span></td>

        </tr>

        <tr>
                                
            <td>Valor Kg Obtenido aplicando Rinde</td>
            
            <td><span class='badge bg-blue'>".$datos['valorKgObtRinde']."</span></td>

        </tr>

        <tr>
                                
            <td>% Desbaste</td>
            
            <td><span class='badge bg-blue'>".$datos['porceDesbaste']."</span></td>
            
        </tr>

    </tbody>
";

$respuesta['Produccion2'] = "

    <tbody>

        <tr>
                                
            <td>Costo Producción 1 Kg (Solo Alimentación)</td>
            
            <td><span class='badge bg-blue'>".$datos['CProdKgAlim']."</span></td>

        </tr>

        <tr>
                                
            <td>Costo Producción 1 Kg ( Alimentación+ Estructura + Sanidad )</td>
            
            <td><span class='badge bg-blue'>".$datos['CProdKgAES']."</span></td>

        </tr>

        <tr>
                                
            <td>Margen Técnico por Kilo Producido</td>
            
            <td><span class='badge bg-blue'>".$datos['margenTecKgProd']."</span></td>

        </tr>

    </tbody>

";

$respuesta['CajaPoblacion'] = $datos['poblDiaPromPeriodo'];

$respuesta['CajaConversion'] = $datos['converMSEstADPV'];

$respuesta['CajaAdpv'] = $datos['adpvGanDiaPeriodo'];

$respuesta['CajaKgProd'] = $datos['CProdKgAES'];

$respuesta['CajaEstadia'] = $datos['estadiaProm'];

echo json_encode($respuesta);

?>