<?php

namespace App\Views\Client;

use App\Views\BaseView;

use App\Models\Category;
use App\Models\Product;


class Home extends BaseView
{
    public static function render($data = null)
    {
        $categories = (new Category())->getAll();
        $products = (new Product())->get5ProductNew();
        $products_isFeature = (new Product())->getAllProductByCategoryAndStatusAndIsFeature();

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
                            <h3 class="title">Sản phẩm mới nhất</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <?php if (!empty($categories) && is_array($categories)) : ?>
                                        <?php foreach ($categories as $item) : ?>
                                            <li>
                                                <a data-toggle="tab" href="/products/categories/<?= ($item['id']) ?>">
                                                    <?= ($item['name']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li><span>Không có danh mục nào</span></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Product Bán chạy nhất -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">

                                        <?php if (isset($products) && count($products)) : ?>
                                            <?php foreach ($products as $item) : ?>
                                                <div class="product">

                                                    <div class="product-img">
                                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= ($item['image']) ?>" alt="<?= ($item['name']) ?>">
                                                        <div class="product-label">
                                                            <span class="sale">-30%</span>
                                                            <span class="Mới">Mới</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="/products/<?= ($item['product_id']) ?>">
                                                                <?= ($item['name']) ?>
                                                            </a></h3>
                                                        <?php if ($item['discount_price'] > 0) : ?>
                                                            <h4 class="product-price">
                                                                <strong><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong>
                                                                <del class="product-old-price"><?= number_format($item['price']) ?> đ</del>
                                                            </h4>
                                                        <?php else : ?>
                                                            <h4 class="product-price"><?= number_format($item['price']) ?> đ</h4>
                                                        <?php endif; ?> <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                            <button class="quick-view"><i class="fa fa-eye"></i><a href="/products/<?= ($item['product_id']) ?>" class="tooltipp">Xem thêm</a></button>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                    </div>

                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <!-- No Products Found -->
                                            <h3 class="text-center text-danger">Không có sản phẩm</h3>
                                        <?php endif; ?>



                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section">
            <div class="container">
                <div class="row" id="hot-deal">

                </div>
            </div>
        </div>


        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Sản phẩm nổi bật</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <?php if (!empty($categories) && is_array($categories)) : ?>
                                        <?php foreach ($categories as $item) : ?>
                                            <li>
                                                <a data-toggle="tab" href="/products/categories/<?= ($item['id']) ?>">
                                                    <?= ($item['name']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li><span>Không có danh mục nào</span></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <!-- Product  phẩm mới -->

                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">

                                        <?php if (isset($products_isFeature) && count($products_isFeature)) : ?>
                                            <?php foreach ($products_isFeature as $item_isFeature) : ?>
                                                <div class="product">

                                                    <div class="product-img">
                                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= ($item_isFeature['image']) ?>" alt="<?= ($item_isFeature['name']) ?>">
                                                        <div class="product-label">
                                                            <span class="sale">-30%</span>
                                                            <span class="Mới">Mới</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="/products/<?= ($item_isFeature['product_id']) ?>">
                                                                <?= ($item_isFeature['name']) ?>
                                                            </a></h3>
                                                        <?php if ($item_isFeature['discount_price'] > 0) : ?>
                                                            <h4 class="product-price">
                                                                <strong><?= number_format($item_isFeature['price'] - $item_isFeature['discount_price']) ?> đ</strong>
                                                                <del class="product-old-price"><?= number_format($item_isFeature['price']) ?> đ</del>
                                                            </h4>
                                                        <?php else : ?>
                                                            <h4 class="product-price"><?= number_format($item_isFeature['price']) ?> đ</h4>
                                                        <?php endif; ?> <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm yêu thích</span></button>
                                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm so sánh</span></button>
                                                            <button class="quick-view"><i class="fa fa-eye"></i><a href="/products/<?= ($item_isFeature['product_id']) ?>" class="tooltipp">Xem thêm</a></button>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                    </div>

                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <!-- No Products Found -->
                                            <h3 class="text-center text-danger">Không có sản phẩm</h3>
                                        <?php endif; ?>



                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div class="container mt-4">
            <div class="row text-center">
                <div class="col-md-12 mb-4">
                    <div class="card product-card">
                        <img src="../../../public/assets/client/img/banner_bottom_1.webp" class="card-img-top" alt="Sony Camera">

                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="../../../public/assets/client/img/banner_bottom_2.webp" class="card-img-top" alt="Sony Camera">

                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="../../../public/assets/client/img/banner_bottom_3.webp" class="card-img-top" alt="Nikon Camera">

                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="../../../public/assets/client/img/banner_bottom_4.webp" class="card-img-top" alt="Fujifilm Camera">

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
