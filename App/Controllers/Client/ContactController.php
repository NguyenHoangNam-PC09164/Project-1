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
        $to = ($_POST['email']);
        $name = ($_POST['name']);
        $message = ($_POST['message']);
        $phone = ($_POST['phone']);
    
        try {
            $data = $auth->sendEmail($to, $name, $message, $phone);
            if ($data) {
                NotificationHelper::success('email', 'giử liên hệ thành công');
                header('Location: /contact');
            } else {
                NotificationHelper::error('product_detail', 'giử liên hệ thất bại');
                header('Location: /contact');
            }
        } catch (\Exception $e) {
            error_log($e->getMessage()); // Log error for debugging
            header('Location: /contact/send-email');
                
        } finally {
            ob_end_clean(); // Discard any buffered output
            exit();
        }
    }
    

   
}
