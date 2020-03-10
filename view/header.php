<?php 
require_once "model/newsModel.php";
$model = new newsModel;
$type = $model->selectT();
?>
<body>	
	<header id="header">
		<div class="hd-top">
			<div class="container-fluid">
				<div class="container">
					<div class="all-top">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="left-top">
								<span class="days-time">	
								Hà Nội,
								<?php

		                            date_default_timezone_set('Asia/Ho_Chi_Minh');
		                            $date = getdate();
		                            
		                            echo "  Ngày ".$date['mday']." Tháng ".$date['mon']." Năm ".$date['year'];
		                        ?>
                       			 </span>
								
								<a class="left-li" href="trang-chu">Giới thiệu</a>
								<a class="left-li" href="trang-chu">Liên hệ</a>
								<?php if(isset($_SESSION['tokenid'])): ?>
								<a class="left-li"  href="ca-nhan"><?=$_SESSION['nameu']?></a>
								<?php else: ?>
								<a class="left-li" id="dangnhap" href="dang-nhap">Đăng nhập</a>
								<a class="left-li" id="dangky" href="dang-ky">Đăng ký tài khoản</a>
								<?php endif ?>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="right-top">
								<a class="icon-right" href="trang-chu"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a class="icon-right" href="trang-chu"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a class="icon-right" href="trang-chu"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
								<a class="icon-right" href="trang-chu"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
								<a class="icon-right" href="trang-chu"><i class="fa fa-youtube" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="logo-banner">
			<div class="container">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<div class="logo">
						<a href="trang-chu">
							<img src="public/template/img/logo.png">
						</a>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="banner">
						<a href="trang-chu">
							<img src="public/template/img/banner-01.png">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="menu">
				<div class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span
						class="icon-bar"></span>
				</div>
				<nav class="nav-wrap" id="main-nav">
					<div class="nav-overlay"></div>
					<ul class="nav-ul">
						<li><a href="trang-chu">Trang chủ</a>
						</li>
						<?php foreach($type as $t): ?>
						<li><a href="<?=$t->tentl_ko?>"><?=$t->tentl?></a>
						</li>
						<?php endforeach ?>

						<li class="dropdown "><a href="trang-chu">Video</a>
							<div class="sub-menu-wrap">
								<ul class="sub-menu">
									<li><a href="trang-chu">Video giải trí</a></li>
									<li><a href="trang-chu">Video tin tức</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>