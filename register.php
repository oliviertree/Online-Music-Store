<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="cssProject.css" />
	<link rel="stylesheet" type="text/css" href="cssRegistration.css" />
	<script type="text/javascript" src="javascriptProject.js"></script>
	<title>Register | Disc Platform</title>
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
				<li><a class="navLinksClass"  style="border-bottom-style:none;" href="login.php">Login</a></li>
			</ul>
		</div>
		<div id="content">
			<div class="registrationForm">
			<h2>Registration</h2>
				<form action="register.php" method="post" name="registrationFrmName" id="registrationFrmId" onSubmit="validateRegistration(this)">
					<table class="formTableClass">
						<tr>
							<td class="inputTitleClass">First Name:</td>
							<td><input type="text" name="fNameTxt" id="fIdTxt" size="30" /></td>
						</tr>
						<tr>
							<td class="inputTitleClass">Last Name:</td>
							<td><input type="text" name="lNameTxt" id="lIdTxt" size="30" /></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td class="inputTitleClass">Email Address:</td>
							<td>
								<input type="text" name="emailAddressTxt" id="eAddressIdTxt" size="30" />
							</td>
						</tr>
						<tr>
							<td class="inputTitleClass">Phone Number:</td>
							<td>
								<input type="text" name="phoneNumberTxt" id="pNumberIdTxt" size="30" />
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td class="inputTitleClass">Password:</td>
							<td><input type="password" name="passwordTxt" id="passwordIdTxt" size="20" /></td>
						</tr>
						<tr>
							<td class="inputTitleClass">Confirm Password:</td>
							<td><input type="password" name="confPasswordTxt" id="cPassIdTxt" size="20" /></td>
						</tr>
					</table>
					<div class="buttonsDiv">
						<input class="buttonClass" type="button" onClick="resetForm()" name="resetName" value="Reset" />
						<input class="buttonClass" type="submit" name="submitName" value="Submit" />
					</div>
			    </form>
			</div>
			<?php
			
			if(isset($_POST["fNameTxt"]))
			{
				$fName = $_POST["fNameTxt"];           //Hold the first name
				$lName = $_POST["lNameTxt"];           //Hold the last name
				$email = $_POST["emailAddressTxt"];    //Hold the email address
				$phoneNum = $_POST["phoneNumberTxt"];  //Hold the phone number
				$password = $_POST["passwordTxt"];     //Hold the password
				$cPassword = $_POST["confPasswordTxt"];//Hold the confirming password
		    						    
				if($fName == "" || $lName == "" || $email == "" || $phoneNum == "" || $password == "" || $cPassword == "")
				{
					print("One of the fields was left empty.\nPlease try again with all the fields.\n");
				}
				else
				{							
					if(strlen($password) < 8 || strlen($cPassword) < 8)
					{
						print("Please make sure that both of the passwords are at least 8 characters.\n");
					}
					else 
					{
						if (strcmp($password, $cPassword) != 0)
						{ 
							print("The confim password is not identical to the password.");
				        }
				        else
				        {		
					        if (file_exists("members.txt")) //Determine if file exists						       	
					        {
						        $outFileVar = fopen("members.txt", "a");//Open the output file to append								 
						        fwrite($outFileVar ,"".PHP_EOL);  //Print an empty file
					        }
					        else
					        {
						        $outFileVar = fopen("members.txt", "w");//Open the output file								  	
					        }
						  										  	
						  	//The following statements writes to the file
							fwrite($outFileVar ,$fName.PHP_EOL); 
							fwrite($outFileVar ,$lName.PHP_EOL); 
							fwrite($outFileVar ,$email.PHP_EOL); 
							fwrite($outFileVar ,$phoneNum.PHP_EOL); 
							fwrite($outFileVar ,$password.PHP_EOL); 
						  	fclose($outFileVar);
						  	print("The registration was successful!");
				        }
		            }
	            }
	        }
			?>
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

