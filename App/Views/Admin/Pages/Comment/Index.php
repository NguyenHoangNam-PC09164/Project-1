<?php

namespace App\Views\Admin\Pages\Comment;

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
                                            <li class="breadcrumb-item active mt-2" aria-current="page">Bình luận</li>
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
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Bình luận</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Khách hàng 1</td>
                                <td>Bình luận 1</td>
                                <td>Hiện</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="/admin/comment/1" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Khách hàng 2</td>
                                <td>Bình luận 2</td>
                                <td>Ẩn</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="/admin/comment/1" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Khách hàng 3</td>
                                <td>Bình luận 3</td>
                                <td>Hiện</td>
                                <td colspan="2">
                                    <button class="btn btn-warning"><a href="/admin/comment/1" class="text-light">Sửa</a></button>
                                    <button class="btn btn-danger"><a href=""  class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    <?php
    }
}
