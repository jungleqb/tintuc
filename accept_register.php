

<?php 
session_start();
require_once "admin/helper/VitoEn.php";
require_once "model/newsModel.php";
require_once "helper/functions.php";
$model = new newsModel;
if(isset($_SESSION['re_mail'])){
    if(isset($_POST['lh'])){
        
        $text = $_POST['text'];
        if($text == $_SESSION['re_idtk']){
            $name = $_SESSION['re_name'];
            $mail = $_SESSION['re_mail'];
            $pass = $_SESSION['re_pass'];
            $nameko = convert_vi_to_en($name);
            $token = createToken(50);

            $a =$model->register($token,$name,$nameko,$mail,$pass);
            if($a){
                session_destroy();
                header('location:login.php');
                return;
            }
        }
        else{
            $message = 'XIN LỖI MÃ XÁC NHẬN KHÔNG ĐÚNG';
        }
    

    }
}
    else{
        header("location:register.php");

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
    <li class="breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
  </ol>
</nav>
    <div class="site-section" style="margin:50px">
            <?php if(isset($message)) echo $message; ?>
            Nếu bạn đăng kí mail không tồn tại. Xin vui lòng quay lại để thực hiện đăng ký bởi mail đang sử dụng <a href="login.php"> - Đăng ký</a>
            <form method="POST">
            <div class="row justify-content-center">
            	<div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Mã</label>
                            <input name="text" type="text" id="username" class="form-control form-control-md">
                        </div>

                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-12">
                            <input type="submit" name="lh" value="Gửi" class="btn btn-primary btn-md px-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            </form>


    </div>
  
   </div>