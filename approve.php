<html>
    <head>
        <style>
            .profile-container { 
  max-width: relative;
  height:relative;
   margin: 0 auto; 
   padding: 20px; 
   text-align: center;
    background-color: #f5f5f5; 
    border-radius: 10px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     } 

     button { 
      padding: 10px 20px;
       background-color: green; 
       color: #fff; border: none;
        border-radius: 5px;
         cursor: pointer; 
         margin-right: 10px;
          /* Add space between buttons */
    } 
        </style>
    </head>
</html>
         











<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['doctordata']))
{
$data=$_GET['doctordata'];
$sql="SELECT * from pending WHERE d_id=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$dp_id=$row['dp_id'];
$img=$row['image_path'];
$idproof=$row['idproof'];
$d_id=$row['d_id'];
$d_name=$row['d_name'];
$consult_time_from=$row['consult_time_from'];
$consult_time_to=$row['consult_time_to'];
$location=$row['location'];
$phonenumber=$row['phonenumber'];
$fee=$row['fee'];
$number_of_consultation=$row['number_of_consultation'];

          
if($dp_id=="1")
{
    $dp_name="Cardiolagy";
}
elseif ($dp_id=="2")
{
    $dp_name="Gastroenterology";   
}
elseif ($dp_id=="3")
{
    $dp_name="Neurology";   
}
elseif ($dp_id=="4")
{
    $dp_name="Orthopedic";   
}
elseif ($dp_id=="5")
{
    $dp_name="Otolaryngology(ENT)";   
}
elseif ($dp_id=="6")
{
    $dp_name="Pulmonology";   
}

elseif ($dp_id=="7")
{
    $dp_name="Rheumatology";   
}

elseif ($dp_id=="8")
{
    $dp_name="Nephrology";   
}
$stmt=$conn->prepare("insert into doctor_department (dp_id,dp_name,d_id,d_name) values( ?, ?, ?, ?)");
$stmt->bind_param("ssss",$dp_id,$dp_name,$d_id,$d_name);
$stmt->execute();
$stmt->close();

  $stmt=$conn->prepare("insert into doctor (id,dp_id,d_id,d_name,consult_time_from,consult_time_to,location,phonenumber,fee,number_of_consultation,image_path,idproof) values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssssss",$id,$dp_id,$d_id,$d_name, $consult_time_from, $consult_time_to, $location,$phonenumber,$fee,$number_of_consultation,$img,$idproof);
  $stmt->execute();
  $stmt->close();
        $sql="DELETE  FROM pending WHERE d_id=$d_id ";
        $result=mysqli_query($conn,$sql);
 
    if($result)
    { 
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
$approve="Approved";


$stmt=$conn->prepare("insert into booking_table (bid,dp_id,time,d_name,pname,d_id,date,pid,approval) values( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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


?>



