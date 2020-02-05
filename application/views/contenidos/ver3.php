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

<section>
            <div class="container">
                <div class="row">

                    <!-- start left side section -->
                    <div class="col-lg-4 col-md-12 padding-50px-right md-padding-30px-right sm-padding-15px-right order-2 order-lg-1">

                        <!-- start services -->
                        <div class="services-single-left-box">
                            <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">All Services</h6>
                            <div class="services-single-menu bg-light-gray margin-30px-bottom sm-margin-25px-bottom">
                                <ul class="no-margin">
                                    <li class="active"><a href="javascript:void(0)">Financial Planning</a></li>
                                    <li><a href="personal-insurance.html">Personal Insurance</a></li>
                                    <li><a href="business-analysis.html">Business Analysis</a></li>
                                    <li><a href="market-research.html">Market Research</a></li>
                                    <li><a href="online-consulting.html">Online Consulting</a></li>
                                    <li><a href="investment-planning.html">Investment Planning</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end services -->

                        <!-- start testimonial -->
                        <div class="bg-light-gray padding-25px-all md-padding-20px-all border-radius-5 margin-30px-bottom sm-margin-25px-bottom">
                            <div class="testimonial-style6 owl-carousel owl-theme owl-loaded owl-drag">
                                
                                
                                
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-795px, 0px, 0px); transition: all 0.5s ease 0s; width: 1855px;"><div class="owl-item cloned" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-2.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Stepha Kruse</h4>
                                        <h6>Design Lead</h6>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-3.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Dunican keithly</h4>
                                        <h6>Networking Lead</h6>
                                    </div>
                                </div></div><div class="owl-item" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-1.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Alivin Corondo</h4>
                                        <h6>Networking Lead</h6>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-2.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Stepha Kruse</h4>
                                        <h6>Design Lead</h6>
                                    </div>
                                </div></div><div class="owl-item" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-3.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Dunican keithly</h4>
                                        <h6>Networking Lead</h6>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-1.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Alivin Corondo</h4>
                                        <h6>Networking Lead</h6>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 265px;"><div class="testmonial-single center-col width-85 md-width-80">
                                    <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute irure.</p>
                                    <img src="img/testmonials/t-2.jpg" class="rounded-circle" alt="">
                                    <div class="d-block vertical-align-middle text-center">
                                        <h4>Stepha Kruse</h4>
                                        <h6>Design Lead</h6>
                                    </div>
                                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
                        </div>
                        <!-- start testimonial -->

                        <!-- start help -->
                        <div class="bg-img cover-background theme-overlay border-radius-5 margin-30px-bottom sm-margin-25px-bottom" data-overlay-dark="8" data-background="img/bg/bg2.jpg" style="background-image: url(&quot;img/bg/bg2.jpg&quot;);">
                            <div class="position-relative z-index-9 text-center padding-50px-tb md-padding-40px-tb sm-padding-30px-tb padding-30px-lr">
                                <i class="fas fa-headset font-size50 md-font-size46 sm-font-size42 text-white margin-15px-bottom"></i>
                                <h5 class="text-white font-weight-600 margin-5px-bottom">How can we help?</h5>
                                <p class="text-white font-weight-500">Let’s get in touch!!</p>
                                <div class="bg-white separator-line-horrizontal-full opacity3 margin-20px-bottom sm-margin-15px-bottom"></div>
                                <ul class="text-center no-padding no-margin">
                                    <li class="text-white margin-5px-bottom"><i class="fa fa-phone font-size16 text-white margin-15px-right"></i><a href="tel:123456789" class="text-white">(+44) 123 456 789</a></li>
                                    <li class="text-white"><i class="fa fa-envelope-open font-size16 text-white margin-15px-right"></i><a href="mailto:mail@example.com" class="text-white">mail@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end help -->

                        <!-- start download -->
                        <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">Downloads</h6>
                        <ul class="downloads no-margin-bottom">
                            <li class="margin-10px-bottom"><a href="img/content/profile.pdf"><i class="far fa-file-pdf font-size24"></i><span class="label font-weight-600">Company Profile</span></a></li>
                            <li><a href="img/content/profile.pdf"><i class="far fa-file-pdf font-size24"></i><span class="label font-weight-600">Our Case Study</span></a></li>
                        </ul>
                        <!-- end download -->

                    </div>
                    <!-- end left side section -->

                    <!-- start right side section -->
                    <div class="col-lg-8 col-md-12 order-1 order-lg-2 sm-margin-30px-bottom">
                        <div class="services-single-right">
                            <h5 class="font-weight-600">Financial Planning</h5>
                            <div class="margin-40px-bottom sm-margin-30px-bottom"><img src="img/content/services/service-single.jpg" class="border-radius-5 box-shadow-primary" alt=""></div>
                            <p class="margin-30px-bottom sm-margin-20px-bottom width-95">Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="inner-title">
                                        <h6>Business Strategies</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 margin-35px-bottom sm-margin-25px-bottom">
                                    <div class="feature-flex-square">
                                        <div class="clearfix">
                                            <div class="feature-flex-square-icon">
                                                <i class="icon-layers"></i>
                                            </div>
                                            <div class="feature-flex-square-content">
                                                <h4><a href="javascript:void(0)">Investment Bank</a></h4>
                                                <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                                <a href="javascript:void(0)" class="feature-flex-square-content-button">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 margin-35px-bottom sm-margin-25px-bottom">
                                    <div class="feature-flex-square">
                                        <div class="clearfix">
                                            <div class="feature-flex-square-icon">
                                                <i class="icon-genius"></i>
                                            </div>
                                            <div class="feature-flex-square-content">
                                                <h4><a href="javascript:void(0)">Finance Analysis</a></h4>
                                                <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                                <a href="javascript:void(0)" class="feature-flex-square-content-button">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="inner-title">
                                        <h6>Key Benefits</h6>
                                    </div>
                                    <div id="accordion" class="accordion-style">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      How can i purchase this item ?
                                                    </button>
                                                        </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Tempora incidunt ut labore et dolore exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      why unique and creative design ?
                                                    </button>
                                                  </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Neque porro quisquam est quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      are you ready to buy this theme ?
                                                    </button>
                                                  </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end right side section -->

                </div>
            </div>
        </section>


</div>
