<?php 
include('dbcon.php');
include('session.php'); 

$row=getUserById($session_id);
$image=getImageByUserId($session_id);

// $msg="";
//   // If upload button is clicked ...
//   if(isset($_POST['upload'])){
//     // Get image name 
//     $image=$_FILES['avatar']['name'];
//     // image file directory
//     $target = "Assets/img/".basename($image);
//     $request=mysqli_query($con,"INSERT INTO Images (path,user_id) values ('$image','$session_id')");
//     if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
//       $msg = "Image uploaded successfully";
//     }else{
//       $msg = "Failed to upload image";
//     }
//   }


?>

<?php include('header.php')?>

<div class="form-wrapper-home"> 
    <center><h3>Welcome:<i> <?php echo $row['username']; ?></i> </h3></center>

<!-- https://bbbootstrap.com/snippets/bootstrap-5-profile-card-animation-74461039 -->
<!-- https://freefrontend.com/bootstrap-profiles/ -->
    <div class="profile">

        <div class="image">
            <!-- <img src="https://i.imgur.com/wvxPV9S.png"/> -->
            <div id="preview">
                <?php
                if(isset($image['image'])){
                    $name_image=$image['image'];
                    echo '<img src="Assets/img/'.$name_image.'" />';
                    }
                else{
                    echo 'Please Select Image File';
                }
                ?>

                
            </div>
            
            

            <br><br>
            <!-- <form method="post" action="upload_img.php">
                <input type="file" name="avatar" id="myAvatar" class="btn1">Upload</button>
            </form> -->
            <form method="post" id="upload_img" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="avatar" id="myAvatar"/>
                <input type="submit" name="upload" value="Upload" class="btn1">
            </form>
            
        </div>

        <div class="profile_info">
            <span class="name"><?php echo $row['username']; ?>
            </span> 
            <span class="idd">
                <i style="color: white;"> (<?php echo ucfirst($row['user_type']); ?>)
                </i>
            </span>
            <br>
            <div class="email">
                <span >Email: 
                    <span class="follow"><?php echo $row['email']?>
                    </span>
                </span>
            </div>  
            
        </div>


    </div>

    <div class="edit_profile">
        <center>
        <button class="btn2">Edit Profile</button> 
        </center>
    </div>

    <hr><br>

    <center>
    <div class="text"> 
        <span>"<?php echo $row['username']; ?>" is one of the users in the Honeypot Project<br>(Web Security, Technology and honeypot) <br><br> Howest university of applied science. 
        </span> 
    </div> 
    </center>

    <div class="reminder">
        <p><a href="logout.php" class="button">Log out</a></p>
    </div>

</div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){   
    $('#upload_img').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"upload.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#preview').html(data);
            }
        })
    });
});  

</script>


<!-- notification message -->
   <!--  <div class="content">
        <?php
        if (isset($_SESSION['success'])): ?>
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['succes']); //unset() destroys the specified variable
                ?>        
            </h3>
        <?php endif ?>  
    </div> -->

    
 <!--    <div class="profile_info">
        <img src="img/user.jpg">
            <div>
                <strong><?php echo $row['username']; ?></strong>
                <small>
                    <i style="color: white;">(<?php echo ucfirst($row['user_type']); ?>)</i><br>
                </small><br>
                <strong><?php echo $row['email']?></strong>
            </div>
    </div> -->