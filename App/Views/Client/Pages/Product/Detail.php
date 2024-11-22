<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;



class Detail extends BaseView
{
	public static function render($data = null)
	{

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
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
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

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
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
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">

													<li>
														<div class="review-heading">


															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>

													<li>
														<div class="review-heading">


															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>

												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Họ tên">
													<input class="input" type="email" placeholder="Email">
													<textarea class="input" placeholder="Nội dung"></textarea>
													<div class="input-rating">
														<span>Đánh giá: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Gửi</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
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

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Sản phẩm liên quan</h3>
						</div>
					</div>

					<!-- product -->


					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../../../public/assets/client/img/product11.jpg" alt="">
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
					</div>

					<!-- /product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../../../public/assets/client/img/product14.jpg" alt="">
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
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../../../public/assets/client/img/product13.jpg" alt="">
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
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../../../public/assets/client/img/product12.jpg" alt="">
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
