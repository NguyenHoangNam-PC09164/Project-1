<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

ob_start();
use App\Helpers\AuthHelper;
use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';

AuthHelper::middleware();

// *** Client


Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/Category/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');


Route::post('/comments','App\Controllers\Client\CommentController@store');
Route::put('/comments/{id}','App\Controllers\Client\CommentController@update');
Route::delete('/comments/{id}','App\Controllers\Client\CommentController@delete');

Route::get('/checkout', 'App\Controllers\Client\CheckoutController@checkout');
Route::post('/checkoutAction', 'App\Controllers\Client\CheckoutController@checkoutAction');

Route::get('/order', 'App\Controllers\Client\OrderController@order');
Route::get('/order/{id}', 'App\Controllers\Client\OrderController@orderDetail');


Route::post('/orderAction', 'App\Controllers\Client\OrderController@orderAction');

Route::get('/cart', 'App\Controllers\Client\CartController@index');

Route::get('/introduce', 'App\Controllers\Client\HomeController@introduce');
Route::get('/contact', 'App\Controllers\Client\HomeController@contact');
Route::get('/news', 'App\Controllers\Client\HomeController@news');


Route::get('/register','App\Controllers\Client\AuthController@register');
Route::post('/register','App\Controllers\Client\AuthController@registerAction');

Route::get('/login','App\Controllers\Client\AuthController@login');
Route::post('/login','App\Controllers\Client\AuthController@loginAction');

Route::get('/logout','App\Controllers\Client\AuthController@logout');

Route::get('/users/{id}','App\Controllers\Client\AuthController@edit');//
Route::put('/users/{id}','App\Controllers\Client\AuthController@update');

Route::get('/change-password','App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password','App\Controllers\Client\AuthController@changePasswordAction');  

Route::get('/forgot-password','App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password','App\Controllers\Client\AuthController@forgotPasswordAction');

Route::get('/reset-password','App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password','App\Controllers\Client\AuthController@resetPasswordAction'); 

Route::get('/search', 'App\Controllers\Client\ProductController@search');


Route::get('/cart', 'App\Controllers\Client\CartController@index');
Route::post('/cart/add', 'App\Controllers\Client\CartController@add');

Route::post('/cart/remove', 'App\Controllers\Client\CartController@remove');
Route::post('/cart/update', 'App\Controllers\Client\CartController@update');

Route::get('/contact', 'App\Controllers\Client\ContactController@index');
Route::post('/contact/send-email', 'App\Controllers\Client\ContactController@sendEmail');
// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');


//  *** Variant
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/variants', 'App\Controllers\Admin\VariantController@index');

// GET /variants/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/variants/create', 'App\Controllers\Admin\VariantController@create');

// POST /variants (tạo mới một loại sản phẩm)
Route::post('/admin/variants', 'App\Controllers\Admin\VariantController@store');

// GET /variants/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@edit');

// PUT /variants/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@update');

// DELETE /variants/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@delete');


//  *** Variantoption
// GET /variant_options (lấy danh sách loại sản phẩm)
Route::get('/admin/variant_options', 'App\Controllers\Admin\VariantOptionController@index');

// GET /VariantOptions/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/variant_options/create', 'App\Controllers\Admin\VariantOptionController@create');

// POST /VariantOptions (tạo mới một loại sản phẩm)
Route::post('/admin/variant_options', 'App\Controllers\Admin\VariantOptionController@store');

// GET /VariantOptions/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/variant_options/{id}', 'App\Controllers\Admin\VariantOptionController@edit');

// PUT /VariantOptions/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/variant_options/{id}', 'App\Controllers\Admin\VariantOptionController@update');

// DELETE /VariantOptions/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/variant_options/{id}', 'App\Controllers\Admin\VariantOptionController@delete');




//PRODUCTS
// GET /product (lấy danh sách sản phẩm)
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');

// GET /products/create (hiển thị form thêm sản phẩm)
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');

// POST /products (tạo mới một sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /products/{id} (lấy chi tiết sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /products/{id} (update sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /products/{id} (delete sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');


//SKUS
// GET /product (lấy danh sách sản phẩm)
Route::get('/admin/skus', 'App\Controllers\Admin\SkuController@index');

// GET /skus/create (hiển thị form thêm sản phẩm)
Route::get('/admin/skus/create', 'App\Controllers\Admin\SkuController@create');

// POST /skus (tạo mới một sản phẩm)
Route::post('/admin/skus', 'App\Controllers\Admin\SkuController@store');

// GET /skus/{id} (lấy chi tiết sản phẩm với id cụ thể)
Route::get('/admin/skus/{id}', 'App\Controllers\Admin\SkuController@edit');

// PUT /skus/{id} (update sản phẩm với id cụ thể)
Route::put('/admin/skus/{id}', 'App\Controllers\Admin\SkuController@update');

// DELETE /skus/{id} (delete sản phẩm với id cụ thể)
Route::delete('/admin/skus/{id}', 'App\Controllers\Admin\SkuController@delete');





//USERS
// GET /user (lấy danh sách người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /product/{id} (lấy chi tiết loại người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');
// DELETE /user/{id} (delete loại người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');









//COMMENTS
//  *** Comment
// GET /Comment (lấy danh sách  bình luận)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

// GET /comments/{id} (lấy chi tiết  bình luận với id cụ thể)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /comments/{id} (update  bình luận với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /comments/{id} (delete  bình luận với id cụ thể)
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');

Route::dispatch($_SERVER['REQUEST_URI']);

