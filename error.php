       
<?php
$pending=$_GET['error'];
?>
<!DOCTYPE html>
 <html>
    <head>
    <title>ERROR</title>

    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        

        <link rel="stylesheet" type="text/css" href="error1.css">

    </head>
    <body>
    <div class="showcase">
                <div class="video-container">
    <video src="video.mp4" autoplay muted loop id="myvideo"></video>
                </div>
    
            </div>
     <div class="login-box">
                               
    
                                        
                                    <h2 class="text-center mb-lg-3 mb-2"><ion-icon name="alert"></ion-icon>  ERROR</h2>
                                
                                    <form role="form" action="" >
                                        <?php
                                        if ($pending=="pending") {?>

<center>
    
    <h3>The admin doesnot approve as a doctor !!<br>
 
</center>
                                        <?php
                                        }else{
                                        ?>
                                           <center>
    
                                            <h3>The username/password is wrong<br>
                                                 or 
                                                <br> This account doesn't exists...!</h3>
                                        </center>
                                            <?php } ?>
                                          
                                         <br><br> <br><h3>If you want to go back </h3><a href="index.php"> <ion-icon name="log-in-outline"></ion-icon>Login</a>
                                          
                                        </div>
                                    </form>
    </div>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
       </body>
 </html>