<div class="main-content">
    <div class="container-fluid">
        <div class="row">
	        <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                    </div>
                    <div class="card-block">             
				    
				
    
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    <?php //echo validation_errors();?>
    <div class="row">
        <div class="col-md-9">
            <form method="post" id="form1" name="form1" action="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Perfil</label>
                        <input type="text" class="form-control" name="PerNombre" id="PerNombre" placeholder="Perfil" value="<?php echo !empty($member['PerNombre'])?$member['PerNombre']:''; ?>">                   
                        <?php echo form_error('PerNombre', '<label class="error">', '</label>'); ?>
                   
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Descripción</label>
                        <textarea class="form-control" name="PerDesc" id="PerDesc" placeholder="Descripción"><?php echo !empty($member['PerDesc'])?$member['PerDesc']:''; ?></textarea>
                        <?php echo form_error('PerDesc', '<label class="error">', '</label>'); ?>
                    </div>
                </div>
            
              
                <div class="form-group">
                    <label>Status</label>
                    <?php $activo =!empty($member['PerActivo'])?$member['PerActivo']:'0';?> 
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="PerActivo1" name="PerActivo" class="custom-control-input" value="1" <?php if($activo==1){ echo 'checked="checked"'; }?>>
                        <label class="custom-control-label" for="PerActivo1">Activo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="PerActivo2" name="PerActivo" class="custom-control-input" value="0" <?php if($activo==0){ echo 'checked="checked"'; }?> >
                        <label class="custom-control-label" for="PerActivo2">Inactivo</label>
                    </div>
                    <?php echo form_error('PerActivo','<label class="error">', '</label>'); ?>
                </div>  
                <a href="<?php echo site_url('perfiles'); ?>" class="btn btn-secondary">Regresar</a>
                <input type="submit" name="memSubmit" id="memSubmit" class="btn btn-success" value="Guardar">
                <input type="hidden" name="PerId" id="PerId" value="<?php echo !empty($member['PerId'])?$member['PerId']:''; ?>">
            </form>
        </div>
    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>