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
                     <div id="menu-table">
				    <?php if(!empty($success_msg)){ ?>
				    <div class="col-xs-12">
				        <div class="alert alert-success"><?php echo $success_msg; ?></div>
				    </div>
				    <?php }elseif(!empty($error_msg)){ ?>
				    <div class="col-xs-12">
				        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
				    </div>
				    <?php } ?>
				    <div class="col-xs-12">
				
				    	<div id="msgError" class="alert alert-success"></div>
				   
				    </div>
				    <div class="col-md-12 search-panel">
			            <!-- Search form -->
			            <form method="post">
			                <div class="input-group mb-3">
			                    <input type="text" name="searchKeyword" class="form-control" placeholder="Buscar texto..." value="<?php echo $searchKeyword; ?>">
			                    <select class="form-control" name="searchLanguage">
			                    	<option value="">SELECCIONE IDIOMA</option>
			                    	<?php if(!empty($arr_idiomam)){ foreach($arr_idiomam as $r){ ?>
			                    	<option value="<?php echo $r->IdiomaId; ?>" <?php if($searchLanguage==$r->IdiomaId){  ?>selected="selected" <?php } ?>><?php echo $r->IdiomaTitulo; ?></option>
			                    	<?php }
										}
									 ?>
			                    </select>
			                    <div class="input-group-append">
			                        <input type="submit" name="submitSearch" class="btn btn-secondary" value="Buscar">
			                        <input type="submit" name="submitSearchReset" class="btn btn-secondary" value="Resetear">
			                    </div>
			                </div>
			            </form>
			            
			            <!-- Add link -->
			            <div class="float-right">
			                <a href="<?php echo site_url('menu/agregar/'); ?>" class="btn btn-linkedin"><i class="fa fa-plus"></i> Nuevo Menu</a>
			                 <a href="<?php echo site_url('submenu/'); ?>" class="btn btn-linkedin"><i class="fa fa-plus"></i> Agregar Submenu</a>
			            </div>
			        </div>
				    
				    <!-- Data list table -->
				   
			        <table class="table table-striped table-bordered">
			            <thead class="thead-dark">
			                <tr>
			                    <th>Id</th>
			                    <th>Titulo</th>
			                    <th>Idioma</th>
			                    <th>Posición</th>
			                    <th>Tipo</th>
			                    <th>Status.</th>
			                    <th width="20%">Movimientos</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php if(!empty($registros)){ foreach($registros as $row){ 			                
			                if($row['MenuSupLanguaje']==1){						
			                ?>
			                <tr>
			                    <td><?php echo $row['MenuSupId']; ?></td>
			                    <td><?php echo $row['MenuSupTitulo']; ?></td>
			                    <td><?php echo $row['MenuSupLanguaje']; ?></td>
			                    <td><?php echo $row['MenuUbica']; ?></td>
			                    <td><?php 
			                    
			                    switch ($row['MenuTipo']) 
							    {
							    case 1:
							        echo "LISTA";
							        break;
							    case 2:
							        echo "MEGAMENU";
							        break;
							    default:
							        echo "INDIVIDUAL";
							        break;
							    }
			                    
			                    ?></td>
			                    <td>
			                    <?php if($row['MenuStatus']==1){
									  echo "<div class='badge badge-success'>ACTIVO</div>";
								}else{
									  echo "<div class='badge badge-danger'>INACTIVO</div>";
								}
			                    ; ?>
			                    </td>
			                    <td>
			                      <!--  <a href="<?php echo site_url('menu/view/'.$row['MenuSupId']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver"></i></a>-->			                        
			                        <a href="<?php echo site_url('menu/edit/'.$row['MenuSupId'].'/'.$row['MenuSupIdTxt']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static"><i class="fa fa-pencil" title="Editar"></i></a>
									<a href="#" class="btn btn-twitter btn-xs btn-show-submenu" data-backdrop="static"><i class="fa fa-align-justify" title="Agregar submenu"></i></a>
									<a href="<?php echo site_url('menu/delete/'.$row['MenuSupId'].'/'.$row['MenuSupIdTxt']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el registro?')" title="Borrar">
										<i class="fa fa-remove">
										</i>
									</a>
			                        <a href="#"  class="btn btn-secondary btn-xs up"><i class="fa fa-arrow-up" title="Subir"></i></a>
			                        <a href="#"  class="btn btn-secondary btn-xs down"><i class="fa fa-arrow-down" title="Bajar"></i></a>
			                    </td>
			                </tr>
			                <?php } 
			                }
			                }else{ ?>
			                <tr><td colspan="7">No se encontraron registros...</td></tr>
			                <?php } ?>
			            </tbody>
			        </table>
			    
			        <!-- Display pagination links -->
			        <div class="pagination pull-right">
			            <?php echo $this->pagination->create_links(); ?>
			        </div>
				    </div> 
				    
				    <div id="submenu-captura" style="display: none">
                    <h3 id="titulo_txt">AGREGAR MENU</h3>
                  <form id="form_banners" name="form_banners">
                  <div class="row">
                  <div class="col-lg-6 col-md-6">
                  <div class="form-group">
				    <label for="titulo">Banner</label>
				    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Teclee el título de banner">
				  </div>
                  <div class="form-group">
                  	<label for="banner">Tipo de Banner</label><br/>
				    <div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo1" name="tipo" value="1">
					  <label class="custom-control-label" for="tipo1">Imagen</label>
					</div>

					<!-- Default inline 2-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo2" name="tipo" value="2">
					  <label class="custom-control-label" for="tipo2">Html</label>
					</div>

					<!-- Default inline 3-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="tipo3" name="tipo" value="3">
					  <label class="custom-control-label" for="tipo3">Video</label>
					</div>
                  </div>
                  <div class="form-group">
				    <label for="texto1">Texto 1</label>
				    <input type="text" class="form-control" id="texto1" name="texto1" placeholder="Texto linea 1" disabled="true">
				  </div>
				  <div class="form-group">
				    <label for="texto2">Texto 2</label>
				    <input type="text" class="form-control" id="texto2" name="texto2" placeholder="Texto linea 2" disabled="true">
				  </div>
				   <div class="form-group">
				    <label for="texto3">Texto 3</label>
				    <input type="text" class="form-control" id="texto3" name="texto3" placeholder="Texto linea 3" disabled="true">
				  </div>
				  
				  <div class="form-group">
				    <label for="texto3">Texto 4</label>
				    <input type="text" class="form-control" id="texto4" name="texto4" placeholder="Texto linea 4" disabled="true">
				  </div>
				  <div class="form-group">
				    <label for="status">Status</label><br/>
				    <div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="status0" name="status" value="1">
					  <label class="custom-control-label" for="status0">Activo</label>
					</div>

					<!-- Default inline 2-->
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" class="custom-control-input" id="status1" name="status" value="0">
					  <label class="custom-control-label" for="status1">Inactivo</label>
					</div>

				  </div>
				  <div class="form-group">
				   <input type="hidden" name="id" id="id">
				   <button type="submit" class="btn btn-primary" name="btn-save-banner">Guardar</button>
				  <a href="javascript:void(0);" class="btn btn-default" id="btn-cancelar-banner">Cancelar</a>
				  </div>
				  
				  
                  </div>
                  
                  <div class="col-lg-6 col-md-6">
                  	<label>
												Archivo
											</label>

											<input  id="banner_bg" name="banner_bg" type="text" class="form-control" value="<?php echo !empty(@$member->banner_bg)?@$member->banner_bg:''; ?>" >

											<a href="javascript:open_popup('<?php echo base_url(); ?>assets/libs/filemanager/dialog.php?type=2&popup=1&field_id=banner_bg&Yave=12345')" class="btn btn-success" >
												Seleccionar Imagen
											</a>
                  	
                  <div class="col-lg-12 col-md-12">
                  	<img src="<?php echo base_url(); ?>/public/uploads/utils/noimage.jpg" class="img-responsive" id="foto"  style="width: 360px">
                  </div>
                  </div>
                
                  </div>
               
				 
				  
				</form>
				    </div>
				    
				    
				    
				    
				    
                    </div>
                </div>
	        </div>        
	    </div>
    </div>
</div>
<script>
	$(document).ready(function(){
    $('#submenu-captura').hide(1000);
    $('#menu-table').show(1000); 		
		
		
	$('#msgError').hide();
    $(".up,.down").click(function(){
        var row = $(this).parents("tr:first");
        var actual = $(this).parents("tr").find("td").eq(0).text();
        var anterior = row.prev().find("td").eq(0).text();
        var siguiente = row.next().find("td").eq(0).text();
        
        var actual_pos = $(this).parents("tr").find("td").eq(3).text();
        var anterior_pos = row.prev().find("td").eq(3).text();
        var siguiente_pos = row.next().find("td").eq(3).text();
       // alert( actual+' '+actual_pos+' '+siguiente+' '+siguiente_pos+' '+anterior+' '+anterior_pos);
        if ($(this).is(".up")) {
        	
            row.insertBefore(row.prev());
            row.next().find("td").eq(3).text(actual_pos);
            $(this).parents("tr").find("td").eq(3).text(anterior_pos);
            guardar_posicion(actual,anterior_pos,anterior,actual_pos)
            
        } else {
            row.insertAfter(row.next());
            row.prev().find("td").eq(3).text(actual_pos);
            $(this).parents("tr").find("td").eq(3).text(siguiente_pos);
            guardar_posicion(actual,siguiente_pos,siguiente,actual_pos)
        }
    });
});

$(".btn-show-submenu").click(function(e) {
        e.preventDefault();
        $('#titulo_txt').text('Agregar Submenu');
        $('#submenu-captura').show(1000);
        $('#menu-table').hide(1000);   
});

$("#btn-cancelar-submenu").click(function(e) {
        e.preventDefault();
        $('#submenu-captura').hide(1000);
        $('#menu-table').show(1000);  
        $('#form_banners').trigger("reset");  
});



function guardar_posicion(aa,aa1,bb,bb1){
 
   $.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>menu/cambiar_posicion",
		data: { a: aa, a1 : aa1, b:bb, b1:bb1},
		cache: false,
		success: function() {
			$('#msgError').hide();
			$("#msgError").html( "<span style='color: green'>Cambio de posición realizado correctamente</span>" );
			
			$("#msgError").fadeTo(2000, 500).slideUp(500, function(){
			    $("#msgError").slideUp(500);
			});
		},
		error: function() {
			$("#msgError").html( "<span style='color: red'>Error al cambiar posición</span>" );
			$("#msgError").fadeTo(2000, 500).slideUp(500, function(){
			    $("#msgError").slideUp(500);
			});
		}
	});
	
}
</script>