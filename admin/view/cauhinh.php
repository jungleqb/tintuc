<div class="container">
  <h2>Cấu hình</h2>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Quản lí</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cấu hình website</li>
    </ol>
  </nav>
  <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <form class="form-horizontal"  method="POST" enctype="multipart/form-data">           
        <table class="table table-bordered" style="background: #f9f9f9">
          <thead style="background: #efefef">
            <tr>
              <th colspan="2"></th>
              <th colspan="10" style="color:red">Thông tin công ty</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2"  for="title">Tên</label>
                  <div class="col-sm-10">
                    <input name="ten" value="<?=$data->ten?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Địa chỉ</label>
                  <div class="col-sm-10">
                    <input name="diachi" value="<?=$data->diachi?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Email</label>
                  <div class="col-sm-10">
                    <input name="email" value="<?=$data->mail?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Điện thoại</label>
                  <div class="col-sm-10">
                    <input name="dienthoai" value="<?=$data->sdt?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Fanpage</label>
                  <div class="col-sm-10">
                    <input name="fanpage" value="<?=$data->page_fb?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>

            </tr>

          </tbody>
          
        </table>
        <table class="table table-bordered" style="background: #f9f9f9">
          <thead style="background: #efefef">
            <tr>
              <th colspan="1"></th>
              <th colspan="11" style="color:red">Hình ảnh</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="file">Tải icon</label>
                  <div class="col-sm-10">
                    <input name="icon"  type="file" class="form-control" id="file">
                  </div>
                </div>
                <label class="control-label col-sm-2" for="file">Hình hiện tại</label>
                  <div class="col-sm-10">
                    <img src="../upload/<?=$data->icon?>">
                  </div>
              </td>
            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="file">Tải logo:</label>
                  <div class="col-sm-10">
                    <input name="logo" type="file" class="form-control" id="file">
                  </div>
                </div>
                <label class="control-label col-sm-2" for="file">Hình hiện tại</label>
                  <div class="col-sm-10">
                    <img src="../upload/<?=$data->logo?>">
                  </div>
              </td>

            </tr>
          </tbody>
        </table>

        <table class="table table-bordered" style="background: #f9f9f9">
          <thead style="background: #efefef">
            <tr>
              <th colspan="2"></th>
              <th colspan="10" style="color:red">Thông tin Seo</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Title</label>
                  <div class="col-sm-10">
                    <input name="titleseo" value="<?=$data->title_seo?>" type="text" class="form-control" id="title">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group" >
                  <label class="control-label col-sm-2" for="desc">Keywords</label>
                  <div class="col-sm-10" >
                    <textarea name="keyseo" rows="10" class="form-control" id="desc"><?=$data->key_seo?></textarea>
                  </div>
                </div>
              </td>

            </tr>

            <tr>
              <td colspan="12">
                <div class="form-group" >
                  <label class="control-label col-sm-2" for="desc">Description</label>
                  <div class="col-sm-10" >
                    <textarea name="descseo"  rows="10" class="form-control" id="desc"><?=$data->desc_seo?></textarea>
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group" >
                  <label class="control-label col-sm-2" for="desc">Code thêm header</label>
                  <div class="col-sm-10" >
                    <textarea name="ana"  rows="10" class="form-control" id="desc"><?=$data->analytics?></textarea>
                  </div>
                </div>
              </td>

            </tr>

          </tbody>
          
        </table>

        <table class="table table-bordered" style="background: #f9f9f9">
          <thead style="background: #efefef">
            <tr>
              <th colspan="2"></th>
              <th colspan="10" style="color:red">Bản đồ công ty</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan="12">
                <div class="form-group" >
                  <label class="control-label col-sm-2" for="desc">Code nhúng bản đồ</label>
                  <div class="col-sm-10" >
                    <textarea name="map" rows="10" class="form-control" id="desc"><?=$data->map_gg?></textarea>
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2">Link tạo bản đồ iframe</label>
                  <div class="col-sm-10">
                    <a href="https://support.google.com/maps">https://support.google.com/maps</a>
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Bản đồ đã nhập</label>
                  <div class="col-sm-10">
                    <?=$data->map?>
                  </div>
                </div>
              </td>

            </tr>
            <tr>
              <td colspan="12">
                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px">
                    <button name="edit_cauhinh" type="submit" class="btn btn-primary">Hoàn tất</button>
                  </div>
                </div>
              </td>

            </tr>

          </tbody>
          
        </table>
      </form>
    </div>
  </div>
</div>