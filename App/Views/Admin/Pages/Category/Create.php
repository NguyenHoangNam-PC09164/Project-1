<?php

namespace App\Views\Admin\Pages\Category;

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
                                        <li class="breadcrumb-item active mt-2" aria-current="page"><a href="/admin/categories/create" class="link">Thêm loại sản phẩm</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form class="form px-3" action="/admin/categories" method="POST">
                                <div class="card-body">
                                    <h3 class="card-title custom-title">Thêm loại sản phẩm</h3>
                                    <input type="hidden" id="" name="method" value="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên loại sản phẩm</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên loại sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Vui lòng chọn...</option>
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
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
