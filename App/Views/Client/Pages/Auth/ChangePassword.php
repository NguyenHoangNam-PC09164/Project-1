<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{

    public static function render($data = null)
    {

?>
        <div class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-3">
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
                                <h3 class="title">ĐỔI MẬT KHẨU</h3>
                            </div>
                        <form action="/change-password" method="post">
                            <input type="hidden" name="method" value="PUT" id="">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?=$data['username']?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Mật khẩu cũ*</label>
                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Nhập mật khẩu cũ" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới*</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu mới*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
