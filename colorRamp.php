<?php
session_start();
include "dbconnect.php";

$colors = file('colors.txt');
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
	$newColors = array();

	foreach ($colors as $color) {
		$newColors[] = (explode(" ", $color));
	}
//	foreach ($colors as $color) {
		echo "new color: " . $newColors[0][0] . "<br>";
		echo "new color: " . $newColors[0][1] . "<br>";
		echo "new color: " . $newColors[0][2] . "<br>";
	//}
?>
	
</div>
</body>
</html>