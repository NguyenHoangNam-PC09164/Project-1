<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Shop\Cart;

class CartController
{
    public static function index()
    {
        $cart = $_SESSION['cart'] ?? [];
        $data = [
            'cart' => $cart,
        ];

        Header::render();
        Cart::render($data);
        Footer::render();
    }

    public static function add($productId, $quantity = 1)
    {
        
        $productModel = new Product();
        $product = $productModel->getOneProductByStatus($productId);

        if (!$product) {
            NotificationHelper::error('cart', 'Sản phẩm không tồn tại!');
            return self::index();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
            $_SESSION['cart'][$productId]['total_price'] =
                $_SESSION['cart'][$productId]['quantity'] * $product['price'];
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'total_price' => $quantity * $product['price'],
                'image' => $product['image'],
            ];
        }

        $data = $_SESSION['cart'];
        Header::render();
        Cart::render($data);
        Footer::render();
    }
}
