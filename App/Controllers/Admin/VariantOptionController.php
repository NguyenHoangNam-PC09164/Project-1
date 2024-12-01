<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Variant;
use App\Models\VariantOption;
use App\Validations\VariantOptionValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\VariantOption\Create;
use App\Views\Admin\Pages\VariantOption\Edit;
use App\Views\Admin\Pages\VariantOption\Index;

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
        $variant = new Variant();
        $data = $variant->getAllVariant();
        Header::render();
        // hiển thị form thêm
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation
        $is_valid = VariantOptionValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
            header('location: /admin/variant_options/create');
            exit;
        }

        $name = $_POST['name'];
        $product_variant_id = $_POST['product_variant_id'];
        // kiểm tra tên có tồn tại chưa => không được trùng tên
        $variantOption = new VariantOption();
        $is_exist = $variantOption->getOneVariantOptionByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên biến thể đã tồn tại');
            header('location: /admin/variant_options/create');
            exit;
        }

        // thực hiện thêm vào csdl
        $data = [
            'name' => $name,
            'product_variant_id' => $product_variant_id
        ];
        $variantOption = new VariantOption();
        $is_exist = $variantOption->getOneVariantOptionByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên biến thể đã tồn tại');
            header('location: /admin/variant_options/create');
            exit;
        }
        $result = $variantOption->createVariantOption($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm biến thể thành công');
            header('location: /admin/variant_options');
            exit;
        } else {
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
            header('location: /admin/variant_options/create');
            exit;
        }
    }



    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $variantOption = new VariantOption();

        $data_variant_option = $variantOption->getOneVariantOption($id);

        $variant = new Variant();
        $data_variant = $variant->getAllVariant();

        if (!$data_variant_option) {
            NotificationHelper::error('edit', 'Biến thể không tồn tại');
            header('location: /admin/variant_options');
            exit;
        }        

        $data = [
            'variant_option' => $data_variant_option,
            'variant' => $data_variant,
        ];
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
        $is_valid = VariantOptionValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
            header("location: /admin/variant_options/$id");
            exit;
        }

        $name = $_POST['name'];
        $product_variant_id = $_POST['product_variant_id'];
        // kiểm tra tên có tồn tại chưa => không được trùng tên
        $variantOption = new VariantOption();
        $is_exist = $variantOption->getOneVariantOptionByName($name);
        
        if ($is_exist) {
            NotificationHelper::error('update', 'Tên biến thể đã tồn tại');
            header("location: /admin/variant_options/$id");
            exit;
        }

        // thực hiện cập nhật vào csdl
        $data = [
            'name' => $name,
            'product_variant_id' => $product_variant_id
        ];

        $result = $variantOption->updateVariantOption($id, $data);
        // var_dump($result);
        // var_dump($_POST);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật biến thể thành công');
            header('location: /admin/variant_options');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
            header("location: /admin/variant_options/$id");
            exit;
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $variantOption = new VariantOption();

        $result = $variantOption->deleteVariantOption($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xóa biến thể thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa biến thể thất bại');
        }
        header('location: /admin/variant_options');
    }
}
