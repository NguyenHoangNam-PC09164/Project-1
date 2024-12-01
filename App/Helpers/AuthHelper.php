<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User;
use App\Views\Client\Components\Notification;

class AuthHelper
{

    public static function register($data)
    {
        $user = new User();

        $is_exist = $user->getOneUserByUsername($data['username']);

        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }
        NotificationHelper::error('register', 'Đăng ký thất bại');
        return false;
    }
    public static function login($data)
    {
        // kiểm tra có tồn tại username trong database
        $user = new User();
        // nếu không => thông báo trả về false
        $is_exist = $user->getOneUserByUsername($data['username']);
        if (!$is_exist) {
            NotificationHelper::error('exist_username', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }


        // nếu không thông báo trả về false
        // nếu có ktr status = 1 không
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }
        // nếu không thông báo, trả về false
        // nếu có kiểm tra remember => để lưu session hoặc cookie thông báo thành công  
        if ($data['remember']) {
            // luu cookie, luu session
            self::updateCookie($is_exist['user_id']);
        } else {
            //luu session
            self::updateSession($is_exist['user_id']);
        }
        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }
    public static function updateCookie($id)
    {
        if (!is_int($id)) {
            return false;
        }

        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            $user_data = json_encode($result);
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
            $_SESSION['user'] = $result;
        }
    }
    public static function updateSession($id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            // luu session
            $_SESSION['user'] = $result;
        }
    }
    public static function checkLogin()
    {
        return isset($_SESSION['user']);

        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user, true);

            if (isset($user_data['user_id'])) {
                self::updateCookie($user_data['user_id']);
                return true;
            } else {
                setcookie('user', '', time() - 3600, '/');
            }
        }

        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user']['user_id'])) {
                self::updateSession($_SESSION['user']['user_id']);
                return true;
            }
        }

        return false;
    }

    public static function logout()
    {

        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
    }

    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin');
            return false;
        }

        $data = $_SESSION['user'];
        $user_id = $data['user_id'];

        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Không có quyền xem thông tin tài khoản này');
            return false;
        }
        return true;
    }

    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->update($id, $data);

        if (!$result) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
            return false;
        }

        if ($_SESSION['user']) {
            self::updateSession($id);
        }

        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }
        NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
        return true;
    }

    public static function changePassword($id, $data)
    {

        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }
        if (!$data['username']) {
            NotificationHelper::error('username', 'Khong ton tai ten dang nhap');
            return false;
        }
        // Kiểm tra mật khẩu cũ có trùng khớp với database
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password-verify', 'Mật khẩu cũ không chính xác');
            return false;
        }

        // Mã hóa mật khẩu trước khi lưu
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hash_password,
        ];

        $result_update = $user->updateUser($id, $data_update);

        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);

            NotificationHelper::success('change-password', 'Đổi mật khẩu thành công');
            return true;
        } else {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }

    public static function forgotPassword($data)
    {
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();

        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }

    public static function middleware()
    {

        $admin = explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin = $admin[1];

        if ($admin == 'admin') {
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                header('location: /login');
                exit;
            }

            if ($_SESSION['user']['role'] != 1) {
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                header('location: /login');
                exit;
            }
        }
    }
    public static function sendEmail($to, $name, $message, $phone): bool
    {
        // header('Content-Type: text/html; charset=UTF8');
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_CLIENT;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nam219021@gmail.com';
            $mail->Password = 'tqns mvkl jdme zwlm'; // App password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set người gửi và người nhận
            $mail->setFrom(address: 'nam219021@gmail.com', name: 'photo hub'); // Địa chỉ email người gửi
            $mail->addAddress(address: $to, name: $name); // Địa chỉ người nhận
            $mail->addReplyTo(address: 'nam219021@gmail.com', name: 'photo hub');


            // $mail->addCC('quangtho2021pq2@gmail.com');
            // $mail->addBCC('quangtho2021pq2@gmail.com');

            // Content
            $mail->isHTML($ishtml = true);   // Set email format to HTML
            $mail->Subject = 'Contact fo photo hub'; //
            $mail->Body = "<p>cảm ơn bạn đã liên hệ tới photo hub: chúng tôi sẽ liên hệ sớm nhất .</p><p><trong>lời nhắn của bạn:</trong>{$message}</p>";
            $mail->AltBody = "Cảm ơn vì đã liên hệ! lời nhắn của bạn:{$message} ";
            $mail->send();

            $mail->clearAddresses();
            $mail->addAddress(address: 'nam219021@gmail.com', name: 'photo hub Admin');
            $mail->Subject = 'Thông tin liên lạc của khách hàng - photo hub';
            $mail->Body = "<p><strong>Lời nhắn từ khách hàng:</strong></p> <p><strong>Tên:</strong> {$name}</p><p><strong>Email:</strong> {$to}</p><p><strong>Điện thoại:</strong> {$phone}</p><p><strong>Lời nhắn của bạn:</strong> {$message}</p>";
            $mail->AltBody = "Lời nhắn từ khách hàng: {$name} - {$message}";
            $mail->send();

            
            return true;
        } catch (Exception $e) {
            return false;
        }
        header('location: /contact');
    }
    public static function sendOrderEmail(string $to, string $name, string $order_details, string $address, int $order_id, int $total_price, int $payment_status, string $phone, string $email): bool
    {   
        $mail = new PHPMailer(true);
        
        try {
            
            $mail->SMTPDebug = SMTP::DEBUG_OFF; 
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nam219021@gmail.com';
            $mail->Password = 'tqns mvkl jdme zwlm'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Gửi email đến khách hàng
            $mail->setFrom('nam219021@gmail.com', 'Photo Hub');
            $mail->addAddress($to, $name);
            $mail->addReplyTo('nam219021@gmail.com', 'Photo Hub');
            $mail->isHTML(true);
            $mail->Subject = "Xác nhận đơn hàng #$order_id từ Photo Hub";
            $mail->Body = "
                <html lang='vi'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Đơn hàng xác nhận</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            background-color: #007bff;
                            color: white;
                            padding: 15px;
                            text-align: center;
                            border-radius: 8px 8px 0 0;
                        }
                        .header h1 {
                            margin: 0;
                        }
                        .order-summary {
                            margin-top: 20px;
                        }
                        .order-summary table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        .order-summary th, .order-summary td {
                            padding: 8px;
                            border: 1px solid #ddd;
                            text-align: left;
                        }
                        .order-summary th {
                            background-color: #f2f2f2;
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: center;
                            font-size: 12px;
                            color: #777;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>Đơn hàng xác nhận: #$order_id</h1>
                        </div>
                        <p>Chào $name,</p>
                        <p>Cảm ơn bạn đã đặt hàng tại Photo Hub! Dưới đây là chi tiết đơn hàng của bạn:</p>
                        
                        <div class='order-summary'>
                            <table>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                $order_details
                            </table>
                            <p><strong>Giao nhận hàng:</strong> Giao hàng miễn phí</p>
                            <p><strong>Phương thức thanh toán:</strong> " . ($payment_status == 1 ? 'PayPal (Đã thanh toán)' : 'PayPal (Chưa thanh toán)') . "</p>
                            <p><strong>Tổng cộng:</strong> $total_price đ</p>
                        </div>
                        <div class='footer'>
                            <p>Chúng tôi sẽ liên hệ sớm nhất để xác nhận đơn hàng.</p>
                        </div>
                    </div>
                </body>
                </html>
            ";
            $mail->AltBody = "Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ sớm nhất để xác nhận đơn hàng.";
            $mail->send();

            // Gửi email đến admin
            $mail->clearAddresses();
            $mail->addAddress('nam219021@gmail.com', 'Photo Hub Admin');
            $mail->Subject = "Thông báo đơn hàng mới: #$order_id";
            $mail->Body = "
                <html lang='vi'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Thông báo đơn hàng mới</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            background-color: #007bff;
                            color: white;
                            padding: 15px;
                            text-align: center;
                            border-radius: 8px 8px 0 0;
                        }
                        .header h1 {
                            margin: 0;
                        }
                        .order-summary {
                            margin-top: 20px;
                        }
                        .order-summary table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        .order-summary th, .order-summary td {
                            padding: 8px;
                            border: 1px solid #ddd;
                            text-align: left;
                        }
                        .order-summary th {
                            background-color: #f2f2f2;
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: center;
                            font-size: 12px;
                            color: #777;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>Đơn hàng mới: #$order_id</h1>
                        </div>
                        <p><strong>Thông tin khách:</strong></p>
                        <p><strong>Tên khách hàng:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Số điện thoại:</strong> $phone</p>
                        <p><strong>Địa chỉ:</strong> $address</p>
                        
                        <p><strong>Chi tiết đơn hàng:</strong></p>
                        <table>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                            $order_details
                        </table>
                        <p><strong>Phương thức thanh toán:</strong> " . ($payment_status == 1 ? 'PayPal (Đã thanh toán)' : 'PayPal (Chưa thanh toán)') . "</p>
                        <p><strong>Tổng cộng:</strong> " . number_format($total_price, 0, ',', '.') . " đ</p>
                        
                        <div class='footer'>
                            <p>Xin cảm ơn!</p>
                        </div>
                    </div>
                </body>
                </html>
            ";
            $mail->AltBody = "Thông báo đơn hàng mới đã được đặt. Mã đơn hàng: #$order_id.";
            $mail->send();

            return true;
        } catch (Exception $e) {
            error_log("Lỗi khi gửi email: " . $e->getMessage());
            return false;
        }
    }

    
    
}
