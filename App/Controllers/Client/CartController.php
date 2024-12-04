<?php

namespace App\Controllers\Client;

use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Shop\Cart;
use App\Helpers\NotificationHelper;

class CartController
{
    public static function index()
    {
        if (!isset($_SESSION['user'])) {
            // Chuyển hướng tới trang đăng nhập
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }
        // Lấy dữ liệu giỏ hàng từ cookie
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        $data = [
            'cart' => $cart,
        ];
        Header::render();
        Cart::render($data);
        Footer::render();
    }

    public static function add()
    {
        if (!isset($_SESSION['user'])) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }

        // Lấy dữ liệu từ POST
        $productId = $_POST['id'] ?? null;
        $quantity = isset($_POST['quantity']) && is_numeric($_POST['quantity']) ? $_POST['quantity'] : 1;
        $variant_option_id = $_POST['skus']['variant_option_id'] ?? null;
        $variant_option_name = $_POST['variant_option_name'] ?? null;
        $variant_option_price = $_POST['prices'] ?? 0;
        
        // Kiểm tra xem có ID sản phẩm không
        if (!$productId) {
            header('Location: /cart');
            exit();
        }

        // Lấy dữ liệu sản phẩm từ SKU
        $skuModel = new Product();
        $productVariants = $skuModel->getSkuByProductAndVariant($productId);
        // Kiểm tra xem có biến thể sản phẩm nào không
        if (!$productVariants) {
            header('Location: /cart');
            exit();
        }

        // Tìm kiếm biến thể phù hợp
        $foundVariant = null;
        
        foreach ($productVariants as $variant) {
            if ($variant[0]['variant_option_id'] == $variant_option_id) {
                // Found the correct variant
                $foundVariant = $variant;
                break;
            }
        }
        
        // If variant was not found, redirect
        if (!$foundVariant) {
            NotificationHelper::error('variant_error', 'Không tìm thấy biến thể phù hợp');
            header('Location: /cart');
            exit();
        }


        // Kiểm tra và lấy giỏ hàng từ cookie
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        
        // Nếu sản phẩm đã có trong giỏ, tăng số lượng lên
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $foundVariant['prices'];  // Cập nhật giá tổng
        } else {
            // Nếu sản phẩm chưa có trong giỏ, thêm vào giỏ
            $cart[$productId] = [
                'id' => $productId,
                'name' => $foundVariant['product_name'],  // Tên sản phẩm
                'image' => $foundVariant['product_image'],  // Hình ảnh sản phẩm
                'price' => $foundVariant['prices'],  // Giá sản phẩm
                'discount_price' => $foundVariant['discount_price'],  // Giá giảm nếu có
                'quantity' => $quantity,
                'variant_option_id' => $variant_option_id,
                'variant_option_name' => $variant_option_name,
                'prices' => $variant_option_price,
                'total_price' => $variant_option_price * $quantity,  // Giá tổng
            ];
        }

        // Thiết lập lại cookie với giỏ hàng mới
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');  // Giới hạn thời gian cookie 30 ngày

        // Chuyển hướng về trang giỏ hàng
        header('Location: /cart');
        exit();
    }
    public static function remove()
    {
        // Lấy ID của sản phẩm từ POST
        $productId = $_POST['id'] ?? null;

        // Nếu không có ID, chuyển hướng về giỏ hàng
        if (!$productId) {
            header('Location: /cart');
            exit();
        }

        // Kiểm tra xem có cookie 'cart' hay không
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productId])) {
            unset($cart[$productId]);  // Xóa sản phẩm khỏi giỏ hàng
        }

        // Cập nhật lại cookie với giỏ hàng đã sửa đổi
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');

        // Chuyển hướng về giỏ hàng sau khi xóa
        header('Location: /cart');
        exit();
    }


    public static function update()
    {
        // Lấy ID sản phẩm và số lượng từ POST
        $productId = $_POST['id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;

        // Nếu không có ID hoặc số lượng, chuyển hướng về giỏ hàng
        if (!$productId || !$quantity) {
            header('Location: /cart');
            exit();
        }

        // Kiểm tra xem có cookie 'cart' hay không
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productId])) {
            // Cập nhật số lượng
            $cart[$productId]['quantity'] = $quantity;
            // Cập nhật lại tổng giá của sản phẩm
            $cart[$productId]['total_price'] = $cart[$productId]['price'] * $quantity;
        }

        // Cập nhật lại cookie với giỏ hàng đã sửa đổi
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');

        // Chuyển hướng về giỏ hàng sau khi cập nhật
        header('Location: /cart');
        exit();
    }
}
