<script>
$('#proyecto_status').on('change', function () {
      //  alert(this.value);
        window.location.href = "<?php echo base_url()?>/proyectos/?status="+this.value+"&responsable=rplaza";
        //table.columns(1).search( this.value ).draw();
} );




</script>