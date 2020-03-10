<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act = '';
}

switch ($act) {
	case 'list':
		$data = $model->selectTable('theloai');
		require_once "view/theloai/list.php";
		break;
	case 'add':
		if(isset($_POST['add_type'])){
			$tentl = $_POST['tentl'];
			$tentl_ko = convert_vi_to_en($tentl);
			$menu = $_POST['menu'];
			$home = $_POST['home'];
			$title_seo = $_POST['title_seo'];
			$desc_seo = $_POST['desc_seo'];
			$key_seo = $_POST['key_seo'];
			$c = $model->insertType($tentl,$tentl_ko,$menu,$home,$title_seo,$desc_seo,$key_seo);
			if($c){
				header('location:?com=theloai&act=list');
			}
			else{
				$message = 'Lỗi !';
			}
		}
		
		require_once "view/theloai/add.php";
		break;
	case 'edit':


		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$data=$model->selectTableById('theloai',$id);

			if(isset($_POST['edit_type'])){
				$tentl = $_POST['tentl'];
				$tentl_ko = convert_vi_to_en($tentl);
				$menu = $_POST['menu'];
				$home = $_POST['home'];
				$title_seo = $_POST['title_seo'];
				$desc_seo = $_POST['desc_seo'];
				$key_seo = $_POST['key_seo'];
				$m = $model->updateType($tentl,$tentl_ko,$menu,$home,$title_seo,$desc_seo,$key_seo,$id);
				if($m){
				header('location:?com=theloai&act=list');
			}
			else{
				$message = 'Lỗi !';
			}
			}
		}

		
		require_once "view/theloai/edit.php";
		break;
	case 'delete':
    	if(isset($_GET['id'])){
    		$id = $_GET['id'];
    		$del = $model->delete('theloai',$id);
    		if($del){
    			header("location:index.php?com=theloai&act=list");
					return;
    		}
    		else{
    			header("location:index.php?com=theloai&act=list");
					return;
    		}
    	}
    	
    	break;
	default:
		# code...
		break;
}
?>