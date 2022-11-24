<?php
// require('Config/config.php');
function views($vue , array $data=array()) 
{
require('Config/config.php');

extract($data);
// $file ="views/". $vue."php";
$file ="Views/". $vue;

if (file_exists($file)) {
	ob_start();
	require ($file);
	$view= ob_get_clean(); 
}
else
{
throw new Exception("Fichier Introuvable!...");
}	

require($config["templates_path"].$config["active_template"]);

}
