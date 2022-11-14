<?php

//Looping Through All a Server's Sessions in PHP
$allSessions = [];

$sessionNames = scandir(sys_get_temp_dir());

foreach($sessionNames as $sessionName) {
    $sessionName = str_replace("sess_","",$sessionName);
    if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions
        session_id($sessionName);
        session_start();
        $allSessions[$sessionName] = $_SESSION;
        session_abort();
    }
}
print_r($allSessions);