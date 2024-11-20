<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');

Route::get('/checkout', 'App\Controllers\Client\ProductController@checkout');
Route::get('/cart', 'App\Controllers\Client\ProductController@cart');

Route::get('/introduce', 'App\Controllers\Client\HomeController@introduce');
Route::get('/contact', 'App\Controllers\Client\HomeController@contact');
Route::get('/news', 'App\Controllers\Client\HomeController@news');


Route::get('/register','App\Controllers\Client\AuthController@register');
Route::post('/register','App\Controllers\Client\AuthController@registerAction');

Route::get('/login','App\Controllers\Client\AuthController@login');
Route::post('/login','App\Controllers\Client\AuthController@loginAction');

Route::get('/logout','App\Controllers\Client\AuthController@logout');


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
Route::get('/admin/comment', 'App\Controllers\Admin\CommentController@index');

// GET /comments/{id} (lấy chi tiết  bình luận với id cụ thể)
Route::get('/admin/comment/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /comments/{id} (update  bình luận với id cụ thể)
Route::put('/admin/comment/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /comments/{id} (delete  bình luận với id cụ thể)
Route::delete('/admin/comment/{id}', 'App\Controllers\Admin\CommentController@delete');

Route::dispatch($_SERVER['REQUEST_URI']);

