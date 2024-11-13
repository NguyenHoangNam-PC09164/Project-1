<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\Introduce;
use App\Views\Client\Pages\Page\Contact;
use App\Views\Client\Pages\Page\News;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Home::render();
        Footer::render();
    }
    public static function introduce()
    {
        Header::render();
        Introduce::render();
        Footer::render();
    }
    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }
    public static function news()
    {
        Header::render();
        News::render();
        Footer::render();
    }
}
