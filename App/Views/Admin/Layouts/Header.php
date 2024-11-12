<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

?>
        <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin</title>
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/bootstrap/css/bootstrap.min.css">
            <link href="../../../../public/assets/admin/template/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/libs/css/style.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/charts/chartist-bundle/chartist.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/charts/morris-bundle/morris.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/charts/c3charts/c3.css">
            <link rel="stylesheet" href="../../../../public/assets/admin/template/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <!-- Google Fonts-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&family=Manrope:wght@200..800&family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Wix+Madefor+Display:wght@400..800&display=swap" rel="stylesheet">

        </head>

        <body>
            <!-- sidebar -->
            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a class="active-menu" href="/admin"><i class="fa fa-dashboard"></i> Bảng điều khiển</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i> Quản lý sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/products">Danh sách sản phẩm</a>
                                    <a href="/admin/products/create">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-sitemap"></i> Quản lý loại sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/categories">Danh sách loại sản phẩm</a>
                                    <a href="/admin/categories/create">Thêm loại sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/comments"><i class="fa fa-sitemap"></i> Quản lý bình luận</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i> Quản lý người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/users">Danh sách người dùng</a>
                                    <a href="/admin/users/create">Thêm người dùng</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>


    <?php

    }
}

    ?>