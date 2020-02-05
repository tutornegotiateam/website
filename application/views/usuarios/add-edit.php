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
    
    <div class="row">
        <div class="col-md-9">
            <form method="post">
            <?php //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');  ?>
            <div id="errores">
            <ul>
			<?php echo validation_errors('<li>', '</li>'); ?>
			</ul>
			</div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="UsuNom" placeholder="Nombre" value="<?php echo !empty($member[0]['UsuNom'])?$member[0]['UsuNom']:''; ?>" >
                        
                        
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control" name="UsuApePat" placeholder="Apellido Paterno" value="<?php echo !empty($member[0]['UsuApePat'])?$member[0]['UsuApePat']:''; ?>" >
                       
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control" name="UsuApeMat" placeholder="Apellido Materno" value="<?php echo !empty($member[0]['UsuApeMat'])?$member[0]['UsuApeMat']:''; ?>" >
                       
                    </div>
                </div>
                <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Usuario</label>
                    <?php $usuuser = !empty($member[0]['UsuUser'])?$member[0]['UsuUser']:'';?>
                    <input type="text" class="form-control" name="UsuUser" id="UsuUser" placeholder="Teclee contraseña" value="<?php echo !empty($member[0]['UsuUser'])?$member[0]['UsuUser']:''; ?>" <?php if($usuuser<>''){ echo "readonly='true'"; } ?>  ><span id="result"></span>
                    
                </div>
                <?php  
                 $id =    !empty($member[0]['UsuId'])?$member[0]['UsuId']:'';
                if($id==''){			
                ?>
                
                
                <div class="col-md-4 mb-3">
                    <label>Contraseña</label>
                    <input type="text" class="form-control" name="UsuPass" placeholder="Teclee contraseña" value="<?php echo !empty($member[0]['UsuPass'])?$member[0]['UsuPass']:''; ?>" >
                    
                </div>
                <?php } ?>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="UsuActivo1" name="UsuActivo" class="custom-control-input" value="1" <?php echo empty($member[0]['UsuActivo']) || (!empty($member[0]['UsuActivo']) && ($member[0]['UsuActivo'] == '1'))?'checked="checked"':''; ?> >
                        <label class="custom-control-label" for="UsuActivo1">Activo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="UsuActivo2" name="UsuActivo" class="custom-control-input" value="0" <?php echo (!empty($member[0]['UsuActivo']) && ($member[0]['UsuActivo'] == '0'))?'checked="checked"':''; ?> >
                        <label class="custom-control-label" for="UsuActivo2">Inactivo</label>
                    </div>
                   
                </div>
               <div class="form-row">
                    <div class="col-md-6 mb-3">
                <?php // echo $perfil =  empty($member[0]['UsuPerfil'])?$member[0]['UsuPerfil']:''; 
                $perfil = @$member[0]['UsuPerfil'];
                ?>
                    <label>Perfil</label>
                    <select class="form-control" name="UsuPerfil" id="UsuPerfil" required="true">
                    
                    	<option value="" <?php if($perfil==''){ echo 'selected="selected"'; }?>>Seleccione perfil</option>
                    	<option value="1" <?php if($perfil=='1'){ echo 'selected="selected"'; }?>>Consulta</option>
                    	<option value="2" <?php if($perfil=='2'){ echo 'selected="selected"'; }?>>Publicador</option>
                    	<option value="3" <?php if($perfil=='3'){ echo 'selected="selected"'; }?>>Administrador</option>
                    	<option value="4" <?php if($perfil=='4'){ echo 'selected="selected"'; }?>>Editor</option>
                    </select> 
                    </div> 
                     <div class="col-md-6 mb-3">
                <?php // echo $perfil =  empty($member[0]['UsuPerfil'])?$member[0]['UsuPerfil']:''; 
                $tipo = @$member[0]['UsuTipo'];
                ?>
                    <label>Tipo de empleado</label>
                    <select class="form-control" name="UsuTipo" id="UsuTipo" required="true">
                    
                    	<option value="" <?php if($tipo==''){ echo 'selected="selected"'; }?>>Seleccione tipo de empleado</option>
                    	<option value="1" <?php if($tipo=='1'){ echo 'selected="selected"'; }?>>Empleado</option>
                    	<option value="2" <?php if($tipo=='2'){ echo 'selected="selected"'; }?>>Empleado Externo</option>
                    	<option value="3" <?php if($tipo=='3'){ echo 'selected="selected"'; }?>>Proveedor</option>
                    </select> 
                    </div>                    
                </div>
                
                <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-secondary">Regresar</a>
                <input type="submit" name="memSubmit" class="btn btn-success" value="Guardar">
            </form>
        </div>
    </div>
                   </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function()
{    
 $("#UsuUser").keyup(function()
 {  
  var UsuUser = $(this).val();  
  if(UsuUser.length > 3)
  {  
   $("#result").html('checking...');   
   /*$.post("userUsuUser-check.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result").html(data);
   });*/   
   $.ajax({    
    type : 'POST',
    url  : '<?php echo base_url()?>usuarios/existe_usuario',
    data : $(this).serialize(),
    success : function(data)
        {
            $("#result").html(data);
        }
    });
    return false;   
  }
  else
  {
   $("#result").html('');
  }
 }); 
});
</script>