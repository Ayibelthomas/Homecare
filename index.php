<?php
// Check if the form is submitted
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    // Connect to your database (replace these with your database credentials)
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "user";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the username and password match an entry in your database table
    $sql = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $typeofuser =$row['typeofuser'];
        $_SESSION['typeofuser']= $typeofuser;
       $id=$row['id'];
       if ($typeofuser=="doctor") {
        $sql = "SELECT * FROM pending WHERE id = '$id' ";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
     
         header('Location:error.php?error=pending');
         exit();
        }
       }
        header("Location:homepage.php?username=$username");
        exit();
       
    } else {
        // If no matching row was found, redirect to the registration form
        header("Location:error.php?error=invalid");
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    
<head>
 
    <title>Login Page</title>

    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        

        <!-- CSS FILES -->        
       

        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="preloader.css">
<style>
   #myvideo{
position:fixed;
top:0;
left:0;
min-width:100%;
min-height:100%;
width:auto;
height:auto;
z-index:-1;
   }
 </style>
</head>
<body>

<div id="pre">

</div>

<div class="showcase">
            <div class="video-container">
<video src="video5.mp4" autoplay muted loop id="myvideo"></video>
            </div>

        </div>
 <div class="login-box">
                           


                                <h2 class="text-center mb-lg-3 mb-2">Login</h2>
                            
                                <form role="form" action="index.php"  method="post">
                                    
                                       <center>

                                        <div class="inputbox">
                                       
                                        <ion-icon name="person-circle-sharp"></ion-icon>
                                       <input type="text" placeholder="Username" name="username" required>
                                       
                                        </div>
                                       <div class="inputbox">
                                        
                                       <ion-icon name="lock-closed-sharp"></ion-icon>
                                         <input type="password" placeholder="Password"name="password" required>
                                       
                                       <br>
                                       
                                       </div>                      
    
                                    </center>
                                        <div class="button">
                                      <button type="submit" class="form-control" id="submit-button">Login</button>
                                     <br><br> <br><h3>If you dont have an account? </h3><a href="registration.php">Register Now</a>
                                        </div>
                                    </div>
                                </form>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    var loader = document.getElementById("pre");
    window.addEventListener("load", function(){
       // loader.style.display = "none";
       setTimeout(function(){
        document.getElementById('pre').style.display = 'none';
       
       } ,3000);
    });
</script>
   </body>
</html>