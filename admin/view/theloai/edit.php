

<!-- $img,$title,$titleko,$ndesc,$content,$status,$title_seo,$desc_seo,$key_seo -->



            <div class="container">
              <h2>Thêm dữ liệu</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Quản lí</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
                  </ol>
                </nav>
                <a href="index.php?com=type&act=list"><button type="button" class="btn">Thoát</button></a>
                <!-- Tab links -->
                  <div class="tabc">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Thông tin chung</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Thông tin</button>

                  </div>

                  <div id="London" class="tabcontentc">
                    <h3>Thông tin chung</h3>
                    <p>Các thông tin liên quan bên ngoài bài viết</p>
                    <h3>Nhập dữ liệu</h3>
                    <?php if(isset($message)) echo $message; ?>
                            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
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
                                  <textarea name="desc_seo" class="form-control" id="desc"><?=$data->desc_seo?></textarea>
                                </div>
                              </div>
                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Hiển thị ở thanh menu</label>
                                <div class="col-sm-10">
                                  <?php if($data->menu == 1): ?>
                                <label class="radio-inline"><input value="1" name="menu" type="radio" checked="checked"> Có</label>
                                <label class="radio-inline"><input value="0" name="menu" type="radio" > Không</label>
                                  <?php else: ?>
                                <label class="radio-inline"><input value="1" name="menu" type="radio" > Có</label>
                                <label class="radio-inline"><input value="0" name="menu" type="radio" checked="checked">Không</label>
                                  <?php endif ?>
                                </div>
                              </div>

                              <div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Hiển thị ở trang chủ</label>
                                <div class="col-sm-10">
                                  <?php if($data->home == 1): ?>
                                <label class="radio-inline"><input value="1" name="home" type="radio" checked="checked"> Có</label>
                                <label class="radio-inline"><input value="0" name="home" type="radio" > Không</label>
                                  <?php else: ?>
                                <label class="radio-inline"><input value="1" name="home" type="radio" > Có</label>
                                <label class="radio-inline"><input value="0" name="home" type="radio" checked="checked">Không</label>
                                  <?php endif ?>
                                </div>
                              </div>
                              
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button name="edit_type" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                        </div>

                        <div id="Paris" class="tabcontentc">
                          <h3>Thông tin</h3>
                          <p>Các thông tin liên quan đến bài viết</p> 

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Tiêu đề:</label>
                                <div class="col-sm-10" >
                                  <input name="tentl" value="<?=$data->tentl?>" type="text" class="form-control" id="title">
                                </div>
                              </div>

                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px">
                                  <button name="edit_type" type="submit" class="btn btn-primary">Hoàn tất</button>
                                </div>
                              </div>
                            </form>
</div>



            </div>
        
