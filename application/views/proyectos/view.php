<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                    <h5 class="card-title"><span id='proyecto-nombre'><?php echo $row->proyecto." </span><span id='proyecto-tipo'>".$row->tipo_proyecto ?></span></h5>
                    </div>
                    <div class="col-6 text-right">
                    <a href="#" class="proyecto-head-link">Sobre el proyecto</a>
                    <a href="#" class="proyecto-head-link">Participantes (<?php echo $participantes_cuantos; ?>)</a>                   
                    </div>
                    <div class="col-12"><hr/></div>
                    </div>
                   

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Participantes</a>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p></p>
                    <div class="row">
                    <div class="col-9">
                    <span id='proyecto-nombre'>Descripción del Proyecto:</span>
                    <p class="card-text"><?php echo $row->descripcion; ?></p>
                    <span id-'proyecto-tipo'></span>
                    </div>
                    <div class="col-3">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Propietario</h5>
                            <div class="row">
                                <div class="col-2"><img class="img-fluid" src="<?php echo base_url();?>assets/admin/images/avatars/user-m.jpg" alt=""></div>
                                <div class="col-10"><?php echo $responsable_nombre;?></div>
                            </div>
                            <p>
                                <table id="proyecto">
                                    <tr>
                                        <td>Creado el: </td>
                                        <td><span id="proyecto-tipo"><?php echo $fecha_creacion; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Participantes: </td>
                                        <td><span id="proyecto-tipo"><?php echo $participantes_cuantos; ?></span></td>
                                    </tr>
                                </table>
                            </p>
                            <?php /*
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a> */ ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <p></p>
                    <a href="#" class="btn btn-primary">Crear tarea</a>
                    <table id="product-grid" class="display table font-size-12" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><span class="font-size-12">ID</span></th>
                            <th><span class="font-size-12">TAREAS</span></th>
                            <th><span class="font-size-12">FECHA LÍMITE</span></th>
                            <th><span class="font-size-12">CREADO POR</span></th>
                            <th><span class="font-size-12">PERSONA RESPONSABLE</span></th>
                            <th><span class="font-size-12">STATUS</span></th>
                            <th><span class="font-size-12">OPCIONES</span></th>
                        </tr>
                    </thead>
                    </table> 
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p></p>
                    <div class="row">
                    <div class="col-sm-9"><h5>PROPIETARIO</h5></div>
                    <div class="col-sm-3"> <a href="#" class="btn btn btn-success" id="btn_personas">Cambiar Responsable</a> <input type="hiddenx" name="responsable" id="responsable"  value="<?php echo $idusu;?>"></div>
                    <?php $idusu = $responsable_id; ?>
                    <div class="col-sm-3">
                    <?php $idusu =0; ?>
                    <span data-id="<?php echo $idusu;?>" class="item-empleado" id="item-empleado-<?php echo $idusu;?>">
                        <span data-role="tile-item-name" class="item-empleado-name"><?php echo $responsable_nombre;?></span>
                        <span data-role="remove" class="item-empleado-remove" data-id="<?php echo $idusu;?>">×</span>
                    </span>                 
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="col-sm-9"><h5>PARTICIPANTES</h5></div>
                    <div class="col-sm-3"> <a href="#" class="btn btn btn-success" id="btn_participantes">Agregar Participante</a></div>
                    <div class="col-sm-12 id="row-participantes"">
                    <?php
                    if(!empty($arr_participantes)){ foreach($arr_participantes as $r2){
                    ?>
                    
                    
                        <span data-id="<?php echo $r2['UsuId'];?>" class="item-empleado" id="item-empleado-<?php echo $r2['UsuId'];?>">
                            <span data-role="tile-item-name" class="item-empleado-name"><?php echo $r2['UsuNom']." ".$r2['UsuApePat']." ".$r2['UsuApeMat']; ?></span>
                            <span data-role="remove" class="item-empleado-remove" data-id="<?php echo $r2['UsuId'];?>">×</span>
                        </span> 
                    
                    <?php }}?>
                    <input type="hiddenx" name="participantes" id="participantes" value="<?php echo $participantes;?>">
                    </div>
                    
                  
                    </div>
                    </div>
                    </div>


                   <p><br/></p>
                   <hr/>
                    <a href="<?php echo base_url('proyectos')?>" class="btn btn-default">Regresar a proyectos</a>
                </div>
                </div>
            </div>
        <?php



        ?>
        </div>
    </div>
</div>

<div class="modal fade" id="personasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">Personas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="participantesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">Personas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('#btn_personas').click(function(){    
    $('#personasModal .modal-body').load('<?php echo base_url('proyectos/get_personas_responsables')?>',function(){
        $('#personasModal').modal({show:true});
    });
});

$('#btn_participantes').click(function(){    
    $('#participantesModal .modal-body').load('<?php echo base_url('proyectos/get_personas_participantes')?>',function(){
        $('#participantesModal').modal({show:true});
    });
});
</script>