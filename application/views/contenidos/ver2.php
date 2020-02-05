<?php
//print_r($entradas);
//echo $id_txt;
//echo $entradas[0]['id_txt'];
//print_r($entradas);

if($entradas[0]['banner_bg']==''){
	$img = '/assets/site/img/bg/bg_servicios.jpg';
}else{
	$img = $entradas[0]['banner_bg'];
}

?>
<section class="page-title-section bg-img cover-background"  data-overlay-dark="0" data-background="<?php echo $img; ?>" >

    <div class="container">
        <div id="topic-description" class="topic-description" style="background-color:<?php echo $entradas[0]['bgcolor']; ?>;opacity: 0.8;">
						<h1 class="primary-headline" style='color:#FFFFFF'> 
						<?php echo $entradas[0]['titulo']; ?>
						</h1>
						<h3><?php echo $entradas[0]['subtitulo']; ?></h3>	
						<p class="body-copy"><?php //echo $arrServiciosCategoria->ServicioContenido;?></p>
							
							         
					</div>
    </div>
    
</section>
<?php 
$visible=0;
if($visible==1){
	/*
?>
<div style="background-color: #e8eae9;">
<div class="row" style="background-color: #53565a">
<div class="container text-center">
	<ul id="servicios_css">
		<li><a href="/servicios/auditoria_ansurance/ifrs-en-mexico/" class="label">IFSR en Mexico</a></li>
		<li><a href="/servicios/auditoria_ansurance/servicios-de-asesoria-en-contabilidad-financiera/" class="label">Servicios de Asesoría en Contabilidad Financiera</a></li>
		<li><a href="/servicios/auditoria_ansurance/precios-de-transferencia-y-efectividad-del-modelo-operativo/" class="label">Precios de Transferencia y Efectividad del Modelo Operativo</a></li>
		<li><a href="/servicios/auditoria_ansurance/auditoria-de-estados-financieros/" class="label">Auditoría de Estados Financieros</a></li>
		<li><a href="/servicios/auditoria_ansurance/investigacion-de-fraudes-y-asistencia-en-litigios/" class="label">Investigación de Fraudes y Asistencia en Litigios</a></li>
	</ul>
</div>


</div>
</div>
<?php
*/
 } ?>

 <section class="seccion_gris">
    <div class="container">
   
        	
        	<div class="row row_noticias">
                <div class="col col--main col-md-12 col-lg-12">

                    <div class="card_default card_default--hovered card--horizontal  ">
                     <div class="col-lg-9 col-md-12 col-xs-12">
                     <div class="row" id="espacio_25"></div>
                     <h1><?php echo $entradas[0]['titulo']; ?></h1>
                     <h4><?php echo $entradas[0]['subtitulo']; ?></h4>
                     <ul class="social-icon-style1">
                        <li> <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                        <li> <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                        <li> <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                        <li> <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                        <li> <a href="javascript:void(0)"><i class="fas fa-envelope"></i></a></li>
                     </ul>
                     <div class="row" id="espacio_25"></div>
                     <div class="col-lg-12 col-md-12 col-xs-12">
                     
                     <?php echo $entradas[0]['contenido']; ?>
                     </div>
                     </div>
                     <div class="col-lg-3 col-md-12 col-xs-12">
                     <div class="row" id="espacio_25"></div>
                     <?if($entradas[0]['f_brochure']==1){?>
                    	<div class="margin-30px-tb services-single-download">
                        <ul class="no-margin list-style-none">
                        
                        <li style="padding: 20px">
                           <p align="center"><i class="fas fa-download fa-3x"></i></p> 
                           <p>PDF, Mayo 2019.</p>
                        <a href="javascript:void(0)" class="descarga_archivo">
                        <?php echo $entradas[0]['subtitulo']; ?>
                        </a>
                        </li>
                        </ul>
                    </div>
                    <?php } ?>
                     
                     
                     <div class="margin-30px-tb services-single-menu">
                        <ul class="no-margin list-style-none" style="background-color: #ECECEC">
                        <?if($entradas[0]['f_contacto']==1){?>
                        <li><a href="javascript:void(0)"><i class="fas fa-phone fa-lg"></i> Entremos en contacto</a></li>
                        <?php } ?>
                        <?if($entradas[0]['f_cotizacion']==1){?>
                        <li><a href="javascript:void(0)"><i class="fas fa-file fa-lg"></i> Solicitar cotización</a></li>
                         <?php } ?>
                        </ul>
                    </div>                     
                     </div>
                    
                    
                    
                    </div>
                    
                </div>
                <div class="col col--main col-md-12 col-lg-12">
                <?
                if($entradas[0]['personas']!=''){?>
                 <div id="linea-division">
                 <div class="card_default card_default--hovered card--horizontal  ">
                 
                  <div class="col-lg-12 col-md-12">
                     <div class="row" id="espacio_25"></div>
                 <?php /*   */ ?>
                 <h4>Más información</h4>
                 <div class="row">
                      <?php 
                  //   print_r($arr_personas);
                      if(!empty($arr_personas)){
                      	 foreach($arr_personas as $row){ 
                      	 ?>
                   <div class="col-lg-6 col-md-12 sm-margin-20px-bottom">
        <div class="partner-box bg-white">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="partner-img">
                        <img alt="partner" src="/assets/site/img/personas/m-sin-foto.jpg" width="50%">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="partner-text"><span><?php echo $row['PersonaParticipaEmpresa']; ?></span>
                        <h4><a href='<?php echo base_url().strtolower($idioma_sele[0]->IdiomaSigla); ?>/profiles/ver/<?php echo $row['PersonaId'];?>'><?php echo $row['PersonaNom']." ".$row['PersonaApePat']." ".$row['PersonaApeMat']; ?></a></h4>
                        <p><?php echo $row['PersonaEmail']; ?></p>
                        <ul class="social-icon-style1">
                            <li> <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                            <li> <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                            <li> <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                            <li> <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      <?php } } ?>

</div>
                 <?php /*   */ ?>
                     </div>
                  </div>
                  </div>

                <?php } ?>
                </div>
                <?php /* */ ?>
             
                </div>
                
                
					
					
    </div>
    </section>


</div>
