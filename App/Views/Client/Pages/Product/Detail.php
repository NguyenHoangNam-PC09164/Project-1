<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Models\Product;
use App\Models\Sku;
use App\Helpers\AuthHelper;



class Detail extends BaseView
{

	public static function render($data = null)
	{
		$is_login = AuthHelper::checkLogin();
		$products = (new Product())->getProductCategoryRelate();
		$sku = (new Sku())->getSkuByInnerJoinVariantAndVariantOption();
		// var_dump($sku);

		// var_dump($data);
?>
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Trang chủ</a></li>
							<li><a href="#">Sản phẩm</a></li>
							<li class="active">Chi tiết sản phẩm 1</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $sku[0]['image'] ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $sku[0]['image'] ?>" alt="">
							</div>


						</div>
					</div>
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $sku[0]['image'] ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $sku[0]['image'] ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->

					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $sku[0]['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Đánh giá | Thêm đánh giá</a>
							</div>
							<div>
								<?php
								if ($sku[0]['discount_price'] > 0):
								?>
									<h3 class="product-price" id="price-display"><strong class="text-danger"> <?= number_format($sku[0]['prices'] - $sku[0]['discount_price']) ?>đ</strong> <del class="product-old-price" id="discount_price-display"><strike><?= number_format($sku[0]['prices']) ?> đ</strike> </del> </h3>
								<?php
								else :
								?>
									<h3 class="product-price"><?= number_format($sku[0]['prices']) ?> đ</h3>

								<?php
								endif;
								?>
							</div>
							<p><?= $sku[0]['description'] ?></p>

							<div class="product-options">
								<?php if (!empty($sku) && is_array($sku)) : ?>
									<?php
									// Nhóm các biến thể theo `product_variant_name`
									$groupedOptions = [];
									foreach ($sku as $item) {
										$groupedOptions[$item['product_variant_name']][] = [
											'id' => $item['variant_option_id'],
											'name' => $item['product_variant_option_name'],
											'price' => $item['prices']
										];
									}
									?>
									<?php foreach ($groupedOptions as $variantName => $options) : ?>
										<label>
											<span><?= htmlspecialchars($variantName) ?>:</span>
											<select class="input-select variant-select" data-variant="<?= htmlspecialchars($variantName) ?>">
												<?php foreach ($options as $option) : ?>
													<option value="<?= htmlspecialchars($option['id']) ?>" data-price="<?= htmlspecialchars($option['price']) ?>">
														<?= htmlspecialchars($option['name']) ?>
													</option>
												<?php endforeach; ?>
											</select>
										</label>
									<?php endforeach; ?>
								<?php else : ?>
									<li><span>Không có biến thể nào</span></li>
								<?php endif; ?>
							</div>

							<script>
								// Theo dõi sự thay đổi trên các dropdown biến thể
								document.querySelectorAll('.variant-select').forEach(select => {
									select.addEventListener('change', updatePrice);
								});

								function updatePrice() {
									let totalPrice = 0;
									let totalDiscountPrice = 0;

									// Lấy giá của tất cả các biến thể đã chọn và cộng lại
									document.querySelectorAll('.variant-select').forEach(select => {
										let selectedOption = select.querySelector('option:checked');
										let price = parseInt(selectedOption.getAttribute('data-price')) || 0;
										let discountPrice = parseInt(selectedOption.getAttribute('data-discount-price')) || 0;

										totalPrice += price; // Cộng tổng giá
										totalDiscountPrice += discountPrice; // Cộng tổng giá giảm (nếu có)
									});

									// Cập nhật giá hiển thị theo tổng giá đã chọn
									document.getElementById('price-display').innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + " đ";

									// Cập nhật giá giảm nếu có
									if (totalDiscountPrice > 0) {
										// Nếu có giá giảm, hiển thị giá giảm
										document.getElementById('discount_price-display').innerHTML = `<strong class="text-danger">${new Intl.NumberFormat('vi-VN').format(totalPrice - totalDiscountPrice)} đ</strong> <del><strike>${new Intl.NumberFormat('vi-VN').format(totalPrice)} đ</strike></del>`;
									} else {
										// Nếu không có giá giảm, chỉ hiển thị giá gốc
										document.getElementById('discount_price-display').innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + " đ";
									}
								}
							</script>


							<!-- Khu vực hiển thị giá -->




							<div class="add-to-cart">
								<div class="qty-label">
									Số lượng
									<div class="input-number">
										<input type="number" name="quantity" id="quantity" value="1" min="1" required>
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<br>
								<br>
								<div class="add-to-cart">
									<form action="/cart/add" method="post">
										<input type="hidden" name="method" id="" value="POST">
										<input type="hidden" name="id" id="" value="<?= $data['product']['product_id'] ?>" required>
										<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
									</form>

								</div>


							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> Thêm yêu thích</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Thêm so sánh</a></li>
							</ul>

							<ul class="product-links">
								<li>Danh mục:</li>
								<li><a href="#">Sony</a></li>
							</ul>

							<ul class="product-links">
								<li>Chia sẻ:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
								<li><a data-toggle="tab" href="#tab3">Đánh giá</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $data['product']['long_description'] ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="container">
										<div class="row">
											<div class="col-lg-12">
												<div class="panel panel-default">
													<div class="panel-heading text-center">
														<h4 class="panel-title">Bình luận mới nhất</h4>
													</div>
													<div class="panel-body">
														<div class="comment-widgets">
															<?php
															// var_dump($data['comments']);
															if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
																foreach ($data['comments'] as $item) :
															?>
																	<!-- Comment Row -->
																	<div class="media comment-row">
																		<div class="media-left">
																			<?php
																			if ($item['avatar']) :
																			?>
																				<img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="img-circle">
																			<?php
																			else :
																			?>
																				<img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="img-circle">
																			<?php
																			endif;
																			?>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><?= $item['name'] ?> - <?= $item['username'] ?></h4>
																			<p><?= $item['content'] ?></p>
																			<div class="comment-footer">
																				<span class="text-muted pull-right"><?= $item['date'] ?></span>
																				<?php
																				if (isset($data) && $is_login && ($_SESSION['user']['user_id'] == $item['user_id'])) :
																				?>
																					<div class="action">
																						<button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button>
																						<form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
																							<input type="hidden" name="method" value="DELETE">
																							<input type="hidden" name="product_id" value="<?= $data['product']['product_id'] ?>">
																							<button type="submit" class="btn btn-danger btn-sm">Xoá</button>
																						</form>
																					</div>
																					<div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
																						<div class="well">
																							<form action="/comments/<?= $item['id'] ?>" method="post">
																								<input type="hidden" name="method" value="PUT">
																								<input type="hidden" name="product_id" value="<?= $data['product']['product_id'] ?>">
																								<div class="form-group">
																									<label for="">Bình luận</label>
																									<textarea class="form-control" name="content" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
																								</div>
																								<button type="submit" class="btn btn-primary">Gửi</button>
																							</form>
																						</div>
																					</div>
																				<?php
																				endif;
																				?>
																			</div>
																		</div>
																	</div>
																<?php
																endforeach;
																?>
															<?php
															else :
															?>
																<h6 class="text-center text-danger">Chưa có bình luận</h6>
															<?php
															endif;
															?>
															<?php
															if (isset($data) && $is_login) :
															?>
																<div class="media comment-row">
																	<div class="media-left">
																		<?php
																		if ($_SESSION['user']['avatar']) :
																		?>
																			<img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user" width="50" class="img-circle">
																		<?php
																		else :
																		?>
																			<img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="img-circle">
																		<?php
																		endif;
																		?>
																	</div>
																	<div class="media-body">
																		<h4 class="media-heading"><?= $_SESSION['user']['name'] ?> - <?= $_SESSION['user']['username'] ?></h4>
																		<form action="/comments" method="POST">
																			<input type="hidden" name="method" value="POST">
																			<input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['product_id'] ?>">
																			<input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
																			<div class="form-group">
																				<label for="content">Bình luận</label>
																				<textarea class="form-control" name="content" id="content" rows="3" placeholder="Nhập bình luận..."></textarea>
																			</div>
																			<button type="submit" class="btn btn-primary">Gửi</button>
																		</form>
																	</div>
																</div>
															<?php
															else :
															?>
																<h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
															<?php
															endif;
															?>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- /tab3  -->
								</div>
							</div>

							<!-- /tab3 -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		</div>
		<!-- /SECTION -->
		<div class="col-md-12">
			<div class="section-title text-center">
				<h3 class="title">Sản phẩm liên quan</h3>
			</div>
		</div>

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
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
														<button class="quick-view"><i class="fa fa-eye"></i><a href="/products/<?= htmlspecialchars($item['product_id']) ?>" class="tooltipp">Xem thêm</a></button>
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
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>



		</div>
		</div>
		</div>
		</div>
		</div>



<?php

	}
}
