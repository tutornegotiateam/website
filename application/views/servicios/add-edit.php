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



						?>

						<div class="row">

							<div class="col-md-12">

								<form method="post" name="form-1" id="form-1">
									<input type="hidden" name="idioma" id="idioma" value="<?php echo  $idioma_; ?>">
									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Seccion (Categoria del Servicio)
											</label>

											<select name="seccion" id="seccion" class="form-control">

												<option value="-1">
													Seleccione opción
												</option>
												<?php
												if ($member->seccion==0) {
												?>
												<option value="0" <?php
												if (@$member->seccion==0) {
												?>selected="selected" <?php } ?> >
													Principal
												</option>

												<?php } ?>
												<?php

									if (!empty($arrSeccions)) {

										foreach ($arrSeccions as $r3) {



									?>
									
									

												<option value="<?php echo $r3['seccion_id']; ?>" <?php
									if (@$member->seccion==$r3['seccion_id']) {
									?>selected="selected" <?php } ?> >
													<?php echo $r3['seccion']; ?>
												</option>

												<?php }} ?>

											</select>

											<input type="hidden" name="idioma" id="idioma" value="<?php echo $idioma_ ?>"/>

										</div>



									</div>
									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Titulo del servicio
											</label>

											<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo !empty(@$member->titulo)?@$member->titulo:''; ?>" <?php
																																																	   if ($title=='') {
																																																	   ?> onkeyup="if (isArrowKey(event)) return ;urlAmigable(this.value,<?php echo $idioma_ ?>);" <?php } ?>>

											<?php echo form_error('titulo','<div class="invalid-feedback">','</div>'); ?>

										</div>



									</div>

									<div class="form-row">

										<div   class="col-md-9 mb-3">

											<label>
												URL Amigable
											</label>

											<input type="text" class="form-control" name="id_txt" id="id_txt" placeholder="Url amigable" readonly="true"  value="<?php echo !empty(@$member->id_txt)?@$member->id_txt:''; ?>">



										</div>

									</div>

									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Subtitulo
											</label>

											<input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Subtitulo" value="<?php echo !empty(@$member->subtitulo)?@$member->subtitulo:''; ?>" >

											<?php echo form_error('subtitulo','<div class="invalid-feedback">','</div>'); ?>

										</div>



									</div>
									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Color Fondo Titulo y Subtitulo
											</label></br>
											<input type="hidden" name="bgcolor" id="demo" class="form-control" value="<?php echo !empty(@$member->bgcolor)?@$member->bgcolor:'#000000'; ?>" >
											<?php /*
											<input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Subtitulo" value="<?php echo !empty(@$member->subtitulo)?@$member->subtitulo:''; ?>" >

											<?php echo form_error('subtitulo','<div class="invalid-feedback">','</div>'); ?>
											*/ ?>
										</div>



									</div>
									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Banner de la página
											</label>

											<input  id="banner_bg" name="banner_bg" type="text" class="form-control" value="<?php echo !empty(@$member->banner_bg)?@$member->banner_bg:''; ?>" >

											<a href="javascript:open_popup('<?php echo base_url(); ?>assets/libs/filemanager/dialog.php?type=2&popup=1&field_id=banner_bg&Yave=12345')" class="btn btn-success" >
												Seleccionar Imagen
											</a>

											<?php //echo form_error('banner_bg','<div class="invalid-feedback">','</div>'); ?>

										</div>



									</div>

									<div class="form-row">

										<div class="col-md-12 mb-3">

											<label>
												Contenido
											</label>

											<textarea class="form-control" name="contenido" id="contenido" placeholder="Contenido">
												<?php echo !empty(@$member->contenido)?@$member->contenido:''; ?>
											</textarea>

											<?php echo form_error('contenido','<div class="invalid-feedback">','</div>'); ?>

										</div>



									</div>



									<div class="form-row">

										<div class="col-md-4 mb-3">

											<label>
												Se puede vizualizar
											</label>

											<div class="form-check">

												<input class="form-check-input" type="checkbox" value="1" id="f_contacto" name="f_contacto" <?php
																																			if (@$member->f_contacto) {
																																				echo  'checked="checked"'; } ?>>

												<label class="form-check-label" for="defaultCheck1">

													Formulario de contacto

												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="checkbox" value="1" id="f_cotizacion" name="f_cotizacion" <?php
																																				if (@$member->f_cotizacion) {
																																					echo  'checked="checked"'; } ?>>

												<label class="form-check-label" for="defaultCheck2">

													Formulario de cotización

												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="checkbox" value="1" id="f_temas_similares" name="f_temas_similares" <?php
																																						  if (@$member->f_temas_similares) {
																																							  echo  'checked="checked"'; } ?>>

												<label class="form-check-label" for="defaultCheck2">

													Temas similares al contenido
												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="checkbox" value="1" id="f_twitter" name="f_twitter" <?php
																																		  if (@$member->f_twitter) {
																																			  echo  'checked="checked"'; } ?>>

												<label class="form-check-label" for="defaultCheck2">

													Twitter
												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="checkbox" value="1" id="f_facebook" name="f_facebook" <?php
																																			if (@$member->f_facebook) {
																																				echo  'checked="checked"'; } ?>>

												<label class="form-check-label" for="defaultCheck2">

													facebook
												</label>

											</div>

											<p>
											</p>

											<div class="form-row">

												<div class="col-md-4 mb-3">

													<label>
														Estatus
													</label>

													<select name="activo" class="form-control">

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





										</div>

										<div class="col-md-4 mb-3">

											<label>
												Documento anexo
											</label>

											<div class="input-append">

												<input name="f_brochure"  id="fieldID1" type="text" value="<?php echo !empty(@$member->f_brochure)?@$member->f_brochure:''; ?>" class="form-control" >

												<a href="javascript:open_popup('<?php echo base_url(); ?>assets/libs/filemanager/dialog.php?type=2&popup=1&field_id=fieldID1&Yave=12345')" class="btn btn-success" >
													Seleccionar Documento
												</a>

											</div>





										</div>

										<div class="col-md-4 mb-3">

											<label>
												Personas
											</label>

											<div>

												<a href="#"  class="btn btn-success" class="form-control" data-toggle="modal" data-target="#miModal">
													Agregar responsables
												</a>

											</div>

											<div id="selePersonas">

												<table id="personas-tb" class="table">

													<thead>

														<tr>

															<th width="10%">
																OPC
															</th>

															<th width="10%">
																ID
															</th>

															<th width="80%">
																NOMBRE
															</th>

														</tr>

													</thead>

													<tbody>

														<?php



														//  print_r($arrPersons4);

														if (!empty($arrPersons4)) {

															foreach ($arrPersons4 as $r4) {

																$nombre = $r4->PersonaNom." ".$r4->PersonaApePat." ".$r4->PersonaApeMat; ?>

														<tr id="tr-<?php echo  $r4->PersonaId; ?>">

															<td>
																<a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='removeRow(<?php echo $r4->PersonaId; ?>)'>
																	<i class='fa fa-times' aria-hidden='true'>
																	</i>
																</a>
															</td>

															<td>
																<?php echo  $r4->PersonaId; ?>
															</td>

															<td>
																<?php echo  $nombre; ?>
															</td>

														</tr>



														<?php } } ?>

													</tbody>

												</table>

											</div>

											<input type="hidden" name="personas" id="personas" value="" />

										</div>



									</div>





									<a href="<?php echo site_url('servicios_admin'); ?>" class="btn btn-secondary">
										Regresar
									</a>

									<input type="submit" name="memSubmit" class="btn btn-success" value="Guardar">

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

	CKEDITOR.replace( 'contenido' ,{ 
		filebrowserBrowseUrl : '/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', 
		filebrowserUploadUrl : '/assets/libs/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&Yave=12345', 
		filebrowserImageBrowseUrl : '/assets/libs/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&Yave=12345' 
	});



	function open_popup(url)
	{

		var w = 880;

		var h = 570;

		var l = Math.floor((screen.width-w)/2);

		var t = Math.floor((screen.height-h)/2);

		var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
	}



	function addRow(a, b)
	{

		var x =0;

		$('#personas-tb tr').each(function() {

			if ($(this).find("td:first").length > 0) {

				var empleadoId = $(this).find("td").eq(1).html();

				if (a==empleadoId) {

					alert('Ya esta agregado la persona: '+b);

					x =1;

					}

				}

			});



		if (x==0) {

			var table = $('#personas-tb');

			table.append("<tr id='id-"+ a +"'><td><a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='removeRow("+ a +")'><i class='fa fa-times' aria-hidden='true'></i></a></td><td>"+ a +"</td><td>" + b + "</td></tr>");

			}
	}





	function removeRow(a)
	{

		$("#id-"+a).remove();
	}















	$("#form-1").submit(function(e) {



		e.preventDefault();

		var empleadoId ='';

		$('#personas-tb tr').each(function() {

			if ($(this).find("td:first").length > 0) {

				empleadoId =empleadoId + $(this).find("td").eq(1).html()+',';

				}

			});



		$('#personas').val(empleadoId);

		var  errores = '';

		if ($("select[name=seccion]").val() == -1) {

			errores+='<li>Debe de seleccionar la sesión del contenido</li>';

			}



		if ($("#titulo").val() == '') {



			errores+='<li>Debe de teclear un titulo</li>';

			}



		if ($('input[type=checkbox]:checked').length === 0) {

			e.preventDefault();

			errores+='<li>Debe de seleccionar una opcion del apartado a visualizar</li>';

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

		$('#id_txt').val(m);
	}

	function isArrowKey(k_ev)
	{

		var unicode=k_ev.keyCode? k_ev.keyCode : k_ev.charCode;

		if (unicode >= 37 && unicode <= 40)
			return true;

		return false;
	}

</script>