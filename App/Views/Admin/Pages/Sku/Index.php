<?php

namespace App\Views\Admin\Pages\Sku;

use App\Views\BaseView;
use App\Models\Sku;

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
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Biến thể sản phẩm</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h3 class="card-title">Danh sách biến thể sản phẩm</h3>  -->
                                <?php
                                if (count($data)) :
                                ?>
                                    <!-- danh sach biến thể san pham -->
                                    <table class="table table-bordered mt-5">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Mã sản phẩm</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Loại biến thể</th>
                                                <th scope="col">Tên biến thể</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Số lượng tồn kho</th>
                                                <th scope="col">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data as $item) :
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $item['id'] ?></th>
                                                    <td><?= $item['sku'] ?></td>
                                                    <td><?= $item['product_name'] ?></td>
                                                    <td><?= $item['product_variant_name'] ?></td>
                                                    <td><?= $item['product_variant_option_name'] ?></td>
                                                    <td><?= number_format($item['price']) ?></td>
                                                    <td><?= number_format($item['stock_quantity']) ?></td>
                                                    <td>
                                                        <a href="/admin/skus/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                        <form action="/admin/skus/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có muốn xóa?')">
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
        <?php
    }
}
