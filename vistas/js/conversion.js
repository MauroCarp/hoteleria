// GENERAR REPORTE
let btnGenerarReporte = document.getElementById('generarReporteConversion')

btnGenerarReporte.addEventListener('click',()=>{

    let anio = document.getElementById('anioConv').value

    window.location = `index.php?ruta=resumenConversion&anio=${anio}`

});
