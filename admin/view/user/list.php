 <div class="container">
                          <h2>Quản lý người dùng</h2>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Quản lí</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
                              </ol>
                            </nav>
                            <div class="row">
                               <form class="col-sm-4" method="GET" action="">
                                <div class="input-group ">
                                  <input type="hidden" name="com" value="tintuc">
                                  <input type="text" class="form-control" placeholder="Search" name="key">
                                  <div class="input-group-btn">
                                    <button class="btn btn-default" name="search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                  </div>
                                  <input type="hidden" name="act" value="search">
                                </div>
                                </form>
                            </div>

         
                          <table class="table table-striped" style="margin-top: 30px">
                            <thead>
                              <tr>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Chức danh</th>
                                <th>Thay đổi chức danh</th>
                                <th>Ngày tạo</th>
                                <th>Xóa</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              <?php foreach($user as $n): ?>
                              <tr>
                                <?php if(isset($message)) echo $message; ?>
                                <td><?=$n->ten?></td>
                                <td><?=$n->mail?></td>
                                <td><?php if($n->trang_thai == 0): ?>
                                  Đọc giả
                                  <?php elseif($n->trang_thai == 1): ?>
                                    Biên tập
                                    <?php else: ?>
                                      Toàn quyền
                                    <?php endif ?>
                                </td>

                                <td><a href="index.php?com=kiemduyet&act=edit&id=<?=$n->idtt?>"><img src="public/images/eye.png" width="20px"></a></td>
                                <td><?=$n->ngay_tao?></td>
                                <td><a onclick="return confirm('Bạn thật sự muốn xóa không?')" href="index.php?com=kiemduyet&act=delete&id=<?=$n->idtt?>"><img src="public/images/icondel.png" width="20px"></a></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
