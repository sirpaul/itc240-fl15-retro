<!DOCTYPE html>
<?php 

//ITC 240
//Fall 2015, M/W
//A3: Daily Grind

//2015-10-10
//Paul Mansoor

//based on the day of the week,
//display different content
//(pictures, font-colors, themes)

//get the day of the week from the server and assign to a variable
//$myDay = date('l');

//$myDay = 'Saturday'; //discrete day for testing

//create switch statement
//takes the weekday as the condition
//provides different lyrics, image and embedded video based on the day of the week

if(isset($_GET['day'])){
        $myDay = $_GET['day'];
    }else{
        $myDay = date('l');
    }

switch ($myDay) { 
	case 'Sunday': 		$lyrics = "Groovin! On a Sunday, Afternoon..";
						$image = 
						'/images/sunday.gif';
						$video = '<iframe width="420" height="315" src="https://www.youtube.com/embed/-ft8WLX9G1I" frameborder="0" allowfullscreen></iframe>';
						$product = "The Rascal's \"Groovin'\"";
						break;
	case 'Monday':		$lyrics = "Monday Monday..So Good To Me";
						$image = 
						'/images/monday.gif';
						$video = '<iframe width="420" height="315" src="https://www.youtube.com/embed/h81Ojd3d2rY" frameborder="0" allowfullscreen></iframe>';
						$product = "The Mama's and the Papa's \"Monday Monday'\"";
						break;
	case 'Tuesday':		$lyrics = "Gooood-bye, Ruby Tuesday!";
						$image = 
						'./images/tuesday.gif';
						$video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/a00_tPLcE_g" frameborder="0" allowfullscreen></iframe>';
						$product = "The Rolling Stone's \"Ruby Tuesday\"";
						break;
	case 'Wednesday':	$lyrics = "I Got Me a Brand-New Car That Was Made on Wednesday!";
						$image = 
						'./images/wednesday.gif';
						$video = '<iframe width="420" height="315" src="https://www.youtube.com/embed/J0zCO6uScYc" frameborder="0" allowfullscreen></iframe>';
						$product = "Johnny Cash's \"A Wednesday Car'\"";
						break;
	case 'Thursday':	$lyrics = "Thursday Night Your Stockings Needed Mending..";
						$image = 
						'./images/thursday.gif';
						$video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/kkJH90EphNo?list=RDkkJH90EphNo" frameborder="0" allowfullscreen></iframe>';
						$product = "The Beatles' \"Lady Madonna\"";
						break;
	case 'Friday':		$lyrics = "I Got Friday On My Mind!";
						$image = 
						'./images/friday.gif';
						$video = '<iframe width="420" height="315" src="https://www.youtube.com/embed/3iW2_Ec3uEU" frameborder="0" allowfullscreen></iframe>';
						$product = "The Easybeat's \"Friday On My Mind'\"";
						break;
	case 'Saturday':	$lyrics = "SAT-UR-DAY! SAT-UR-DAY!";
						$image = 
						'./images/saturday.gif';
						$video = '<iframe width="420" height="315" src="https://www.youtube.com/embed/26wEWSUUsUc" frameborder="0" allowfullscreen></iframe>';
						$product = "Elton John's \"Saturday Night's All Right For Fighting'\"";
						break;
	}
	
$style = strtolower($myDay); //converts the day to a class
$weekDay = "<span class=\"$style\">$myDay</span>";



?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Media Page</title>
		<meta name="media" content="noindex, nofollow" />
		<link rel="stylesheet" type="text/css" href="./css/dailyStyles.css">
	
	</head>

	<nav>
		<p><a href="daily.php?day=Sunday">Sunday</a></p>
		<p><a href="daily.php?day=Monday">Monday</a></p>
		<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
		<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
		<p><a href="daily.php?day=Thursday">Thursday</a></p>
		<p><a href="daily.php?day=Friday">Friday</a></p>
		<p><a href="daily.php?day=Saturday">Saturday</a></p>
</nav>
	
	
	
	<body>

	<div id="wrapper">

	<header>
	
	<h2> <span class="<?=$style ?>"><?=$lyrics ?></span></h2> <!--lyrics-->
	
	<!--
	
	<img class="kanji" alt="<?=$myDay ?>" src="./images/monday.gif" > 	
		
	-->	
	</header>
	
	<div id="video">
	<?=$video ?> <!--embedded video-->
	</div><!--end video-->
	
	
	<p>This <?=$weekDay ?> the tunes are rockin' and you need to come knockin' by <span id="door">Our Door</span>, the premeiere record and redistribution warehouse serving your needs since 1962!</p>
	
	<p>Mention the <span class="<?=$style ?>"><?=$myDay ?></span> discount and receive your complimentary copy of <span class="<?=$style ?>"><?=$product ?></span> for free! Your visit is our reward, and servicing you is our pleasure--stop by today and rock out to some classic jams!
	</p>
	
	
	</div><!--end wrapper-->
	
	<footer>
	   <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~
      <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a>
	  <br />
	  &copy; Paul Mansoor, 1982 - <?php echo date('Y'); ?>
	</footer>
	
	<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript">
	</script>

	
	
	
	</body>

	<script>
	</script>



</html>