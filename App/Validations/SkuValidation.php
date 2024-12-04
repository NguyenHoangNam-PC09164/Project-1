<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

    class SkuValidation
{

    public static function create()
    {
        $is_valid = true;

        //mã sản phẩm
        if (!isset($_POST['sku_name']) || $_POST['sku_name'] === '') {
            NotificationHelper::error('sku_name', 'Mã sản phẩm không được để trống');
            $is_valid = false;
        }


        //giá
        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Giá không được để trống');
            $is_valid = false;
        } elseif ((int) $_POST['price'] <= 0) {
            NotificationHelper::error('price', 'Giá phải lớn hơn 0');
            $is_valid = false;
        }
        //stock_quantity
        if (!isset($_POST['stock_quantity']) || $_POST['stock_quantity'] === '') {
            NotificationHelper::error('quantity', 'Số lượng tồn kho không được để trống');
            $is_valid = false;
        } elseif ((int) $_POST['stock_quantity'] <= 0) {
            NotificationHelper::error('stock_quantity', 'Số lượng phải lớn hơn 0');
            $is_valid = false;
        }

          //Biến thể sản phẩm
          if (!isset($_POST['variant_option_id']) || $_POST['variant_option_id'] === '') {
            NotificationHelper::error('variant_option_id', 'Biến thể sản phẩm không được để trống');
            $is_valid = false;
        }

        //id sản phẩm
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Id sản phẩm không được để trống');
            $is_valid = false;
        }
        return $is_valid;
    }
    
    public static function edit()
    {
        $is_valid = true;
         //giá
         if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Giá không được để trống');
            $is_valid = false;
        } elseif ((int) $_POST['price'] <= 0) {
            NotificationHelper::error('price', 'Giá phải lớn hơn 0');
            $is_valid = false;
        }
        //stock_quantity
        if (!isset($_POST['stock_quantity']) || $_POST['stock_quantity'] === '') {
            NotificationHelper::error('quantity', 'Số lượng tồn kho không được để trống');
            $is_valid = false;
        } elseif ((int) $_POST['stock_quantity'] <= 0) {
            NotificationHelper::error('stock_quantity', 'Số lượng phải lớn hơn 0');
            $is_valid = false;
        }
        return $is_valid;
    }
}
