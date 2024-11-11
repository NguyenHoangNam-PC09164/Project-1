<?php

namespace App\Views\Admin\Pages\Category;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div id="wrapper">
            <!-- /. NAV SIDE  -->
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

                <!-- Form thêm -->
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <form class="form-horizontal" action="/admin/categories" method="POST">
                                    <div class="card-body">
                                        <h4 class="card-title">Thêm loại sản phẩm</h4>
                                        <input type="hidden" name="method" id="" value="POST">
                                        <div class="form-group">
                                            <label for="name">Tên*</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái*</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                            <button type="submit" class="btn btn-primary" name="">Thêm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

<?php
    }
}
