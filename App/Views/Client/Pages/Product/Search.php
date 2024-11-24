<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Models\Category;


class Search extends BaseView
{
    public static function render($data = null)
    {
        $products = $data['products'] ?? [];

        $categories = (new Category())->getAll();
        // var_dump($products);
?>
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Danh mục</h3>
                            <div class="checkbox-filter">

                                <?php if (!empty($categories) && is_array($categories)) : ?>
                                    <?php foreach ($categories as $item) : ?>
                                        <div class="input-checkbox">
                                            <input type="checkbox" id="category-1">
                                            <label for="category-1">
                                                <span></span>
                                                <a data-toggle="tab" href="/products/categories/<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>">
                                                    <?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>
                                                </a> <small>(3)</small>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li><span>Không có danh mục nào</span></li>
                                <?php endif; ?>


                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Giá</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Bán chạy nhất</h3>
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="../../../public/assets/client/img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                    <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="../../../public/assets/client/img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                    <h4 class="product-price">980.000đ<del class="product-old-price">990.000đ</del></h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="../../../public/assets/client/img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">Sản phẩm 1</a></h3>
                                    <h4 class="product-price">980.000đ <del class="product-old-price">990.000đ</del></h4>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                    </div>
                    <!-- /ASIDE -->

                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            <div class="store-sort">
                                <label>
                                    Sắp xếp:
                                    <select class="input-select">
                                        <option value="0">Phổ biến</option>
                                        <option value="1">Nổi bật</option>
                                    </select>
                                </label>

                                <label>
                                    Xem:
                                    <select class="input-select">
                                        <option value="0">20</option>
                                        <option value="1">50</option>
                                    </select>
                                </label>
                            </div>
                            <ul class="store-grid">
                                <li class="active"><i class="fa fa-th"></i></li>
                                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>

                        <div class="row">
                            <?php if (!empty($products)) : ?>
                                <?php foreach ($products as $product) : ?>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name">
                                                    <a href="/products/<?= $product['product_id'] ?>"><?= $product['name'] ?></a>
                                                </h3>
                                                <h4 class="product-price"><?= number_format($product['price']) ?> đ</h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <h3 class="text-center text-danger">Không tìm thấy sản phẩm nào</h3>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
                <?php
            }
        }
