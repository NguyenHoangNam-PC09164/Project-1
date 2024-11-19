<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
                        <div class="page-header">
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Icons</a></li>
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
                                        
                                        <h3 class="card-title">Thêm sản phẩm</h3>
                                        <input type="hidden" name="method" id="" value="POST">
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Tên Sản phẩm</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Hình ảnh</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Số lượng</label>
                                            <input type="text" class="form-control" name="quantity" placeholder="Nhập tên sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Giá</label>
                                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Giá giảm</label>
                                            <input type="text" class="form-control" name="discount_price" placeholder="Nhập giá giảm sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Mô tả</label>
                                            <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
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
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1">Hiện</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Product" class="form-label">Nổi bật</label>
                                            <select name="status" class="form-control">
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1">Hiện</option>
                                                <option value="0">Ẩn</option>
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
