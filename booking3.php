<?php
session_start();
$username=$_SESSION['username'] ;
$search1= $_SESSION['id'];
$conn = new mysqli('localhost','root','','user');
$sql="Select pid from patient where id='$search1'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{

$pid=$row['pid'];
}}
?>
<?php
if(isset($_GET['doctordata']))
{
$data=$_GET['doctordata'];

if ($result) {
?>
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


 .container2 { 
  
  max-width: 500px;
  height:500px;
   margin: 0 auto; 
   padding: 50px; 
   text-align: center;
    background-color: #f5f5f5; 
    border-radius: 10px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     }        
     
     .container2  input[type="text"],
     .container2  input[type="date"],
     .container2  input[type="time"]{
                width:200px;
                padding:10px;
                font-size:16px;
                margin-bottom:10px;
                border:1px solid #ccc;
                border-radius:3px;
             
            }

    </style>
  </head>
  <body>
 <br><br>
<div class="container2">
  <?php
   $sql="Select * from doctor where d_id='$data'";
   $result=mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($result)>0)
   {
    
   
   while($row= mysqli_fetch_assoc($result))
   {
   
   $consult_time_from=$row['consult_time_from'];
   $consult_time_to=$row['consult_time_to'];
   $d_name=$row['d_name'];
   }}
  ?>
        <form action="booking.php" method="post">

                                        Available from  <?php echo $consult_time_from ?> to  <?php echo $consult_time_to ?> <br><br>
                                        Docotr Name : Dr.<?php echo $d_name?> <br><br>
                                        Time <input type="TIME" name="time" id="time" class="form-control" placeholder="" required>
                                      
                                        <br><br>
                                        
                                         Date<input type="date" name="date" id="date"  class="form-control" >
                                         <br><br>
                                         Doctor id <input type="text" name="d_id" id="d_id" class="form-control" placeholder="Doctor id"  value="<?php echo $data;?>"required>
                                      
                                        
                                                <br><br>
                                                <button type="submit" class="form-control" id="submit-button" name="submit">Book Now</button>
                            
        </form>

        <form action="" method="get">
                                <button name="goback">Home</button>
    
                            </form>


        
</div>

<?php
}
else{
    die("Connection failed: " . $conn->connect_error);
}}
if (isset($_GET['goback']))
    {
      
      header("Location:homepage.php?username=$username");
      exit();
     
    }
?>
</div>

</body>
  
</html>


