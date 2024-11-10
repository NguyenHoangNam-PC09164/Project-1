<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class GioiThieu extends BaseView
{
    public static function render($data = null)
    {

?>
    <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h3>Giới thiệu về Chúng Tôi</h3>
						<p>Chào mừng bạn đến với <strong>Photo Hub</strong>, nơi mang đến cho bạn những sản phẩm máy ảnh chất lượng và dịch vụ tuyệt vời nhất!</p>
						<p>
							Tại <strong>Photo Hub</strong>, chúng tôi tự hào là một trong những đơn vị cung cấp máy ảnh và phụ kiện uy tín, đáp ứng đa dạng nhu cầu của các nhiếp ảnh gia – từ người mới bắt đầu đến các chuyên gia. Với đội ngũ am hiểu và đam mê nhiếp ảnh, chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng cao, nguồn gốc rõ ràng, cùng mức giá cạnh tranh.
						</p><br>
		
						<h4>Sứ Mệnh Của Chúng Tôi</h4>
						<p>
							Chúng tôi tin rằng mỗi khoảnh khắc đẹp đều đáng được lưu giữ. Vì vậy, <strong>Photo Hub</strong> luôn nỗ lực để giúp bạn tìm thấy thiết bị phù hợp nhất cho hành trình sáng tạo của mình. Không chỉ là nơi mua sắm, chúng tôi còn mong muốn trở thành cộng đồng chia sẻ kinh nghiệm, kỹ thuật, và niềm đam mê nhiếp ảnh.
						</p><br>
		
						<h4>Cam Kết Của Chúng Tôi</h4>
						<ul>
							<li>
								Chất lượng sản phẩm: Chúng tôi lựa chọn kỹ lưỡng từ các thương hiệu nổi tiếng như Canon, Nikon, Sony, Fujifilm,… để đảm bảo chất lượng và sự đa dạng sản phẩm cho khách hàng.
							</li>
							<li>
								Dịch vụ tận tâm: Đội ngũ tư vấn viên sẵn sàng hỗ trợ, giúp bạn chọn được sản phẩm phù hợp và giải đáp mọi thắc mắc liên quan.
							</li>
							<li>
								Chính sách bảo hành: Tất cả sản phẩm của chúng tôi đều đi kèm bảo hành chính hãng, giúp bạn yên tâm hơn khi mua sắm.
							</li>
							<li>
								Giao hàng nhanh chóng: Chúng tôi có chính sách giao hàng toàn quốc với nhiều phương thức vận chuyển linh hoạt, đảm bảo hàng đến tay bạn một cách nhanh chóng và an toàn.
							</li>
						</ul><br>
		
						<h4>Cùng Nhau Khám Phá Thế Giới Nhiếp Ảnh</h4>
						<p >Dù bạn là người mới bắt đầu khám phá hay một nhiếp ảnh gia kỳ cựu, <strong>Photo Hub</strong> luôn sẵn sàng đồng hành cùng bạn trên hành trình lưu giữ những khoảnh khắc đáng nhớ.</p><br>
						<p>Hãy đến và trải nghiệm mua sắm tại <strong>Photo Hub</strong> ngay hôm nay. Chúng tôi rất vui mừng khi được phục vụ bạn!</p>
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
							<p>Đăng ký ngay để nhận <strong>Thông báo mới nhất</strong></p>
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
