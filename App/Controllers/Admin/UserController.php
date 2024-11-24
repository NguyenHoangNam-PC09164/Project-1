<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }

 

    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {


        $user = new User();
        $data = $user->getOneUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem người dùng này');
            header('location: /admin/users');
            exit;
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //Validation cac truong du lieu
        $is_valid = UserValidation::edit();
        if (!$is_valid) {

            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit;
        }
        $user = new User();
        //      //thuc hien them cap nhat
        $data = [
            'status' => $_POST['status'],
            'role' => $_POST['role'],
        ];

       

      
        $result = $user->updateUser($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật người dùng thành công');
            header('location: /admin/users');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $user=new User();
        $result=$user->deleteUser($id);

        // var_dump($result);
        if($result) {
            NotificationHelper::success('delete', 'Xoá người dùng thành công');
            header('location: /admin/users');
        } else{
            NotificationHelper::error('delete', 'Xoá người dùng thất bại');
            header('location: /admin/users');
        }
    }
}
