<?php

namespace App\Views\Admin\Pages\User;

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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Bảng điều khiển </a></li>
                                        <li class="breadcrumb-item active mt-1" aria-current="page">Người dùng</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" action="/admin/users/<?= $data['user_id'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <h4 class="card-title">Sửa người dùng</h4>
                                        <input type="hidden" name="method" id="" value="PUT">
                                        <div align="center">
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100px">
                                        </div>

                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?= $data['user_id'] ?>" disabled>
                                        </div>


                                        <div class="form-group">
                                            <label for="username">Tên đăng nhập</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="text" class="form-control" id="email" placeholder="Nhập email người dùng..." name="email" value="<?= $data['email'] ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="name">Họ và tên*</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên người dùng..." name="name" value="<?= $data['name'] ?>">
                                        </div>



                                        <div class="form-group">
                                            <label for="name">Số điện thoại*</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Nhập tên người dùng..." name="phone" value="<?= $data['phone'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Trạng thái*</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                                <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Khóa</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="role">Trạng thái*</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="role" name="role">
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['role'] == 1 ? 'selected' : '') ?>>Quản trị viên</option>
                                                <option value="0" <?= ($data['role'] == 0 ? 'selected' : '') ?>>Người dùng</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
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
