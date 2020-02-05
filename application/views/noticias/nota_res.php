<div class="row" id="espacio_45"></div> 
<section class="blogs">
	<div class="container">
		<div class="row">
<?php //print_r($new); ?>
			<!--  start blog left-->
			<div class="col-lg-9 col-md-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
				<div class="posts">
					<!--  start post-->
					<div class="post">
						<div class="post-img">
							<a href="javascript:void(0);" class="width-100">
								<img src="<?php echo $new[0]['banner_bg']; ?>" alt="">
							</a>
						</div>
						<div class="content">
							<div class="post-meta">
								<div class="post-title">
									<h5>
										<?php echo $new[0]['titulo']; ?>
									</h5>
								</div>
								<ul class="meta">
									<!--<li>
										<a href="javascript:void(0);">
											<i class="fa fa-user" aria-hidden="true">
											</i> Admin
										</a>
									</li>-->
									<li>
										<a href="javascript:void(0);">
											<i class="fa fa-folder-open" aria-hidden="true">
											</i> <?php echo ucfirst($new[0]['seccion']); ?>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i class="fas fa-calendar-alt" aria-hidden="true">
											</i> <?php echo $new[0]['fecha_crea']; ?>
										</a>
									</li>
									<!--<li>
										<a href="javascript:void(0);">
											<i class="fa fa-tags" aria-hidden="true">
											</i> Blog
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i class="fa fa-comments" aria-hidden="true">
											</i> 0 Comments
										</a>
									</li>-->
								</ul>
							</div>
							<div class="post-cont">
							<?php echo $new[0]['contenido']; ?>
							<?php /*
								<p>
									consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident minim veniam.
								</p>
								<p class="special">
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p>
								<p>
									consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident minim veniam.
								</p>
*/?>
							</div>
							<div class="share-post">
								<span>
									Compartir nota
								</span>
								<ul class="social-icon-style1">
									<li>
										<a href="javascript:void(0)">
											<i class="fab fa-facebook-f">
											</i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<i class="fab fa-twitter">
											</i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<i class="fab fa-google-plus-g">
											</i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<i class="fab fa-linkedin-in">
											</i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<i class="fas fa-envelope">
											</i>
										</a>
									</li>
								</ul>
							</div>
							<a href="<?php echo base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/';?>noticias/" class="butn small">
								<span>
									Regresar a noticias
								</span>
							</a>
						</div>
					</div>
					<!--  start post-->

					<!--  start comment-->
					<?php /*
					<div class="comments-area">
						<div class="title-g mb-50">
							<h3>
								Comments
							</h3>
						</div>
						<div class="comment-box">
							<div class="author-thumb">
								<img src="img/blog/01.png" alt="" class="rounded-circle width-85 xs-width-100">
							</div>
							<div class="comment-info">
								<h6>
									<a href="javascript:void(0);">
										Alex Joyrina
									</a>
								</h6>
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<div class="reply">
									<a href="javascript:void(0);">
										<i class="fa fa-reply" aria-hidden="true">
										</i> Reply
									</a>
								</div>
							</div>
						</div>
						<div class="comment-box">
							<div class="author-thumb">
								<img src="img/blog/02.png" alt="" class="rounded-circle width-85 xs-width-100">
							</div>
							<div class="comment-info">
								<h6>
									<a href="javascript:void(0);">
										Jama Karleny
									</a>
								</h6>
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<div class="reply">
									<a href="javascript:void(0);">
										<i class="fa fa-reply" aria-hidden="true">
										</i> Reply
									</a>
								</div>
							</div>
						</div>
						<div class="comment-box">
							<div class="author-thumb">
								<img src="img/blog/03.png" alt="" class="rounded-circle width-85 xs-width-100">
							</div>
							<div class="comment-info">
								<h6>
									<a href="javascript:void(0);">
										Ivonne Drennen
									</a>
								</h6>
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<div class="reply">
									<a href="javascript:void(0);">
										<i class="fa fa-reply" aria-hidden="true">
										</i> Reply
									</a>
								</div>
							</div>
						</div>
					</div>
					
					<!-- end comment-->

					<!--  start form-->
					<div class="comment-form">
						<div class="title-g mb-50">
							<h3>
								Post a Comment
							</h3>
						</div>
						<form class="form" id="comment-form" method="post">
							<input type="hidden" name="form-name" value="contact-form">
							<div class="controls">
								<div class="row">
									<div class="col-md-6">
										<input id="form_name" type="text" name="name" placeholder="Name" required="required">
									</div>
									<div class="col-md-6">
										<input id="form_email" type="email" name="email" placeholder="Email" required="required">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<textarea id="form_message" name="message" placeholder="Message" rows="4" required="required">
										</textarea>
									</div>
									<div class="col-md-12">
										<button type="submit" class="butn medium">
											<span>
												Send Message
											</span>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--  end form-->
					*/ ?>
				</div>
			</div>
			<!--  end blog left-->

			<!--  start blog right-->
			<div class="col-lg-3 col-md-12">
				<div class="side-bar">
				<?php /*
					<div class="widget search">
						<form method="post">
							<input type="hidden" name="form-name" value="form 1">
							<input type="search" name="search" placeholder="Type here ...">
							<button type="submit">
								<i class="fa fa-search" aria-hidden="true">
								</i>
							</button>
						</form>
					</div> */ ?>

					<div class="widget">
						<div class="widget-title">
							<h6>
								Noticias recientes
							</h6>
						</div>
						<ul>
							<li>
								<a href="javascript:void(0);">
									You don't want Traveling as your enemy!
								</a>
							</li>
						</ul>
					</div>

					
					

					<div class="widget">
						<div class="widget-title">
							<h6>
								Categorias
							</h6>
						</div>
						<ul>
							<li>
								<a href="javascript:void(0);">
									Articulos
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									Noticias
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									Prespectivas
								</a>
							</li>
						</ul>
					</div>

					<div class="widget">
						<div class="widget-title">
							<h6>
								Siguenos en
							</h6>
						</div>
						<ul class="social-icon-style1">
							<li>
								<a href="javascript:void(0)">
									<i class="fab fa-facebook-f">
									</i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="fab fa-twitter">
									</i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="fab fa-google-plus-g">
									</i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="fab fa-linkedin-in">
									</i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="fas fa-envelope">
									</i>
								</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
			<!--  end blog right-->

		</div>
	</div>
</section>
<div class="row" id="espacio_45"></div> 