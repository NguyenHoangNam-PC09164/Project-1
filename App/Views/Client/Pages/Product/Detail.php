<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Models\Product;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Category;


class Detail extends BaseView
{

	public static function render($data = null)
	{
		$is_login = AuthHelper::checkLogin();
		$products = (new Product())->get5ProductCategoryRelate();

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
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="">
							</div>


						</div>
					</div>
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->

					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $data['product']['name'] ?></h2>
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
								if ($data['product']['discount_price'] > 0):
								?>
									<h3 class="product-price"><strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong> <del class="product-old-price"><strike><?= number_format($data['product']['price']) ?> đ</strike> </del> </h3>
								<?php
								else :
								?>
									<h3 class="product-price"><?= number_format($data['product']['price']) ?> đ</h3>

								<?php
								endif;
								?>
							</div>
							<p><?= $data['product']['description'] ?></p>

							<div class="product-options">
								<label>
									Kích thước
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Chất lượng
									<select class="input-select">
										<option value="0">Full HD</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Số lượng
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
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
									<div class="row">
										<!-- Rating -->
										<div class="col-md-4">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<!-- <div class="col-lg-12">
												<div class="card"> -->
													<div class="card-body">
														<h4 class="card-title">Bình luận mới nhất</h4>
													</div>
													<div class="comment-widgets">
														<?php
														// var_dump($data);
														if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
															foreach ($data['comments'] as $item) :
														?>
																<!-- Comment Row -->
																<div class="d-flex flex-row comment-row m-t-0">
																	<div class="p-2">
																		<?php
																		if ($item['avatar']) :
																		?>
																			<img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded-circle">
																		<?php
																		else :
																		?>
																			<img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded-circle">
																		<?php
																		endif;
																		?>
																	</div>
																	<div class="comment-text w-100">
																		<h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?></h6>
																		<span class="m-b-15 d-block"><?= $item['content'] ?></span>
																		<div class="comment-footer">
																			<span class="text-muted float-right"><?= $item['date'] ?></span>

																			<?php
																			if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])) :

																			?>

																				<button type="button" class="btn btn-primary mb-3" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['user_id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['user_id'] ?>">Sửa</button>
																				<form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
																					<input type="hidden" name="method" value="DELETE" id="">
																					<input type="hidden" name="product_id" value="<?= $data['product']['product_id'] ?>" id="">
																					<button type="submit" class="btn btn-danger mb-3">Xoá</button>

																				</form>
																				<div class="collapse" id="<?= $item['username']?><?= $item['user_id'] ?>">
																					<div class="card card-body mt-5">
																						<form action="/comments/<?= $item['id'] ?>" method="post">
																							<input type="hidden" name="method" value="PUT" id="">
																							<input type="hidden" name="product_id" value="<?= $data['product']['product_id'] ?>" id="">
																							<div class="form-group">
																								<label for="">Bình luận</label>
																								<textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
																							</div>
																							<div class="comment-footer">
																								<button type="submit" class="btn btn-primary">Gửi</button>
																							</div>
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
														else :
															?>
															<h6 class="text-center text-danger">Chưa có bình luận</h6>
														<?php
														endif;
														?>
														<?php
														if (isset($data) && $is_login) :

														?>
															<div class="d-flex flex-row comment-row">

																<div class="p-2">

																	<?php
																	if ($_SESSION['user']['avatar']) :
																	?>
																		<img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user" width="50" class="rounded-circle">
																	<?php
																	else :
																	?>
																		<img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded-circle">
																	<?php
																	endif;
																	?>
																</div>
																<div class="comment-text w-100">
																	<h6 class="font-medium"><?= $_SESSION['user']['name'] ?> - <?= $_SESSION['user']['username'] ?></h6>
																	<form action="/comments" method="post">
																		<input type="hidden" name="method" value="POST" id="" required>
																		<input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['product_id'] ?>">
																		<input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
																		<div class="form-group">
																			<label for="content">Bình luận</label>
																			<textarea class="form-control rounded-0" name="content" id="content" rows="3" placeholder="Nhập bình luận..."></textarea>
																		</div>
																		<div class="comment-footer">
																			<button type="submit" class="btn btn-primary">Gửi</button>
																		</div>
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
								<!-- /Rating -->

								<!-- Reviews -->
								
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
													<img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="Mới">Mới</span>
													</div>
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="/products/<?= htmlspecialchars($item['product_id']) ?>">
															<?= htmlspecialchars($item['name']) ?>
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
