<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
	public static function render($data = null)
	{
?>
		<h3 class="aside-title">Danh mục</h3>
		<div class="checkbox-filter">
			<?php foreach ($data as $item):
				 ?>
				<div class="input-checkbox">
					<label for="category">
						<a class="nav-link text-cate text-dark" href="/products/Category/<?= $item['id'] ?>"><?= $item['name'] ?></a>

					</label>
				</div>
			<?php endforeach; ?>

		</div>
<?php
	}
}
