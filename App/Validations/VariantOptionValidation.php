<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class VariantOptionValidation
{

    public static function create(){
        $is_valid = true;
        //tên biến thể
        if(!isset($_POST['name']) || $_POST['name'] ===''){
            NotificationHelper::error('name','Tên biến thể không được để trống');
            $is_valid = false;
        }
        //tên loại biến thể
        if(!isset($_POST['product_variant_id'])|| $_POST['product_variant_id']===''){
            NotificationHelper::error('product_variant_id','Tên loại biến thể không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function edit(){
        $is_valid = true;
        //tên biến thể
        if(!isset($_POST['name']) || $_POST['name'] ===''){
            NotificationHelper::error('name','Tên biến thể không được để trống');
            $is_valid = false;
        }
        //tên loại biến thể
        if(!isset($_POST['product_variant_id'])|| $_POST['product_variant_id']===''){
            NotificationHelper::error('product_variant_id','Tên loại biến thể không được để trống');
            $is_valid = false;
        }
        return $is_valid;   
    }
}