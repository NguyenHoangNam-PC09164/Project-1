<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\OrderDetail;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Shop\OrderView;

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
}
