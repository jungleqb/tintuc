<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act ="";
}


switch ($act) {
	case 'list':
		$news = $model->selectNews();
		if(!$news){
			$message = "Dữ liệu rỗng!";
		}
		require_once "view/tintuc/list.php";
		break;
	case 'add':
		$type = $model->selectTable('theloai');
		if(isset($_POST['add_news'])){
			$idtype = $_POST['type'];
			$iduser = 3;
			$error = array();
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

			if(empty($_POST['title'])) $error[]='title'; else $title = $_POST['title'];
			if(isset($title)){
	        $titleko = convert_vi_to_en($title);
	        $alt_img = $titleko;
			}
			if(empty($_POST['ndesc'])) $error[]='ndesc'; else $ndesc = $_POST['ndesc'];
			if(empty($_POST['content'])) $error[]='content'; else $content = $_POST['content'];	
			$tags = $_POST['tags'];			
			$title_seo = $_POST['title_seo'];
			$ndesc_seo = $_POST['ndesc_seo'];
			$key_seo = $_POST['key_seo'];
			$status = $_POST['status'];
			$show = $_POST['home'];  
			if(empty($error)){
				$model = new adminModel;
				$post = $model->insertNews($idtype,$iduser,$imgname,$alt_img,$title,$titleko,$ndesc,$content,$tags,$title_seo,$ndesc_seo,$key_seo,$status,$show);
				// xử lý tags 
				$idTintuc = $model->getRecentIdInsert();
				$arrTags = explode(",",$tags);
				foreach($arrTags as $tag){
					$tag = trim($tag);
					$result = $model->selectTags($tag);

					if($result){
						$idTags = $result->id;
					}
					else{
						$a = $model->insertTags($tag,convert_vi_to_en($tag));
						$idTags = $model->getRecentIdInsert();
					}
					
					
					$b=$model->insertTTTags($idTintuc,$idTags);
				
				}
				if($post){
					header("location:index.php?com=tintuc&act=list");
					return;
				}
			}
			else{
				$message = "Bạn cần điển đủ thông tin";
			}
			
	      }
		
		require_once "view/tintuc/add.php";
		break;
	case 'edit':
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$type = $model->selectTable('theloai');
			$data = $model->selectTableById('tintuc',$id);
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
						header("location:index.php?com=tintuc&act=list");
						return;
					}

			}


		}

		
    	require_once "view/tintuc/edit.php";
		break;

	case 'delete':
    	if(isset($_GET['id'])){
    		$id = $_GET['id'];
    		$del = $model->delete('tintuc',$id);
    		if($del){
    			header("location:index.php?com=tintuc&act=list");
					return;
    		}
    		else{
    			header("location:index.php?com=tintuc&act=list");
					return;
    		}
    	}
    	
    	break;
      	case 'search':
      	
      		require_once "view/tintuc/search.php";
      		break;
	
	default:
		require_once "view/tintuc/list.php";
		break;
}
?>