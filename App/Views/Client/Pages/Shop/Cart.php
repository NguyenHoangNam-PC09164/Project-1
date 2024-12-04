<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {
        $cart = $data['cart'] ?? [];
        $total = array_sum(array_column($cart, 'total_price'));
        // var_dump($cart); 
?>

        <div class="section">
            <div class="container">
                <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
                <?php if (empty($cart)): ?>
                    <p class="text-center">Giỏ hàng của bạn đang trống!</p>
                <?php else: ?>
                    <table class="table table-bordered table-hover shop-cart text-center">
                        <thead>
                            <tr>
                                <th class="text-center">Hình ảnh</th>
                                <th class="text-center">Sản phẩm</th>
                                
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Thành tiền</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $id => $item): ?>
                                <tr>
                                    <td>
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" 
                                             alt="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>" 
                                             class="product-image">
                                    </td>
                                    <td><?= ($item['name']) ?></td>
                                    
                                    <td>
                                        <form action="/cart/update" method="post">
                                            <input type="hidden" name="method" value="POST">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" 
                                                   class="form-control quantity-input text-center">
                                            <button type="submit" class="btn btn-success">Sửa</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?= number_format($item['price'] - $item['discount_price'], 0, ',', '.') ?> VND
                                    </td>
                                    <td>
                                        <?= number_format($item['total_price'], 0, ',', '.') ?> VND
                                    </td>
                                    <td>
                                        <form action="/cart/remove" method="post">
                                            <input type="hidden" name="method" value="POST">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>" required>
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <table class="table">
                                <tr>
                                    <th class="text-right">
                                        <h3>Tổng cộng:</h3>
                                    </th>
                                    <td class="text-right">
                                        <h3><?= number_format($total, 0, ',', '.') ?> VND</h3>
                                    </td>
                                </tr>
                            </table>

                            <div class="text-right">
                                <a href="/checkout" class="primary-btn order-submit">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

<?php
    }
}
?>
