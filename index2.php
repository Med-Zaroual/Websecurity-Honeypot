<?php

require("Config/config.php");

require ("Models/model.php"); //model
require("Views/response.php"); //view
require ("Controlers/Controler.php"); //controler



try{
	$action = (!empty($_GET["action"]))? $_GET["action"]: "index";

	// $action= (!isset($_SESSION["user"]))? $originlAction : "login";
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
  require("views/vError.php");
}

?>

