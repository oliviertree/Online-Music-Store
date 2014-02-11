<?php
	session_start();
	$discToRemoveIndex = $_GET["discIndex"];
	
	$itemCost = $_SESSION["discPrice"]["$discToRemoveIndex"] * $_SESSION["discQuantity"]["$discToRemoveIndex"]; //Cost of the disc
	array_splice($_SESSION["disc"], $discToRemoveIndex, 1);          //Remove the disc from the disc array
	array_splice($_SESSION["discPrice"], $discToRemoveIndex, 1);     //Remove the price from the disc price array
	array_splice($_SESSION["discQuantity"], $discToRemoveIndex, 1);  //Remove the disc quantity from the disc quantity array
	$_SESSION["totalPrice"] -= $itemCost; //Update total price
	$_SESSION["numOfItems"] -= 1;         //Update number of items
?>