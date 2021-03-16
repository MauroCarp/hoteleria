
/*=============================================
GENERAR REPORTE
=============================================*/
$('#generarPanelControl').click(()=>{

    var rango = localStorage.getItem('rangoPanel');
    
    console.log(rango);
    
    window.location.href = 'index.php?ruta=panelControl&rango=' + rango, _self;

});

/*=============================================
AGREGAR FILTROS
=============================================*/

$('#daterange-btnPanel').daterangepicker(
    {
      ranges   : {
  
      },
      startDate: moment(),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btnPanel span').html(start.format('d/m/Y') + ' - ' + end.format('DD/MM/YYYY'));
  
      var fechaInicial = start.format('YYYY-MM-DD');
  
      var fechaFinal = end.format('YYYY-MM-DD');
  
      localStorage.setItem('rangoPanel', fechaInicial + '/' + fechaFinal);
  
      var capturarRango = $("#daterange-btnPanel span").html();
  
    }
  
  )
  
/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function(){
  
  localStorage.removeItem("capturarRango");
  
  localStorage.clear();
  
  $('#daterange-btn').html('<span><i class="fa fa-calendar"></i> Rango de fecha </span><i class="fa fa-caret-down"></i>');
  
});


/*=============================================
OBTENER GET
=============================================*/

function getQueryVariable(variable) {
  
  var query = window.location.search.substring(1);
  
  var vars = query.split("&");
  
  for (var i=0; i < vars.length; i++) {
    
    var pair = vars[i].split("=");
    
    if(pair[0] == variable) {
      
      return pair[1];
      
    }
    
  }
  
  return false;
  
}

/*=============================================
GENERAR GRAFICO FINAMICO
=============================================*/

  function graficoDinamico(kilos){

    var rango = getQueryVariable('rango');

    var data = 'kgInicial=' + kilos[0] + '&kgFinal=' + kilos[1] + '&rango=' + rango;

    var url = 'ajax/panelControl.ajax.php';
    
    $.ajax({

      data: data,

      url: url,

      type: 'POST',
      
      success: function(respuesta){

        var resultado = JSON.parse(respuesta);

        $('#panelCantidad h3:first-child').html(resultado.cantidadAnimales);

        $('#panelAdpv').html(resultado.adpv.toFixed(2));
        
        $('#panelEstadia').html(Math.round(resultado.estadia));

        $('#panelParticipacion').html(resultado.participacion.toFixed(2));


      }

    });


  }

 $('.data-number').blur(()=>{

  var kilos = [];

  $('.data-number').each(function(){

    kilos.push($(this).val());
    
  });

  graficoDinamico(kilos);

  
 });


  
 
  
  