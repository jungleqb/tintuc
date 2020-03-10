<?php 
session_start();
require_once "model/newsModel.php";
$model = new newsModel;
if(isset($_POST['sm'])){
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $data = $model->loginAccount($mail,$pass);
    if($data){
        $_SESSION['tokenid'] = $data->token;
        $_SESSION['nameu']=$data->ten;
        $_SESSION['iduser']=$data->id;
        header("location:ca-nhan");
        return;
    }
    else{
        $message = 'Tài khoản không đúng';
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
    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
  </ol>
</nav>
    <div class="site-section" style="margin:50px">
            <?php if(isset($message)) echo $message; ?>
        <div class="container login-container">
            <div class="row">
                
                <div class="col-md-6 login-form-1">
                    <h3>Đăng nhập với email</h3>
                    <form method="POST">
                        <div class="form-group">
                            <input name="mail" type="email" id="username" class="form-control" placeholder="Email*" value="" />
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" id="pword" class="form-control" placeholder="Mật khẩu*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="sm" value="Đăng nhập" class="btnSubmit" value="Đăng nhập" />
                        </div>
                        <div class="form-group">
                            <a  href="forgot_account.php">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Đăng nhập với</h3>
                    <form class="facebook">
                        <div class="login-facebook">
                            <a class="icon-right" href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        </div>
                    </form>
                    <form class="google">
                            <div class="login-google">
                                <a class="icon-right" href="#"><i class="fa fa-google" aria-hidden="true"></i> Google</a>
                            </div>
                        </form>
                    <form class="login">
                        <div class="login">
                            <a class="icon-right" id="chuyendk" href="dang-ky">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
   </div>

<?php require_once "view/footer.php"; ?>