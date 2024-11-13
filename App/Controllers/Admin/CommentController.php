<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class CommentController
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'name' => 'Comment 1',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Comment 2',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Comment 3',
                'status' => 0
            ],

        ];

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    // public static function create()
    // {
    //     Header::render();
    //     // hiển thị form thêm
    //     Create::render();
    //     Footer::render();
    // }


    // xử lý chức năng thêm
    public static function store()
    {
        echo 'Thực hiện lưu vào database';
    }


    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit()
    {
        // // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Comment 1',
        //     'status' => 1
        // ];
        // if ($data) {
        //     Header::render();
        //     // hiển thị form sửa
        //     Edit::render($data);
        //     Footer::render();
        // } else {
        //     header('location: /admin/categories');
        // }
        Header::render();
        // hiển thị form sửa
        Edit::render();
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật vào database';
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá';
    }
}
