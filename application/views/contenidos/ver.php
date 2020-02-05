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

						<h4 class="primary-headline" style='color:#FFFFFF'> 

						<?php echo $entradas[0]['titulo']; ?>

						</h4>

						<h5><?php echo $entradas[0]['subtitulo']; ?></h5>	

						<p class="body-copy"><?php //echo $arrServiciosCategoria->ServicioContenido;?></p>

						

						<?php  if(!empty($notas_relacionadas)) {?>

						<div class="row">

						<div class="col-sm-12">

							<a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>pages/<?php echo $seccion; ?>/<?php echo $entradas[0]['id_txt']; ?>" class="btn btn-primary btn-block">Descubre lo que poder hacer por ti</a>

						</div>

					    </div>	

					    <?php } ?>

					    

							         

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

           	<?php

           	 $c=1;$d=1;$e=1;

           	 if(!empty($notas_relacionadas)){ foreach($notas_relacionadas as $r3){ ?>

    

           	  <?php if($c==1){ ?>

           	<div class="col-lg-12 col-md-12 sm-margin-10px-bottom ">

                        <div class="blog-grid " id="blog-grid1" style="background-color: #161715">

                        

                           

                            

                            

                            

                            

                             <div class="row ">

                              <div class="col-md-12 col-lg-7">

                            <div class="data">

                                <div class="blog-grid-text">

                             <span id="label-seccion"><?php echo ucfirst($r3['seccion']); ?></span>

                                <h4><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>" id="text-blanco"><?php echo $r3['titulo']; ?></a></h4>

                               

                                <!--<div class="data-box-grid">

                                    <h5>09</h5>

                                    <p>July</p>

                                </div>-->

                                <!--<p class="no-margin">Exercitation ullamco laboris nisi ut aliquip ex ea commodo. cillum dolore eu fugiat nulla pariatur commodo consequat.cillum dolore eu fugiat pariatur.</p>

                                <p><?php //echo $r3['subtitulo']; ?></p>-->

                            </div>

                            <div class="blog-grid-text2">

                          

                            <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>" class="read-more" id="text-blanco"> 

                            Leer más <i class="fa fa-angle-right fa-3" aria-hidden="true" style="color:#c6c6c6"></i>

                              <!--<button class="btn btn-dark btn-circle btn-circle-sm m-1"></button>-->

                            </a>

                            </div>

                            </div>

                        </div>

                        <div class="col-md-12 col-lg-5">

                            <img src="<?php echo $r3['banner_bg']; ?>"  style="height:100%" class="img-resposive" > 

                        </div>

                       

                    </div>

                            

                            

                            

                        </div>

                        

                </div>

            <?php }elseif($c>=2 && $c<=4){ ?>   

        		<div class="col-lg-4 col-md-12 sm-margin-10px-bottom" style="float: left">

                        <div class="blog-grid" id="blog-grid1">

                            <div class="blog-grid-img"><img alt="img" src="<?php echo $r3['banner_bg']; ?>" style="height:122px" class="img-resposive">

                            </div>

                            <div class="blog-grid-text">

                             <span id="label-seccion"><?php echo ucfirst($r3['seccion']); ?></span>

                                <h4><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>"><?php echo $r3['titulo']; ?></a></h4>

                               

                                <!--<div class="data-box-grid">

                                    <h5>09</h5>

                                    <p>July</p>

                                </div>-->

                                <!--<p class="no-margin">Exercitation ullamco laboris nisi ut aliquip ex ea commodo. cillum dolore eu fugiat nulla pariatur commodo consequat.cillum dolore eu fugiat pariatur.</p>

                                <p><?php //echo $r3['subtitulo']; ?></p>-->

                            </div>

                            <div class="blog-grid-text2">

                          

                            <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>" class="read-more"> 

                            Leer más <i class="fa fa-angle-right fa-3" aria-hidden="true" style="color:#c6c6c6"></i>

                              <!--<button class="btn btn-dark btn-circle btn-circle-sm m-1"></button>-->

                            </a>

                            </div>

                        </div>

                </div>				

			<?php }else{ ?>

			<div class="col-lg-6 col-md-12 sm-margin-10px-bottom" style="display: left">

                        <div class="blog-grid" id="blog-grid1">

                            <div class="blog-grid-img"><img alt="img" src="<?php echo $r3['banner_bg']; ?>" style="height:122px" class="img-resposive">

                            </div>

                            <div class="blog-grid-text">

                             <span id="label-seccion"><?php echo ucfirst($r3['seccion']); ?></span>

                                <h4><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>"><?php echo $r3['titulo']; ?></a></h4>

                               

                                <!--<div class="data-box-grid">

                                    <h5>09</h5>

                                    <p>July</p>

                                </div>-->

                                <!--<p class="no-margin">Exercitation ullamco laboris nisi ut aliquip ex ea commodo. cillum dolore eu fugiat nulla pariatur commodo consequat.cillum dolore eu fugiat pariatur.</p>

                                <p><?php //echo $r3['subtitulo']; ?></p>-->

                            </div>

                            <div class="blog-grid-text2">

                          

                            <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r3['id_txt']; ?>" class="read-more"> 

                            Leer más <i class="fa fa-angle-right fa-3" aria-hidden="true" style="color:#c6c6c6"></i>

                              <!--<button class="btn btn-dark btn-circle btn-circle-sm m-1"></button>-->

                            </a>

                            </div>

                        </div>

                </div>

                

            <?php }

              $c=$c+1;

             ?>

            <?php }}else{ ?> 

            	<div class="container">

                     <h1><?php echo $entradas[0]['titulo']; ?></h1>

                     <h4><?php echo $entradas[0]['subtitulo']; ?></h4>

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

                    </div>

                     <div class="row" id="espacio_25"></div>

                     <div class="col-lg-12 col-md-12 col-xs-12">

                     <div id="contenido_principal">

                     <?php echo $entradas[0]['contenido']; ?>

                     </div>

                     </div>

            

            <?php } ?>     

           </div>

           <div class="col-lg-3 col-md-12 col-xs-12">

           	<div class="row" id="espacio_25"></div>

                     <?if($entradas[0]['f_brochure']!=''){?>

                    	<div class="margin-30px-tb services-single-download">

                        <ul class="no-margin list-style-none">

                        

                        <li style="padding: 20px">

                           <p align="center"><i class="fas fa-download fa-3x"></i></p> 

                           <p>PDF, Mayo 2019.</p>

                        <a href="<?php echo $entradas[0]['f_brochure']; ?>" target="_blank" class="descarga_archivo">

                        <?php echo $entradas[0]['subtitulo']; ?>

                        </a>

                        </li>

                        </ul>

                    </div>

                    <?php } ?>

                     

                     

                     <div class="margin-30px-tb services-single-menu">

                        <ul class="no-margin list-style-none" style="background-color: #ECECEC">

                        <?if($entradas[0]['f_contacto']==1){?>

                        <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/contacto'; ?>"><i class="fas fa-phone fa-lg"></i> Entremos en contacto</a></li>

                        <?php } ?>

                        <?if($entradas[0]['f_cotizacion']==1){?>

                        <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/contacto/cotizacion'; ?>"><i class="fas fa-file fa-lg"></i> Solicitar cotización</a></li>

                         <?php } ?>

                        </ul>

                    </div>

                    

                     <div class="widget-title">

                            <h6><b>Servicios relacionados</b></h6>

                        </div>

                    <div class="margin-30px-tb services-single-menu">

                       

                        <ul class="no-margin list-style-none" style="background-color: #ECECEC">

                        

                        

                         <?php if(!empty($services_rel)){ foreach($services_rel as $r2){ ?>

                        <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>servicios/<?php echo $r2['seccion']; ?>/<?php echo $r2['id_txt']; ?>"><code>»</code> <?php echo $r2['titulo']; ?></a></li>

                         <?php }} ?>

                  

                  

                        </ul>

                    </div>

                    

                    

                    

                      <div class="margin-30px-top callback-box3" style="display: none">

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

           </div>      

                

					

		 </div>			
<?php /******/?>

<div class="col col--main col-md-12 col-lg-12">

                <?

                if($entradas[0]['personas']!=''){?>

                 <div id="linea-division">

                 <div class="card_default card_default--hovered card--horizontal  ">

                 

                  <div class="col-lg-12 col-md-12">

                     <div class="row" id="espacio_25"></div>

                 <?php /*   */ ?>

                 <h4>Conócenos</h4>

                 <div class="row">

                      <?php 

                  //   print_r($arr_personas);

                      if(!empty($arr_personas)){

                      	 foreach($arr_personas as $row){ 

                      	 ?>

                   <div class="col-lg-6 col-md-12 sm-margin-20px-bottom">

        <div class="partner-box bg-white imagen-personas">

            <div class="row">

                <div class="col-md-4 col-sm-12">

                    <div class="partner-img">
                        <?php if($row['PersonaFoto']==''){
                            $imagen = "/assets/site/img/personas/m-sin-foto.jpg";
                        }else{
                            $imagen = base_url().$row['PersonaFoto'];
                        }
                        ?>
                        <div class="crop">
                            <p>
                        <img alt="partner" src="<?php echo $imagen; ?>" width="50%" class="img-thumbnail img-persona uno">
                            <p>
                       </div>
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

<?php /*****/?>



    </div>

      

    </section>







