<script type= 'text/javascript'>

		$(document).ready(function () {

			$('#product-grid').DataTable({

				"processing": true,

				"serverSide": true,

				"ajax": "<?php echo base_url(); ?>/personas_admin/get_registros"

			});

			

			$(document).delegate('.delete', 'click', function() { 

				if (confirm('Usted desea borrar el registro?')) {

					var id = $(this).attr('id');

					var parent = $(this).parent().parent();

					$.ajax({

						type: "POST",

						url: "<?php echo base_url(); ?>/personas_admin/delete_registro",

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

					url: "<?php echo base_url(); ?>/personas_admin/update_registro",

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

					url: "<?php echo base_url(); ?>/personas_admin/add_registro",

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

                    <div id="tableRecords">

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

				    <div class="col-md-12 search-panel">

				    <div class="alert alert-info">Le recordamos que para poder agregar un empleado, debe crear primero un inicio de sesion el el area de usuarios <a href="<?php echo base_url()?>usuarios/agregar/" class="btn btn-info">Ir agregar usuario</a></div>

			           <!-- <div class="float-right">

			                <a href="javascript:void(0);" class="btn btn-linkedin" id="btn-addRecord" data-toggle="modal" data-target="#modalAddEdit"><i class="fa fa-plus"></i>Agregar Persona</a>

			            </div>-->

			        </div>

			        <table id="product-grid" class="display table" cellspacing="0" width="100%">

		<thead>

			<tr>

				<th>Id</th>

				<th>Nombre</th>

				<th>Apellido Paterno</th>

				<th>Apellido Materno</th>

				<th>Email</th>

				<th>Orden Jerárquico</th>
				<th>Status</th>

				<th>Opciones</th>

			</tr>

		</thead>

</table>   

			       

			    

				    

				    

				    

				    

				    

				    

                    </div>

                    </div>

                    <div id="movRecords" style="display: none">

                    <div class="card-heading border bottom">

                        <h4 class="card-title" id="titulo_text">EDITAR PERSONA</h4>

                    </div>

                     <div class="card-block">

                     <div id="alert"></div>

<form name="registros" id="registros" method="post">

    <div class="row">

    <div class="col-md-9">

    <div class="row">

    <div class="form-group col-md-4">

	  <label for="PersonaNom">Nombre</label>

	  <input type="text" class="form-control" id="PersonaNom" name="PersonaNom" value="">

	</div>

	 <div class="form-group col-md-4">

	  <label for="PersonaApePat">Apellido Paterno</label>

	  <input type="text" class="form-control" id="PersonaApePat" name="PersonaApePat" value="">

	</div>

	<div class="form-group col-md-4">

	  <label for="PersonaApeMat">Apellido Materno</label>

	  <input type="text" class="form-control" id="PersonaApeMat" name="PersonaApeMat" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaApeMat">Sexo</label>

	  <p>

	  <label class="radio-inline"><input type="radio" value="M" name="PersonaSexo" id="PersonaSexo1">Maculino</label>

      <label class="radio-inline"><input type="radio" value="F" name="PersonaSexo" id="PersonaSexo2">Femenino</label>

      </p>	  

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaTelCel">Celular</label>

	  <input type="text" class="form-control" id="PersonaTelCel" name="PersonaTelCel" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaTelCasa">Telefono Casa</label>

	  <input type="text" class="form-control" id="PersonaTelCasa" name="PersonaTelCasa" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaTelOfi">Telefono Oficina</label>

	  <input type="text" class="form-control" id="PersonaTelOfi" name="PersonaTelOfi" value="">

	</div>

	

	<div class="form-group col-md-4">

	  <label for="PersonaParticipaEmpresa">Puesto en la Empresa</label>

	  <input type="text" class="form-control" id="PersonaParticipaEmpresa" name="PersonaParticipaEmpresa" value="">

	</div>

	<div class="form-group col-md-4">

	  <label for="PersonaParticipaEmpresa">Email</label>

	  <input type="text" class="form-control" id="PersonaEmail" name="PersonaEmail" value="">

	</div>

	<div class="form-group col-md-4">

	 

	</div>

	<div class="form-group col-md-4">

	  <label for="PersonaParticipaEmpresa">Linkedin</label>

	  <input type="text" class="form-control" id="PersonaLinkedin" name="PersonaLinkedin" value="">

	</div>

	<div class="form-group col-md-4">

	  <label for="PersonaParticipaEmpresa">Twitter</label>

	  <input type="text" class="form-control" id="PersonaTwitter" name="PersonaTwitter" value="">

	</div>

	

	

	

	</div>

    </div>

    <div class="col-md-3">

    	<div class="form-group col-md-12">

	 

	  <input type="hidden" class="form-control" id="PersonaFoto" name="PersonaFoto" value="">

	  	<label>

												Foto

											</label><br>



											<input  id="banner_bg" name="banner_bg" type="hidden" class="form-control" value="<?php echo !empty(@$member->banner_bg)?@$member->banner_bg:''; ?>" >



											<a href="javascript:open_popup('<?php echo base_url(); ?>assets/libs/filemanager/dialog.php?type=2&popup=1&field_id=banner_bg&Yave=12345')" class="btn btn-success" >

												Seleccionar Imagen

											</a>

                  	

                  <div class="col-lg-12 col-md-12">

                  	<img src="<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg" class="img-responsive" id="foto"  style="width: 160px">

                  </div>

	</div>

    </div>

    

    <div class="form-group col-md-12">

	  <label for="PersonaDirOfi">Dirección Oficina</label>

	  <input type="text" class="form-control" id="PersonaDirOfi" name="PersonaDirOfi" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaPaisOfi">Pais</label>

	  <input type="text" class="form-control" id="PersonaPaisOfi" name="PersonaPaisOfi" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaEstadoOfi">Estado</label>

	  <input type="text" class="form-control" id="PersonaEstadoOfi" name="PersonaEstadoOfi" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaCiudadOfi">Ciudad</label>

	  <input type="text" class="form-control" id="PersonaCiudadOfi" name="PersonaCiudadOfi" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaCpOfi">CP</label>

	  <input type="text" class="form-control" id="PersonaCpOfi" name="PersonaCpOfi" value="">

	</div>

	

	<div class="form-group col-md-12">

	  <label for="texto">Reseña curricular</label>

	  <textarea class="form-control" id="texto" name="texto"></textarea>

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaFchCrea">Fecha de Creación</label>

	  <input type="text" class="form-control" id="PersonaFchCrea" name="PersonaFchCrea" value="" readonly="true">

	</div>

	

	<div class="form-group col-md-3">

	  <label for="PersonaFchAlta">Fecha de Alta en la Empresa</label>

	  <input type="text" class="form-control" id="PersonaFchAlta" name="PersonaFchAlta" value="">

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaApeMat">Status usuario</label>

	  <p>

	  <label class="radio-inline"><input type="radio" value="1" name="PersonaStatus" id="PersonaStatus1">ACTIVO</label>

      <label class="radio-inline"><input type="radio" value="0" name="PersonaStatus" id="PersonaStatus2">INACTIVO</label>

      </p>	  

	</div>

	<div class="form-group col-md-3">

	  <label for="PersonaOrden">Orden Jerárquico</label>

	  <input type="text" class="form-control" id="PersonaOrden" name="PersonaOrden" value="">

	</div>

	</div>

    <input type="hidden" name="PersonaId" id="PersonaId" />

    <input type="hidden" name="PersonaUsu" id="PersonaUsu" />

    <input type="hidden" name="memSubmit" id="memSubmit" value="true">

	<button type="submit" class="btn btn-primary" id="btn-guardar" name="btn-guardar">Guardar</button>

	<a href="#" class="btn btn-default" id="btn-cerrarVentana">Cerrar</a>

	

       	

</form>

</div>

</div>                    

                    

                    

                    </div>





                </div>

	        </div>        

	    </div>

    </div>

</div>





<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>

<script>



function responsive_filemanager_callback(field_id){

	var url=$('#'+field_id).val();

	//alert(url)

	res = url.replace("../../../../docs","docs");

	res2 = url.replace("<?php echo base_url()?>","");

	//alert(res)

	$('#PersonaFoto').val(res2);

    $("#foto").attr("src",res);

   // $('.fancybox-close').click();

	setTimeout(function(){ $('.fancybox-close').click(); }, 6);



	//close_window();

	//your code

}



$(document).ready(function(){

	$('#tableRecors').show('slow');

	$('#movRecords').hide('slow');

});	

	$('#btn-addRecord').click(function(){

		$('#tableRecords').hide('slow');

	    $('#movRecords').show('slow');	

	    $('#titulo_text').text('AGREGAR REGISTRO');

	});

	

	

	

	

	

	

	

	$(document).delegate('.edit', 'click', function() {	

	    $('#tableRecords').hide('slow');

	    $('#movRecords').show('slow');	

	    $('#titulo_text').text('EDITAR REGISTRO');

	    let id = $(this).data("id");

	    $.ajax({

			type: "POST",

			url: "<?php echo base_url(); ?>/personas_admin/ver_registro", 

			data: 'id=' + id,

			cache: false,

			success: function(data) {

				let obj =  JSON.parse(data);

				//

				$('#PersonaId').val(obj.PersonaId);

				$('#PersonaUsu').val(obj.PersonaUsu);

				$('#PersonaNom').val(obj.PersonaNom);

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

				CKEDITOR.instances['texto'].setData(obj.PersonaResumen);

				$('#texto').val(obj.PersonaResumen);

				$('#PersonaFchCrea').val(obj.PersonaFchCrea);

				$('#PersonaFchAlta').val(obj.PersonaFchAlta);

				//$('#PersonaStatus').val(obj.PersonaResumen);

				

				if(obj.PersonaStatus =='1'){

					$('input:radio[name=PersonaStatus][value=1]').attr('checked', true);

				}else{

					$('input:radio[name=PersonaStatus][value=0]').attr('checked', true);

				}
				$('#PersonaOrden').val(obj.PersonaOrden);			

			},

			error: function() {

				$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error consultar registro').fadeIn().fadeOut(4000, function() {

					$(this).remove();

				});

			}

		});

	    

	});

	

	

$('#btn-cerrarVentana').click(function(){

	$('#registros').trigger("reset");

	$('#tableRecords').show('slow');

    $('#movRecords').hide('slow');	

});

	

$("#registros").validate({

			event: "blur",

			rules: {

				PersonaNom: {

					required: true,

					minlength: 3

					},

				PersonaApePat: {

					required: true,

					minlength: 3,

					},

				PersonaApeMat:{

					required: true,

					minlength: 3,

				},

				PersonaParticipaEmpresa:{

					required: true,

					minlength: 5,

				},

				PersonaEmail:{

					required: true,

					email: true,

				},

				},

			messages: {

				PersonaNom: {

					required: "Por favor teclee el nombre de la persona",

					minlength: "El nombre debe tener al menos 3 caracteres"

					},

				PersonaApePat: {

					required: "Por favor teclee el apellido paterno",

					minlength: "El apellido paterno debe tener al menos 3 caracteres",

					},

                PersonaApeMat: {

					required: "Por favor teclee el apellido materno",

					minlength: "El apellido materno debe tener al menos 3 caracteres",

					},

				PersonaParticipaEmpresa: {

					required: "Por favor teclee el puesto",

					minlength: "El puesto debe tener al menos 5 caracteres",

					},

				PersonaEmail: {

					required: "Por favor teclee el email",

					email: "El el email debe se run correo valido",

					},

				},

			debug: true,errorElement: "label",

			submitHandler: function(form) {
                CKEDITOR.instances.texto.updateElement();
				$('#registros').hide();

				$("#alert").show();

				$("#alert").html("<p align='center'><img src='<?php echo base_url(); ?>assets/admin/images/wait.gif' style='vertical-align:middle;margin:0 10px 0 0' /><br /><strong>Guardando cambios...</strong></p>");

				setTimeout(function() {

					$('#alert').fadeOut('slow');

					}, 2000);

	             $.ajax({

			        type: "POST",

			        url: "<?php echo base_url();?>personas_admin/editar/",

			        data: $('#registros').serialize(),

			        success: function(result) {

			           // alert(result);

			           $('#registros').show();

			           $('#product-grid').DataTable().ajax.reload();

			           $("#movRecords").hide();

			           $("#tableRecords").show();

			        },

			        error: function(result) {

			            alert('error');

			        }

			    });

				}

			});

	

$("#registros11").submit(function(e) {

	e.preventDefault();

	$.ajax({

        type: "POST",

        url: "<?php echo base_url();?>personas_admin/editar/",

        data: $('#registros').serialize(),

        success: function(result) {

            alert(result);

        },

        error: function(result) {

            alert('error');

        }

    });

	

});

	

$(document).delegate('#btn-guardar2', 'click', function() {

	e.preventDefault();

	alert();

    $.ajax({

        type: "POST",

        url: "/pages/test/",

        data: { 

            id: $(this).val(), // < note use of 'this' here

            access_token: $("#access_token").val() 

        },

        success: function(result) {

            alert('ok');

        },

        error: function(result) {

            alert('error');

        }

    });



});

	

CKEDITOR.replace( 'texto' ,{ 
	filebrowserBrowseUrl : '/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', 
	filebrowserUploadUrl : '/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', 
	filebrowserImageBrowseUrl : '/assets/libs/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&Yave=12345' 
});




function open_popup(url)



{



    var w = 880;



    var h = 570;



    var l = Math.floor((screen.width-w)/2);



    var t = Math.floor((screen.height-h)/2);



    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);



}

</script>

