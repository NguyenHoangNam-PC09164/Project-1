<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{

    public static function render($data = null)
    {

?>
        <div class="section">
            <div class="container mt-5">
                <div class="row">

                    <div class=" col-md-6 col-md-offset-3">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">ĐỔI MẬT KHẨU</h3>
                            </div>
                            <form action="/reset-password" method="post">
                                <input type="hidden" name="method" id="" value="PUT">
                                <div class="form-group">
                                    <label for="password">Mật khẩu*</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="form-group">
                                    <label for="re_password">Nhập lại mật khẩu*</label>
                                    <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" required>
                                </div>

                                
                                <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
