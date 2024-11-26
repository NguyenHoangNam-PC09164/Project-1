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
use App\Views\Client\Pages\Product\CategoryView;
class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
 
        // $category= new Category();
        // $categories= $category->getAllCategoryByStatus();
        $product=new Product();
        $products= $product->getAllProductByStatus();

  
        $data = [
            'products' => $products,
            // 'categories' => $categories
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset(); 
        Index::render($data);
        Footer::render();
    }
    
    public static function detail($id)
    {
        $product=new Product();
        $product_detail=$product->getOneProductByStatus($id);
        

        if(!$product_detail){
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }

        $comment=new Comment();
        $comments=$comment->get5CommentNewsByProductAndStatus($id);

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
        $category= new Category();
        $categories=$category->getAllByStatus();

        $product= new Product();
        $products=$product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        CategoryView::render($data);
        Footer::render();
    }
}