<div class="main-content">
    <div class="container-fluid">
        <div class="row">
	        <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                    </div>
                    <div class="card-block">
                    
                    <div id="banners-tabla">
                    <div class="col-lg-12 col-md-12"><a href="javascript:void(0);" class="btn btn-success" id="btn-add-banner">Agregar Banner</a></div>
                    <table id="banners-datos"> 
                    	<thead>
                    		<tr>
                    			<th>ID</th>
                    			<th>IMAGEN</th>
                    			<th>BANNER</th>
                    			<th>STATUS</th>
                    			<th>OPCIONES</th>
                    		</tr>
                    	</thead>
                       	<tbody>
                       	<?php
                       	if (!empty($arr_banners)) {
									foreach ($arr_banners as $row) { ?>
                    		<tr id="<?php echo $row['id']?>">
                    			<td><?php echo $row['id']?></td>
                    			<td>
                    			<?php if($row['archivo']==''){ ?>
									
								
                    			<img src="<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg" class="img-responsive" id="foto<?php echo $row['id']?>"  style="width: 360px">
                    			<?php }else{ ?>
									
								
                    			<img src="<?php echo $row['archivo']?>" class="img-responsive" id="foto<?php echo $row['id']?>"  style="width: 100px">
                    			<?php } ?>
                    			</td>
                    			<td><?php echo $row['titulo']?></td>
                    			<td><?php if($row['status']==1){ echo "<span class='badge badge-success'>Activo</span>"; }else{ echo "<span class='badge badge-danger'>Inactivo</span>";};?></td>
                    			<td><a href="javascript:void(0);" class="btn btn-success btn-edit-banner" data-id="<?php echo $row['id']?>" data-titulo="<?php echo $row['titulo']?>" data-banner="<?php echo $row['archivo']?>" data-tipo="<?php echo $row['tipo']?>" data-texto1="<?php echo $row['texto1']?>" data-texto2="<?php echo $row['texto2']?>" data-texto3="<?php echo $row['texto3']?>"  data-texto4="<?php echo $row['texto4']?>" data-status="<?php echo $row['status']?>">Editar</a><a href="javascript:void(0);" class="btn btn-danger btn-del-banner" data-id="<?php echo $row['id']?>">Borrar</a></td>
                    		</tr>
                    	<?php }} ?>
                    	</tbody>
                    </table>
                    </div>
                    <div id="banners-captura" style="display: none">
                    <h3 id="titulo_txt">AGREGAR BANNER</h3>
                  <form id="form_banners" name="form_banners">
                  <div class="row">
                  <div class="col-lg-6 col-md-6">
                  <div class="form-group">
				    <label for="titulo">Banner</label>
				    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Teclee el título de banner">
				  </div>
                  <div class="form-group">
                  	<label for="banner">Tipo de Banner</label><br/>
				    <div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo1" name="tipo" value="1">
					  <label class="custom-control-label" for="tipo1">Imagen</label>
					</div>

					<!-- Default inline 2-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo2" name="tipo" value="2">
					  <label class="custom-control-label" for="tipo2">Html</label>
					</div>

					<!-- Default inline 3-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo3" name="tipo" value="3">
					  <label class="custom-control-label" for="tipo3">Video</label>
					</div>
                  </div>
                  <div class="form-group">
				    <label for="texto1">Texto 1</label>
				    <input type="text" class="form-control" id="texto1" name="texto1" placeholder="Texto linea 1" disabled="true">
				  </div>
				  <div class="form-group">
				    <label for="texto2">Texto 2</label>
				    <input type="text" class="form-control" id="texto2" name="texto2" placeholder="Texto linea 2" disabled="true">
				  </div>
				   <div class="form-group">
				    <label for="texto3">Texto 3</label>
				    <input type="text" class="form-control" id="texto3" name="texto3" placeholder="Texto linea 3" disabled="true">
				  </div>
				  
				  <div class="form-group">
				    <label for="texto3">Texto 4</label>
				    <input type="text" class="form-control" id="texto4" name="texto4" placeholder="Texto linea 4" disabled="true">
				  </div>
				  <div class="form-group">
				    <label for="status">Status</label><br/>
				    <div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="status0" name="status" value="1">
					  <label class="custom-control-label" for="status0">Activo</label>
					</div>

					<!-- Default inline 2-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="status1" name="status" value="0">
					  <label class="custom-control-label" for="status1">Inactivo</label>
					</div>

				  </div>
				  <div class="form-group">
				   <input type="hidden" name="id" id="id">
				   <button type="submit" class="btn btn-primary" name="btn-save-banner">Guardar</button>
				  <a href="javascript:void(0);" class="btn btn-default" id="btn-cancelar-banner">Cancelar</a>
				  </div>
				  
				  
                  </div>
                  
                  <div class="col-lg-6 col-md-6">
                  	<label>
												Archivo
											</label>

											<input  id="banner_bg" name="banner_bg" type="text" class="form-control" value="<?php echo !empty(@$member->banner_bg)?@$member->banner_bg:''; ?>" >

											<a href="javascript:open_popup('<?php echo base_url(); ?>assets/libs/filemanager/dialog.php?type=2&popup=1&field_id=banner_bg&Yave=12345')" class="btn btn-success" >
												Seleccionar Imagen
											</a>
                  	
                  <div class="col-lg-12 col-md-12">
                  	<img src="<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg" class="img-responsive" id="foto"  style="width: 360px">
                  </div>
                  </div>
                
                  </div>
               
				 
				  
				</form>
                    </div>
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>
 <script src="<?php echo base_url()?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
$(function() {
	$('#banners-captura').hide(1000);
    $('#banners-tabla').show(1000); 
});



$('#form_banners').submit(function(e) {
	e.preventDefault();	 
    $("#form_banners").validate({
	  rules: {
	    titulo: "required",
	    banner_bg: "required",
	    tipo: "required",
	    status: "required"
	  },
	  messages: {
	    titulo: "El campo Titulo es requerido",
	    banner_bg: "El campo Archivo es requerido",
	    tipo: "El campo Tipo es requerido",
	    status: "El campo Status es requerido"
	  }
});
let id2  = $("#id").val();
$.ajax({
        url: '<?php echo base_url();?>banners_admin/guardar',
        type: 'post',
        data:  $("#form_banners").serialize(),
        success: function (result) {
            bootbox.alert("Se agrego correctamente el registro");
            //$('table#banners-datos tr#'+a).remove();
            let id = result;
            var titulo = $("#titulo").val();
            var img = '<img src="'+$("#banner_bg").val()+'" class="img-responsive" id="foto'+id+'"  style="width: 100px">';
            var status = $('input:radio[name=status]:checked').val();
            var span_status = '';
            if(status ==1){
				span_status = "<span class='badge badge-success'>Activo</span>";
			}else{
				span_status = "<span class='badge badge-danger'>Inactivo</span>";
			}
            var tipo = $('input:radio[name=tipo]:checked').val();
            
            if(id2==''){ //INSERTAR
				let botones = '<a href="javascript:void(0);" class="btn btn-success btn-edit-banner" data-id="'+id+'" data-titulo="'+id+'" data-banner="'+img+'" data-tipo="'+tipo+'" data-texto1="'+texto1+'" data-texto2="'+texto2+'" data-texto3="'+texto3+'"  data-texto4="'+texto4+'" data-status="'+status+'">Editar</a><a href="javascript:void(0);" class="btn btn-danger btn-del-banner" data-id="'+id+'" >Borrar</a>'
            var markup = "<tr id='"+id+"'><td>" + id + "</td><td>" + img + "</td><td>" + titulo + "</td><td>" + span_status + "</td><td>" + botones + "</td></tr>";
            $("table#banners-datos tbody").append(markup);
			}else{ //EDITAR
				//$($('table#banners-datos').find('tbody > tr')[pos]).children('td')[3].innerHTML = 'horacorre';
				//$($('table#banners-datos').find('tr['+id2+']')).children('td:eq(3)').text('horacorre');
				$('table#banners-datos').find("td:eq(1)").html(img);
				$('table#banners-datos').find("td:eq(2)").html(titulo);
				$('table#banners-datos').find("td:eq(3)").html(span_status);
			}
            
            $('#banners-captura').hide(1000);
            $('#banners-tabla').show(1000); 
            $('#form_banners').trigger("reset"); 
            $("#foto").attr("src","<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg");
            
        },
        error: function () {
            bootbox.alert("Ocurrio un error");
        }
 });

});

$("#btn-save-banner").click(function(e) {
        e.preventDefault();
        alert()
        /*
        $('#banners-captura').show(1000);
        $('#banners-tabla').hide(1000); 
        */  
});
//editar
$('#banners-tabla').on('click', '.btn-edit-banner', function(e){
//$(".btn-edit-banner").click(function(e) {
        e.preventDefault();
        let id = $(this).data("id");
        let titulo = $(this).data("titulo");
        let tipo = $(this).data("tipo");
        let imagen = $(this).data("banner");
        let texto1 = $(this).data("texto1");
        let texto2 = $(this).data("texto2");
        let texto3 = $(this).data("texto3");
        let texto4 = $(this).data("texto4");
        let status = $(this).data("status");
        $('#id').val(id)
       
        $('#titulo_txt').text('Editar Banner'); 
        $('#titulo').val(titulo);
        $('#banner_bg').val(imagen);
       if(imagen==''){
			$("#foto").attr("src","<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg");
		}else{
			$("#foto").attr("src",imagen);
		}
		$("input[name=tipo][value="+tipo+"]").prop('checked', true);
		//$('#tipo').val(tipo);
		$('#texto1').val(texto1);
		$('#texto2').val(texto2);
		$('#texto3').val(texto3);
		$('#texto4').val(texto4);
		$("input[name=status][value="+status+"]").prop('checked', true);
	    if(tipo==2)  {
		 $("#texto1").prop("disabled", false);
		 $("#texto2").prop("disabled", false);
		 $("#texto3").prop("disabled", false);
		 $("#texto3").prop("disabled", false);
	}else{
		$("#texto1").prop("disabled", true);
		$("#texto2").prop("disabled", true);
		$("#texto3").prop("disabled", true);
		$("#texto3").prop("disabled", true);
	} 
        //alert(a);
     
        $('#banners-captura').show(1000);
        $('#banners-tabla').hide(1000); 
        //$('#form_banners').trigger("reset"); 
        
       // $("#foto").attr("src","<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg");
        /*
        $('#banners-captura').show(1000);
        $('#banners-tabla').hide(1000); 
        */  
});

//borrar
$('#banners-tabla').on('click', '.btn-del-banner', function(e){
///$(".btn-del-banner").click(function(e) {
        e.preventDefault();
        let a = $(this).data("id");
        
         bootbox.confirm({
		    message: "Usted desea borrar el banner?",
		    buttons: {
		        confirm: {
		            label: 'Si',
		            className: 'btn-success'
		        },
		        cancel: {
		            label: 'No',
		            className: 'btn-danger'
		        }
		    },
		    callback: function (result) {
		        if(result==true){
		        	
		        	
		        	$.ajax({
		            url: '<?php echo base_url();?>banners_admin/borrar',
		            type: 'post',
		            data: { id : a },
		            success: function () {
		                bootbox.alert("Se borro correctamente el banner");
		                // $( "#listados" ).append( btn );
		                $('table#banners-datos tr#'+a).remove();
		                $('#form_banners').trigger("reset"); 
		                $("#foto").attr("src","<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg");
		            },
		            error: function () {
		                bootbox.alert("Ocurrio un error");
		            }
		       		});
		        	
		        	
					
				}else{
					
					//bootbox.alert("Ocurrio un error");
				}
		    }
		});
        /*
        $('#banners-captura').show(1000);
        $('#banners-tabla').hide(1000); 
        */  
});

$("#btn-add-banner").click(function(e) {
        e.preventDefault();
        $('#titulo_txt').text('Agregar Banner');
        $('#banners-captura').show(1000);
        $('#banners-tabla').hide(1000);   
});

$("#btn-cancelar-banner").click(function(e) {
        e.preventDefault();
        $('#banners-captura').hide(1000);
        $('#banners-tabla').show(1000);  
        $('#form_banners').trigger("reset");  
});

$("input[name=tipo]").click(function () {  

    if($(this).val()==2)  {
		 $("#texto1").prop("disabled", false);
		 $("#texto2").prop("disabled", false);
		 $("#texto3").prop("disabled", false);
		 $("#texto4").prop("disabled", false);
	}else{
		$("#texto1").prop("disabled", true);
		$("#texto2").prop("disabled", true);
		$("#texto3").prop("disabled", true);
		$("#texto4").prop("disabled", true);
	} 
});

function open_popup(url)
{
	var w = 880;
	var h = 570;
	var l = Math.floor((screen.width-w)/2);
	var t = Math.floor((screen.height-h)/2);
	var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
}

function responsive_filemanager_callback(field_id){
	var url=$('#'+field_id).val();
	res = url.replace("../../../../docs","docs");
    $("#foto").attr("src",res);
	setTimeout(function(){ $('.fancybox-close').click(); }, 6);

	//close_window();
	//your code
}
</script>