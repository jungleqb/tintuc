<div class="right-baiviet">
									<h1>Trạng thái bài viết</h1>
									<?php foreach($show as $news): ?>
									<div class="row">
										<div class="all-bv clearfix">
											<div class="col-md-2">
												<div class="img-r-bv">
													<a href="#">
														<img src="upload/<?=$news->ava_img?>">
													</a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="text-r-bv">
													<h3><?=$news->tieude?></h3>
													<p><?=$news->tentl?> - <?=$news->ngaydang?></p>
													<h5><?=$news->mota?></h5>
												</div>
											</div>
											<div class="col-md-2">
												<div class="bv-trangthai">
													Trạng thái
													<?php if($news->ttdeleted == 1): ?>
														<span class="chua">Không duyệt</span>
													<?php else: ?>
														<?php if($news->hienthi == 1): ?>
															<span class="duyet">Đã duyệt</span>
														<?php else: ?>
															<span class="cho">Chờ duyệt</span> 
														<?php endif ?>
													<?php endif ?>
														
													
												</div>
											</div>
											<div class="col-md-2">
												<div class="bv-xoa">
													<?php if($news->ttdeleted == 1):?>
													<a onclick="return confirm('Bạn thật sự muốn xóa không?')" href="?act=baiduyet&id=<?=$news->idtt?>">Xóa</a>
													<?php else: ?>
													<?php endif ?>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach ?>

								</div>