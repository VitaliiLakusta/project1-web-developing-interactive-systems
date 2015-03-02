<?php 
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(realpath(dirname(__FILE__) . "/../resources/functions.php"));


	require_once(TEMPLATES_PATH . "/header.php");

	// get comments from a database
	$result = getCommentsFromDB();

	$comments = array();
	for ($i = 0; $i < $result->num_rows; $i++) {
		$comments[$i] = $result->fetch_assoc();
		var_dump($comments[$i]);
	}

 	render(TEMPLATES_PATH . "/main_page.php", array("commentList" => $comments));

	require_once(TEMPLATES_PATH . "/footer.php");

?>