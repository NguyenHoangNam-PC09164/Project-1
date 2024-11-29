<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class OrderValidation{
    public static function create():bool
    {
        $is_valid = true;

        //tên đăng nhập
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Tên không được để trống');
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
                NotificationHelper::error('email','email không đúng định dạng');
                $is_valid=false;
            }
        }

        // họ tên
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Họ tên không được để trống');
            $is_valid = false;
        }

        if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Số điện thoại không được để trống');
            $is_valid = false;
        } else {
            // Kiểm tra nếu số điện thoại chỉ gồm 10 chữ số
            if (!preg_match('/^\d{10}$/', $_POST['phone'])) {
                NotificationHelper::error('phone', 'Số điện thoại phải là 10 chữ số');
                $is_valid = false;
            }
        }
        if(!isset($_POST['address'])|| $_POST['address']===''){
            NotificationHelper::error('address','Địa chỉ không được để trống');
            $is_valid = false;
        }       
        return $is_valid;
    }
}