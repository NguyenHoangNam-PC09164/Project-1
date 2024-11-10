<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class TinTuc extends BaseView
{
    public static function render($data = null)
    {

?>
        <div class="container my-5">
            <div class="text-center mb-4">
                <h2 class="news-title">Tin Tức Mới Nhất</h2>
                <p>Cập nhật thông tin mới nhất từ Photo Hub để bạn không bỏ lỡ bất kỳ tin tức quan trọng nào!</p>
            </div>

            <div class="row">
                <!-- Article 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card news-card">
                        <img src="../../../../../public/assets/client/img/danh-gia-fujifilm-x-t5-20.webp" class="card-img-top" alt="Article Image">
                        <div class="news-content">
                            <h5>Fujifilm X-T5: Quay 6K Trên Thiết Kế Siêu Cổ Điển</h5>
                            <p>Fujifilm X-T5 đã được người hâm mộ nhà Fuji hào hứng mong chờ ngày ra mắt trong một thời gian dài...</p>
                            <a href="#" class="btn btn-danger">Đọc thêm</a>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card news-card">
                        <img src="../../../../../public/assets/client/img/so-sanh-insta360-flow-va-osmo-action-6-17.webp" class="card-img-top" alt="Article Image">
                        <div class="news-content">
                            <h5>So Sánh Insta360 Flow Và DJI Osmo Mobile 6</h5>
                            <p>Những chiếc điện thoại thông minh càng được nâng cấp về camera và khiến chúng trở thành những thiết bị ghi hình...</p>
                            <a href="#" class="btn btn-danger">Đọc thêm</a>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="col-md-6 mb-4">
                    <div class="card news-card">
                        <img src="../../../../../public/assets/client/img/ra-mat-2-chiec-den-amaran-150c-va-300c-1.webp" class="card-img-top" alt="Article Image">
                        <div class="news-content">
                            <h5>Aputure Ra Mắt Đèn Amaran 150c Và 300c</h5>
                            <p>Aputure đã ra mắt dòng đèn LED mới với nhiều tính năng và khả năng tùy chỉnh ánh sáng màu sắc...</p>
                            <a href="#" class="btn btn-danger">Đọc thêm</a>
                        </div>
                    </div>
                </div>

                <!-- Article 4 -->
                <div class="col-md-6 mb-4">
                    <div class="card news-card">
                        <img src="../../../../../public/assets/client/img/o-to-may-anh-nikon-2.webp" class="card-img-top" alt="Article Image">
                        <div class="news-content">
                            <h5>So Sánh Máy Ảnh Mirrorless Canon Và Sony</h5>
                            <p>So sánh chi tiết giữa hai dòng máy ảnh mirrorless hàng đầu để giúp bạn chọn lựa sản phẩm phù hợp nhất...</p>
                            <a href="#" class="btn btn-danger">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Đăng ký ngay để nhận <strong>Tin tức mới nhất</strong></p>
							<form>
								<input class="input" type="email" placeholder="Email của bạn">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<?php

    }
}
