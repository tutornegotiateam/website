<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

 <div class="rev_slider_wrapper  custom-controls">
<style>
	.text {
/*  margin: 0 auto;*/
  text-align: center;
 /* font-weight: 400;*/
  text-shadow: 2px 2px 2px #0a0e27;
}
</style>
      <div id="rev_slider_2" class="rev_slider fullscreenbanner" style="display: none;" data-version="5.4.5">

        <ul style="background-color: #03a9f5">
      <?php if(!empty($arr_banners)){ foreach($arr_banners as $r9){    ?>
      <li data-index="rs-<?php echo $r9['id']; ?>" data-transition="slideoververtical"> <img src="<?php echo $r9['archivo']; ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="" data-transition="parallaxtoright">
                       <!-- <div class="rs-background-video-layer" data-forcerewind="on" data-volume="on" data-videowidth="100%" data-videoheight="100%" data-videomp4="/assets/site/video/olas.mp4" data-videopreload="preload" data-videostartat="00:01" data-videoloop="loop" data-forcecover="1" data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="true"></div>-->
                       
                       <?php if($r9['tipo']==2){ ?>
                        <div class="tp-caption tp-resizeme max-style alt-font text" id="slide-1-layer-1"

              data-x="['left','left','center','center']" data-y="['60%','middle','middle','middle']" data-hoffset="['40','40','0','0']" data-voffset="['-100','-100','-100','-120']"

              data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"

              data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000"

              data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; color: #fff; font-weight: 900; text-transform: uppercase; font-size: 14px;font-family:DINMedium" ><b><?php echo $r9['texto1']; ?></b><br><b> <?php echo $r9['texto2']; ?> </b><br> <b><?php echo $r9['texto3']; ?></b><br> <div style="color:#03a9f5; font-size: 0.9em;font-weight:100; font-family:DINMedium " ><?php echo $r9['texto4']; ?></div></div>
                        <?php } ?>
               
                    </li>
      
      
      
      <?php }} ?>
        
     <?php /*
          <li data-transition="parallaxtoright" data-index="rs-1">
<div class="opacity-extra-medium bg-black z-index-1"></div>
            <!--<div class=" bg-black z-index-1"></div>-->
            <img src="/assets/site/img/slider/buildings-clear-sky-exterior-374023.jpg" alt="slide7" class="rev-slidebg">
<!--<video id="video" class="rev-slidebg" loop autoplay preload muted>						
				<source src="/assets/site/video/tutornegottia.webm" type='video/webm; codecs="vp8,vorbis"' />
			</video>-->
            <div class="tp-caption tp-resizeme max-style alt-font" id="slide-1-layer-1"

              data-x="['left','left','center','center']" data-y="['middle','middle','middle','middle']" data-hoffset="['40','40','0','0']" data-voffset="['-100','-100','-100','-120']"

              data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"

              data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000"

              data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; color: #fff; font-weight: 900; text-transform: uppercase; font-size: 14px;font-family:DINMedium"><b>Gestionamos el riesgo</b><br><b> en un entorno empresarial </b><br> <b>socialmente responsable</b><br> <div style="color:#323031; font-size: 0.9em;font-weight:100; font-family:DINMedium " >Investment Risk Management.</div></div>
*/ ?>
       <?php /*     <div class="tp-caption tp-resizeme slider-text" id="slide-1-layer-2" data-x="['left','left','center','center']"

              data-y="['middle','middle','middle','middle']" data-hoffset="['35','45','0','0']" data-voffset="['-20','-20','-20','-40']" data-fontsize="['18','20','20','20']"

              data-lineheight="['30','30','28','28']" data-width="none" data-height="none" data-transform_idle="o:1;" data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"

              data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[-100%];y:0;s:inherit;e:inherit;" data-start="2500"

              data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: nowrap; color: #fff; line-height: 22px;">

              <p class="white-space xs-padding-15px-lr">Exhaustive technology of implementing Multipurpose projects is putting your project successful.</p>

            </div> 

            <div class="tp-caption tp-resizeme" id="slide-1-layer-3" data-x="['left','left','center','center']" data-y="['middle','middle','middle','middle']"

              data-hoffset="['40','40','0','0']" data-voffset="['65','65','65','65']" data-fontsize="['14','14','14','14']" data-lineheight="['24','24','24','24']"

              data-width="none" data-height="none" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"

              data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2800" data-splitin="none" data-splitout="none" data-responsive_offset="on"

              style="z-index: 5; white-space: nowrap; line-height: 22px;"><a href="javascript:void(0)" class="butn theme"><span>Buy Template</span></a></div>

          </li> */?>
                    
                
                    
              
                    

        </ul>

      </div>

    </div>
    <style>
        .crop img{
            background: #0ebeff;
            object-fit: contain;
            object-position: 50% 50%;
            box-shadow: 0 0 4px 1px rgba(0,0,0,.4);
            vertical-align: middle;
        }
    </style>
    <section class="seccion_gris">
    <div class="container">
    <div class="row" id="espacio_25"></div>
        	<div class="row">
        		
        		<div class="col-lg-8 col-md-12 sm-margin-10px-bottom">
        	<!--	<h2 class="section__title">Publicaciones</h2>-->
        		<div class="row">
        		<?php 
        	
        		if(!empty($arr_2notas)){ foreach($arr_2notas as $r3){    ?>
        		
        		<div class="col-lg-6 col-md-12 sm-margin-10px-bottom">
                        <div class="blog-grid" id="blog-grid1">
                            
                            <div class="blog-grid-img crop2"><p><img alt="img" src="<?php echo $r3['banner_bg']; ?>"  class="img-resposive"></p>
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
                <?php } } ?>
             
        		<?php if(!empty($arr_3notas)){ foreach($arr_3notas as $r3){    ?>
        		
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
                            <img src="<?php echo $r3['banner_bg']; ?>"  style="height:100%" > 
                        </div>
                       
                    </div>
                            
                            
                            
                        </div>
                        
                </div>
               
                <?php } } ?>
                
                <?php 
        	
        		if(!empty($arr_4notas)){ foreach($arr_4notas as $r3){    ?>
        		
        		<div class="col-lg-6 col-md-12 sm-margin-10px-bottom">
                        <div class="blog-grid" id="blog-grid1">
                            <div class="blog-grid-img crop2"><p><img alt="img" src="<?php echo $r3['banner_bg']; ?>"  class="img-resposive">
                </p></div>
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
                <?php } } ?>
        		</div>
        		</div>
        		<div class="col-lg-4 col-md-12"><h2 class="section__title">Perspectivas</h2>
        		<?php 
        		
        		if(!empty($arr_perspectivas)){ foreach($arr_perspectivas as $r2){         	   
        	    ?>
        		<div class="row">
        			<div class="col-lg-12 sm-margin-20px-bottom blog-style1">
                        <div class="item text-center">
                            <div class="post-img">
                                <img src="<?php echo $r2['banner_bg']; ?>" alt="" >
                            </div>
                            <div class="content">
                                <!--<div class="tag alt-font font-weight-300">
                                    <a href="blog-list-sidebar.html">Designing | <span class="font-size12 display-inline-block">02 May 2018</span></a>
                                </div>-->
                                <h5 class="margin-15px-bottom texto-perpectivas"><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r2['id_txt']; ?>"><?php echo $r2['titulo']; ?></a></h5>
                                <p><?php echo $r2['subtitulo']; ?></p>
                                <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r2['id_txt']; ?>" class="read-more" id="link-perpectivas"  style="color:#000">Leer más <i class="fa fa-angle-right fa-3" aria-hidden="true" style="color:#c6c6c6"></i></a>
                            </div>
                        </div>
                    </div>
        		</div>
        		<p></p>
        		<?php }
		         }
        		 ?>
        		
        		</div>
        	</div>
        		
    </div>
    </section>

<section class="seccion_blanco">
	<div class="container">
        <div class="row" id="espacio_25"></div>
        	<h2 class="section__title col-sm-12 col-md-10">Noticias destacadas</h2>
        <div class="row row_noticias">	
        <?php if(!empty($arr_destacados)){ foreach($arr_destacados as $r5){    ?>
            <div class="section__block col-sm-12 col-md-4 ">

                <div class="card_default card_default--hovered hover--grey card_default--grey ">
                    <div class="card_default__content">

                        <div class="card_default__tags">
                        </div>

                        <h3 class="card_default__title">
                            <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r5['id_txt']; ?>">
                                <?php echo $r5['titulo']; ?>
                            </a>
                        </h3>



                        <div class="card_default__text">
                            <p>
                                <?php echo $r5['subtitulo']; ?>
                            </p>
                        </div>

                        <div class="card_default__links">
                            <div class="card_default__more">
                                <a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $r5['id_txt']; ?>" aria-label="">
                                    <svg xmlns="https:////www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                                      
                                        <g fill="none" fill-rule="evenodd" stroke="#0070AD" stroke-width="2">
                                            <path class="border_svg" d="M1 18c0 9.39 7.61 17 17 17s17-7.61 17-17S27.39 1 18 1 1 8.61 1 18z">
                                            </path>
                                            <path d="M15.018 11.997l3.958 3.958 2.042 2.042-6.021 6.02">
                                            </path>
                                        </g>
                                    </svg>
                                </a>

                            </div>


                        </div>
                    </div>

                    <div class="card_default__media   " style="background-image: url( ); ">
                        <!-- card_default__media -->

                        <a href="#">
                            
                            <div class="card_default__media--inner" style="background-image: url(<?php echo $r5['banner_bg']; ?>?w=540&amp;h=304&amp;crop=1)">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
		<?php }}else{?>
		<div class="section__block col-sm-12 col-md-12 ">		
                <div class="card_default card_default--hovered hover--grey card_default--grey ">
                    <div class="card_default__content">
		<h4>Por el momento no existen noticias destacadas</h4>
		</div>
		</div>
		</div>
		<?php } ?>			
        </div>
    </div>
</section>

    <section>

      <div class="container">
    

        <div class="text-center section-heading margin-eight-top " style="display: none">
<img src="/assets/site/img/default/icon_riesgo.png" class="img-responsive margin-one-bottom">
          <h2 class="azul_titulo" id="texto_negro">GESTIÓN DE RIESGOS</h2>

          <p class="width-65 sm-width-75 xs-width-95" id="texto_parrafo1">Establecemos una evaluación y valoración de seguridad, vulnerabilidad e identificación de fallas y viabilidad.  </p>

        </div>

        <div class="row center-block" style="display: none">
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/seleccion_sitios.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/vinculacion.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/resilencia.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/impacto_social.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/impacto_ambiental.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-four-bottom">
        		<img src="/assets/site/img/default/gestion_riesgos.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-nine-bottom">
        		<img src="/assets/site/img/default/impacto_desarrollo.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-nineottom">
        		<img src="/assets/site/img/default/auditorias_financieras.png" class="img-responsive margin-one-bottom">
        	</div>
        	<div class="col-lg-4 text-center margin-nine-bottom">
        		<img src="/assets/site/img/default/modelos_negocio.png" class="img-responsive margin-one-bottom">
        	</div>
        	<?php /*
        	<div class="col-lg-2 text-center">
        		<img src="/assets/site/img/iconos/gestion.png">
        		<h3 id="azul_texto"><strong>GESTIÓN DE ÉTICA Y RSC</strong></h3>
        		<p id="texto">Generamos un código de ética y política de calidad humana.</p>
        	</div>
        	<div class="col-lg-2 text-center">
        		<img src="/assets/site/img/iconos/sustentabilidad.png">
        		<h3 id="azul_texto">SUSTENTABILIDAD</h3>
        		<p id="texto">Evaluamos el impacto medioambiental y social en viabilidad económica.</p>
        	</div>
        	<div class="col-lg-2 text-center" >
        	    <img src="/assets/site/img/iconos/riesgos.png">
        		<h3 id="azul_texto">GESTIÓN DE RIESGOS</h3>
        		<p id="texto">Establecemos diagnósticos de seguridad y vulnerabilidad e identificación de fallas. </p>
        	</div>
        	<div class="col-lg-2 text-center" >        	
        		<img src="/assets/site/img/iconos/diligencia.png">
        		<h3 id="azul_texto">DEBIDA DELIGENCIA</h3>
        		<p id="texto">Gestionamos permisos y regulaciones con enfoque empresarial..</p>
        	</div>
        	<div class="col-lg-2 text-center">        	    
        	    <img src="/assets/site/img/iconos/capacitaciones.png">
        	    <h3 id="azul_texto">CAPACITACIÓN</h3>
        		<p id="texto">mpartimos capacitación a las organizaciones. Acreditación de STPS, SCT, SEP.</p>
        	</div>
*/ ?>
        </div>


      </div>

    </section>

    <section class="bg-very-light-gray margin-four-bottom" id="fondo_inicio" style="display: none">
     <div class="container">
         <div class="row">
        	<div class="col-lg-5 col-md-12 ">
        	   <img src="/assets/site/img/default/logo_inicio.png" alt="" class="border-radius-5 box-shadow-primary imagen-margin">        		
        	</div>       
            <div class="col-lg-4 col-md-12 fondo-azul" >
               <div class="padding-30px-left">
                   <h4 class="sm-margin-lr-auto xs-width-100" id="texto_blanco"></h4>
	               <ul class="list-style-none1" id="texto_lista_inicio">
		               <li>Líderes en nuestra práctica.</li>
		               <li>Expertos en cumplimiento.</li>
		               <li>Peritos contables y auditores forenses.</li>
		               <li> Expertos en seguridad personal activa y pasiva y transportación.</li>
	               </ul> 
                   <a class="butn theme margin-10px-top" href="javascript:void(0)" id="butn"><span><b>LEER MÁS</b></span></a>
              </div>
          </div>
        </div>
      </div>
      <!--<div class="container">

        <div class="row" >

          <div class="col-lg-5 col-md-12 "><img src="/assets/site/img/logo.png" alt="" class="border-radius-5 box-shadow-primary imagen-margin"></div>

          <div class="col-lg-4 col-md-12 fondo-azul" >

            <div class="padding-30px-left sm-no-padding">

              <h4 class="sm-margin-lr-auto xs-width-100" id="texto_blanco">SOCIAL CORPORATIVA</h4>




              <ul class="list-style-1" id="texto_lista_inicio">

                <li>Líderes en nuestra práctica.</li>

                <li>Expertos en cumplimiento.</li>

                <li>Peritos contables y auditores forenses.</li>

                <li> Expertos en seguridad personal activa y pasiva y transportación.</li>

              </ul> <a class="butn theme margin-10px-top" href="javascript:void(0)" id="butn"><span><b>LEER MÁS</b></span></a></div>

          </div>

        </div>

      </div>-->

    </section>
    
     <section class="team margin-four-bottom margin-four-top" style="display: none">
            <div class="container">
                <div class="section-heading alt-font">
                    <p style="color:#25A9E0; line-height: 25px; font-size: 34px" id="texto_azul">NUESTRO EQUIPO</p>
                    <p class="width-55 sm-width-75 xs-width-95" id="texto_parrafo1">Conoce al equipo de talento que conforma a Tutor Negotia</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12 sm-margin-20px-bottom text-center">
                        <div class="team-style2">
                            <div class="team-member-img"> <img class="img-responsive" src="/assets/site/img/team/teammember-03.jpg" alt="">
                                <div class="team-description">
                                    <div class="team-description-wrapper">
                                        <div class="team-description-content">
                                            <div class="social-links"> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-facebook-f text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-twitter text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-linkedin-in text-white font-size16"></i></a> <a class="d-inline-block border-radius-100" href="#"><i class="fab fa-instagram text-white font-size16"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-cover"></div>
                            </div>
                            <div class="text-center margin-25px-top">
                                <div class="text-extra-dark-gray font-weight-600 font-size14 alt-font margin-5px-bottom" id="texto_negro">ÁLVARO LÓPEZ</div>
                                <div class="font-size12" id="texto_azul_parrafo2"><b>Dirección</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 sm-margin-20px-bottom text-center">
                        <div class="team-style2">
                            <div class="team-member-img"> <img class="img-responsive" src="/assets/site/img/team/teammember-04.jpg" alt="">
                                <div class="team-description">
                                    <div class="team-description-wrapper">
                                        <div class="team-description-content">
                                            <div class="social-links"> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-facebook-f text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-twitter text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-linkedin-in text-white font-size16"></i></a> <a class="d-inline-block border-radius-100" href="#"><i class="fab fa-instagram text-white font-size16"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-cover"></div>
                            </div>
                            <div class="text-center margin-25px-top">
                                <div class="text-extra-dark-gray font-weight-600 font-size14 alt-font margin-5px-bottom" id="texto_negro">ANA RAMÍREZ</div>
                                <div class="font-size12" id="texto_azul_parrafo2"><b>Gerencia</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 xs-margin-20px-bottom text-center">
                        <div class="team-style2">
                            <div class="team-member-img"> <img class="img-responsive" src="/assets/site/img/team/teammember-02.jpg" alt="">
                                <div class="team-description">
                                    <div class="team-description-wrapper">
                                        <div class="team-description-content">
                                            <div class="social-links"> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-facebook-f text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-twitter text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-linkedin-in text-white font-size16"></i></a> <a class="d-inline-block border-radius-100" href="#"><i class="fab fa-instagram text-white font-size16"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-cover"></div>
                            </div>
                            <div class="text-center margin-25px-top">
                                <div class="text-extra-dark-gray font-weight-600 font-size14 alt-font margin-5px-bottom" id="texto_negro">LAURA RAMOS</div>
                                <div class="font-size12" id="texto_azul_parrafo2"><b>Recursos Humanos</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 text-center">
                        <div class="team-style2">
                            <div class="team-member-img"> <img class="img-responsive" src="/assets/site/img/team/teammember-01.jpg" alt="">
                                <div class="team-description">
                                    <div class="team-description-wrapper">
                                        <div class="team-description-content">
                                            <div class="social-links"> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-facebook-f text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-twitter text-white font-size16"></i></a> <a class="d-inline-block margin-15px-right" href="#"><i class="fab fa-linkedin-in text-white font-size16"></i></a> <a class="d-inline-block border-radius-100" href="#"><i class="fab fa-instagram text-white font-size16"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-cover"></div>
                            </div>
                            <div class="text-center margin-25px-top">
                                <div class="text-extra-dark-gray font-weight-600 font-size14 alt-font margin-5px-bottom" id="texto_negro">EDWIN MARTÍNEZ</div>
                                <div class="font-size12" id="texto_azul_parrafo2"><b>Organización</b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php /*  
    <section>

      <div class="container">

        <div class="text-center section-heading">

          <h2 class="azul_titulo">¿Qué podemos hacer por tu empresa?</h2>

          <p class="width-65 sm-width-75 xs-width-95" id="texto_parrafo1">Somos una firma con fuertes valores éticos y reconocimiento profesional, sabemos que para trascender debemos ser firmes con nuestros valores, respetuosos con nuestro entorno y comprometidos con nuestros clientes.</p>

        </div>

        <div class="row center-block">
        <div class="col-lg-2 text-center">
        		
        	</div>
        	
        	<div class="col-lg-2 text-center">
        		<img src="/assets/site/img/otros/rsc.jpg">
        	</div>
        	<div class="col-lg-2 text-center">
        		<img src="/assets/site/img/otros/energia.jpg">
        	</div>
        	<div class="col-lg-2 text-center" >
        	    <img src="/assets/site/img/otros/consultoria.jpg">
        	</div>
        	<div class="col-lg-2 text-center" >        	
        		<img src="/assets/site/img/otros/todos.jpg"> 
        	</div>
        	<div class="col-lg-2 text-center">
        		 
        	</div>
        	
        </div>


      </div>

    </section>
*/ ?>


<section class="bg-very-light-gray" id="fondo_inicio2" style="display: none">

      <div class="container">

        <div class="row" >

          <div class="col-lg-5 col-md-12" style="margin-top: 50px;margin-bottom: 38px; ">
          <h2 style=" color:#fff; line-height: 45px">MÉXICO MEJORA EN

<br>
COMPETITIVIDAD DE<br>
ENERGÍAS RENOVABLES</h2>

          </div>

          <div class="col-lg-4 col-md-12" >

            

          </div>
          <div class="col-lg-3 col-md-12" >

            <a class="butn theme margin-10px-top margin-90px-top" href="javascript:void(0)" id="butn btn1"><span><b>CONOCE MÁS</b></span></a>

          </div>

        </div>

      </div>

    </section>
    
   
 <?php /*   
    <section class="bg-very-light-gray2 margin-40px-top" id="fondo_inicio3">

      <div class="container">

        <div class="row" >

          <div class="col-lg-12 col-md-12 text-center">
          	<p id="texto_blanco_mayusculas " class="margin-60px-top margin-60px-bottom alt-font900" style="color:#25A9E0; line-height:34px; font-size: 34px"><span id="texto_blanco"><b>QUEREMOS SABER<br>
DE TU PROYECTO</b></span></p>
<a class="butn theme margin-10px-top margin-30px-bottom" href="javascript:void(0)" id="butn"  data-toggle="modal" data-target="#myModal"><span><b>PLATICANOS DE TU PROYECTO</b></span></a>
          </div>

         
          </div>

        </div>

      </div>

    </section>
  
*/ ?>

        

 <section class="margin-four-bottom margin-four-top">
            <div class="container">
            <h2 class="section__title col-sm-12 col-md-10">Descubre lo más relevante dentro de TUTORNEGOTIA</h2>
                <div class="carousel-style3">
                    <div class="latest_blog_inner owl-carousel owl-theme">
                        <!--<div class="text_blog ">
                            <h5>Jan 05, 2018</h5> <a href="#"><h3>We’re ready to start our new project with you.</h3></a>
                            <p> Nemo enim enim voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem.</p>
                            <div class="blog_user">
                                <h4>by: <a href="javascript:void(0)">Admin</a> / Business</h4></div>
                        </div>-->
                        <?php if(!empty($arr_descubres)){ foreach($arr_descubres as $r12){    ?>
                        <div class="image_blog">
                            <a href="#"><img alt="" src="<?php echo $r12['img'];?>"></a>
                            <div class="img_blog_text">
                                <h5><?php echo $r12['finicio'];?></h5> <a href="#"><h3><?php echo $r12['titulo'];?></h3></a></div>
                        </div>
                        <?php } } ?>
                       
                      <!--  <div class="text_blog">
                            <h5>March 25, 2018</h5> <a href="#"><h3>Our business team solving problems.</h3></a>
                            <p> Nemo enim enim voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem.</p>
                            <div class="blog_user">
                                <h4>by: <a href="javascript:void(0)">Admin</a> / Consultant</h4></div>
                        </div>-->
                        
                    </div>
                </div>
            </div>
        </section> 
 

<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Platicanos de tus proyectos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Proyecto(s):</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Enviar información</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 
    
    

