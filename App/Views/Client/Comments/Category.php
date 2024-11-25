<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="product-section mt-150 mb-150">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-filters">
                            <ul>
                                <li class="active" data-filter="*"><a class="nav-link active" href="/products">Tất cả</a></li>
                                <?php
                                foreach ($data as $item) :
                                ?>
                                    <li data-filter=".strawberry"> <a class="nav-link" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
                                <?php
                                endforeach;
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
