<?php
session_start();
$usertype =$_SESSION['typeofuser'];
if($usertype=="doctor")
{
$d_id=$_SESSION['d_id'];
$bid=$_SESSION['bid'];
$pid=$_SESSION['pid'];
}

$conn = new mysqli("localhost","root","","user");

?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $bid=$_SESSION['bid'];
      
      $stmt=$conn->prepare("INSERT INTO diagnosis (bid,d_id,pid,diagnosis_details) values( ?, ?, ?, ?)");
      $stmt->bind_param("ssss", $bid,$d_id,$pid,$_POST['diagnosis_details']);
      $stmt->execute();
      
      $stmt->close();

      $stmt2=$conn->prepare("INSERT INTO prescripition (bid,d_id,pid,medicines) values( ?, ?, ?, ?)");
      $stmt2->bind_param("ssss", $bid,$d_id,$pid,$_POST['medicines']);
      $stmt2->execute();
      
      
if ($stmt2) {
  $stmt2->close();

      $sql1 = "DELETE FROM booking_table WHERE bid=$bid";
$result1=mysqli_query($conn,$sql1);
 $conn->close();
  



  header("Location:profile.php");
  exit();
}}
?>