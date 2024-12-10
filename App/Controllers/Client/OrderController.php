<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Shop\OrderView;
use App\Views\Client\Pages\Shop\OrderDetails;
class OrderController
{
    public static function order()
    {
        if (!isset($_SESSION['user'])) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }

        $user_id = $_SESSION['user']['user_id'];
        $orderDetail = new OrderDetail();
        
        $orders = $orderDetail->getOrderByUser($user_id);
        
        // Truyền dữ liệu vào view
        Header::render();
        OrderView::render(['orders' => $orders]);
        Footer::render();
    }
    public static function orderDetail($id)
    {
        if (!isset($_SESSION['user'])) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }
        $orderDetail = new OrderDetail();
        
        $orders = $orderDetail->getOrderDetailByOrder($id);
        
        // Truyền dữ liệu vào view
        Header::render();
        OrderDetails::render($orders);
        Footer::render();
    }
    public static function orderAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paymentStatus = intval($_POST['payment_status']);
            $orderId = intval($_POST['order_id']);

            if ($paymentStatus === 1 && $orderId > 0) {
                $orderModel = new Order();
                $updateSuccess = $orderModel->updatePaymentStatus($orderId, $paymentStatus);

                if ($updateSuccess) {
                    header('Location: /order'); 
                    exit;
                } else {
                    echo 'Lỗi: Không thể cập nhật trạng thái thanh toán!';
                }
            } else {
                echo 'Thông tin không hợp lệ!';
            }
        } else {
            http_response_code(405);
            echo 'Phương thức không được hỗ trợ!';
        }
    }
}
