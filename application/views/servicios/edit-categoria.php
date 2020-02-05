<div class="main-content">

	<div class="container-fluid">

		<div class="row">

			<div class="col-lg-12 col-md-12">

				<div class="card">

					<div class="card-heading border bottom">

						<h4 class="card-title">
							<?php echo $title ?>
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

						<?php



						$title = !empty(@$member->titulo)?@$member->titulo:'';

						$idioma_ = !empty(@$member->idioma)?@$member->idioma:'1';

						$seccion_ = !empty(@$member->seccion)?@$member->seccion:'0';

						

						?>

						<div class="row">

							<div class="col-md-12">

								<form method="post" name="form-1" id="form-1">
									<input type="hidden" name="idioma" id="idioma" value="<?php echo  $idioma_; ?>">
									

									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Categoria
											</label>

											<input type="text" class="form-control" name="seccion" id="seccion" placeholder="Titulo" value="<?php echo !empty(@$member->seccion)?@$member->seccion:''; ?>" <?php
																																																		 if ($idioma_=='1') {
																																																		 ?> onkeyup="if (isArrowKey(event)) return ;urlAmigable(this.value,<?php echo $idioma_ ?>);" <?php } ?>>

											<?php echo form_error('titulo','<div class="invalid-feedback">','</div>'); ?>

										</div>



									</div>

									<div class="form-row">

										<div   class="col-md-9 mb-3">

											<label>
												URL Amigable
											</label>

											<input type="text" class="form-control" name="seccion_id" id="seccion_id" placeholder="Url amigable" readonly="true"  value="<?php echo !empty(@$member->seccion_id)?@$member->seccion_id:''; ?>">



										</div>

									</div>

									<div class="form-row">

										<div class="col-md-4 mb-3">

											<label>
												Estatus
											</label>

											<select name="activo" id="activo" class="form-control">

												<option value="1" <?php
									if (@$member->activo==1) {
										echo 'selected="selected"'; } ?>  >
													Activo
												</option>

												<option value="0" <?php
									if (@$member->activo==0) {
										echo 'selected="selected"'; } ?> >
													Inactivo
												</option>

											</select>

										</div>





									</div>
									
									





									<a href="<?php echo site_url('servicios_admin'); ?>" class="btn btn-secondary">
										Regresar
									</a>

									<input type="submit" name="memSubmit" class="btn btn-success" value="Guardar">
                                    <input type="hidden" name="id" id="id" value="<?php echo !empty(@$member->id)?@$member->id:''; ?>">
								</form>

							</div>

						</div>





















					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div id="miModal" class="modal fade">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title">
					Seleccionar Personal
				</h4>

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>

			</div>

			<div class="modal-body">



				<table>

					<?php



					if (!empty($arrPersons)) {

						foreach ($arrPersons as $r2) {

							$nombre = $r2['PersonaNom']." ".$r2['PersonaApePat']." ".$r2['PersonaApeMat'];

					?>

					<tr>

						<td>

							<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="addRow('<?php echo $r2['PersonaId']; ?>','<?php echo $nombre; ?>')">
								<i class="fa fa-plus" aria-hidden="true">
								</i>
							</a>

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

						No exite personal

					</td>

					<?php

									}

					?>

				</table>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>

			</div>

		</div>

	</div>

</div>





<script>


	// Replace the <textarea id="editor1"> with a CKEditor

	// instance, using default configuration.

	//CKEDITOR.replace( 'contenido' );







	$("#form-1").submit(function(e) {



		e.preventDefault();

		var empleadoId ='';
		var errores ='';

		$('#personas-tb tr').each(function() {

			if ($(this).find("td:first").length > 0) {

				empleadoId =empleadoId + $(this).find("td").eq(1).html()+',';

				}

			});



		


		if ($("#titulo").val() == '') {



			errores+='<li>Debe de teclear un titulo</li>';

			}



		


		if (errores!='') {

			errores ='<ul>'+errores+'</ul>';

			toastr.error(errores, 'Error(es)!');

			return false;

			}







		// swal("Good job!", "You clicked the button!", "success")

		$('#form-1').submit();



		});



	function hideOtherLanguage(aa, bb, cc)
	{

		var x = '';

		$.ajax({

			type: "POST",

			url: "<?php echo base_url(); ?>menu/existe_idioma",

			data: { a: aa, b:bb, c:cc},

			cache: false,

			success: function(resultData) {

				if (resultData==0) {



					window.location.href = "<?php echo base_url(); ?>menu/agregaridioma/"+aa+"/"+bb+"/"+cc;

					$('.ocultar_div').hide();

					} else {

					$('.ocultar_div').hide();

					$('#contenido-'+aa).show();

					$('#selecciona_idioma').text(bb);

					}

				},

			error: function(resultData) {

				$("#msgError").html( "<span style='color: red'>Error al cambiar posición</span>" );

				$("#msgError").fadeTo(2000, 500).slideUp(500, function() {

					$("#msgError").slideUp(500);

					});

				}

			});

	/*

	$('.ocultar_div').hide();

	$('#contenido-'+aa).show();

	$('#selecciona_idioma').text(bb);*/

		//alert(x);
	}







	$(function() {

		$('.ocultar_div').hide();

		$('#contenido-<?php echo $this->session->userdata('idiomaSeleccionado'); ?>').show();



		//codigo aquí

		})

	function urlAmigable(text, idioma)
	{

		//alert(text+' '+idioma)

		var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';

		var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';

		var p = new RegExp(a.split('').join('|'), 'g');

		var m ='';



		m = text.toString().toLowerCase().replace(/\s+/g, '-')

		.replace(p, function (c) {

			return b.charAt(a.indexOf(c));

			})

		.replace(/&/g, '-y-')

		.replace(/[^\w\-]+/g, '')

		.replace(/\-\-+/g, '-')

		.replace(/^-+/, '')

		.replace(/-+$/, '');

		// $('#idioma-'+idioma).val(m);

		$('#seccion_id').val(m);
	}

	function isArrowKey(k_ev)
	{

		var unicode=k_ev.keyCode? k_ev.keyCode : k_ev.charCode;

		if (unicode >= 37 && unicode <= 40)
			return true;

		return false;
	}

</script>