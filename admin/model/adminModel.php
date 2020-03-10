<?php require_once "DBConnect.php"; 

class adminModel extends DBConnect{
	// Hàm đăng nhập
	function login($txtname,$txtpass){
		$sql = "SELECT * 
				FROM nguoidung
				WHERE mail = '$txtname'
				AND mat_khau = '$txtpass'
				AND trang_thai != 0
		";
		return $this->getOneRow($sql);
	}
	// Hàm lấy dữ liệu
	function selectTable($tb){
		$sql = "SELECT * 
				FROM $tb
				WHERE deleted = 0

		";
		return $this->getMoreRows($sql);
	}
	// Hàm lấy dữ liệu thông qua id
	function selectTableById($tb,$id){
		$sql = "SELECT * 
				FROM $tb 
				WHERE id = $id
		";
		return $this->getOneRow($sql);
	}
	// hàm lấy dữ liệu tin tức + thể loại 
	function selectNews(){
		$sql = "SELECT *, tt.id as idNews, tl.id as idType
				FROM tintuc as tt
				INNER JOIN theloai as tl ON id_type = tl.id

		";
		return $this->getMoreRows($sql);
	}
	// hàm lấy dữ liệu tin tức với người dùng
	function getNewsAndUser($id){
		$sql = "SELECT * 
				FROM tintuc as tt
				INNER JOIN nguoidung u ON u.id = id_user
				WHERE tt.id = $id
		";
		return $this->getOneRow($sql);
	}
	// Hàm thêm dữ liệu tin tức 
	function insertNews($idtype,$iduser,$imgname,$alt_img,$title,$titleko,$ndesc,$content,$tags,$title_seo,$ndesc_seo,$key_seo,$status,$show){
		$sql = "INSERT INTO tintuc
				(id_type,id_user,ava_img,alt_img,tieude,tieude_ko,mota,noidung,tags,title_seo,desc_seo,key_seo,dacbiet,hienthi)
				VALUES 
				($idtype,$iduser,'$imgname','$alt_img','$title','$titleko','$ndesc','$content','$tags','$title_seo','$ndesc_seo','$key_seo',$status,$show)
				
		";
		return $this->executeQuery($sql);
	}
	// Hàm thêm dữ liệu thể loại
	function insertType($tentl,$tentl_ko,$menu,$home,$title_seo,$desc_seo,$key_seo){
		$sql = "INSERT INTO theloai
				(tentl,tentl_ko,menu,home,title_seo,desc_seo,key_seo)
				VALUES
				('$tentl','$tentl_ko',$menu,$home,'$title_seo','$desc_seo','$key_seo')
		";
		return $this->executeQuery($sql);
	}
	// Hàm sửa dữ liệu tin tức
	function updateNews($imgname,$alt_img,$title,$titleko,$ndesc,$content,$tags,$title_seo,$ndesc_seo,$key_seo,$status,$show,$id){
		$sql = "UPDATE tintuc 
				SET 
					ava_img = '$imgname',
					alt_img = '$alt_img', 
					tieude = '$title',
					tieude_ko = '$titleko', 
					mota = '$ndesc', 
					noidung = '$content', 
					tags = '$tags', 
					title_seo = '$title_seo', 
					desc_seo = '$ndesc_seo', 
					key_seo = '$key_seo', 
					dacbiet = $status,
					hienthi = $show
				WHERE id = $id

		";
		return $this->executeQuery($sql);
	}
	// Hàm sửa dữ liệu thể loại
	function updateType($tentl,$tentl_ko,$menu,$home,$title_seo,$desc_seo,$key_seo,$id){
		$sql = "UPDATE theloai
				SET tentl = '$tentl',
					tentl_ko = '$tentl_ko',
					home = $home,
					menu = $menu,
					title_seo = '$title_seo', 
					desc_seo = '$desc_seo', 
					key_seo = '$key_seo'
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	}
		// Hàm xóa bảng theo id
	function delete($tb,$id){
		$sql = "DELETE FROM $tb 
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	}
	// hàm kiểm tra tags có tồn tại không
	function selectTags($tags){
		$sql = "SELECT *
				FROM tags
				WHERE ten_tags = '$tags' 
		";
		return $this->getOneRow($sql);
	}
	
	// Hàm thêm dữ liệu tags
	function insertTags($ten_tags,$tags_ko){
		$sql = "INSERT INTO tags(ten_tags,tags_ko)
				VALUES ('$ten_tags', '$tags_ko')

		";
		return $this->executeQuery($sql);
	}
	// Hàm thêm dữ liệu tags + tintuc
	function insertTTTags($idTintuc,$idTags){
		$sql = "INSERT INTO tintuc_tags(id_tags,id_tintuc)
				VALUES ('$idTags','$idTintuc')
		";
		return $this->executeQuery($sql);
	}
	// Hàm lấy bài viết chưa được duyệt
	function getNewsNo(){
		$sql = "SELECT *, tt.id as idtt
				FROM tintuc tt
				INNER JOIN theloai tl ON tl.id = id_type 
				INNER JOIN nguoidung u ON u.id = id_user
				WHERE hienthi = 0
				AND tt.deleted = 0
		";
		return $this->getMoreRows($sql);
	}
	// Hàm xóa nhưng lưu lại database
	function deleted($id){
		$sql = "UPDATE tintuc 
				SET deleted = 1
				WHERE id = $id  

		";	
		return $this->executeQuery($sql);
	}
		// Hàm update người dùng
	function updateUser($ten,$tenko,$mail,$sdt,$id){
		$sql = "UPDATE nguoidung 
				SET ten = '$ten',
					ten_ko = '$tenko',
					mail = '$mail',
					sdt = '$sdt'
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	}

}

?>