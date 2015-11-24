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
    header('location:movie_list.php');
}

$sql = "select * from Movies where MovieID = $id";
//identifies this as a mysql i connection
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
	while($row = mysqli_fetch_assoc($result))
	{
        $movie = stripslashes($row['Title']);
		$year = stripslashes($row['Released']);
		$director = stripslashes($row['Director']);
		$writer = stripslashes($row['Writer']);
		$description = stripslashes($row['Description']);
		$url = stripslashes($row['URL']);
        $title = "Presenting " . $movie;
		$poster = stripslashes($row['Poster']);
        $pageID = $movie;
        $Feedback = ''; //no feedback necessary
	}
}else{//inform no records
	$Feedback = '<span>This movie does not exist.</span>';
}

?>

<?php include 'includes/header.php'; ?>	

<h1><?php echo $pageID;?></h1>

<!--<?php echo $id; ?>-->
<!--<?php echo $poster; ?>-->

<?php

if($Feedback == '')
{//data exists, show it

echo '<table >';
	echo '<tr>';
	echo '<td><a href="'.$url.'"><img class="view" alt="' .$movie. '" src="' .$poster. '"/></a></td>';
	
	echo '<td>';
		echo '<p>';
				echo 'Title: <a href=' . $url . '><b>'.$movie.'</b></a><br/> ';
				echo 'Released: <b>' . $year . '</b><br/> ';
				echo 'Director(s): <b>' . $director . '</b><br/> ';
				echo 'Writer(s): <b>' . $writer . '</b><br/> ';
				echo 'Description: <b>' . $description . '</b><br/> ';
		echo '<p>';
	
	echo '</td>';
	
	echo '</tr>';
echo '</table>';

}else{//warn user no data
    echo $Feedback;
}
echo '<p><a href="movies_list.php">Go Back</a></p>';
/*
echo '<a href="movies_list.php?id=' . $row['MovieID'] . '">' . $row['Title'] . '</a>';
*/

//release web server resources
//@-symbol usually squelches any feedback

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);
?>

<?php include 'includes/footer.php';?>


