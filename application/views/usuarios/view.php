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
				                <h4 class="card-title"><?php echo $usuarios_datos['UsuNom'].' '.$usuarios_datos['UsuApePat'].' '.$usuarios_datos['UsuApeMat']; ; ?></h4>
				                <p class="card-text"><b>Usuario:</b> <?php echo $usuarios_datos['UsuUser']; ?></p>
				                <p class="card-text"><b>Fecha de creación:</b> <?php echo $usuarios_datos['UsuFchCrea']; ?></p>
				                <p class="card-text"><b>Status:</b> 
				                <?php if($usuarios_datos['UsuActivo']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?></p>
				                <p class="card-text"><b>Perfil:</b> <?php echo $usuarios_datos['UsuPerfil']; ?></p>
				                <a href="<?php echo site_url('usuarios'); ?>" class="btn btn btn-secondary">Regresar a usuarios</a>
				            </div>
				        </div>
				    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>