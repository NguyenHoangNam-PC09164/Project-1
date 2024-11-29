<?php

namespace App\Views\Admin\Pages\Variant;

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
                            <form class="form px-3" action="/admin/variant_options" method="POST">
                                <div class="card-body">
                                    <input type="hidden" id="" name="method" value="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên loại biến thể</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên biến thể biến thể">
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_variant_id">Loại biến thể*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_variant_id" name="product_variant_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            var_dump($data);
                                            foreach ($data['product_variants'] as $item):
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product_variant_options']['product_variant_id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
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