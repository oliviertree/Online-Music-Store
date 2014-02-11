<?php
	session_start();
	$qty = $_GET["discQty"];      //Entered Quantity
	$ind = $_GET["discIndex"];    //Index of entered quantity
	$discCost = $_SESSION["discQuantity"]["$ind"] * $_SESSION["discPrice"]["$ind"];
	
	if($_SESSION["discQuantity"]["$ind"] != $qty)
	{
		$_SESSION["totalPrice"] -= $discCost;     //Remove the old discCost from totalPrice
		$_SESSION["discQuantity"]["$ind"] = $qty; //Update the quantity of the disc in the quantity array
		$_SESSION["totalPrice"] += ($_SESSION["discQuantity"]["$ind"] * $_SESSION["discPrice"]["$ind"]); //Update the total price with new disc cost
	}
?>