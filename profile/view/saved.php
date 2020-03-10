<div class="right-baiviet">
									<h1>Bài viết đã lưu</h1>
									<?php foreach($save as $news): 
									$ts = $model->getTypeSave($news->id);
									?>
									<div class="row">
										<div class="all-bv clearfix">
											<div class="col-md-2">
												<div class="img-r-bv">
													<a href="<?=$ts->tentl_ko?>/<?=$ts->tieude_ko?>-<?=$ts->idtt?>.html">
														<img src="upload/<?=$news->ava_img?>">
													</a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="text-r-bv">
													<h3><a href="<?=$ts->tentl_ko?>/<?=$ts->tieude_ko?>-<?=$ts->idtt?>.html"><?=$news->tieude?></a></h3>
													<p><?=$ts->tentl?> - <?=$news->ngaydang?></p>
													<h5><?=$news->mota?></h5>
												</div>
											</div>
											<div class="col-md-2">
												<div class="bv-trangthai">
													Trạng thái
															<span class="cho">Đang đọc</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="bv-xoa">
													<a href="?act=saved&id=<?=$ts->idtt?>">Bỏ lưu</a>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach ?>

								</div>