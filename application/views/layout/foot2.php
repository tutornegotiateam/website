<script src="<?php echo base_url(); ?>assets/admin/js/vendor.js">
</script>

<!-- page plugins js -->
<script src="<?php echo base_url(); ?>assets/admin/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/maps/jquery-jvectormap-us-aea.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/d3/d3.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/nvd3/build/nv.d3.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery.sparkline/index.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/chart.js/dist/Chart.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/toastr/toastr.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/pickcolor/jquery.minicolors.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/sweetalert/lib/sweet-alert.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

<!-- page js -->
<script src="<?php echo base_url(); ?>assets/admin/js/dashboard/dashboard.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- page js -->
<script>

		(function ($) {
		'use strict';
$('.datepicker').datepicker();
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
			submitHandler: function(form) {
				$("#alert").show();
				$("#alert").html("<p align='center'><img src='<?php echo base_url(); ?>assets/admin/images/wait.gif' style='vertical-align:middle;margin:0 10px 0 0' /><br /><strong>Cambiando password...</strong></p>");
				setTimeout(function() {
					$('#alert').fadeOut('slow');
					}, 5000);
	/*  $.ajax({
	type: "POST",
	url:"send.php",
	data: "name="+escape($('#name').val())+"&email="+escape($('#email').val())+"&message="+escape($('#message').val()),
	success: function(msg){
	$("#alert").html(msg);
	document.getElementById("name").value="";
	document.getElementById("email").value="";
	document.getElementById("message").value="";
	setTimeout(function() {
	$('#alert').fadeOut('slow');
	}, 5000);

	}
	}); */
				}
			});


		})(jQuery);
</script>


</body>
</html>