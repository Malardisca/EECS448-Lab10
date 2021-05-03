<?php
	$users = new mysqli("mysql.eecs.ku.edu","yaoqianmai","eoz7Huga","yaoqianmai");
	$user_id = $_POST["user"];

	if ($users->connect_errno) {
		printf("Connect failed: %s\n", $users->connect_error);
		exit();
	}

	$query = "INSERT INTO Users VALUES ('$user_id')";

	if ($users->query($query)) {
		echo "<p>id was created successfully </p><br />";
		echo "<a href='../index.html'>Back home</a>";
	} 
	else {
		echo "<p>id already exist </p><br />";
		echo "<a href='CreateUserInterface.html'>Let's try again</a><br />";
		echo "<a href='../index.html'>Back home</a>";
	}

	$users->close();
?>
