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
            <div class="dashboard-main-wrapper">

                <div class="dashboard-header">
                    <nav class="navbar navbar-expand-lg bg-white fixed-top">
                        <a class="navbar-brand text-danger" href="index.html">Photo Hub</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-right-top">
                                <li class="nav-item">
                                    <div id="custom-search" class="top-search-bar">
                                        <input class="form-control" type="text" placeholder="Search..">
                                    </div>
                                </li>
                                <li class="nav-item dropdown nav-user">
                                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../../../public/uploads/users/user1.jpeg" alt="" class="user-avatar-md rounded-circle"></a>
                                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="nav-user-info">
                                            <h5 class="mb-0 text-white nav-user-name">Admin</h5>
                                        </div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Thông tin tài khoản</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- sidebar -->
                <div class="nav-left-sidebar sidebar-dark">
                    <div class="menu-list">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="d-xl-none d-lg-none" href="#">Bảng điều khiển</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link active" href="/admin" data-toggle="" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Bảng điều khiển</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Quản lý loại sản phẩm</a>
                                        <div id="submenu-1" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/categories">Danh sách loại sản phẩm</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/categories/create">Thêm loại sản phẩm</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Quản lý sản phẩm</a>
                                        <div id="submenu-2" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/products">Danh sách sản phẩm</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/products/create">Thêm sản phẩm</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-5"><i class="bi bi-chat-dots-fill"></i>Quản lý bình luận</a>
                                        <div id="submenu-3" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/comments">Danh sách bình luận</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-5"><i class="bi bi-people-fill"></i>Quản lý người dùng</a>
                                        <div id="submenu-4" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/users">Danh sách người dùng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
<?php

    }
}