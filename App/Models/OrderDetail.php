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
    public function getOrderByUser(int $id)
    {
        try {
            $sql = "SELECT p.image, p.name, od.quantity, (od.price * od.quantity) as price, 
                       o.order_date, o.payment_status , od.id
                FROM `order_details` AS od
                INNER JOIN products AS p ON od.product_id = p.product_id
                INNER JOIN orders AS o ON od.order_id = o.id
                WHERE o.user_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy dữ liệu đơn hàng: ' . $th->getMessage());
            return [];
        }
    }
   
}
