<?php
	$connection = mysqli_connect('localhost', 'root', '', 'mydb');

	if (mysqli_connect_errno()) {
		die('Database Connection failed' . mysqli_connect_error());
	} else {
		//echo "Connection Successful";
	}
?>