

<!-- $idtype,$iduser,$imgname,$alt_img,$title,$titleko,$ndesc,$content,$title_seo,$ndesc_seo,$key_seo,$status -->



            <div class="container">
              <h2>Thêm dữ liệu</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Quản lí</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
                  </ol>
                </nav>
                <a href="index.php?com=tintuc&act=list"><button type="button" class="btn">Thoát</button></a>
                <!-- Tab links -->
                  <div class="tabc">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Thông tin chung</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Thông tin</button>

                  </div>

                  <div id="London" class="tabcontentc">

                    <p>Các thông tin liên quan bên ngoài bài viết</p>
                    <h3>Nhập dữ liệu</h3>
                    <?php if(isset($message)) echo $message; ?>
                            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="sel1">Chọn thể loại</label>
                                <div class="col-sm-10">
                                  <select name="type" class="form-control" id="sel1">
                                    <?php foreach($type as $t): ?>
                                    <option name="type" value="<?=$t->id?>"><?=$t->tentl?></option>
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
                                  <input name="title_seo" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="key">Keyword:</label>
                                <div class="col-sm-10">
                                  <input name="key_seo" type="text" class="form-control" id="key">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="desc">Description:</label>
                                <div class="col-sm-10">
                                  <textarea name="ndesc_seo" class="form-control" id="desc"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Thẻ Tags</label>
                                <div class="col-sm-10">
                                  <input name="tags" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Trạng thái</label>
                                <div class="col-sm-10">
                                <label class="radio-inline"><input value="1" name="home" type="radio" > Hiện</label>
                                <label class="radio-inline"><input value="0" name="home" type="radio" checked="checked"> Ẩn</label>
                                </div>
                              </div>
                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Loại tin</label>
                                <div class="col-sm-10">
                                <label class="radio-inline"><input value="1" name="status" type="radio" > Đặc biệt</label>
                                <label class="radio-inline"><input value="0" name="status" type="radio" checked="checked"> Bình thường</label>
                                </div>
                              </div>

                              
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button name="add_news" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                        </div>

                        <div id="Paris" class="tabcontentc">
                          <p>Các thông tin liên quan đến bài viết</p> 

                          <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Tiêu đề:</label>
                                <div class="col-sm-10" >
                                  <input name="title" type="text" class="form-control" id="title">
                                </div>
                              </div>
                              
                              <div class="form-group" >
                                <label class="control-label col-sm-2" for="desc">Mô tả ngắn:</label>
                                <div class="col-sm-10" style="margin-top: 10px">
                                  <textarea name="ndesc" rows="10" class="form-control" id="desc"></textarea>
                                </div>
                              </div>

                              <div class="form-group" >
                                <label class="control-label col-sm-2" for="desc">Nội dung chính:</label>
                                <div class="col-sm-10" style="margin-top: 10px">
                                  <textarea id="content" name="content" rows="14" class="form-control" id="desc"></textarea>
                                </div>
                              </div>
                              <script>    CKEDITOR.replace( 'content' );</script>

                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px">
                                  <button name="add_news" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                            </form>
</div>



            </div>
        
