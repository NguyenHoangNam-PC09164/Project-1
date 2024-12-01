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
use App\Helpers\AuthHelper;

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


    public static function checkoutAction()
{
    // Kiểm tra tính hợp lệ của dữ liệu đơn hàng
    $is_valid = OrderValidation::create();
    if (!$is_valid) {
        NotificationHelper::error('store', 'Thanh toán thất bại. Vui lòng kiểm tra lại thông tin.');
        header('Location: /checkout');
        exit();
    }

    // Lấy thông tin từ form (ví dụ: tên, email, điện thoại, địa chỉ)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_status = $_POST['payment_status'];
    $user_id = $_SESSION['user']['user_id']; // ID người dùng hiện tại

    // Kiểm tra giỏ hàng từ cookie
    if (!isset($_COOKIE['cart']) || empty($_COOKIE['cart'])) {
        NotificationHelper::error('store', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ.');
        header('Location: /checkout');
        exit();
    }

    // Giải mã giỏ hàng từ cookie
    $cart = json_decode($_COOKIE['cart'], true);
    $total_price = 0;
    $order_details = '';

    // Tạo đơn hàng mới
    $order = new Order();
    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'user_id' => $user_id,
        'payment_status' => $payment_status,
    ];
    
    // Lưu thông tin đơn hàng vào cơ sở dữ liệu và lấy ID của đơn hàng
    $order_id = $order->createOrder($data);

    // Tạo chi tiết đơn hàng và tính tổng giá trị
    foreach ($cart as $item) {
        $order_details .= "<tr>
                            <td>{$item['name']}</td>
                            <td>{$item['quantity']}</td>
                            <td>{$item['total_price']} đ</td>
                          </tr>";
        $total_price += $item['total_price'];

        // Lưu chi tiết sản phẩm vào bảng OrderDetails
        $order_detail = new OrderDetail();
        $order_detail_data = [
            'order_id' => $order_id,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ];
        $order_detail->createOrderDetail($order_detail_data);
    }

    // Gửi email cho khách hàng và admin
    $authHelper = new AuthHelper();
    $email_sent = $authHelper->sendOrderEmail($email, $name, $order_details, $address, $order_id, $total_price, $payment_status, $phone, $email);

    if (!$email_sent) {
        NotificationHelper::error('email', 'Đặt hàng thành công nhưng không thể gửi email.');
    }

    // Xóa giỏ hàng sau khi đặt hàng thành công
    setcookie('cart', '', time() - 3600);

    // Hiển thị thông báo thành công và chuyển hướng về trang chủ
    NotificationHelper::success('store', 'Đặt hàng thành công!');
    header('Location: /checkout');
    exit();
}

}
