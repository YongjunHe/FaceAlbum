<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="Worthy">
<meta name="author" content="hobby">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Worthy——个人中心</title>
<base href="<?php echo base_url(); ?>" />

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico">

<!-- Web Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300'
	rel='stylesheet' type='text/css'>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Plugins -->
<link href="css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="css/style.css" rel="stylesheet">

<!-- Custom css -->
<link href="css/custom.css" rel="stylesheet">

<!-- mystyle css -->
<link href="css/mystyle.css" rel="stylesheet">

</head>

<body class="no-trans">
	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop">
		<i class="icon-up-open-big"></i>
	</div>

	<!-- header start -->
	<!-- ================ -->
	<header class="header fixed clearfix navbar navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div class="logo smooth-scroll">
							<a href="index.html"><img id="logo" src="images/logo.png"
								alt="Worthy"></a>
						</div>

						<!-- name-and-slogan -->

						<div class="site-name-and-slogan smooth-scroll">
							<div class="site-name">
								<a href="#banner">Worthy</a>
							</div>
							<div class="site-slogan">
								Free Fitness Trainer by <a target="_blank"
									href="http://www.baidu.com">Worthy</a>
							</div>
						</div>
					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-8">

					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- ================ -->
						<div class="main-navigation animated">

							<!-- navbar start -->
							<!-- ================ -->
							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">

									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle"
											data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span> <span
												class="icon-bar"></span> <span class="icon-bar"></span> <span
												class="icon-bar"></span>
										</button>
									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse scrollspy smooth-scroll"
										id="navbar-collapse-1">
										<ul class="nav navbar-nav navbar-right ux">
											<li class="active"><a
												href="<?php echo site_url('/Account/overview'); ?>">我</a></li>
											<li><a href="<?php echo site_url('/Health/overview'); ?>">训练</a></li>
											<li><a href="<?php echo site_url('/Activity/overview'); ?>">发现</a></li>
											<li><a href="<?php echo site_url('/Friend/overview'); ?>">关注</a></li>
											<li class="dropdown"><a href="#" class="dropdown-toggle"
												data-toggle="dropdown"><?php echo $this->session->userdata ( 'username' )?><span
													class="caret"></span> </a>
												<ul class="dropdown-menu dropdown-menu-left" role="menu">
													<li><a href="<?php echo site_url('/Account/settings'); ?>">个人设置</a></li>
													<li><a href="<?php echo site_url('/Account/overview'); ?>">我的账号</a></li>
													<li><a href="<?php echo site_url('/Friend/overview')?>">我的好友</a></li>
													<li class="divider"></li>
													<li><a href="<?php echo site_url('/Account/logout')?>">退出登录</a></li>
												</ul></li>
										</ul>
									</div>

								</div>
							</nav>
							<!-- navbar end -->

						</div>
						<!-- main-navigation end -->

					</div>
					<!-- header-right end -->

				</div>
			</div>
		</div>
	</header>
	<!-- header end -->

	<!-- banner start -->
	<!-- ================ -->

	<div id="banner" class="banner-image">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="space"></div>
					<div class="space"></div>
					<div class="space"></div>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img src="images/portfolio-3.jpg" alt="userphoto">
								<div class="caption">
									<h3 class="text-center"><?php echo $this->session->userdata ( 'username' )?></h3>
									<a href="<?php echo site_url('/Friend/overview')?>"
										class="btn btn-primary" role="button">好友<span class="badge">3</span></a>
									<a href="<?php echo site_url('/Friend/my_circle')?>"
										class="btn btn-primary" role="button">圈子<span class="badge">2</span></a>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-7"">
							<img src="images/fitness-1.jpg" alt="">
						</div>
					</div>
					<div class="space"></div>
					<div class="row">
						<div class="col-md-3 list-group">
							<div style="padding-left: 15px">
								<a href="<?php echo site_url('/Activity/overview')?>"
									class="list-group-item list-group-item-success"> <span
									class="badge">4</span> 活动推荐
								</a> <a href="<?php echo site_url('/Friend/friend_updates')?>"
									class="list-group-item list-group-item-info"> <span
									class="badge">2</span> 好友动态
								</a> </a> <a
									href="<?php echo site_url('/Friend/circle_topics')?>"
									class="list-group-item list-group-item-warning"> <span
									class="badge">2</span> 圈子话题
								</a>
							</div>
						</div>
						<div class="col-md-3">
							<div class="media">
								<div class="media-left">
									<img src="images/testimonial-1.png" alt="...">
								</div>
								<a href="#" class="media-body">
									<h1 class="media-heading" style="color: white">
										<a style="color: white"
											href="<?php echo site_url('/Health/overview')?>">训练历史</a>
									</h1>
								</a>
							</div>
						</div>
						<div class="col-md-3">
							<div class="media">
								<div class="media-left">
									<img src="images/testimonial-2.png" alt="...">
								</div>
								<a href="#" class="media-body">
									<h1 class="media-heading">
										<a style="color: white"
											href="<?php echo site_url('/Health/health')?>">身体数据</a>
									</h1>
								</a>
							</div>
						</div>
						<div class="col-md-3">
							<div class="media">
								<div class="media-left">
									<img src="images/testimonial-3.png" alt="...">
								</div>
								<a href="#" class="media-body">
									<h1 class="media-heading" style="color: white">
										<a style="color: white"
											href="<?php echo site_url('/Health/plan')?>">训练等级</a>
									</h1>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- banner end -->

	<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
	<!-- Jquery and Bootstap core js files -->
	<script type="text/javascript" src="plugins/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Backstretch javascript -->
	<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

	<!-- Initialization of Plugins -->
	<script type="text/javascript" src="js/homepage.js"></script>
</body>
</html>