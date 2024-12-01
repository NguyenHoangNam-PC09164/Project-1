<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Variant;
use App\Validations\VariantValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Variant\Create;
use App\Views\Admin\Pages\Variant\Edit;
use App\Views\Admin\Pages\Variant\Index;

class VariantController
{


    // hiển thị danh sách
    public static function index()
    {

        $variant = new Variant();

        $data = $variant->getAll();

        Header::render();
        // hiển thị giao diện danh sách
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        // hiển thị form thêm
        Notification::render();
        NotificationHelper::unset();
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation
        $is_valid= VariantValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store','Thêm loại biến thể thất bại');
            header('location: /admin/variants/create');
            exit;
        }

        $name = $_POST['name'];
        // kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $variant=new Variant();
        $is_exist=$variant->getOneVariantByName($name);

        if($is_exist){
            NotificationHelper::error('store','Tên loại biến thể đã tồn tại');
            header('location: /admin/variants/create');
            exit;
        }

        // thực hiện thêm vào csdl
        $data=[
            'name'=>$name,
        ];

        $result= $variant->createVariant($data);

        if($result){
            NotificationHelper::success('store','Thêm loại biến thể thành công');
            header('location: /admin/variants');
            exit;
        } else{
            NotificationHelper::error('store','Thêm loại biến thể thất bại');
            header('location: /admin/variants/create');
            exit;
        }
    }



    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $variant=new Variant();

        $data=$variant->getOneVariant($id);
        
        if (!$data) {
            NotificationHelper::error('edit','loại biến thể không tồn tại');
            header('location: /admin/variants');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';
        // validation
        $is_valid= VariantValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật loại biến thể thất bại');
            header("location: /admin/variants/$id");
            exit;
        }

        $name = $_POST['name'];
        // kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $variant=new Variant();
        $is_exist=$variant->getOneVariantByName($name);

        if($is_exist){
            if($is_exist['id']!=$id){
                NotificationHelper::error('update','Tên loại biến thể đã tồn tại');
                header("location: /admin/variants/$id");
                exit;
            }
        }

        // thực hiện cập nhật vào csdl
        $data=[
            'name'=>$name,
        ];

        $result= $variant->updateVariant($id,$data);

        if($result){
            NotificationHelper::success('update','Cập nhật loại biến thể thành công');
            header('location: /admin/variants');
            exit;
        } else{
            NotificationHelper::error('update','Cập nhật loại biến thể thất bại');
            header("location: /admin/variants/$id");
            exit;
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $variant= new Variant();

        $result=$variant->deleteVariant($id);

        if($result){
            NotificationHelper::success('delete','Xóa loại biến thể thành công');
        } else{
            NotificationHelper::error('delete','Xóa loại biến thể thất bại');
        }
        header('location: /admin/variants');
    }
}
