
<?php
session_start();
?>
<?php 
require_once "controller/newsController.php";
$ctrl = new newsController;
$data = $ctrl->tag();
$tt = $data['tag'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/template/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/slick.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/animate.min.css" <link rel="stylesheet" type="text/css"
		href="public/template/css/responsive.css">
	<script src="public/template/js/jquery-3.3.1.slim.min.js"></script>
	<script src="public/template/js/popper.min.js"></script>
	<script src="public/template/js/bootstrap.min.js"></script>
	<script src="public/template/js/style.js"></script>
	<script async defer data-pin-hover="true" data-pin-tall="true" src="//assets.pinterest.com/js/pinit.js"></script>


</head>
<?php require_once "view/header.php"; ?>
	<main>

		<div class="container">
			<div class="row" style="padding-top: 50px;">
				<div class="col-md-8">
					<!-- Thể loại tin 1 -->
					<div class="theloai1">
						<div class="row">
							<div class="col-md-12">
								<nav class="navbar navbar-default">
									<a class="navbar-brand giaitri" href="#">Tags : #<?=$tt[0]->ten_tags?></a>

								</nav>
							</div>

						</div>

						<div class="row" style="padding-bottom:50px">

							<div class="col-md-12" style="padding-right: 25px;">
								<?php foreach($tt as $tag): ?>
								<div class="row"
									style="display: flex; margin-bottom: 30px;justify-content: space-between;">
									<div class="col-md-3">
										<div class="bochinhanhne">
											<a href="#" class="postright">
												<img src="upload/<?=$tag->ava_img?>" alt="<?=$tag->alt_img?>">
											</a>
										</div>

									</div>
									<div class="col-md-9">
										<div class="titlepostright">
											<h5 style="padding-bottom: 10px;"><a href="#" class="postright1"><?=$tag->tieude?></a></h5>
											<span class="tagtintuc">
												<a href="#"><?=$tag->tentl?></a>
												<span>-</span>
												<span><?=$tag->ngaydang?></span>
											</span>
											<p><?=$tag->mota?></p>
										</div>
									</div>
								</div>
							<?php endforeach ?>

							</div>
						</div>
					</div>
					<!-- Hết thể loại tin 1 -->

				</div>
				<div class="col-md-4">


					<!-- hình quảng cáo -->
					<div class="hinhquangcao">
						<a href="#">
							<img src="img/banner-02.jpg" alt="" style="width: 100%;height: 850px;">
						</a>
					</div>
					<!-- Hết hình quảng cáo -->


				</div>
			</div>



		</div>

	</main>
<?php require_once "view/footer.php"; ?>