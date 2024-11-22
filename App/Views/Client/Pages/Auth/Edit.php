<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{

    public static function render($data = null)
    {

?>
        <div class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-5">
                        <?php
                        if ($data && $data['avatar']):
                        ?>
                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100%">
                        <?php
                        else :
                        ?>
                            <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="" width="100%">
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class=" col-md-7">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">THÔNG TIN TÀI KHOẢN</h3>
                            </div>
                            <form action="/users/<?= $data['user_id'] ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="method" value="PUT" id="">
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" placeholder="Nhập tên đăng nhập" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $data['email'] ?>" placeholder="Nhập email" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Họ tên*</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $data['name'] ?>" placeholder="Nhập họ và tên" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại*</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['phone'] ?>" placeholder="Nhập số điện thoại" required>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Ảnh đại diện</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Chọn ảnh đại diện">
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Cập nhật</button>
                                <div class="mt-3">
                                <a href="/change-password" class="text-danger">Đổi mật khẩu</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
