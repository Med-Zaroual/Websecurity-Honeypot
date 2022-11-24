<?php
// this is mvc index 
// there is a need to 
require("Config/config.php");

require ("Models/model.php"); //model
require("Views/response.php"); //view
require ("Controlers/Controler.php"); //controler



try{
	session();
	$originalAction = (!empty($_GET["action"]))? $_GET["action"]: "index";
	if ($originalAction !== "signup" )
		$action = (!empty($_SESSION["user_type"]))?  "index" : $originalAction;
	else $action = $originalAction;
	$action = $action."Action";

	if (is_callable($action)) 
	{
		$action($_REQUEST);
	}

	else
		throw new Exception("Cette action n'est pas autorisée");

}
catch(Exception $e) {//need more catch and detailed exploration of exeption this is quite shit even tho i can'y grassep how to make it better 
  $errorMessage = $e->getMessage();
  require("Views/vError_403.php");
}

?>

