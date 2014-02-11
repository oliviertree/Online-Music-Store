<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="cssProject.css" />
	<script type="text/javascript" src="javascriptProject.js"></script>
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
				<li><a class="navLinksClass" href="">Home</a></li>
				<li><a class="navLinksClass" href="">About Us</a></li>
				<li><a class="navLinksClass" href="">Products</a></li>
				<?php
					session_start();
					
					if(isset($_REQUEST['logout']) && ($_REQUEST['logout']=='true'))
					{
						session_destroy();
						header('Location:exercise5.php');
					}
										
					if(isset($_SESSION["status"]))
					{
					?>
					    <li><a class="navLinksClass" href="cart.php">My Cart</a></li>
					<?php
						if($_SESSION["numOfItems"] > 0)
						{
					?>
					    <li><a class="navLinksClass" href="receipt.php">Checkout</a></li>				
					    <?php
				        }
					?>
						<li><a class="navLinksClass" style="border-bottom-style:none;" href="exercise5.php?logout=true">Logout</a></li>
					<?php
					}
					else
					{
						?>
							<li><a class="navLinksClass" href="login.php">Login</a></li>
							<li><a class="navLinksClass" style="border-bottom-style:none;" href="register.php">Register</a></li>
						<?php
					}
					
				?>
			</ul>
		</div>
		<div id="content">
		<ul class="productsListClass">
			<li>
				<table class="prodTable" id="hillsongTableId"
				     onMouseOver="highlightProduct(this.id)" onMouseOut="unHighlightProduct(this.id)">
				<tr>
					<td colspan="2" class="headerClass">
						Gospel
					</td>
				</tr>
				<tr>
					<td class="tdImageClass">
						<img alt="Hillsong Picture" src="images/Hillsong.jpg" class="imageClass" />
					</td>
					<td class="prodInfo">
						Hillsong: Mix Disc
						<br />
						<span class="prodPrice">$16.99</span>

						<p>
						<?php
						if(isset($_SESSION["status"]))
						{
						?>
							<a class="addToCartClass" href="cart.php?item=Hillsong:+Mix+Disc&price=16.99">Add to Cart</a>
						<?php
					    }
					    ?>
						</p>
					</td>
				</tr>
				</table>
			</li>
			<li>
				<table class="prodTable" id="kanyeWestTableId"
				     onMouseOver="highlightProduct(this.id)" onMouseOut="unHighlightProduct(this.id)">
				<tr>
					<td colspan="2" class="headerClass">
						Hip Hop
					</td>
				</tr>
				<tr>
					<td class="tdImageClass">
						<img alt="Kanye West Picture" src="images/KanyeWest.jpg" class="imageClass" />
					</td>
					<td class="prodInfo">
						Kanye West: Graduation
						<br />
						<span class="prodPrice">$14.28</span>

						<p>
						<?php
						if(isset($_SESSION["status"]))
						{
						?>
							<a class="addToCartClass" href="cart.php?item=Kanye+West:+Graduation&price=14.28">Add to Cart</a>"
						<?php
					    }
					    ?>
						</p>
					</td>
				</tr>
				</table>
			</li>
			<li>
				<table class="prodTable" id="maryJBligeTableId"
				     onMouseOver="highlightProduct(this.id)" onMouseOut="unHighlightProduct(this.id)">
				<tr>
					<td colspan="2" class="headerClass">
						RnB
					</td>
				</tr>
				<tr>
					<td class="tdImageClass">
						<img alt="Mary J Blige Picture" src="images/MaryJBlige.jpg" class="imageClass" />
					</td>
					<td class="prodInfo">
						Mary J Blige: The Breakthrough
						<br />
						<span class="prodPrice">$13.62</span>

						<p>
  						<?php
						if(isset($_SESSION["status"]))
						{
						?>
							<a class="addToCartClass" href="cart.php?item=Mary+J+Blige:+The+Breakthrough&price=13.62">Add to Cart</a>
						<?php
					    }
				        ?>
						</p>
					</td>
				</tr>
				</table>
			</li>
			<li>
				<table class="prodTable" id="bobMarleyTableId"
				     onMouseOver="highlightProduct(this.id)" onMouseOut="unHighlightProduct(this.id)">
				<tr>
					<td colspan="2" class="headerClass">
						Reggae
					</td>
				</tr>
				<tr>
					<td class="tdImageClass">
						<img alt="Bob Marley Picture" src="images/BobMarley.jpg" class="imageClass" />
					</td>
					<td class="prodInfo">
						Bob Marley: Legend
						<br />
						<span class="prodPrice">$13.18</span>

						<p>
 						<?php
						if(isset($_SESSION["status"]))
						{
						?>
							<a class="addToCartClass" href="cart.php?item=Bob+Marley:+Legend&price=13.18">Add to Cart</a>
						<?php
				        }
				        ?>
						</p>
					</td>
				</tr>
				</table>
			</li>
		</ul>

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

