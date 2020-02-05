</div>
    </div>
     <!-- Ventanas modales gloables -->
    <div class="modal slide-in-right modal-right fade " id="cambiar-password-r" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="side-modal-wrapper">
                <div class="vertical-align">
                    <div class="table-cell">
                        <div class="pdd-horizon-15">
                            <h4>Cambiar contraseña</h4>
                            <p class="mrg-btm-15 font-size-13">Por favor teclee su nueva contraseña</p>
                            <div class="alert alert-success" id="alert-ok" style="display: none">Cambio de contraseña realizado correctamete</div>
                             <div class="alert alert-danger" id="alert-bad" style="display: none"></div>
                            <form id="frm-change-pwd" name="frm-change-pwd" method="post">
                                <input type="hidden" name="UsuUser1" id="UsuUser1" value="<?php echo $this->session->userdata('id'); ?>">
                                <div class="form-group">
                                <label>Usuario</label>
                                     <input type="text" name="UsuUser" id="UsuUser" class="form-control" placeholder="Usuario"  value="<?php echo $this->session->userdata('id'); ?>"  readonly="true">
                                     <input type="hidden" name="UsuId" id="UsuId" class="form-control" placeholder="Usuario"  readonly="true">
                                </div>
                            
                                <div class="form-group">
                                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Contraseña" required minlength="5">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirmar contraseña" required minlength="5">
                                </div>
                                <button type="submit" class="btn btn-info btn-sm" id="btn-change-pwd">Cambiar Clave</button>
                                <button type="button" data-dismiss="modal" class="btn btn btn-secondary btn-sm" id="btn-change-pwd">Cancelar</button>
                                <div class="form-group">
                                	<div id="alert"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mi-expediente" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                              <h4>Mi expediente</h4>
                            </div>
                            <div class="modal-body">
                                    <div class="padding-15">
                                        <div class="row">
                                            <div class="ml-auto col-md-5">
                                                <h3 class="mrg-btm-20 mrg-top-130">Download App</h3>
                                                <p>Let me see your identification. You don't need to see his identification. We don't need to see his identification. These are not the droids.</p>
                                                <div class="mrg-top-20">
                                                    <a href="" data-dismiss="modal" class="btn btn-info">Noted!</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img class="img-fluid mrg-horizon-auto" src="<?php echo base_url(); ?>assets/admin/images/avatars/user-m.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<div class="modal-footer">
							     <button type="button" data-dismiss="modal" class="btn btn-secondary btn-sm" id="btn-change-pwd">Cerrar</button>               
							</div>
                            </div>
                        </div>
                    </div>
                    
<div class="modal fade  custom-width" id="showVentanaSecciones" role="dialog" tabindex="-1" >
	<div class="modal-dialog" style="width: 90%">
		<div class="modal-header">
			<h4 class="modal-title">
				Categorias de servicios disponbles
			</h4>
			<button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>

		</div>
		<div class="modal-content">

			Cargando contenido

		</div>
	</div>
</div>

    <script src="<?php echo base_url(); ?>assets/admin/js/vendor.js"></script>

    <!-- page plugins js -->
    <script src="<?php echo base_url(); ?>assets/admin/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendors/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendors/nvd3/build/nv.d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendors/jquery.sparkline/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendors/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/toastr/toastr.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/admin/js/pickcolor/jquery.minicolors.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/vendors/bootbox/bootbox.js"></script>

    <!-- page js -->
    <script src="<?php echo base_url(); ?>assets/admin/js/dashboard/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- page js -->
   <script>
$(document).ready( function () {
	
	
	$('#PersonaFchAlta').datepicker(
    {
       format: "yyyy-mm-dd",
       autoclose: true
    }
);
   $('#servicios_table').DataTable();
   $('#datos').DataTable({
        "order": [[ 4, "desc" ]]
    });
    
    $('#banners-datos').DataTable({
        "order": [[ 3, "desc" ]]
    });
    
    $('#tabla-enlaces').DataTable({
        "order": [[ 1, "desc" ]]
    });
    
    
});

$(document).ready( function () {
   $('#servicios_principales_table').DataTable();
});
	   	   
$(document).ready( function () {
	   $('#servicios_cat_table').DataTable();
});
(function ($) {
	'use strict';
	
	$('#demo').minicolors();
	
	//$("#frm-change-pwd").validate();
	$("#frm-change-pwd").validate({
        event: "blur",
        rules: {
        	password1: {
				required: true,
				minlength: 5
					},
			password2: {
				required: true,
				minlength: 5,
				equalTo: "#password1"
			}
    	},
        messages: {
        	password1: {
				required: "Por favor teclee su contraseña",
				minlength: "Su contraseña debe tener al menos 5 caracteres"
					},
			password2: {
				required: "Por favor confirme su contraseña",
				minlength: "Su contraseña debe tener al menos 5 caracteres",
				equalTo: "Las contraseñas no son iguales, por favor corrigelas"
			},

        	},
        debug: true,errorElement: "label",
        submitHandler: function(form){
            $("#alert").show();
            $("#alert").html("<p align='center'><img src='<?php echo base_url(); ?>assets/admin/images/wait.gif' style='vertical-align:middle;margin:0 10px 0 0' /><br /><strong>Cambiando password...</strong></p>");
            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 2000);
           $.ajax({
                type: "POST",
                url:"<?php echo base_url(); ?>usuarios/cambiar_password",
                data: "UsuUser="+escape($('#UsuUser').val())+"&password1="+escape($('#password1').val()),
                success: function(msg){
                	if(msg==1){
                		$("#alert-ok").show('slow');
						$("#alert-ok").html('Se realizo correctamente le cambio de contraseña');
					//	document.getElementById("UsuUser").value="";
                        document.getElementById("password1").value="";
                        document.getElementById("password2").value="";
                       // $('#cambiar-password-r').modal().hide();
                        
                        //$('#btn-change-pwd').click();
					}else{
						$("#alert-bad").show('slow');
						$("#alert-bad").html('Ocurrio un error ');
					}
                    
                    
                    setTimeout(function() {
                        $('#alert-ok').fadeOut('slow');
                        $('#alert-bad').fadeOut('slow');
                        $('#cambiar-password-r').modal('toggle'); 
                    }, 2000);
 
                }
            }); 
        }
    });
	
	 
})(jQuery);
</script>
<script>
	function showSecciones()
	{
		$('#showVentanaSecciones').modal('show', {backdrop: 'static'});
		$.ajax({
			url: "<?php echo site_url('servicios_admin/view_secciones/'); ?>",
			success: function(response) {
				$('#showVentanaSecciones .modal-content').html(response);
				}
			});
	}
</script>


</body>
</html>