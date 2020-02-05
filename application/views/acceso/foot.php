<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/vendor.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/app.min.js"></script>
<script>
	// Ajax post  
$(document).ready(function(){  
$("#submit").click(function(){  
var user_name = $("#usuario").val();  
var password = $("#password").val();  
// Returns error message when submitted without req fields.  
if(user_name==''||password=='')  
{  
jQuery("div#err_msg").show();  
jQuery("div#msg").html("Todos los campos son requeridos");  
}  
else  
{  
// AJAX Code To Submit Form.  
$.ajax({  
type: "POST",  
url:  "<?php echo base_url(); ?>" + "tutor/check_login",  
data: {name: user_name, pwd: password},  
cache: false,  
success: function(result){  
    if(result!=0){  
        // On success redirect.  
        window.location.replace(result);  
    }  
    else  
        jQuery("div#err_msg").show();  
        jQuery("div#msg").html("Fallo el acceso");  
}  
});  
}  
return false;  
});  
}); 
</script>
    <!-- page js -->
</body>
</html>