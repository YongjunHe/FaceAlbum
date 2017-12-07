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
                        <div class="top-login"><i class="fa fa-user"></i><a href="<?php echo site_url('/Account/login'); ?>">
                                <?php if(empty($this->session->userdata('username'))){echo 'Login';} else { echo $this->session->userdata('username');} ?> </a></div>
                        <span>|</span>
                        <div class="top-shop"><i class="fa fa-envelope"></i>Notification
                            <aside class="widget-top-sellers #cart-menu">
                                <p>There Are <span>2 items</span> In Your Bag</p>
                                <!-- item recent post-->
                                <div class="item-top-sellers clearfix"><img src="static/pic/shop/70x80/1.jpg" alt>
                                    <h3 class="title"><a href="single.html">Integer ante arcu serius</a> <a href="#" class="#close"><i class="fa fa-close"></i></a></h3>
                                    <div class="price">$40.<span class="mini-price">99</span> <span class="old-price">$30.<span class="mini-price">99</span></span></div>
                                    <div class="star-rating full"></div>
                                    <div class="cws_divider mt-10 mb-10"> </div>
                                </div>
                                <!-- ! item recent post-->
                                <!-- item recent post-->
                                <div class="item-top-sellers clearfix"><img src="static/pic/shop/70x80/2.jpg" alt>
                                    <h3 class="title"><a href="single.html">Aenean tellus metus</a> <a href="#" class="#close"><i class="fa fa-close"></i></a></h3>
                                    <div class="price">$15.<span class="mini-price">99</span></div>
                                    <div class="star-rating full"></div>
                                    <div class="cws_divider mt-10 mb-10"></div>
                                </div>
                                <!-- ! item recent post-->
                                <div class="total clearfix">
                                    <div class="sub-total">Subtotal: <span>$57</span></div><a href="#" class="clear">Clear All Data <i class="fa fa-recycle"></i></a>
                                </div>
                                <div class="cart-buttons"><a href="cart.html" class="cws-button alt mini">View Cart</a><a href="checkout.html" class="cws-button mini">Checkout</a></div>
                            </aside>
                        </div><span>|</span>
                        <div class="top-search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</div>
                    </div>
                </div>
                <div class="search_menu_cont">
                    <form role="search" method="get" class="form">
                        <div class="search-wrap">
                            <input type="text" placeholder="Search . . ." class="form-control search-field">
                        </div>
                    </form>
                    <div class="search_back_button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
                    <li><a href="single.html">Albums</a></li>
                    <li><a href="grid.html">Moments</a></li>
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