<?php

namespace App\Views\Admin\Pages\Category;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div id="wrapper">
            <div id="page-wrapper">
                <div class="header">
                    <h1 class="page-header">
                        Bảng điều khiển <small>Quản lý loại sản phẩm</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Bảng điều khiển</a></li>
                        <li class="active">Quản lý loại sản phẩm</li>
                    </ol>
                </div>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Danh sách loại sản phẩm</h4>
                                    <?php
                                    if (count($data)) :
                                    ?>
                                        <div class="table-responsive">
                                            <table id="" class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên</th>
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
                                                            <td><?= $item['name'] ?></td>
                                                            <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                            <td>
                                                                <a href="/admin/categories/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                                <form action="/admin/categories/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
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
        </div>



<?php
    }
}
