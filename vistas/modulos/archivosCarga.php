<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Administrador"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Archivos de Carga
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Archivos</li>
    
    </ol>

  </section>
  
  
  <section class="content">
  <h2>Compras</h2>

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Archivo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $tabla = 'compras';
        $archivosCompras = ControladorArchivos::ctrMostrarArchivos($item, $valor,$tabla);

       foreach ($archivosCompras as $key => $value){
         
          echo ' <tr>
                 
                  <td>'.($key+1).'</td>
          
                  <td>'.$value["archivo"].'</td>

                  <td>

                  <div class="btn-group">
                    
                    <button class="btn btn-danger btnEliminarArchivo" nombreArchivo="'.$value["archivo"].'" tablaDB="compras"><i class="fa fa-times"></i></button>

                  </div>  

                </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

  
  <section class="content">
  <h2>Ventas</h2>

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Archivo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $tabla = 'animales';
        $archivosVentas = ControladorArchivos::ctrMostrarArchivos($item, $valor,$tabla);

       foreach ($archivosVentas as $key => $value){
         
          echo ' <tr>
                 
                  <td>'.($key+1).'</td>
          
                  <td>'.$value["archivo"].'</td>
                  
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-danger btnEliminarArchivo" nombreArchivo="'.$value["archivo"].'" tablaDB="animales"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

  
  <section class="content">
  <h2>Muertes</h2>

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Archivo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $tabla = 'muertes';
        $archivosMuertes = ControladorArchivos::ctrMostrarArchivos($item, $valor,$tabla);

       foreach ($archivosMuertes as $key => $value){
         
          echo ' <tr>
                 
                  <td>'.($key+1).'</td>
          
                  <td>'.$value["archivo"].'</td>
                  <td>

                  <div class="btn-group">
                    
                    <button class="btn btn-danger btnEliminarArchivo" nombreArchivo="'.$value["archivo"].'" tablaDB="muertes"><i class="fa fa-times"></i></button>

                  </div>  

                </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>


</div>

<?php

  $borrarArchivo = new ControladorArchivos();
  $borrarArchivo -> ctrBorrarArchivos();

?> 


