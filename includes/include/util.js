/**
 * util.js stores utility JavaScript functions
 *
 * @package ITC280
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 1.31 2012/04/30
 * @link http://www.billnsara.com/js/ 
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @todo none
 */
 
var errorHandling = "alert";   //set to alert, none or default to trigger window.onerror function for troubleshooting errors
//end config area---------------------------------------------------------

/**
 * window.onerror is assigned an anonymous function for error handling
 *
 * global var named 'errorHandling' declared at top of file
 *
 * Set var named 'errorHandling' to "default" to bypass custom error handling
 *
 * Set var named 'errorHandling' to "alert" pop alerts for errors in FF/IE
 *
 * Set var named 'errorHandling' to "hide" to suppress errors in FF/IE
 *
 * window.onerror not supported by Opera, Chrome or Safari currently
 *
 * Test in FF/IE first to increase chances of error free code
 * 
 * 
 * @param string myfunc reference to name of initialization function to add to window.onload
 * @return void
 * @todo none
 */
window.onerror = function (err, file, line) {
	//can be set to alert,hide or default (empty string)
	//global var errorHandling declared at top of file to allow easy chang 
	
	switch(errorHandling.toLowerCase())
	{
		case "alert":
			alert('JavaScript Error: ' + err + '\n' +
			'In file: ' + file + '\n' +
			'At line: ' + line);
			return true;
			break;
		case "hide":
			return true;
			break;		
		default:
			return false; //default handler
	}
}//end window.onerror 
 
 
/**
 * addOnload() allows safe & convenient way to add multiple JS functions to window.onload
 *
 * Many JS scripts hijack the window.onload function, which is not additive.
 *
 * Therefore many scripts over-write each other, and only one script gets loaded.
 *
 * This solution presents a browser neutral version that will add scripts to 
 * window.onload, and also will not interfere with more primitive hijacks.
 * 
 * @author Marcello Calbucci
 * @link http://haacked.com/archive/2006/04/06/StopTheWindow.OnloadMadness.aspx
 *
 * <code>
 * addOnload(init);
 * </code>
 *
 * IMPORTANT - there are no quotes around the name of the example function (init) above!
 * 
 * @param string myfunc reference to name of initialization function to add to window.onload
 * @return void
 * @todo none
 */
function addOnload(myfunc)
{//addOnload allows us to attach multiple functions to the page load event
	if(window.addEventListener){
		window.addEventListener('load', myfunc, false);
	}else if(window.attachEvent){
		window.attachEvent('onload', myfunc);
	}
}//end addOnload()

/**
 * empty() checks a set of radio buttons, checkboxes, a select or text type form elements for required selection
 *
 * Requires some sort of data entry (any string data, any type) of  
 * input type=text, password or textarea objects.  
 *
 * <code>
 * if(!required(thisForm.myName,"Please Enter Name.")){return false;}
 * </code>
 *
 * While building select elements, The first option of the select must not be a valid option. 
 * View the code sample below to see how the first option is not valid option.
 *
 * <code>
 * <select name="State">
 *   <option value="">Please pick a state</option>
 *   <option value="CA">California</option>
 *   <option value="OR">Oregon</option>
 *   <option value="WA">Washington</option>
 * </select>
 * </code>
 * 
 * @param object $fObj radio button set, checkboxes, select or text type form object
 * @param string $msg feedback to user, based on data required of form element
 * @return true If true, continue to check other items.  If false, do not continue
 * @todo none
 */ 
function empty(fObj,msg)
{//will accept form elements and check for input

	//radio buttons & checkboxes are arrays - their type must be determined by a single element
	if (fObj.length != undefined)
	{//if length is defined, more than one element. Treat as an array
		testType = fObj[0].type;
		isArray = true;
	}else{//if undefined, only one element
	    testType = fObj.type;
	    isArray = false;
	}

	switch(testType)
	{//once the form object type is determined, we can treat elements separately 
		
	    //handle radio & checkbox elements
		case "radio":
		case "checkbox":
			if (isArray)
			{//if length is defined, more than one element. Treat as an array
			    for(x=0; x<fObj.length;x++)
				{
					if(fObj[x].checked){return false;}
				}
			}else{//if undefined, only one element
			    if (fObj.checked){return false;}
			}
			
			alert(msg);
			//focus only works cross browser on first element of array of named elements
			if(isArray){fObj[0].focus();}
			return true;
			break;

		//handle select elements		
		case "select":
			if(fObj.options[0].selected)
			{
				alert(msg);
				fObj.options[0].focus();
				return true;
			}else{
				return false;	
			}
			break;
		
		//handle text, textarea & password elements here
		default:
	       if(fObj.value == "")
		   {
			   alert(msg);
			   fObj.focus();
			   return true;
		   }else{
			   return false;
		   }
	}//end switch
	
}//end empty()
 
/**
 * isEmail() uses a regular expression to require a valid email
 *
 * <code>
 * if(!isEmail(thisForm.Email,"Please enter a valid Email Address")){return false;}
 * </code>
 * 
 * @param object $fObj input type="text" requiring an email
 * @return true If true, continue to check other items.  If false, do not continue
 * @see isAlpha()
 * @todo none
 */
function isEmail(fObj,msg)
{//Uses regular expression for email check
	var rePattern = /^([a-zA-Z0-9]+([\.+_-][a-zA-Z0-9]+)*)@(([a-zA-Z0-9]+((\.|[-]{1,2})[a-zA-Z0-9]+)*)\.[a-zA-Z]{2,6})$/;
	if(rePattern.test(fObj.value))
	{
		return true;
	}else{
		alert(msg);
		fObj.value = "";
		fObj.focus();
		return false;
	}
}//end isEmail()

/**
 * isAlpha() uses a regular expression to require alphabetic data
 *
 * Requires alphabetic or numerical data for each character.  Will not 
 * accept a space, or any other special character. Good for passwords.
 *
 * <code>
 * if(!isAlpha(thisForm.Password,"Only alphabetic characters are allowed for passwords.")){return false;}
 * </code>
 * 
 * @param object $fObj input type="text" requiring alphabetic data
 * @return true If true, continue to check other items.  If false, do not continue
 * @see isAlphanumeric()
 * @see correctLength() 
 * @todo none
 */
function isAlpha(fObj,msg)
{//Uses regular expression for email check
	var rePattern = /^[a-zA-Z]+$/;
	if(rePattern.test(fObj.value))
	{
		return true;
	}else{
		alert(msg);
		fObj.value = "";
		fObj.focus();
		return false;
	}
}//end is Alpha()

/**
 * isAlphanumeric() uses a regular expression to require alphanumeric data
 *
 * Requires alphabetic or numerical data for each character.  Will not 
 * accept a space, or any other special character. Good for passwords.
 *
 * <code>
 * if(!isAlphanumeric(thisForm.Password,"Only alphanumeric characters are allowed for passwords.")){return false;}
 * </code>
 * 
 * @param object $fObj input type="text" requiring alphanumeric data
 * @return true If true, continue to check other items.  If false, do not continue
 * @see isAlpha()
 * @see correctLength() 
 * @todo none
 */
function isAlphanumeric(fObj,msg)
{//Uses regular expression for alphabetic check
	var rePattern = /^[a-zA-Z0-9]+$/;
	if(rePattern.test(fObj.value))
	{
		return true;
	}else{
		alert(msg);
		fObj.value = "";
		fObj.focus();
		return false;
	}
}//end isAlphanumeric()

/**
 * correctLength() ensures minimum & maximum length for text
 *
 * Requires minimum and maximum data entry (any string data, any type) of  
 * input type=text, password or textarea objects.
 *
 * <code>
 * if(!correctLength(thisForm.Password,6,20,"Password does not meet the following requirements:")){return false;}
 * </code>
 * 
 * @param object $fObj input type="text" requiring alphanumeric data
 * @return true If true, continue to check other items.  If false, do not continue
 * @see isAlpha()
 * @see isAlphanumeric() 
 * @todo none
 */
function correctLength(fObj,min,max,msg)
{//Identifies if data is too short or long for our purposes
	if((fObj.value.length >= min) && (fObj.value.length <= max ))
	{
		return true;
	}else{
		alert(msg + "\n Minimum characters: " + min + " Maximum characters: " + max);
		fObj.value = "";
		fObj.focus();
		return false;
	}
}//end correctLength()
