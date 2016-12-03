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
	<!-- section start -->
	<!-- ================ -->
	<div class="section translucent-bg bg-image-1 blue">
		<div class="container object-non-visible"
			data-animation-effect="fadeIn">
			<h1 id="login" class="text-center title">Log in</h1>
			<div class="space"></div>
			<div class="row" style="font-size: 20px">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<form action="" method="post" role="form">
						<div class="form-group">
							<label for="username">用户名</label> 
							<input name="username" id="username" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">密码</label> 
							<input name="password" id="userpwd" type="password" class="form-control">
						</div>
						<div align="center">
							<input type="submit" class="btn btn-success" value="登录">
						</div>
					</form>
					<div align="center">
						<a href=" ">登录遇到问题？</a>
					</div>
					<div align="center">
						<span>还没有注册账号？</span> 
						<a href="<?php echo site_url('/Account/register'); ?>" target=_blank>立即注册</a>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</div>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<div class="default-bg space blue">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1 class="text-center">Let's Train Together!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- section end -->

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
	<script type="text/javascript" src="js/template.js"></script>

	<!-- Custom Scripts -->
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>