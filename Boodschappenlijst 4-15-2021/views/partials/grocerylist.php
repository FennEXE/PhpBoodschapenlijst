<div class="groceryList">
	<ul>
			<?php foreach ($Items as $item) : ?>
				<li><b>ID:</b> <?= $item->id; ?></li>
				<li><b>Product:</b> <?= $item->name; ?></li>
				<li><b>Amount:</b> <?= $item->number; ?></li>
				<li><b>Price:</b> &euro;<?= number_format($item->price, 2, ',', ' '); ?></li>
				<br>
			<?php endforeach; ?>	
	</ul>
</div>