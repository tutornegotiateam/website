<script type= 'text/javascript'>
$(document).ready(function () {

$('#f_inicio').datepicker({
 /*   format: "dd/mm/yyyy",*/
    format: "yyyy-mm-dd",
    language: "es",
    orientation: "top auto",
    autoclose: true
});
$('#f_fin').datepicker({
    /*   format: "dd/mm/yyyy",*/
    format: "yyyy-mm-dd",
    language: "es",
    orientation: "top auto",
    autoclose: true
});




    $('#product-grid').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url(); ?>/proyectos/get_registros/?status="+$('select[name=proyecto_status]').val()+"&responsable=rplaza"
    });

    $(document).delegate('.delete', 'click', function() { 
        if (confirm('Usted desea borrar el registro?')) {
            var id = $(this).attr('id');
            var parent = $(this).parent().parent();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/proyectos/delete_registro",
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
            url: "<?php echo base_url(); ?>/proyectos/update_registro",
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
            url: "<?php echo base_url(); ?>/proyectos/add_registro",
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
<form>
<div class="row">
    <div class="col"><a href="#" data-toggle="modal" data-target="#movModal" class="btn btn-info">Crear proyecto</a></div>
</div>
  <div class="row">
    <div class="col">
        <label>Status</label>
        <select id="proyecto_status" name="proyecto_status" class="form-control">
        <option value="0">Todos</option>
        <?php if(!empty($arr_status_proyectos)){ foreach($arr_status_proyectos as $r1){ ?>
        <option value="<?php echo  $r1['id']; ?>" <?php if($this->input->get_post('status')==$r1['id']){ ?> selected="selected" <?php } ?>><?php echo  $r1['status']; ?></option>
        <?php }} ?>
        </select>
    </div>
    <div class="col">
        <?php /*
      <label>Responsable</label>
      <input type="text" class="form-control" placeholder="Last name">
      */ ?>
    </div>
    <div class="col">
        <?php /*
      <label>Buscar</label>
      <input type="search" class="form-control" placeholder="" aria-controls="product-grid"> */?>
    </div>
  </div>
</form>
            <table id="product-grid" class="display table font-size-12" cellspacing="0" width="100%">
<thead>
    <tr>
        <th><span class="font-size-12">ID</span></th>
        <th><span class="font-size-12">PROYECTO</span></th>
        <th><span class="font-size-12">RENDIMIENTO</span></th>
        <th><span class="font-size-12">FECHA INICIO</span></th>
        <th><span class="font-size-12">FECHA FIN</span></th>
        <th><span class="font-size-12">TAREAS EN CURSO</span></th>
        <th><span class="font-size-12">COMPLETADO</span></th>
        <th><span class="font-size-12">OPCIONES</span></th>
    </tr>
</thead>
</table>   
</div>
 </div>
            <div id="movRecords" style="display: none">
           
           
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
        <h5 class="modal-title" id="titulo_text">Crear Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div id="inicio">
      <?php /*   <h1>Crear proyecto</h1>
         <br> */ ?>

<div class="card-deck">
  <div class="card">
    <a href="#" onclick="tipoProyecto(1)">
    <div class="card-header">
      <small class="text-muted">Proyecto Abierto</small>
    </div>
    <div class="card-body">
          <p class="text-center"><img src="<?php echo base_url();?>assets/site/img/iconos/folder.png" class="img-fluid"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">El proyecto es visible para todos. Cualquiera puede convertirse en un miembro del proyecto.</small>
    </div>
    </a>
  </div>
  <div class="card">
    <a href="#" onclick="tipoProyecto(2)">
    <div class="card-header">
      <small class="text-muted">Proyecto Privado</small>
    </div>
    <div class="card-body">
      <p class="text-center"><img src="<?php echo base_url();?>assets/site/img/iconos/folder_lock.png" class="img-fluid"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">El proyecto es visible para todos. Cualquiera puede convertirse en un miembro del proyecto.</small>
    </div>
    </a>
  </div>
  <div class="card">
    <a href="#" onclick="tipoProyecto(3)">
    <div class="card-header">
      <small class="text-muted">Proyecto Externo</small>
    </div>
    <div class="card-body">
            <p class="text-center"><img src="<?php echo base_url();?>assets/site/img/iconos/folder_world.png" class="img-fluid"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">El proyecto es visible solo para los miembros del proyecto. Los usuarios externos pueden ser invitados al proyecto.</small>
    </div>
    </a>
  </div>
</div>

     </div>

     <div id="captura">
<!-- #region -->    
<div class="alert alert-info" id="alert"></div>   
<form name="form-mov" id="form-mov" action="" method="post">  
<input type="hidden" name="UsuUser1" id="UsuUser1" value="<?php echo $this->session->userdata('id'); ?>">
<div class="form-group">
<label class="font-size-13">Proyecto</label>
        <input type="text" name="proyecto" id="proyecto" class="form-control font-size-13" placeholder="Nombre del proyecto"  value="">
        <input type="hidden" name="id" id="id" class="form-control font-size-13">
        <input type="hidden" name="proyecto_tipo" id="proyecto_tipo" class="form-control font-size-13">
</div>
<div class="form-group">
<label class="font-size-13">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control font-size-13" placeholder="Descripción del proyecto"></textarea>
</div>
<div class="form-group">
    <div class="row">
    <div class="col">
        <label class="font-size-13">Fecha de inicio</label>
        <input type="text" name="f_inicio" id="f_inicio" class="form-control font-size-13" placeholder="Fecha inicio del proyecto"  value="">
    </div>
    <div class="col">
        <label class="font-size-13">Fecha fin</label>
        <input type="text" name="f_fin" id="f_fin" class="form-control font-size-13" placeholder="Fecha fin del proyecto"  value="">
    </div>
    </div>
</div>
<div class="form-group">
<label class="font-size-13">Responsable</label>
<div class="input-group">   
    <input type="text" name="responsable-name" id="responsable-name" class="form-control font-size-13" value="<?php echo $nombre_usuario;?>" readonly="true">
    <input type="hidden" name="responsable" id="responsable" class="form-control font-size-13"  readonly="true" value="<?php echo $idusu;?>">
    <div class="input-group-prepend">
        <a href="#" class="btn btn-success" id="btn_personas" >Cambiar responsable</a>
    </div>
</div>   
<div class="form-group">
<?php /*<label class="font-size-13">Invitar empleados</label> */ ?>
    <a href="#" class="btn btn-success" id="btn_participantes" >Invitar empleados</a>     
    <div class="row">
    <div class="col-12 font-size-13" id="row-participantes">
        <?php /*
        <span data-id="<?php echo $idusu;?>" class="item-empleado" id="item-empleado-<?php echo $idusu;?>">
            <span data-role="tile-item-name" class="item-empleado-name"><?php echo $nombre_usuario;?></span>
            <span data-role="remove" class="item-empleado-remove" data-id="<?php echo $idusu;?>">×</span>
        </span>
         */ ?>
    </div>
    <div class="col-12 font-size-13">
    <input type="text" name="participantes" id="participantes" value="<?php //echo $idusu;?>">
    </div>
    </div>
</div>
<button type="submit" class="btn btn-success" name="btn-save" id="btn-save">Guardar</button>
<button type="button" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>    
 
</form>
</div>
      </div>
    
    </div>
  </div>

</div>
<style>
    .item-empleado{
        display: inline-block;
        position: relative;
        margin: 0 6px 6px 0;
        padding: 0 30px 0 13px;
        height: 30px;
        border-radius: 1px;
        font: bold 13px/29px "Helvetica Neue",Arial,Helvetica,sans-serif;
        overflow: hidden;
        vertical-align: middle;
        z-index: 2;
        transition: background-color .2s linear;
        cursor: pointer;
        background-color: #d5f1fc;
        color: #0063c6!important;
    }
    .item-empleado-name{
        display: inline-block;
        position: relative;
        margin: 0 6px 6px 0;
        padding: 0 30px 0 13px;
        height: 30px;
        border-radius: 1px;
        font: bold 13px/29px "Helvetica Neue",Arial,Helvetica,sans-serif;
        overflow: hidden;
        vertical-align: middle;
        z-index: 2;
        transition: background-color .2s linear;
        cursor: pointer;
        background-color: #d5f1fc;
        color: #0063c6!important;
    }
    .item-empleado-remove {
    position: absolute;
    right: 0;
    top: 0;
    width: 25px;
    height: 30px;
    background-image: url(data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org…01.417%202.12-2.12%202.12%202.12%201.417-1.417-2.12-2.12z%22/%3E%3C/svg%3E);
    background-repeat: no-repeat;
    background-position: center;
    opacity: .6;
    transition: opacity .3s;
    cursor: pointer;
}
</style>

<div class="modal fade" id="personasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">Personas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="participantesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">Personas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>

<script>

$(document).delegate('.view', 'click', function() {
    let id = $(this).data("id");
   // alert(id)
    location.href ="<?php echo base_url()?>proyectos/view/"+id;
});

$(document).delegate('.item-empleado-remove', 'click', function(e) {
    let id = $(this).data("id");
    if (confirm('Usted desea quitar el participante?')) {
    $("#item-empleado-"+id).remove();
    let txt = $('#participantes').val();
    txt = txt.replace(id+',', '');
    $('#participantes').val(txt);
    }
});

$(document).delegate('.tr_responsable', 'click', function(e) {
//#$('.tr_responsable').click(function(e){  
    e.preventDefault();  
    let id = $(this).data("id");
    let name = $(this).data("name");
    $('#personasModal').modal('toggle');
    $('#responsable-name').val(name);
    $('#responsable').val(id);
});


$(document).delegate('.tr_participante', 'click', function(e) {
//#$('.tr_responsable').click(function(e){  
      e.preventDefault();  
      let id = $(this).data("id");
      let name = $(this).data("name");
      let txt = $('#participantes').val();
      let txt2 = $('#participantes').val();
      let buscar = id+',';
      let n = txt.search(buscar);
      if(n >= 0){
        txt = txt.replace(id+',', '');
        $('#participantes').val(txt);
        $("#item-empleado-"+id).remove();

      }else{
        $('#participantes').val(txt+id+',');
        let spann1 = '<span data-id="'+id+'" class="item-empleado" id="item-empleado-'+id+'">';
        let spann2 =     '<span data-role="tile-item-name" class="item-empleado-name">'+name+'</span>';
        let spann3 =     '<span data-role="remove" class="item-empleado-remove" data-id="'+id+'">×</span>';
        let spann4 = '</span>';
        $("#row-participantes").append( spann1+spann2+spann3+spann4 );
      }
     
     
     
     
    $('#participantesModal').modal('toggle');
  //  $('#responsable-name').val(name);
  //  $('#responsable').val(id);
});

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

function tipoProyecto(a){
    if(a==1){
        $('#titulo_text').text('Crear Proyecto (Proyecto Abierto)');
    }else if(a==2){
        $('#titulo_text').text('Crear Proyecto (Proyecto Privado)');
    }else{
        $('#titulo_text').text('Crear Proyecto (Proyecto Externo)');
    }
    $('#captura').show('slow');
    $('#inicio').hide();
}

$(document).ready(function(){
    $('#alert').hide();
    $('#tableRecors').show('slow');
    $('#movRecords').hide('slow');
    $('#captura').hide();
});	


$('#btn_personas').click(function(){    
    $('#personasModal .modal-body').load('<?php echo base_url('proyectos/get_personas_responsables')?>',function(){
        $('#personasModal').modal({show:true});
    });
});

$('#btn_participantes').click(function(){    
    $('#participantesModal .modal-body').load('<?php echo base_url('proyectos/get_personas_participantes')?>',function(){
        $('#participantesModal').modal({show:true});
    });
});


$('#btn_cancelar').click(function(){    
    $('#captura').hide();
    $('#inicio').show('slow');
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

    url: "<?php echo base_url(); ?>/proyectos/ver_registro", 

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

    },

    error: function() {

        $('#err').html('<span style=\'color:red; font-weight: bold; font-size: 30px;\'>Error consultar registro').fadeIn().fadeOut(4000, function() {

            $(this).remove();

        });

    }

});



});





$('#btn-cerrarVentana').click(function(){

$('#form-mov').trigger("reset");

$('#tableRecords').show('slow');

$('#movRecords').hide('slow');	

});



$("#form-mov").validate({
    event: "blur",
    rules: {
        proyecto: {
            required: true,
            minlength: 3
            },
        },
    messages: {
        proyecto: {
            required: "Por favor teclee el nombre del proyecto",
            minlength: "El nombre del proyecto debe tener al menos 3 caracteres"
            },
        },
    debug: true,errorElement: "label",
    submitHandler: function(form) {
        let url='';
        if($('#id').val()>0){
            url ='proyectos/edit';
        }else{
            url ='proyectos/add';
        }
      //  $('#form-mov').hide();
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
               // alert(result);
               $('#form-mov').show();
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

