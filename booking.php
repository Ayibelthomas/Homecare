
<?php
session_start();
$username=$_SESSION['username'] ;
$search= $_SESSION['id'];
$dp_id= $_SESSION['dp_id'];
$conn = new mysqli('localhost','root','','user');
$sql="SELECT * from patient where id='$search'";
$result=mysqli_query($conn,$sql);
 $_SESSION['id']=$search;
if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{
$pname=$row['pname'];
$pid=$row['pid'];
}}
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
    $d_id=$_POST['d_id'];
   
    $sql="Select d_name from doctor where d_id='$d_id'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
     
    
    while($row= mysqli_fetch_assoc($result))
    {
    
    $d_name=$row['d_name'];
    }}
    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
  

    
    $stmt=$conn->prepare("insert into booking_pending (dp_id,time,d_name,pname,d_id,date,pid) values( ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$dp_id, $_POST["time"],$d_name,$pname,$d_id, $_POST["date"],$pid);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
   
  }



    }
    
    if (isset($_GET['goback']))
    {
     
      header("Location:homepage.php?username=$username");
      exit();
    }
 
   
?>
<html>

<head>
        <style>
            body{
                background: linear-gradient(to bottom,lightblue,white,pink);
            }
            .form-container{
                max-width:400px;
                margin:0 auto;
                padding:20px;
                border:1px solid  #ccc;
                border-radius:20px;
                background-color: #f9f9f9;
                box-shadow: 0 0 10px rbga(0, 0, 0. 0.1);
            }
            .form-container button{
                background-color: #007bff;
                color:#fff;
                padding:10px 20px;
                border: none;
                border-radius:3px;
                cursor: pointer;
                font-size:16px;

            }
            .form-container input[type="text"],
            .form-container input[type="time"]{
                width:100%;
                padding:10px;
                font-size:16px;
                margin-bottom:10px;
                border:1px solid #ccc;
                border-radius:3px;
             
            }
            .form-container select{
                width:100%;
                padding:10px;
                font-size:16px;
                background-color:#fff;
                color:#333;
                margin-bottom:10px;
                border:1px solid #ccc;
                border-radius:3px;
            }
            .form-container select::-ms-expand{
                display:none;
            }
            .form-container select:hover,
            .form-container select:focus{
                border-color:#007bff;
                box-shadow:0 0 5px rgba(0, 123, 255, 0.5);
            }
            .form-container select option :checked{
                border-color:#007bff;
                color:#fff;
            }
           select option {
               padding:10px;
               background-color: lightgray;
               color: black;

            }
            select option:hover {
              
               background-color: #007bff;
               color: #fff;
               
            }
            .form-container a {
                text-decoration:none;
                color:#007bff;
                background-color: green;
                color:#fff;
                padding:10px 20px;
                border: none;
                border-radius:3px;
                cursor: pointer;
                font-size:16px;
            }
            .form-container a:visited{
                color: white;
            }
            .form-container a :hover{
                text-decoration:underline;
            }
            .form-container a:active{
                color:#ff0000;
            }
        </style>
    </head>

<form action="" method="get">
    <br><br><br><br>
    <center>
<div class="form-container"> 
    <P>Booked successful</P>
    <button name="goback">
      Home
      </button>
    
  
</div></center>
</form>
  </body>
</html>
