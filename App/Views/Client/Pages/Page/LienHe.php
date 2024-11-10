<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class LienHe extends BaseView
{
    public static function render($data = null)
    {

?>
    <div class="container">
			<div class="row contacts">
				<!-- Form liên hệ bên trái -->
				<div class="col-md-6">
					<div class="content text-center">
						<h3>Liên Hệ Với Chúng Tôi</h3>
						<p>Chúng tôi rất vui khi được lắng nghe từ bạn. Vui lòng điền vào mẫu dưới đây, và chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.</p>
					</div>
					<form>
						<div class="form-group">
							<label for="name">Họ và Tên</label>
							<input type="text" class="form-control" id="name" placeholder="Nhập họ và tên của bạn" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
						</div>
						<div class="form-group">
							<label for="phone">Số Điện Thoại</label>
							<input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại của bạn" required>
						</div>
						<div class="form-group">
							<label for="message">Nội Dung</label>
							<textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung của bạn" required></textarea>
						</div>
						<button type="submit" class="btn btn-danger mt-3">Gửi</button>
					</form>
				</div>
		
				<div class="col-md-6 ">
					<h4 class="text-center">Địa chỉ</h4>
					<div class="map-responsive">
						<iframe 
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.4204309702277!2d105.75565247450827!3d9.982086773343747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731257797841!5m2!1svi!2s" 
						width="500" height="450" style="border:0;" 
						allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
						</iframe>
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
							<p>Đăng ký ngay để nhận <strong>Khuyến mãi sớm nhất</strong></p>
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
