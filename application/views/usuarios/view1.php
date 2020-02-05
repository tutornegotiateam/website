<div class="main-content">
    <div class="container-fluid">
        <div class="row">
	        <div class="col-lg-12 col-md-12">
                <div class="card">
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
				    <h2><?php echo $title; ?></h2>
				    <div class="col-md-6">
				        <div class="card" style="width:400px">
				            <div class="card-body">
				                <h4 class="card-title"><?php echo $usuarios_datos['first_name'].' '.$usuarios_datos['last_name']; ?></h4>
				                <p class="card-text"><b>Email:</b> <?php echo $usuarios_datos['email']; ?></p>
				                <p class="card-text"><b>Gender:</b> <?php echo $usuarios_datos['gender']; ?></p>
				                <p class="card-text"><b>Country:</b> <?php echo $usuarios_datos['country']; ?></p>
				                <p class="card-text"><b>Created:</b> <?php echo $usuarios_datos['created']; ?></p>
				                <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-primary">Back To List</a>
				            </div>
				        </div>
				    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>