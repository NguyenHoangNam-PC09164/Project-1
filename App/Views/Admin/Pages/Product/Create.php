<?php

namespace App\Views\Admin\Pages\Product;

use App\Helpers\NotificationHelper;

use App\Views\BaseView;

class Create extends BaseView
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
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Bảng điều khiển</a></li>
                                        <li class="breadcrumb-item active mt-2" aria-current="page"><a href="/admin/products/create" class="link">Thêm sản phẩm</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form class="form" action="/admin/products" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h3 class="card-title custom-title">Thêm sản phẩm</h3>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Giá</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="discount_price" class="form-label">Giá giảm</label>
                                        <input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="Nhập giá giảm sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả ngắn</label>
                                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả ngắn sản phẩm"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="long_description" class="form-label">Mô tả dài</label>
                                        <textarea type="text" class="form-control" name="long_description" id="long_description" placeholder="Nhập mô tả dài sản phẩm"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Số lượng</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Nhập số lượng sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_feature" class="form-label">Nổi bật</label>
                                        <select name="is_feature" id="is_feature" class="form-control">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Loại sản phẩm*</label>
                                        <select class="form-control" style="width: 100%; height:36px;" id="category_id" name="category_id">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data as $item):
                                            ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    }
}
