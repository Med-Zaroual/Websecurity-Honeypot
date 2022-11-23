
<?php require ('dbcon.php'); 
	include('session.php'); 

function move_to_folder($file,$dest){
	if (move_uploaded_file($file, $dest)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}

$msg="";
  // If upload button is clicked ...
  if(isset($_POST['upload'])){
    // Get image name 
    if(isset($_FILES['avatar']['name'])){
    	
    		// image file directory
		    $image=$_FILES['avatar']['name'];
		    $target = "Assets/img/".basename($image);
		   	$check_image=getImageByUserId($session_id);

	    	if(empty($check_image)){
			    $request=mysqli_query($con,"INSERT INTO Images (image,user_id) values ('$image','$session_id')");	    
	    	}
	    	else{
	    		$request=mysqli_query($con,"UPDATE Images set image='$image' where user_id='$session_id'");
	    	}
	//put the picture in img folder
	move_to_folder($_FILES['avatar']['tmp_name'],$target);
		    
	header("location:home.php");
	}    	
}
