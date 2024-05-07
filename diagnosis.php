<?php
session_start();
$usertype =$_SESSION['typeofuser'];
if($usertype=="doctor")
{
$d_id=$_SESSION['d_id'];
}


?>
<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['bookingid']))
{
$pid=$_GET['pid'];
$bid=$_GET['bookingid'];
$_SESSION['bid']=$bid;
$_SESSION['pid']=$pid;
}


?>
<center>
    <br>  <br>  <br>  <br>


<html>
  <head>
<style>


       button { padding: 10px 20px; /* Adjust padding as needed */
         background-color: #3498db; /* Button background color */
          color: #fff; /* Text color */ border: none;
           /* Remove button border */
            border-radius: 5px;
             /* Rounded corners */ cursor: pointer; 
             /* Show pointer cursor on hover */ font-size: 16px; 
             /* Font size */ } /* Hover effect */
              button:hover { background-color: #2980b9;
                 /* Change background color on hover */ }
                  /* Active (clicked) state */
                   button:active { background-color: #1c6ca7; 
                    /* Change background color when clicked */
                   }


                   table {
        border-collapse: collapse;
        width:100%;

      }
      th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;

      }
      th {
        background-color: #f2f2f2;

      }


/* Style the profile container */
            .profile-container { 
                                 max-width: 1000px;
                                height:500px;
                                margin: 0 auto; 
                                padding: 20px; 
                                text-align: center;
                                 background-color: #f5f5f5; 
                                 border-radius: 10px;
                                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               } /* Style the buttons */ 
     
 button { 
      padding: 10px 20px;
       background-color: green; 
       color: #fff; border: none;
        border-radius: 5px;
         cursor: pointer; 
         margin-right: 10px;
          /* Add space between buttons */
    } /* Style the anchor (link) button */
   button a { 
            text-decoration:underline; 
            color: #fff;
       } 
       /* Style the heading */ 
           h1 { color: #333; } /* Center align the content */ 
           .center-content { text-align: center; } /* Style the HTML body */
            body { background-color:gray; 
              font-family: Arial, sans-serif;
               margin: 0; padding: 0;
               }

.userdisplay{
  padding:10px;
  width: 10%;
       
        font: optional;
        text-align:center;

}
</style>
    
  </head>
 
    <body>
 <div class="profile-container">
 


<br><br>
<div class="input">
  <center>
    <form action="diagnosisinsert.php" method="POST">
   
    <label for="mytextarea" >Diagonsis:</label><br>
    <textarea id="mytextarea"name="diagnosis_details" rows="4" cols="30" placeholder="Enter diagnosis details here...">
</textarea><br><br>

<label for="mytextarea" >Medicines:</label><br>
    <textarea id="textarea"name="medicines" rows="4" cols="30" placeholder="Enter Medicines  here...">
</textarea><br><br>

<button type="submit" class="form-control" id="submit-button" name="submit">Submit</button>

 


</form>
<a href="profile.php"> <button> go back</button></a>
</center>
</div>
            
  
</div>

    </body>
</html>


</center>