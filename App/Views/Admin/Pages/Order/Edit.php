<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
        
?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Bảng điều khiển </a></li>
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Đơn hàng</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" action="/admin/orders/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <h3 class="card-title custom-title">Sửa đơn hàng</h3>
                                        <input type="hidden" name="method" id="" value="PUT">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                                        </div>


                                        <div class="form-group">
                                            <label for="username">Tên khách hàng</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Số điện thoại</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Nhập tên người dùng..." name="phone" value="<?= $data['phone'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" class="form-control" id="address" placeholder="Nhập tên người dùng..." name="address" value="<?= $data['address'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Sản phẩm</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên người dùng..." name="name" value="<?= $data['name'] ?> x <?= $data['quantity'] ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Tổng tiền</label>
                                            <input type="text" class="form-control" id="price" placeholder="Nhập tên người dùng..." name="price" value="<?= $data['price'] ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="order_date">Ngày đặt hàng</label>
                                            <input type="text" class="form-control" id="order_date" placeholder="Nhập tên người dùng..." name="order_date" value="<?= $data['order_date'] ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="payment_status">Trạng thái thanh toán</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="payment_status" name="payment_status" disabled>
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['payment_status'] == 1 ? 'selected' : '') ?>>Đã thanh toán</option>
                                                <option value="0" <?= ($data['payment_status'] == 0 ? 'selected' : '') ?>>Chưa thanh toán</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Trạng thái đơn hàng</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Đã xác nhận</option>
                                                <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Chưa xác nhận</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>


                </div>
            </div>

    <?php
    }
}
