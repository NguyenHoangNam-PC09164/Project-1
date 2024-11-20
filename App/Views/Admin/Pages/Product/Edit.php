<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
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
        </div>
        <form class="form-horizontal" action="/admin/products/<?= $data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Product" class="form-label">Tên Sản phẩm</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Hình ảnh</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Giá</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Giá giảm</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Mô tả</label>
                <input type="text" class="form-control" name="Product" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Product" class="form-label">Trạng thái</label>
                <select>
                    <option>Ẩn</option>
                    <option>Hiện</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary ">Cật nhật</button>
        </form>
        </div>
        </div>


<?php
    }
}
