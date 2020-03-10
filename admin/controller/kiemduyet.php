<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act ="";
}

switch ($act) {
	case 'list':
		$newsko = $model->getNewsNo();

		require_once "view/kiemduyet/list.php";

		break;
	case 'edit':
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$type = $model->selectTable('theloai');
			$data = $model->getNewsAndUser($id);
			if(isset($_POST['edit'])){
				$file = $_FILES['img']['name'];
					if($file!=''){
						if(($_FILES['img']['type']!="image/png")
						&& ($_FILES['img']['type']!="image/gif")
						&& ($_FILES['img']['type']!="image/jpeg")
						&& ($_FILES['img']['type']!="image/jpg")
						){
							echo "File không đúng định dạng";
						}
						elseif($_FILES['img']['size'] > 5000000){
							echo "Ảnh phải nhỏ hơn 1MB";
						}
						elseif($_FILES['img']['size'] =""){
							echo "Bạn chọn phải chọn ảnh";
						}
						else{
							$files=$_FILES['img'];
							$img=$files['name'];
							$imgname = time()."-".$img;

							$link_img="../upload/".$imgname;
							move_uploaded_file($files['tmp_name'],"../upload/".$imgname);
						}
					}
					else{
						$imgname = $data->ava_img;

					}

				$title = $_POST['title'];
				if(isset($title)){
		        $titleko = convert_vi_to_en($title);
		        $alt_img = $titleko;
				}
				$ndesc = $_POST['ndesc'];
				$content = $_POST['content'];		
				$status = $_POST['status'];
				$show = $_POST['home'];
				$tags = $_POST['tags'];
				$title_seo = $_POST['title_seo'];
				$ndesc_seo = $_POST['ndesc_seo'];
				$key_seo = $_POST['key_seo'];

					$d = $model->updateNews($imgname,$alt_img,$title,$titleko,$ndesc,$content,$tags,$title_seo,$ndesc_seo,$key_seo,$status,$show,$id);
					if($d){
						if($show == 1){
							$body = "Xin chào tài khoản :".$data->ten."<br/> Bài <h3> ".$data->tieude."</h3> đã được duyệt";
						$a = sendMail($data->mail,$body);
						}
						
						
						header("location:index.php?com=kiemduyet&act=list");
						return;

					}
					

			}


		}

		require_once "view/kiemduyet/edit.php";
		break;
	case 'delete':
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$data = $model->getNewsAndUser($id);
			$del = $model->deleted($id);
			if($del){
				$body = "Xin chào tài khoản :".$data->ten."<br/> Bài <h3> ".$data->tieude."</h3> Không được duyệt vì vi phạm ";
				$a = sendMail($data->mail,$body);

    			header("location:index.php?com=kiemduyet&act=list");
					return;
    		}
    		else{
    			header("location:index.php?com=kiemduyet&act=list");
					return;
    		}
    	}
    	
		break;

	default:
		# code...
		break;
}
?>