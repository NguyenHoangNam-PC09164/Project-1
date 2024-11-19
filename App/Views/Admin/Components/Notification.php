<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    
    public static function render($data = null)
    {

?>
<div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<?php
        
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
?>
                <div class="page-wrapper">
                    <div class="alert alert-success" role="alert">
                        <strong><?= $value ?></strong>
                    </div>
                </div>

        <?php
            endforeach;
        endif;
        ?>
        
                        <?php
                        if (isset($_SESSION['error'])) :
                            foreach ($_SESSION['error'] as $key => $value) :
                        ?>

                                <div class="page-wrapper">
                                    <div class="alert alert-danger" role="alert">
                                        <strong><?= $value ?></strong>
                                    </div>
                                </div>

                <?php
                            endforeach;

                        endif;
                    }
                }

                ?>