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
				  
				    <div class="col-md-12">
				        <div class="card1" >
				            <div class="card-body">
				                <!--<h4 class="card-title"><?php echo $registros_datos['titulo']?></h4>-->
				                <p class="card-text"><b>Titulo:</b> <?php echo $registros_datos['titulo']; ?></p>
				                <p class="card-text"><b>Subtitulo:</b> <?php echo $registros_datos['subtitulo']; ?></p>
				                <p class="card-text"><b>Banner:</b> <?php echo $registros_datos['banner_bg']; ?></p>
				                <p class="card-text"><b>Status:</b> 
				                <?php if($registros_datos['activo']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?></p>
				                <p class="card-text"><b>Contenido:</b> <?php echo $registros_datos['contenido']; ?></p>
				                <a href="<?php echo site_url('contenidos_admin'); ?>" class="btn btn btn-secondary">Regresar a contenidos</a>
				            </div>
				        </div>
				    </div>
				    
				 
			    
			        
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>