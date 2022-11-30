<?php
require('session.php');
require('dbcon.php');

if(isset($_POST['submitFlag'])){

	if(isset($_POST['response1'])){

		$response=$_POST['response1'];
		$challenge=getResponse(1);
		//if($response=="actf{source_aint_secure}"){
		if($response === $challenge['flag']){
			echo "Bravo! You solved this Challenge.";
			$request=mysqli_query($con,"UPDATE Users set question1='1' where user_id='$session_id'");
		}else{
			echo "Incorrect, Try again !";
		}
	}

	
	if(isset($_POST['response2'])){

	}
}


?>