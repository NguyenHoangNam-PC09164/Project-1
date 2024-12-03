<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;

class Index extends BaseView
{
	public static function render($data = null)
	{
		$categories = (new Category())->getAll();
		$products = (new Product())->getAll();
		$sku = (new Sku())->getSkuByInnerJoinVariantAndVariantOption();

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
									<?php foreach ($categories as $index => $item) : ?>
										<div class="input-checkbox">
											<input type="checkbox" id="category-<?= ($index) ?>"
												data-category-id="<?= ($item['id']) ?>">
											<label for="category-<?= ($index) ?>">
												<span></span>
												<a data-toggle="tab" href="/products/categories/<?= ($item['id']) ?>">
													<?= ($item['name'])  ?>
												</a>
												<small>(3)</small>
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
						<!--// lọc giá sản phẩm  -->
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
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Thương hiệu</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SONY
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										CANON
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										NIKON
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">

							<h3 class="aside-title">Nhiều lượt xem nhất</h3>
							<?php if (isset($products_Views) && count($products_Views)) : ?>
								<?php foreach ($products_Views as $item) : ?>
									<div class="product-widget">
										<div class="product-img">
											<img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="/products/<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h3>
											<h4 class="product-price"><?= number_format($item['price'] - $item['discount_price']) ?> đ <del class="product-old-price"><strike><?= number_format($item['price']) ?> đ</strike></del></h4>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<!-- No Products Found -->
								<h3 class="text-center text-danger">Không có sản phẩm</h3>
							<?php endif; ?>
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
						<!-- /store top filter -->
						<!-- store products -->
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

						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">

							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

<?php

	}
}
