<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}

switch ($act) {
	case 'list':
		$user = $model->selectTable('nguoidung');
		
		require_once 'view/user/list.php';
		break;
	
	default:
		# code...
		break;
}
?>