
									<div class="bot-proview">
										<p>
											Đăng tin
										</p>
									</div>
									<div class="all-about">
										<form method="POST" enctype='multipart/form-data'>
											<div class="form-group">
												<label for="exampleFormControlInput1">Tiêu đề bài viết</label>
												<input type="text" name="title" class="form-control" id="exampleFormControlInput1">
											</div>
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Mô tả</label>
												<textarea class="form-control" name="ndesc" id="exampleFormControlTextarea1"
													rows="3"></textarea>
											</div>
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Nôi dung</label>
												<textarea id="content" name="content" rows="14" class="form-control" id="desc"></textarea>
													<script>    CKEDITOR.replace( 'content' ); </script>
											</div>
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Tải hình đại diện: </label>
												<input type="file" name="img">
											</div>
											<div class="form-group">

												<div class="col-auto my-1">
													<label class="mr-sm-2"
														for="inlineFormCustomSelect">Thể loại: </label>
													<select name="type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
														<option selected>Chọn thể loại</option>
														<?php foreach($a as $type): ?>
														<option value="<?=$type->id?>"><?=$type->tentl?></option>
														<?php endforeach?>
													</select>
												</div>
											</div>

											<button type="submit" name="sub" class="btn btn-primary">Đăng bài</button>
										</form>
									</div>

