<?php 
if(isset($_POST['submit']))
{//data submitted
    
    $to = 'pmanso01@seattlecentral.edu';
    $message = process_post();
    $replyTo=$_POST['Email'];
    $subject = 'Test from Registration Form';
 
    safeEmail($to, $subject, $message, $replyTo='','html');

	echo '<h2>Do a good turn daily!<h2>';
}else {

echo '

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />

	<script src="include/util.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css" href="include/styles.css" />
	
	<style>
	
	body {font-size: .9em; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; padding:0; margin:0; background-color:#ffffff;}

.required {
	font-style:italic;
	color:#FF0000;
	font-weight:bold;
	text-align:center;}

td {font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;}
/*h1, h2, h3, h4, h5, h6 {font-weight: normal;}*/
.small {font-size: 76%;}
.big {font-size: 120%;}

span {
	margin:0 auto;
	text-align: center;
	max-width: 100%;}
	
.g-recaptcha {
	margin: 0;
	border-style: none;
	padding: 0;
	max-width: 50%;
	transform: scale(0.25);}
	
iframe {
	transform: scale(4);
	border-style: none;
}

a {font-family:Verdana, Arial, Helvetica, sans-serif;}
a:link {color: #00f;}
a:visited {color: #36f;}
a:hover {text-decoration: none;}
a:active {color: #f00;}
	</style>
	<script type="text/javascript">
		//place local js code here
		
		function init()
		{//init places focus on the first form element
			document.myForm.Name.focus();
		}
		
		//here we make sure the user has entered valid data	
		function checkForm(thisForm)
		{//check form data for valid info
			if(empty(thisForm.Name,"Please Enter Your Name")){return false;}
			if(!isEmail(thisForm.Email,"Please enter a valid Email Address")){return false;}
			return true;//if all is passed, submit!
		}
		
		addOnload(init); //with addOnload() we can add as many functions as we wish to window.onload (one by one)!
	</script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>

<form method="post" action="' . THIS_PAGE . '">
	<span class="required">(*required)</span>
	<table border="1" style="border-collapse:collapse" align="center">
	
		<tr><!-- the form elements NAME and EMAIL are sigificant to the app, any others can be added/deleted -->
			<td align="right">Name:</td>
			<td><input type="text" name="Name" /></td>
		</tr>
		<tr><td align="right"><span class="required">*</span>Email:</td>
			<td><input type="text" name="Email" /></td>
		</tr>
		<tr><td align="right">How Did You Hear About Us?</td>
			<td>
				<select name="How_Did_You_Hear_About_Us?">
					<option value="">Choose How You Heard</option>
					<option value="Phone">Phone</option>
					<option value="Web">Web</option>
					<option value="Magazine">Magazine</option>
					<option value="Smoke Signal">Smoke Signal</option>
					<option value="Other">Other</option>
				</select>
			</td>
		</tr>
		<tr><td align="right">What Services Are You Interested In?:</td>
			<td>
				<input type="checkbox" name="Interested_In[]" value="New Website" /> New Website <br />
				<input type="checkbox" name="Interested_In[]" value="Website Redesign" /> Website Redesign <br />
				<input type="checkbox" name="Interested_In[]" value="Special Application" /> Special Application <br />
				<input type="checkbox" name="Interested_In[]" value="Lollipops" /> Complimentary Lollipops <br />
				<input type="checkbox" name="Interested_In[]" value="Other" /> Other <br />
			</td>
		</tr>
		<tr>
			<td align="right">Would You Like To Join Our Mailing List?</td>
			<td>
				<input type="radio" name="Join_Mailing_List?" value="Yes" /> Yes <br />
				<input type="radio" name="Join_Mailing_List?" value="No" /> No <br />
			</td>
		</tr>
		<tr><td align="right">Comments:</td>
			<td><textarea name="Comments" cols="40" rows="4" wrap="virtual"></textarea></td>
		</tr>
		<tr>
		
			<td colspan="2" align="center"></td>
		</tr>
    </table>
	<div class="g-recaptcha" data-sitekey="6LeebxATAAAAAJOLHGShDzCGO29AgYjWfwkAB71J"></div><input type="submit" name="submit" value="Send" />
    </form>
</body>

';

}//end else

?>