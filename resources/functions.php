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

		if ($conn->query($sql) === false) {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	function getCommentsFromDB() {
		global $config;

		$conn = new mysqli($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
		if ($conn->connect_error) {
			die ("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT name, comment FROM Comments";
		return $conn->query($sql);
	}

	function render($template, $data = array()) {
		if (file_exists($template)) {
			if (count($data) > 0) {
				foreach ($data as $key => $value) {
					if (strlen($key) > 0) {
						${$key} = $value;
					}
				}
			}
		}
		require($template);
	}

?>