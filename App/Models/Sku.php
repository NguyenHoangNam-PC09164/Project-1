<?php

namespace App\Models;

class Sku extends BaseModel
{
    protected $table = 'skus';
    protected $id = 'id';

    public function getAllSku()
    {
        return $this->getAll();
    }
    public function getOneSku($id)
    {
        return $this->getOne($id);
    }

    public function createSku($data)
    {
        return $this->create($data);
    }
    public function updateSku($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSku($id)
    {
        return $this->delete($id);
    }

    public function getOneSkuByName($sku_name)
    {
        return $this->getOneByName($sku_name);
    }

    // public function getSkuByProduct()
    // {
    //     $result = [];   
    //     try {
    //         $sql = "SELECT skus.*, product_variants.name as variant_name, product_variant_options.name as option_name FROM `skus` INNER JOIN product_variant_options ON skus.variant_option_id = product_variant_options.id INNER JOIN product_variants ON product_variant_options.product_variant_id = product_variants.id";
    //         $result = $this->_conn->MySQLi()->query($sql);
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } catch (\Throwable $th) {
    //         error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
    //         return $result;
    //     }
    // }

    public function getSkuByInnerJoinVariantAndVariantOption()
    {
        $result = [];
        try {
            $sql = "SELECT skus.*, products.name as product_name,
            product_variant_options.name as product_variant_option_name,
            product_variants.name as product_variant_name
            FROM `skus` INNER JOIN product_variant_options 
            ON skus.variant_option_id = product_variant_options.id 
            INNER JOIN products 
            ON skus.product_id = products.product_id
            INNER JOIN product_variants 
            ON product_variants.id = product_variant_options.product_variant_id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


}
