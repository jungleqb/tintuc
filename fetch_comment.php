<?php 
session_start();
$idtt = $_SESSION['idtt'];


$connect = new PDO('mysql:host=localhost;dbname=cuacuon','root', '');
$sql = "SELECT bl.*, u.ten
		FROM binhluan bl
		INNER JOIN nguoidung as u ON u.id = id_nguoidung 
		WHERE parent_id = 0
		AND id_tintuc = $idtt
		ORDER BY id DESC 
";
$stsm = $connect->prepare($sql);
$stsm->execute();
$result = $stsm->fetchAll();
$output = '';
foreach ($result as $row) {
	$output .= '
						<div class="single-comment" style="margin:30px">
						<div class="user">
							<div class="thumb">
								<img src="upload/avatt.jpg" alt="">
							</div>
							<div class="desc">
								<h5><a href="#">'.$row["ten"].'</a></h5>
								<p class="date">'.$row["ngay_tao"].'</p>
								<p class="comment">
									'.$row["noidung"].'
								</p>
							</div>
						</div>
						<div class="reply-btn">
							<button style="width:80px; height:30px; color:#fff; border:none; background-color:#17b978;" class="btn-reply text-uppercase" id="'.$row["id"].'">reply</button>
						</div>
					</div>
	';
	$output .= get_reply_comment($connect, $row["id"]);
}
echo $output;

function get_reply_comment($connect,$parent_id = 0, $marginleft = 0){
	$output = '';
	$sql = "SELECT bl.*, u.ten
			FROM binhluan bl
			INNER JOIN nguoidung as u ON u.id = id_nguoidung 
			WHERE parent_id = '$parent_id'
	";

	$stsm = $connect->prepare($sql);
	$stsm->execute();
	$result = $stsm->fetchAll();
	$count = $stsm->rowCount();
	if($parent_id == 0){
		$marginleft = 0;
	}
	else{
		$marginleft = $marginleft + 100;
	}
	if($count > 0){
		foreach($result as $row){
			$output .= '
				<div class="single-comment" style="margin-left:'.$marginleft.'px; margin-top:30px">
											<div class="user">
												<div class="thumb">
													<img src="upload/avatt.jpg" alt="">
												</div>
												<div class="desc">
													<h5><a href="#">'.$row["ten"].'</a></h5>
													<p class="date">'.$row["ngay_tao"].' </p>
													<p class="comment">
														'.$row["noidung"].'
													</p>
												</div>
											</div>
										</div>
			';

			$output .= get_reply_comment($connect,$row["id"], $marginleft);
		}
	}
	return $output;

}

?>