/*
    The getDateAndTime() function returns a date and time to
    timeDiv tag. It refreshes every second using recursion.
*/
function getDateAndTime()
{
    var monthInLetters = new Array("January", "February", "March", 
                                   "April", "May", "June", "July", 
                                   "August", "September", "October", 
                                   "November", "December");
    var todayDate = new Date(); //Today's date object
    var todayMonth = monthInLetters[todayDate.getMonth()]; //Convert the month in alphabet format
    var todaysDay = todayDate.getDate(); //Today's day
    var todaysYear = todayDate.getFullYear(); // Today's year
    var dateString = todayMonth + " " + todaysDay + ", " + todaysYear;
    
    var currentHour = twoDigitsFormat(todayDate.getHours());      //Current hour
    var currentMinutes = twoDigitsFormat(todayDate.getMinutes()); //Current minutes  
    var currentSeconds = twoDigitsFormat(todayDate.getSeconds()); //Current seconds
    var timeString = currentHour + ":" + currentMinutes + ":" + currentSeconds;
    
    document.getElementById("timeDiv").innerHTML =  timeString + "   " + dateString;
    setTimeout('getDateAndTime()', 500); //Recursion for refreshing the time
}

/*
    The twoDigitsFormat() function takes a number and if the number
    is less than ten it returns the number with a zero in front of the 
    number otherwise it returns the number.
*/
function twoDigitsFormat(number)
{
    if(number < 10)
    {
    	return "0" + number;
    }
    else
    {
    	return number;
    }
}

/*
    The highlightProduct function changes the backgroundColor of a product
    when the user passes the mouse on top of its button.
*/
function highlightProduct(objId)
{
	document.getElementById(objId).style.backgroundColor = "#FF00FF";
}
/*
    The unHighlightProduct function resets the background color of a product when 
    the mouse moves away from the products button.
*/
function unHighlightProduct(objId)
{
	document.getElementById(objId).style.backgroundColor = "#F8F8F8";
}

/*
    The validateRegistration function does client side validation, 
    and checks if both passwords match.
*/
function validateRegistration(frm)
{
    var tempString = "Please provide input for the following field(s):" ; //Hold the empty fields
    var passwordMatch = ""; //Hold data if passwords do not match
    
    if(frm.elements[0].value == "") //In case First Name field is empty
    {
    	tempString = tempString + "\n- First Name";
    }
    
    if(frm.elements[1].value == "")
    {
	tempString = tempString + "\n- Last Name";
    }
    
    if(frm.elements[2].value == "")
    {
    	tempString = tempString + "\n- Email Address";
    }
    
    if(frm.elements[3].value == "")
    {
    	tempString = tempString + "\n- Phone Number";
    }
    
    if(frm.elements[4].value == "")
    {
    	tempString = tempString + "\n- Password";
    }
    
    if(frm.elements[5].value == "")
    {
    	tempString = tempString + "\n- Confirm Password";
    }
    
    if(frm.elements[4].value != frm.elements[5].value) //In case passwords do not match
    {
    	passwordMatch = "\nPasswords do not match";
    }
    
    if((/\n/).test(tempString) == true) //In case the string to return holds at least one field
    {
    	if(passwordMatch == "") //If passwords match
    	{
    	    alert(tempString);
    	    return true;
    	}
    	else //If passwords do not match
    	{
    	    alert(tempString + passwordMatch);
    	}
    }
    else //In case none of the fields is empty
    {
    	if(passwordMatch != "") //If passwords do not match
    	{
    	    alert(passwordMatch);
    	}
    }

    return false;
}

/*
    The resetForm function resets the fields of a form.
*/

function resetForm()
{
    document.getElementById("registrationFrmId").reset();
}