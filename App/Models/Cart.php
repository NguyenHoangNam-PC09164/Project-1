<?php

namespace App\Models;

class Cart extends BaseModel
{
    protected $table = 'carts';
    protected $id = 'id';

    public function getAllCart()
    {
        return $this->getAll();
    }
    public function getOneCart($id)
    {
        return $this->getOne($id);
    }

    public function createCart($data)
    {
        return $this->create($data);
    }
    public function updateCart($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCart($id)
    {
        return $this->delete($id);
    }
   
}
