<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>
                <div class="footer">
                        <div class="container-fluid">
                                <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                Copyright © Được thiết kế bởi NHT team
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
                <script src="../../../../public/assets/admin/template/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                <!-- bootstap bundle js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                <!-- slimscroll js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
                <!-- main js -->
                <script src="../../../../public/assets/admin/template/assets/libs/js/main-js.js"></script>
                <!-- chart chartist js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
                <!-- sparkline js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
                <!-- morris js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/morris-bundle/morris.js"></script>
                <!-- chart c3 js -->
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/c3charts/c3.min.js"></script>
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
                <script src="../../../../public/assets/admin/template/assets/vendor/charts/c3charts/C3chartjs.js"></script>
                <script src="../../../../public/assets/admin/template/assets/libs/js/dashboard-ecommerce.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                </body>

                </html>
<?php
        }
}

?>