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
   
    public function getAllByUser(int $id)
    {
        try {
            $sql = "SELECT * FROM `orders` WHERE orders.user_id =?";
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
    public function getLatestOrderIdByUser(int $user_id)
    {
        try {
            $sql = "SELECT MAX(id) as latest_order_id FROM `orders` WHERE user_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            return $row['latest_order_id'] ?? null;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy ID đơn hàng mới nhất: ' . $th->getMessage());
            return null;
        }
    }
    public function updatePaymentStatus($order_id, $status)
    {
        try {
            $sql = "UPDATE `orders` SET payment_status = ? WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $status, $order_id);
            $stmt->execute();

            return $stmt->affected_rows > 0; // Trả về true nếu cập nhật thành công
        } catch (\Throwable $th) {
            error_log('Lỗi cập nhật trạng thái thanh toán: ' . $th->getMessage());
            return false;
        }
    }
}
