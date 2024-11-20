<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>


        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <?php
                            foreach ($data as $item) :
                            ?>
                                <div class="shop-img">
                                    <img src="<?= APP_URL ?>/public/uploads/product/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                </div>
                                <div class="shop-body">
                                    <h3>Insta360 X3<br>Bộ sưu tập</h3>
                                    <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>





          <div class="table table-cate">
            <table id="">
                <tbody>
                    <h5 class="text-center mb-3 text-danger text-detail">Danh mục</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link active text-all-cate text-dark" href="/products">Tất cả</a>
                        <?php
                        foreach ($data as $item) :
                        ?>
                            <div class="list-cate">
                                <a class="nav-link text-cate text-dark" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a>
                            </div>

                        <?php
                        endforeach;
                        ?>
                    </nav>
                </tbody>
            </table>
        </div>


<?php
    }
}
