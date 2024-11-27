<?php

namespace App\Models;

class VariantOption extends BaseModel
{
    protected $table = 'product_variant_options';
    protected $id = 'id';

    public function getAllVariantOption()
    {
        return $this->getAll();
    }
    public function getOneVariantOption($id)
    {
        return $this->getOne($id);
    }

    public function createVariantOption($data)
    {
        return $this->create($data);
    }
    public function updateVariantOption($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteVariantOption($id)
    {
        return $this->delete($id);
    }
    public function getAllVariantOptionByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneVariantOptionByName($name)
    {
        return $this->getOneByName($name);
    }
    public function countTotalVariantOption(){
        return $this->countTotal();
    }
    
}
