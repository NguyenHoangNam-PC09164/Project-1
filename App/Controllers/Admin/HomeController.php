<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Home;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        $count_product = new Product();
        $data_count_product = $count_product-> countTotalProduct();
        $count_user = new User();
        $data_count_user = $count_user->countTotalUser();
        $data = [
            "data_count_product"=> $data_count_product,
            "data_count_user"=> $data_count_user
        ];
        Header::render();
        Home::render($data);
        Footer::render();
    }
}
