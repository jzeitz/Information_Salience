<?php

$file = fopen("name.csv","r");
$title = fgets($file);
$authorlast = fgets($file);
$authorfirst = fgets($file);
$numreadby = fgets($file);

$query = "INSERT INTO docs (title, authorlast, authorfirst, numreadby) VALUES ('$title', '$authorlast', '$authorfirst', '$numreadby')";
	$result = mysqli_query($db, $query)
		or die("Error: Could not add document.");

$query = "SELECT docid FROM docs WHERE title='$title' AND authorlast='$authorlast' AND authorfirst='$authorfirst'";
	$row = mysqli_fetch_array($result);

	$docid=$row['docid'];
	
while(!feof($file)) {
	$line = fgets($file);
	
	while($line != "p") {
		$info = explode(',', $line);
		$sent = $info[0];
		$userscore = $info[1];
		$progscore = $info[2];
		
		$query = "INSERT INTO sentences (sent, userscore, progscore) VALUES ('$sent', '$userscore', '$progscore')";
			$result = mysqli_query($db, $query)
				or die("Error: Could not add sentence.");
	}
	print $parts[0].$parts[1];
}
fclose($file);

?>