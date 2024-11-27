<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class VariantOptionValidation
{

    public static function create(){
        $is_valid = true;

        //tên loại biến thể
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Tên biến thể không được để trống');
            $is_valid = false;
        }

        //trang thai
        if(!isset($_POST['product_variant_id'])|| $_POST['variant_option_id']===''){
            NotificationHelper::error('product_variant_id','Loại biến thể không được để trống');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(){
        $is_valid = true;
        // Biến thể
        if(!isset($_POST['product_variant_id'])|| $_POST['variant_option_id']===''){
            NotificationHelper::error('variant_option_id','Loại biến thể không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }
}