<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php


			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>
	
			<li class="treeview">

				<a href="#">

					<i class="icon-COW"></i>
					
					<span>Compras</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="datos-compras">
							
							<i class="fa fa-circle-o"></i>
							<span>Cargar Compras</span>

						</a>

					</li>

					<li>

						<a href="#" data-toggle="modal" data-target="#ventanaModalFechaCompra">
							
							<i class="fa fa-bar-chart"></i>
							<span>Generar Reportes</span>

						</a>

					</li>
				</ul>

			</li>


			<li class="treeview">

				<a href="#">

					<i class="fa fa-money"></i>
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="datos">
							
							<i class="fa fa-circle-o"></i>
							<span>Cargar Ventas</span>

						</a>

					</li>

					<li>

						<a href="reportes">
							
							<i class="fa fa-bar-chart"></i>
							<span>Generar Reportes</span>

						</a>

					</li>
				</ul>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="icon-muerteIco"></i>
					<span>Muertes</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="datos-muertes">
							
							<i class="fa fa-circle-o"></i>
							<span>Cargar Muertes</span>

						</a>

					</li>

					<li>

						<a href="reportes-muertes">
							
							<i class="fa fa-bar-chart"></i>
							<span>Generar Reportes</span>

						</a>

					</li>
				</ul>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-tasks"></i>
					
					<span>Panel de Control</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="#" data-toggle="modal" data-target="#modalCargarPanelControl">
							
							<i class="fa fa-circle-o"></i>
							<span>Cargar P. de Control</span>

						</a>

					</li>

					<li>

						<a href="#" data-toggle="modal" data-target="#ventanaModalFechaPanelControl">
							
							<i class="fa fa-bar-chart"></i>
							<span>Generar Reportes</span>

						</a>

					</li>
				</ul>

			</li>

			<li>

				<a href="piri">

					<i class="fa fa-line-chart "></i>
					<span>P.I.R.I</span>

				</a>

			</li>'

			;
			
			if($_SESSION["perfil"] == "Master"){

				echo '<li>
	
					<a href="usuarios">
	
						<i class="fa fa-user"></i>
						<span>Usuarios</span>
	
					</a>
	
				</li>
				<li>
	
					<a href="archivosCarga">
	
						<i class="fa fa-files-o"></i>
						<span>Lista de Archivos Carga</span>
	
					</a>
	
				</li>';

			  }

		?>

		</ul>

	 </section>

</aside>
<?php


function generarContentModal($idModal,$idCalendar,$comparar,$seccion){
	
	$estilo = ($comparar != '') ? "display:none;width:300px;position:absolute;top:0;left:110px;" : "left:0" ; 

    echo "
	<div class='modal-content' id='".$idModal."' style='".$estilo."'>

        <div class='modal-header' style='background:#3c8dbc; color:white;'>

          <button type='button' class='close' data-dismiss='modal'>&times;</button>

          <h4 class='modal-title'>Reporte de Compras</h4>

        </div>
	<div class='modal-body' style='padding-bottom:0'>

    <div class='box-body'>
      
      <div class='box-header with-border'>
      
        <div class='input-group'>
          
          <div class='row'>

            <div class='col-md-12'>

              <button type='button' class='btn btn-default btn-lg btn-block' id='".$idCalendar.$comparar."'>
              
                <span>
                  <i class='fa fa-calendar'></i> 
                    Rango de Fecha
                </span>

                <i class='fa fa-caret-down'></i>

              </button>

            </div>

          </div>
              
          <br>";
          
          if($comparar == ''){
          echo "
          <div class='row'>

              <div class='col-md-6 botonComparar'>

              <input type='checkbox' name='compararValidoFecha' id='compararValidoFecha".$seccion."'>

              <b>&nbsp;Comparar</b>

              </div>
              
          </div>";

          }
    
    echo "
        </div>

      </div>

    </div>

  </div>";


}

// $modalSeccion es el ID del modal GENERAL de cada SECCION

// $idModal es el ID del Modal, puede ser el principial o el Comparar

// $seccion es la seccion que pertenece el modal


$modalSeccion = 'ventanaModalFechaCompra';

$idCalendar = 'daterange-btnCompras';

$idGenerar = 'generarReporteCompras';

$idModal = 'modalFechaCompra';

$seccion = 'Compras';

include 'modales/filtroFecha.modal.php';

$modalSeccion = 'ventanaModalFechaPanelControl';

$idCalendar = 'daterange-btnPanel';

$seccion = 'PanelControl';

$idModal = 'modalFechaPanelControl';

$idGenerar = 'generarPanelControl';

include 'modales/filtroFecha.modal.php';

?>

<div id="modalCargarPanelControl" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" action="cargar-panelControl.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Cargar Datos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">Seleccionar Archivo</div>

              <input type="file" class="nuevosDatos" name="nuevosDatos">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Cargar Datos</button>

        </div>

      </form>

    </div>

  </div>

</div>