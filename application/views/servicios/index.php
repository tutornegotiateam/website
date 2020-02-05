<?php
$ci = &get_instance();
$ci->load->model('servicios_model', 'services');

?>
<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="card">
					<div class="card-heading border bottom">
						<h4 class="card-title">
							<?php echo $title; ?>
						</h4>
					</div>
					<div class="card-block">
						<!-- Display status message -->
						<?php
						if (!empty($success_msg)) {
						?>
						<div class="col-xs-12">
							<div class="alert alert-success">
								<?php echo $success_msg; ?>
							</div>
						</div>
						<?php } elseif (!empty($error_msg)) {
						?>
						<div class="col-xs-12">
							<div class="alert alert-danger">
								<?php echo $error_msg; ?>
							</div>
						</div>
						<?php } ?>
						<div class="col-md-12 search-panel">
							

							<!-- Add link -->
							<div class="float-right">
								<a href="<?php echo site_url('servicios_admin/agregar/'); ?>" class="btn btn-linkedin">
									<i class="fa fa-plus">
									</i> Agregar Nuevo servicio
								</a>
								<a href="<?php echo site_url('servicios_admin/agregar_categoria/'); ?>" class="btn btn-linkedin">
									<i class="fa fa-plus">
									</i> Agregar Nueva Categoria de Servicio
								</a>
								
								<!--<a href="#<?php echo site_url('servicios_admin/agregar/'); ?>" class="btn btn-linkedin" data-toggle="modal" data-target="#seccionesModal">
									<i class="fa fa-search">
									</i> Ver Categoria de Servicio
								</a>
								<a href="#" class="btn btn-linkedin" onclick="showSecciones()">
									<i class="fa fa-search">
									</i> Ver Categoria de Servicio
								</a>-->
							</div>
						</div>
						
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#servicios">
									Servicios
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#servicios_principal">
									Servicios Principales
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#servicios_cat">
									Categorias de servicios
								</a>
							</li>
						</ul>

						<div class="tab-content">
							<div id="servicios" class="tab-pane fade in active">
								<table class="table table-striped table-bordered" id="servicios_table">
									<thead class="thead-dark">
										<tr>
											<th>
												#
											</th>
											<th>
												Categoria
											</th>
											<th>
												titulo
											</th>
											<th>
												idioma
											</th>

											<th>
												Status
											</th>
											<th width="20%">
												Movimientos
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($arrSeccions1)) {

											foreach ($arrSeccions1 as $row) {

										$seccion = str_replace('-', ' ',$row['seccion'] );
										$seccion = str_replace('_', ' ',$seccion );
								?>
										<tr>
											<td>
												<?php echo $row['id']; ?>
											</td>
											<td>
												<?php
								if ($seccion==0) {
									echo "Principal"; } else {
									 echo ucwords($seccion);} ?>
											</td>
											<td>
												<?php echo $row['titulo']; ?>
											</td>
											<td>
												<?php echo $row['IdiomaTitulo']; ?>
												<p>
													<img src="<?php echo base_url().$row['IdiomaBandera']; ?>" alt=""  width="35px"/>
												</p>
											</td>
											<td>
												<?php
								if ($row['activo']==1) {
									echo "<div class='badge badge-success'>ACTIVO</div>";
																				} else {
									echo "<div class='badge badge-danger'>INACTIVO</div>";
																				}
								; ?>
											</td>
											<td>
												<!-- <a href="<?php echo site_url('contenidos_admin/view/'.$row['id']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver usuario"></i></a>	-->
												<a href="<?php echo site_url('servicios_admin/editar/'.$row['id'].'/'.$row['idioma']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static">
													<i class="fa fa-pencil" title="Editar usuario">
													</i>
												</a>

												<a href="<?php echo site_url('servicios_admin/borrar/'.$row['id']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el contenido?')" title="Borrar usuario">
													<i class="fa fa-remove">
													</i>
												</a>
											</td>
										</tr>
										<?php } } else {
								?>
										<tr>
											<td colspan="7">
												No se encontraron contenidos...
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div id="servicios_principal" class="tab-pane fade">
								<table class="table table-striped table-bordered" id="servicios_principales_table">
									<thead class="thead-dark">
										<tr>
											<th>
												#
											</th>
											<th>
												Categoria
											</th>
											<th>
												titulo
											</th>
											<th>
												idioma
											</th>

											<th>
												Status
											</th>
											<th width="20%">
												Movimientos
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
								if (!empty($arrSeccions3)) {

									foreach ($arrSeccions3 as $row) {

										$seccion = str_replace('-', ' ',$row['seccion'] );
										$seccion = str_replace('_', ' ',$seccion );
								?>
										<tr>
											<td>
												<?php echo $row['id']; ?>
											</td>
											<td>
												<?php
								if ($seccion==0) {
									echo "Principal"; } else {
									echo ucwords($seccion);} ?>
											</td>
											<td>
												<?php echo $row['titulo']; ?>
											</td>
											<td>
												<?php echo $row['IdiomaTitulo']; ?>
												<p>
													<img src="<?php echo base_url().$row['IdiomaBandera']; ?>" alt=""  width="35px"/>
												</p>
											</td>
											<td>
												<?php
								if ($row['activo']==1) {
									echo "<div class='badge badge-success'>ACTIVO</div>";
																				} else {
									echo "<div class='badge badge-danger'>INACTIVO</div>";
																				}
								; ?>
											</td>
											<td>
												<!-- <a href="<?php echo site_url('contenidos_admin/view/'.$row['id']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver usuario"></i></a>	-->
												<a href="<?php echo site_url('servicios_admin/editar/'.$row['id'].'/'.$row['idioma']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static">
													<i class="fa fa-pencil" title="Editar usuario">
													</i>
												</a>

												<a href="<?php echo site_url('servicios_admin/borrar/'.$row['id']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar el contenido?')" title="Borrar usuario">
													<i class="fa fa-remove">
													</i>
												</a>
											</td>
										</tr>
										<?php } } else {
								?>
										<tr>
											<td colspan="7">
												No se encontraron contenidos...
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div id="servicios_cat" class="tab-pane fade">
						
							
								<table class="table table-striped table-bordered" id="servicios_cat_table">
									<thead class="thead-dark">
										<tr>
											<th>
												#
											</th>
											<th>
												Categoria
											</th>
											<th>
												titulo
											</th>
											<th>
												idioma
											</th>

											<th>
												Status
											</th>
											<th width="20%">
												Movimientos
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($arrSeccions2)) {

											foreach ($arrSeccions2 as $row) {

										$seccion = str_replace('-', ' ',$row['seccion'] );
										$seccion = str_replace('_', ' ',$seccion );
								?>
										<tr>
											<td>
												<?php echo $row['id']; ?>
											</td>
											<td>
												<?php
								if ($seccion==0) {
									echo "Principal"; } else {
									 echo ucwords($seccion);} ?>
											</td>
											<td>
												<?php echo $row['seccion']; ?>
											</td>
											<td>
												<?php echo $row['IdiomaTitulo']; ?>
												<p>
													<img src="<?php echo base_url().$row['IdiomaBandera']; ?>" alt=""  width="35px"/>
												</p>
											</td>
											<td>
												<?php
								if ($row['activo']==1) {
									echo "<div class='badge badge-success'>ACTIVO</div>";
																				} else {
									echo "<div class='badge badge-danger'>INACTIVO</div>";
																				}
								; ?>
											</td>
											<td>
												<!-- <a href="<?php echo site_url('contenidos_admin/view/'.$row['id']); ?>" class="btn btn-facebook btn-xs"><i class="fa fa-search" title="Ver usuario"></i></a>	-->
												
												<?php
											//	if ($ci->services->existeSecciones($row['seccion_id'])>0){ ?>
												<a href="<?php echo site_url('servicios_admin/editar2/'.$row['id'].'/'.$row['idioma']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static">
													<i class="fa fa-pencil" title="Editar">
													</i>
												</a>
													
												<?php /*}else{ ?>
												<a href="<?php echo site_url('servicios_admin/agregar_categoria/'.$row['id'].'/'.$row['idioma']); ?>" class="btn btn-twitter btn-xs" data-backdrop="static">
													<i class="fa fa-pencil" title="Editar">
													</i>
												</a>
												<?php } */?>
												

												<a href="<?php echo site_url('servicios_admin/borrar2/'.$row['id']); ?>" class="btn btn-google-plus btn-xs" onclick="return confirm('Esta seguro que desea borrar la categoria?')" title="Borrar">
													<i class="fa fa-remove">
													</i>
												</a>
											</td>
										</tr>
										<?php } } else {
								?>
										<tr>
											<td colspan="7">
												No se encontraron contenidos...
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- Data list table -->
						

						






					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="seccionesModal" class="modal fade">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title">
					Categorias de Servicios Disponibles
				</h4>

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>

			</div>

			<div class="modal-body">

				<?php /* ?>

				<table>

					<?php

					//print_r($arrSeccions);

					if (!empty($arrSeccions)) {

						foreach ($arrSeccions as $r2) {

							$nombre = $r2['seccion'];

					?>

					<tr>

						<td>

							<!--<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="addRow('<?php echo $r2['seccion_id']; ?>','<?php echo $nombre; ?>')">
								<i class="fa fa-plus" aria-hidden="true">
								</i>
							</a>
-->
						</td>

						<td>

							<?php echo $nombre; ?>

						</td>

					</tr>

					<?php }

								} else {

					?>
					<td>



					</td>

					<td>

						No exite categorias de servicio

					</td>

					<?php

									}

					?>

				</table>
<?php */ ?>
			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>

			</div>

		</div>

	</div>

</div>
