<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>	
<h1>Here's the <?php echo $pageID;?> page!</h1>

<?php

if(isset($_POST['submit']))
{//data submitted
    
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    $to = 'pmanso01@seattlecentral.edu';
    $message = process_post(); //change this to processpost() function after including that in the config.php file
    $replyTo=$_POST['Email'];
    $subject = 'Test from Contact Form';
 
    safeEmail($to, $subject, $message, $replyTo='','html');

	echo '<h2>Do a good turn daily!<h2>';
    
}else{//show forms
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <label>Name:</label><input type="text" name="Name" required="required" /><br />
	
    <label>Email:</label><input type="email" name="Email" required="required" /><br />  
	
	<label>Telephone:</label><input type="tel" name="phone" required="required"/><br />
		
	<label>Age:</label><input type="number" name="age" min="0" max="200" required="required"/><br />
		
	<label>My hero is:</label><input type="text" name="Hero" required="required"/><br />
		
	<label>Handedness:</label><br />
	<input type="radio" name="hand" value="left"/>Left-Handed<br />
	<input type="radio" name="hand" value="right"/>Right-Handed<br />
	
	<label>Comments:</label><textarea name="Comments"></textarea><br />
	
	<label>Feedback:</label><textarea name="Feedback"></textarea><br />

	<label>I prefer:</label><br />
	<input type="checkbox" name="transport" value="Drive"/>Driving<br />
	<input type="checkbox" name="transport" value="Bike"/>Biking<br />
	<input type="checkbox" name="transport" value="Walk"/>Walking<br />
	<input type="checkbox" name="transport" value="Sled"/>Sledding<br />
	
	<label>What are you best at?</label>
	<input type="text" name="Ability" value="" required="required"/><br />
		
	<input type="submit" value="Send" name="submit"/>	
    </form>
    ';
}

?>

<?php include 'includes/footer.php';?>


