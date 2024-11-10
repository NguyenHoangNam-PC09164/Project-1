<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="../../../public/assets/client/img/product8.jpg" alt="" width="360px">
                            </div>
                            <div class="shop-body">
                                <h3>Nikon<br>Bộ sưu tập</h3>
                                <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="../../../public/assets/client/img/product16.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Canon<br>Bộ sưu tập</h3>
                                <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="../../../public/assets/client/img/product21.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Insta360 X3<br>Bộ sưu tập</h3>
                                <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Sản phẩm mới</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Nikon</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Canon</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Sony</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Insta360 X3</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product1.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="Mới">Mới</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product2.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="Mới">Mới</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product3.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product4.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product5.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="hot-deal" class="section">

        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Bán chạy nhất</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product6.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="Mới">Mới</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product7.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="Mới">Mới</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product8.jpg" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product9.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../../public/assets/client/img/product10.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Danh mục">Danh mục</p>
                                                <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                                <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem thêm</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Bán chạy nhất</h4>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>
                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            <div>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product11.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product12.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product13.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product14.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product15.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product16.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Mới nhất</h4>
                            <div class="section-nav">
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-4">
                            <div>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product17.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product18.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product19.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product20.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product21.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product22.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix visible-sm visible-xs"></div>
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Nhiều lượt xem nhất</h4>
                            <div class="section-nav">
                                <div id="slick-nav-5" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-5">
                            <div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product23.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product24.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product25.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product26.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product27.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>

                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="../../../public/assets/client/img/product1.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-Danh mục">Danh mục</p>
                                        <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                        <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<?php
    }
}
