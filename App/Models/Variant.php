<?php

namespace App\Models;

class Variant extends BaseModel
{
    protected $table = 'product_variants';
    protected $id = 'id';

    public function getAllVariant()
    {
        return $this->getAll();
    }
    public function getOneVariant($id)
    {
        return $this->getOne($id);
    }

    public function createVariant($data)
    {
        return $this->create($data);
    }
    public function updateVariant($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteVariant($id)
    {
        return $this->delete($id);
    }
    public function getAllVariantByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneVariantByName($name)
    {
        return $this->getOneByName($name);
    }
    public function countTotalVariant(){
        return $this->countTotal();
    }
    
}
