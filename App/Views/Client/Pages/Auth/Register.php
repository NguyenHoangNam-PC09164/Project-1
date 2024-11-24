<?php

namespace App\Views\Client\Pages\Auth;

class Register{
    public static function render($data = null)
    {

?>

<div class="container form-container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default form-panel">
                <div class="panel-heading form-heading">
                    <h4 class="text-center text-danger">Đăng ký</h4>
                </div>
                <div class="panel-body form-body">
                    <p class="text-center register-text">Đã có tài khoản, đăng nhập <a href="/login" class="text-primary">tại đây</a></p>
                    
                    <form action="/register" method="post">
                        <input type="hidden" name="method" value="POST">
                        
                        <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu*</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" >
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" >
                            </div>
                            <div class="form-group">
                                <label for="name">Họ tên*</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại*</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" >
                            </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" checked> Ghi nhớ đăng nhập
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block form-submit-btn">Đăng ký</button>

                        <div class="text-center forgot-password">
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