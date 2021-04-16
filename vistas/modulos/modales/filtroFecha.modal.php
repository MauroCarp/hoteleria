<div id="<?php echo $modalSeccion;?>" class="modal fade" role="dialog" >
  
  <div class="modal-dialog" style="width:300px;">
        <?php
        
        generarContentModal($idModal,$idCalendar,'',$seccion);
        
        ?>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="<?php echo $idGenerar;?>">Generar Reporte</button>

        </div>

    </div>

        <?php
        
        $idModal = 'modalFecha'.$seccion.'Comparar';
        
        generarContentModal($idModal,$idCalendar,'Comp',$seccion);
        
        ?>

    </div>

  </div>

</div>