<?php include 'includes/config.php'; 
//customer_view.php
//shows details of a single customer
?>

<?php




//process query string here
if(isset($_GET['id']))
{//if there is data, process data
    //cast the data to an integer for security purposes
    $id = (int)$_GET['id'];
}else {//redirect to safe page
    //this is called a redirect
    header('location:customer_list.php');
}




$sql = "select * from Customers where CustomerID = $id";
//identifies this as a mysql i connection
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
	while($row = mysqli_fetch_assoc($result))
	{
        $FirstName = stripslashes($row['FirstName']);
        $LastName = stripslashes($row['LastName']);
        $email = stripslashes($row['Email']);
        $title = "Title page for " . $FirstName;
        $pageID = $FirstName;
        $Feedback = ''; //no feedback necessary
	}
}else{//inform no records
	$Feedback = '<span>This customer does not exist.</span>';
}

?>

<?php include 'includes/header.php'; ?>	

<h1>Here's the <?php echo $pageID;?> page!</h1>

<?php echo $id ?>

<?php

if($Feedback == '')
{//data exists, show it
echo '<p>';
echo 'FirstName: <b>' . $FirstName . '</b><br/> ';
echo 'LastName: <b>' . $LastName . '</b><br/>';
echo 'Email: <b>' . $email . '</b><br/>';

echo '<p>';

}else{//warn user no data
    echo $Feedback;
}
echo '<p><a href="customer_list.php">Go Back</a></p>';
/*
echo '<a href="customer_list.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
*/

//release web server resources
//@-symbol usually squelches any feedback

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);
?>

<?php include 'includes/footer.php';?>


