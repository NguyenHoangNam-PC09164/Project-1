<?php

namespace App\Helpers;

use App\Models\User;
use App\Views\Client\Components\Notification;

class AuthHelper{

    public static function register($data){
        $user=new User();

        $is_exist=$user->getOneUserByUsername($data['username']);

        if($is_exist){
            NotificationHelper::error('exist_register','Tên đăng nhập đã tồn tại');
            return false;
        }   

        $result=$user->createUser($data);

        if ($result){
            NotificationHelper::success('register','Đăng ký thành công');
            return true;
        }
        NotificationHelper::error('register','Đăng ký thất bại');
        return false;
    }
    public static function login($data)
    {
        // kiểm tra có tồn tại username trong database
        $user = new User();
        // nếu không => thông báo trả về false
        $is_exist=$user->getOneUserByUsername($data['username']);
        if(!$is_exist){
            NotificationHelper::error('exist_username','Tên đăng nhập đã tồn tại');
            return false;
        }  

        if(!password_verify($data['password'],$is_exist['password'])){
            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }

        
        // nếu không thông báo trả về false
        // nếu có ktr status = 1 không
        if($is_exist['status']==0){
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }
        // nếu không thông báo, trả về false
        // nếu có kiểm tra remember => để lưu session hoặc cookie thông báo thành công  
        if($data['remember']){
            // luu cookie, luu session
            self::updateCookie($is_exist['user_id']);
            
        }else{
            //luu session
            self::updateSession($is_exist['user_id']);
        }
        NotificationHelper::success('login','Đăng nhập thành công');
        return true;
    }
    public static function updateCookie($id) {
        if (!is_int($id)) {
            return false; 
        }
    
        $user = new User();
        $result = $user->getOneUser($id);
    
        if ($result) {
            $user_data = json_encode($result);
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
            $_SESSION['user'] = $result;
        }
    }
    public static function updateSession($id){
        $user = new User();
        $result=$user->getOneUser($id);

        if($result){
            // luu session
            $_SESSION['user']=$result;
        }
    }
    public static function checkLogin() {
        return isset($_SESSION['user']);
        
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user, true);
    
            if (isset($user_data['id'])) {
                self::updateCookie($user_data['id']);
                return true;
            } else {
                setcookie('user', '', time() - 3600, '/'); 
            }
        }
    
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user']['id'])) {
                self::updateSession($_SESSION['user']['id']);
                return true;
            }
        }
    
        return false;
    }

    public static function logout(){
        
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        if(isset($_COOKIE['user'])){
            setcookie('user','',time() - 3600*24*30*12,'/');
        }
    }

    public static function edit($id): bool
    {
        if(!self::checkLogin()){
            NotificationHelper::error('login','Vui lòng đăng nhập để xem thông tin');
            return false;
        }

        $data=$_SESSION['user'];
        $user_id=$data['id'];

        if($user_id!=$id){
            NotificationHelper::error('user_id','Không có quyền xem thông tin tài khoản này');
            return false;
        }
        return true;
    }

    public static function update($id,$data){
        $user= new User();
        $result=$user->update($id,$data);

        if(!$result){
            NotificationHelper::error('update_user','Cập nhật thông tin tài khoản thất bại');
            return false;
        }

        if($_SESSION['user']){
            self::updateSession($id);
        }

        if($_COOKIE['user']){
            self::updateCookie($id);
        }
        NotificationHelper::success('upadte_user','Cập nhật thông tin tài khoản thành công');
        return true;
    }

    // public static function changePassword($id, $data){
         
    //     $user= new User();
    //     $result= $user->getOneUser($id);

    //     if(!$result){
    //         NotificationHelper::error('account','Tài khoản không tồn tại');
    //         return false;
    //     }
    //     // if(!$data['username']){
    //     //     NotificationHelper::error('username','Khong ton tai ten dang nhap');
    //     //     return false;
    //     // }
    //     // Kiểm tra mật khẩu cũ có trùng khớp với database
    //     if(!password_verify($data['old_password'],$result['password'])){
    //         NotificationHelper::error('password-verify','Mật khẩu cũ không chính xác');
    //         return false;
    //     }

    //     // Mã hóa mật khẩu trước khi lưu
    //     $hash_password= password_hash($data['new_password'],PASSWORD_DEFAULT );

    //     $data_update=[
    //         'password'=>$hash_password,
    //     ];

    //     $result_update=$user->updateUser($id,$data_update);

    //     if($result_update){
    //         if(isset($_COOKIE['user'])){
    //             self::updateCookie($id);
    //         }
    //         self::updateSession($id);

    //         NotificationHelper::success('change-password','Đổi mật khẩu thành công');
    //         return true;
    //     }
    //     else{
    //         NotificationHelper::error('change-password','Đổi mật khẩu thất bại');
    //         return false;
    //     }

    // }

    // public static function forgotPassword($data){
    //     $user= new User();

    //     $result=$user->getOneUserByUsername($data['username']);

    //     return $result;
    // }

    // public static function resetPassword($data){
    //     $user=new User();

    //     $result=$user->updateUserByUserAndEmail($data);

    //     return $result;
    // }

    public static function middleware(){

        $admin=explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin=$admin[1];

        if($admin=='admin'){
            if(!isset($_SESSION['user'])){
                NotificationHelper::error('admin','Vui lòng đăng nhập');
                header('location: /login');
                exit;
            }
            
            if($_SESSION['user']['role']!=1){
                NotificationHelper::error('admin','Tài khoản này không có quyền truy cập');
                header('location: /login');
                exit;
            }
        }
    }
}
