<?php

namespace App\Views\Admin\Pages\Category;

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
                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Loại sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>
        </div>
        <!-- danh sach loai san pham -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <?php
                    if (count($data)) :
                    ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên loại sản phẩm</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
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
                                            <a href="/admin/categories/<?= $item['id'] ?>" class="btn btn-warning ">Sửa</a>
                                            <form action="/admin/categories/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <input type="hidden" name="method" value="DELETE" id="">
                                                <button type="submit" class="btn btn-danger text-light">Xoá</button>
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
<?php
    }
}
