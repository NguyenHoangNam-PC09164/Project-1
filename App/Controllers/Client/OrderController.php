<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Validations\OrderValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Shop\Checkout;


class OrderController
{
    // hiển thị giao diện register
    public static function checkout()
    {
        if (!isset($_SESSION['user'])) {
            // Chuyển hướng tới trang đăng nhập
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }
        // Đọc dữ liệu giỏ hàng từ cookie
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Truyền dữ liệu giỏ hàng vào view
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Checkout::render(['cart' => $cart]);
        Footer::render();
    }


    public static function checkoutAction() {
        // Validate dữ liệu từ form
        $is_valid = OrderValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thanh toán thất bại. Vui lòng kiểm tra lại thông tin.');
            header('Location: /checkout');
            exit();
        }
    
        // Lấy thông tin từ form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $user_id = $_SESSION['user']['user_id'];
        $payment_status = $_POST['payment_status']; // Lấy trạng thái thanh toán (0 hoặc 1)
    
        // Tạo đối tượng Order
        $order = new Order();
    
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'user_id' => $user_id,
            'payment_status' => $payment_status, // Lưu trạng thái thanh toán
        ];
    
        $order_id = $order->createOrder($data);
    
        if ($order_id) {
            $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
            if (empty($cart)) {
                NotificationHelper::error('store', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ.');
                header('Location: /checkout');
                exit();
            }
    
            $order_detail = new OrderDetail();
    
            foreach ($cart as $item) {
                $order_detail_data = [
                    'order_id' => $order_id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['total_price']
                ];
    
                $result = $order_detail->createOrderDetail($order_detail_data);
    
                if (!$result) {
                    NotificationHelper::error('store', 'Có lỗi xảy ra khi thêm chi tiết đơn hàng.');
                    header('Location: /checkout');
                    exit();
                }
            }
    
            setcookie('cart', '', time() - 3600, '/'); // Xóa giỏ hàng sau khi hoàn tất
            NotificationHelper::success('store', 'Đơn hàng đã được tạo thành công!');
            header('Location: /checkout');
            exit();
        } else {
            NotificationHelper::error('store', 'Có lỗi xảy ra khi thêm đơn hàng. Vui lòng thử lại.');
            header('Location: /checkout');
            exit();
        }
    }
    
    
 
}