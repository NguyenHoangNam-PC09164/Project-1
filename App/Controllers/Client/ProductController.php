<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Shop\Checkout;
use App\Views\Client\Pages\Shop\Cart;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $categories = [
            [
                'id' => 1,
                'name' => 'Category 1',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Category 2',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Category 3',
                'status' => 1
            ],

        ];
        $products = [
            [
                'id' => 1,
                'name' => 'Sản phẩm 1',
                'description' => 'Mô tả sản phẩm 1',
                'price' => 100000,
                'discount_price' => 10000,
                'image' => '../../../public/assets/client/img/product11.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Sản phẩm 2',
                'description' => 'Mô tả sản phẩm 2',
                'price' => 200000,
                'discount_price' => 20000,
                'image' => '../../../public/assets/client/img/product12.jpg',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Sản phẩm 3',
                'description' => 'Mô tả sản phẩm 3',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => '../../../public/assets/client/img/product13.jpg',
                'status' => 1
            ],
            [
                'id' => 4,
                'name' => 'Sản phẩm 4',
                'description' => 'Mô tả sản phẩm 4',
                'price' => 100000,
                'discount_price' => 10000,
                'image' => '../../../public/assets/client/img/product14.jpg',
                'status' => 1
            ],
            [
                'id' => 5,
                'name' => 'Sản phẩm 5',
                'description' => 'Mô tả sản phẩm 2',
                'price' => 200000,
                'discount_price' => 20000,
                'image' => '../../../public/assets/client/img/product15.jpg',
                'status' => 1
            ],
            [
                'id' => 6,
                'name' => 'Sản phẩm 6',
                'description' => 'Mô tả sản phẩm 3',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => '../../../public/assets/client/img/product16.jpg',
                'status' => 1
            ],[
                'id' => 7,
                'name' => 'Sản phẩm 7',
                'description' => 'Mô tả sản phẩm 1',
                'price' => 100000,
                'discount_price' => 10000,
                'image' => '../../../public/assets/client/img/product17.jpg',
                'status' => 1
            ],
            [
                'id' => 8,
                'name' => 'Sản phẩm 8',
                'description' => 'Mô tả sản phẩm 2',
                'price' => 200000,
                'discount_price' => 20000,
                'image' => '../../../public/assets/client/img/product18.jpg',
                'status' => 1
            ],
            [
                'id' => 9,
                'name' => 'Sản phẩm 9',
                'description' => 'Mô tả sản phẩm 3',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => '../../../public/assets/client/img/product19.jpg',
                'status' => 1
            ],

        ];
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();

        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $product_detail = [
            'id' => $id,
            'name' => 'Sản phẩm 1',
            'description' => 'Mô tả sản phẩm 1',
            'price' => 100000,
            'discount_price' => 10000,
            'image' => 'product11.jpg',
            'status' => 1
        ];
        $data = [
            'products' => $product_detail
        ];
        Header::render();

        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
    }

    public static function checkout(){
        Header::render();
        Checkout::render();
        Footer::render();
    }
    public static function cart(){
        Header::render();
        Cart::render();
        Footer::render();
    }
}
