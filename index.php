<?php 
session_start();
include "dbconnect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Information Salience</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
<div id="wrap">
	<?php
		$query = "SELECT * FROM docs";
		$result = mysqli_query($db, $query)
			or die("Error querying Database");

		while ($row = mysqli_fetch_array($result)) {
			$docid = $row['docid'];
			$title = $row['title'];
			$authorlast = $row['authorlast'];
			$authorfirst = $row['authorfirst'];
			
			echo "<p><a href=\"doc.php?id=$docid\">$title</a></p>";
			echo "<p>$authorlast, $authorfirst</p>";
		}
	?>
	<?php
		
		$query = "SELECT sentid, sent FROM sentences NATURAL JOIN parasent NATURAL JOIN docpara WHERE paraid=2 ORDER BY sentid ASC";
		$result = mysqli_query($db, $query)
			or die("Error querying Database");
		
		while($row = mysqli_fetch_array($result)) {
			$sent = $row['sent'];
		
			echo "<p>$sent</p>";
			
		}
	?>
<!--    <?php
		//if(session_is_registered(myusername)){
		if(isset($_SESSION['userid'])){
			include("headerUser.php");
		} else {
			include("headerGuest.html");
		}
	?>
-->	
	
</div>
</body>
</html>