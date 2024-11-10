<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- <footer class="footer">Đây là footer client. Copyright &copy; Group 6</footer> -->
        <footer id="footer">

            <div class="section">

                <div class="container">

                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">SHOP MÁY ẢNH</h3>
                                <p>Ghi lại khoảnh khắc, lưu giữ đam mê.</p>
                                <ul class="footer-links">
                                    <li><a href="#"><i class="fa fa-map-marker"></i>Cần Thơ</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i>0356918389</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>ahaha@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">VỀ CHÚNG TÔI</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Trang chủ</a></li>
                                    <li><a href="#">Sản phẩm</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="clearfix visible-xs"></div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">CHÍNH SÁCH</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Chính sách giao hàng</a></li>
                                    <li><a href="#">Chính sách bán hàng</a></li>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                    <li><a href="#">Chính sách đổi trả</a></li>
                                    <li><a href="#">Hướng dẫn trả góp</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">DỊCH VỤ</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Tài khoản</a></li>
                                    <li><a href="#">Xem giỏ hàng</a></li>
                                    <li><a href="#">Xem yêu thích</a></li>
                                    <li><a href="#">Theo dõi đơn hàng</a></li>
                                    <li><a href="#">Giúp đỡ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="bottom-footer" class="section">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 text-center">

                            <span class="copyright">

                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/nh4thuyzx" target="_blank">ahaha</a>

                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </footer>
        <script src="../public/assets/client/js/jquery.min.js"></script>
        <script src="../public/assets/client/js/bootstrap.min.js"></script>
        <script src="../public/assets/client/js/slick.min.js"></script>
        <script src="../public/assets/client/js/nouislider.min.js"></script>
        <script src="../public/assets/client/js/jquery.zoom.min.js"></script>
        <script src="../public/assets/client/js/main.js"></script>
        </body>


<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>