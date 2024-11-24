<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation{
    public static function register():bool
    {
        $is_valid = true;

        //tên đăng nhập
        if(!isset($_POST['username'])|| $_POST['username']===''){
            NotificationHelper::error('username','Tên đăng nhập không được để trống');
            $is_valid = false;
        }

        // mật khẩu
        if(!isset($_POST['password'])|| $_POST['password']===''){
            NotificationHelper::error('password','Mật khẩu không được để trống');
            $is_valid = false;
        }
        else{
            if(strlen($_POST['password'])<3){
            NotificationHelper::error('password','Mật khẩu phải nhiều hơn 3 ký tự');
            $is_valid = false;
            }
        }

        // nhập lại mật khẩu
        if(!isset($_POST['re_password'])|| $_POST['re_password']===''){
            NotificationHelper::error('re_password','Mật khẩu không được để trống');
            $is_valid = false;
        }else{
            if($_POST['re_password']!=$_POST['password']){
            NotificationHelper::error('re_password','Mật khẩu nhập lại không đúng');
            $is_valid = false;
            }
        }

        // email
        if(!isset($_POST['email'])|| $_POST['email']===''){
            NotificationHelper::error('email','Email không được để trống');
            $is_valid = false;
        }else{
            // kiểm tra email đúng định dạng không
            $emailPatten="/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/";
            if(!preg_match($emailPatten,$_POST['email'])){
                NotificationHelper::error('email','email không đúng định dạng');
                $is_valid=false;
            }
        }

        // họ tên
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Họ tên không được để trống');
            $is_valid = false;
        }

        if(!isset($_POST['phone'])|| $_POST['phone']===''){
            NotificationHelper::error('phone','Số điện không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }
    public static function login():bool
    {
        $is_valid = true;

        //tên đăng nhập
        if(!isset($_POST['username'])|| $_POST['username']===''){
            NotificationHelper::error('username','Tên đăng nhập không được để trống');
            $is_valid = false;
        }

        // mật khẩu
        if(!isset($_POST['password'])|| $_POST['password']===''){
            NotificationHelper::error('password','Mật khẩu không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }
    public static function edit():bool {
        $is_valid = true;

        // email
        if(!isset($_POST['email'])|| $_POST['email']===''){
            NotificationHelper::error('email','Email không được để trống');
            $is_valid = false;
        }else{
            // kiểm tra email đúng định dạng không
            $emailPatten="/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/";
            if(!preg_match($emailPatten,$_POST['email'])){
                NotificationHelper::error('email','email không đúng định dạng');
                $is_valid=false;
            }
        }

        // họ tên
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Họ tên không được để trống');
            $is_valid = false;
        }

        if(!isset($_POST['phone'])|| $_POST['phone']===''){
            NotificationHelper::error('phone','Số điện không được để trống');
            $is_valid = false;
        }

        
        return $is_valid;
    }
    public static function uploadAvatar(){
        if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])){
            return false;
        }
        // noi luu tru hinh anh
        $target_dir='public/uploads/users/';

        // kiem tra file anh co hop le khong
        $imageFileType=strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
            NotificationHelper::error('type_upload','Chỉ nhận file ảnh JPG PNG JPEG GIF');
            return false;
        }
        
        // thay doi ten file thanh dang nam thang ngay gio phut giay
        $nameImage=date('YmdHmi').'.'.$imageFileType;

        // duong dan day du de di chuyen file
        $target_file= $target_dir.$nameImage;

        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload','Không thể tải ảnh vào thư mục lưu trữ');
            return false;
        }
        return $nameImage;
    }
    public static function changePassword():bool
    {
        $is_valid = true;

        // mật khẩu cũ
        if(!isset($_POST['old_password'])|| $_POST['old_password']===''){
            NotificationHelper::error('old_password','Mật khẩu cũ không được để trống');
            $is_valid = false;
        }
        
        // mật khẩu mới
        if(!isset($_POST['new_password'])|| $_POST['new_password']===''){
            NotificationHelper::error('new_password','Mật khẩu mới không được để trống');
            $is_valid = false;
        }
        else{
            // kiểm tra độ dài 
            if(strlen($_POST['new_password'])<3){
            NotificationHelper::error('new_password','Mật khẩu mới phải nhiều hơn 3 ký tự');
            $is_valid = false;
            }
        }

        // nhập lại mật khẩu
        if(!isset($_POST['re_password'])|| $_POST['re_password']===''){
            NotificationHelper::error('re_password','Mật khẩu mới không được để trống');
            $is_valid = false;
        }else{
            if($_POST['new_password']!=$_POST['re_password']){
            NotificationHelper::error('re_password','Mật khẩu mới nhập lại không đúng');
            $is_valid = false;
            }
        }

        return $is_valid;
    }


    public static function forgotPassword()
    {
        $is_valid = true;

        //tên đăng nhập
        if(!isset($_POST['username'])|| $_POST['username']===''){
            NotificationHelper::error('username','Tên đăng nhập không được để trống');
            $is_valid = false;
        }
        // email
        if(!isset($_POST['email'])|| $_POST['email']===''){
            NotificationHelper::error('email','Email không được để trống');
            $is_valid = false;
        }else{
            // kiểm tra email đúng định dạng không
            $emailPatten="/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/";
            if(!preg_match($emailPatten,$_POST['email'])){
                NotificationHelper::error('email','Email không đúng định dạng');
                $is_valid=false;
            }
        }
        return $is_valid;
    }

    public static function resetPassword():bool
    {
        $is_valid = true;

        // mật khẩu
        if(!isset($_POST['password'])|| $_POST['password']===''){
            NotificationHelper::error('password','Mật khẩu không được để trống');
            $is_valid = false;
        }
        else{
            if(strlen($_POST['password'])<3){
            NotificationHelper::error('password','Mật khẩu phải nhiều hơn 3 ký tự');
            $is_valid = false;
            }
        }

        // nhập lại mật khẩu
        if(!isset($_POST['re_password'])|| $_POST['re_password']===''){
            NotificationHelper::error('re_password','Mật khẩu không được để trống');
            $is_valid = false;
        }else{
            if($_POST['re_password']!=$_POST['password']){
            NotificationHelper::error('re_password','Mật khẩu nhập lại không đúng');
            $is_valid = false;
            }
        }
        
        return $is_valid;
    }
}