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
         <form method="post" name="form1" id="form1" action="<?php echo base_url(); ?>menu/agregaridioma">
            <div class="form-row"> 
            <?php  // print_r($registros); ?>               	
                	<div class="col-md-2 mb-3">
                		<label>Idioma</label>
												<button id="selecciona_idioma2" type="button" class="btn btn-default dropdown-toggle form-control" tabindex="-1" data-toggle="dropdown">
													<?php echo $vId2;?>
												
												</button>											
                	</div>
                </div>
                
            <?php //if(!empty($registros)){ foreach($registros as $r1){
            $idioma_=1;	
            
            echo  $vId1." ".$vId2." ".$vId3;
             ?>
            <div  id="contenido-<?php echo $idioma_=1; ?>" <?php /* class="ocultar_div"*/?>>
            
               <div class="form-row">
                	<div   class="col-md-9 mb-3">
                		<label>Idioma</label>
                        <input type="text" class="form-control" name="MenuSupLanguaje-<?php echo $idioma_?>" id="MenuSupLanguaje-<?php echo $idioma_?>" placeholder="Idioma" value="<?php echo  $vId1; ?>" readonly="true" >
                        <?php echo form_error('MenuSupLanguaje','<div class="invalid-feedback">','</div>'); ?>
                	</div>
                </div>
                <div class="form-row">
                	<div   class="col-md-9 mb-3">
                		<label>Nombre</label>
                        <input type="text" class="form-control" name="MenuSupTitulo-<?php echo $idioma_?>" id="MenuSupTitulo-<?php echo $idioma_?>" placeholder="Nombre" value="" <?php /* onkeyup="if (isArrowKey(event)) return ;urlAmigable(this.value,<?php echo $idioma_ ?>);" */?>>
                        <?php echo form_error('MenuSupTitulo-1','<div class="invalid-feedback">','</div>'); ?>
                	</div>
                </div>
                <div class="form-row">
                	<div   class="col-md-9 mb-3">
                		<label>URL Id</label>
                        <input type="text" class="form-control" name="MenuSupIdTxt-<?php echo $idioma_?>" id="MenuSupIdTxt-<?php echo $idioma_?>" placeholder="Url amigable" value="<?php echo $vId3?>" readonly="true">
                        <?php echo form_error('MenuSupIdTxt','<div class="invalid-feedback">','</div>'); ?>
                	</div>
                </div>
                <div class="form-row">
                	<div   class="col-md-9 mb-3">
                		<label>Link</label>
                        <input type="text" class="form-control" name="MenuSupUrl-<?php echo $idioma_?>" id="MenuSupUrl-<?php echo $idioma_?>" placeholder="Url" value="" >
                        <?php echo form_error('MenuSupUrl','<div class="invalid-feedback">','</div>'); ?>
                	</div>
                </div>
                <div class="form-group">
                    <label>Status</label><br/>
                    <div class="  custom-control-inline">
                       <label  for="MenuStatus1-1">
                        <input type="radio" id="MenuStatus1-<?php echo $idioma_?>" name="MenuStatus-<?php echo $idioma_?>"  value="1" >
                        Activo
                        </label>
                    </div>
                    <div class=" custom-control-inline">
                         <label  for="MenuStatus2-1">
                        <input type="radio" id="MenuStatus2-<?php echo $idioma_?>" name="MenuStatus-<?php echo $idioma_?>"  value="0">
                        Inactivo</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Tipo de menu</label><br/>
                    <div class="  custom-control-inline">
                    <label for="MenuTipo1">
                        <input type="radio" id="MenuTipo1-<?php echo $idioma_?>" name="MenuTipo-<?php echo $idioma_?>"  value="3">
                         Individual</label>
                    </div>
                    <div class="  custom-control-inline">
                    <label  for="MenuTipo2">
                        <input type="radio" id="MenuTipo2-<?php echo $idioma_?>" name="MenuTipo-<?php echo $idioma_?>"  value="1">
                         Lista</label>
                    </div>
                     <div class="  custom-control-inline">
                     <label  for="MenuTipo3">
                        <input type="radio" id="MenuTipo3-<?php echo $idioma_?>" name="MenuTipo-<?php echo $idioma_?>"  value="2">
                         MegaMenu</label>
                    </div>
                    <?php echo form_error('MenuTipo','<div class="invalid-feedback">','</div>'); ?>
                </div>
</div>
                
              
            
                  <a href="<?php echo site_url('menu'); ?>" class="btn btn-secondary">Regresar</a>
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
<script>
	function hideOtherLanguage(aa,bb,cc){
		var x = '';
		$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>menu/existe_idioma",
		data: { a: aa, b:bb, c:cc},
		cache: false,
		success: function(resultData) {
			if(resultData==0){
				
				window.location.href = "<?php echo base_url(); ?>menu/agregaridioma/"+cc;
				$('.ocultar_div').hide();
			}else{
				$('.ocultar_div').hide();
				$('#contenido-'+aa).show();
				$('#selecciona_idioma').text(bb);
			}
		},
		error: function(resultData) {
			$("#msgError").html( "<span style='color: red'>Error al cambiar posición</span>" );
			$("#msgError").fadeTo(2000, 500).slideUp(500, function(){
			    $("#msgError").slideUp(500);
				});
			}
		});
		/*
		        $('.ocultar_div').hide();
				$('#contenido-'+aa).show();
				$('#selecciona_idioma').text(bb);*/
		//alert(x);
		
		
		
		
		
	}
	
	
	
	$(function() {
	    $('.ocultar_div').hide();
		$('#contenido-<?php echo $this->session->userdata('idiomaSeleccionado'); ?>').show();
	
    //codigo aquí
    })
     function urlAmigable(text,idioma) {
     	//alert(text+' '+idioma)
        var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
        var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
        var p = new RegExp(a.split('').join('|'), 'g');
        var m ='';

        m = text.toString().toLowerCase().replace(/\s+/g, '-')
            .replace(p, function (c) {
                return b.charAt(a.indexOf(c));
            })
            .replace(/&/g, '-y-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
            $('#MenuSupIdTxt-'+idioma).val(m);
            
     }
     function isArrowKey(k_ev)
	{
		var unicode=k_ev.keyCode? k_ev.keyCode : k_ev.charCode;
		if (unicode >= 37 && unicode <= 40)
			return true;
		return false;
	}
</script>
