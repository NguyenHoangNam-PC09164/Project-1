<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class OrderView extends BaseView
{
    public static function render($data = null)
    {
        $orders = isset($data['orders']) && is_array($data['orders']) ? $data['orders'] : [];
?>

        <div class="section">
            <div class="container">
                <h2 class="text-center">Đơn Hàng Của Bạn</h2>
                <?php if (empty($orders)): ?>
                    <p class="text-center">Bạn chưa có đơn hàng nào!</p>
                <?php else: ?>
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ngày đặt</th>
                                <th>Hình ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): 
                                $vnd_to_usd = $order['price'] / 25346; // Chuyển đổi giá từ VND sang USD
                            ?>
                                <tr>
                                    <td><?= ($order['id']) ?></td>
                                    <td><?= ($order['order_date']) ?></td>
                                    <td>
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= ($order['image']) ?>"
                                            alt="<?= ($order['name']) ?>"
                                            class="product-image">
                                    </td>
                                    <td><?= ($order['name']) ?></td>
                                    <td><?= ($order['quantity']) ?></td>
                                    <td><?= number_format($order['price'], 0, ',', '.') ?> VND</td>
                                    <td>
                                        <?php if ($order['payment_status'] == 1): ?>
                                            <span>Đã thanh toán</span>
                                        <?php else: ?>
                                            <div>
                                                <span>Chưa thanh toán</span>
                                                <div id="paypal-button-container-<?= $order['id'] ?>"></div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/order/<?= $order['id']?>">Chi tiết</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        
<?php
    }
}
?>
