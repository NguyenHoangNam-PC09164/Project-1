<?php

namespace App\Views\Client\Pages\Shop;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {
?>

<div class="section">
    <div class="container">
        <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
        
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
                
                <tr>
                    <td><img src="../../../public/assets/client/img/product1.jpg" class="product-image" alt="Sản phẩm A"></td>
                    <td>Sản phẩm A</td>
                    <td><input type="number" class="form-control quantity-input text-center" value="1" min="1"></td>
                    <td>100,000 VND</td>
                    <td>100,000 VND</td>
                    <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                </tr>
                
                <tr>
                    <td><img src="../../../public/assets/client/img/product1.jpg" class="product-image" alt="Sản phẩm B"></td>
                    <td>Sản phẩm B</td>
                    <td><input type="number" class="form-control quantity-input text-center" value="2" min="1"></td>
                    <td>150,000 VND</td>
                    <td>300,000 VND</td>
                    <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                </tr>
                
            </tbody>
        </table>
        
        
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <table class="table">
                    <tr>
                        <th class="text-right">Tổng cộng:</th>
                        <td class="text-right">400,000 VND</td>
                    </tr>
                </table>
                
                <div class="text-right">
                    <a href="/checkout" class="primary-btn order-submit">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    }
}