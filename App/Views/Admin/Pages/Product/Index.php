<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Bảng điều khiển</a></li>
                                            <li class="breadcrumb-item active mt-2" aria-current="page">Sản phẩm</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- danh sach loai san pham -->
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="../../../../../public/uploads/products/anh1.jpg" width="100px" alt="Camera Image"></td>
                                <td>Sản phẩm 1</td>
                                <td>100</td>
                                <td>10</td>
                                <td>Mô tả 1</td>
                                <td>Hiện</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><img src="../../../../../public/uploads/products/anh2.jpg" alt="Camera Image" width='100px'></td>
                                <td>Sản phẩm 2</td>
                                <td>200</td>
                                <td>20</td>
                                <td>Mô tả 2</td>
                                <td>Hiện</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="../../../../../public/uploads/products/anh3.jpg" width="100px" alt="Camera Image"></td>
                                <td>Sản phẩm 3</td>
                                <td>300</td>
                                <td>30</td>
                                <td>Mô tả 3</td>
                                <td>Hiện</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    <?php
    }
}
