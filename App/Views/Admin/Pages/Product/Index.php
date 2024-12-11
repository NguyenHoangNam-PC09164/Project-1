<?php

namespace App\Views\Admin\Pages\Product;

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
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Sản phẩm</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (count($data)) :
                    ?>
                        <!-- danh sach loai san pham -->
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Mô tả ngắn</th>
                                    <th scope="col">Mô tả dài</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $item) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $item['product_id'] ?></th>
                                        <td>
                                            <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="" width="100px">
                                        </td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= number_format($item['price']) ?></td>
                                        <td><?= number_format($item['quantity']) ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td>
                                            <a href="#" onclick="showModal('<?= htmlspecialchars($item['long_description'], ENT_QUOTES, 'UTF-8') ?>')">
                                                <?= strlen($item['long_description']) > 200
                                                    ? htmlspecialchars(substr($item['long_description'], 0, 100), ENT_QUOTES, 'UTF-8') . '...'
                                                    : htmlspecialchars($item['long_description'], ENT_QUOTES, 'UTF-8');
                                                ?>
                                            </a>
                                            </a>
                                        </td>

                                        <script>
                                            function showModal(content) {
                                                alert(content);
                                            }
                                        </script>

                                        <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                        <td>
                                            <a href="/admin/products/<?= $item['product_id'] ?>" class="btn btn-primary ">Sửa</a>
                           
                                            <form action="/admin/products/<?= $item['product_id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có muốn xóa?')">
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
    <?php
    }
}
