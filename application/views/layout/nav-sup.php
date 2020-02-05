<!-- Page Container START -->
<div class="page-container">
<!-- Header START -->
<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a class="side-nav-toggle" href="javascript:void(0);">
                    <i class="ti-view-grid"></i>
                </a>
            </li>
           <!--<li class="search-box">
                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                    <i class="search-icon ti-search pdd-right-10"></i>
                    <i class="search-icon-close ti-close pdd-right-10"></i>
                </a>
            </li>
            <li class="search-input">
                <input class="form-control" type="text" placeholder="Buscar...">
                <div class="advanced-search">
                    <div class="search-wrapper">
                        <div class="pdd-vertical-10">
                            <span class="display-block mrg-vertical-5 pdd-horizon-20 text-gray">
									<i class="ti-user pdd-right-5"></i>
									<span>People</span>
                            </span>
                            <ul class="list-unstyled list-info">
                                <li>
                                    <a href="#">
                                        <img class="thumb-img" src="assets/images/avatars/thumb-1.jpg" alt="">
                                        <div class="info">
                                            <span class="title">Jordan Hurst</span>
                                            <span class="sub-title">
													<i class="ti-location-pin"></i>
													<span>44 Shirley Ave. West Chicago</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="thumb-img" src="assets/images/avatars/thumb-5.jpg" alt="">
                                        <div class="info">
                                            <span class="title">Jennifer Watkins</span>
                                            <span class="sub-title">
													<i class="ti-location-pin"></i>
													<span>514 S. Magnolia St. Orlando</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="thumb-img" src="assets/images/avatars/thumb-4.jpg" alt="">
                                        <div class="info">
                                            <span class="title">Michael Birch</span>
                                            <span class="sub-title">
													<i class="ti-location-pin"></i>
													<span>70 Bowman St. South Windsor</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mrg-horizon-20 border top"></div>
                        <div class="pdd-vertical-10">
                            <span class="display-block mrg-vertical-5 pdd-horizon-20 text-gray">
									<i class="ti-rss pdd-right-5"></i>
									<span>Post</span>
                            </span>
                            <ul class="list-unstyled list-info">
                                <li>
                                    <a href="#">
                                        <img class="thumb-img" src="assets/images/img-1.jpg" alt="">
                                        <div class="info">
                                            <span class="title">Artoo expresses his relief</span>
                                            <span class="sub-title">
													<span>Oh, thank goodness we're coming out...</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="thumb-img" src="assets/images/img-2.jpg" alt="">
                                        <div class="info">
                                            <span class="title">Ready for some power?</span>
                                            <span class="sub-title">
													<span>Lord Vader. You may take Caption So...</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="search-footer">
                        <span>Busqueda para '<b class="text-dark"><span class="serach-text-bind"></span></b>'</span>
                    </div>
                </div>
            </li>-->
        </ul>
        <ul class="nav-right">
            <li class="user-profile dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="<?php echo base_url(); ?>assets/admin/images/avatars/user-m.jpg" alt="">
                    <div class="user-info">
                        <span class="name pdd-right-5"><?php echo $nombre_usuario; ?></span>
                        <i class="ti-angle-down font-size-10"></i>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#cambiar-password-r" class="btn-ch-pws2" data-id='' >
                            <i class="ti-settings pdd-right-10"></i>
                            <span>Cambio de contraseña</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"  data-toggle="modal" data-target="#mi-expediente" >
                            <i class="ti-user pdd-right-10"></i>
                            <span>Mi expediente</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mensajes/">
                            <i class="ti-email pdd-right-10"></i>
                            <span>Centro de mensajes</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="<?php echo base_url(); ?>tutor/logout">
                            <i class="ti-power-off pdd-right-10"></i>
                            <span>Salir del sistema</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php /*    <li class="notifications dropdown">
                <span class="counter">2</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-bell"></i>
                </a>

                <ul class="dropdown-menu ">
                    <li class="notice-header">
                        <i class="ti-bell pdd-right-10"></i>
                        <span>Notifications</span>
                    </li>
                    <li>
                        <ul class="list-info overflow-y-auto relative scrollable">
                            <li>
                                <a href="#">
                                    <img class="thumb-img" src="assets/images/avatars/thumb-5.jpg" alt="">
                                    <div class="info">
                                        <span class="title">
											<span class="font-size-14 text-semibold">Jennifer Watkins</span>
                                        <span class="text-gray">commented on your <span class="text-dark">post</span></span>
                                        </span>
                                        <span class="sub-title">5 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="thumb-img" src="assets/images/avatars/thumb-4.jpg" alt="">
                                    <div class="info">
                                        <span class="title">
											<span class="font-size-14 text-semibold">Samuel Field</span>
                                        <span class="text-gray">likes your <span class="text-dark">photo</span></span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="thumb-img bg-primary">
											<span class="text-white">M</span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
											<span class="font-size-14 text-semibold">Michael Birch</span>
                                        <span class="text-gray">likes your <span class="text-dark">photo</span></span>
                                        </span>
                                        <span class="sub-title">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="thumb-img bg-success">
										<span class="text-white"><i class="fa fa-paper-plane-o"></i></span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
											<span class="font-size-14 text-semibold">Message sent</span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="thumb-img bg-info">
										<span class="text-white"><i class="ti-user"></i></span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
											<span class="font-size-14 text-semibold">Admin</span>
                                        <span class="text-gray">Welcome on board</span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="notice-footer">
                        <span>
                            <a href="#" class="text-gray">Check all notifications <i class="ei-right-chevron pdd-left-5 font-size-10"></i></a>
						</span>
                    </li>
                </ul>
            </li>
            <li>
                <a class="side-panel-toggle" href="javascript:void(0);">
                    <i class="ti-align-right"></i>
                </a>
            </li> */ ?>
            <li>
                <a href="<?php echo base_url(); ?>tutor/logout" title="Salir de sistema">
                    <i class="ti-power-off pdd-right-10"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->