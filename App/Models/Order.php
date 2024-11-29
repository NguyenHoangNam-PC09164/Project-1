<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllOrder()
    {
        return $this->getAll();
    }
    public function getOneOrder($id)
    {
        return $this->getOne($id);
    }

    public function createOrder($data)
    {
        return $this->create($data);
    }
    public function updateOrder($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->delete($id);
    }
    public function getAllOrderByStatus()
    {
        return $this->getAllByStatus();
    }
}
