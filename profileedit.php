<?php
session_start();
$username =$_SESSION['username'];
$_SESSION['username'] = $username;

$usertype =$_SESSION['typeofuser'];
$conn = new mysqli("localhost","root","","user");



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   
    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" 
              action="edit.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Edit Profile</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>

            <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" 
                   class="form-control"
                   name="pp">

            <?php


// Query to check if the username and password match an entry in your database table
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

// Check if a row with matching username and password was found
if ($result->num_rows > 0) 
{
$row=mysqli_fetch_assoc($result);

          
                                                	$file_array = explode(', ', $row['image_path']);
                                                	?>
                                                    <div class="owl-carousel owl-theme" style="width: 100px;">
                                                	<?php
                                                	for ($j=0; $j < count($file_array); $j++) {
                                                	?>


            <img src="images/gallery/<?php echo $file_array[$j];?>"
                 class="rounded-circle"
                 style="width: 70px">
            <input type="text"
                   hidden="hidden" 
                   name="old_pp"
                   value="<?= $file_array[$j]?>" >
                                        
                                                	<?php
                                                	}
                                                	?>
                                                  
                                                    </div>
                                                   <?php

 }

?>
 </div>
                   
        
          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="profile.php" class="link-secondary">GO BACK</a>
        </form>
    </div>
    
</body>
</html>

