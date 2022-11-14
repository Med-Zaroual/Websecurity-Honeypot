<?php
//session_start();
//include('session2.php');

$username = "";
$email = "";
$errors = array();

$con = mysqli_connect("localhost","root","Amir0618104127.","login");

// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// else {
//   echo "Connected to Database";}

//get Users by the sessions's user information
function getUserBySessionId($id){
  global $con;
  $result=mysqli_query($con, "select * from Users where user_id='$id'")or die('Error In Session');
  $row=mysqli_fetch_array($result);
  return $row;
}

//get list of all users
//https://www.w3schools.com/php/func_mysqli_fetch_all.asp#:~:text=Definition%20and%20Usage,only%20with%20MySQL%20Native%20Driver.
function getAllUsers(){
  global $con;
  $users=array();
  $result=mysqli_query($con,"select * from Users where user_type='Normal user'");
  return $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
}

//return user array from their id
function getUserById($id){
  global $con;
  $query="select * from Users where user_id=".$id;
  $request=mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($result);
  return $user;
}



//Looping Through All a Server's Sessions in PHP
function getAllSessions(){

$allSessions = [];

//location in MacOS
$sessionNames = scandir(sys_get_temp_dir());
//$sessionNames = scandir(session_save_path());

foreach($sessionNames as $sessionName) {
    $sessionName = str_replace("sess_","",$sessionName);
    if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions
        //session_id($sessionName);
        //session_start();
        $allSessions[$sessionName] = $_SESSION;
        //session_abort();
    }
} return $allSessions;
}

function getStatus($User_Id){
  global $con;
  $users=getAllUsers();
  $allSessions=getAllSessions();
  foreach($users as $u){
    $user_id=$u[$User_Id];
    foreach($allSessions as $s){
      if(isset($s[$user_id]))
        return "In";
      else
        return "out";
    }
  }
}

function getUsersIN(){

}

// escape string
function escape($val){
  global $con;
  return mysqli_real_escape_string($con, trim($val));
}


//display Errors
function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
}


function isAdmin(){
  if ($_SESSION['user_type'] === 'admin'){
    header('location:admin.php');
  }
  else{
    header('location:home.php');
  }
}

 

?>