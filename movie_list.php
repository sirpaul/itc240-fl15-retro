<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>	

<h1>Here's the <?php echo $pageID;?> page!</h1>

<?php

//identifies this as a mysql i connection
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql = "select * from Movies";

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<p>';
		echo 'Title: <b>' . $row['Title'] . '</b><br/> ';
		echo 'Released: <b>' . $row['Released'] . '</b><br/> ';
		echo 'Director(s): <b>' . $row['Director'] . '</b><br/> ';
		echo 'Writer(s): <b>' . $row['Writer'] . '</b><br/> ';
		echo 'Description: <b>' . $row['Description'] . '</b><br/> ';
        
		echo '<p>';
	}
}else{//inform no records
	echo '<div>Currently no Movies</div>';
}

//release web server resources
//@-symbol usually squelches any feedback

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>

<?php include 'includes/footer.php';?>


