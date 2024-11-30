<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class VariantValidation
{

    public static function create(){
        $is_valid = true;

        //tên loại biến thể
        if(!isset($_POST['name'])|| $_POST['name']===''){
            NotificationHelper::error('name','Tên loại biến thể không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function edit(){
        self::create();
    }
}