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
        $user_id = $_SESSION['user']['user_id']; // Lấy user_id từ session
    
        // Tạo đối tượng Order
        $order = new Order();
    
        // Dữ liệu để thêm vào cơ sở dữ liệu
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'user_id' => $user_id,
        ];
    
        // Thêm đơn hàng vào cơ sở dữ liệu và lấy ID
        $order_id = $order->createOrder($data);
    
        // Kiểm tra xem đơn hàng đã được tạo thành công
        if ($order_id) {
            // Giả sử createOrder trả về ID của đơn hàng vừa tạo
    
            // Lấy thông tin giỏ hàng từ cookie (giải mã JSON nếu cần)
            $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
            
            if (empty($cart)) {
                NotificationHelper::error('store', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ.');
                header('Location: /checkout');
                exit();
            }
    
            // Tạo đối tượng OrderDetail để thêm chi tiết đơn hàng
            $order_detail = new OrderDetail();
    
            // Duyệt qua từng sản phẩm trong giỏ hàng để thêm vào bảng order_details
            foreach ($cart as $item) {
                // Dữ liệu để thêm vào bảng order_details
                $order_detail_data = [
                    'order_id' => $order_id,       // Liên kết với order vừa tạo
                    'product_id' => $item['id'],   // ID sản phẩm
                    'quantity' => $item['quantity'],
                    'price' => $item['total_price']
                ];
    
                // Thêm chi tiết đơn hàng vào cơ sở dữ liệu
                $result = $order_detail->createOrderDetail($order_detail_data);
    
                // Kiểm tra kết quả khi thêm chi tiết đơn hàng
                if (!$result) {
                    // Nếu có lỗi khi tạo order detail
                    NotificationHelper::error('store', 'Có lỗi xảy ra khi thêm chi tiết đơn hàng.');
                    header('Location: /checkout');
                    exit();
                }
            }
    
            // Xóa giỏ hàng trong cookie sau khi đặt hàng thành công
            setcookie('cart', '', time() - 3600, '/');  // Xóa cookie giỏ hàng
    
            // Thông báo thành công và điều hướng người dùng
            NotificationHelper::success('store', 'Đơn hàng đã được tạo thành công!');
            header('Location: /checkout');
            exit();
        } else {
            // Nếu có lỗi khi tạo đơn hàng
            NotificationHelper::error('store', 'Có lỗi xảy ra khi thêm đơn hàng. Vui lòng thử lại.');
            header('Location: /checkout');
            exit();
        }
    }
 
}