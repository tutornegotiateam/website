<table class="display table" cellspacing="0" width="100%" id="table-records">
    <thead>
    <tr>
        <th>Empleado</th>
        <th>Tipo Empleado</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($arr_responsable_proyecto)){ foreach($arr_responsable_proyecto as $r2){ ?>
        <tr class="tr_responsable" data-id="<?php echo $r2['PersonaId']; ?>" data-name="<?php echo $r2['PersonaNom'].' '.$r2['PersonaApePat'].' '.$r2['PersonaApeMat']; ?>">
            <td><?php echo $r2['PersonaNom'].' '.$r2['PersonaApePat'].' '.$r2['PersonaApeMat']; ?></td>
            <td><?php if($r2['PersonaTipo']==1){ echo "INTERNO"; }else{ echo "EXTERNO"; }?></td>
        </tr>
<?php }}?>
    </tbody>
</table>
<style>
#table-records table tr {
    cursor: pointer;
}
</style>
<script>
 $('#table-records').DataTable();
</script>