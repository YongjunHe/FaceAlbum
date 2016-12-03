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
	<header class="header fixed clearfix navbar navbar-fixed-top"
		style="background-color: #666666">
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
											<li><a href="<?php echo site_url('/Account/overview'); ?>">我</a></li>
											<li><a href="<?php echo site_url('/Health/overview'); ?>">训练</a></li>
											<li class="active"><a
												href="<?php echo site_url('/Activity/overview'); ?>">发现</a></li>
											<li><a href="<?php echo site_url('/Friend/overview'); ?>">关注</a></li>
											<li class="dropdown"><a href="#" class="dropdown-toggle"
												data-toggle="dropdown"><?php echo $this->session->userdata ( 'username' )?> <span class="caret"></span>
											</a>
												<ul class="dropdown-menu dropdown-menu-left" role="menu">
													<li><a href="#">个人设置</a></li>
													<li><a href="#">我的账号</a></li>
													<li><a href="#">我的好友</a></li>
													<li class="divider"></li>
													<li>
													
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

	<div class="container-fluid" id="banner"
		style="background-color: #EFEFDA">
		<div class="row">
			<div class="space"></div>
			<div class="space"></div>
			<div class="col-sm-3 col-md-2 sidebar" style="font-size: 20px;">
				<div class="fixed-siderbar">
					<div class="space"></div>
					<ul class="nav nav-sidebar">
						<li id="btn1" style="background-color: #336699;"><a id="word1"
							style="color: white;">Overview</a></li>
						<li id="btn2"><a id="word2"
							href="<?php echo site_url('/Activity/myActivity')?>">我的竞赛</a></li>
						<li id="btn3"><a id="word3">单人竞赛</a></li>
						<li id="btn4"><a id="word4">多人竞赛</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9 col-md-10 main"
				style="background-color: #FBFBEA">
				<h1 class="page-header">Overview</h1>

				<div class="row placeholders">
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="images/fitness-2.jpg" class="img-responsive"
							alt="Generic placeholder thumbnail">
						<h4>我的竞赛</h4>
					</div>
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="images/health-1.jpg" class="img-responsive"
							alt="Generic placeholder thumbnail">
						<h4>单人竞赛</h4>
					</div>
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="images/fitness-3.jpg" class="img-responsive"
							alt="Generic placeholder thumbnail">
						<h4>多人竞赛</h4>
					</div>
				</div>

				<h2 class="sub-header">Section title</h2>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>activityid</th>
								<th>content</th>
								<th>joiner</th>
								<th>memberlimit</th>
								<th>starttime</th>
								<th>endtime</th>
							</tr>
						</thead>
						<tbody id="tbody01">
							<?php foreach ($activities as $activities_item): ?>
							<tr>
								<td><?php echo $activities_item['activityid']; ?></td>
								<td><?php echo $activities_item['content']; ?></td>
								<td><?php echo $activities_item['joiner']; ?></td>
								<td><?php echo $activities_item['memberlimit']; ?></td>
								<td><?php echo $activities_item['starttime']; ?></td>
								<td><?php echo $activities_item['endtime']; ?></td>
								<td><button type="button" class="btn btn-primary btn-xs"><?php echo $status; ?></button></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<p id='site_url' hidden="hidden"><?php echo site_url()?></p>
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

	<!-- Modernizr javascript -->
	<script type="text/javascript" src="plugins/modernizr.js"></script>

	<!-- Isotope javascript -->
	<script type="text/javascript"
		src="plugins/isotope/isotope.pkgd.min.js"></script>

	<!-- Backstretch javascript -->
	<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

	<!-- Appear javascript -->
	<script type="text/javascript" src="plugins/jquery.appear.js"></script>

	<!-- Initialization of Plugins -->
	<script type="text/javascript" src="js/discovery.js"></script>
</body>
</html>
