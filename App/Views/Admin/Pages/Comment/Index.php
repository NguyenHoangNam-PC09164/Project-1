<?php

namespace App\Views\Admin\Pages\Comment;

use App\Views\BaseView;

class Index extends BaseView
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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Bảng điều khiển</a></li>
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Bình luận</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- danh sach loai san pham -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Danh sách bình luận</h5>
                                    <?php
                                    if (count($data)) :
                                    ?>
                                        <div class="table-responsive">
                                            <table id="" class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tài khoản</th>
                                                        <th>Sản phẩm</th>
                                                        <th>Nội dung </th>
                                                        <th>Thời gian</th>
                                                        <th>Trạng thái</th>
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
                                                                <a href="/admin/users/<?= $item['user_id'] ?>"><?= $item['user_name'] ?></a>

                                                            </td>
                                                            <td>
                                                                <a href="/admin/products/<?= $item['product_id'] ?>"><?= $item['product_name'] ?></a>


                                                            </td>
                                                            <td><?= $item['content'] ?></td>
                                                            <td><?= $item['date'] ?></td>
                                                            <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                            <td>
                                                                <a href="/admin/comments/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                                <form action="/admin/comments/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
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

                </div>
            </div>

    <?php
    }
}
