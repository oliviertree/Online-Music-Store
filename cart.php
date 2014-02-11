<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="cssProject.css" />
	<script type="text/javascript" src="javascriptProject.js"></script>
	<script type="text/javascript" src="cart.js"></script>
	<title>Disc Platform</title>
</head>
<body onLoad="getDateAndTime()">
<div id="container">
	<div id="header">
		<p id="headerTitleId">Disc Platform</p>
		<div id="timeDiv">
		</div>
		<div id="searchDivId">
			<input type="text" id="searchTextId" />
			<input type="button" id="searchBtnId" value="search"/>
		</div>
	</div>
	<div id="middleDiv">
		<div id="sideNavMenu">
			<ul class="sideMenuId">
				<li><a class="navLinksClass" href="exercise5.php">Home</a></li>
				<li><a class="navLinksClass" href="">About Us</a></li>
				<li><a class="navLinksClass" href="">Products</a></li>
				<?php
					session_start();
					if($_SESSION["numOfItems"] > 0)
					{
				?>
				    <li><a class="navLinksClass" href="receipt.php">Checkout</a></li>				
				    <?php
			        }
			        							
					if(isset($_REQUEST['logout']) && ($_REQUEST['logout']=='true'))
					{
						session_destroy();
						header('Location:exercise5.php');
					}
															
					if(isset($_SESSION["status"]))
					{
					?>
					    <li><a class="navLinksClass" href="">My Cart</a></li>
						<li><a class="navLinksClass" style="border-bottom-style:none;" href="exercise5.php?logout=true">Logout</a></li>
					<?php
					}
					else
					{
						?>
							<li><a class="navLinksClass" href="login.php">Login</a></li>
							<li><a class="navLinksClass" style="border-bottom-style:none;" href="register.html">Register</a></li>
						<?php
					}
					
				?>
			</ul>
		</div>
		<div id="content">
		Cart Details
		<br />
		<?php
			function printCart()
			{
				if($_SESSION["numOfItems"] > 0)
				{
					print("<hr /><br />");
					for($index = 0; $index < $_SESSION["numOfItems"]; $index++)
					{
						//$_SESSION["currentItem"] = $index;
						print("Disc: ".$_SESSION["disc"]["$index"]."<br />");
						print("Price: ".$_SESSION["discPrice"]["$index"]."<br />");
						print("Quantity: ");//.$_SESSION["discQuantity"]["$index"]."<br />");
					?>
						<input type="text" value="<?php print($_SESSION["discQuantity"]["$index"]) ?>" 
							size="3" onBlur="updateQuantity(this.value, <?php print($index); ?>)" />
						<br />
						<input type="button" value="Remove" onClick="removeDisc(<?php print($index); ?>)" />
					<?php

						print("<hr /><br />");
					}
					print("Total Price: ".$_SESSION["totalPrice"]."<br />");
					print("<hr /><br />");
				}
				else
				{
					print("<hr /><br />");
					print("Cart is empty");
				}
			}
			
			if(isset($_REQUEST["item"]))
			{
				$exists = null;
				$exists = array_search($_REQUEST["item"], $_SESSION["disc"], true);
				$quantity = $_SESSION["numOfItems"];
				
				if($exists !== false)
				{
					$quantity = $exists;
					$_SESSION["totalPrice"] += $_REQUEST["price"];	
					$_SESSION["discQuantity"]["$quantity"] += 1;
				}
				else
				{						
					$_SESSION["disc"]["$quantity"] = $_REQUEST["item"];
					$_SESSION["discPrice"]["$quantity"] = $_REQUEST["price"];
					$_SESSION["discQuantity"]["$quantity"] = 1;
					$_SESSION["totalPrice"] += $_REQUEST["price"];
					$_SESSION["numOfItems"] = $quantity + 1;						
				}						
				header('Location:cart.php');
			}
			printCart();						
		?>
		<p class="shoppingStatusClass">
			<a class="shoppingStatusLinksClass" href="exercise5.php">Continue Shopping</a>
			<input type="button" class="checkoutBtnClass"  value="Checkout" onClick="printReceipt(<?php print($_SESSION["numOfItems"]); ?>)" />
			<!--<a class="shoppingStatusLinksClass" href="">Checkout</a>-->
		</p>
		
		</div>
		<div id="addsMenu">
			<ul class="sideMenuId">
				<li><a class="navLinksClass"  href="">Login</a></li>
				<li><a  class="navLinksClass"  style="border-bottom-style:none;" href="">Create Account</a></li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<span>
			<a href="">Disc Platform</a> | <a href="">Feedback</a> | <a href="">Contact</a>
		</span>
	</div>
</div>
</body>
</html>

