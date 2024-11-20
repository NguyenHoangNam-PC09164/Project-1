<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     [
        //         'id' => 1,
        //         'name' => 'Category 1',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Category 2',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Category 3',
        //         'status' => 0
        //     ],

        // ];

        $product = new Product();

        $data = $product->getAllProductJoinCategory();

        Header::render();
        // hiển thị giao diện danh sách
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $category= new Category();
        $data=$category->getAllCategory();
        // var_dump($data);
        Header::render();
        // hiển thị form thêm
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation
        $is_valid= ProductValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store','Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }

        $name = $_POST['name'];
        
        $price = $_POST['price'];
        $discount_price = $_POST['discount_price'];
        $description = $_POST['description'];
        $quantity=$_POST['quantity'];
        $is_feature = $_POST['is_feature'];
        $status=$_POST['status'];
        $category_id = $_POST['category_id'];
        
        // kiểm tra tên sp có tồn tại chưa => không được trùng tên
        $product=new Product();
        $is_exist=$product->getOneProductByName($name);

        if($is_exist){
            NotificationHelper::error('store','Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }

        // thực hiện thêm vào csdl
        $data=[
            'name'=>$name,
            
            'price'=>$price,
            'discount_price'=>$discount_price,
            'description'=>$description,
            'quantity'=>$quantity,
            'is_feature'=>$is_feature,   
            'status'=>$status,
            'category_id'=>$category_id,
        ];

        $is_upload =ProductValidation::uploadImage();
        if($is_upload){
            $data['image']=$is_upload;
        }

        $result= $product->createProduct($data);

        if($result){
            NotificationHelper::success('store','Thêm sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else{
            NotificationHelper::error('store','Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Category 1',
        //     'status' => 1
        // ];

        $product=new Product();

        $data_product=$product->getOneProduct($id);

        $category = new Category();

        $data_category= $category->getAllCategory();
        
        if (!$data_product) {
            NotificationHelper::error('edit','Sản phẩm không tồn tại');
            header('location: /admin/products');
            exit;
        }

        $data=[
            'product'=>$data_product,
            'category'=>$data_category
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';
        // validation
        $is_valid= ProductValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }

        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount_price = $_POST['discount_price'];
        $is_feature = $_POST['is_feature'];
        $status=$_POST['status'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        // kiểm tra tên sp có tồn tại chưa => không được trùng tên
        $product=new Product();
        $is_exist=$product->getOneProductByName($name);

        if($is_exist){
            if($is_exist['id']!=$id){
                NotificationHelper::error('update','Tên loại sản phẩm đã tồn tại');
                header("location: /admin/products/$id");
                exit;
            }
        }

        // thực hiện cập nhật vào csdl
        $data=[
            'name'=>$name,
            'price'=>$price,
            'discount_price'=>$discount_price,
            'is_feature'=>$is_feature,
            'status'=>$status,
            'category_id'=>$category_id,
            'description'=>$description
        ];
        $is_upload =ProductValidation::uploadImage();
        if($is_upload){
            $data['image']=$is_upload;
        }

        $result= $product->updateProduct($id,$data);

        if($result){
            NotificationHelper::success('update','Cập nhật sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else{
            NotificationHelper::error('update','Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $product= new Product();

        $result=$product->deleteProduct($id);

        if($result){
            NotificationHelper::success('delete','Xóa sản phẩm thành công');
        } else{
            NotificationHelper::error('delete','Xóa sản phẩm thất bại');
        }
        header('location: /admin/products');
        
    }
}
