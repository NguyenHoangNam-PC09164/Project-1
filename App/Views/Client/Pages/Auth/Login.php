<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center text-danger mb-4">Đăng Nhập</h4>
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập*</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" checked>
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>

                        <div class=" justify-content-center">
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đăng nhập</button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="/forgot-password" class="text-danger">Quên mật khẩu?</a>
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
