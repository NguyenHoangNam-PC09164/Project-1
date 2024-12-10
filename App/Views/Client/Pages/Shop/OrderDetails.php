<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class OrderDetails extends BaseView
{
    public static function render($data = null)
    {
        $cart = $data['cart'] ?? [];
        $total_price = $data[0]['price'] * $data[0]['quantity'];
        
        $vnd_to_usd = $total_price / 25346;  // Convert VND to USD
        var_dump($data);
?>

        <div class="section">
            <div class="container">
                <form id="checkout-form" action="/orderAction" method="POST">
                    <input type="hidden" name="method" value="POST">
                    <input type="hidden" id="payment_status" name="payment_status" value="0">
                    <input type="hidden" name="order_id" value="<?= $data[0]['id'] ?>">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Thông tin khách hàng -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Thông tin khách hàng</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="name" placeholder="Họ tên" value="<?= $data[0]['name']?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" placeholder="Số điện thoại"  value="<?= $data[0]['phone']?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email"  value="<?= $data[0]['email']?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Địa chỉ đầy đủ"  value="<?= $data[0]['address']?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 order-details">
                            <!-- Đơn hàng của bạn -->
                            <div class="section-title text-center">
                                <h3 class="title">Đơn hàng của bạn</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>SẢN PHẨM</strong></div>
                                    <div><strong>GIÁ</strong></div>
                                </div>
                                <div class="order-products">
                                    <?php if (empty($data)): ?>
                                        <div class="text-center">
                                            <p>Giỏ hàng của bạn đang trống!</p>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($data as $item): ?>
                                            <div class="order-col">
                                                <div><?= htmlspecialchars($item['name']) ?> x <?= $item['quantity'] ?></div>
                                                <div><?= number_format($total_price, 0, ',', '.') ?> VND</div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="order-col">
                                    <div>Giao hàng</div>
                                    <div><strong>Miễn phí</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TỔNG CỘNG</strong></div>
                                    <div><strong class="order-total"><?= number_format($total_price, 0, ',', '.') ?> VND</strong></div>
                                </div>
                            </div>

                            <!-- PayPal Button Container -->
                            <div id="paypal-button-container"></div>

                            <!-- PayPal SDK -->
                            <script src="https://www.paypal.com/sdk/js?client-id=AWTlwInXfZ-bN2g11sAM9n1dp9NL1cU6BmB1hxTz_Sg2z9BmaL5hgf04yTxTV0ClB6vwdrt1PUeZe0EF&buyer-country=US&currency=USD&components=buttons&disable-funding=venmo,paylater,card" data-sdk-integration-source="developer-studio"></script>

                            <!-- JavaScript -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const checkoutForm = document.getElementById('checkout-form');
                                    const paymentStatusInput = document.getElementById('payment_status');
                                    const totalPrice = <?= json_encode($vnd_to_usd, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>; // đảm bảo an toàn khi nhúng php vào js

                                    if (totalPrice > 0) {
                                        paypal.Buttons({
                                            createOrder: function(data, actions) {
                                                return actions.order.create({
                                                    purchase_units: [{
                                                        amount: {
                                                            value: totalPrice.toFixed(2) // USD Amount
                                                        }
                                                    }]
                                                });
                                            },
                                            onApprove: function(data, actions) {
                                                return actions.order.capture().then(function(details) {
                                                    alert('Thanh toán PayPal thành công!');
                                                    paymentStatusInput.value = 1; // Set payment_status to 1
                                                    checkoutForm.submit(); // Submit form
                                                });
                                            },
                                            onError: function(err) {
                                                alert('Đã xảy ra lỗi trong quá trình thanh toán: ' + err);
                                            }
                                        }).render('#paypal-button-container');
                                    } else {
                                        console.error('Tổng giá trị không hợp lệ:', totalPrice);
                                    }
                                });
                            </script>

                            <div class="text-right">
                                <button type="submit" class="primary-btn order-submit">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
    }
}
?>