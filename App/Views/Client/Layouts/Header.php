<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {


?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dự án 1</title>

            <!-- Bootstrap CSS -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

            <link type="text/css" rel="stylesheet" href="../public/assets/client/css/bootstrap.min.css" />

            <link type="text/css" rel="stylesheet" href="../public/assets/client/css/slick.css" />
            <link type="text/css" rel="stylesheet" href="../public/assets/client/css/slick-theme.css" />

            <link type="text/css" rel="stylesheet" href="../public/assets/client/css/nouislider.min.css" />

            <link rel="stylesheet" href="../public/assets/client/css/font-awesome.min.css">

            <link type="text/css" rel="stylesheet" href="../public/assets/client/css/style.css" />
        </head>

        <body>
            <header>
                <div id="top-header">
                    <div class="container">
                        <ul class="header-links pull-left">
                            <li><a href="#"><i class="fa fa-phone"></i> 0356918389 a</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> ahaha@gmail.com</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i> Cần Thơ</a></li>
                        </ul>
                        <ul class="header-links pull-right">
                            <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                            <li><a href="/login"><i class="fa fa-user-o"></i> Tài khoản</a></li>
                        </ul>
                    </div>
                </div>

                <div id="header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="header-logo">
                                    <a href="#" class="logo">
                                        <img src="./img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="header-search">
                                    <form>
                                        <select class="input-select">
                                            <option value="0">Danh mục</option>
                                            <option value="1">Danh mục 1</option>
                                            <option value="1">Danh mục 2</option>
                                        </select>
                                        <input class="input" placeholder="Search here">
                                        <button class="search-btn">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3 clearfix">
                                <div class="header-ctn">
                                    <div>
                                        <a href="#">
                                            <i class="fa fa-heart-o"></i>
                                            <span>Yêu thích</span>
                                            <div class="qty">2</div>
                                        </a>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Giỏ hàng</span>
                                            <div class="qty">3</div>
                                        </a>
                                        <div class="cart-dropdown">
                                            <div class="cart-list">
                                                <div class="product-widget">
                                                    <div class="product-img">
                                                        <img src="../../../public/assets/client/img/product1.jpg" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                        <h4 class="product-price"><span class="qty">1x</span>980.000đ</h4>
                                                    </div>
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </div>
                                        

                                                <div class="product-widget">
                                                    <div class="product-img">
                                                        <img src="../../../public/assets/client/img/product2.jpg" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="#">Sản phẩm 2</a></h3>
                                                        <h4 class="product-price"><span class="qty">3x</span>980.000đ</h4>
                                                    </div>
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </div>
                                            </div>
                                            <div class="cart-summary">
                                                <small>Đã thêm 3 sản phẩm</small>
                                                <h5>Tổng: 2.940.000đ</h5>
                                            </div>
                                            <div class="cart-btns">
                                                <a href="/cart">Xem giỏ hàng</a>
                                                <a href="/checkout">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="menu-toggle">
                                        <a href="#">
                                            <i class="fa fa-bars"></i>
                                            <span>Menu</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <nav id="navigation">
                <div class="container">
                    <div id="responsive-nav">
                        <ul class="main-nav nav navbar-nav">
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="/products">Sản phẩm</a></li>
                            <li><a href="/introduce">Giới thiệu</a></li>
                            <li><a href="/news">Tin tức</a></li>
                            <li><a href="/contact">Liên hệ</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
    <?php

    }
}

    ?>