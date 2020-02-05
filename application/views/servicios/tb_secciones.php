<form role="form" id="form1" name="form1" method="post" >
	<div class="modal-header">
		<h4 class="modal-title">
			Categorias de servicios disponbles
		</h4>
		<button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-hidden="true">
			&times;
		</button>
		
	</div>
	<div class="modal-body">
		<table class="table-bordered table ">
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
	</div>
</form>


<script>
/*
	$('#datos2').DataTable({
		language: {
			"url": "assets/js/datatables/js/spanish.js"
			},
		ajax: "modulos/sistema/punto_ventas/data_buscar_clientes.php" ,
		scrollY:        420,
		deferRender:    false,
		scroller:       false


		});

	var table = $('#datos2').DataTable();
	$('#datos2 tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
		// alert( 'Usted selecciono al cliente '+data[0]+' '+data[1]+' ' );

		$('#VtaClienteId').val(data[0]);
		$('#VtaCliente').val(data[1]);
		$('#notas').val(data[3]);

		$('#BuscarCliente').modal('toggle');
		});
*/
</script>