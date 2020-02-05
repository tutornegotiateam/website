<script type= 'text/javascript'>
		$(document).ready(function () {
			$('#product-grid').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "<?php echo base_url(); ?>/descubre_admin/get_registros"
			});
			
			$(document).delegate('.delete', 'click', function() { 
				if (confirm('Usted desea borrar el registro?')) {
					var id = $(this).attr('id');
					var parent = $(this).parent().parent();
					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>/descubre_admin/delete_registro",
						data: 'id=' + id,
						cache: false,
						success: function() {
							parent.fadeOut('slow', function() {
								$(this).remove();
							});
						},
						error: function() {
							$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error al borrar registro').fadeIn().fadeOut(4000, function() {
								$(this).remove();
							});
						}
					});
				}
			});
			
			$(document).delegate('.editxxx', 'click', function() {
				var parent = $(this).parent().parent();
				
				var id = parent.children("td:nth-child(1)");
				var name = parent.children("td:nth-child(2)");
				var price = parent.children("td:nth-child(3)");
				var sale_price = parent.children("td:nth-child(4)");
				var sale_count = parent.children("td:nth-child(5)");
				var sale_date = parent.children("td:nth-child(6)");
				var buttons = parent.children("td:nth-child(7)");
				
				name.html("<input type='text' id='txtName' value='"+name.html()+"'/>");
				price.html("<input type='text' id='txtPrice' value='"+price.html()+"'/>");
				sale_price.html("<input type='text' id='txtSalePrice' value='"+sale_price.html()+"'/>");
				sale_count.html("<input type='text' id='txtSaleCount' value='"+sale_count.html()+"'/>");
				sale_date.html("<input type='text' id='txtSaleDate' value='" + sale_date.html()+"'/>");
				buttons.html("<button id='save' class='btn btn-success  btn-sm'><i class=\'fa fa-pencil\'></i></button>&nbsp;&nbsp;<button class='delete btn btn-danger btn-sm' id='" + id.html() + "'><i class=\'fa fa-remove\'></i></button>");
			});
			
			$(document).delegate('#save', 'click', function() {
				var parent = $(this).parent().parent();
				
				var id = parent.children("td:nth-child(1)");
				var name = parent.children("td:nth-child(2)");
				var price = parent.children("td:nth-child(3)");
				var sale_price = parent.children("td:nth-child(4)");
				var sale_count = parent.children("td:nth-child(5)");
				var sale_date = parent.children("td:nth-child(6)");
				var buttons = parent.children("td:nth-child(7)");
				
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>/descubre_admin/update_registro",
					data: 'id=' + id.html() + '&name=' + name.children("input[type=text]").val() + '&price=' + price.children("input[type=text]").val() + '&sale_price=' + sale_price.children("input[type=text]").val() + '&sale_count=' + sale_count.children("input[type=text]").val() + '&sale_date=' + sale_date.children("input[type=text]").val(),
					cache: false,
					success: function() {
						name.html(name.children("input[type=text]").val());
						price.html(price.children("input[type=text]").val());
						sale_price.html(sale_price.children("input[type=text]").val());
						sale_count.html(sale_count.children("input[type=text]").val());
						sale_date.html(sale_date.children("input[type=text]").val());
						buttons.html("<button class='edit btn btn-success' id='" + id.html() + "'><i class=\'fa fa-pencil\'></i></button>&nbsp;&nbsp;<button class='delete btn btn-danger btn-sm' id='" + id.html() + "'><i class=\'fa fa-remove\'></i></button>");
					},
					error: function() {
						$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error al actualizar el registro').fadeIn().fadeOut(4000, function() {
							$(this).remove();
						});
					}
				});
			});
			
			$(document).delegate('#addNew', 'click', function(event) {
				event.preventDefault();
				
				var str = $('#add').serialize();
				
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>/descubre_admin/add_registro",
					data: str,
					cache: false,
					success: function() {
						$("#msgAdd").html( "<span style='color: green'>Product added successfully</span>" );
					},
					error: function() {
						$("#msgAdd").html( "<span style='color: red'>Error adding a new product</span>" );
					}
				});
			});
		});
	</script>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
	        <div class="col-lg-12 col-md-12">
                <div class="card">
                  <div id="alert"></div>
                    <div id="movRecords">
                    <div class="card-heading border bottom">
                        <h4 class="card-title" id="titulo_text"><?php echo $title ?></h4>
                    </div>
                     <div class="card-block">
<form name="registros" id="registros" action="">
<div class="row">
    <div class="col-md-9">
    <div class="row">
    <div class="form-group col-md-6">
	  <label for="empresa">Empresa</label>
	  <input type="text" class="form-control" id="empresa" name="empresa" value="">
	   <input type="hidden" class="form-control" id="id" name="id" value="1">
	</div>
	<div class="form-group col-md-6">
	  <label for="lema">Lema</label>
	  <input type="text" class="form-control" id="lema" name="lema" value="">
	</div>
	<div class="form-group col-md-12">
	  <label for="lema">Pie</label>	  
	  <textarea class="form-control" id="pie" name="pie"></textarea>
	</div>
	<div class="form-group col-md-12">
	  <label for="lema">Direccion</label>	  
	  <textarea class="form-control" id="direccion" name="direccion"></textarea>
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Ciudad</label>	  
	  <input type="text" class="form-control" id="ciudad" name="ciudad">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Estado</label>	  
	  <input type="text" class="form-control" id="estado" name="estado">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Pais</label>	  
	  <input type="text" class="form-control" id="pais" name="pais">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Telefóno 1</label>	  
	  <input type="text" class="form-control" id="telefono_ofi1" name="telefono_ofi1">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Telefóno 2</label>	  
	  <input type="text" class="form-control" id="telefono_ofi2" name="telefono_ofi2">
	</div>
	<div class="form-group col-md-4">
	<label for="lema">Correo de contácto</label>	  
	  <input type="text" class="form-control" id="email" name="email">
	</div>
	<div class="form-group col-md-6">
	  <label for="lema">Facebook</label>	  
	  <input type="text" class="form-control" id="facebook" name="facebook">
	</div>
	<div class="form-group col-md-6">
	  <label for="lema">Twitter</label>	  
	  <input type="text" class="form-control" id="twitter" name="twitter">
	</div>
	<div class="form-group col-md-6">
	  <label for="lema">linkedin</label>	  
	  <input type="text" class="form-control" id="linkedin" name="linkedin">
	</div>
	<div class="form-group col-md-6">
	  <label for="lema">Youtube</label>	  
	  <input type="text" class="form-control" id="youtube" name="youtube">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Url del sitio</label>	  
	  <input type="text" class="form-control" id="url" name="url">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Creado</label>	  
	  <input type="text" class="form-control" id="fecha_crea" name="fecha_crea" readonly="true">
	</div>
	<div class="form-group col-md-4">
	  <label for="lema">Última actualizaciòn</label>	  
	  <input type="text" class="form-control" id="fecha_mod" name="fecha_mod" readonly="true">
	</div>
	
</div>
</div>

<div class="col-md-3">
   <!-- <div class="row">
    Logo Header
    </div>
    <div class="row">
    Logo Footer
    </div>-->
</div>
</div>




    <div class="row">
    <input type="hidden" name="memSubmit" value="true" id="memSubmit"/>
	<button type="submit" class="btn btn-primary">Guardar</button>
	</div>
       	
</form>
</div>                    
                    
                    
                    </div>


                </div>
	        </div>        
	    </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
CKEDITOR.replace('direccion', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Anchor,Styles,Specialchar'
    });
CKEDITOR.replace('pie', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Anchor,Styles,Specialchar'
    });
$(document).ready(function(){
	 let id = $('#id').val();
	    $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>/empresa/ver_registro", 
			data: 'id=' + id,
			cache: false,
			success: function(data) {
				let obj =  JSON.parse(data);
				//
				$('#empresa').val(obj.empresa);
				$('#lema').val(obj.lema);
				//$('#direccion').val(obj.direccion);
				CKEDITOR.instances['direccion'].setData(obj.direccion);
				CKEDITOR.instances['pie'].setData(obj.pie);
				$('#ciudad').val(obj.ciudad);
				$('#estado').val(obj.estado);
				$('#pais').val(obj.pais);
				$('#telefono_ofi1').val(obj.telefono_ofi1);
				$('#telefono_ofi2').val(obj.telefono_ofi2);
				$('#email').val(obj.email);
				$('#facebook').val(obj.facebook);
				$('#twitter').val(obj.twitter);
				$('#youtube').val(obj.youtube);
				$('#linkedin').val(obj.linkedin);
				$('#url').val(obj.url);
				$('#logo1').val(obj.logo1);
				$('#logo2').val(obj.logo2);
				$('#fecha_crea').val(obj.fecha_crea);
				$('#fecha_crea').val(obj.fecha_crea);
				/*$('#PersonaNom').val(obj.PersonaNom);
				$('#PersonaApePat').val(obj.PersonaApePat);
				$('#PersonaApeMat').val(obj.PersonaApeMat);
				
				if(obj.PersonaSexo =='M'){
					$('input:radio[name=PersonaSexo][value=M]').attr('checked', true);
				}else{
					$('input:radio[name=PersonaSexo][value=F]').attr('checked', true);
				}
				$('#PersonaTelCasa').val(obj.PersonaTelCasa);
				$('#PersonaTelCel').val(obj.PersonaTelCel);
				$('#PersonaTelOfi').val(obj.PersonaTelOfi);
				$('#PersonaParticipaEmpresa').val(obj.PersonaParticipaEmpresa);
				$('#PersonaEmail').val(obj.PersonaEmail);
				$('#PersonaTwitter').val(obj.PersonaTwitter);
				$('#PersonaLinkedin').val(obj.PersonaLinkedin);
				$('#PersonaDirOfi').val(obj.PersonaDirOfi);
				$('#PersonaPaisOfi').val(obj.PersonaPaisOfi);
				$('#PersonaEstadoOfi').val(obj.PersonaEstadoOfi);
				$('#PersonaCiudadOfi').val(obj.PersonaCiudadOfi);
				$('#PersonaCpOfi').val(obj.PersonaCpOfi);
				$('#PersonaFoto').val(obj.PersonaFoto);
				let imagen ='';
				if(obj.PersonaFoto==null || obj.PersonaFoto=='' ){
					 imagen = '<?php echo base_url(); ?>public/uploads/utils/noimage.jpg'; 
				}else{
					 imagen = '<?php echo base_url(); ?>'+obj.PersonaFoto;
					 
				}
				$("#foto").attr("src",imagen);
				
				$('#texto').val(obj.PersonaResumen);
				$('#PersonaFchCrea').val(obj.PersonaFchCrea);
				$('#PersonaFchAlta').val(obj.PersonaFchAlta);
				//$('#PersonaStatus').val(obj.PersonaResumen);
				
				if(obj.PersonaStatus =='1'){
					$('input:radio[name=PersonaStatus][value=1]').attr('checked', true);
				}else{
					$('input:radio[name=PersonaStatus][value=0]').attr('checked', true);
				}	*/			
			},
			error: function() {
				$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error consultar registro').fadeIn().fadeOut(4000, function() {
					$(this).remove();
				});
			}
		});
	
	
});	
	
	$(document).delegate('.edit', 'click', function() {	
	    $('#tableRecords').hide('slow');
	    $('#movRecords').show('slow');	
	    $('#titulo_text').text('EDITAR REGISTRO');
	});
	
	
	$('#btn-cerrarVentana').click(function(){
		$('#registros').trigger("reset");
		$('#tableRecords').show('slow');
	    $('#movRecords').hide('slow');	
	});
	

	/*
CKEDITOR.replace( 'texto' ,{ filebrowserBrowseUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', filebrowserUploadUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', filebrowserImageBrowseUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&Yave=12345' });
*/
		    

function open_popup(url)

{

    var w = 880;

    var h = 570;

    var l = Math.floor((screen.width-w)/2);

    var t = Math.floor((screen.height-h)/2);

    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);

}


$("#registros").validate({
			event: "blur",
			rules: {
				empresa: {
					required: true,
					minlength: 3
					},
				},
			messages: {
				empresa: {
					required: "Por favor teclee el nombre de la persona",
					minlength: "El nombre debe tener al menos 3 caracteres"
					},
				},
			debug: true,errorElement: "label",
			submitHandler: function(form) {
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
				$('#registros').hide();
				$("#alert").show();
				$("#alert").html("<p align='center'><img src='<?php echo base_url(); ?>assets/admin/images/wait.gif' style='vertical-align:middle;margin:0 10px 0 0' /><br /><strong>Guardando cambios...</strong></p>");
				setTimeout(function() {
					$('#alert').fadeOut('slow');
					}, 2000);
	             $.ajax({
			        type: "POST",
			        url: "<?php echo base_url();?>empresa/editar/",
			        data: $('#registros').serialize(),
			        success: function(result) {
			           // alert(result);
			           $('#registros').show();
			           //$('#product-grid').DataTable().ajax.reload();
			           $("#movRecords").show();
			           //$("#tableRecords").show();
			        },
			        error: function(result) {
			            alert('error');
			        }
			    });
				}
			});
</script>
