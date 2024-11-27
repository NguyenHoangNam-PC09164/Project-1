<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\VariantOption;
use App\Validations\VariantOptionValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Variant\Create;
use App\Views\Admin\Pages\Variant\Edit;
use App\Views\Admin\Pages\Variant\Index;

class VariantOptionController
{


    // hiển thị danh sách
    public static function index()
    {

        $variantOption = new VariantOption();

        $data = $variantOption->getAll();

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
        $is_valid= VariantOptionValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store','Thêm biến thể thất bại');
            header('location: /admin/variant_options/create');
            exit;
        }

        $name = $_POST['name'];
        $product_variant_id=$_POST['product_variant_id'];
        // kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $variant=new VariantOption();
        $is_exist=$variant->getOneVariantOptionByName($name);

        if($is_exist){
            NotificationHelper::error('store','Tên biến thể đã tồn tại');
            header('location: /admin/variant_options/create');
            exit;
        }

        // thực hiện thêm vào csdl
        $data=[
            'name'=>$name,
            'product_variant_id'=>$product_variant_id
        ];

        $result= $variant->createVariantOption($data);

        if($result){
            NotificationHelper::success('store','Thêm biến thể sản phẩm thành công');
            header('location: /admin/variant_options');
            exit;
        } else{
            NotificationHelper::error('store','Thêm biến thể thất bại');
            header('location: /admin/variant_options/create');
            exit;
        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Variant 1',
        //     'status' => 1
        // ];

        $variant=new VariantOption();

        $data=$variant->getOneVariantOption($id);
        
        if (!$data) {
            NotificationHelper::error('edit','Biến thể sản phẩm không tồn tại');
            header('location: /admin/variant_options');
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
        $is_valid= VariantOptionValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật biến thể sản phẩm thất bại');
            header("location: /admin/variant_options/$id");
            exit;
        }

        $name = $_POST['name'];
        $variant_option_id=$_POST['variant_option_id'];
        // kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $variant=new VariantOption();
        $is_exist=$variant->getOneVariantOptionByName($name);

        if($is_exist){
            if($is_exist['id']!=$id){
                NotificationHelper::error('update','Tên biến thể đã tồn tại');
                header("location: /admin/variant_options/$id");
                exit;
            }
        }

        // thực hiện cập nhật vào csdl
        $data=[
            'name'=>$name,
            'status'=>$variant_option_id
        ];

        $result= $variant->updateVariantOption($id,$data);

        if($result){
            NotificationHelper::success('update','Cập nhật biến thể thành công');
            header('location: /admin/variant_options');
            exit;
        } else{
            NotificationHelper::error('update','Cập nhật biến thể thất bại');
            header("location: /admin/variant_options/$id");
            exit;
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $variant= new VariantOption();

        $result=$variant->deleteVariantOption($id);

        if($result){
            NotificationHelper::success('delete','Xóa biến thể thành công');
        } else{
            NotificationHelper::error('delete','Xóa biến thể thất bại');
        }
        header('location: /admin/variant_options');
    }
}
