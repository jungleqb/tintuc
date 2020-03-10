<div class="right-baiviet">
									<h1>Bài viết đã comment</h1>
									<?php foreach($cmt as $cm): 
											$ts = $model->getTypeSave($cm->id);
										?>
									
									<div class="row" style="margin-top: 30px; background-color: #e3e3e3; min-height: 50px; padding: 20px;">
										<div class="col-md-6">
											<div class="left-comment">
												<i style="color: #17b978; margin-right:5px;"  class="fa fa-commenting" aria-hidden="true"></i>
												<a style="font-size: 15px; font-weight: bold;" href="#">
													Bạn đã comment bài <a href="<?=$ts->tentl_ko?>/<?=$ts->tieude_ko?>-<?=$ts->idtt?>.html"><?=$cm->tieude?></a>
												</a>
											</div>
										</div>
										<div class="col-md-6">
											<div class="right-comment" style="">
												<i style="color: #17b978" class="fa fa-bullseye" aria-hidden="true"></i>
												<p style="display: inline;"> " <?=$cm->noidungc?> ." </p>
											</div>
										</div>
									</div>
								<?php endforeach ?>


								</div>