<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<head>
	<title><?php echo "$title"?></title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php"><img class="logo" src="images/logo.png" width="513" height="84" alt="" title=""></a>
			<a href="index.php"><img  src=<?php echo $headerPic; ?> width="332" height="205" alt="<?php echo $headerAlt; ?>" title="<?php echo $headerAlt; ?>"></a>
			<ul class="navigation">
                <?=makeLinks($nav1, '<li>', '</li>', '<li class="active">')?>				
				
			</ul>
		</div>
	</div>
	<div id="body">
		<div id="content">
			<div>
				<div>
					<?php showSidebar($pageID, $heros, $planets); ?>
                    <!--header ends here-->