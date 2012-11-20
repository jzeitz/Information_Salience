<?php
include "dbconnect.php";
ini_set("auto_detect_line_endings", true);

$file = fopen("Fisher_CS_CSV.csv","r");
$title = fgetcsv($file);
$authorlast = fgetcsv($file);
$authorfirst = fgetcsv($file);
$numreadby = fgetcsv($file);

$query = "INSERT INTO docs (title, authorlast, authorfirst, numreadby) VALUES ('$title[0]', '$authorlast[0]', '$authorfirst[0]', '$numreadby[0]')";
	$result = mysqli_query($db, $query)
		or die("Error: Could not add document.");

$query = "SELECT MAX(docid) FROM docs";
	$result = mysqli_query($db, $query)
		or die("Error: Cound not find document ID.");
	$row = mysqli_fetch_array($result);
	
	$docid = $row['MAX(docid)'];

//$query = "SELECT docid FROM docs WHERE title='$title[0]' AND authorlast='$authorlast[0]' AND authorfirst='$authorfirst[0]'";
//	$result = mysqli_query($db, $query)
//		or die("Error: Could not find document.");
//	$row = mysqli_fetch_array($result);
//
//	$docid = $row['docid'];

$query = "SELECT MAX(paraid) FROM parasent";
	$result = mysqli_query($db, $query)
		or die("Error: Could not find max paraid.");
	$row = mysqli_fetch_array($result);
	
	$pnum = $row['MAX(paraid)'];
	
while(!feof($file)) {
	$line = fgetcsv($file);

	if ($line[0] == "p") {
		$pnum = $pnum + 1;
		
		//Insert document/paragraph pair into docpara table
		$query = "INSERT INTO docpara (docid, paraid) VALUES ($docid, $pnum)";
			$result = mysqli_query($db, $query)
				or die("Error: Could not add document/paragraph pair.");

	} else {

		$sent = mysqli_real_escape_string($db, $line[0]);
		$userscore = $line[1];
		$progscore = $line[2];
		
		//Insert sentence into sentences table
		$query = "INSERT INTO sentences (sent, userscore, progscore) VALUES ('$sent', '$userscore', '$progscore')";
			$result = mysqli_query($db, $query)
				or die("Error: Could not add sentence.");
//		if(!$result) {
//  			print "<br>Error: " . mysqli_error($db) . "<br><br>";
//		}		
		$query = "SELECT sentid FROM sentences WHERE sent='$sent'";
			$result = mysqli_query($db, $query)
				or die("Error: Could not find sentence.");
			$row = mysqli_fetch_array($result);
		
			$sentid = $row['sentid'];

		//Insert paragraph/sentence pair into parasent table
		$query = "INSERT INTO parasent (paraid, sentid) VALUES ($pnum, $sentid)";
			$result = mysqli_query($db, $query)
				or die("Error: Could not add paragraph/sentence pair.");
//		if(!$result) {
//  			print "<br>Error: " . mysqli_error($db) . "<br><br>";
//		}
	}
}

echo "<p><a href=\Information_Salience\index.php>Main</a></p>";

echo "Upload Successful!";

fclose($file);

?>