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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <!-- PayPal SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=AWTlwInXfZ-bN2g11sAM9n1dp9NL1cU6BmB1hxTz_Sg2z9BmaL5hgf04yTxTV0ClB6vwdrt1PUeZe0EF&currency=USD"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php foreach ($orders as $order): 
                    if ($order['payment_status'] == 0): 
                        $vnd_to_usd = $order['price'] / 25346;
                ?>
                    const totalPrice<?= $order['id'] ?> = <?= json_encode($vnd_to_usd, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: totalPrice<?= $order['id'] ?>.toFixed(2)
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                alert('Thanh toán PayPal thành công!');
                                // Gửi thông tin cập nhật trạng thái thanh toán lên server
                                fetch('<?= APP_URL ?>/update-payment-status', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        orderId: <?= json_encode($order['id']) ?>
                                    })
                                }).then(response => response.json())
                                  .then(data => {
                                      if (data.success) {
                                          location.reload(); // Reload trang
                                      } else {
                                          alert('Cập nhật trạng thái thất bại.');
                                      }
                                  });
                            });
                        },
                        onError: function(err) {
                            console.error('Lỗi PayPal:', err);
                        }
                    }).render('#paypal-button-container-<?= $order['id'] ?>');
                <?php endif; endforeach; ?>
            });
        </script>

<?php
    }
}
?>
