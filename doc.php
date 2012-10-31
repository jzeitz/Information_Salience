<?php
include "dbconnect.php";
include "colorRamp.php";

$docid = $_GET['id'];

$query = "select * from docs where docid='$docid'";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$title = $row['title'];
	$authorlast = $row['authorlast'];
	$authorfirst = $row['authorfirst'];
	
$query = "";
	
//function colorRamp($score, $min, $max)
	//global list
	//size = len(list)
	//score = (float(score)/float(max))*100.0
	//index = score/(100.0/size)
	//c = list[int(index)]
	//return c
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  echo "<title>$title</title>";
  ?>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
<div id="wrap">

	<?php
		echo "<p><a href=\Information_Salience\index.php>Main</a></p>";
		
		echo "<p>$title</p>";
		echo "<p>$authorlast, $authorfirst</p>";
	
		$query = "SELECT paraid FROM docpara NATURAL JOIN docs WHERE docid=$docid";
			$result = mysqli_query($db, $query)
				or die("Error querying Database");
		
		$c1 = $newColors[0][0];
		$c2 = $newColors[0][1];
		$c3 = $newColors[0][2];
		//$c1 = "255";
		//$c2 = "255";
		//$c3 = "0";
		echo $c1;
		echo $c2;
		echo $c3;
		
		while($row = mysqli_fetch_array($result)) {
			$paraid = $row['paraid'];
//			echo "<p>$paraid</p>";

			echo "<p>";

			$query2 = "SELECT sent FROM sentences NATURAL JOIN parasent WHERE paraid=$paraid";
				$result2 = mysqli_query($db, $query2)
					or die("Error querying Database");
				
			while($row2 = mysqli_fetch_array($result2)) {
				$sent = $row2['sent'];

				echo "<span style=background-color:rgb(".$c1.",".$c2.",".$c3.")>$sent </span>";
			}
			echo "</p>";
		}
	
//	$query = "SELECT sentid, sent FROM sentences NATURAL JOIN parasent NATURAL JOIN docpara WHERE docid=1 AND paraid=2 ORDER BY sentid ASC";
	
//	$query = "SELECT COUNT FROM sentences NATURAL JOIN parasent NATURAL JOIN docpara WHERE docid=$docid";

	?>
	
</div>
</body>
</html>