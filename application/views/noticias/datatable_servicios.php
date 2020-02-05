<table id="servicios_table">
	<thead>
		<tr>
			<td width="10%">SELE</td>
			<td width="90%">SERVICIO</td>
		</tr>
	</thead>
</table>
<script>
$(document).ready(function(){  
      var dataTable = $('#servicios_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'noticias_admin/datatable'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
</script>