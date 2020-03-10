
<?php
session_start();
?>
<?php 
require_once "controller/newsController.php";
$ctrl = new newsController;
$data = $ctrl->type();
$tl = $data['type'];

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

		<div class="entertaiment">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?=$tl[0]->tentl?></h1>			
					</div>
				</div>
			</div>
		</div>

		<div class="bangtin">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="row">
							<?php foreach($tl as $ty): ?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="item-tintuc">
									<a href="<?=$ty->tentl_ko?>/<?=$ty->tieude_ko?>-<?=$ty->idtt?>.html">
										<img src="upload/<?=$ty->ava_img?>">
									</a>
									<div class="txt-tintuc">
										<a href="<?=$ty->tentl_ko?>/<?=$ty->tieude_ko?>-<?=$ty->idtt?>.html"><h3><?=$ty->tieude?></h3></a>
										<p>bởi <?=$ty->ten?> - <?=$ty->ngaydang?></p>
									</div>
								</div>
							</div>
							<?php endforeach ?>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="col-md-12 dangkynhantin" style="margin-bottom:25px">
									<h5>Subscribe</h5>
									<p>Get all latest content delivered to your email a few times a month.</p>
									<form class="dangkynhantin" style="position: relative">
										<input class="dangkynhantin" type="text" name="email" placeholder="Email">
										<button class="dangkynhantin"><i class="fa fa-arrow-right"
												aria-hidden="true"></i></button>
									</form>
								</div>


							<div class="row">
								<div class="col-md-12">
									<a href="#">
									<img src="img/banner-02.jpg" alt="" style="width: 300px;height: 850px;">
									</a>
								</div>
							</div>


				</div>
			</div>
		</div>
	</main>
<?php require_once "view/footer.php"; ?>