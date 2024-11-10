<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\GioiThieu;
use App\Views\Client\Pages\Page\LienHe;
use App\Views\Client\Pages\Page\TinTuc;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Home::render();
        Footer::render();
    }
    public static function gioithieu()
    {
        Header::render();
        GioiThieu::render();
        Footer::render();
    }
    public static function lienhe()
    {
        Header::render();
        LienHe::render();
        Footer::render();
    }
    public static function tintuc()
    {
        Header::render();
        TinTuc::render();
        Footer::render();
    }
}
