<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nhà Đất - 404 Not Found</title>
    <base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
</head>
<body>
<section class="bg-gray">
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Page Not Found</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Trang Chủ</a> / <span>Page 404</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none space-bottom-none">
			<div class="abs-fullwidth bg-gray">
				<div class="space100">&nbsp;</div>
				<div class="space80">&nbsp;</div>
				<div class="container text-center">
					<h2>Oops! Không Tìm Thấy Trang Yêu Cầu!</h2>
					<div class="space40">&nbsp;</div>
					<img src="source/assets/dest/images/404.png" width="500px" alt="">
					<div class="space30">&nbsp;</div>
					<p>Có vẻ như không có gì ở địa chỉ này. Thử tìm kiếm 1 thứ khác?</p>
					<form role="search" method="get" id="searchform" action="{{route('tim-kiem-nha-dat')}}">
				        <input type="text" value="" name="tu-khoa" id="s" placeholder="Tìm kiếm trong trang web ở đây..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>
				<div class="space100">&nbsp;</div>
				<div class="space30">&nbsp;</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</section>
</body>