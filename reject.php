



<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['doctordata']))
{
$data=$_GET['doctordata'];
$d_id=$data;
$sql="SELECT * from pending where d_id='$d_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{
$id=$row['id'];
}}


        $sql="DELETE  FROM pending WHERE d_id=$d_id ";
        $result=mysqli_query($conn,$sql);
 
    if($result)
    {         $sql="DELETE  FROM registration WHERE id=$id ";
      $result=mysqli_query($conn,$sql);

        
      header("location:pending.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}

if(isset($_GET['bookingid']))
{
$bid=$_GET['bookingid'];
$pid=$_GET['pid'];
$sql="SELECT * from booking_pending where bid='$bid'AND pid= '$pid'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{
$dp_id=$row['dp_id'];
$time=$row['time'];
$d_name=$row['d_name'];
$pname=$row['pname'];
$d_id=$row['d_id'];
$date=$row['date'];
$pid=$row['pid'];
$approve="Rejected";


$stmt=$conn->prepare("insert into booking_reject (bid,dp_id,time,d_name,pname,d_id,date,pid,approval) values( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss",$bid,$dp_id, $time,$d_name,$pname,$d_id, $date,$pid,$approve);
$stmt->execute();

$stmt->close();
}}


        $sql="DELETE  FROM booking_pending where bid='$bid'AND pid= '$pid' ";
        $result=mysqli_query($conn,$sql);
 
    if($result)
    {       
        
      header("location:profile.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}

if(isset($_GET['bookingidcancel']))
{
$bid=$_GET['bookingidcancel'];
$pid=$_GET['pid'];
   $sql="DELETE  FROM booking_pending where bid='$bid'AND pid= '$pid' ";
        $result=mysqli_query($conn,$sql);
 
    if($result)
    {       
        
      header("location:profile.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}



?>







