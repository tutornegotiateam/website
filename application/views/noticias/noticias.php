<section class="page-title-section bg-img cover-background"  data-overlay-dark="0" data-background="http://www.tutornegotia.ml/public/uploads/utils/news.jpg" >

    <div class="container">
        <div id="topic-description" class="topic-description" style="background-color:#000;opacity: 0.8;">
						<h1 class="primary-headline" style='color:#FFFFFF'> 
						Sala de prensa
						</h1>
						<h3>Nos gusta mantenerte informado sobre lo que acontense en tu entorno</h3>	
						<p class="body-copy"><?php //echo $arrServiciosCategoria->ServicioContenido;?></p>
							
							         
					</div>
    </div>
    
</section>




  <section>
<div class="container">
	<div class="row" id="espacio_45"></div>
	<?php
	foreach ($arr_news as $new): ?>
	<div class="blog-list-simple">
		<div class="row">
			<div class="col-md-5 col-sm-12 sm-margin-20px-bottom">
				<div class="blog-list-simple-img">
					<img alt="img" src="<?php echo $new->banner_bg; ?>" class="img-fluid img-responsive">
				</div>
			</div>
			<div class="col-md-7 col-sm-12">
				<div class="blog-list-simple-text">
					<span>
						<?php echo $new->seccion; ?>
					</span>
					<h4>
						<?php echo $new->titulo; ?>
					</h4>
					<ul class="meta">
						<!--<li>
							<a href="javascript:void(0);">
								<i aria-hidden="true" class="fa fa-user">
								</i> Admin
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i aria-hidden="true" class="fa fa-folder-open">
								</i> Business
							</a>
						</li>-->
						<li>
							<a href="javascript:void(0);">
								<i aria-hidden="true" class="fas fa-calendar-alt">
								</i> <?php echo $new->fecha_crea; ?>
							</a>
						</li>
						<!--<li>
							<a href="javascript:void(0);">
								<i aria-hidden="true" class="fa fa-tags">
								</i> blog
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i aria-hidden="true" class="fa fa-comments">
								</i> 0 Comments
							</a>
						</li>-->
					</ul>
					<p>
						<?php echo $new->sintesis; ?>
					</p>
					<div class="text-left margin-10px-top">
						<a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'; ?>noticias/news/<?php echo $new->id_txt; ?>" class="butn small">
							<span>
								Leer mas
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endforeach; ?>
	<p>
		<?php echo $links; ?>
	</p>

	<div class="row" id="espacio_45"></div> 
            </div>
        </section>