<div class="footer-top-bar">
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr border-right border-color-light-white sm-no-border-right sm-border-bottom">
                               <!-- <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px"><i class="fas fa-pencil-alt vertical-align-top fa-lg"></i></span>-->
                                <div class="d-inline-block vertical-align-top padding-10px-left width-105">
                                    <span class="no-margin text-uppercase" id="texto-15-white"><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>contacto"><i class="fas fa-phone fa-lg"></i> Entremos en contacto</a></span>                        </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr border-right border-color-light-white sm-no-border-right sm-border-bottom">
                             <!--   <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px"><i class="fas fa-file-alt vertical-align-top"></i></span>-->
                                <div class="d-inline-block vertical-align-top padding-10px-left width-105">
                                    <span class="no-margin text-uppercase" id="texto-15-white"><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>contacto/cotizacion"><i class="fas fa-file fa-lg"></i> Solicita una cotización</a></span>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr">
                               <!-- <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px"><i class="far fa-life-ring vertical-align-top"></i></span>-->
                                <div class="d-inline-block vertical-align-top padding-10px-left width-105">
                                   <span class="no-margin text-uppercase" id="texto-15-white"><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias"><i class="fas fa-bullhorn fa-lg"></i> Sala de prensa</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<div class="footer-top-bar margin-50px-bottom xs-margin-30px-bottom" style="background-color: #444">
                <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 sm-margin-30px-bottom">
<?php
          $pie = str_replace('<p>','',$ce->pie);
          $pie = str_replace('</p>','',$pie);
          
          ?>
            <p class="margin-25px-top text-light-gray" id="texto-10" style="color:#f1f1f1"><?php echo $pie; ?></p>
<img alt="footer-logo" src="/<?php echo $ce->logo2 ?>" class="img-responsive">
            <div  class="margin-25px-top footer-social-icons">

              <ul>
               <!-- <li><a href="javascript:void(0)" id="searchId"><i class="fas fa-search"></i></a></li>-->
                <li><a href="<?php echo $ce->facebook ?>"><i class="fab fa-facebook-f"></i></a></li>

               <!-- <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>

                <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>

                <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>-->

                <li><a href="<?php echo $ce->linkedin ?>"><i class="fab fa-linkedin-in"></i></a></li>

              </ul>

          </div>

        </div>

        <div class="col-lg-2 col-md-6 sm-margin-40px-top">

        <!--  <h3 class="text-white"></h3>-->
<br>
          <ul class="footer-list" id="texto_blanco2" style="color: #fff">

            <li>Servicios</li>

            <!--<li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>quienes_somos">QUIENES SOMOS</a></li>

            <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>servicios">SERVICIOS</a></li>
-->
           

          </ul>
          <ul class="text-light-gray  menu-pie" id="menu-pie-sin-decorar">
           <?php if(!empty($arr_services_padre)){ foreach($arr_services_padre as $r10){    ?>
          	<li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/servicios/'.$r10['id_txt']; ?>"><?php echo $r10['titulo'];?></a></li>
          	<?php }} ?>
          </ul>

        </div>

        <div class="col-lg-3 col-md-6 xs-margin-20px-bottom">
<br>
          <ul class="footer-list" id="texto_blanco2" style="color: #fff">

            <li>Industria</li>

            <!--<li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/">NOTICIAS</a></li>

            <li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>contacto">CONTACTO</a></li>-->

           

          </ul>
<ul class="text-light-gray menu-pie" id="menu-pie-sin-decorar">
          	<?php if(!empty($arr_contents_indutria)){ foreach($arr_contents_indutria as $r11){    ?>
          	<li><a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/industria/'.$r11['id_txt']; ?>"><?php echo $r11['titulo'];?></a></li></li>
          	<?php }} ?>
          </ul>
         

          

          

        </div>

        <div class="col-lg-3 col-md-6" id="texto-10">
<br>
          <!--<h3 class="text-white"></h3>-->
          <?php
          $dir = str_replace('<p>','',$ce->direccion);
          $dir = str_replace('</p>','',$dir);
          
          ?>
          <p class="text-light-gray margin-20px-bottom"  style="color:#f1f1f1"><?php echo $dir ?></p>

          <form>

            <div class="form-group footer-subscribe" id="texto_azul_parrafo"><span id="texto-12-b">
<?php echo $ce->email ?></span></div>

          </form>

        </div>

      </div>

  </div>
  <div class="footer-bar" style="background-color: #25a9e0; color: #fff">

    <div class="container">
    <div class="row" style="background-color: #25a9e0; color: #fff">
    	<div class="col-lg-3">&copy; Todos los derechos reservados</div>
    	<div class="col-lg-5"></div>
    	<div class="col-lg-4"><?php echo $ce->empresa ?> · <?php echo $ce->lema ?></div>
    </div>

     

    </div>

  </div>
</div>


  </div>

   <a href="javascript:void(0)" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  <script src="/assets/site/js/jquery.min.js"></script>

  <script src="/assets/site/js/modernizr.js"></script>

  <script src="/assets/site/js/bootstrap.min.js"></script>

  <script src="/assets/site/js/nav-menu.js"></script>

  <script src="/assets/site/js/easy.responsive.tabs.js"></script>

  <script src="/assets/site/js/owl.carousel.js"></script>

  <script src="/assets/site/js/jquery.counterup.min.js"></script>

  <script src="/assets/site/js/jquery.stellar.min.js"></script>

  <script src="/assets/site/js/waypoints.min.js"></script>

  <script src="/assets/site/js/tabs.min.js"></script>

  <script src="/assets/site/js/jquery.magnific-popup.min.js"></script>

  <script src="/assets/site/js/isotope.pkgd.min.js"></script>

  <script src="/assets/site/js/switcher.js"></script>

  <script src="/assets/site/js/rev_slider/jquery.themepunch.tools.min.js"></script>

  <script src="/assets/site/js/rev_slider/jquery.themepunch.revolution.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.actions.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.carousel.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.kenburn.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.layeranimation.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.migration.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.navigation.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.parallax.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.slideanims.min.js"></script>

  <script src="/assets/site/js/rev_slider/extensions/revolution.extension.video.min.js"></script>

  <script src="/assets/site/js/map.js"></script>

  <script src="/assets/site/js/main.js"></script>
  <script src="/assets/admin/js/toastr/toastr.min.js"></script>
<script>
$("#form_cotizacion").submit(function(e) {
	//$("#").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               $('#form_cotizacion')[0].reset();
               toastr.info('Gracias por confiar en nosotros, en breve uno de nuestros colaboradores se pondrá en contacto con usted', 'Notificación');; // show response from the php script.
           }
         });
});


$("#form_contacto").submit(function(e) {
	//$("#").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               $('#form_contacto')[0].reset();
               toastr.info('Gracias por confiar en nosotros, en breve uno de nuestros colaboradores se pondrá en contacto con usted', 'Notificación');; // show response from the php script.
           }
         });
});


</script>

</body>



</html>