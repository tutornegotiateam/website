<script type= 'text/javascript'>
		$(document).ready(function () {
						
			
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
<a href="#" class="btn btn-success add" data-toggle="modal" data-target="#movModal"><i class="fa fa-plus"></i> Agregar Departamento</a>
<table id="grid" class="display table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Departamento</th>
				<th>Descripción</th>
				<th>Opciones</th>
			</tr>
		</thead>
</table>   
                    </div>
                    </div>
</div>    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>


<div class="modal fade" id="movModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
 
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_text">Agregar Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- #region -->    
<div class="alert alert-info" id="alert"></div>   
<form name="form-mov" id="form-mov" action="">  
<div class="form-row">
    <div class="form-group col-md-1">
      <label for="id" class="font-size-13">Id</label>
      <input type="text" class="form-control font-size-13" id="id" name="id" placeholder="Departamento" readonly="true">
    </div>
    <div class="form-group col-md-12">
      <label for="departamento" class="font-size-13">Departamento</label>
      <input type="text" class="form-control font-size-13" id="departamento" name="departamento" placeholder="Departamento">
    </div>
    <div class="form-group col-md-12">
      <label for="descripcion" class="font-size-13">Descripción</label>
      <textarea class="form-control font-size-13" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
    </div>
</div>
<button type="submit" class="btn btn-success" name="btn-save" id="btn-save">Guardar</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>    
 
</form>
      </div>
      <div class="modal-footer">
            
      </div>
    </div>
  </div>

</div>
<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script>

$(document).ready(function(){
	$('#grid').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url(); ?>/departamentos/get_registros"
    });	
    $("#alert").hide();
});	


	

$(document).delegate('.delete', 'click', function() { 
    if (confirm('Usted desea borrar el registro?')) {
        var id = $(this).attr('id');
        var parent = $(this).parent().parent();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/departamentos/delete",
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

$('.add').click(function(){
    $('#form-mov').trigger("reset");
    $('#titulo_text').text('AGREGAR REGISTRO');
});

$(document).delegate('.edit', 'click', function() {	
    $('#titulo_text').text('EDITAR REGISTRO');
    $('#movModal').modal('show'); 
    let id = $(this).data("id");
    $('#id').val(id);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>departamentos/get_record/",
        data: $('#form-mov').serialize(),
        success: function(result) {
            let obj =  JSON.parse(result);
            $('#id').val(obj.id);
            $('#departamento').val(obj.departamento);
            $('#descripcion').val(obj.descripcion);
        },
        error: function(result) {
            alert('error');
        }
    });
});


$('#btn-cerrarVentana').click(function(){
	$('#registros').trigger("reset");
	$('#tableRecords').show('slow');
    $('#movRecords').hide('slow');	
});
	
$("#form-mov").validate({
    event: "blur",
    rules: {
        'departamento': {
            'required': true,
            'minlength': 3
            },
        },
    messages: {
        'departamento': {
            'required': "Por favor teclee el departamento",
            'minlength': "El nombre del departamento debe tener al menos 3 caracteres"
            },
        },
    debug: true,errorElement: "label",
    submitHandler: function(form) { 
        let url="";  
     /*   alert($('#id').val());
        return false;*/
        if($('#id').val()>0){
            url = "departamentos/edit/";           
        }else{
            url = "departamentos/add/";
        }   
        $("#alert").show();
        $("#alert").html("<p align='center'><img src='<?php echo base_url(); ?>assets/admin/images/wait.gif' style='vertical-align:middle;margin:0 10px 0 0' /><br /><strong>Guardando cambios...</strong></p>");
        setTimeout(function() {
            $('#alert').fadeOut('slow');
            }, 2000);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>"+url,
                data: $('#form-mov').serialize(),
                success: function(result) {
                    if(result==1){
                        $('#movModal').modal('hide');
                        $('#form-mov').trigger("reset");
                        $('#grid').DataTable().ajax.reload();
                    }else{
                        alert('Ocurrio un error');
                    }
                    
                },
                error: function(result) {
                    alert('error');
                }
        });
        }
});
</script>