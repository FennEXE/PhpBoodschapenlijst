<div class="groceryCalculator">
<table class="boodschappenlijst" border>
	<tbody>
		<tr>
			<th class="title">Product</th>
			<th class="title">Prijs</th>
			<th class="title">Aantal</th>
			<th class="title">Subtotaal</th>
		</tr>
		
		<?php foreach ($Items as $item) : ?>
			<tr class="groceriesCalculator">
			<td id="<?php echo $item->name?>" class = "itemName"><?= $item->name; ?></td>
			<td id="<?php echo $item->name . "price"; ?>" class="prices"><?= $item->price; ?></td>
			<td id="number">
				<span id="broodQuantity" class="productQuantity">
					<div class="minusandplus">
						<a class="calcBox">
							<form method="post" action="/GroceryButton" >
								<button id="brood" class="product-Quantity" name="-" type="submit" value="<?= $item->id . "|" . $item->number . "|minus" ?>">-</button>
							</form>
						</a>
						<a class="calcBox">
							<a id="<?php echo $item->name; ?>ItemAmount" class="itemAmount"><?= $item->number; ?> </a>
						</a>
						<a class="calcBox">
							<form method="post" action="/GroceryButton" >
								<button id="brood" class="product-Quantity" name="+" type="submit" value="<?= $item->id . "|" . $item->number . "|plus" ?>">+</button>
							</form>
						</a>
					</div>
				</span>
			</td>
			<td id="<?php echo $item->name; ?>Cost" class="productTotalCost"><?= number_format($item->price * $item->number, 2, ',', ' ');?></td>
			<?php $totalCost[$item->id] = $item->price * $item->number; ?>
			</tr>
		<?php endforeach; ?>
		</form>
		<tr>
			<?php 
			$fullprice = 0;

			foreach ($Items as $item)
			{
				$fullprice += $item->price * $item->number; 
			}
			?>
			<td colspan="3" class="totaltitle">Totaal</th>
			<td colspan="1" id="totalCost" class="totalcost"><?= number_format($fullprice, 2, ',', ' '); ?></td></th>
		</tr>
	</tbody>
</table>

<?php 
include("javascript.php"); 



?>
</div>