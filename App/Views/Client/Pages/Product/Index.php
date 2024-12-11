<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
	public static function render($data = null)
	{
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
								<?php foreach ($data['categories'] as $category): ?>
									<div class="input-checkbox">
										<label for="category">
											<a class="nav-link text-cate text-dark" href="/products/Category/<?= $category['id'] ?>"><?= $category['name'] ?></a>
										</label>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- /aside Widget -->
						<!-- aside Widget -->
						<!-- lọc giá sản phẩm -->
						<div class="aside">
							<h3 class="aside-title">Giá</h3>
							<form method="GET" action="/products/filter">
								<div class="price-filter">
									<div id="price-slider"></div>
									<div class="input-number price-min">
										<input name="min_price" id="price-min" type="number" placeholder="Min">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>

									<span>-</span>
									<div class="input-number price-max">
										<input name="max_price" id="price-max" type="number" placeholder="Max">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<button type="submit">Lọc</button>
								</div>
							</form>
						</div>

						<div class="aside">
							<h3 class="aside-title">Nhiều lượt xem nhất</h3>
							<?php if (!empty($data['products_Views'])) : ?>
								<?php foreach ($data['products_Views'] as $products_Views) : ?>
									<div class="product-widget">
										<div class="product-img">	
											<img src="<?= APP_URL ?>/public/uploads/products/<?= $products_Views['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="/products/<?= $products_Views['product_id'] ?>"><?= $products_Views['name'] ?></a></h3>
											<h4 class="product-price"><?= number_format($products_Views['price'] - $products_Views['discount_price']) ?> đ <del class="product-old-price"><strike><?= number_format($products_Views['price']) ?> đ</strike></del></h4>
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
								<form method="GET" action="/products/display">
									<label>
										Sắp xếp:
										<select class="input-select" name="sort" onchange="this.form.submit()">
											<option value="popular" <?= isset($_GET['sort']) && $_GET['sort'] === 'popular' ? 'selected' : '' ?>>Phổ biến</option>
											<option value="featured" <?= isset($_GET['sort']) && $_GET['sort'] === 'featured' ? 'selected' : '' ?>>Nổi bật</option>
										</select>
									</label>
									<label>
										Xem:
										<select class="input-select" name="view">
											<option value="20" >20</option>
											<option value="50" >50</option>
										</select>
									</label>
								</form>


							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->
						<!-- store products -->
						<?php if (!empty($data['products'])) : ?>
							<div class="row">
								<?php foreach ($data['products'] as $item) : ?>
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
