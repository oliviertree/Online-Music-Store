function removeDisc(discInd)
{
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function()
	{
		if(xhr.readyState == 4)
		{
			var result = xhr.responseText;
			//var sd = result.split(', ');
			window.location.reload();
		}
	}
	xhr.open("GET", "removeDiscCode.php?discIndex="+discInd, true);
	xhr.send(null);
}

function updateQuantity(quantity, discInd)
{
	if((quantity % 1 != 0) || (quantity <= 0))
	{
		alert("Please enter a positive integer number as Quantity");
	}
	else
	{
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function()
		{
			if(xhr.readyState == 4)
			{
				var result = xhr.responseText;
				window.location.reload();
			}
		}
		xhr.open("GET", "updateQuantityCode.php?discQty="+quantity+"&discIndex="+discInd, true);
		xhr.send(null);
	}
}

function printReceipt(numOfItems)
{
	if(numOfItems > 0)
	{
		//alert("Number of items is " + numOfItems);
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function()
		{
			if(xhr.readyState == 4)
			{
				var result = xhr.responseText;
				//window.location="";
				document.open();
				document.write(result.split(', ')[0]);
				document.close();
			}
		}
		xhr.open("GET", "receipt.php", true);
		xhr.send(null);
		
	}
	else
	{
		alert("The cart is empty!");
	}
}