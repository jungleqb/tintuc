<?php ob_start(); 
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>
<?php 

 require_once "view/header.php" ;
 require_once "model/adminModel.php";
 require_once "helper/VitoEn.php";
 require_once "helper/PHPMailer/sendmail.php";
 $model = new adminModel;

  if(isset($_GET['com'])){
    $com = $_GET['com'];
  }
  else{
    $com = '';

  }

  switch ($com) {
    case 'theloai':
      require_once "controller/theloai.php";
      break;

    case 'tintuc':
      require_once "controller/tintuc.php";
      break;

    case 'kiemduyet':
      require_once "controller/kiemduyet.php";
      break;

    case 'cauhinh':
      require_once "controller/cauhinh.php";
      break;
    case 'caidat':
      if(isset($_SESSION['uid'])){
        $data = $model->selectTableById('nguoidung',$_SESSION['uid']);
        if(isset($_POST['sm'])){
          $ten = $_POST['ten'];
          $tenko = convert_vi_to_en($ten);
          $mail = $_POST['mail'];
          $sdt = $_POST['sdt'];

          $d = $model->updateUser($ten,$tenko,$mail,$sdt,$_SESSION['uid']);
          if($d){
            header('location:?com=caidat');
            return;
          }
        }

      }

      require_once "view/caidat.php";
      break;

    case 'comment':
      require_once "controller/comment/index.php";
      break;

    case 'user':
      require_once "controller/user.php";
      break;

    default:
      require_once "view/null.html";
      break;

    
  }


?>






<?php require_once "view/footer.php" ?>
 <?php ob_end_flush(); ?>