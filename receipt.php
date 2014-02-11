<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Disc Platform - Purchase receipt</title>
	<style type="text/css">
	.otherDivClass
	{
		background-color:#660066;
		color:#FFFFFF;
		border-style=solid;
		width:250px;
		margin:1px;
		padding:5px;
		float:left;
	}
	
	.firstDivClass
	{
		clear:both;
		background-color:#660066;
		color:#FFFFFF;
		border-style=solid;
		width:250px;
		margin:1px;
		padding:5px;
		float:left;
	}
	
	h1
	{
		color:#000099;
	}
	
	p
	{
		clear:both;
		font-weight:bold;
	}
	</style>
</head>
<body>
	<?php
		session_start();
		print("<h1>Shopping Receipt</h1>");
		print("<div class=\"otherDivClass\">Disc</div>");
		print("<div class=\"otherDivClass\">Price</div>");
		print("<div class=\"otherDivClass\">Quantity</div>");
		
		for($index = 0; $index < $_SESSION["numOfItems"]; $index++)
		{
			$disc = $_SESSION["disc"]["$index"];
			$price = $_SESSION["discPrice"]["$index"];
			$quantity = $_SESSION["discQuantity"]["$index"];
			print("<div class=\"firstDivClass\">$disc</div>");
			print("<div class=\"otherDivClass\">$price</div>");
			print("<div class=\"otherDivClass\">$quantity</div>");
		}
		$total = $_SESSION["totalPrice"];
		print("<div class=\"firstDivClass\">Total Price</div>");
		print("<div class=\"otherDivClass\">$total</div>");
		print("<p>Thank you for choosing Disc Platform for your shopping<br />And hope to see you soon.</p>");
	?>
</body>
</html>