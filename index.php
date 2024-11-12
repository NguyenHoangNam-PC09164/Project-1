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

Route::get('/introduce', 'App\Controllers\Client\HomeController@introduce');
Route::get('/contact', 'App\Controllers\Client\HomeController@contact');
Route::get('/news', 'App\Controllers\Client\HomeController@news');

Route::get('/gioithieu', 'App\Controllers\Client\HomeController@gioithieu');
Route::get('/lienhe', 'App\Controllers\Client\HomeController@lienhe');
Route::get('/tintuc', 'App\Controllers\Client\HomeController@tintuc');

Route::get('/login', 'App\Controllers\Client\AuthController@login');
Route::get('/register', 'App\Controllers\Client\AuthController@register');


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
Route::get('/admin/product', 'App\Controllers\Admin\ProductController@index');

// GET /product/create (hiển thị form thêm sản phẩm)
Route::get('/admin/product/create', 'App\Controllers\Admin\ProductController@create');

// POST /product (tạo mới một sản phẩm)
Route::post('/admin/product', 'App\Controllers\Admin\ProductController@store');

// GET /product/{id} (lấy chi tiết sản phẩm với id cụ thể)
Route::get('/admin/product/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /product/{id} (update sản phẩm với id cụ thể)
Route::put('/admin/product/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /product/{id} (delete sản phẩm với id cụ thể)
Route::delete('/admin/product/{id}', 'App\Controllers\Admin\ProductController@delete');

//USERS
// GET /user (lấy danh sách người dùng)
Route::get('/admin/user', 'App\Controllers\Admin\UserController@index');

// GET /product/{id} (lấy chi tiết loại người dùng với id cụ thể)
Route::get('/admin/user/{id}', 'App\Controllers\Admin\UserController@edit');

// DELETE /user/{id} (delete loại người dùng với id cụ thể)
Route::delete('/admin/user/{id}', 'App\Controllers\Admin\UserController@delete');

//COMMENTS
// GET /comment (lấy danh sách sản phẩm)
Route::get('/admin/comment', 'App\Controllers\Admin\CommentController@index');

// POST /comment (tạo mới một sản phẩm)
Route::post('/admin/comment', 'App\Controllers\Admin\CommentController@store');

// PUT /comment/{id} (update sản phẩm với id cụ thể)
Route:: get('/admin/comment/1', 'App\Controllers\Admin\CommentController@edit');

// DELETE /comment/{id} (delete sản phẩm với id cụ thể)
Route::delete('/admin/comment/{id}', 'App\Controllers\Admin\CommentController@delete');


Route::dispatch($_SERVER['REQUEST_URI']);
