
<?php require ('dbcon.php'); 
			include('session.php'); 

function move_to_folder($file,$dest){
	if (move_uploaded_file($file, $dest)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}

$statusMsg="";
// If upload button is clicked ...
if(isset($_POST['upload'])){
  // Get image name 
  if(isset($_FILES['avatar']['name'])){
    	
    		//image file directory
		    $image=$_FILES['avatar']['name'];
		    //haching uploaded files
		    //$ext = strtolower(substr($image, strripos($image, '.')+1));
				//$filename = hash_file('sha256', $image. rand(1,100)) . '.' . $ext;
		    // basename() may prevent directory traversal attacks, but further validations are required
		    $target = "Assets/img/".basename($image);
		    $fileType = pathinfo($target,PATHINFO_EXTENSION);
		    // Allow certain file formats
    		$allowTypes = array('jpg','png','jpeg','gif','pdf');

    		if(in_array($fileType, $allowTypes)){
    				//Move the uploaded file img folder
    				move_to_folder($_FILES['avatar']['tmp_name'],$target);

    				// Insert image file name into database
    				$request=mysqli_query($con,"UPDATE Users set image='$image' where user_id='$session_id'");
    						if($request){
		                $statusMsg = "The file ".$image. " has been uploaded successfully.";
		            }else{
		                $statusMsg = "File upload failed, please try again.";
		            }
		        header("location:home.php");
    		}
    		else $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
	}    	
}


//https://www.codexworld.com/upload-store-image-file-in-database-using-php-mysql/#:~:text=Get%20the%20file%20extension%20using,be%20shown%20to%20the%20user.
