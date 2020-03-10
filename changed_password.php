<?php 
session_start();
require_once "model/newsModel.php";

if(isset($_GET['token'])){
	$token = $_GET['token'];
}
else{
	header('location:trang-chu');
}
$model = new newsModel;
$d =$model->checkToken($token);
if(isset($_POST['gm'])){
	$error = array();
	if(empty($_POST['pass'])) $error[]='pass'; else $pass = $_POST['pass'];
    if(empty($_POST['rpass'])) $error[]='rpass'; else $rpass = $_POST['rpass'];
    if(empty($error)){
        if(strlen($pass) < 6){
            $message = 'Mật khẩu trên 6 kí tự';
        }
    	elseif($rpass != $pass){
    		$message = 'Mật khẩu không giống nhau';
    	}
    	else{
    		if($d){
				$a = $model->updatePass($pass,$token);
				if($a){
					$message = 'Đổi mật khẩu thành công <a href="login.php">Đăng nhập</a>';
				}
			}
    	}
    	
    }
    else{
    	$message = 'Vui lòng nhập đủ thông tin';
    }
	
}


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


</head>
<?php require_once "view/header.php"; ?>

<div class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
  </ol>
</nav>
    <div class="site-section" style="margin:50px">
            <?php if(isset($message)) echo $message; ?>
            <form method="POST">
            <div class="row justify-content-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Mật khẩu</label>
                            <input name="pass" type="password" id="username" class="form-control form-control-md">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="username">Nhập lại mật khẩu</label>
                            <input name="rpass" type="password" id="username" class="form-control form-control-md">
                        </div>

                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-12">
                            <input type="submit" name="gm" value="Gửi" class="btn btn-primary btn-md px-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            </form>


    </div>
  
   </div>

<?php require_once "view/footer.php"?>