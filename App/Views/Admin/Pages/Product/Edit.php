<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
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
                    <form class="form">
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
