<?php
	require_once(realpath(dirname(__FILE__) . "/config.php"));

	function createCommentsTable() {
		global $config;

		// establish connection
		$conn = new mysqli($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		// create a table Comments, if doesn't exist
		$var = "SELECT 1 FROM Comments";
		if ($conn->query($var) == false) {
			// sql to create Comments table
			$sql = "CREATE TABLE Comments(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30),
				comment TINYTEXT NOT NULL,
				date TIMESTAMP
			)";		

			if (!$conn->query($sql))
				echo "Error creating table: " . $conn->error;
			else
				echo "Table successfully created!";			
		}

		$conn->close();
	}

	function insertCommentIntoDB($name, $comment) {
		global $config;

		if ($name == "") {
			$name = "Anonymous";
		}

		$conn = new mysqli($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
		if ($conn->connect_error) {
			die ("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO Comments (name, comment)
			VALUES ('". $name . "', '" . $comment . "')";

		if ($conn->query($sql) === true) {
			echo "New record successfully created";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

?>