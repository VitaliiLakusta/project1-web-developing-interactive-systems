<?php 
require_once(realpath(dirname(__FILE__) . "/functions.php"));

//TODO change db configuration after configuring XAMPP
$config = array(
	"db" => array(
		"dbname" => "mydb", 
		"username" => "root",
		"password" => "root",
		"host" => "localhost"
	),
	"paths" => array(
		"resources" => realpath(dirname(__FILE__)),
		"images" => realpath(dirname(__FILE__) . "/../public_html/img")
	)
);

defined("TEMPLATES_PATH")
	or define ("TEMPLATES_PATH", realpath(dirname(__FILE__)) . "/templates");

/* 
	Error reporting 
	// TODO read about this in detail
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRICT);

createCommentsTable();

?>