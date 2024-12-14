<?php

namespace App\Views\Admin\Pages\Comment;

use App\Views\BaseView;

class Edit extends BaseView
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
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Bình luận</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" action="/admin/comments/<?= $data['id'] ?>" method="POST">
                                    <div class="card-body">
                                        <h3 class="card-title custom-title">Sửa bình luận</h3>
                                        <input type="hidden" name="method" id="" value="PUT">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Tài khoản</label><input type="text" class="form-control" id="username" name="username" value="<?= $data['user_id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Sản phẩm</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $data['product_id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung</label>
                                            <textarea class="form-control" id="content" name="content" rows="3" disabled><?= $data['content'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Thời gian</label>
                                            <input type="text" class="form-control" id="date" name="date" value="<?= $data['date'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái*</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['status'] ?>" required>
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                                <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    }
}
