<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\ResetPassword;


class AuthController
{
    // hiển thị giao diện register
    public static function register()
    {
        // hiển thị header
        Header::render();

        //hiển thị thông báo
        Notification::render();
        
        // hủy session thông báo
        NotificationHelper::unset();

        // hiển thị form đăng ký
        Register::render();

        // hiển thị footer
        Footer::render();
    }

    public static function registerAction(){

        $is_valid = AuthValidation::register();

        if(!$is_valid){
            NotificationHelper::error('register_valid','Đăng ký thất bại dd');
            header('Location: /register');
            exit();
        }
        
        // bắt lỗi username
       
        // lấy dữ liệu vào
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hash_password= password_hash($password, PASSWORD_DEFAULT);
        $email=$_POST['email'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        
        // đưa dữ liệu vào mảng và key phải trùng với cơ sở dữ liệu
        $data=[
            'username'=>$username,
            'password'=>$hash_password,
            'email'=>$email,
            'name'=>$name,
            'phone'=>$phone
        ];

        $result=AuthHelper::register($data);

        if($result){
            // var_dump('Thêm ok');
            header('Location: /login');
        }else{
            // var_dump('Thêm lỗi');
            header('Location: /register');
        }
    }
    // hiển thị giao diện login
    public static function login()
    {
        // hiển thị header
        Header::render();

        //hiển thị thông báo
        Notification::render();
        
        // hủy session thông báo
        NotificationHelper::unset();
        
        // hiển thị form đăng nhập
        Login::render();

        // hiển thị footer
        Footer::render();
    }
    public static function loginAction()
    {
        // bắt lỗi 
        $is_valid = AuthValidation::login();

        if(!$is_valid){
            NotificationHelper::error('login','Đăng nhập thất bại');
            header('Location: /login');
            exit();
        }
        
        // đưa dữ liệu vào mảng và key phải trùng với cơ sở dữ liệu
        $data=[
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
            'remember'=>isset($_POST['remember'])
        ];

        $result=AuthHelper::login($data);

        if($result){
            // var_dump('Thêm ok');
            NotificationHelper::success('login', 'Đăng nhập thành công');
            header('Location: /login');
            exit();
        }else{
            // var_dump('Thêm lỗi');
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
        }
    }

    public static function logout(){
        AuthHelper::logout();
        NotificationHelper::success('logout','Đăng xuất thành công');
        header('Location: /login');
    }

    public static function edit($id){
        $result=AuthHelper::edit($id);

        if(!$result){
            if(isset($_SESSION['error']['login'])){
                header('Location: /login');
                exit;
            }
            if(isset($_SESSION['error']['user_id'])){
                $data=$_SESSION['user'];
                $user_id=$data['user_id'];
                header("Location: /users/$user_id");
                exit;
            }

        }
        $data=$_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();

        //giao diện thông tin user

        Edit::render($data);
        // var_dump($data);
        Footer::render();
    }

    public static function update($id)
    {
        $is_valid=AuthValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật thông tin tài khoản thất bại');
            header("Location: /users/$id");
            exit;
        }
        $data=[
            'email'=>$_POST['email'],
            'name'=>$_POST['name'],
        ];
        // kiểm tra có upload hình ảnh không
        // nếu có kiểm tra xem có hợp lệ không  
        $is_upload=AuthValidation::uploadAvatar();  
        if($is_upload){
            $data['avatar']=$is_upload;
        }
        // goi helper de update
        $result=AuthHelper::update($id,$data);
        // kiem tra ket qua tra ve va chuyen huong
        if($result){
            header("Location: /users/$id");
        }
    }

    // hiển thị form đổi mật khẩu
    public static function changePassword(){
        $is_login= AuthHelper::checkLogin();

        if(!$is_login){
            NotificationHelper::error('login','Vui lòng đăng nhập để đổi mật khẩu');
            header('Location: /login');
            exit;
        }

        $data= $_SESSION['user'];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }

    // thực hiện đổi mật khẩu 
    public static function changePasswordAction(){
        // validation

        $is_valid = AuthValidation::changePassword();
        if(!$is_valid){
            NotificationHelper::error('change-password','Đổi mật khẩu thất bại');
            header('location: /change-password');
            exit;
        }

        $id = $_SESSION['user']['user_id'];

        $data= [
            'old_password'=>$_POST['old_password'],
            'new_password'=>$_POST['new_password']
        ];

        //  gọi authHelper

        $result=AuthHelper::changePassword($id,$data);
        header('Location: /change-password');
        exit;
    }

    // hiển thị giao diện form lấy lại mật khẩu
    public static function forgotPassword(){
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();

    }

    // thực hiện chức năng lấy lại mật khẩu
    public static function forgotPasswordAction(){
        // validation
        $is_valid=AuthValidation::forgotPassword();

        if(!$is_valid){
            NotificationHelper::error('forgot_password','Lấy lại mật khẩu thất bại');
            header('Location: /forgot-password');
            exit;
        }

        $username=$_POST['username'];
        $email=$_POST['email'];
        
        $data=[
            'username'=>$username
            
        ];

        
        $result = AuthHelper::forgotPassword($data);

        if(!$result){
            NotificationHelper::error('username_exist','Không tồn tại tài khoản này');
            header('location: /forgot-password');
            exit;
        }

        if($result['email']!=$email){
            NotificationHelper::error('email_exist','Email không đúng');
            header('location: /forgot-password');
            exit;
        }

        $_SESSION['reset_password']=[
            'username'=>$username,
            'email'=>$email
        ];

        header('location: /reset-password');

    }


    // hien thi form dat lai mat khau
    public static function resetPassword(){
        if(!isset($_SESSION['reset_password'])){
            NotificationHelper::error('reset_password','Vui lòng nhập đầy đủ thông tin');
            header('location: /forgot-password');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();

    }

    public static function resetPasswordAction(){
        //validation
        $is_valid=AuthValidation::resetPassword();

        if(!$is_valid){
            NotificationHelper::error('reset_password','Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            exit;
        }

        $password=$_POST['password'];
        $hash_password=password_hash($password, PASSWORD_DEFAULT);

        $data=[
            'username'=>$_SESSION['reset_password']['username'],
            'email'=>$_SESSION['reset_password']['email'],
            'password'=>$hash_password
        ];
        
        $result=AuthHelper::resetPassword($data);
        if($result){
            NotificationHelper::success('reset_password','Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
            exit;
        } else{
            NotificationHelper::error('reset_password','Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
        }
    }
}