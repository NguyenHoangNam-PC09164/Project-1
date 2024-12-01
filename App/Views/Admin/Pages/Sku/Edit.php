<?php

namespace App\Views\Admin\Pages\Sku;

use App\Helpers\NotificationHelper;

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
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Sửa biến thể sản phẩm</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form class="form" action="/admin/skus/<?=$data['data_sku']['id']?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h3 class="card-title">Sửa biến thể sản phẩm</h3>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" placeholder="Nhập mã sản phẩm" value="<?=$data['data_sku']['id']?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sku_name" class="form-label">Mã sản phẩm</label>
                                        <input type="text" class="form-control" name="sku_name" id="sku_name" placeholder="Nhập mã sản phẩm" value="<?=$data['data_sku']['sku_name']?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="variant_option_id" class="form-label">Biến thể*</label>
                                        <select class="form-control" style="width: 100%; height:36px;" id="variant_option_id" name="variant_option_id" disabled >
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['data_variant_option'] as $item):
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?=($item['id']==$data['data_sku']['variant_option_id'] ? 'selected' : "") ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_id" class="form-label">Tên sản phẩm*</label>
                                        <select class="form-control" style="width: 100%; height:36px;" id="product_id" name="product_id" onchange="updateVariantOptions(this.value)" disabled>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['data_product'] as $item):
                                            ?>
                                                <option value="<?= $item['product_id'] ?>" <?=($item['product_id']==$data['data_sku']['product_id'] ? 'selected' : "") ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Giá</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm" value="<?=$data['data_sku']['price']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock_quantity" class="form-label">Số lượng tồn kho</label>
                                        <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" placeholder="Nhập số lượng tồn kho" value="<?=$data['data_sku']['stock_quantity']?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Cật nhật</button>
                                </div>
                            </form>
                            <!-- <?var_dump($data)?>; -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- <script>
                function updateVariantOptions(selectedValue) {
                    // Lấy `variant_option_id` select box
                    const variantOptionSelect = document.getElementById('variant_option_id');

                    // Xóa toàn bộ các `option` cũ  
                    variantOptionSelect.innerHTML = '<option value="" selected disabled>Vui lòng chọn...</option> '
                                            

                                                
                    // Gửi AJAX request đến server để lấy dữ liệu mới   
                    fetch(`../../../../Models/getVariantOptionById.php.php?product_variant_id=${selectedValue}`)     
                        .then(response => response.json())
                        .then(data => {
                            // Thêm các `option` mới vào select box
                            data.forEach(option => {
                                const newOption = document.createElement('option');
                                newOption.value = option.id;
                                newOption.textContent = option.name;
                                variantOptionSelect.appendChild(newOption);
                            });
                        })
                        .catch(error => console.error('Error fetching variant options:', error));
                }
            </script> -->

    <?php

    }
}
