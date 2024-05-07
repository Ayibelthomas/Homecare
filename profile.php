<?php
session_start();
$username =$_SESSION['username'];
$_SESSION['username'] = $username;

$usertype =$_SESSION['typeofuser'];
$conn = new mysqli("localhost","root","","user");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($usertype =="user")
{
  $pid=$_SESSION['pid'];
    
}

?>
 

 <?php
if($usertype =="doctor")
{
 
    $sql = "SELECT id FROM registration WHERE username = '$username' ";
 $result = $conn->query($sql);

    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
        
    }
    $sql = "SELECT d_id FROM doctor WHERE id='$id' ";
    $result = $conn->query($sql);
   
       // Check if a row with matching username and password was found
       if ($result->num_rows > 0) {
           $row=mysqli_fetch_assoc($result);
           $d_id=$row['d_id'];
           $_SESSION['d_id']=$d_id;
       }

}

?>

<!doctype html>
<html lang="en">

 
<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>profile page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css2/bootstrap.min.css">
    <link href="fonts/circular-std" rel="stylesheet">
    <link rel="stylesheet" href="css2/style.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">

    
  <link href="style2.css" rel="stylesheet">
  <style>
    .navbar-brand {
    display: inline-block;
    margin-right: 1rem;
    line-height: inherit;
    white-space: nowrap;
    padding: 11px 20px;
    font-size: 30px;
    text-transform: uppercase;
    font-weight: 700;
    color: #3d87ff;
}
.navbar-brand:hover{
    color: #1b6c18;
    
}
.sidebar-dark.nav-left-sidebar .navbar-nav .nav-link:focus,
.sidebar-dark.nav-left-sidebar .navbar-nav .nav-link:hover {
    color: #fff;
    background-color: #41466c;
    border-radius: 2px;
}

.sidebar-dark.nav-left-sidebar .navbar-nav .nav-link:focus,
.sidebar-dark.nav-left-sidebar .navbar-nav .nav-link.active {
    background-color: #41466c;
    color: #fff;
    border-radius: 2px;
}
table {
  border-collapse: collapse;
  width: 100%;

}
th, td {
  border: 1px solid #000000;
  padding: 8px;
  text-align: left;
  background-color: #fff;
  font-weight: 700;
  color: black;
}
th {
  background-color:#04AA6D;

}
.userdisplay{
  font-weight: 700;
  color: black;
}
.thhead{
  font-weight: 700;
  color: black;
}
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
            body { background-color:rgb(78, 61, 112); 
              font-family: Arial, sans-serif;
               margin: 0; padding: 0;
               }

               .profile-container { 
    max-width: 100%;
    height: 100%;
     margin: 0 auto; 
     padding: 20px; 
     text-align: center;
     background-color: #fff5;
    
     backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;

    overflow: hidden;
       } /* Style the buttons */ 
    

  </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <p class="navbar-brand" >HOME CARE</p>
                
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-link active">
                                Menu
                            </li>
                            <?php
                            if($usertype=="admin")
                            {
                                ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="viewdetails.php">View Registration Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="viewbooking.php">View Booking Table</a>
                            </li>
                          
                            <li class="nav-item">
                                <a class="nav-link" href="viewdoctor.php">View Doctor Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="viewdepartment.php">View departmentTable</a>
                            </li>
                         <?php
                         }
                         ?>
                         <li class="nav-item">

                         <?php

if ($usertype=="admin") {
  ?><br><br>
  <button onclick=" myFunction()" >Logout</button><br><br>
  <button onclick="notification()">Notifications</button>
  <?Php if ($usertype=="admin") {
     # echo'<button><a href="index.php">Logout</a></button>';
      echo'<a href="homepage.php?username='.$_SESSION['username'].'"><button>Home</button></a>';

    }

?>

<script>  
function myFunction() {  
    var result;  
    var r = confirm("Do you want to exit!");  
    if (r == true) {  

         window.location.href = "index.php";
    } 
}  
</script> 







<script>
  

  function notification(){
    window.location.href = "pending.php";
  }
 
</script>
  <?php
}
?>

<?php

if ($usertype=="user") {
  ?><br><br>
<a href="viewprescription.php"><button>Priscription</button></a><br><br>
<a href="viewdiagnossi.php"><button>Diagnosis</button></a><br><br>
<button onclick="myFunction() " >Logout</button><br><br>
  <?Php if ($usertype=="user") {
     # echo'<button><a href="index.php">Logout</a></button>';
      echo'<a href="homepage.php?username='.$_SESSION['username'].'"><button>Home</button></a>';

    }

?>
   <form  method="POST"><?php
    if($usertype=="user"){
        echo'<br><br>';
echo'<button name="submit">appointment</button>';
?></form><?php
}

?>
<script>  
function myFunction() {  
    var result;  
    var r = confirm("Do you want to exit!");  
    if (r == true) {  
      window.location.href = "index.php";
    } 
}  
</script> 

  <?php
}
?>

<?php

if ($usertype=="doctor") {
  ?><br><br>
  <button onclick="myFunction()" >Logout</button><br><br>
  <?Php if ($usertype=="doctor") {
     # echo'<button><a href="index.php">Logout</a></button>';
      echo'<a href="homepage.php?username='.$_SESSION['username'].'"><button>Home</button></a>';

    }
    ?>    <form  method="POST"><?php
    if($usertype=="doctor"){
        echo'<br><br>';
echo'<button name="submit">appointment</button>';
?></form><?php
}

?>
<script>  
function myFunction() {  
    var result;  
    var r = confirm("Do you want to exit!");  
    if (r == true) {  
      window.location.href = "index.php";
    } 
}  
</script> 
  <?php
}
?>
                         </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
               
           




            <div class="profile-container">



<?php
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  
$row=mysqli_fetch_assoc($result);

 $name=$row['name'];
   
  
  }


 
?>
 <div  > <?php


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
                                                    <div class="item"> 
                                                	<img src="images/gallery/<?php echo $file_array[$j];?>" height="150px" width="150px">
                                                    </div>
                                                	<?php
                                                	}
                                                	?>
                                                  
                                                    </div>
                                                   <?php

 }

?></div>
<div class="userdisplay">
<?php
if($usertype=="doctor") 
{echo"Name : Dr. $name <br>";
 echo"Usertype : $usertype<br>";
 echo"Doctor id : $d_id";
}
if($usertype=="user") 
{echo"Name : $name <br>";
 echo"Usertype : $usertype<br>";
 echo"Patient id : $pid";
}
if($usertype=="admin") 
{echo"Name : $name <br>";
 echo"Usertype : $usertype<br>";
 
}
echo'<br>';
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
  $row=mysqli_fetch_assoc($result);
  $id=$row['id'];
}
echo'<a href="profileedit.php?id='.$id.'"><button> Edit Proffile</button></a>';
?>

</div>
<div class="thhead">
<table border="1" cellpadding="10" cellspacing="0">
<?php


// Query to check if the username and password match an entry in your database table
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

// Check if a row with matching username and password was found
if ($result->num_rows > 0) 
{
  echo"<b>USER DETAILS</b>";
    echo'<thead> 
   <tr>
   <th>id</th>
   <th>name</th>
   <th>username</th>
   <th>type of user</th>
   <th>email</th>
   <th>gender</th>
   <th>password</th>
   </thead>';
$row=mysqli_fetch_assoc($result);
echo'<tbody>
   <tr>
   <td>'.$row['id'].'</td>
   <td>'.$row['name'].'</td>
   <td>'.$row['username'].'</td>
   <td>'.$row['typeofuser'].'</td>
   <td>'.$row['email'].'</td>
   <td>'.$row['gender'].'</td>
   <td>'.$row['password'].'</td>
   </tr>
   </tbody>';
  
  }
else
 {
  echo'<h2>Data does not exist in the table</h2>';
 }
 if($usertype =="user")
{
  $h= $pid;
    
}
 
?>







<table border="1" cellpadding="5" cellspacing="5">
</div>
<?php
if (isset($_POST['submit']))
{
  if($usertype =="user"){
    $search=$h;
    $sql="Select * from booking_table where pid='$search'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
      echo"<br>";
      echo"<b> APPROVED APPOINMENTS</b>";
    echo'<thead> 
     <tr>
     <th>did</th>
     <th>doctor name</th>
     <th>patient name</th>
     <th>time</th>
     <th>date</th>
     <th>pid</th>
     <th>bid</th>
     <th>approval</th>
     
     </thead>
     ';
  
  while($row= mysqli_fetch_assoc($result))
  {
   
    echo'<tbody>
     <tr>
     <td>'.$row['dp_id'].'</td>
     <td>'.$row['d_name'].'</td>
     <td>'.$row['pname'].'</td>
     <td>'.$row['time'].'</td>
     <td>'.$row['date'].'</td>
     <td>'.$row['pid'].'</td>
     <td>'.$row['bid'].'</td>
     <td>'.$row['approval'].'</td>
   
     </tr>
     </tbody>';
  }
  
    
    }
  else
   {
    echo'<br>';
    echo'<h2>NO APPROVED APPOINTMENTS </h2>';
   }
?></table>
<table border="1" cellpadding="5" cellspacing="5">
<?php
   $sql="Select * from booking_pending where pid='$search'";
   $result=mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($result)>0)
   {
     
     echo"<b>PENDING APPOINMENTS</b>";
   echo'<thead> 
    <tr>
    <th>dp_id</th>
    <th>doctor name</th>
    <th>patient name</th>
    <th>d_id</th>
    <th>time</th>
    <th>date</th>
    <th>pid</th>
    <th>bid</th>
    <th>approval</th>
    <th>Action</th>
    
    
    </thead>
    ';
 
 while($row= mysqli_fetch_assoc($result))
 {
 $bid=$row['bid'];
 $pid=$row['pid'];
   echo'<tbody>
    <tr>
    <td>'.$row['dp_id'].'</td>
    <td>'.$row['d_name'].'</td>
    <td>'.$row['pname'].'</td>
    <td>'.$row['d_id'].'</td>
    <td>'.$row['time'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['pid'].'</td>
    <td>'.$bid.'</td>
    <td>'.$row['approval'].'</td>
    <td>
    <a href="reject.php?bookingidcancel='.$bid.'&pid='.$pid.'">  <button>Cancel</button></a>
       </td>
    </tr>
    </tbody>
   ';
 }
 ?>
 <br><br>
 
   <?php
   }
 else
  { echo"<br>";
   echo'<h2>NO PENDING APPOINTMENTS </h2>';
  }
  ?></table>
  <table border="1" cellpadding="5" cellspacing="5">
  <?php
  
   
   $sql="Select * from booking_reject where pid='$search'";
   $result=mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($result)>0)
   {
     echo"<br>";
     echo"<b> REJECTED APPOINMENTS</b>";
   echo'<thead> 
    <tr>
    <th>dp_id</th>
    <th>doctor name</th>
    <th>patient name</th>
    <th>d_id</th>
    <th>time</th>
    <th>date</th>
    <th>pid</th>
    <th>bid</th>
    <th>approval</th>
    
    </thead>
    ';
 
 while($row= mysqli_fetch_assoc($result))
 {
 $bid=$row['bid'];
 $pid=$row['pid'];
   echo'<tbody>
    <tr>
    <td>'.$row['dp_id'].'</td>
    <td>'.$row['d_name'].'</td>
    <td>'.$row['pname'].'</td>
    <td>'.$row['d_id'].'</td>
    <td>'.$row['time'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['pid'].'</td>
    <td>'.$bid.'</td>
    <td>'.$row['approval'].'</td>
   
    </tr>
    </tbody>
   ';
 }
 ?>
 <br><br>
 
   <?php
   }
 else
  { echo"<br>";
   echo'<h2>NO REJECTED APPOINTMENTS </h2>';
  }
 
   
  }
  ?></table>
<table border="1" cellpadding="5" cellspacing="5">
<?php

  if($usertype =="doctor"){
    $sql="Select * from booking_table where d_id='$d_id'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
      echo"<br>";
      echo"<b> APPROVED APPOINMENTS</b>";
    echo'<thead> 
     <tr>
     <th>did</th>
     <th>doctor name</th>
     <th>patient name</th>
     <th>time</th>
     <th>date</th>
     <th>pid</th>
     <th>bid</th>
     <th>approval</th>
     <th>visited</th>
     </thead>
     ';
  
  while($row= mysqli_fetch_assoc($result))
  {
    $pid=$row['pid'];
    $bid=$row['bid'];
    echo'<tbody>
     <tr>
     <td>'.$row['dp_id'].'</td>
     <td>'.$row['d_name'].'</td>
     <td>'.$row['pname'].'</td>
     <td>'.$row['time'].'</td>
     <td>'.$row['date'].'</td>
     <td>'.$row['pid'].'</td>
     <td>'.$row['bid'].'</td>
     <td>'.$row['approval'].'</td>
     <td>
     <a href="diagnosis.php?bookingid='.$bid.'&pid='.$pid.'"><button>Diagnosis</button></a>
        </td>
     </tr>
     </tbody>';
  }
  
    
    }
  else
   {
    echo'<br>';
    echo'<h2>NO APPROVED APPOINTMENTS </h2>';
   }
   
    
   ?></table>
   <table border="1" cellpadding="5" cellspacing="5">
   <?php
    $sql="Select * from booking_pending where d_id='$d_id'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
      echo"<br>";
      echo"<b> PENDING APPOINMENTS</b>";
    echo'<thead> 
     <tr>
     <th>dp_id</th>
     <th>doctor name</th>
     <th>patient name</th>
     <th>d_id</th>
     <th>time</th>
     <th>date</th>
     <th>pid</th>
     <th>bid</th>
     <th>approval</th>
     <th>Acccept</th>
     <th>Reject</th>
    
     </thead>
     ';
  
  while($row= mysqli_fetch_assoc($result))
  {
$bid=$row['bid'];
$pid=$row['pid'];
    echo'<tbody>
     <tr>
     <td>'.$row['dp_id'].'</td>
     <td>'.$row['d_name'].'</td>
     <td>'.$row['pname'].'</td>
     <td>'.$row['d_id'].'</td>
     <td>'.$row['time'].'</td>
     <td>'.$row['date'].'</td>
     <td>'.$row['pid'].'</td>
     <td>'.$bid.'</td>
     <td>'.$row['approval'].'</td>
     <td>
<a href="approve.php?bookingid='.$bid.'&pid='.$pid.'">  <button>Accept</button></a>
   </td>
   <td>
<a href="reject.php?bookingid='.$bid.'&pid='.$pid.'">  <button>Reject</button></a>
   </td>
     </tr>
     </tbody>
    ';
  }
  ?>
  <br><br>
 
    <?php
    }
  else
   { echo'<br>';
    echo'<h2>NO PENDING APPOINTMENTS </h2>';
   }
   ?></table>
   <table border="1" cellpadding="5" cellspacing="5">
   <?php
   

  
   $sql="Select * from booking_reject where d_id='$d_id'";
   $result=mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($result)>0)
   {
     echo"<br>";
     echo"<b> REJECTED APPOINMENTS</b>";
   echo'<thead> 
    <tr>
    <th>dp_id</th>
    <th>doctor name</th>
    <th>patient name</th>
    <th>d_id</th>
    <th>time</th>
    <th>date</th>
    <th>pid</th>
    <th>bid</th>
    <th>approval</th>
    
    </thead>
    ';
 
 while($row= mysqli_fetch_assoc($result))
 {
 $bid=$row['bid'];
 $pid=$row['pid'];
   echo'<tbody>
    <tr>
    <td>'.$row['dp_id'].'</td>
    <td>'.$row['d_name'].'</td>
    <td>'.$row['pname'].'</td>
    <td>'.$row['d_id'].'</td>
    <td>'.$row['time'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['pid'].'</td>
    <td>'.$bid.'</td>
    <td>'.$row['approval'].'</td>
   
    </tr>
    </tbody>
   ';
 }
 ?>
 <br><br>
 
   <?php
   }
 else
  { echo"<br>";
   echo'<h2>NO REJECTED APPOINTMENTS </h2>';
  }
 
  }
 
}

?>


</table>


<br><br>




</div>


    
    </body>
</html>





<?php
// Close the database connection
$conn->close()
?>







        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
</body>
 
</html>
