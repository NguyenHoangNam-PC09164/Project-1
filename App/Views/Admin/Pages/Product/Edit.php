<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($data);
?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Bảng điều khiển</a></li>
                                        <li class="breadcrumb-item active mt-2" aria-current="page"><a href="/admin/products/<?=$data['product']['product_id']?>" class="link">Sửa sản phẩm</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/products/<?= $data['product']['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h3 class="card-title custom-title">Sửa sản phẩm</h3>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" width="300px">
                                    </div>
                                    <div class="mb-3">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['product']['product_id'] ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Tên*</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['product']['name'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Giá*</label>
                                        <input type="number" class="form-control" id="price" name="price" value="<?= $data['product']['price'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="discount_price">Giá giảm*</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" value="<?= $data['product']['discount_price'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Mô tả ngắn*</label>
                                        <textarea class="form-control" id="description" name="description"><?= $data['product']['description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="long_description">Mô tả dài*</label>
                                        <textarea class="form-control" id="long_description" name="long_description"><?= $data['product']['long_description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity">Số lượng*</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $data['product']['quantity'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id">Loại sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['category'] as $item):
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product']['category_id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_feature">Nổi bật*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['is_feature'] == 1 ? 'selected' : '') ?>>Nổi bật</option>
                                            <option value="0" <?= ($data['product']['is_feature'] == 0 ? 'selected' : '') ?>>Không</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['product']['status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['product']['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Cật nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    }
}
