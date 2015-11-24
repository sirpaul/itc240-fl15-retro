<?php
//config.php

include 'credentials.php';

define('DEBUG',TRUE); #we want to see all errors

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

include 'common.php'; //stores all unsightly application functions, etc.
include 'MyAutoLoader.php'; //loads class that autoloads all classes in include folder

/* automatic path settings - use the following path settings for placing all code in one application folder */ 
define('VIRTUAL_PATH', 'http://www.mychaldeanfamily.com'); # Virtual (web) 'root' of application for images, JS & CSS files
define('PHYSICAL_PATH', ' /home/pauman20/mychaldeanfamily.com/'); # Physical (PHP) 'root' of application for file & upload reference
define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT

ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching



/*
echo DB_USER;
echo DB_HOST;
die;
*/

//This defines the current file name
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo THIS_PAGE;

//this allows us to add unique info to our pages
switch(THIS_PAGE)
{
	case "index.php":
		$title = "Welcome to the Retro!";
        $pageID = "Home";
		$headerPic = "./images/waitress.png";
		$headerAlt = "Waitress";
		break;
    case "samples.php":
        $title = "Samples";
        $pageID = "Samples";
		$headerPic = "./images/witch.png";
		$headerAlt = "Witch";
        break;
	case "daily.php";
        $title = "Daily";
        $pageID = "Daily";
		$headerPic = "./images/ghost.png";
		$headerAlt = "Ghost";
		break;
	case "contact.php";
        $title = "Contact Us!";
        $pageID = "Contact";
		$headerPic = "./images/mummy.png";
		$headerAlt = "Mummy";		
		break;
	case "about.php";
        $title = "About Us";
        $pageID = "About";
		$headerPic = "./images/count.png";
		$headerAlt = "Count";		
		break;
case "register.php";
		$title = "Register Here";
		$pageID = "Registration";
		$headerPic = "./images/witch.png";
		$headerAlt = "Witch";
		break;
case "customers.php";
		$title = "Our First Data Page";
		$pageID = "Customer Data!";
		$headerPic = "./images/witch.png";
		$headerAlt = "Witch";
		break;	
case "movies.php";
		$title = "Movie Page";
		$pageID = "Movies";
		$headerPic = "./images/witch.png";
		$headerAlt = "Witch";
		break;
case "movies_list.php";
		$title = "Movie List";
		$pageID = "Movie List";
		$headerPic = "./images/witch.png";
		$headerAlt = "Witch";
		break;		
    default: 
        $title = THIS_PAGE;
        $pageID = "Retro Diner";
           
}//end switch



//here are our navigation pages:
$nav1['index.php'] = 'Home';
$nav1['register.php'] = 'Register';
//$nav1['samples.php'] = 'Samples';
$nav1['daily.php'] = 'Daily';
$nav1['contact.php'] = 'Contact';
$nav1['about.php'] = 'About Us';
$nav1['customers.php'] = 'Customers';
$nav1['movies.php'] = 'Movies';


function makeLinks($arr, $prefix='', $suffix='', $exception='')
{
    $myReturn = '';
    foreach($arr as $link => $label)
    {
        if (THIS_PAGE == $link)
        {//current file gets active class
            $myReturn .= $exception . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }else {
            $myReturn .= $prefix . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }
    }
        return $myReturn;
}//end makeLinks()

function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

function showSidebar ($page, $icons, $planets)	{
if ($page === 'Registration' || $page === 'Contact') {
		echo randomize($icons) . '<br /><br /><br />';
		echo rotate($planets);
	}else {
		echo "";
	}	
}#end showHero()

$heros[] = '<img align="right" src="./images/coulson.png" />';
$heros[] = '<img align="right" src="./images/fury.png" />';
$heros[] = '<img align="right" src="./images/hulk.png" />';
$heros[] = '<img align="right" src="./images/thor.png" />';
$heros[] = '<img align="right" src="./images/black-widow.png" />';
$heros[] = '<img align="right" src="./images/captain-america.png" />';
$heros[] = '<img align="right" src="./images/machine.png" />';
$heros[] = '<img align="right" src="./images/iron-man.png" />';
$heros[] = '<img align="right" src="./images/loki.png" />';
$heros[] = '<img align="right" src="./images/giant.png" />';
$heros[] = '<img align="right" src="./images/hawkeye.png" />';

function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate

$planets[] = '<img src="images/mercury.gif" style="float:right";/>';

$planets[] = '<img src="images/venus.gif" style="float:right";/>';

$planets[] = '<img src="images/mars.gif" style="float:right";/>';

$planets[] = '<img src="images/jupiter.gif" style="float:right";/>';

$planets[] = '<img src="images/saturn.gif" style="float:right";/>';

$planets[] = '<img src="images/uranus.gif" style="float:right";/>';

$planets[] = '<img src="images/neptune.gif" style="float:right";/>';

$planets[] = '<img src="images/pluto.gif" style="float:right";/>';

/*
Allows us to send an email that respects the server domain spoofing polices of 
hosts like DH.

$response = safeEmail($to, $subject, $message, $replyTo='','html');

if($response)
{
    echo 'hopefully HTML email sent!<br />';
}else{
   echo 'Trouble with HTML email!<br />'; 
}

*/
function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
    
    if($replyTo !=''){
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    $headers = implode(PHP_EOL,$headers);

    return mail($to, $subject, $message, $headers);

}//end safeEmail()


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}

/**
 * generic error handling function for hiding db errors, etc.
 *
 * Change the socks reference and any HTML to suit
 *
 * @param string $myFile File from which error emitted
 * @param string $myLine Line where error can be found
 * @param string $errorMsg Message to be shown to admin only
 * @return void
 * @see dbIn()
 * @todo none
 */

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}

/**
 * Wrapper function for processing data pulled from db
 *
 * Forward slashes are added to MySQL data upon entry to prevent SQL errors.  
 * Using our dbOut() function allows us to encapsulate the most common functions for removing  
 * slashes with the PHP stripslashes() function, plus the trim() function to remove spaces.
 *
 * @param string $str data as pulled from MySQL
 * @return $str data cleaned of slashes, spaces around string, etc.
 * @see dbIn()
 * @todo none
 */
function dbOut($str)
{
	if($str!=""){$str = stripslashes(trim($str));}//strip out slashes entered for SQL safety
	return $str;
} #End dbOut()


