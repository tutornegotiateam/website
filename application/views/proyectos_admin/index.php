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
			            <div class="float-right">
			                <a href="javascript:void(0);" class="btn btn-linkedin" id="btn-addRecord" data-toggle="modal" data-target="#modalAddEdit"><i class="fa fa-plus"></i>Agregar Registro</a>
			            </div>
			        </div>
			        <table id="product-grid" class="display table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Titulo</th>
				<th>Idioma</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Activo</th>
				<th>Opciones</th>
			</tr>
		</thead>
</table>   
			       
			    
				    
				    
				    
				    
				    
				    
                    </div>
                    </div>
                    <div id="movRecords" style="display: none">
                    <div class="card-heading border bottom">
                        <h4 class="card-title" id="titulo_text">EDITAR REGISTRO</h4>
                    </div>
                     <div class="card-block">
<form name="registros" id="registros" action="">
    <div class="row">
    <div class="form-group col-md-12">
	  <label for="exampleInputEmail1">Titulo</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	</div>
	<div class="form-group col-md-12">
	  <label for="exampleInputEmail1">Subtitulo</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	</div>
	<div class="form-group col-md-12">
	  <label for="exampleInputEmail1">Texto</label>
	  <textarea class="form-control" id="texto" name="texto"></textarea>
	</div>
    <div class="form-group col-md-6">
	  <label for="exampleInputPassword1">Password</label>
	  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	</div>
    <div class="form-check col-md-6">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
	<button type="submit" class="btn btn-primary">Submit</button>
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
