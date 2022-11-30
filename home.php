<?php 
require ('dbcon.php');
require ('session.php'); 

$row=getUserById($session_id);
//$row=getImageByUserId($session_id);


?>

<?php include('header.php')?>
<div class="wrapper">
    <div class="header">
        <a href="challenges.php"> <p>Challenges</p></a>

        <div class="go_home"><a href="home.php">Profile</a></div>
    </div>
</div>

<div class="form-wrapper-home"> 
    <center><h3>Welcome:<i> <?php echo $row['username']; ?></i> </h3></center>

<!-- https://bbbootstrap.com/snippets/bootstrap-5-profile-card-animation-74461039 -->
<!-- https://freefrontend.com/bootstrap-profiles/ -->
    <div class="profile">

        <div class="image">
            <!-- <img src="https://i.imgur.com/wvxPV9S.png"/> -->
            <div id="preview">
                <?php
                if($row['image']!= ''){
                    $name_image=$row['image'];
                    echo '<img src="Assets/img/'.$name_image.'" />';
                    }
                else{
                    echo 'Please Select Image File';
                }
                ?>
                
            </div>
            
            

            <br><br>
           
            <form method="post" id="upload_img" action="upload2.php" enctype="multipart/form-data">
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
    $('#upload_img').submit(function (event){
        event.preventDefault();
        var form=$(this);
        var actionUrl= form.attr('action');
        $.ajax({
            url: actionUrl,
            method:"POST",
            data: form.serialize(),
            //data:new FormData(this),
            //contentType:false,
            //cache:false,
            //processData:false,
            dataType: "json",
            success:function(data){
                $('#preview').html(data);
            }
        })
    });
});  

</script>

