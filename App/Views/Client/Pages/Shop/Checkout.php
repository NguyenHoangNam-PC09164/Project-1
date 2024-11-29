<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        $cart = $data['cart'] ?? [];
        $total = array_sum(array_column($cart, 'total_price'));
?>

        <div class="section">
            <div class="container">
                <form action="/checkoutAction" method="POST">
                <input type="hidden" name="method" value="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Thông tin khách hàng -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Địa chỉ thanh toán</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="name" placeholder="Họ tên" >
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" placeholder="Số điện thoại" >
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email" >
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Địa chỉ đầy đủ" >
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
                                    <?php if (empty($cart)): ?>
                                        <div class="text-center">
                                            <p>Giỏ hàng của bạn đang trống!</p>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($cart as $item): ?>
                                            <div class="order-col">
                                                <div><?= htmlspecialchars($item['name']) ?> x <?= $item['quantity'] ?></div>
                                                <div><?= number_format($item['total_price'], 0, ',', '.') ?> VND</div>
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
                                    <div><strong class="order-total"><?= number_format($total, 0, ',', '.') ?> VND</strong></div>
                                </div>
                            </div>

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
