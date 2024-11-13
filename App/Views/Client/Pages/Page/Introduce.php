<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Introduce extends BaseView
{
	public static function render($data = null)
	{

?>
		<div class="container">
			<!-- Expanded Introduction Section -->
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h3>Giới thiệu về Photo Hub</h3>
						<p><strong>Photo Hub</strong> là điểm đến lý tưởng dành cho những người yêu thích nhiếp ảnh và mong muốn sở hữu những thiết bị chất lượng nhất trên thị trường. Chúng tôi tự hào có hơn 10 năm kinh nghiệm trong lĩnh vực cung cấp máy ảnh, máy quay phim, ống kính và các phụ kiện nhiếp ảnh, giúp khách hàng lưu giữ trọn vẹn từng khoảnh khắc đáng nhớ.</p>

						<p>Với đội ngũ nhân viên chuyên nghiệp, am hiểu về nhiếp ảnh, <strong>Photo Hub</strong> luôn sẵn sàng hỗ trợ và tư vấn cho khách hàng về các sản phẩm phù hợp với nhu cầu, từ những người mới bắt đầu đến các nhiếp ảnh gia chuyên nghiệp. Chúng tôi cam kết chỉ cung cấp các sản phẩm có nguồn gốc rõ ràng, chất lượng cao và dịch vụ bảo hành uy tín, mang lại sự an tâm và hài lòng tuyệt đối cho khách hàng.</p>

						<p>Tại <strong>Photo Hub</strong>, quý khách sẽ tìm thấy một bộ sưu tập đa dạng từ các thương hiệu hàng đầu như Canon, Nikon, Sony, Fujifilm, và nhiều thương hiệu nổi tiếng khác. Bất kể bạn đang tìm kiếm một chiếc máy ảnh nhỏ gọn để chụp ảnh gia đình, một máy quay phim chuyên dụng cho dự án cá nhân, hay các loại ống kính chuyên nghiệp phục vụ công việc sáng tạo, chúng tôi đều có những lựa chọn phù hợp nhất cho bạn.</p>

						<p>Không chỉ là nơi mua sắm, chúng tôi còn xây dựng một cộng đồng nhiếp ảnh sôi động, nơi mà khách hàng có thể chia sẻ kinh nghiệm, trao đổi kiến thức và truyền cảm hứng lẫn nhau. Chúng tôi thường xuyên tổ chức các buổi workshop, các chương trình khuyến mãi và sự kiện đặc biệt để mang đến cho khách hàng những trải nghiệm thú vị và ý nghĩa khi đồng hành cùng <strong>Photo Hub</strong>.</p>

						<p>Với phương châm "Uy tín - Chất lượng - Phục vụ tận tâm", chúng tôi tin tưởng rằng <strong>Photo Hub</strong> sẽ là người bạn đồng hành đáng tin cậy trong hành trình khám phá và lưu giữ những khoảnh khắc quý giá của bạn. Hãy đến và trải nghiệm dịch vụ của chúng tôi ngay hôm nay!</p>

						<p>Trân trọng cảm ơn và hân hạnh được phục vụ quý khách!</p>
					</div>
				</div>
			</div>

			<br>

			<!-- Image Section -->
			<div class="row">
				<div class="col-md-4 image-section">
					<img src="https://cdn.shoplightspeed.com/shops/644412/files/48694969/canon-eos-r5-full-frame-cameras-top-5-features.jpg" class="img-responsive img-thumbnail" alt="High-Quality Camera Selection">
					<p>Bộ sưu tập máy ảnh từ các thương hiệu hàng đầu, đáp ứng nhu cầu từ người mới bắt đầu đến nhiếp ảnh gia chuyên nghiệp.</p>
				</div>
				<div class="col-md-4 image-section">
					<img src="https://phukienflytech.vn/wp-content/uploads/2024/07/nikon-z7-header1-1920x1176-1.webp" class="img-responsive img-thumbnail" alt="Photography Accessories">
					<p>Phụ kiện nhiếp ảnh đa dạng, bao gồm ống kính, tripod, bộ lọc và nhiều thiết bị hỗ trợ sáng tạo khác.</p>
				</div>
				<div class="col-md-4 image-section">
					<img src="https://product.hstatic.net/1000304519/product/xau-__1__f2f17cd0075a40fabcc173b3caede768.jpg" class="img-responsive img-thumbnail" alt="Reliable Warranty">
					<p>Cam kết chất lượng với chính sách bảo hành uy tín, đảm bảo sự an tâm khi mua sắm.</p>
				</div>
			</div>


			<br>

			<!-- Video Section -->
			<div class="row">
				<div class="col-md-12 text-center">
					<h4>Video Giới Thiệu</h4>
					<div class="embed-responsive embed-responsive-16by9">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/11BIZj1LSfg?si=Wy8iwc1Jq0VQ5-jp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>					</div>
				</div>
			</div>
		</div>

		<br>

		<!-- Newsletter Section -->
		<div id="newsletter" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="newsletter">
							<p>Đăng ký ngay để nhận <strong>Thông báo mới nhất</strong></p>
							<form class="form-inline">
								<input class="form-control" type="email" placeholder="Email của bạn">
								<button class="btn btn-primary newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
							</form>
							<ul class="list-inline">
								<li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest fa-2x"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php

	}
}
