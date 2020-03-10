<?php 
require_once "controller/newsController.php";
$controll = new newsController();
if(isset($_POST['sm'])){
	$key = $_POST['txt'];
	$s = $controll->search($key);
	if(!$s){
		$message = "Không tìm thấy kết quả";
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<base href="http://localhost/git/Du_An_2/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/template/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/template/fonts/font-awesome-4.7/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/slick.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/template/css/animate.min.css" <link rel="stylesheet" type="text/css"
		href="public/template/css/responsive.css">
	<script src="public/template/js/jquery-3.3.1.slim.min.js"></script>
	<script src="public/template/js/popper.min.js"></script>
	<script src="public/template/js/bootstrap.min.js"></script>
	<script src="public/template/js/style.js"></script>
	<script async defer data-pin-hover="true" data-pin-tall="true" src="//assets.pinterest.com/js/pinit.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>

</head>
<?php require_once "view/header.php"; 


?>
	<main>

		<div class="container">
			<div class="row" style="padding-top: 50px;">
				<div class="col-md-8">
					<!-- Thể loại tin 1 -->
					<div class="theloai1">
						<div class="row">
							<div class="col-md-12">
								<nav class="navbar navbar-default">
									<a class="navbar-brand giaitri" href="#"><?php 
									if(isset($message)) echo $message; 
									else echo "Có ".count($s)." kết quả với từ khóa <spam style='color:red'>".$key."</spam>";
								?></a>

								</nav>
							</div>

						</div>

						<div class="row" style="padding-bottom:50px">

							<div class="col-md-12" style="padding-right: 25px;">
								<?php foreach($s as $search): ?>
								<div class="row"
									style="display: flex; margin-bottom: 30px;justify-content: space-between;">
									<div class="col-md-3">
										<div class="bochinhanhne">
											<a href="#" class="postright">
												<img src="upload/<?=$search->ava_img?>" alt="<?=$search->alt_img?>">
											</a>
										</div>

									</div>
									<div class="col-md-9">
										<div class="titlepostright">
											<h5 style="padding-bottom: 10px;"><a href="#" class="postright1"><?=$search->tieude?></a></h5>
											<span class="tagtintuc">
												<a href="#"><?=$search->tentl?></a>
												<span>-</span>
												<span><?=$search->ngaydang?></span>
											</span>
											<p><?=$search->mota?></p>
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
	<div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<?php require_once "view/footer.php" ?>