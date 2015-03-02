<?php 
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(realpath(dirname(__FILE__) . "/../resources/functions.php"));

	// create Commments table, if not existing yet
	createCommentsTable();

	require_once(TEMPLATES_PATH . "/header.php");

	require_once(TEMPLATES_PATH . "/main_page.php");

	require_once(TEMPLATES_PATH . "/footer.php");
?>