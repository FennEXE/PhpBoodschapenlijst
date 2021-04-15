<div class="groceryList">
	<ul>
			<?php foreach ($secondItems as $seconditem) : ?>
				<li><b>ID:</b> <?= $seconditem->id; ?></li>
				<li><b>Product:</b> <?= $seconditem->name; ?></li>
				<li><b>Amount:</b> <?= $seconditem->number; ?></li>
				<li><b>Price:</b> &euro;<?= number_format($seconditem->price, 2, ',', ' '); ?></li>
				<br>
			<?php endforeach; ?>	
	</ul>
</div>