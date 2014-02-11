<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="cssProject.css" />
	<link rel="stylesheet" type="text/css" href="cssRegistration.css" />
	<script type="text/javascript" src="javascriptProject.js"></script>
	<title>Login | Disc Platform</title>
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
				<li><a class="navLinksClass"  style="border-bottom-style:none;" href="register.php">Register</a></li>
			</ul>
		</div>
		<div id="content">
			<div class="registrationForm">
			<h2>Log In</h2>
				<form action="login.php" method="post" name="loginFrmName" id="loginFrmId">
					<table class="formTableClass">
						<tr>
							<td class="inputTitleClass">Email Address:</td>
							<td>
								<input type="text" name="emailAddressTxt" id="eAddressIdTxt" size="30" />
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td class="inputTitleClass">Password:</td>
							<td><input type="password" name="passwordTxt" id="passwordIdTxt" size="20" /></td>
						</tr>
					</table>
					<div class="buttonsDiv">
						<input class="buttonClass" type="button" onClick="resetForm()" name="resetName" value="Reset" />
						<input class="buttonClass" type="submit" name="submitName" value="Submit" />
					</div>
				</form>
				<?php
					session_start();
					
					if(isset($_POST["emailAddressTxt"]) && isset($_POST["passwordTxt"]))  //Determine if the form was submited
					{
					    $email = $_POST["emailAddressTxt"]; //To hold the email provided by the user
					    $pword = $_POST["passwordTxt"];     //To hold the password [rovided by the user
					    
						if($email != "" && $pword != "") //In case both fields are field
						{
						  	if(file_exists("members.txt")) //To determine if the input file exists
						  	{
							  	$fileVar = fopen("members.txt", "r"); //Open the input file
							  	$memberInfo = array(); //Temporary array to hold a certain member's info being read
							  	$index = 0;			   //Index to navigate memberInfo arra				  	
							  	$foundFlag = 0;
							  	while($readLine = fgets($fileVar)) //Read line by line until the end
							  	{
								  	$memberInfo["$index"] = $readLine;					

								  	if($index == 4)
								  	{
									  	if(strcmp($memberInfo[2],$email.PHP_EOL) == 0)
									  	{
										  	if(strcmp($memberInfo[4],$pword.PHP_EOL) == 0)
										  	{
											  	//print("Your account exists");
											  	$foundFlag = 2;
											  	break;
										  	}
										  	else
										  	{
											  	$foundFlag = 1;
											  	break;
										  	}										  	
									  	}
									  	else
									  	{
										  	$readLine = fgets($fileVar);
										  	$index = 0;
									  	}
								  	}
								  	else
								  	{
									  	$index += 1;
								  	}
							  	}
							  	fclose($fileVar); //Close the input file
							  	
							  	if($foundFlag == 0)
							  	{
								  	print("Your account does not exist");
							  	}
							  	else if($foundFlag == 1)
							  	{
								  	print("Email was found, but the password provided does not match with the account.");
								  	print("Please try again!<br />");
							  	}
							  	else
							  	{
								  	$_SESSION["status"] = "loggedIn";
								  	$_SESSION["disc"] = array();
								  	$_SESSION["discPrice"] = array();
								  	$_SESSION["discQuantity"] = array();
								  	$_SESSION["totalPrice"] = 0;
								  	$_SESSION["numOfItems"] = 0;
								  	
								  	header('Location:exercise5.php');
							  	}
						  	}
						  	else
						  	{
							  	print("The File does not exist!");
						  	}
						  	
						  	print("<br />");
						}
						else
						{
							print("Please make sure all input fields are field!");
						}
					}
				?>
			</div>
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

