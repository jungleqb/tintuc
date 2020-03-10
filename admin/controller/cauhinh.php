<?php 
$m = new adminModel();
$data = $m->selectTableById("cauhinh",1);
if(isset($_POST['edit_cauhinh'])){
  if(($_FILES['icon']['type']!="image/png")
    && ($_FILES['icon']['type']!="image/gif")
    && ($_FILES['icon']['type']!="image/jpeg")
    && ($_FILES['icon']['type']!="image/jpg")
  ){
    echo "File không đúng định dạng";
  }
  elseif($_FILES['icon']['size'] > 1000000){
    echo "Ảnh phải nhỏ hơn 1MB";
  }
  elseif($_FILES['icon']['size'] =""){
    echo "Bạn chọn phải chọn ảnh";
  }
  else{
    $files=$_FILES['icon'];
    $icon=$files['name'];
    $iconname = time()."-".$icon;
    $link_icon="../upload/".$iconname;
    move_uploaded_file($files['tmp_name'],"../upload/".$iconname);
  }
  if(($_FILES['logo']['type']!="image/png")
    && ($_FILES['logo']['type']!="image/gif")
    && ($_FILES['logo']['type']!="image/jpeg")
    && ($_FILES['logo']['type']!="image/jpg")
  ){
    echo "File không đúng định dạng";
  }
  elseif($_FILES['logo']['size'] > 1000000){
    echo "Ảnh phải nhỏ hơn 1MB";
  }
  elseif($_FILES['logo']['size'] =""){
    echo "Bạn chọn phải chọn ảnh";
  }
  else{
    $files=$_FILES['logo'];
    $logo=$files['name'];
    $logoname = time()."-".$logo;
    $link_logo="../upload/".$logoname;
    move_uploaded_file($files['tmp_name'],"../upload/".$logoname);
  }
  $ten = $_POST['ten'];
  $diachi = $_POST['diachi'];
  $email = $_POST['email'];
  $dienthoai = $_POST['dienthoai'];
  $web = $_POST['web'];
  $fanpage = $_POST['fanpage'];
  $titleseo = $_POST['titleseo'];
  $descseo = $_POST['descseo'];
  $keyseo = $_POST['keyseo'];
  $map = $_POST['map'];
  $ana = $_POST['ana'];
  $m = new adminModel();
  $post = $m->updateCauhinh($ten,$diachi,$email,$dienthoai,$web,$fanpage,$titleseo,$descseo,$keyseo,$logoname,$iconname,$map,$ana);
  if($post){
    header("location:index.php?com=cauhinh");
    return;
  }
}
require_once "view/cauhinh.php";
?>