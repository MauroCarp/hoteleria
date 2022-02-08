<div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" style="font-size:1.em;">
                            <li class="tabs active"><a href="#tab_1" data-toggle="tab">Ciclo Completo</a></li>
                            <li class="tabs" id="recriaPastoril"><a href="#tab_2" data-toggle="tab">Recr&iacute;a Pastoril</a></li>
                            <li class="tabs" id="recriaCorral"><a href="#tab_3" data-toggle="tab">Recr&iacute;a Corral</a></li>
                            <li class="tabs" id="terminacion"><a href="#tab_4" data-toggle="tab">Terminaci&oacute;n</a></li>
                            </ul>
                            <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                
                                <?php include('reportes/cicloCompleto.php'); ?>
                            
                            </div>

                            <div class="tab-pane recriaPastoril" id="tab_2">
                            <?php include('reportes/recriaPastoril.php'); ?>

                            </div>

                            <div class="tab-pane recriaCorral" id="tab_3">
                            <?php include('reportes/recriaCorral.php'); ?>

                            </div>

                            <div class="tab-pane terminacion" id="tab_4">
                            <?php include('reportes/terminacion.php'); ?>

                            </div>

                            </div>

                        </div>