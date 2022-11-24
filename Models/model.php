<?php
//session_start();
//include('session2.php');

$username = "";
$email = "";
$errors = array();

//connect to database with Procedurale Style 
function getCn(){
//    require("Config/config.php");
  global $config;
	$server = $config["database_server"];
	$db = $config["database_name"];
	$user = $config["database_user"];
	$password = $config["database_password"];
	static $conn;
	if(!$conn)	$conn = mysqli_connect($server,$user,$password,$db);
    return $conn;
};


//check_connection();

function check_connection(){
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();}
  else {
  echo "Connected to Database";}
}



function Nb_log_in(){
  $con = getCn();
  # $con = getCn();
  $nb=0;
  $users=getAllUsers();
  for($i=0;$i<count($users);$i++){
    if($users[$i]['status']=='1'){
      $nb++;
    }
  }
  return $nb;
}


function setImgDownload($imagePath) {           
    $image = imagecreatefromjpeg($imagePath);
    header('Content-Type: image/jpeg');
    imagejpeg($image);
}

//get list of all users
//https://www.w3schools.com/php/func_mysqli_fetch_all.asp#:~:text=Definition%20and%20Usage,only%20with%20MySQL%20Native%20Driver.
function getAllUsers(){
  $con = getCn();
  # $con = getCn();
  $users=array();
  $result=mysqli_query($con,"select * from Users");
  return $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
}



//return user array from their id
function getUserById($id){
  $con = getCn();
  $user=[];
  $query="select * from Users where user_id='$id'";
  $request=mysqli_query($con,$query) or die ('Error In Session');
  $user = mysqli_fetch_assoc($request);
  return $user;
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


// check if the current user is logged In
function getStatus($id){
  $con = getCn();
  # $con = getCn();
  $user=getUserById($id);
  if($user['status']=='1'){
    return "Connected";
  }
  return "Out";
}


function getAllImages(){
  $con = getCn();
  # $con = getCn();
  $images=array();
  $result=mysqli_query($con,"select * from Images");
  return $images=mysqli_fetch_all($result,MYSQLI_ASSOC);
}

function getImageByUserId($id){
  $con = getCn();
  # $con = getCn();
  $image=[];
  $request=mysqli_query($con,"select * from Images where user_id='$id'");
  $image = mysqli_fetch_assoc($request);
  return $image;
}

function add_image($id){
  $con = getCn();
  $msg="";
  // If upload button is clicked ...
  if(isset($_POST['upload'])){
    // Get image name 
    $image=$_FILES['avater']['name'];
    // image file directory
    $target = "Assets/img/".basename($image);
    $request=mysqli_query($con,"insert into Images (path,user_id) values ('$image','$id')");
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
    // $request=mysqli_query($con,"update Users set image='$path' where user_id='$id'");
}


// Once connected : change the status in DB
function changeStatus($id){
  $con = getCn();
  # con = getCn();
  if (isset($_SESSION['user_id']) && $_SESSION['user_id']=$id){
    $request=mysqli_query($con,"update Users set status='1' where user_id='$id'");
  }
}
//https://elevenstechwebtutorials.com/detail/45/enable-disable-user-login-in-php



// escape string
function escape($val){
  $con = getCn();
  #con = getCn();
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


// function isAdmin(){
//   if ($_SESSION['user_type'] === 'admin'){
//     header('location:admin.php');
//   }
//   else{
//     header('location:home.php');
//   }
// }

//===================== Disabel / Enable Users ===================== 
function disable_user($id){
  $con = getCn();
  #con=getCn();
  $request=mysqli_query($con,"update Users set user_type=\"blocked\" where user_id='$id'");
}
function enable_user($id){
  $con = getCn();
  #con=getCn();
  $request=mysqli_query($con,"update Users set user_type=\"user\" where user_id='$id'");
}
//=====================  =====================  =====================
 

 //https://stackoverflow.com/questions/2440506/how-to-check-if-an-array-value-exists
//check the status of each users, based on it session
//in admin.php => getStatus("user_id",$user["user_id"])
function getStatus2($key,$value){ // => didnt work properly: DROPPED
  $con = getCn();
  #con=getCn();
  $allSessions=getAllSessions();
  foreach ($allSessions as $s){
    if(isset($s[$key]) && $s[$key] === $value){
        return "In";
    }
        return "out";
    }}


?>