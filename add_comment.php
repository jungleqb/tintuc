<?php 
session_start();

$connect = new PDO('mysql:host=localhost;dbname=cuacuon','root', '');
$error = '';
$comment_content = '';
$idt = $_POST['idu'];



if(empty($_POST['comment_content'])){
	$error .="Bạn chưa nhập comment";
}
else{
	$comment_content = $_POST['comment_content'];
}
if($error == ''){
	$sql = "INSERT INTO binhluan(id_tintuc,id_nguoidung,noidung,parent_id)
			VALUES(:id_tintuc, :id_nguoidung, :noidung, :parent_id)

	";
	$stsm = $connect->prepare($sql);
	$stsm->execute(
		array(
			':parent_id' => $_POST["comment_id"],
			':id_tintuc' => $idt,
			':id_nguoidung' => $_SESSION['iduser'],
			':noidung' => $comment_content
		)
	);
	$error = 'Đã thêm bình luận';
}
$data = array(
	'error' => $error
);
echo json_encode($data);

?>