<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Admin\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Search;
use App\Views\Client\Pages\Product\Category as Categorys;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {

        $categories = (new Category())->getAll();

        $product = new Product();
        $products = $product->getAllProductByStatus();
        $products_Views = $product->getAllManyViews();


        $data = [
            'products' => $products,
            'categories' => $categories,
            'products_Views'=>$products_Views
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    public static function detail($id)
    {
        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);
        $categories = $product->getAllProductJoinCategory();


        if (!$product_detail) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }

        $comment = new Comment();
        $comments = $comment->get5CommentNewsByProductAndStatus($id);

        $data = [
            'product' => $product_detail,
            'comments' => $comments
        ];

        // $view_result=ViewProductHelper::cookieView($id, $product_detail['view']);
        // var_dump($view_result);


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }




    public static function search()
    {
        // Lấy từ khóa từ query string
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $products = [];

        // Kiểm tra nếu có từ khóa
        if (!empty($keyword)) {
            $productModel = new Product();
            $products = $productModel->getSearch($keyword);
        }

        // Truyền dữ liệu vào view
        $data = [
            'products' => $products,
            'keyword' => $keyword
        ];

        Header::render();
        Search::render($data); // Dùng view hiển thị danh sách sản phẩm
        Footer::render();
    }
    public static function getProductByCategory($id)
    {


        $productModel = new Product();
        $products = $productModel->getAllProductByCategory($id);
        $categories = (new Category())->getAllCategory();


        $data = [
            'products' => $products,
            'categories' => $categories

        ];

        // Render views
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Categorys::render($data);
        Footer::render();
    }

    public static function filterByPrice()
    {
        // Lấy giá trị khoảng giá từ request
        $minPrice = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
        $maxPrice = isset($_GET['max_price']) ? intval($_GET['max_price']) : PHP_INT_MAX;

        // Gọi phương thức từ Model Product
        $productModel = new Product();
        $products = $productModel->getProductByPriceRange($minPrice, $maxPrice);

        // Lấy danh mục sản phẩm để hiển thị trong view
        $categories = (new Category())->getAllCategory();

        // Truyền dữ liệu vào view
        $data = [
            'products' => $products,
            'categories' => $categories,
            'min_price' => $minPrice,
            'max_price' => $maxPrice
        ];

        // Render views
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function getProductDisplay()
    {
        $productModel = new Product();

        // Lấy tham số sort từ request
        $sortType = isset($_GET['sort']) ? $_GET['sort'] : 'popular';
        if ($sortType === 'featured') {
            // Lấy sản phẩm nổi bật
            $products = $productModel->getAllProductByCategoryAndStatusAndIsFeature();
        } else {
            // Lấy sản phẩm phổ biến (nhiều lượt xem)
            $products = $productModel->getAllManyView();
        }

        // Lấy danh mục sản phẩm
        $categories = (new Category())->getAllCategory();

        // Truyền dữ liệu vào view
        $data = [
            'products' => $products,
            'categories' => $categories,
        ];

        // Render views
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
}
