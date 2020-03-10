

<!-- $title,$titleko,$alt_img,$ndesc,$content,$status,$title_seo,$ndesc_seo,$key_seo,$id -->

            <div class="container">
              <h2>Kiểm duyệt bài viết</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Quản lí</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
                  </ol>
                </nav>
                <a href="index.php?com=kiemduyet&act=list"><button type="button" class="btn">Thoát</button></a>
                <!-- Tab links -->
                  <div class="tabc">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Thông tin chung</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Thông tin</button>

                  </div>

                  <div id="London" class="tabcontentc">

                    <p>Các thông tin liên quan bên ngoài bài viết</p>
                    <h3>Nhập dữ liệu</h3>
                            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Thể loại:</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="type">
                                    <?php foreach($type as $t): ?>
                                      <?php if($data->idType == $t->id) $m = "checked='checked'"; else $m = ''; ?>
                                    <option  value="<?=$t->id?>" <?php if(isset($m)) echo $m; ?>><?=$t->tentl?></option>
                                  <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="file">Tải hình ảnh:</label>
                                <div class="col-sm-10">
                                  <input name="img" type="file" class="form-control" id="file">
                                  <i style="font-size: 10px">*Size hình 1080 x 1350 jpg, png, gif*</i>
                                </div>

                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Title:</label>
                                <div class="col-sm-10">
                                  <input name="title_seo" value="<?=$data->title_seo?>" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="key">Keyword:</label>
                                <div class="col-sm-10">
                                  <input name="key_seo" value="<?=$data->key_seo?>" type="text" class="form-control" id="key">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="desc">Description:</label>
                                <div class="col-sm-10">
                                  <textarea name="ndesc_seo" class="form-control" id="desc"><?=$data->desc_seo?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Thẻ Tags:</label>
                                <div class="col-sm-10">
                                  <input name="tags" value="<?=$data->tags?>" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Trạng thái</label>
                                <div class="col-sm-10">
                                <?php if($data->hienthi == 1): ?>
                                <label class="radio-inline"><input value="1" name="home" type="radio" checked="checked"> Hiện</label>
                                <label class="radio-inline"><input value="0" name="home" type="radio" > Ẩn</label>
                                <?php else: ?>
                                <label class="radio-inline"><input value="1" name="home" type="radio" > Hiện</label>
                                <label class="radio-inline"><input value="0" name="home" type="radio" checked="checked"> Ẩn</label>
                                <?php endif ?>
                                </div>
                              </div>
                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Đặc biệt</label>
                                <div class="col-sm-10">
                                  <?php 
                                    if($data->dacbiet == 1):
                                  ?>
                                <label class="radio-inline"><input value="1" name="status" type="radio" checked="checked"> Có</label>
                                <label class="radio-inline"><input value="0" name="status" type="radio" > Không</label>
                                <?php else: ?>
                                  <label class="radio-inline"><input value="1" name="status" type="radio" > Có</label>
                                <label class="radio-inline"><input value="0" name="status" type="radio" checked="checked"> Không</label>
                              <?php endif ?>
                                </div>
                              </div>
                              
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button name="edit" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                        </div>

                        <div id="Paris" class="tabcontentc">
                          <h3>Thông tin</h3>
                          <p>Các thông tin liên quan đến bài viết</p> 

                          <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Tiêu đề:</label>
                                <div class="col-sm-10" >
                                  <input name="title" value="<?=$data->tieude?>" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              
                              <div class="form-group" >
                                <label class="control-label col-sm-2" for="desc">Mô tả ngắn:</label>
                                <div class="col-sm-10" style="margin-top: 10px">
                                  <textarea name="ndesc" rows="10" class="form-control" id="desc"><?=$data->mota?></textarea>
                                </div>
                              </div>

                              <div class="form-group" >
                                <label class="control-label col-sm-2" for="desc">Nội dung chính:</label>
                                <div class="col-sm-10" style="margin-top: 10px">
                                  <textarea id="content" name="content" rows="18" class="form-control" id="desc"><?=$data->noidung?></textarea>
                                </div>
                              </div>
                              <script>    CKEDITOR.replace( 'content' );</script>

                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px">
                                  <button name="edit" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                            </form>
</div>



            </div>
        
