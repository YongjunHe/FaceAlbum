<!DOCTYPE html>
<html>
<head>
    <title>FaceAlbum</title>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ink/3.1.10/css/font-awesome.css">
    <link rel="stylesheet" href="static/css/reset.css">
    <link rel="stylesheet" href="static/css/owl.carousel.css">
    <link rel="stylesheet" href="static/css/jquery.fancybox.css">
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/indent.css">
    <link rel="stylesheet" href="static/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="static/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="static/rs-plugin/css/navigation.css">
</head>
<body>
<!-- header page-->
<header>
    <!-- site top panel-->
    <div class="site-top-panel">
        <div class="container p-relative">
            <div class="row">
                <div class="col-sm-6">
                    <!-- lang select wrapper-->
                    <div class="top-left-wrap">
                        <div class="lang-wrap">
                            <div>
                                <ul>
                                    <li><a href="#" class="lang-sel icl-en">En<i class="fa fa-language"></i></a>
                                        <ul>
                                            <li class="icl-fr"><a href="#">Fr</a></li>
                                            <li class="icl-de"><a href="#">De</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div><span>|</span>
                        <div class="social-wrap">
                            <a href="" title="Google +" class="cws_social_link"><i class="share-icon fa fa-google-plus"></i></a>
                            <a href="" title="Twitter" class="cws_social_link"><i class="share-icon fa fa-twitter"></i></a>
                            <a href="" title="Facebook" class="cws_social_link"><i class="share-icon fa fa-facebook"></i></a>
                            <a href="" title="Dribbble" class="cws_social_link"><i class="share-icon fa fa-dribbble"></i></a>
                        </div>
                    </div>
                    <!-- ! lang select wrapper-->
                </div>
                <div class="col-sm-6 text-right">
                    <div class="top-right-wrap">
                        <div><i class="fa fa-user"></i><a href="<?php echo site_url('/Account/login'); ?>">
                                <?php if(empty($this->session->userdata('username'))){echo 'Login';} else { echo $this->session->userdata('username');} ?> </a></div>
                        <span>|</span>
                        <div class="top-shop"><i class="fa fa-envelope"></i>Notification
                            <aside class="widget-top-sellers shop-cart-menu">
                                <div class="cart-buttons"><a href="<?php echo site_url('/Account/settings'); ?>" class="cws-button alt mini">View Settings</a><a href="<?php echo site_url('/Account/logout'); ?>" class="cws-button mini">Logout</a></div>
                            </aside>
                        </div><span>|</span>
                        <div class="top-search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</div>
                    </div>
                </div>
                <div class="search_menu_cont">
                    <form role="search" method="post" class="form" action="<?php echo site_url('/Moment/search'); ?>">
                        <div class="search-wrap">
                            <input type="text" name="tag" placeholder="Search . . ." class="form-control search-field">
                        </div>
                        <input type="submit" id="submit_search" style="display: none;">
                    </form>
                    <div class="search_back_button"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ! site top panel-->
    <!-- Navigation panel-->
    <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
            <!-- Logo ( * your text or image into link tag *)-->
            <div class="nav-logo-wrap local-scroll"><a href="index.html" class="logo"><img src="static/img/logo.jpg" alt><img src="static/img/logo.jpg" alt class="sticky-logo"></a></div>
            <!-- Main Menu-->
            <div class="inner-nav desktop-nav">
                <ul class="clearlist">
                    <li><a href="<?php echo site_url('/Account/overview'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('/Album/overview'); ?>">Albums</a></li>
                    <li><a href="<?php echo site_url('/Moment/overview'); ?>">Moments</a></li>
                    <li><a href="<?php echo site_url('/Event/overview'); ?>">Events</a></li>
                    <li><a href="<?php echo site_url('/Account/login'); ?>">Accounts</a></li>
                </ul>
            </div>
            <!-- End Main Menu-->
        </div>
    </nav>
    <!-- End Navigation panel-->
</header>
<!-- ! header page-->