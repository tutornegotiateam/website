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
			                <a href="<?php echo site_url('usuarios/agregar/'); ?>" class="btn btn-linkedin"><i class="fa fa-plus"></i> Nuevo Usuario</a>
			            </div>
			        </div>
				    
				    <!-- Data list table --> 
			        <table class="table table-striped table-bordered">
			            <thead class="thead-dark">
			                <tr>
			                    <th>#</th>
			                    <th>Usuario</th>
			                    <th>Nombre</th>
			                    <th>Apellido Paterno</th>
			                    <th>Apellido Materno</th>
			                    <th>Perfil</th>
			                    <th>Tipo</th>
			                    <th>Status</th>
			                    <th width="20%">Movimientos</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php if(!empty($usuarios_datos)){ foreach($usuarios_datos as $row){ ?>
			                <tr>
			                    <td><?php echo $row['UsuId']; ?></td>
			                    <td><?php echo $row['UsuUser']; ?></td>
			                    <td><?php echo $row['UsuNom']; ?></td>
			                    <td><?php echo $row['UsuApePat']; ?></td>
			                    <td><?php echo $row['UsuApeMat']; ?></td>
			                    <td><?php 
			                    
			                    switch ($row['UsuPerfil']) 
							    {
							    case 0:
							        echo "SIN PERFIL";
							        break;
							    case 1:
							        echo "CONSULTA";
							        break;
							    case 2:
							        echo "PUBLICADOR";
							        break;
							    case 3:
							        echo "ADMINISTRADOR";
							        break;
							    case 4:
							        echo "EDITOR";
							        break;
							    case 6:
							        echo "EMPLEADO";
							        break;
							    }
			                    
			                    ?></td>
			                    <td>
			                    	<?php
			                    	switch ($row['UsuTipo']) 
							    {
							    case 0:
							        echo "SIN PERFIL";
							        break;
							    case 1:
							        echo "EMPLEADO";
							        break;
							    case 2:
							        echo "EMPLEADO EXTERNO";
							        break;
							    case 3:
							        echo "PROVEEDOR";
							        break;
							    }?>
			                    </td>
			                    <td>
			                    <?php if($row['UsuActivo']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?>
			                    </td>
			                    <td>
			                       <!-- <a href="<?php echo site_url('personas_admin'); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-user" title="Ver usuario"></i></a>			                -->        
			                        <a href="<?php echo site_url('usuarios/editar/'.$row['UsuId']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static"><i class="fa fa-pencil" title="Editar usuario"></i></a>
			                        <a href="#" class="btn btn-primary btn-xs btn-ch-pws"  data-toggle="modal" data-target="#cambiar-password-r" data-id='<?php echo $row['UsuId'] ?>' data-user='<?php echo $row['UsuUser'] ?>'><i class="fa fa-ellipsis-h" title="Cambiar contraseña"></i></a>
			                        <a href="<?php echo site_url('usuarios/borrar/'.$row['UsuId']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el usuario? \nEsta opción tambien borrara al empleado')" title="Borrar usuario"><i class="fa fa-remove"></i></a>
			                    </td>
			                </tr>
			                <?php } }else{ ?>
			                <tr><td colspan="7">No se encontraron usuarios...</td></tr>
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
<script>
$(".btn-ch-pws").click(function(){
   let id = $(this).data("id");
   let user = $(this).data("user");
   $('#UsuUser').val(user);
   $('#UsuId').val(id);
}); 
</script>