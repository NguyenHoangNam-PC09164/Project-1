<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
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
                            <form action="/forgot-password" method="post">
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email" required>
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
