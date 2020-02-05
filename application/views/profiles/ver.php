<section class="seccion_gris">
    <div class="row">
    <div class="container" >
    <div class="row" style="background-color:#fff">
        <div class="col-lg-9 col-md-12" >
            <div class="row" id="espacio_25"></div>
            <h1><?php echo $arr_peoples->PersonaNom." ".$arr_peoples->PersonaApePat." ".$arr_peoples->PersonaApeMat; ?></h1>
            <h4><?php echo $arr_peoples->PersonaParticipaEmpresa; ?></h4>
            <ul class="social-icon-style1">
                <li> <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                <li> <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                <li> <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                <li> <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                <li> <a href="javascript:void(0)"><i class="fas fa-envelope"></i></a></li>
            </ul> 
            <div class="row" id="espacio_25"></div>
            <div style="text-align: justify"><?php echo $arr_peoples->PersonaResumen; ?></div>           
        </div>
        <div class="col-lg-3 col-md-12">        
            <div class="row" id="espacio_25"></div>   
            <div class="margin-30px-tb services-single-download" style="text-align: center">
                <? if($arr_peoples->PersonaFoto==''){?>
                <img alt="foto" src="/assets/site/img/personas/m-sin-foto.jpg" class="img-thumbnail" width="100%">
                <?php } else{?>
                <img alt="foto" src="<?php echo base_url().$arr_peoples->PersonaFoto?>"  class="img-thumbnail" width="100%">                 
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row" id="espacio_25"></div>     
            <div id="linea-division"></div>
        </div>
        
        <div class="col-lg-12 col-md-12">
        <div class="row" id="espacio_25"></div>   
        <h4>Conócenos</h4>
        <div class="row">
        <?php if(!empty($arr_directivos)){ foreach($arr_directivos as $row){ ?>
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
                </p>
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

        <?php }} ?>
        </div>
        </div>
    </div>

    </div>
    </div>
</section>