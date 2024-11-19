<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{

    public static function create(){
        $is_valid = true;

        //tên loại
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Tên loại không được để trống');
            $is_valid = false;
        }

        //giá
        if(!isset($_POST['price'])|| $_POST['price']===''){
            NotificationHelper::error('price','Giá không được để trống');
            $is_valid = false;
        } elseif((int) $_POST['price']<=0){
            NotificationHelper::error('price','Giá phải lớn hơn 0');
            $is_valid = false;
        }

        //giá giảm
        if(!isset($_POST['discount_price'])|| $_POST['discount_price']===''){
            NotificationHelper::error('discount_price','Giá giảm không được để trống');
            $is_valid = false;
        } elseif((int) $_POST['discount_price']<0){
            NotificationHelper::error('discount_price','Giá giảm phải lớn hơn 0 hoặc bằng 0');
            $is_valid = false;
        }else if((int) $_POST['discount_price']>(int) $_POST['price']){
            NotificationHelper::error('discount_price','Giá giảm phải nhỏ hơn giá sản phẩm');
            $is_valid=false;
        }

        // Loại sản phẩm
        if(!isset($_POST['category_id'])|| $_POST['category_id']===''){
            NotificationHelper::error('category_id','Loại sản phẩm không được để trống');
            $is_valid = false;
        }

        // Nổi bật
        if(!isset($_POST['is_feature'])|| $_POST['is_feature']===''){
            NotificationHelper::error('is_feature','Nổi bật không được để trống');
            $is_valid = false;
        }
        
        // Trạng thái
        if(!isset($_POST['status'])|| $_POST['status']===''){
            NotificationHelper::error('status','Trạng thái không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function edit(){
        return self::create();
    }

    public static function uploadImage(){
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            return false;
        }
        // noi luu tru hinh anh
        $target_dir='public/uploads/products/';

        // kiem tra file anh co hop le khong
        $imageFileType=strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
            NotificationHelper::error('type_upload','Chỉ nhận file ảnh JPG PNG JPEG GIF');
            return false;
        }
        
        // thay doi ten file thanh dang nam thang ngay gio phut giay
        $nameImage=date('YmdHmi').'.'.$imageFileType;

        // duong dan day du de di chuyen file
        $target_file= $target_dir.$nameImage;

        if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload','Không thể tải ảnh vào thư mục lưu trữ');
            return false;
        }
        return $nameImage;
    }
}