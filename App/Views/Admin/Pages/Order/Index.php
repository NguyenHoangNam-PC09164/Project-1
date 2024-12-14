<?php

namespace App\Views\Admin\Pages\Order;

use App\Models\Order;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $order = new Order();
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
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title custom-title">Danh sách đơn hàng </h3>
                                    <?php
                                    if (count($data)) :
                                    ?>
                                        <div class="table-responsive">
                                            <table id="" class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên khách hàng</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Ngày đặt hàng</th>
                                                        <th>Trạng thái thanh toán</th>
                                                        <th>Trạng thái đơn hàng</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($data as $item) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $item['id'] ?></td>
                                                            <td>
                                                            <?= $item['name'] ?>
                                                            </td>
                                                            <td><?= $item['phone'] ?></td>
                                                            <td><?= $item['address'] ?></td>
                                                            <td><?= $item['order_date'] ?></td>
                                                            <td><?= ($item['payment_status'] == 1) ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                                                            <td><?= ($item['status'] == 1) ? 'Đã xác nhận' : 'Chưa xác nhận' ?></td>
                                                            <td>
                                                                <a href="/admin/orders/detail/<?= $item['id']?>">Chi tiết</a>
                                                            </td>
                                                            <td>
                                                                <a href="/admin/orders/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                                
                                                                    <form action="/admin/orders/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                                        <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                                    </form>

                                                                
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    endforeach;


                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else :

                                    ?>
                                        <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                    <?php
                                    endif;

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>

            </div>

    <?php
    }
}
