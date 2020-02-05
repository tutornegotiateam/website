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
            <form method="post" id="form1" name="form1" enctype="multipart/form-data" action="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Idioma</label>
                        <input type="text" class="form-control" name="IdiomaTitulo" id="IdiomaTitulo" placeholder="Idioma" value="<?php echo !empty($member['IdiomaTitulo'])?$member['IdiomaTitulo']:''; ?>">
                   
                        <?php echo form_error('IdiomaTitulo', '<label class="error">', '</label>'); ?>
                   
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Siglas</label>
                        <input type="text" class="form-control" name="IdiomaSigla" id="IdiomaSigla" placeholder="Nombre" value="<?php echo !empty($member['IdiomaSigla'])?$member['IdiomaSigla']:''; ?>" >
                        <?php echo form_error('IdiomaSigla', '<label class="error">', '</label>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Bandera <img src="<?php echo !empty($member['IdiomaBandera'])?base_url().$member['IdiomaBandera']:''; ?>" alt=""  width="35px"/></label>
                        <input type="file" class="form-control" name="userfile" id="userfile" placeholder="Bandera">
                        <?php echo form_error('userfile','<label class="error">', '</label>'); ?>
                    </div>
                </div>
              
                <div class="form-group">
                    <label>Status</label>
                    <?php $activo =!empty($member['IdiomaActivo'])?$member['IdiomaActivo']:'0';?> 
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="IdiomaActivo1" name="IdiomaActivo" class="custom-control-input" value="1" <?php if($activo==1){ echo 'checked="checked"'; }?>>
                        <label class="custom-control-label" for="IdiomaActivo1">Activo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="IdiomaActivo2" name="IdiomaActivo" class="custom-control-input" value="0" <?php if($activo==0){ echo 'checked="checked"'; }?> >
                        <label class="custom-control-label" for="IdiomaActivo2">Inactivo</label>
                    </div>
                    <?php echo form_error('IdiomaActivo','<label class="error">', '</label>'); ?>
                </div>  
                <a href="<?php echo site_url('idioma_admin'); ?>" class="btn btn-secondary">Regresar</a>
                <input type="submit" name="memSubmit" id="memSubmit" class="btn btn-success" value="Guardar">
                <input type="hidden" name="IdiomaId" id="IdiomaId" value="<?php echo !empty($member['IdiomaId'])?$member['IdiomaId']:''; ?>">
            </form>
        </div>
    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>