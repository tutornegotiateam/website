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
        <div class="col-md-12">
        <?php $MenuId =  !empty($member2[0]->MenuId)?$member2[0]->MenuId:''; ?>
            <form method="post" name="formSubmenu" id="formSubmenu" action="<?php  //if($MenuId==''){ echo 'submenu/agregar/'; }else{ echo 'submenu/editar/'; }?>"> 
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Idioma</label>
                        <select name="idioma" id="idioma" class="form-control">
                        	<option value="0">Seleccione Idioma</option>
                        	<?php if (!empty($idiomas_activos)) {foreach ($idiomas_activos as $r1) { ?>
                        	<option value="<?php echo $r1->IdiomaId ?>" <?php if($IdiomaDelMenu==$r1->IdiomaId){ ?> selected="selected"<?php } ?>><?php echo $r1->IdiomaTitulo ?></option>
                        	<?php } } ?>
                        </select> 
                    </div>
                     <div class="col-md-6 mb-3"></div>
                    
                    <div class="col-md-6 mb-3">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="MenuTitulo" id="MenuTitulo" placeholder="Titulo" value="<?php echo !empty($member2[0]->MenuTitulo)?$member2[0]->MenuTitulo:''; ?>" onkeyup="if (isArrowKey(event)) return ;urlAmigable(this.value,<?php echo $IdiomaDelMenu ?>);">
                        <?php echo form_error('MenuTitulo','<div class="invalid-feedback">','</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Titulo SEO</label>
                        <?php $UrlFriendly = !empty($member2[0]->MenuUrlFriendly)?$member2[0]->MenuUrlFriendly:''; ?>
                        <input type="text" class="form-control" name="MenuUrlFriendly" id="MenuUrlFriendly" placeholder="Seo" value="<?php echo !empty($member2[0]->MenuUrlFriendly)?$member2[0]->MenuUrlFriendly:''; ?>" readonly="true">
                        <?php echo form_error('MenuUrlFriendly','<div class="invalid-feedback">','</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Menu Superior</label>
                        <?php  $menu_superior = !empty($member2[0]->IdMenuSup)?$member2[0]->IdMenuSup:'';?>
                        <select name="menu_superior" id="menu_superior" class="form-control">
                        	<option value="0" data-tipo="0">Seleccione Menu Superior</option>
                        	<?php if (!empty($arrlistarSuperior)) {foreach ($arrlistarSuperior as $r2) {?>
                        	<option value="<?php echo $r2['MenuSupIdTxt']; ?>" data-tipo="<?php echo  $r2['MenuTipo']; ?>" <?php  if($menu_superior==$r2['MenuSupIdTxt']){ ?> selected="selected"<?php } ?>><?php echo $r2['MenuSupTitulo'] ?></option>
                        	<?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                    	 <label>Posicion en el menu</label>                       
                        <input type="number" class="form-control" name="MenuPosicion" id="MenuPosicion" placeholder="Menu Posicion" value="<?php echo !empty($member2[0]->MenuPosicion)?$member2[0]->MenuPosicion:''; ?>">
                        <?php echo form_error('MenuPosicion','<div class="invalid-feedback">','</div>'); ?>
                    </div>
                    	
                    </div>
                     
                    <div class="col-md-6 mb-3">
                        <label>Tipo de Menu</label>
                        <?php  $tipoMenu = !empty($member2[0]->MenuTipo)?$member2[0]->MenuTipo:'';?>
                        <select name="tipoMenu" id="tipoMenu" class="form-control" readonly="readonly">                        
                        	<option value="-1" <?php if($tipoMenu=='-1'){ echo 'selected="selected"'; } ?>>Seleccione Tipo de Menu</option>
                        	<option value="1"  <?php if($tipoMenu=='1'){ echo 'selected="selected"'; } ?>>Lista</option> 
                        	<option value="2"  <?php if($tipoMenu=='2'){ echo 'selected="selected"'; } ?>>Mega Menu</option> 
                        	<option value="3"  <?php if($tipoMenu=='3'){ echo 'selected="selected"'; } ?>>Unico</option>                        	
                        </select>
                    </div>
                    <div class="col-md-6 mb-3"></div>
                    
                    <div class="col-md-6 mb-3">
                        <label>Padre Submenu</label>
                        <?php  echo $padreSubmenu = @$member2[0]->MenuPadre;?>
                        <select name="padreSubmenu" id="padreSubmenu" class="form-control" readonly="readonly">
                        	<option value="-1" <?php if($padreSubmenu=='-1'){ echo 'selected="selected"'; } ?>>Seleccione Menu Padre Superior</option>
                        	<option value="0" <?php if($padreSubmenu=='0'){ echo 'selected="selected"'; } ?>>Ninguna</option> 
                        	<?php if (!empty($arrlistarPadres)) {foreach ($arrlistarPadres as $r3) {?>
                        	<option value="<?php echo $r3['MenuUrlFriendly']; ?>" data-columna="<?php echo $r3['MenuUrlFriendly']; ?>" <?php  if($padreSubmenu==$r3['MenuUrlFriendly'] ){ ?> selected="selected"<?php } ?>><?php echo $r3['MenuTitulo'] ?></option>
                        	<?php }} ?>
                        </select>
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <label>Es cabezera de menu</label>
                        <?php  $cabezera = @$member2[0]->MenuCabezera;?>
                        <select name="cabezera" id="cabezera" class="form-control" readonly="readonly">                        
                        	<option value="-1" <?php if($cabezera=='-1'){ echo 'selected="selected"'; } ?>>Seleccione una Opción</option>
                        	
                        	<option value="1" <?php if($cabezera=='1'){ echo 'selected="selected"'; } ?>>SI</option> 
                        	<option value="0" <?php if($cabezera=='0'){ echo 'selected="selected"'; } ?>>NO</option> 
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Columna</label>
                        <?php $columna = @$member2[0]->MenuColumna;?>
                        <select name="columna" id="columna" class="form-control" readonly="readonly">
                        	<option value="-1" <?php if($columna=='-1'){ echo 'selected="selected"'; } ?>>Seleccione una Opción</option>
                        	<option value="0" <?php if($columna=='0'){ echo 'selected="selected"'; } ?>>NO REQUIERE</option> 
                        	<option value="1" <?php if($columna=='1'){ echo 'selected="selected"'; } ?>>IZQUIERDA</option> 
                        	<option value="2" <?php if($columna=='2'){ echo 'selected="selected"'; } ?>>CENTRO</option> 
                        	<option value="3" <?php if($columna=='3'){ echo 'selected="selected"'; } ?>>DERECHA</option> 
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Activo</label>
                        <?php $activo = !empty($member2[0]->MenuActivo)?$member2[0]->MenuActivo:'';?>
                        <select name="activo" id="activo" class="form-control">
                        	<option value="-1" <?php if($activo=='-1'){ echo 'selected="selected"'; } ?>>Seleccione una Opción</option>
                        	<option value="1" <?php if($activo=='1'){ echo 'selected="selected"'; } ?>>SI</option> 
                        	<option value="0" <?php if($activo=='2'){ echo 'selected="selected"'; } ?>>NO</option> 
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Link completo</label>
                        <input type="text" class="form-control" name="MenuUrl" id="MenuUrl" placeholder="Seo" value="<?php echo !empty($member2[0]->MenuUrl)?$member2[0]->MenuUrl:''; ?>" readonly="true">
                        <?php echo form_error('MenuUrl','<div class="invalid-feedback">','</div>'); ?>
                        <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#modalEnlaces">Asignar contenido o servicio al menu</a>
                        <a href="javascript:void(0);" class="btn btn-danger" id="desligar_menu" >Desligar Menu de Servicio/Contenido</a>
                         <input type="hidden" name="MenuId"  id="MenuId" value="<?php echo $MenuId; ?>" />
                    </div>
                </div>
                <input type="hidden" id="linkSitio" name="linkSitio" value="<?php echo base_url()?>" />
                <a href="<?php echo site_url('submenu'); ?>" class="btn btn-secondary">Regresar</a>
               
                <input type="submit" name="memSubmit" id="memSubmit" class="btn btn-success" value="Guardar">
                <?php
                $modulo ='';
                if($MenuId==''){  $modulo = 'submenu/agregar'; }else{  $modulo = 'submenu/edit/'.$MenuId.'/'.$UrlFriendly; }
                
                ?>
                
                <a href="<?php echo site_url($modulo); ?>" class="btn btn-secondary">Cancelar cambios</a>
            </form>
        </div>
    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>


<div id="modalEnlaces" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Enlaces disponibles</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" >
        <table id="tabla-enlaces" class="table">
        	<thead>
        		<tr>
        			<th width="10%"></th>
        			<th width="20%">Tipo</th>
        			<th width="70%">Link</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php /*
        	<tr>
        		<td><a href="javascript:void(0);" class="btn btn-success btn-xs btn-seleccciona" data-id="<?php echo $r4['id'];?>" data-menusup="<?php echo $r4['seccion'];?>" data-menulink="<?php echo $r4['id_txt'];?>" data-menutipo="<?php echo $r4['tipoenlace'];?>" ><i class="fa fa-check"></i></a></td>
        			<td><?php echo $r4['tipoenlace']; ?></td>
        			<td><?php echo $r4['titulo']; ?></td>
        	</tr>
        	
        	*/ ?>
        	<?php if (!empty($arrlistarEnlacesDisponibles)) {foreach ($arrlistarEnlacesDisponibles as $r4) {?>
        		<tr>
        			<td><a href="javascript:void(0);" class="btn btn-success btn-xs btn-seleccciona" data-id="<?php echo $r4['id'];?>" data-menusup="<?php echo strtolower($r4['seccion']);?>" data-menulink="<?php echo $r4['id_txt'];?>" data-menutipo="<?php echo $r4['tipoenlace'];?>" ><i class="fa fa-check"></i></a></td>
        			<td><?php echo $r4['tipoenlace']; ?></td>
        			<td><?php echo $r4['titulo']; ?></td>
        		</tr>
        	<?php } } ?>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
$('form').on('submit', function(e){
	event.preventDefault();
	let errores = '';
	if($('#MenuTitulo').val()==''){
		errores +='<li>Debe de teclear el titulo del menu</li>'
	}
    if($('#menu_superior').val()=='0'){
		errores +='<li>Debe de seleccionar el menu superior</li>'
	}
	
	if($('#activo').val()=='-1'){
		errores +='<li>Debe de seleccionar si esta activo o inactivo el menu</li>'
	}
	
	if(errores!=''){
		
		toastr.error('<ul>'+errores+'</ul>', opts);
		return false;
	}else{
		//alert()
		$("#formSubmenu").submit();
	}
	
		
    
});
/*
$(function() {
  $("#form-submenu").submit(function(e){
	alert();
	event.preventDefault();
    return false;
});
});*/

$('#desligar_menu').click(function(){
	
	$('#MenuUrl').val('');
});

$(".btn-seleccciona").click(function(){
        $("#modalEnlaces").modal("hide");
        let id=$(this).data("id");
        //let id = $(this).attr("data-id");
        // alert(id)
        let linkSitio = $('#linkSitio').val();
        let menusup = $(this).data("menusup");
        let menulink = $(this).data("menulink");
        let menutipo = $(this).data("menutipo");
        let linkCompletoUrl = '';
        
        if(menutipo == 'servicios' && menusup =='0'){
			 linkCompletoUrl = 'servicios/'+menulink;
		}else if(menutipo == 'servicios' && menusup !='0'){
			 linkCompletoUrl = 'servicios/'+menusup+'/'+menulink;
		}else{
			 linkCompletoUrl = menusup+'/'+menulink;
		}
        
        $('#MenuUrl').val(linkCompletoUrl)
});


$("#menu_superior").change(function(){    


   //alert($(this).val()+' '+$(this).find(':selected').data('tipo'));
   let tipo = $(this).find(':selected').data('tipo');
    $('#tipoMenu').val(tipo);
    if(tipo!='2'){
    	$('#padreSubmenu').attr('readonly', 'readonly');
		$('#padreSubmenu').val('0');
		$('#columna').attr('readonly', 'readonly');
		$('#columna').val('0');
		$('#cabezera').attr('readonly', 'readonly');
		$('#cabezera').val('0');
	}else{
		$('#padreSubmenu').removeAttr('readonly');
		$('#padreSubmenu').val('-1')
		$('#columna').removeAttr('readonly');
		$('#columna').val('-1')
		$('#cabezera').removeAttr('readonly');
		$('#cabezera').val('-1')
	}
});  

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
           // $('#idioma-'+idioma).val(m);
            $('#MenuUrlFriendly').val(m);
     }

     function isArrowKey(k_ev)
	{
		var unicode=k_ev.keyCode? k_ev.keyCode : k_ev.charCode;
		if (unicode >= 37 && unicode <= 40)
			return true;
		return false;
	}
	
	
	// toastr configuración
var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-full-width",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			};

</script>