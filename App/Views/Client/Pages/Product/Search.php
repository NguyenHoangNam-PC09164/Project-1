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
							<?php
							if (count($products) && count($data['products'])) :
							?>
								<?php
								foreach ($products as $item) :
								?>
									<!-- product -->
									<div class="col-md-4 col-xs-6">
										<div class="product">
											<div class="product-img">
												<img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="/products/<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h3>
												<?php
												if ($item['discount_price'] > 0) :
												?>

													<h4 class="product-price"><strong><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong> <del class="product-old-price"><strike><?= number_format($item['price']) ?> đ</strike> </del> </h4>

												<?php
												else :
												?>
													<h4 class="product-price"><?= number_format($item['price']) ?>đ</h4>

												<?php
												endif;
												?>
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
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a href="/products/<?= $item['product_id'] ?>">Xem thêm</a></span></button>
												</div>

											</div>
											<div class="add-to-cart">
												<form action="/cart/add" method="post">
													<input type="hidden" name="method" id="" value="POST">
													<input type="hidden" name="id" id="" value="<?= $item['product_id'] ?>" required>
													<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
												</form>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<!-- No Products Found -->
								<h3 class="text-center text-danger">Không có sản phẩm</h3>
							<?php endif; ?>
						</div>

                    </div>
                </div>
            </div>
        </div>
        
                <?php
            }
        }
