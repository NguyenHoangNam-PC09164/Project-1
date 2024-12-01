<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\SKu\Create;
use App\Views\Admin\Pages\SKu\Edit;
use App\Views\Admin\Pages\SKu\Index;
use App\Models\Sku;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantOption;
use App\Validations\SkuValidation;

class SkuController
{


    // hiển thị danh sách
    public static function index()
    {

        $sku = new Sku();

        $data = $sku->getSkuByInnerJoinVariantAndVariantOption();

        Header::render();
        // hiển thị giao diện danh sách
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    public static function create(){
        $product = new Product();
        $data_product = $product->getAllProduct();

        $variant= new Variant();
        $data_variant = $variant->getAllVariant();

        $variantOption= new VariantOption();
        $data_variant_option = $variantOption->getAllVariantOption();

        $data = [
            'product'=>$data_product,
            'variant'=>$data_variant,
            'variantOption'=>$data_variant_option,
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }


    public static function store(){
        $is_valid = SkuValidation::create();
    
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm biến thể sản phẩm thất bại');
            header('location: /admin/skus/create');
            exit;
        }
        
        $sku_name = $_POST['sku_name'];
        // $product_variant_id = $_POST['product_variant_id'];
        $product_id = $_POST['product_id'];
        $price = $_POST['price'];
        $variant_option_id = $_POST['variant_option_id'];
        $stock_quantity = $_POST['stock_quantity'];
        $skus = new Sku();
        $is_exist = $skus->getOneSkuByName($sku_name);
    
        if ($is_exist) {
            NotificationHelper::error('store', 'Mã biến thể sản phẩm đã tồn tại');
            header('location: /admin/skus');
            exit;
        }


        $data=[
            'sku_name'=>$sku_name,
            'product_id'=>$product_id,
            // 'product_variant_id'=>$product_variant_id,
            'prices'=>$price,
            'variant_option_id'=>$variant_option_id,
            'stock_quantity'=>$stock_quantity,
        ];
        $result = $skus->createSku($data);
        // var_dump($data);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('store', 'Thêm biến thể sản phẩm thành công');
            header('location: /admin/skus');
            exit;
        } else {
            NotificationHelper::error('store', 'Thêm biến thể sản phẩm thất bại');
            header('location: /admin/skus/create');
            exit;
        }

    }

    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $sku=new Sku();
        $data_sku=$sku->getOneSku($id);

        $product_variant = new Variant();
        $data_variant = $product_variant->getAllVariant();

        $product_variant_option = new VariantOption();
        $data_variant_option = $product_variant_option->getAllVariantOption();

        $product = new Product();
        $data_product = $product->getAllProduct($id);
        
        if (!$data_sku) {
            NotificationHelper::error('edit','Biến thể không tồn tại');
            header('location: /admin/skus');
            exit;
        }

        $data =[
            'data_sku'=>$data_sku,
            'data_variant' =>$data_variant,
            'data_variant_option'=>$data_variant_option,
            'data_product'=>$data_product
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
        $is_valid= SkuValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật biến thể thất bại');
            header("location: /admin/skus/$id");
            exit;
        }
        $sku_name = $_POST['sku'];
        $price = $_POST['price'];
        $stock_quantity = $_POST['stock_quantity'];
        // kiểm tra tên có tồn tại chưa => không được trùng tên
        $sku=new Sku();
        $is_exist=$sku->getOneSkuByName($sku_name);

        if($is_exist){
            if($is_exist['id']!=$id){
                NotificationHelper::error('update','Mã sản phẩm đã tồn tại');
                header("location: /admin/skus/$id");
                exit;
            }
        }

        // thực hiện cập nhật vào csdl
        $data=[
            'prices'=>$price,
            'stock_quantity'=>$stock_quantity,
        ];

        $result= $sku->updateSku($id,$data);
        // var_dump($result);

        if($result){
            NotificationHelper::success('update','Cập nhật biến thể thành công');
            header('location: /admin/skus');
            exit;
        } else{
            NotificationHelper::error('update','Cập nhật biến thể thất bại');
            header("location: /admin/skus/$id");
            exit;
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $sku= new Sku();

        $result=$sku->deleteSku($id);

        if($result){
            NotificationHelper::success('delete','Xóa biến thể thành công');
        } else{
            NotificationHelper::error('delete','Xóa biến thể thất bại');
        }
        header('location: /admin/skus');
    }

   
}
