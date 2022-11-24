<?php


function indexAction(){
	$erreur = [];
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
			if(empty($_POST["user"]))
				$erreur["user"]   ="Le user est vide !..."   ;
			
			if(empty($_POST["pass"]))  $erreur["pass"]    ="Le password est vide !...."   ;
		

			if ($erreur == []) {
				// $t = array('user'=>$_POST['user'],'pass'=>$_POST['pass']);
				chechlogin();
			}
	}
	views("vIndex.php",["erreur" => $erreur]);
};
function chechLogin(){
	$con = getCn();
	if (isset($_POST['login']))
	{
		// For login security 
		$username = mysqli_real_escape_string($con, $_POST['user']);
		$password = mysqli_real_escape_string($con, md5($_POST['pass']));

		$query= mysqli_query($con, "SELECT * FROM Users WHERE  password='$password' and username='$username'");
		$row= mysqli_fetch_array($query);
		$num_row= mysqli_num_rows($query);
		if ($num_row > 0) {			
			if($row['user_type']=="blocked"){
				//echo "This user is Blocked!";
				views('vError_403.php');
			}
			else{
				$_SESSION['user_id']=$row['user_id'];
				changeStatus($row['user_id']); // Change status to '1', Once connected.
				echo($row['user_type']."howhowHOWHOW");
				$_SESSION['user_type']=$row['user_type'];
				isAdmin();
				// if ($_SESSION['user_type'] === 'admin'){
				// 	  header('location: index.php?action=admin');
				// 	//   echo("halohalo1");
				
				// 	}
				// 	else{
				// 		header('location: index.php?action=user');
				// 		// echo("halohalo2");
				// 	}
				}
		}
		else{	
				header('location:index.php');
				echo 'Invalid Username and Password Combination';
		}
		// views('vIndex.php');
	}
	// views('vIndex.php');
};

// function 
function adminAction(){
	$session_id=$_SESSION['user_id'];
	$list = getAllUsers();
	$nb1 = count($list);
	$nb = Nb_log_in();
	$row=getUserById($session_id);
	views('vAdmin.php',['liste' => $list,'nb1' => $nb1,'nb' => $nb, 'row' => $row]);
};

function userAction(){
$session_id=$_SESSION['user_id'];
$row = getUserById($session_id);
views('vHome.php',['row' => $row]);

};

function isAdmin(){
	if ($_SESSION['user_type'] === 'admin'){
	//   views('vAdmin.php');
	  header('location:index.php?action=admin');
	  echo("halohalo1");

	}
	else{
		header('location:index.php?action=user');
		echo("halohalo2");

	//   views('vHome.php');
	}
};

function signupAction(){
	$erreur = [];
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
			if(empty($_POST["user"]))
				$erreur["user"]   ="Le user est vide !..."   ;
			
			if(empty($_POST["email"]))  $erreur["email"]    ="Le email est vide !...."   ;
			if(empty($_POST["pass"]))  $erreur["pass"]    ="Le password est vide !...."   ;
			if(empty($_POST["conf_pass"]))  $erreur["conf_pass"]    ="Le confirmation password est vide !...."   ;
			if($_POST["pass"] !== $_POST["conf_pass"] ) $erreur["conf_pass"] = "the password is not equal to!..";

			if ($erreur == []) { //TODO: manage error massage
				chech_registration();
				header ("location: index.php");

			}
	}
views('vRegister.php',['error' => $erreur]);
};
function move_to_folder($file,$dest){
	if (move_uploaded_file($file, $dest)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}

function uploadAction(){
  $session_id=$_SESSION['user_id'];
  $msg="";
  $con = getCn();
  // If upload button is clicked ...
  if(isset($_POST['upload'])){
	// Get image name 
	if(isset($_FILES['avatar']['name'])){
		  
			  //image file directory
			  $image=$_FILES['avatar']['name'];
			  $target = "Assets/img/".basename($image);
				 //$check_image=getImageByUserId($session_id);
				  $request=mysqli_query($con,"UPDATE Users set image='$image' where user_id='$session_id'");
	   
				  //put the picture in img folder
				  move_to_folder($_FILES['avatar']['tmp_name'],$target);
						  
				  header("location:index.php?action=user");
	  }    	
  }
  
  views('vHome.php');
};

function session(){
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
		header("location: index.php");
		exit();
	}
	return $_SESSION['user_id'];
};


function enableAction(){
	if(isset($_GET['user'])){
		$id=$_GET['user'];
		enable_user($id);
		header('location: index.php?action=admin');
		// adminAction();
	}
};

function disableAction(){
	if(isset($_GET['user'])){
		$id=$_GET['user'];
		$user=getUserById($id);
		if($user['user_type'] !== "admin"){	
			disable_user($id);
			header('location:index.php?action=admin');
		}else{
			// header('location:index.php?action')
			// header('lo')
			views('vError_403.php');
		}
	}
};

function logoutAction(){
	session_start();
	$session_id=$_SESSION['user_id'];
	echo($session_id);
	session_destroy();
	echo($_SESSION['user_id']);
	$request=mysqli_query(getCn(),"update Users set status='0' where user_id='$session_id'");
	// echo("help");
	header('location: index.php');
};


function chech_registration(){ // called inside
	$con = getCn();
if (isset($_POST['register']))
{
	//assign data received from post to variables
	$email = $_POST['email'];
	$username = $_POST['user'];
	$password1 = $_POST['pass'];
	$password_conf = $_POST['conf_pass'];

	// form validation: ensure that the form is correctly filled
	if ($password1 !== $password_conf) {
	//array_push($errors, "The two passwords do not match");
	echo "passwords are not matched!";
	}
	else{
	//Encrypt Created Password
	$password=md5($password1);

	//Ship data to Database
	$query= "INSERT INTO Users (username , email, user_type,  password, image, status) VALUES('$username','$email','user','$password','','0')";
	$result=mysqli_query($con,$query);


	//================================ Session Operations =============================
	$_SESSION['success']="You are now logged in";
		
	// get id of the created user and assign it to the new session
		$logged_in_user_id = mysqli_insert_id($con);
		$_SESSION['user_id']= $logged_in_user_id;

	// put logged in user in session, Storing the user in a session variable means that the user is available even if you refresh and navigate to other pages
		$_SESSION['current-user']= getUserById($logged_in_user_id); // put logged in user in session
	//================================================================================================


	//check if data has been successfully tranferred
		if($result){
			header('location:home.php');
			changeStatus($_SESSION['user_id']); // Change status to '1', Once connected.
			//$msg = " Registered Sussecfully";
		}
		else
			$msg = " Error Registering";
	echo $msg;
	}
}    
};

// function 


function receptionOption($data)
{
	if(isset($_GET["lang"])) setcookie("lang",$_GET["lang"], time()+ 3600*24*10);
	
};
	