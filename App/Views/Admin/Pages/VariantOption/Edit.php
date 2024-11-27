<?php

namespace App\Views\Admin\Pages\Variant;

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
                                        <li class="breadcrumb-item active mt-2" aria-current="page">Loại biến thể</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form class="form" action="/admin/variants/<?= $data['id'] ?>" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="method" value="PUT">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên Loại biến thể</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status" value="<?= $data['status'] ?>">
                                            <option value="1" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Hiện</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    }
}
