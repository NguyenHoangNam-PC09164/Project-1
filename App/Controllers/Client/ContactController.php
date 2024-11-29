<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Contact\Index;



class ContactController
{
    // hiển thị danh sách
    public static function index()
    {


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render();
        Footer::render();
    }

    // Xử lý gửi email từ form liên hệ

    public static function sendEmail()
    {
        ob_start(); // Start output buffering
    
        $auth = new AuthHelper();
        $to = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    
        try {
            $data = $auth->sendEmail($to, $name, $message, $phone);
            if ($data) {
                NotificationHelper::success('email', 'giử liên hệ thành công');
                header('Location: /contact');
            } else {
                NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
                header('Location: error.php');
            }
        } catch (\Exception $e) {
            error_log($e->getMessage()); // Log error for debugging
            header('Location: error.php');
                
        } finally {
            ob_end_clean(); // Discard any buffered output
            exit();
        }
    }
    

   
}
