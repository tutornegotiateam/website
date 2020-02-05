// Ajax post  
$(document).ready(function(){  
$("#submit").click(function(){  
var user_name = $("#usuario").val();  
var password = $("#password").val();  
// Returns error message when submitted without req fields.  
if(user_name==''||password=='')  
{  
jQuery("div#err_msg").show();  
jQuery("div#msg").html("All fields are required");  
}  
else  
{  
// AJAX Code To Submit Form.  
$.ajax({  
type: "POST",  
url:  "<?php echo base_url(); ?>" + "login/check_login",  
data: {name: user_name, pwd: password},  
cache: false,  
success: function(result){  
    if(result!=0){  
        // On success redirect.  
    window.location.replace(result);  
    }  
    else  
        jQuery("div#err_msg").show();  
        jQuery("div#msg").html("Login Failed");  
}  
});  
}  
return false;  
});  
});  
