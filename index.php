<?php 
session_start();
require_once "controller/newsController.php";
require_once "model/newsModel.php";
$ctrl = new newsController;
$model = new newsModel();
$data = $ctrl->index();
$db = $data['st'];
$new = $data['new'];
$home = $data['home'];
$view = $data['view'];
$tags = $data['tags'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tin tức</title>
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/template/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/slick.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/animate.min.css"> 
	<link rel="stylesheet" type="text/css" href="public/template/css/responsive.css">
	<script src="public/template/js/jquery-3.3.1.slim.min.js"></script>
	<script src="public/template/js/popper.min.js"></script>
	<script src="public/template/js/bootstrap.min.js"></script>
	<script src="public/template/js/style.js"></script>
	<script async defer data-pin-hover="true" data-pin-tall="true" src="//assets.pinterest.com/js/pinit.js"></script>								


</head>
<?php require_once "view/header.php"; ?>
		<main>
		<div class="slide-trendding">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="left-trendding">
							<div class="spann">
								<span>Tin đặc biệt:</span>
							</div>
							<div class="slick-left autoplay">
								<?php foreach($db as $s): ?>
								<div class="test">
									<a href="<?=$s->tentl_ko?>/<?=$s->tieude_ko?>-<?=$s->idtt?>.html">
										<p><?=$s->tieude?></p>
									</a>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="trendding-right">
							<form method="POST" action="tim-kiem" class="notfound-search">
                            <input type="text" id="txt" name="txt" placeholder="Tìm kiếm">
                            <button type="submit" id="sm" name="sm"><i class="fa fa-search"></i></button>
                        </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="banner-main">
			<div class="container">
				<div class="row">
					<?php for($i=0; $i<count($db); $i++): ?>
					<?php if($i==0): ?>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="bn-left" style="background-image: url(upload/<?=$db[$i]->ava_img?>);">

							<a class="txt-1-bn" href="<?=$db[$i]->tentl_ko?>"><?=$db[$i]->tentl?></a>
							<h3 class="txt-2-bn">
								<a href="<?=$db[$i]->tentl_ko?>/<?=$db[$i]->tieude_ko?>-<?=$db[$i]->idtt?>.html">
									<?=$db[$i]->tieude?>
								</a>
							</h3>
							<p class="txt-3-bn-bot"><a href="">bởi: <?=$db[$i]->ten?> - <i class="fa fa-eye" aria-hidden="true"></i> <?=$db[$i]->luotxem?></a></p>
						</div>
					</div>
					<?php elseif($i==1): ?>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="bn-right" style="background-image: url(upload/<?=$db[$i]->ava_img?>);">
							<a href="#"></a>
							<a class="txt-1-bn-r" href="<?=$db[$i]->tentl_ko?>"><?=$db[$i]->tentl?></a>
							<h3 class="txt-2-bn-r">
								<a href="<?=$db[$i]->tentl_ko?>/<?=$db[$i]->tieude_ko?>-<?=$db[$i]->idtt?>.html">
									<?=$db[$i]->tieude?>
								</a>
							</h3>
							<p class="txt-3-bn-bot"><a href="">bởi: <?=$db[$i]->ten?> - <i class="fa fa-eye" aria-hidden="true"></i> <?=$db[$i]->luotxem?></a></p>
						</div>
					</div>
					<?php else: ?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
						<div class="bn-bot-left" style="background-image: url(upload/<?=$db[$i]->ava_img?>);">
							<a href="#"></a>
							<a class="txt-1-bn-bot" href="<?=$db[$i]->tentl_ko?>"><?=$db[$i]->tentl?></a>
							<h3 class="txt-2-bn-bot">
								<a href="<?=$db[$i]->tentl_ko?>/<?=$db[$i]->tieude_ko?>-<?=$db[$i]->idtt?>.html">
									<?=$db[$i]->tieude?>
								</a>
							</h3>
							<p class="txt-3-bn-bot"><a href="">bởi: <?=$db[$i]->ten?> - <i class="fa fa-eye" aria-hidden="true"></i> <?=$db[$i]->luotxem?></a></p>
						</div>
					</div>
					<?php endif ?>
					<?php endfor ?>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="row" style="padding-top: 50px;padding-bottom:50px;">
				<div class="col-md-8">
					<!-- Thể loại tin 1 -->
					<?php foreach($home as $h): ?>
						
					<div class="theloai1">
						<div class="row">
							<div class="col-md-12">
								<nav class="navbar navbar-default">
									<a class="navbar-brand giaitri" href="<?=$h->tentl_ko?>"><?=$h->tentl?></a>
									<a href="<?=$h->tentl_ko?>">
										<p class="navbar-text right">Tất cả <i class="fa fa-caret-right"
												style="font-size: 12px;"></i></p>
									</a>
								</nav>
							</div>

						</div>
							<?php 
							$d = $model->getNewsType($h->id);
						?>
						<div class="row" style="padding-bottom:50px;">
							<?php for($i=0; $i<count($d); $i++): ?>
								<?php if($i==0): ?>
							<div class="col-md-6" style="padding-right: 25px">
								<a href="<?=$d[$i]->tentl_ko?>/<?=$d[$i]->tieude_ko?>-<?=$d[$i]->idtt?>.html" class="postleft">
									<img src="upload/<?=$d[$i]->ava_img?>" alt="upload/<?=$d[$i]->alt_img?>">
								</a>
								<div class="titlepostleft" style="padding-top: 15px">
									<h5 style="padding-bottom: 5px;"><a href="<?=$d[$i]->tentl_ko?>/<?=$d[$i]->tieude_ko?>-<?=$d[$i]->idtt?>.html" class="postleft1"><?=$d[$i]->tieude?></a></h5>
									<span class="tagtintuc">
										<a href="#">bởi <?=$d[$i]->ten?></a>
										<span>-</span>
										<span><?=$d[$i]->ngaydang?></span>
									</span>
								</div>
							</div>
								<?php else: ?>



							<div class="col-md-6" style="padding-right: 25px;">

								<div class="row"
									style="display: flex; margin-bottom: 30px;justify-content: space-between;">
									<a href="<?=$d[$i]->tentl_ko?>/<?=$d[$i]->tieude_ko?>-<?=$d[$i]->idtt?>.html" class="postright">
										<img src="upload/<?=$d[$i]->ava_img?>" alt="upload/<?=$d[$i]->alt_img?>">
									</a>
									<div class="titlepostright">
										<h5 style="padding-bottom: 10px;"><a href="<?=$d[$i]->tentl_ko?>/<?=$d[$i]->tieude_ko?>-<?=$d[$i]->idtt?>.html" class="postright1"><?=$d[$i]->tieude?></a></h5>
										<span class="tagtintuc">
											<a href="#">bởi <?=$d[$i]->ten?></a>
											<span>-</span>
											<span><?=$d[$i]->ngaydang?></span>
										</span>
									</div>
								</div>

							</div>
								<?php endif ?>
							<?php endfor ?>
						</div>
					</div>
					<?php endforeach ?>
					<!-- Hết thể loại tin 1 -->

				</div>
				<div class="col-md-4">

					<!-- Tin phổ biến -->
					<div class="tinphobien">
						<div class="row">
							<div class="col-md-12">
								<nav class="navbar navbar-default">
									<a class="navbar-brand phobien" href="#">Tin xem nhiều</a>
								</nav>
							</div>
						</div>

						<div class="row phobien">
							<div class="col-md-12">
								<ul>
									<?php for($i=0;$i<count($view);$i++): ?>
									<li style="justify-content: space-between; display: flex;padding-bottom: 30px;">
										<div class="số">
											<?=$i+1?>
										</div>
										<a href="<?=$view[$i]->tentl_ko?>/<?=$view[$i]->tieude_ko?>-<?=$view[$i]->idtt?>.html" class="noidung">
											<?=$view[$i]->tieude?>
										</a>
									</li>
									<?php endfor ?>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- Hết tin phổ biến -->

					<!-- hình quảng cáo -->
					<div class="hinhquangcao">
						<a href="#">
							<img src="public/template/img/banner-02.jpg" alt="" style="width: 100%;height: 850px;">
						</a>
					</div>
					<!-- Hết hình quảng cáo -->
				</div>
			</div>


			<div class="row" style="padding-top: 50px;display:flex; text-align: center">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<img src="public/template/img/banner-01.png" style="width: 100%" alt="">
				</div>
				<div class="col-md-2"></div>
			</div>


			<div class="row" style="padding-top: 50px;padding-bottom:50px;">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-default">
								<a class="navbar-brand tinmoinhat" href="#">Tin mới nhất</a>
							</nav>
						</div>

					</div>
					<div class="row" style="padding-top: 20px;">
						<?php foreach($new as $n): ?>
						<div class="col-md-6" style="padding-right: 25px;margin-bottom: 45px;">
							<a href="<?=$n->tentl_ko?>/<?=$n->tieude_ko?>-<?=$n->idtt?>.html" class="postleft">
								<img src="upload/<?=$n->ava_img?>" alt="<?=$n->alt_img?>">
							</a>
							<div class="titlepostleft" style="padding-top: 15px">
								<h5 style="padding-bottom: 5px;"><a href="<?=$n->tentl_ko?>/<?=$n->tieude_ko?>-<?=$n->idtt?>.html" class="postleft1"><?=$n->tieude?></a></h5>
								<span class="tagtintuc">
									<a href="#"><?=$n->tentl?></a>
									<span>-</span>
									<span><?=$n->ngaydang?></span>
								</span>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-default">
								<a class="navbar-brand phobien" href="#">Video đáng chú ý</a>
							</nav>
						</div>
					</div>
					<div class="row phobien" style="padding-top: 20px;padding-bottom: 50px">
						<div class="col-md-12">
							<div class="playyoutube" style="position: relative">
								<a href="#" class="postleft">
									<img src="public/template/img/video-01.jpg" alt="">
								</a>
								<button class="nutplayyoutube"><i class="fa fa-youtube-play"
										aria-hidden="true"></i></button>
							</div>

							<div class="titlepostleft" style="margin-top: -4px;background-color: #333;padding: 16px 25px 16px 25px;">
								<h5 style="padding-bottom: 5px; color: #fff;"><a href="#" class="postleft1">American
										live music lorem ipsum dolor sit amet consectetur</a></h5>
								<span class="tagtintuc">
									<a href="#">Entertainment</a>
									<span>-</span>
									<span>11/10/2019</span>
								</span>
							</div>
						</div>
					</div>
						<div class="col-md-12 dangkynhantin" style="margin-bottom: 50px">
							<h5>Subscribe</h5>
							<p>Get all latest content delivered to your email a few times a month.</p>
							<form class="dangkynhantin" style="position: relative">
								<input class="dangkynhantin" type="text" name="email" placeholder="Email">
								<button class="dangkynhantin"><i class="fa fa-arrow-right"
										aria-hidden="true"></i></button>
							</form>
						</div>
					<div class="row" style="padding-top: 50px;">
						<div class="col-md-12">
							<nav class="navbar navbar-default">
								<a class="navbar-brand phobien" href="#">Tags</a>
							</nav>
						</div>
					</div>
					<div class="row tags">
						<div class="col-md-12">
							<?php foreach($tags as $tg): ?>
							<a href="<?=$tg->tags_ko?>.html" class="tags"><?=$tg->ten_tags?></a>
							<?php endforeach ?>


						</div>

					</div>
				</div>
			</div>
		</div>

	</main>
<?php
require_once "view/footer.php";
?>