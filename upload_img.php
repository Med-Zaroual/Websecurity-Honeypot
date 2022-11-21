<?php
include ('header.php');
include ('dbcon.php');

// check input file tagged with name 'avatar' has some image with name or not
if (isset($_FILES['avatar']['name'])){ 

	$name=$_FILES['avatar']['name'];
	$size=$_FILES['avatar']['size'];

	// wihtout the "$tmp" we would get the Notice: Only variables should be passed by reference
	$tmp=explode(".", $name);
	$ext= end($tmp);

	$allowed_ext=array("png","jpg","jpeg");
	if(in_array($ext, $allowed_ext)){
		if($size < (1024*1024)) {

		   $new_image = '';
		   $new_name = md5(rand()) . '.' . $ext;
		   $path = 'Assets/img/' . $new_name;
		   list($width, $height) = getimagesize($_FILES['avatar']['tmp_name']);

		   if($ext == 'png'){
		    $new_image = imagecreatefrompng($_FILES['avatar']['tmp_name']);
		   }
		   if($ext == 'jpg' || $ext == 'jpeg'){  
               $new_image = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);  
            }

            $new_width=200;
            $new_height = ($height/$width)*200;
            $tmp_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($tmp_image, $path, 100);
            imagedestroy($new_image);
            imagedestroy($tmp_image);
            // echo '<img src="'.$path.'" />';
  		}
  		else{
			echo "Image File size must be less than 1 MB";
		}
	}
	else{
		echo "Invalid Image File!";
	}


}
else{
	echo 'Please Select Image File';
}

?>
<!-- <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="name">NAME</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
	</div>
	<div class="form-group">
		<label for="email">EMAIL</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
	</div>
	<input id="uploadImage" type="file" accept="image/*" name="image" />
	<div id="preview"><img src="filed.png" /></div><br>
		<input class="btn btn-success" type="submit" value="Upload">
</form> -->




<!-- where putting the uploaded img -->
<form method="post" id="upload_img "action="upload_img.php" enctype="multipart/form-data">
	<input type="file" name="avatar" id="myAvatar"/>
	<input type="submit" value="upload">
</form>

<!-- where displaying the uploaded img -->
<div id="preview">
	<?php echo '<img src="'.$path.'" />' ?>
</div>



<script type="text/javascript">

$(document).ready(function () {
	$("#myAvatar").change((function() {
		$("#preview").html('<label> Image Uploading ... </label>');
		$("#upload_img").ajaxForm({
			target: '#preview';
		}).submit();
	});
});

 // $("#form").on('submit',(function(e) {
 //  e.preventDefault();
 //  $.ajax({
 //         url: "ajaxupload.php",
 //   type: "POST",
 //   data:  new FormData(this),
 //   contentType: false,
 //         cache: false,
 //   processData:false,
 //   beforeSend : function()
 //   {
 //    //$("#preview").fadeOut();
 //    $("#err").fadeOut();
 //   },
 //   success: function(data)
 //      {
 //    if(data=='invalid')
 //    {
 //     // invalid file format.
 //     $("#err").html("Invalid File !").fadeIn();
 //    }
 //    else
 //    {
 //     // view uploaded file.
 //     $("#preview").html(data).fadeIn();
 //     $("#form")[0].reset(); 
 //    }
 //      },
 //     error: function(e) 
 //      {
 //    $("#err").html(e).fadeIn();
 //      }          
 //    });
 // }));

	
</script>