<?php
//session_start();
//include('session2.php');

$username = "";
$email = "";
$errors = array();

//connect to the database with procedurale style != Object oriented style
$con = mysqli_connect("localhost","root","12341234","login");
//check_connection();

function check_connection(){
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();}
  else {
  echo "Connected to Database";}
}



function Nb_log_in(){
  global $con;
  $nb=0;
  $users=getAllUsers();
  for($i=0;$i<count($users);$i++){
    if($users[$i]['status']=='1'){
      $nb++;
    }
  }
  return $nb;
}


//get list of all users
//https://www.w3schools.com/php/func_mysqli_fetch_all.asp#:~:text=Definition%20and%20Usage,only%20with%20MySQL%20Native%20Driver.
function getAllUsers(){
  global $con;
  $users=array();
  $result=mysqli_query($con,"select * from Users");
  //$result=mysqli_query($con,"select * from Users where user_type='Normal user'");
  return $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
}


//return user array from their id
function getUserById($id){
  global $con;
  $user=[];
  $query="select * from Users where user_id='$id'";
  $request=mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($request);
  return $user;
}


//get Users by the sessions's user information
function getUserBySessionId($id){
  global $con;
  $result=mysqli_query($con, "select * from Users where user_id='$id'")or die('Error In Session');
  $row=mysqli_fetch_array($result);
  return $row;
}


//Looping Through All a Server's Sessions in PHP
function getAllSessions(){
$allSessions = [];
//location in MacOS
$sessionNames = scandir(sys_get_temp_dir());
//$sessionNames = scandir(session_save_path()); => on linux

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


//https://stackoverflow.com/questions/2440506/how-to-check-if-an-array-value-exists
//check the status of each users, based on it session
//in admin.php => getStatus("user_id",$user["user_id"])
function getStatus2($key,$value){ // => didnt work properly: DROPPED
  global $con;
  $allSessions=getAllSessions();
  foreach ($allSessions as $s){
    if(isset($s[$key]) && $s[$key] === $value){
        return "In";
    }
        return "out";
    }}

// check if the current user is logged In
function getStatus($id){
  global $con;
  $user=getUserById($id);
  if($user['status']=='1'){
    return "Connected";
  }
  return "Out";
}


// Once connected : change the status in DB
//https://elevenstechwebtutorials.com/detail/45/enable-disable-user-login-in-php
function changeStatus($id){
  global $con;
  if (isset($_SESSION['user_id']) && $_SESSION['user_id']=$id){
    $request=mysqli_query($con,"update Users set status='1' where user_id='$id'");
  }
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

//===================== Disabel / Enable Users ===================== 
function disable_user($id){
  global $con;
  $request=mysqli_query($con,"update Users set user_type=\"blocked\" where user_id='$id'");
}
function enable_user($id){
  global $con;
  $request=mysqli_query($con,"update Users set user_type=\"user\" where user_id='$id'");
}
//=====================  =====================  =====================
 

?>