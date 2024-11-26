<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- <ul class="section-tab-nav tab-nav">
            <?php if (!empty($categories) && is_array($categories)) : ?>
                <?php foreach ($categories as $item) : ?>
                    <li>
                        <a data-toggle="tab" href="/products/categories/<?= ($item['id']) ?>">
                            <?= ($item['name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li><span>Không có danh mục nào</span></li>
            <?php endif; ?>
        </ul> -->
<?php
    }
}
