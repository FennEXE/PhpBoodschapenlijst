<script type="text/javascript">
	//Deze functie zorgt er voor dat alle nummers in financial() altijd twee decimalen hebben.
	function financial(x) {
		return Number.parseFloat(x).toFixed(2);
	}

	let totalCostHTML = document.getElementById("totalCost");

	//Converts PHP array of SQL table into a javascript array.
	var itemArr = <?php echo json_encode($Items); ?>;

	//Total cost variable, this will be put into the total cost cell in html.
	let totalCost = 0;
	
	//Combines all the values of an array and adds them up.
	const reducer = (accumulator, currentValue) => accumulator + currentValue;

	//This array will fill up with values whenever an item number is added via button.
	var subtotalArr = [];

	//This function is used with the + buttons
	function addProduct(groceryID) {
		itemArr[groceryID]["number"]++;
		
		document.getElementById(itemArr[groceryID]["name"] + "ItemAmount").innerHTML = itemArr[groceryID]["number"];
		document.getElementById(itemArr[groceryID]["name"]+"Cost").innerHTML = financial(itemArr[groceryID]["number"] * itemArr[groceryID]["price"]); 
		
		subtotalArr[groceryID] = itemArr[groceryID]["number"] * itemArr[groceryID]["price"];

		totalCost = subtotalArr.reduce(reducer);
		totalCostHTML.innerHTML = financial(totalCost);
	}

	//This function is used with the - buttons, amount can't go below 0.
	function removeProduct(groceryID) {
		if (itemArr[groceryID]["number"] < 1) return NULL
			
		itemArr[groceryID]["number"]--;
		document.getElementById(itemArr[groceryID]["name"] + "ItemAmount").innerHTML = itemArr[groceryID]["number"];
		document.getElementById(itemArr[groceryID]["name"]+"Cost").innerHTML = financial(itemArr[groceryID]["number"] * itemArr[groceryID]["price"]);
		
		subtotalArr[groceryID] = itemArr[groceryID]["number"] * itemArr[groceryID]["price"];

		totalCost = subtotalArr.reduce(reducer);
		totalCostHTML.innerHTML = financial(totalCost);
	}

</script>