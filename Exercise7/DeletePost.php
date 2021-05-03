<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$mysqli = new mysqli("mysql.eecs.ku.edu","yaoqianmai","eoz7Huga","yaoqianmai");
	$posts = $_POST["posts"];

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	if(isset($posts) && is_array($posts) ) {
		foreach($posts as $post) {
			$query = "DELETE FROM Posts 
			WHERE  post_id = '" . $mysqli->real_escape_string($post) . "'";
			if ($result = $mysqli->query($query)) {
				echo "Deleted post {$post}"; 
				echo "<br>";
				echo "<a href='https://people.eecs.ku.edu/~y079m707/Lab10/Exercise4/AdminHome.html'>Back Admin Home</a>";
			} else {
				echo "Error: " . $result . "<br>" . $mysqli->error;
				echo "<a href='https://people.eecs.ku.edu/~y079m707/Lab10/Exercise4/AdminHome.html'>Back Admin Home</a>";
			}
		}
	}

	$mysqli->close();
?>
