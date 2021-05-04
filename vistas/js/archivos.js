

/*=============================================
ELIMINAR ARCHIVO
=============================================*/
$(".tablas").on("click", ".btnEliminarArchivo", function(){

  var nombreArchivo = $(this).attr("nombreArchivo");
  var tabla = $(this).attr("tablaDB");

  swal({
    title: '¿Está seguro de borrar los registros asociados a este Archivo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=archivosCarga&nombreArchivo=" + nombreArchivo + "&tabla=" + tabla;

    }

  })

})




