<div class="main-content">
    <div class="container-fluid">
        <div class="row">
	        <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title"><?php echo $title; ?>: <?php echo $idiomas_datos['IdiomaTitulo']; ; ?></h4>
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
				  <!--  <h2><?php echo $title; ?></h2>-->
				    <div class="col-md-6">
				        <div class="card" style="width:400px">
				            <div class="card-body">
				               <!-- <h4 class="card-title"><?php echo $idiomas_datos['IdiomaTitulo']; ; ?></h4>-->
				                <p class="card-text"><b>Idioma:</b> <?php echo $idiomas_datos['IdiomaTitulo']; ?></p>
				                <p class="card-text"><b>Siglas Idioma:</b> <?php echo $idiomas_datos['IdiomaSigla']; ?></p>
				                <p class="card-text"><b>Bandera:</b> <img src="<?php echo base_url().$idiomas_datos['IdiomaBandera']; ?>" alt=""  width="35px"/></p>
				                <p class="card-text"><b>Status:</b> 
				                <?php if($idiomas_datos['IdiomaActivo']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?></p>
				                <a href="<?php echo site_url('idioma_admin'); ?>" class="btn btn btn-secondary">Regresar a idiomas</a>
				            </div>
				        </div>
				    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>