<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>

        <div class="page-header">
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
                        <th scope="col">Mô tả</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $item) :
                    ?>
                        <tr>
                            <th scope="row"><?= $item['id'] ?></th>
                            <td>
                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="" width="100px">
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= number_format($item['price']) ?></td>
                            <td><?= number_format($item['quantity']) ?></td>
                            <td><?= $item['description'] ?></td>
                            <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                            <td colspan="2">
                                <button class="btn btn-warning"><a href="" class="text-light">Sửa</a></button>
                                <button class="btn btn-danger"><a href="" class="text-light">Xóa</a></button>
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
