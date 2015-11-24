<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>	

<h1>Here's the <?php echo $pageID;?> page!</h1>

<?php

//identifies this as a mysql i connection
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql = "select * from Customers where CustomerID >0";

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<p>';
		echo 'FirstName: <b>' . $row['FirstName'] . '</b><br/> ';
		echo 'LastName: <b>' . $row['LastName'] . '</b><br/>';
		echo 'Email: <b>' . $row['Email'] . '</b><br/>';
        
        echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
        
		echo '<p>';
	}
}else{//inform no records
	echo '<div>Currently no customer records</div>';
}

//release web server resources
//@-symbol usually squelches any feedback

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>

<?php include 'includes/footer.php';?>


