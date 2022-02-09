// GENERAR REPORTE
let btnGenerarReporte = document.getElementById('generarReporteConversion')

btnGenerarReporte.addEventListener('click',()=>{

    let anio = document.getElementById('anioConv').value

    window.location = `index.php?ruta=resumenConversion&anio=${anio}`

});


// CARGAR CHARTS ANUAL

const btnEstadisticaLabel = document.getElementById('btnEstadistica')

if(btnEstadisticaLabel != null){
        
    let anio = getQueryVariable('anio')
    
    let url = 'ajax/conversion.ajax.php'
    
    data = `anio=${anio}`
    
    let etapas = ['CC','RP','RC','T']

    let graficos = ['kgIng','kgEgr','kgProd','adpv','dias','conversion']

    const meses =['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    const borderColors = ['rgb(255, 77, 77)','rgb(24, 220, 255)','rgb(255, 175, 64)','rgb(50, 255, 126)','rgb(255, 250, 101)','rgb(125, 95, 255)','rgb(209, 204, 192)','rgb(44, 44, 84)','rgb(189, 197, 129)','rgb(205, 97, 51)','rgb(204, 174, 98)','rgb(33, 140, 116)']
    

    const colors = ['rgba(255, 77, 77,0.5)','rgba(24, 220, 255,0.5)','rgba(255, 175, 64,0.5)','rgba(50, 255, 126,0.5)','rgba(255, 250, 101,0.5)','rgba(125, 95, 255,0.5)','rgba(209, 204, 192,0.5)','rgba(44, 44, 84,0.5)','rgba(189, 197, 129,0.5)','rgba(205, 97, 51,0.5)','rgba(204, 174, 98,0.5)','rgba(33, 140, 116,0.5)']


    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{
    
            let data = JSON.parse(response)
                        
            for (const etapa of etapas) {
                
                for (const grafico of graficos) {
                    
                    let datos = [];

                    for (let i = 0; i < data.length; i++) {
                        
                        let mesLabel = meses[data[i].mes - 1]
                        
                        let indexData = grafico + etapa

                        if(grafico == 'conversion')
                            indexData = `convMs${etapa}`
                        

                        datos.push(
                            
                            {"label":mesLabel,
                            "backgroundColor":colors[i],
                            "borderColor":borderColors[i],
                            "borderWidth":1,
                            "data":[data[i][indexData]]
                            }

                        )
                        
                    }    

                    let configuracion = {
                        "type":"bar",
                        "data":{
                            "datasets":datos
                        },
                        "options":{
                            "responsive":true,
                            "legend":{
                                "position":"top",
                                "labels":{
                                    "boxWidth":5
                                }
                            },
                            "title":{
                                "display":false,
                                "text":grafico
                            },
                            "plugins":{
                                "labels":{
                                    "render":"value"
                                }
                            },
                            "scales":{
                                "xAxes":[
                                    {"display":false}
                                ],
                                "yAxes":[
                                    {"ticks":{
                                        "suggestedMin":0,
                                    }}
                                ]
                            }
                        }
                    }
                    
                    generarGraficoBar(`${grafico}Chart${etapa}Anual`,configuracion,'noOption');

                }

            }
        
            
        }
    })
    
}


