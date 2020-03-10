<?php 
session_start();
require_once "model/newsModel.php";
require_once "helper/PHPMailer/sendmail.php";
require_once "helper/functions.php";
$model = new newsModel;

if(isset($_POST['sm'])){
    $error = array();
    if(empty($_POST['name'])) $error[]='name'; else $_SESSION['re_name'] = $_POST['name'];
    if(empty($_POST['mail'])) $error[]='mail'; else $_SESSION['re_mail'] = $_POST['mail'];
    if(empty($_POST['pass'])) $error[]='pass'; else $_SESSION['re_pass'] = $_POST['pass'];
    if(empty($_POST['rpass'])) $error[]='rpass'; else $rpass = $_POST['rpass'];
   
    if(!empty($error)){
        $message = 'Bạn cần nhập đủ thông tin';
    }
    else{
        $d = $model->checkAccount($_SESSION['re_mail']);
        if(strlen($_SESSION['re_pass']) < 6){
            $message = 'Mật khẩu trên 6 kí tự';
        }
        elseif($_SESSION['re_pass'] != $rpass){
            $message = 'Mật khẩu không giống nhau';
        }
        elseif($d){
            $message = 'Mail đã tồn tại';
        }
        
        else{
            $_SESSION['re_idtk'] = createToken(6);
            $m = sendMail($_SESSION['re_mail'],$_SESSION['re_idtk']);
            if($m){
                header('location:accept_register.php');

            } 

        }
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
    <li class="breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
  </ol>
</nav>
    <div class="site-section" style="margin:50px">
            <?php if(isset($message)) echo $message; ?>

            <div class="container signup-container">
                <div class="row">
                    <div class="col-md-6 signup-form-1">
                        <h3>Tạo tài khoản FreeKok</h3>
                        <form method="POST">
                            <div class="form-group">
                                <input name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" type="text" id="username" class="form-control form-control-md" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <input name="mail" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>" type="email" id="username" class="form-control form-control-md" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <input name="pass" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass']; } ?>" type="password" id="pword" class="form-control form-control-md" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <input name="rpass" value="<?php if(isset($_POST['rpass'])){ echo $_POST['rpass']; } ?>" type="password" id="username" class="form-control form-control-md" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="sm" class="btnSubmit" value="Tạo tài khoản" />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 signup-form-2">
                        <h3>Đăng ký với</h3>
                        <form class="facebook">
                            <div class="signup-facebook">
                                <a class="icon-right" href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            </div>
                        </form>
                        <form class="google">
                            <div class="signup-google">
                                <a class="icon-right" href="#"><i class="fa fa-google" aria-hidden="true"></i> Google</a>
                            </div>
                        </form>
                        <form class="signup">
                            <div class="signup">
                                <a class="icon-right" id="chuyendn" href="dang-nhap">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
  
   </div>

<?php require_once "view/footer.php"; ?>