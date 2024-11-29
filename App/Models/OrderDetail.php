<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class OrderDetail extends BaseModel
{
    protected $table = 'order_details';
    protected $id = 'id';

    public function getAllOrderDetail()
    {
        return $this->getAll();
    }
    public function getOneOrderDetail($id)
    {
        return $this->getOne($id);
    }

    public function createOrderDetail($data)
    {
        return $this->create($data);
    }
    public function updateOrderDetail($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOrderDetail($id)
    {
        return $this->delete($id);
    }
    public function getAllOrderDetailByStatus()
    {
        return $this->getAllByStatus();
    }
}
