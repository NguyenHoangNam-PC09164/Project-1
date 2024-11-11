<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>
                <!-- /. WRAPPER  -->
                <!-- JS Scripts-->
                <!-- jQuery Js -->
                <script src="../../../../public/assets/admin/template/js/jquery-1.10.2.js"></script>
                <!-- Bootstrap Js -->
                <script src="../../../../public/assets/admin/template/js/bootstrap.min.js"></script>

                <!-- Metis Menu Js -->
                <script src="../../../../public/assets/admin/template/js/jquery.metisMenu.js"></script>
                <!-- Morris Chart Js -->
                <script src="../../../../public/assets/admin/template/js/morris/raphael-2.1.0.min.js"></script>
                <script src="../../../../public/assets/admin/template/js/morris/morris.js"></script>


                <script src="../../../../public/assets/admin/template/js/easypiechart.js"></script>
                <script src="../../../../public/assets/admin/template/js/easypiechart-data.js"></script>

                <script src="../../../../public/assets/admin/template/js/Lightweight-Chart/jquery.chart.js"></script>

                <!-- Custom Js -->
                <script src="../../../../public/assets/admin/template/js/custom-scripts.js"></script>


                <!-- Chart Js -->
                <script type="text/javascript" src="../../../../public/assets/admin/template/js/Chart.min.js"></script>
                <script type="text/javascript" src="../../../../public/assets/admin/template/js/chartjs.js"></script>

                </body>

                </html>
<?php
        }
}

?>