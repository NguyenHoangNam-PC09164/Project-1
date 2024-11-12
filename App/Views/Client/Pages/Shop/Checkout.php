<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {

?>


        <div class="section">

            <div class="container">

                <div class="row">

                    <div class="col-md-7">

                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Địa chỉ thanh toán</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Địa chỉ đầy đủ">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="Mã bưu điện">
                            </div>
                        </div>

                        <div class="shiping-details">
                            <div class="section-title">
                                <h3 class="title">Địa chỉ giao hàng</h3>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="shiping-address">
                                <label for="shiping-address">
                                    <span></span>
                                    Giao đến địa chỉ khác?
                                </label>
                                <div class="caption">
                                    <div class="form-group">
                                        <input class="input" type="text" name="first-name" placeholder="Họ tên">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="tel" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="address" placeholder="Địa chỉ đầy đủ">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="zip-code" placeholder="Mã bưu điện">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="order-notes">
                            <textarea class="input" placeholder="Ghi chú"></textarea>
                        </div>

                    </div>


                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Đơn hàng của bạn</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>SẢN PHẨM</strong></div>
                                <div><strong>GIÁ</strong></div>
                            </div>
                            <div class="order-products">
                                <div class="order-col">
                                    <div>Sản phẩm 1</div>
                                    <div>980.000đ</div>
                                </div>
                                <div class="order-col">
                                    <div>Sản phẩm 2</div>
                                    <div>980.000đ</div>
                                </div>
                            </div>
                            <div class="order-col">
                                <div>Giao hàng</div>
                                <div><strong>Miễn phí</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>TỔNG CỘNG</strong></div>
                                <div><strong class="order-total">2.940.000đ</strong></div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-1">
                                <label for="payment-1">
                                    <span></span>
                                    Chuyển khoản qua Paypal
                                </label>
                                <div class="caption">
                                    <p>Bạn vui lòng chuyển khoản vào số Paypal 0123456789</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-2">
                                <label for="payment-2">
                                    <span></span>
                                    Thanh toán trực tiếp
                                </label>
                                <div class="caption">
                                    <p>Kiểm tra đơn hàng trước khi nhận</p>
                                </div>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">
                                <span></span>
                                Tôi đã đọc và chấp nhận <a href="#">các điều khoản và điều kiện</a>
                            </label>
                        </div>
                        <a href="#" class="primary-btn order-submit">Đặt hàng</a>
                    </div>

                </div>

            </div>

        </div>

<?php

    }
}
