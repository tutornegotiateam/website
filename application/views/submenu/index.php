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

			                <a href="<?php echo site_url('submenu/agregar/'); ?>" class="btn btn-linkedin"><i class="fa fa-plus"></i> Nuevo SubMenu</a>

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

			                if($row['MenuLanguaje']!=0){						

			                ?>

			                <tr>

			                    <td><?php echo $row['MenuId']; ?></td>

			                    <td><?php echo $row['MenuTitulo']; ?></td>

			                    <td><?php echo $row['MenuLanguaje']; ?></td>

			                    <td><?php echo $row['MenuPosicion']; ?></td>

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

			                    <?php if($row['MenuActivo']==1){

									  echo "<div class='badge badge-success'>ACTIVO</div>";

								}else{

									  echo "<div class='badge badge-danger'>INACTIVO</div>";

								}

			                    ; ?>

			                    </td>

			                    <td>

			                      <!--  <a href="<?php echo site_url('menu/view/'.$row['MenuSupId']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver"></i></a>-->			                        

			                        <a href="<?php echo site_url('submenu/editar/'.$row['MenuId'].'/'.$row['MenuUrlFriendly']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static"><i class="fa fa-pencil" title="Editar Menu"></i></a>
									
								
			                       <!-- <a href="<?php echo site_url('submenu/edit/'.$row['MenuId'].'/'.$row['MenuUrlFriendly']); ?>" class="btn btn-primary btn-xs" data-backdrop="static" title="Agregar o Editar Servicio"><i class="fa fa-newspaper-o" ></i></a>-->

			                        <a href="<?php echo site_url('submenu/delete/'.$row['MenuId'].'/'.$row['MenuUrlFriendly']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el registro?')" title="Borrar"><i class="fa fa-remove"></i></a>

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

                </div>

	        </div>        

	    </div>

    </div>

</div>

<script>

	$(document).ready(function(){

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