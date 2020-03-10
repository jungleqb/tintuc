
<?php 
session_start();
require_once "controller/newsController.php"; 
require_once "model/newsModel.php";
require_once "model/proModel.php";
$pmodel = new proModel;
$model = new newsModel;
$ctrl = new newsController;
$data = $ctrl->detail();
$news = $data['news'];
$tags = $data['tags'];
if(isset($_SESSION['iduser'])){
	$check = $pmodel->checkSave($news->idtt,$_SESSION['iduser']);
}

$_SESSION['idtt'] = $news->idtt;

if(isset($_POST['save'])){
	$idtt = $news->idtt;
	$idu = $_SESSION['iduser'];
	$status = 1;
	$a = $model->setSave($idtt,$idu,$status);
	if($a){
		echo '<script>alert("Tin đã lưu");</script>';
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

		<div class="txt-chitiet">
			<div class="container">

				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="row print" style="float: right; display: flex;" >
							<button id="print123" onclick="myFunction()"><i class="fa fa-print" style="" aria-hidden="true"></i></button>

<script>
function myFunction() {
  window.print();
}
</script>
<?php if(isset($_SESSION['tokenid'])): ?>
	<?php if(!$check): ?>
<form method="post">
	<button id="luu123" style="border: none; transition: 0.3s; background: #17b978; color: #fff; width: 50px; height: 30px; border-radius: 5px;" type="submit" name="save">Lưu</button>
</form>
<?php endif ?>
	<?php endif ?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="tieude-chitiet">
									<h1><?=$news->tieude?></h1>
									<p><a href="#">bởi <?=$news->ten?></a></p>
								</div>
							</div>
							<div class="col-md-12">
								<div class="baiviet-chitiet">
									<p><?=$news->noidung?></p>

								</div>
							</div>
							<div class="col-md-12">
								<div class="tags">
									<span class="txt-tag">
										Tags: 
										<?php foreach($tags as $tg): ?>
										<a href="<?=$tg->tags_ko?>.html"><?=$tg->ten_tags?></a> 
										<?php endforeach ?>
									</span>
								</div>
							</div>
							<div class="col-md-12">
								<div class="share">
									<span class="txt-share">
										Share:
									</span>
									<!-- Share Facebook -->
									<div class="btn-share">
										<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
									</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
									<!-- Share Zalo -->
									<script src="https://sp.zalo.me/plugins/sdk.js"></script>
									<div class="btn-share">
										<div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
									</div>

								</div>
							</div>
							<div class="col-md-12">
							<div class="comment">
								<div class="tieude-comment">
									<h3>Bình Luận</h3>
								</div>

								<?php 
								if(isset($_SESSION['iduser'])):
								?>
								<div class="all-ip">
									<div class="ip-comment">
										<form method="POST" id="comment_form" action="">
											<input type="text" name="comment_content" id="comment_content" class="form_control"
											 placeholder="Comment">
											 <input type="hidden" name="idu" value="<?=$news->idtt?>">
										
										
									</div>
								</div>
								<div class="btn-comment">
									<input type="hidden" name="comment_id" id="comment_id" value="0">
									<button type="submit" name="submit" id="submit">Gửi</button>
								</div>
								<span id="comment_message"></span>
								</form>
								<?php else: ?>
									<p>Vui lòng Đăng nhập để bình luận </p>
									<?php endif ?>


								<div class="comments-area">
									<h4>Bình luận</h4>

									<div class="comment-list" id="display_comment">
										
									</div>

								</div>

								<script>
								$(document).ready(function(){
								 
								 $('#comment_form').on('submit', function(event){
								  event.preventDefault();
								  var form_data = $(this).serialize();
								  $.ajax({
								   url:"add_comment.php",
								   method:"POST",
								   data:form_data,
								   dataType:"JSON",
								   success:function(data){
								    if(data.error != ''){
								     $('#comment_form')[0].reset();
								     $('#comment_message').html(data.error);
								     load_comment();
								    }
								   }
								  })
								 });

								 load_comment();

								 function load_comment(){
								  $.ajax({
								   url:"fetch_comment.php",
								   method:"POST",
								   success:function(data){
								    $('#display_comment').html(data);
								   }
								  })
								 }

								 $(document).on('click', '.btn-reply', function(){
								  var comment_id = $(this).attr("id");
								  $('#comment_id').val(comment_id);
								  $('#comment_content').focus();
								 });
								 
								});
								</script>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<!--  -->
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<?php require_once "view/footer.php" ?>