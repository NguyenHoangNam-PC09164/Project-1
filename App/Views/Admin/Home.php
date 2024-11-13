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
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Bảng điều khiển</a></li>
                                            <!-- <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories" class="">Loại sản phẩm</a></li> -->
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ecommerce-widget">
                        <!-- <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Tổng doanh thu</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$12099</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Doanh thu liên kết</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$12099</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Refunds</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">0.00</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Avg. Revenue Per User</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$28000</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>-2.00%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Product Category</h5>
                                    <div class="card-body">
                                        <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                                        <div class="text-center m-t-40">
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                                <span class="legend-text">Woman</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                                <span class="legend-text">Accessories</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">

                                        <h5 class="mb-0"> Product Sales</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="ct-chart-product ct-golden-section"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">

                                <div class="card">
                                    <h5 class="card-header">Top Performing Campaigns</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Campaign</th>
                                                        <th class="border-0">Visits</th>
                                                        <th class="border-0">Revenue</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Campaign#1</td>
                                                        <td>98,789 </td>
                                                        <td>$4563</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#2</td>
                                                        <td>2,789 </td>
                                                        <td>$325</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#3</td>
                                                        <td>1,459 </td>
                                                        <td>$225</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#4</td>
                                                        <td>5,035 </td>
                                                        <td>$856</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#5</td>
                                                        <td>10,000 </td>
                                                        <td>$1000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#5</td>
                                                        <td>10,000 </td>
                                                        <td>$1000</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <a href="#" class="btn btn-outline-light float-right">Details</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Bán hàng</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">12,000,000</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Khách hàng mới</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">1,245</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Lượt truy cập</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">13000</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Tỏng số đơn hàng được đặt</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">1,340</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Doanh thu theo danh mục</h5>
                                    <!-- <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div> -->
                                    <div id="c3chart_category" style="height: 460px;position: relative;" class="c3">
                                        <svg width="292.3636474609375" height="420" style="overflow: hidden;">
                                            <defs>
                                                <clipPath id="c3-1731510706108-clip">
                                                    <rect width="292.3636474609375" height="376"></rect>
                                                </clipPath>
                                                <clipPath id="c3-1731510706108-clip-xaxis">
                                                    <rect x="-31" y="-20" width="354.3636474609375" height="60"></rect>
                                                </clipPath>
                                                <clipPath id="c3-1731510706108-clip-yaxis">
                                                    <rect x="-29" y="-4" width="20" height="400"></rect>
                                                </clipPath>
                                                <clipPath id="c3-1731510706108-clip-grid">
                                                    <rect width="292.3636474609375" height="376"></rect>
                                                </clipPath>
                                                <clipPath id="c3-1731510706108-clip-subchart">
                                                    <rect width="292.3636474609375" height="0"></rect>
                                                </clipPath>
                                            </defs>
                                            <g transform="translate(0.5,4.5)">
                                                <text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="146.18182373046875" y="188" style="opacity: 0;"></text>
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip)" class="c3-regions" style="visibility: hidden;"></g>
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-grid)" class="c3-grid" style="visibility: hidden;">
                                                    <g class="c3-xgrid-focus">
                                                        <line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="376" style="visibility: hidden;"></line>
                                                    </g>
                                                </g>
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip)" class="c3-chart">
                                                    <g class="c3-chart-bars">
                                                        <g class="c3-chart-bar c3-target c3-target-Men" style="pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Men c3-bars c3-bars-Men" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-bar c3-target c3-target-Women" style="pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Women c3-bars c3-bars-Women" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-bar c3-target c3-target-Accessories" style="pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Accessories c3-bars c3-bars-Accessories" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-bar c3-target c3-target-Children" style="pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Children c3-bars c3-bars-Children" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-bar c3-target c3-target-Apperal" style="pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Apperal c3-bars c3-bars-Apperal" style="cursor: pointer;"></g>
                                                        </g>
                                                    </g>
                                                    <g class="c3-chart-lines">
                                                        <g class="c3-chart-line c3-target c3-target-Men" style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Men c3-lines c3-lines-Men"></g>
                                                            <g class=" c3-shapes c3-shapes-Men c3-areas c3-areas-Men"></g>
                                                            <g class=" c3-selected-circles c3-selected-circles-Men"></g>
                                                            <g class=" c3-shapes c3-shapes-Men c3-circles c3-circles-Men" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-line c3-target c3-target-Women" style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Women c3-lines c3-lines-Women"></g>
                                                            <g class=" c3-shapes c3-shapes-Women c3-areas c3-areas-Women"></g>
                                                            <g class=" c3-selected-circles c3-selected-circles-Women"></g>
                                                            <g class=" c3-shapes c3-shapes-Women c3-circles c3-circles-Women" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-line c3-target c3-target-Accessories" style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Accessories c3-lines c3-lines-Accessories"></g>
                                                            <g class=" c3-shapes c3-shapes-Accessories c3-areas c3-areas-Accessories"></g>
                                                            <g class=" c3-selected-circles c3-selected-circles-Accessories"></g>
                                                            <g class=" c3-shapes c3-shapes-Accessories c3-circles c3-circles-Accessories" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-line c3-target c3-target-Children" style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Children c3-lines c3-lines-Children"></g>
                                                            <g class=" c3-shapes c3-shapes-Children c3-areas c3-areas-Children"></g>
                                                            <g class=" c3-selected-circles c3-selected-circles-Children"></g>
                                                            <g class=" c3-shapes c3-shapes-Children c3-circles c3-circles-Children" style="cursor: pointer;"></g>
                                                        </g>
                                                        <g class="c3-chart-line c3-target c3-target-Apperal" style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-shapes c3-shapes-Apperal c3-lines c3-lines-Apperal"></g>
                                                            <g class=" c3-shapes c3-shapes-Apperal c3-areas c3-areas-Apperal"></g>
                                                            <g class=" c3-selected-circles c3-selected-circles-Apperal"></g>
                                                            <g class=" c3-shapes c3-shapes-Apperal c3-circles c3-circles-Apperal" style="cursor: pointer;"></g>
                                                        </g>
                                                    </g>
                                                    <g class="c3-chart-arcs" transform="translate(146.18182373046875,183)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;"></text>
                                                        <g class="c3-chart-arc c3-target c3-target-Men">
                                                            <g class=" c3-shapes c3-shapes-Men c3-arcs c3-arcs-Men">
                                                                <path class=" c3-shape c3-shape c3-arc c3-arc-Men" transform="" style="fill: rgb(89, 105, 255); cursor: pointer;" d="M8.503502369939456e-15,-138.87273254394532A138.87273254394532,138.87273254394532,0,0,1,114.94343287060791,77.9335812351917L68.96605972236475,46.76014874111501A83.32363952636719,83.32363952636719,0,0,0,5.102101421963673e-15,-83.32363952636719Z"></path>
                                                            </g><text dy=".35em" class="" transform="translate(98.1565854781655,-52.03932808530274)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                        </g>
                                                        <g class="c3-chart-arc c3-target c3-target-Women">
                                                            <g class=" c3-shapes c3-shapes-Women c3-arcs c3-arcs-Women">
                                                                <path class=" c3-shape c3-shape c3-arc c3-arc-Women" transform="" style="fill: rgb(255, 64, 123); cursor: pointer;" d="M114.94343287060791,77.9335812351917A138.87273254394532,138.87273254394532,0,0,1,-95.50270301996736,100.82097777795097L-57.30162181198041,60.492586666770585A83.32363952636719,83.32363952636719,0,0,0,68.96605972236475,46.76014874111501Z"></path>
                                                            </g><text dy=".35em" class="" transform="translate(12.011826822801584,110.44692370854527)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                        </g>
                                                        <g class="c3-chart-arc c3-target c3-target-Accessories">
                                                            <g class=" c3-shapes c3-shapes-Accessories c3-arcs c3-arcs-Accessories">
                                                                <path class=" c3-shape c3-shape c3-arc c3-arc-Accessories" transform="" style="fill: rgb(37, 213, 242); cursor: pointer;" d="M-95.50270301996736,100.82097777795097A138.87273254394532,138.87273254394532,0,0,1,-133.8108204038426,-37.15239140449445L-80.28649224230554,-22.29143484269667A83.32363952636719,83.32363952636719,0,0,0,-57.30162181198041,60.492586666770585Z"></path>
                                                            </g><text dy=".35em" class="" transform="translate(-107.04865632307404,29.721913123595684)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                        </g>
                                                        <g class="c3-chart-arc c3-target c3-target-Children">
                                                            <g class=" c3-shapes c3-shapes-Children c3-arcs c3-arcs-Children">
                                                                <path class=" c3-shape c3-shape c3-arc c3-arc-Children" transform="" style="fill: rgb(255, 199, 80); cursor: pointer;" d="M-133.8108204038426,-37.15239140449445A138.87273254394532,138.87273254394532,0,0,1,-58.31114689909616,-126.03747851942373L-34.98668813945769,-75.62248711165424A83.32363952636719,83.32363952636719,0,0,0,-80.28649224230554,-22.29143484269667Z"></path>
                                                            </g><text dy=".35em" class="" transform="translate(-84.67482178950722,-71.92344190330009)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                        </g>
                                                        <g class="c3-chart-arc c3-target c3-target-Apperal">
                                                            <g class=" c3-shapes c3-shapes-Apperal c3-arcs c3-arcs-Apperal">
                                                                <path class=" c3-shape c3-shape c3-arc c3-arc-Apperal" transform="" style="fill: rgb(46, 197, 81); cursor: pointer;" d="M-58.31114689909616,-126.03747851942373A138.87273254394532,138.87273254394532,0,0,1,-2.5510507109818365e-14,-138.87273254394532L-1.5306304265891017e-14,-83.32363952636719A83.32363952636719,83.32363952636719,0,0,0,-34.98668813945769,-75.62248711165424Z"></path>
                                                            </g><text dy=".35em" class="" transform="translate(-23.882825958623815,-108.50077218403689)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text>
                                                        </g>
                                                    </g>
                                                    <g class="c3-chart-texts">
                                                        <g class="c3-chart-text c3-target c3-target-Men  " style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-texts c3-texts-Men"></g>
                                                        </g>
                                                        <g class="c3-chart-text c3-target c3-target-Women  " style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-texts c3-texts-Women"></g>
                                                        </g>
                                                        <g class="c3-chart-text c3-target c3-target-Accessories  " style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-texts c3-texts-Accessories"></g>
                                                        </g>
                                                        <g class="c3-chart-text c3-target c3-target-Children  " style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-texts c3-texts-Children"></g>
                                                        </g>
                                                        <g class="c3-chart-text c3-target c3-target-Apperal  " style="opacity: 1; pointer-events: none;">
                                                            <g class=" c3-texts c3-texts-Apperal"></g>
                                                        </g>
                                                    </g>
                                                    <g class="c3-event-rects" style="fill-opacity: 0;">
                                                        <rect class="c3-event-rect" x="0" y="0" width="292.3636474609375" height="376"></rect>
                                                    </g>
                                                </g>
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-grid)" class="c3-grid c3-grid-lines">
                                                    <g class="c3-xgrid-lines"></g>
                                                    <g class="c3-ygrid-lines"></g>
                                                </g>
                                                <g class="c3-axis c3-axis-x" clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-xaxis)" transform="translate(0,376)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="292.3636474609375" dx="-0.5em" dy="-0.5em"></text>
                                                    <g class="tick" transform="translate(147, 0)" style="opacity: 1;">
                                                        <line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;">
                                                            <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                        </text>
                                                    </g>
                                                    <path class="domain" d="M0,6V0H292.3636474609375V6"></path>
                                                </g>
                                                <g class="c3-axis c3-axis-y" clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text>
                                                    <g class="tick" transform="translate(0,345)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">20</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,306)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">30</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,267)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">40</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,228)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">50</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,189)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">60</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,150)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">70</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,111)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">80</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,72)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">90</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,33)" style="opacity: 1;">
                                                        <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                            <tspan x="-9" dy="3">100</tspan>
                                                        </text>
                                                    </g>
                                                    <path class="domain" d="M-6,1H0V376H-6"></path>
                                                </g>
                                                <g class="c3-axis c3-axis-y2" transform="translate(292.3636474609375,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text>
                                                    <g class="tick" transform="translate(0,376)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,339)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.1</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,301)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.2</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,264)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.3</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,226)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.4</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,189)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.5</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,151)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.6</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,114)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.7</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,76)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.8</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,39)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">0.9</tspan>
                                                        </text>
                                                    </g>
                                                    <g class="tick" transform="translate(0,1)" style="opacity: 1;">
                                                        <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                            <tspan x="9" dy="3">1</tspan>
                                                        </text>
                                                    </g>
                                                    <path class="domain" d="M6,1H0V376H6"></path>
                                                </g>
                                            </g>
                                            <g transform="translate(0.5,420.5)" style="visibility: hidden;">
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-subchart)" class="c3-chart">
                                                    <g class="c3-chart-bars"></g>
                                                    <g class="c3-chart-lines"></g>
                                                </g>
                                                <g clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip)" class="c3-brush" fill="none" pointer-events="all" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    <rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0" width="292.3636474609375" height="0"></rect>
                                                    <rect class="selection" cursor="move" fill="#777" fill-opacity="0.3" stroke="#fff" shape-rendering="crispEdges" style="display: none;"></rect>
                                                    <rect class="handle handle--e" cursor="ew-resize" style="display: none;"></rect>
                                                    <rect class="handle handle--w" cursor="ew-resize" style="display: none;"></rect>
                                                </g>
                                                <g class="c3-axis-x" transform="translate(0,0)" clip-path="url(http://127.0.0.1:8080/admin#c3-1731510706108-clip-xaxis)" style="opacity: 0;">
                                                    <g class="tick" transform="translate(147, 0)" style="opacity: 1;">
                                                        <line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;">
                                                            <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                        </text>
                                                    </g>
                                                    <path class="domain" d="M0,6V0H292.3636474609375V6"></path>
                                                </g>
                                            </g>
                                            <g transform="translate(0,380)">
                                                <g class="c3-legend-item c3-legend-item-Men" style="visibility: visible; cursor: pointer;"><text x="54.81249809265137" y="9" style="pointer-events: none;">Men</text>
                                                    <rect class="c3-legend-item-event" x="40.81249809265137" y="-5" width="50.67045593261719" height="19.272727966308594" style="fill-opacity: 0;"></rect>
                                                    <line class="c3-legend-item-tile" x1="38.81249809265137" y1="4" x2="48.81249809265137" y2="4" stroke-width="10" style="stroke: rgb(89, 105, 255); pointer-events: none;"></line>
                                                </g>
                                                <g class="c3-legend-item c3-legend-item-Women" style="visibility: visible; cursor: pointer;"><text x="105.48295402526855" y="9" style="pointer-events: none;">Women</text>
                                                    <rect class="c3-legend-item-event" x="91.48295402526855" y="-5" width="68.20454788208008" height="19.272727966308594" style="fill-opacity: 0;"></rect>
                                                    <line class="c3-legend-item-tile" x1="89.48295402526855" y1="4" x2="99.48295402526855" y2="4" stroke-width="10" style="stroke: rgb(255, 64, 123); pointer-events: none;"></line>
                                                </g>
                                                <g class="c3-legend-item c3-legend-item-Accessories" style="visibility: visible; cursor: pointer;"><text x="173.68750190734863" y="9" style="pointer-events: none;">Accessories</text>
                                                    <rect class="c3-legend-item-event" x="159.68750190734863" y="-5" width="91.8636474609375" height="19.272727966308594" style="fill-opacity: 0;"></rect>
                                                    <line class="c3-legend-item-tile" x1="157.68750190734863" y1="4" x2="167.68750190734863" y2="4" stroke-width="10" style="stroke: rgb(37, 213, 242); pointer-events: none;"></line>
                                                </g>
                                                <g class="c3-legend-item c3-legend-item-Children" style="visibility: visible; cursor: pointer;"><text x="93.13636779785156" y="28.272727966308594" style="pointer-events: none;">Children</text>
                                                    <rect class="c3-legend-item-event" x="79.13636779785156" y="14.272727966308594" width="74" height="19.272727966308594" style="fill-opacity: 0;"></rect>
                                                    <line class="c3-legend-item-tile" x1="77.13636779785156" y1="23.272727966308594" x2="87.13636779785156" y2="23.272727966308594" stroke-width="10" style="stroke: rgb(255, 199, 80); pointer-events: none;"></line>
                                                </g>
                                                <g class="c3-legend-item c3-legend-item-Apperal" style="visibility: visible; cursor: pointer;"><text x="167.13636779785156" y="28.272727966308594" style="pointer-events: none;">Apperal</text>
                                                    <rect class="c3-legend-item-event" x="153.13636779785156" y="14.272727966308594" width="60.090911865234375" height="19.272727966308594" style="fill-opacity: 0;"></rect>
                                                    <line class="c3-legend-item-tile" x1="151.13636779785156" y1="23.272727966308594" x2="161.13636779785156" y2="23.272727966308594" stroke-width="10" style="stroke: rgb(46, 197, 81); pointer-events: none;"></line>
                                                </g>
                                            </g><text class="c3-title" x="146.18182373046875" y="0"></text>
                                        </svg>
                                        <div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Tổng doanh thu</h5>
                                    <div class="card-body">
                                        <div id="morris_totalrevenue"></div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="card">
                                    <h5 class="card-header"> Sales By Social Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="social-sales list-group list-group-flush">
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle facebook-bgcolor mr-2"><i class="fab fa-facebook-f"></i></span><span class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">120 Sales</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-twitter"></i></span><span class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">99 Sales</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">76 Sales</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle pinterest-bgcolor mr-2"><i class="fab fa-pinterest-p"></i></span><span class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56 Sales</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle googleplus-bgcolor mr-2"><i class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google Plus</span><span class="social-sales-count text-dark">36 Sales</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="#" class="btn-primary-link">View Details</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="card">
                                    <h5 class="card-header"> Sales By Traffic Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="traffic-sales list-group list-group-flush">
                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Direct</span><span class="traffic-sales-amount">$4000.00 <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                            </li>
                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Search<span class="traffic-sales-amount">$3123.00 <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                                </span>
                                            </li>
                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Social<span class="traffic-sales-amount ">$3099.00 <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                                </span>
                                            </li>
                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Referrals<span class="traffic-sales-amount ">$2220.00 <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">4.02%</span></span>
                                                </span>
                                            </li>
                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Email<span class="traffic-sales-amount">$1567.00 <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">3.86%</span></span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="#" class="btn-primary-link">View Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Sales By Country Traffic Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="country-sales list-group list-group-flush">
                                            <li class="country-sales-content list-group-item"><span class="mr-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> </span>
                                                <span class="">United States</span><span class="float-right text-dark">78%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span class="">Canada</span><span class="float-right text-dark">7%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span class="">Russia</span><span class="float-right text-dark">4%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-in" title="in" id="in"></i></span><span class="">India</span><span class="float-right text-dark">12%</span>
                                            </li>
                                            <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span class="">France</span><span class="float-right text-dark">16%</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="#" class="btn-primary-link">View Details</a>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Đơn hàng đã đặt gần đây</h5>
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
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh1.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 1</td>
                                                        <td>id000001</td>
                                                        <td>20</td>
                                                        <td>800000</td>
                                                        <td>27-08-2024 01:22:12</td>
                                                        <td>Nguyễn Văn A</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã thanh toán</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh2.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 2</td>
                                                        <td>id000002 </td>
                                                        <td>12</td>
                                                        <td>1800000</td>
                                                        <td>25-08-2024 21:12:56</td>
                                                        <td>Quang Thọ</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã thanh toán </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 3</td>
                                                        <td>id000003</td>
                                                        <td>23</td>
                                                        <td>820000</td>
                                                        <td>24-08-2024 14:12:77</td>
                                                        <td>Hoàng Nam</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã thanh toán </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 4 </td>
                                                        <td>id000004 </td>
                                                        <td>34</td>
                                                        <td>340000</td>
                                                        <td>23-08-2024 09:12:35</td>
                                                        <td>Nhật Huy</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Đã thanh toán </td>
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
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Sản phẩm được yêu thích nhất</h5>
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
                                                        <th class="border-0">Mô tả</th>
                                                        <th class="border-0">Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh1.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 1 </td>
                                                        <td>id000001 </td>
                                                        <td>20</td>
                                                        <td>800000</td>
                                                        <td>Mô tả 1</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Hiển thị </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh2.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 2 </td>
                                                        <td>id000002 </td>
                                                        <td>12</td>
                                                        <td>1800000</td>
                                                        <td>Mô tả 2</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Hiển thị </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh3.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 3 </td>
                                                        <td>id000003 </td>
                                                        <td>23</td>
                                                        <td>820000</td>
                                                        <td>Mô tả 3</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Hiển thị </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../../../public/uploads/products/anh1.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product 4 </td>
                                                        <td>id000004 </td>
                                                        <td>34</td>
                                                        <td>340000</td>
                                                        <td>Mô tả 4</td>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Hiển thị</td>
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