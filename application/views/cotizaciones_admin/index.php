<script type= 'text/javascript'>
		$(document).ready(function () {
			$('#product-grid').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "<?php echo base_url(); ?>/cotizaciones_admin/get_registros"
			}); 
			
			$(document).delegate('.delete', 'click', function() { 
				if (confirm('Usted desea borrar el registro?')) {
					var id = $(this).attr('id');
					var parent = $(this).parent().parent();
					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>/cotizaciones_admin/delete_registro",
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
					url: "<?php echo base_url(); ?>/cotizaciones_admin/update_registro",
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
					url: "<?php echo base_url(); ?>/cotizaciones_admin/add_registro",
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
				   <!-- <div class="col-md-12 search-panel">
			            <div class="float-right">
			                <a href="javascript:void(0);" class="btn btn-linkedin" id="btn-addRecord" data-toggle="modal" data-target="#modalAddEdit"><i class="fa fa-plus"></i>Agregar Registro</a>
			            </div>
			        </div>-->
			        <table id="product-grid" class="display table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Folio</th>
				<th>Tema</th>
				<th>Persona</th>
				<th>Empresa</th>
				<th>Fecha</th>
				<th>Status</th> 
				<th>Opciones</th>
			</tr>
		</thead>
</table>   
			       
			    
				    
				    
				    
				    
				    
				    
                    </div>
                    </div>
                    <div id="movRecords" style="display: none">
                    <div class="card-heading border bottom">
                        <h4 class="card-title" id="titulo_text">Mensaje</h4>
                    </div>
                     <div class="card-block">
<form name="registros" id="registros" action="">
    <div class="row">
    <div class="form-group col-md-12">
	  <label for="exampleInputEmail1"><b>Tema</b></label>
	  <p><span id="tema"></span></p>
	</div>
	<div class="form-group col-md-2">
	  <label for="exampleInputEmail1"><b>Titulo</b></label>
	  <p><span id="titulo"></span></p>
	</div>
	<div class="form-group col-md-5">
	  <label for="exampleInputEmail1"><b>Nombre</b></label>
	  <p><span id="nombre"></span></p>
	</div>
	<div class="form-group col-md-5">
	  <label for="exampleInputEmail1"><b>Apellidos</b></label>
	  <p><span id="apellidos"></span></p>
	</div>
	
	<div class="form-group col-md-6">
	  <label for="exampleInputEmail1"><b>Correo</b></label>
	  <p><span id="email"></span></p>
	</div>
	<div class="form-group col-md-6">
	  <label for="exampleInputEmail1"><b>Cargo/Puesto</b></label>
	  <p><span id="puesto"></span></p>
	</div>
	<div class="form-group col-md-4">
	  <label for="exampleInputEmail1"><b>Compañia/Organización</b></label>
	  <p><span id="organizacion"></span></p>
	</div>
	<div class="form-group col-md-4">
	  <label for="exampleInputEmail1"><b>Industria</b></label>
	  <p><span id="industria"></span></p>
	</div>
	<div class="form-group col-md-4">
	  <label for="exampleInputEmail1"><b>Ingresos anuales</b></label>
	  <p><span id="ingresos"></span></p>
	</div>
	<div class="form-group col-md-12">
	  <label for="exampleInputEmail1"><b>Dirección</b></label>
	  <p><span id="direccion"></span></p>
	</div>
	<div class="form-group col-md-2">
	  <label for="exampleInputEmail1"><b>CP.</b></label>
	  <p><span id="cp"></span></p>
	</div>
	<div class="form-group col-md-4">
	  <label for="exampleInputEmail1"><b>Ciudad</b></label>
	  <p><span id="ciudad"></span></p>
	</div>
	<div class="form-group col-md-4">
	  <label for="exampleInputEmail1"><b>Pais</b></label>
	  <p><span id="pais"></span></p>
	</div>
	<div class="form-group col-md-12">
	  <label for="exampleInputEmail1"><b>Mensaje</b></label>
	  <p><span id="comentarios"></span></p>
	</div>
	
	<input type="hidden" name="id" id="id" value="">	
	<a href="#" class="btn btn-primary" id="btn-visto">Marcar como visto</a>
	<a href="#" class="btn btn-danger" id="btn-novisto">Marcar como no visto</a>
	<a href="#" class="btn btn-default" id="btn-cerrarVentana">Cerrar</a>
	</div>
       	
</form>
</div>                    
                    
                    
                    </div>


                </div>
	        </div>        
	    </div>
    </div>
</div>



<script>
$(document).ready(function(){
	$('#tableRecors').show('slow');
	$('#movRecords').hide('slow');
	
	
});	
	$('#btn-addRecord').click(function(){
		$('#tableRecords').hide('slow');
	    $('#movRecords').show('slow');	
	    $('#titulo_text').text('AGREGAR REGISTRO');
	});
	
	$(document).delegate('#btn-visto', 'click', function() {	
	    $('#tableRecords').hide('slow');
	    $('#movRecords').show('slow');
	    let id = $('#id').val();
	     $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>/cotizaciones_admin/opc_visto",
			data: 'id=' + id,
			cache: false,
			success: function(data) {
				if(data==1){
					var parent = $(this).parent().parent();
					$('#tableRecords').show('slow');
	                $('#movRecords').hide('slow');	
					$('#product-grid').DataTable().ajax.reload();
					//alert(parent.children("td:nth-child(4)"));
				}else{
					alert('Ocurrio un error')
				}
				
				
			},
			error: function() {
				$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error consultar registro').fadeIn().fadeOut(4000, function() {
					$(this).remove();
				});
			}
		});
	    
	});	
	
	$(document).delegate('#btn-novisto', 'click', function() {	
	    $('#tableRecords').hide('slow');
	    $('#movRecords').show('slow');
	    let id = $('#id').val();
	     $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>/cotizaciones_admin/opc_novisto",
			data: 'id=' + id,
			cache: false,
			success: function(data) {
				if(data==1){
					var parent = $(this).parent().parent();
					$('#tableRecords').show('slow');
	                $('#movRecords').hide('slow');	
					$('#product-grid').DataTable().ajax.reload();
					//alert(parent.children("td:nth-child(4)"));
				}else{
					alert('Ocurrio un error')
				}
				
				
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
	    let id = $(this).data("id");	
	    
	    $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>/cotizaciones_admin/ver_registro", 
			data: 'id=' + id,
			cache: false,
			success: function(data) {
				let obj =  JSON.parse(data);
				$('#id').val(obj.id);
				$('#tema').text(obj.tema);
				$('#titulo').text(obj.titulo);
				$('#nombre').text(obj.nombre);
				$('#apellidos').text(obj.apellidos);
				$('#email').text(obj.email);				
				$('#puesto').text(obj.puesto);
				$('#direccion').text(obj.direccion);
				$('#cp').text(obj.cp);
				$('#ciudad').text(obj.ciudad);
				$('#pais').text(obj.pais);
				$('#organizacion').text(obj.organizacion);
				$('#industria').text(obj.industria);
				$('#ingresos').text(obj.ingresos); 
				$('#comentarios').text(obj.comentarios);
				
			},
			error: function() {
				$('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error consultar registro').fadeIn().fadeOut(4000, function() {
					$(this).remove();
				});
			}
		});

	    
	    $('#titulo_text').text('Ver Mensaje');
	});
	
	
	$('#btn-cerrarVentana').click(function(){
		$('#registros').trigger("reset");
		$('#tableRecords').show('slow');
	    $('#movRecords').hide('slow');	
	});
	
CKEDITOR.replace( 'texto' ,{ filebrowserBrowseUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', filebrowserUploadUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', filebrowserImageBrowseUrl : 'http://www.tutornegotia.ml/assets/libs/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&Yave=12345' });

		    

function open_popup(url)

{

    var w = 880;

    var h = 570;

    var l = Math.floor((screen.width-w)/2);

    var t = Math.floor((screen.height-h)/2);

    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);

}
</script>
