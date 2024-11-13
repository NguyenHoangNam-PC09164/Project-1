<?php

namespace App\Views\Admin\Pages\User;

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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Bảng điều khiển </a></li>
                                            <li class="breadcrumb-item active mt-2" aria-current="page">Người dùng</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="../../../../../public/uploads/users/user1.jpeg" alt="" width="100px"></td>
                                <td>Người dùng 1</td>
                                <td>mark@gmail.com</td>
                                <td>0123658945</td>
                                <td>
                                    <button class="btn btn-primary"><a href="" class="text-light">Thông tin</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><img src="../../../../../public/uploads/users/user2.jpeg" alt="" width="100px"></td>
                                <td>Người dùng 2</td>
                                <td>jacob@gmail.com</td>
                                <td>0599463485</td>
                                <td>
                                    <button class="btn btn-primary"><a href="" class="text-light">Thông tin</a></button>
                                    <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="../../../../../public/uploads/users/user3.jpeg" alt="" width="100px"></td>
                                <td>Người dùng 3</td>
                                <td>otto@gmail.com</td>
                                <td>0225689555</td>
                                <td>
                                    <button class="btn btn-primary"><a href="" class="text-light">Thông tin</a></button>
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
