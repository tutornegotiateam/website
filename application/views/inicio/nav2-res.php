<?php
$ci = &get_instance();
$ci->load->model('Menu_model', 'menu');

?>
<style>
	#none{
		
background-color:  transparent;
	}
	
</style>
<header>
            <div id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="top-bar-info">
                                <ul>
                                    <li><i class="fas fa-mobile-alt"></i>(+123) 456 7890</li>
                                    <li><i class="fas fa-envelope"></i>contacto@tutornegotia.com<?php echo  $idioma_sele[0]->IdiomaId; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 xs-display-none">
                            <ul class="top-social-icon">
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                               <!-- <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>-->
                                <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                <!--<li><a href="javascript:void(0)" title="ENGLISH"><i class="fab fa-global"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inverse">
                <!--<div class="top-search bg-theme">
                    <div class="container">
                        <div class="input-group"> <span class="input-group-addon"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Tecle su busqueda..."> <span class="input-group-addon close-search"><i class="fas fa-times"></i></span></div>
                    </div>
                </div>-->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">
                                    <div class="navbar-header navbar-header-custom">
                                        <a href=/" class="navbar-brand logodefault"><img id="logo" src="/assets/site/img/logo_tutornegotia_bn.png" alt="logo"></a>
                                    </div>
                                    <div class="navbar-toggler"></div>
                                    <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                        <li><a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/inicio/"><?php $x =  $ci->menu->traerMenuSuperior('1',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a></li>
                                        <li><a href="javascript:void(0)"><?php $x =  $ci->menu->traerMenuSuperior('2',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a>
                                            <ul>
                                                <li><a href="javascript:void(0)">Nuestros valores</a></li> 
                                                <li><a href="javascript:void(0)">Nuestro Equipo</a></li> 
                                                <li><a href="javascript:void(0)">Nuestro Propósito</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)"><?php $x =  $ci->menu->traerMenuSuperior('3',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a>
                                            <ul class="row megamenu">
                                                <li class="col-lg-4 col-sm-12"> 
                                               <a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/servicios/auditoria_ansurance/"><span id="titulo_menu1">Auditoría y Assurance</span></a>
                                               <a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/servicios/auditoria_ansurance/ifrs-en-mexico/" class="gris_1">IFRS en México</a>
                                               <a href="javascript:void(0)" class="gris_1">Servicios de Asesoría en Contabilidad Financiera</a>
                                               <a href="javascript:void(0)" class="gris_1">Precios de Transferencia y Efectividad del Modelo Operativo</a>
                                               <a href="javascript:void(0)" class="gris_1">Auditoría de Estados Financieros</a>
                                               <a href="javascript:void(0)" class="gris_1">Investigación de Fraudes y Asistencia en Litigios</a>     
                                               <p></p>
                                               <a href="javascript:void(0)"><span id="titulo_menu1">Asesoría de Negocios</span></a>
                                               <a href="javascript:void(0)" class="gris_1">Servicios de Asesoría en Desinversiones</a>
                                               <a href="javascript:void(0)" class="gris_1">Servicios Operativos en Transacciones</a>
                                               <a href="javascript:void(0)" class="gris_1">Asesoría en Deuda y Reestructuración</a>
                                               <a href="javascript:void(0)" class="gris_1">Transaction Diligence</a>
                                               <a href="javascript:void(0)" class="gris_1">Impuestos sobre Transacciones</a>  
                                               <a href="javascript:void(0)" class="gris_1">Servicios de Valuación y Modelos Financieros</a>    
                                               <p></p>
                                               <a href="javascript:void(0)"><span id="titulo_menu1">Estrategia</span></a>
                                               <a href="javascript:void(0)" class="gris_1">Cadena de Suministro y Operaciones</a>
                                               <a href="javascript:void(0)" class="gris_1">Tecnología</a>
                                               <a href="javascript:void(0)" class="gris_1">Financiamiento</a>
                                               <a href="javascript:void(0)" class="gris_1">Investigación Forense</a>
                                               <a href="javascript:void(0)" class="gris_1">Fusiones y Adquisiciones</a>  
                                               <a href="javascript:void(0)" class="gris_1">Valuación</a>    
                                               <a href="javascript:void(0)" class="gris_1">Analisis de Desempeño y Estrategia de prediccion de flujos</a>  
                                                </li>
                                                <li class="col-lg-4 col-sm-12">
                                                    <ul id="none"> 
                                                        <li>
                                                        	<a href="javascript:void(0)"><span id="titulo_menu1">Factibilidad de Selección de Sitios</span></a>
                                               <a href="javascript:void(0)" class="gris_1">Identificación y gestión de impactos ambientales.</a>
                                               <a href="javascript:void(0)" class="gris_1">Manifiesto de impacto ambiental modalidad Regional/Particular.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios de resiliencia climática</a>
                                               <a href="javascript:void(0)" class="gris_1">Monitoreos de Flora y fauna.</a>
                                               <a href="javascript:void(0)" class="gris_1">Planes de rescate y conservación de la flora y la fauna.</a>   
                                               <a href="javascript:void(0)" class="gris_1">Cambios de uso de suelo.</a>
                                               <p></p>
                                               
                                               <a href="javascript:void(0)"><span id="titulo_menu1">Infraestructura y Proyectos de Capital</span></a>
                                               <a href="javascript:void(0)" class="gris_1">Diseño y desarrollo de ingeniería.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios de factibilidad económica.</a>
                                               <a href="javascript:void(0)" class="gris_1">Proyectos técnicos ejecutivos.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios geotécnicos.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios hidrológicos.</a>   
                                               <a href="javascript:void(0)" class="gris_1">Estudios geofísicos y de mecánica de suelos.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios oceanográficos y de batrimetría.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios de resiliencia climática.</a>
                                               <a href="javascript:void(0)" class="gris_1">Fusiones y Adquisiciones</a>
                                               <a href="javascript:void(0)" class="gris_1">Monitoreo de Flora y Fauna.</a>
                                               <a href="javascript:void(0)" class="gris_1">Estudios técnicos justificativos para el cambio de uso de suelo.</a>  
                                               <a href="javascript:void(0)" class="gris_1">Mapeo GIS de caracterización de condiciones físicas y naturales del sitio.</a>  
 
 

 
 

 
 
 

 

                                                        </li>                                                        
                                                    </ul>
                                                </li>
                                                <li class="col-lg-4 col-sm-12">
                                                    <ul id="none"> 
                                                        <li>
                                                        	<a href="javascript:void(0)"><span id="titulo_menu1">Servicios especializados</span></a>
                                               <a href="javascript:void(0)" class="gris_1">Capital Humano</a>
                                               <a href="javascript:void(0)" class="gris_1">Estrategia y Operaciones</a>
                                               <a href="javascript:void(0)" class="gris_1">Tecnología Riesgo Cibernético</a>
                                               <a href="javascript:void(0)" class="gris_1">Riesgo Regulatorio</a>
                                               <a href="javascript:void(0)" class="gris_1">Riesgo Financiero</a>   
                                               <a href="javascript:void(0)" class="gris_1">Riesgo Operativo</a>
                                               <a href="javascript:void(0)" class="gris_1">Riesgo Estratégico y de Reputación</a>
                                               <a href="javascript:void(0)" class="gris_1">Asesoría Financiera</a>
                                               <a href="javascript:void(0)" class="gris_1">Fusiones y Adquisiciones</a>
                                               <a href="javascript:void(0)" class="gris_1">Valuaciones y Restructuras de Empresas</a>
                                               <a href="javascript:void(0)" class="gris_1">Administración de Riesgos de Servicios Financieros</a>  
                                                        </li>                                                        
                                                    </ul>
                                                </li>
                                                <!--<li class="col-lg-3 col-sm-12">
                                                <img src="/assets/site/img/industria/ciudades-sustentables.jpg" width="222">
                                                <a href="javascript:void(0)">Éstas son las ciudades más sustentables de México</a>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                <img src="/assets/site/img/industria/normas_sustentables.jpg" width="222">
                                                <a href="javascript:void(0)">Normas Voluntarias en materia de Sostentabilidad</a>
                                                </li>-->
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)"><?php $x =  $ci->menu->traerMenuSuperior('4',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a>
                                            <ul class="row megamenu">
                                                <li class="col-lg-3 col-sm-12"> 
                                                <!--<span class="margin-10px-bottom display-block sm-no-margin sm-padding-10px-tb sm-padding-30px-lr font-size13 text-uppercase sub-title">Full Width</span>-->
                                                    <ul id="none">
                                                        <li ><a href="javascript:void(0)">MINERÍA</a></li>
                                                        <li><a href="javascript:void(0)">ENERGÉTICOS</a></li>
                                                        <li><a href="javascript:void(0)">PETRÓLEO Y DERIVADOS</a></li>
                                                        <li><a href="javascript:void(0)">AGROINDUSTRIA</a></li>
                                                        <li><a href="javascript:void(0)">AUTOMOTRIZ</a></li>
                                                        
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                    <ul  id="none">
                                                        <li><a href="javascript:void(0)">OTROS</a></li>
                                                        <!--<li><a href="javascript:void(0)">AUDITORÍAS</a></li> -->                                                       
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                <img src="/assets/site/img/industria/industria-automotriz.jpg" width="222">
                                                <a href="javascript:void(0)">Industria Automotriz es la segunda mas importante de México</a>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                <img src="/assets/site/img/industria/industria-agronegocios.jpg" width="222">
                                                <a href="javascript:void(0)">Los agronegocios más rentables</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/noticias/"><?php $x =  $ci->menu->traerMenuSuperior('5',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a></li>
                                         <li><a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/contacto/"><?php $x =  $ci->menu->traerMenuSuperior('6',$idioma_sele[0]->IdiomaId); echo $x->MenuSupTitulo?></a></li>
                                        
                                        <li>
                                        <a href="javascript:void(0)"><img src="<?php echo base_url().$idioma_sele[0]->IdiomaBandera; ?>" width="22" title="<?php echo $idioma_sele[0]->IdiomaSigla; ?> - <?php echo $idioma_sele[0]->IdiomaTitulo; ?>"></a >
                                            <ul>
                                            <?php 
                                            foreach($arr_idiomas as $row_idioma){  ?>
                                                <li><a href="<?php echo base_url();?><?php echo strtolower($idioma_sele[0]->IdiomaSigla); ?>/idioma/geo/<?php echo strtolower($row_idioma->IdiomaId); ?>" title="<?php echo $row_idioma->IdiomaSigla; ?> - <?php echo $row_idioma->IdiomaTitulo; ?>"><img src="<?php echo base_url().$row_idioma->IdiomaBandera; ?>" width="22"> <?php echo $row_idioma->IdiomaTitulo; ?></a></li>
                                            <?php } ?> 
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                   <!-- <div class="attr-nav sm-no-margin sm-margin-70px-right xs-margin-65px-right">
                                        <ul>
                                            <li class="search"><a href="javascript:void(0)"><i class="fas fa-search"></i></a></li>
                                        </ul>
                                    </div>-->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>