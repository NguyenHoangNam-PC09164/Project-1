<?php

namespace App\Views\Admin\Pages\VariantOption;

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
                                        <li class="breadcrumb-item active mt-2" aria-current="page"><a href="/admin/variant_options/<?= $data['variant_option']['id'] ?>" class="link">Sửa biến thể</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-title custom-title">Sửa biến thể</h3>
                            <form class="form" action="/admin/variant_options/<?= $data['variant_option']['id'] ?>" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="method" value="PUT">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" value="<?= $data['variant_option']['id'] ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên biến thể</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['variant_option']['name'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_variant_id">Loại biến thể</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_variant_id" name="product_variant_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['variant'] as $item):
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['variant_option']['product_variant_id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
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
