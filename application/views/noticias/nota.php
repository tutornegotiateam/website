<?php
//print_r($new);
//echo $id_txt;
//echo $new[0]['id_txt'];
//print_r($new);

if($new[0]['banner_bg']==''){
	$img = '/assets/site/img/bg/bg_servicios.jpg';
}else{
	$img = $new[0]['banner_bg'];
}

?>
<section class="page-title-section bg-img cover-background"  data-overlay-dark="0" data-background="<?php echo $img; ?>" >

    <div class="container">
        <div id="topic-description" class="topic-description" style="background-color:<?php echo $new[0]['bgcolor']; ?>;opacity: 0.8;">
						<h1 class="primary-headline" style='color:#FFFFFF'> 
						<?php echo $new[0]['titulo']; ?>
						</h1>
						<h3><?php echo $new[0]['subtitulo']; ?></h3>	
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
    <div class="container" id="paddin-lr">
         <div class="row">
         
           <div class="col-lg-9 col-md-12 col-xs-12">
           	<div class="row" id="espacio_25"></div>
                     <h1><?php echo $new[0]['titulo']; ?></h1>
                     <h4><?php echo $new[0]['subtitulo']; ?></h4>
                     <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                     <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e0e3ac864bcea72"></script>
                     <div class="addthis_inline_share_toolbox"></div>
                     <?php /*   
                     <ul class="social-icon-style1">
                        <li> <a  onclick="launchShare('facebook');" title="share via facebook" href="#" data-provider="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li> <a onclick="launchShare('twitter');" title="share via twitter" href="#" data-provider="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li> <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li> 
                        <li> <a onclick="launchShare('linkedin');" title="share via linkedin" href="#" data-provider="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        <li> <a onclick="launchShare('email');" title="share via facebook" href="#" data-provider="email" ><i class="fas fa-envelope"></i></a></li>
                     </ul>*/ ?>
                     <div class="row" id="espacio_25"></div>
                     <div class="col-lg-12 col-md-12 col-xs-12">
                     <div id="contenido_principal">
                     <?php echo $new[0]['contenido']; ?>
                     </div>
                     </div>
           </div>
           <div class="col-lg-3 col-md-12 col-xs-12">
           	<div class="row" id="espacio_25"></div>
                     <?if($new[0]['f_brochure']==1){?>
                    	<div class="margin-30px-tb services-single-download">
                        <ul class="no-margin list-style-none">
                        
                        <li style="padding: 20px">
                           <p align="center"><i class="fas fa-download fa-3x"></i></p> 
                           <p>PDF, Mayo 2019.</p>
                        <a href="javascript:void(0)" class="descarga_archivo">
                        <?php echo $new[0]['subtitulo']; ?>
                        </a>
                        </li>
                        </ul>
                    </div>
                    <?php } ?>
                     
                     
                     <div class="margin-30px-tb services-single-menu">
                        <ul class="no-margin list-style-none" style="background-color: #ECECEC">
                        <?if($new[0]['f_contacto']==1){?>
                        <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>contacto"><i class="fas fa-phone fa-lg"></i> Entremos en contacto</a></li>
                        <?php } ?>
                        <?if($new[0]['f_cotizacion']==1){?>
                        <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/contacto/cotizacion'; ?>"><i class="fas fa-file fa-lg"></i> Solicitar cotización</a></li>
                         <?php } ?>
                        </ul>
                     </div>
                     
                       

 <div class="margin-30px-top callback-box3">
                        	 <div class="row">
                        	<div class="col-12">
                        	<div class="widget">
                                <div class="widget-title">
                                    <h6 style="color: #fff"><b>Noticias recientes</b></h6>
                                </div>
                                <div class="row">
                                	<div class="col-12">
                                <ul class="noticias_recientes">
                                <?php if(!empty($news_resent)){ foreach($news_resent as $r1){ ?>
                                    <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r1['id_txt']; ?>"><?php echo $r1['titulo']; ?></a></li>
                                <?php }} ?>
                                </ul>
                                	</div>                                	
                                </div>
                                <div class="widget-title">
                                    <h6><b><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/">Ir a sala de prensa</a></b></h6>
                                </div>
                                
                            </div>  
                        	</div>
                        </div>
                        </div> 
                        <div><br/></div>  
                        
           </div>      
                
					
		 </div>			
    </div>
    </section>



