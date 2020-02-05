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
				    <div class="col-md-12 search-panel">
			            <!-- Search form -->
			            <form method="post">
			                <div class="input-group mb-3">
			                    <input type="text" name="searchKeyword" class="form-control" placeholder="Buscar texto..." value="<?php echo $searchKeyword; ?>">
			                    <div class="input-group-append">
			                        <input type="submit" name="submitSearch" class="btn btn-secondary" value="Buscar">
			                        <input type="submit" name="submitSearchReset" class="btn btn-secondary" value="Resetear">
			                    </div>
			                </div>
			            </form>
			            
			            <!-- Add link -->
			            <div class="float-right">
			                <a href="<?php echo site_url('idioma_admin/agregar/'); ?>" class="btn btn-linkedin"><i class="fa fa-plus"></i> Nuevo Idioma</a>
			            </div>
			        </div>
				    
				    <!-- Data list table --> 
			        <table class="table table-striped table-bordered">
			            <thead class="thead-dark">
			                <tr>
			                    <th>#</th>
			                    <th>Bandera</th>
			                    <th>Sigla</th>
			                    <th>Idioma</th>
			                    <th>Activo</th>
			                    <th width="20%">Movimientos</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php if(!empty($idiomas_datos)){ foreach($idiomas_datos as $row){ ?>
			                <tr>
			                    <td><?php echo $row['IdiomaId']; ?></td>
			                    <td><img src="<?php echo base_url().$row['IdiomaBandera']; ?>" alt=""  width="35px"/></td>
			                    <td><?php echo $row['IdiomaSigla']; ?></td>
			                    <td><?php echo $row['IdiomaTitulo']; ?></td>
			                    <td>
			                    <?php if($row['IdiomaActivo']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?>
			                    </td>
			                    <td>
			                        <a href="<?php echo site_url('idioma_admin/ver/'.$row['IdiomaId']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver idioma"></i></a>			                        
			                        <a href="<?php echo site_url('idioma_admin/editar/'.$row['IdiomaId']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static"><i class="fa fa-pencil" title="Editar idioma"></i></a>
									<?php
									if ($row['IdiomaId']!=1) {
									?>
									<a href="<?php echo site_url('idioma_admin/borrar/'.$row['IdiomaId']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el idioma?')" title="Borrar idioma">
										<i class="fa fa-remove">
										</i>
									</a>
									<?php
																	}
									?>
			                    </td>
			                </tr>
			                <?php } }else{ ?>
			                <tr><td colspan="7">No se encontraron idiomas disponibles...</td></tr>
			                <?php } ?>
			            </tbody>
			        </table>
			    
			        <!-- Display pagination links -->
			        <div class="pagination pull-right">
			            <?php echo $this->pagination->create_links(); ?>
			        </div>
				    
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>