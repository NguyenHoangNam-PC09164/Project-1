<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
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
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Bảng điều khiển</a></li>
                                            <li class="breadcrumb-item active pt-2" aria-current="page"><a href="/admin" class="link">Thống kê</a></li>
                                            <!-- <?= var_dump($data); ?> -->
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary bg-gradient">
                                    <div class="card-body"> 
                                        <h5 class="text-muted">Sản phẩm</h5>
                                        <div class="metric-value d-inline-block ">
                                            <h1 class="mb-1 text-count"><i class="bi bi-camera mx-2 icon" style="font-size:60px;"></i><?= $data['data_count_product']['total'] ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary bg-info">
                                    <div class="card-body"> 
                                        <h5 class="text-muted">Khách hàng mới</h5>
                                        <div class="metric-value d-inline-block ">
                                            <h1 class="mb-1 text-count"><i class="bi bi-person-fill icon mx-2"></i><?= $data['data_count_user']['total'] ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary bg-warning-subtle">
                                    <div class="card-body"> 
                                        <h5 class="text-muted">Tổng số đơn hàng đã đặt</h5>
                                        <div class="metric-value d-inline-block ">
                                            <h1 class="mb-1 text-count"><i class="bi bi-camera mx-2 icon" style="font-size:60px;"></i><?= $data['data_count_user']['total'] ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h3 class="card-title ">Danh mục loại sản phẩm</h3>
                                    <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h3 class="card-title">Top 5 Sản phẩm bán chạy nhất</h3>
                                    <div class="card-body">
                                        <div id="morris_totalrevenue"></div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">26,000,000</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h3 class="card-title">Đơn hàng đã đặt gần đây</h3>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Hình ảnh</th>
                                                        <th class="border-0">Tên sản phẩm</th>
                                                        <th class="border-0">Mã sản phẩm</th>
                                                        <th class="border-0">Số lượng</th>
                                                        <th class="border-0">Giá</th>
                                                        <th class="border-0">Thời gian</th>
                                                        <th class="border-0">Khách hàng</th>
                                                        <th class="border-0">Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh1.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Sony </td>
                                                        <td>id000001 </td>
                                                        <td>20</td>
                                                        <td>800.000</td>
                                                        <td>27-08-2018 01:22:12</td>
                                                        <td>Patricia J. King </td>
                                                        <td><span class="badge-dot badge-brand mr-1"></span>Đang giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh2.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh phim </td>
                                                        <td>id000002 </td>
                                                        <td>12</td>
                                                        <td>180.000</td>
                                                        <td>25-08-2018 21:12:56</td>
                                                        <td>Rachel J. Wicker </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Nikon </td>
                                                        <td>id000003 </td>
                                                        <td>23</td>
                                                        <td>820.000</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>Michael K. Ledford </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Canon </td>
                                                        <td>id000004 </td>
                                                        <td>34</td>
                                                        <td>340.000</td>
                                                        <td>23-08-2018 09:12:35</td>
                                                        <td>Michael K. Ledford </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">Xem chi tiết</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h3 class="card-title">Sản phẩm được yêu thích nhất</h3>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Hình ảnh</th>
                                                        <th class="border-0">Tên sản phẩm</th>
                                                        <th class="border-0">Mã sản phẩm</th>
                                                        <th class="border-0">Số lượng</th>
                                                        <th class="border-0">Giá</th>
                                                        <th class="border-0">Thời gian đặt hàng</th>
                                                        <th class="border-0">Khách hàng</th>
                                                        <th class="border-0">Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh1.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Sony </td>
                                                        <td>id000001 </td>
                                                        <td>20</td>
                                                        <td>800.000</td>
                                                        <td>27-08-2018 01:22:12</td>
                                                        <td>Patricia J. King </td>
                                                        <td><span class="badge-dot badge-brand mr-1"></span>Đang giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh2.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh phim </td>
                                                        <td>id000002 </td>
                                                        <td>12</td>
                                                        <td>180.000</td>
                                                        <td>25-08-2018 21:12:56</td>
                                                        <td>Rachel J. Wicker </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Nikon </td>
                                                        <td>id000003 </td>
                                                        <td>23</td>
                                                        <td>820.000</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>Michael K. Ledford </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Máy ảnh Canon </td>
                                                        <td>id000004 </td>
                                                        <td>34</td>
                                                        <td>340.000</td>
                                                        <td>23-08-2018 09:12:35</td>
                                                        <td>Michael K. Ledford </td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã giao </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">Xem chi tiết</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Customer Acquisition</h5>
                                    <div class="card-body">
                                        <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                                        <div class="text-center">
                                            <span class="legend-item mr-2">
                                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                                <span class="legend-text">Returning</span>
                                            </span>
                                            <span class="legend-item mr-2">

                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                                <span class="legend-text">First Time</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>


    <?php

    }
}

    ?>