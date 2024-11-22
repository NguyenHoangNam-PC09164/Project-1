<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Models\Category;
use App\Models\Product;

class Index extends BaseView
{
	public static function render($data = null)
	{
		$categories = (new Category())->getAll();
		$products = (new Product())->getAll();
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
						<!-- /store top filter -->

						<!-- store products -->

						<div class="row">
							<?php if (isset($products) && count($products)) : ?>
								<?php foreach ($products as $item) : ?>
									<!-- Product -->
									<div class="col-md-4 col-xs-6">
										<div class="product">
											<!-- Product Image -->
											<div class="product-img">
												<img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($item['image']) ?>"
													class="card-img-top"
													alt="<?= htmlspecialchars($item['name']) ?>">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<!-- /Product Image -->

											<!-- Product Body -->
											<div class="product-body">
												<h3 class="product-name">
													<a href="/products/<?= htmlspecialchars($item['product_id']) ?>">
														<?= htmlspecialchars($item['name']) ?>
													</a>
												</h3>

												<!-- Product Price -->
												<?php if ($item['discount_price'] > 0) : ?>
													<h4 class="product-price">
														<strong><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong>
														<del class="product-old-price"><?= number_format($item['price']) ?> đ</del>
													</h4>
												<?php else : ?>
													<h4 class="product-price"><?= number_format($item['price']) ?> đ</h4>
												<?php endif; ?>
												<!-- /Product Price -->

												<!-- Product Rating -->
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<!-- /Product Rating -->

												<!-- Product Buttons -->
												<div class="product-btns">
													<button class="add-to-wishlist">
														<i class="fa fa-heart-o"></i>
														<span class="tooltipp">Thêm yêu thích</span>
													</button>
													<button class="add-to-compare">
														<i class="fa fa-exchange"></i>
														<span class="tooltipp">Thêm so sánh</span>
													</button>
													<button class="quick-view">
														<i class="fa fa-eye"></i>
														<a href="/products/<?= htmlspecialchars($item['product_id']) ?>" class="tooltipp">Xem thêm</a>
													</button>
												</div>
												<!-- /Product Buttons -->
											</div>
											<!-- /Product Body -->

											<!-- Add to Cart -->
											<div class="add-to-cart">
												<button class="add-to-cart-btn">
													<i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
												</button>
											</div>
											<!-- /Add to Cart -->
										</div>
									</div>
									<!-- /Product -->
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
