<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['data']))
{
$typeofuser=$_GET['typeofuser'];
$data=$_GET['data'];
if ($typeofuser=='doctor') {
    $sql = "SELECT * FROM doctor WHERE id=$data ";
    $result=mysqli_query($conn,$sql);
    
    if ($result->num_rows > 0) 
    {
     $row= mysqli_fetch_assoc($result);
      $d_id=$row['d_id'];
       
      }
          
    $sql = "DELETE FROM doctor_department WHERE d_id=$d_id";
    $result=mysqli_query($conn,$sql);
    
}
$sql = "DELETE FROM registration WHERE id=$data";
$result=mysqli_query($conn,$sql);

if ($result) {

header('location:viewdetails.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}


if(isset($_GET['bookdata']))
{
$data=$_GET['bookdata'];
$sql = "DELETE FROM booking_table WHERE bid=$data";
$result=mysqli_query($conn,$sql);

if ($result) {
header('location:viewbooking.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}

if(isset($_GET['diagnosisdata']))
{
$data=$_GET['diagnosisdata'];
$sql = "DELETE FROM diagnosis WHERE dg_id=$data";
$result=mysqli_query($conn,$sql);

if ($result) {
header('location:viewdiagnossi.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}


if(isset($_GET['doctordata']))
{
$data=$_GET['doctordata'];

$sql="SELECT * from doctor where d_id='$data'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{

$id=$row['id'];
}}
$sql = "DELETE FROM doctor WHERE id=$id";
$result=mysqli_query($conn,$sql);
$sql1 = "DELETE FROM doctor_department WHERE d_id=$data";
$result1=mysqli_query($conn,$sql1);
$sql2 = "DELETE FROM registration WHERE id=$id";
$result2=mysqli_query($conn,$sql2);
if ($result2) 
{ 
header('location:viewdoctor.php');
}
else
{
    die("Connection failed: " . $conn->connect_error);
}}



if(isset($_GET['departmentdata']))
{
$data=$_GET['departmentdata'];
$sql = "DELETE FROM doctor_department WHERE d_id=$data";
$result=mysqli_query($conn,$sql);

if ($result) {
header('location:viewdepartment.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}

if(isset($_GET['patientdata']))
{
$data=$_GET['patientdata'];

$sql = "DELETE FROM patient WHERE pid=$data";
$result=mysqli_query($conn,$sql);

if ($result) {
header('location:viewpatient.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}


if(isset($_GET['prescriptiondata']))
{
$data=$_GET['prescriptiondata'];
$sql = "DELETE FROM prescripition WHERE bid=$data";
$result=mysqli_query($conn,$sql);

if ($result) {
header('location:viewprescription.php');
}
else{
    die("Connection failed: " . $conn->connect_error);
}}
?>