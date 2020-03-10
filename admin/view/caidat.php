<div class="right-baiviet">
	<h1>Cài đặt tài khoản </h1>
<form class="form-horizontal" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-3" for="text">Tên tài khoản :</label>
    <div class="col-sm-9">
      <input type="text" name="ten" value="<?=$data->ten?>" class="form-control" id="text" placeholder="Enter text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="text">Email :</label>
    <div class="col-sm-9">
      <input type="text" name="mail" value="<?=$data->mail?>" class="form-control" id="text" placeholder="Enter text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="text">Số điện thoại :</label>
    <div class="col-sm-9">
      <input type="text" name="sdt" value="<?=$data->sdt?>" class="form-control" id="text" placeholder="Enter text">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="sm" class="btn btn-default">Cập nhật</button>
    </div>
  </div>
</form>



</div>
