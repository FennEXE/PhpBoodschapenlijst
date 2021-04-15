<div class="groceryController">
	<table  class="groceryInjector">
		<tr>
			<td class="groceryCell">
			<p><b>Voeg een product toe</b></p>
				<form method="POST" action="/dynInsert">
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<p><b>Naam</b></p>
					<input name="insertName"></input>
					<p><b>Prijs</b></p>
					<input type="number" min="0.01" step="any" name="insertPrice"></input>
					<p><button type="submit">Insert</button></p>
				</form>
			</td>
		</tr>
		<tr>
			<td class="groceryCell">
			<p><b>Verwijder een Product</b></p>
				<form method="POST" action="/dynDelete">
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<p><b>Naam</b></p>
					<input name="deleteName"></input>
					<p><button type="submit">Delete</button></p>
				</form>
			</td>
		</tr>
		<tr>
			<td class="groceryCell">
			<p><b>Pas de prijs van een product aan</b></p>
				<form method="POST" action="/dynUpdate">
					<select id="table" name="table">
						<option value="items" selected>Items</option>
						<option value="names">Names</option>
					</select>
					<p><b>Naam</b></p>
					<input name="updateName"></input>
					<p><b>Prijs</b></p>
					<input type="number" min="0.01" step="any" name="updatePrice"></input>
					<p><button type="submit">Update</button></p>
				</form>
			</td>
		</tr>
	</table>
</div>