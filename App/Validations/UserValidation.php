<?php


namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {

        $is_valid = true;
        //Tên đăng nhập

        if (!isset($_POST['username']) || $_POST['username'] == '') {
            NotificationHelper::error('username', 'Tên đăng nhập không được để trống !');
            $is_valid = false;
        }
        //email

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        //ho va ten
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Họ và tên không được để trống');
            $is_valid = false;
        }
         // phone
         if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Số điện thoại không được để trống');
            $is_valid = false;
        }

        // bat loi trang thai
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Trạng thái không được để trống');
            $is_valid = false;
        }

        return $is_valid;
    }


    public static function edit(): bool
    {
        return self::create();
    }

    public static function uploadAvatar()
    {
        return AuthValidation::uploadAvatar();
    }
}
