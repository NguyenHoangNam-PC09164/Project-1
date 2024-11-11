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
            <!-- Bootstrap Styles-->
             
            <link href="../../../../public/assets/admin/template/css/bootstrap.css" rel="stylesheet" />
            
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <!-- FontAwesome Styles-->
            <link href="../../../../public/assets/admin/template/css/font-awesome.css" rel="stylesheet" />
            <!-- Morris Chart Styles-->
            <link href="../../../../public/assets/admin/template/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
            <!-- Custom Styles-->
            <link href="../../../../public/assets/admin/template/css/custom-styles.css" rel="stylesheet" />
            <!-- Google Fonts-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
            <link rel="stylesheet" href="./../../../public/assets/admin/template/js/Lightweight-Chart/cssCharts.css">

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
                        </li>
                    </ul>

                </div>

            </nav>

            <!-- nav top -->
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html"><strong><i class="bi bi-camera-fill"></i> Photo Hub</strong></a> -->
                    <a class="navbar-brand" href="/admin"><img src="../../../../public/uploads/users/logoAdmin.jpg" alt="ảnh admin"></a>


                    <div id="sideNav" href="">
                        <i class="fa fa-bars icon"></i>
                    </div>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </nav>
    <?php

    }
}

    ?>