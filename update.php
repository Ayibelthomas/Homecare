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
if(isset($_GET['data']))
{
$data=$_GET['data'];
$sql="SELECT * from registration WHERE id=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$username=$row['username'];
$email=$row['email'];
$gender=$row['gender'];
$usertype=$row['typeofuser'];
$password=$row['password'];


if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $usertype=$_POST['dropdown'];
    $password=$_POST['password'];
    
    $sql="UPDATE registration SET id='$data',name='$name',username='$username',email='$email',gender='$gender',typeofuser='$usertype',password='$password' WHERE id=$data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewdetails.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">
Name:<input type="text" name="name" id="name" placeholder="Name" autocomplete="off"  value="<?php echo $name;?>" required><br><br>
User name:<input type="text" name="username" id="username" placeholder="Username" autocomplete="off"  value="<?php echo $username;?>" required><br><br>
Email id:<input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" autocomplete="off"  value="<?php echo $email;?>" placeholder="email id" required><br><br>
Gender:<input type="text" name="gender" id="gender" placeholder="Gender" autocomplete="off"  value="<?php echo $gender;?>" required><br><br>


Usertype:<input type="text" name="dropdown"  placeholder="type of user" autocomplete="off"  value="<?php echo $usertype;?>" required><br><br>

Password:<input type="text" name="password" id="password" value="<?php echo $password;?>" required placeholder="password"></center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>





<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['bookdata']))
{
$data=$_GET['bookdata'];
$sql="SELECT * from booking_table WHERE bid=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$dp_id=$row['dp_id'];
$d_name=$row['d_name'];
$d_id=$row['d_id'];
$time=$row['time'];
$date=$row['date'];
$pid=$row['pid'];
$bid=$row['bid'];
$approval=$row['approval'];

if(isset($_POST['submit']))
{
$dp_id=$_POST['dp_id'];
$d_name=$_POST['d_name'];
$d_id=$_POST['d_id'];
$time=$_POST['time'];
$date=$_POST['date'];
$pid=$_POST['pid'];
$bid=$_POST['bid'];
$approval=$_POST['approval'];

    
    $sql="UPDATE booking_table SET dp_id='$dp_id',d_name='$d_name',d_id='$d_id', time='$time', date='$date',pid='$pid',bid='$bid',approval='$approval' WHERE bid=$data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewbooking.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">

Dpeartment id :<input type="text" name="dp_id" id="dp_id" placeholder="department id" autocomplete="off"  value="<?php echo $dp_id;?>" required><br><br>
Doctor Name :<input type="text" name="d_name" id="d_name" placeholder="Doctor Name" autocomplete="off"  value="<?php echo $d_name;?>" required><br><br>
Doctor id :<input type="text" name="d_id" id="d_id" placeholder="doctor id" autocomplete="off"  value="<?php echo $d_id;?>" required><br><br>
Booking time :<input type="text" name="time" id="time"  autocomplete="off"  value="<?php echo $time;?>" placeholder="time" required><br><br>
Date of booking:<input type="text" name="date" id="date" placeholder="" autocomplete="off"  value="<?php echo $date;?>" required><br><br>


Patient id:<input type="text" name="pid"  placeholder="patient id" autocomplete="off"  value="<?php echo $pid;?>" required><br><br>
Approval:<input type="text" name="approval"  placeholder="approval" autocomplete="off"  value="<?php echo $approval;?>" required><br><br>
Booking id:<input type="text" name="bid" id="bid" value="<?php echo $bid;?>" required placeholder="booking id"></center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>








<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['diagnosisdata']))
{
$data=$_GET['diagnosisdata'];
$sql="SELECT * from diagnosis WHERE dg_id=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$dg_id=$row['dg_id'];

$d_id=$row['d_id'];
$bid=$row['bid'];
$diagnosis_details=$row['diagnosis_details'];

if(isset($_POST['submit']))
{
$dg_id=$_POST['dg_id'];
$diagnosis_details=$_POST['diagnosis_details'];
$d_id=$_POST['d_id'];
$bid=$_POST['bid'];


    
    $sql="UPDATE diagnosis SET dg_id='$dg_id',diagnosis_details='$diagnosis_details',d_id='$d_id', bid='$bid' WHERE dg_id = $data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewdiagnossi.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">

Diagnosis id :<input type="text" name="dg_id" id="dg_id" placeholder="diagnosis id" autocomplete="off"  value="<?php echo $dg_id;?>" required><br><br>
Diagnosis details:<input type="text" name="diagnosis_details" id="diagnosis_details" placeholder="diagnosis details" autocomplete="off"  value="<?php echo $diagnosis_details;?>" required><br><br>
Doctor id :<input type="text" name="d_id" id="d_id" placeholder="doctor id" autocomplete="off"  value="<?php echo $d_id;?>" required><br><br>

Booking id:<input type="text" name="bid" id="bid" value="<?php echo $bid;?>" required placeholder="booking id"></center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>




<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['doctordata']))
{
$data=$_GET['doctordata'];
$sql="SELECT * from doctor WHERE d_id=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$dp_id=$row['dp_id'];

$d_id=$row['d_id'];
$d_name=$row['d_name'];
$consult_time_from=$row['consult_time_from'];
$consult_time_to=$row['consult_time_to'];
$location=$row['location'];
$phonenumber=$row['phonenumber'];
$fee=$row['fee'];
$number_of_consultation=$row['number_of_consultation'];
if(isset($_POST['submit']))
{
  $id=$_POST['id'];
  $dp_id=$_POST['dp_id'];
  
  $d_id=$_POST['d_id'];
  $d_name=$_POST['d_name'];
  $consult_time_from=$_POST['consult_time_from'];
  $consult_time_to=$_POST['consult_time_to'];
  $location=$_POST['location'];
  $phonenumber=$_POST['phonenumber'];
  $fee=$_POST['fee'];
  $number_of_consultation=$_POST['number_of_consultation'];
    
    $sql="UPDATE doctor SET  id ='$id', dp_id ='$dp_id', d_id ='$d_id', d_name ='$d_name',consult_time_from ='$consult_time_from', consult_time_to ='$consult_time_to', location ='$location', phonenumber='$phonenumber',fee='$fee',number_of_consultation='$number_of_consultation' WHERE d_id = $data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewdoctor.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">
 id :<input type="text" name="id" id="id" placeholder="id" autocomplete="off"  value="<?php echo $id;?>" required><br><br>
Dpeartment id :<input type="text" name="dp_id" id="dp_id" placeholder="department id" autocomplete="off"  value="<?php echo $dp_id;?>" required><br><br>

Doctor name:<input type="text" name="d_name" id="d_name" placeholder="doctor name" autocomplete="off"  value="<?php echo $d_name;?>" required><br><br>
Doctor id :<input type="text" name="d_id" id="d_id" placeholder="doctor id" autocomplete="off"  value="<?php echo $d_id;?>" required><br><br>

Consult time from:<input type="text" name="consult_time_from" id="consult_time_from" value="<?php echo $consult_time_from;?>" required placeholder="consult time from"><br><br>

Consult time to:<input type="text" name="consult_time_to" id="consult_time_to" value="<?php echo $consult_time_to;?>" required placeholder="consult time to"><br><br>
Location :<input type="text" name="location" id="location" value="<?php echo $location;?>" required placeholder="location"><br><br>
phonenumber:<input type="text" name="phonenumber" id="phonenumber" value="<?php echo $phonenumber;?>" required placeholder="phonenumber"><br><br>
Fee :<input type="text" name="fee" id="fee" value="<?php echo $fee;?>" required placeholder="fee"><br><br>
Number of consultation:<input type="text" name="number_of_consultation" id="number_of_consultation" value="<?php echo $number_of_consultation;?>" required placeholder="number_of_consultation"></center><br><br>
<div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>



<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['departmentdata']))
{
$data=$_GET['departmentdata'];
$sql="SELECT * from doctor_department WHERE d_id=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$dp_id=$row['dp_id'];

$d_id=$row['d_id'];
$dp_name=$row['dp_name'];
$d_name=$row['d_name'];


if(isset($_POST['submit']))
{
  $dp_id=$_POST['dp_id'];
  $d_id=$_POST['d_id'];
  $dp_name=$_POST['dp_name'];
  $d_name=$_POST['d_name'];
  ;


    
    $sql="UPDATE doctor_department SET dp_id='$dp_id',d_id='$d_id', dp_name='$dp_name', d_name ='$d_name' WHERE d_id = $data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewdepartment.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">

Depatment ID:<input type="text" name="dp_id" id="dp_id" placeholder="department id" autocomplete="off"  value="<?php echo $dp_id;?>" required><br><br>
Department Name:<input type="text" name="dp_name" id="dp_name" placeholder="department name" autocomplete="off"  value="<?php echo $dp_name;?>" required><br><br>
Doctor ID :<input type="text" name="d_id" id="d_id" placeholder="doctor id" autocomplete="off"  value="<?php echo $d_id;?>" required><br><br>
Doctor Name:<input type="text" name="d_name" id="d_name" placeholder="doctor name" autocomplete="off"  value="<?php echo $d_name;?>" required><br><br>

</center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>



<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['patientdata']))
{
$data=$_GET['patientdata'];
$sql="SELECT * from patient  WHERE pid=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$pid=$row['pid'];

$id=$row['id'];
$pname=$row['pname'];
$location=$row['location'];
$phonenumber=$row['phonenumber'];
$age=$row['age'];
$gender=$row['gender'];

if(isset($_POST['submit']))
{
  $pid=$_POST['pid'];

  $id=$_POST['id'];
  $pname=$_POST['pname'];
  $location=$_POST['location'];
$phonenumber=$_POST['phonenumber'];
$age=$_POST['age'];
$gender=$_POST['gender'];


    
    $sql="UPDATE patient SET pid='$pid',id='$id', pname='$pname',location='$location',phonenumber='$phonenumber',age='$age',gender='$gender' WHERE pid = $data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewpatient.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">

Patient id :<input type="text" name="pid" id="pid" placeholder="patient id" autocomplete="off"  value="<?php echo $pid;?>" required><br><br>
Patient name:<input type="text" name="pname" id="pname" placeholder="Patient name" autocomplete="off"  value="<?php echo $pname;?>" required><br><br>
 id :<input type="text" name="id" id="id" placeholder="id" autocomplete="off"  value="<?php echo $id;?>" required><br><br>

 

 Location :<input type="text" name="location" id="location" placeholder="location" autocomplete="off"  value="<?php echo $location;?>" required><br><br>
Phone number:<input type="text" name="phonenumber" id="phonenumber" placeholder="phonenumber" autocomplete="off"  value="<?php echo $phonenumber;?>" required><br><br>
Age :<input type="text" name="age" id="age" placeholder="age" autocomplete="off"  value="<?php echo $age;?>" required><br><br>

Gender :<input type="text" name="gender" id="gender" placeholder="gender" autocomplete="off"  value="<?php echo $gender;?>" required><br><br>

</center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>


<?php
$conn = new mysqli("localhost","root","","user");
if(isset($_GET['prescriptiondata']))
{
$data=$_GET['prescriptiondata'];
$sql="SELECT * from prescripition WHERE bid=$data";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$bid=$row['bid'];

$d_id=$row['d_id'];
$medicines=$row['medicines'];
$received=$row['received'];


if(isset($_POST['submit']))
{
  $bid=$_POST['bid'];

  $d_id=$_POST['d_id'];
  $medicines=$_POST['medicines'];
  $received=$_POST['received'];
    
    $sql="UPDATE prescripition SET bid='$bid',d_id='$d_id', medicines='$medicines',received='$received' WHERE bid = $data ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:viewprescription.php");
      exit();
    }
    else {
      die(mysqli_error($conn));
    }
}


?>
<div class="profile-container">
    <br><br>
<form method="post">

Booking id :<input type="text" name="bid" id="bid" placeholder="booking id" autocomplete="off"  value="<?php echo $bid;?>" required><br><br>
medicines name:<input type="text" name="medicines" id="medicines" placeholder="medicines name" autocomplete="off"  value="<?php echo $medicines;?>" required><br><br>
Doctor id :<input type="text" name="d_id" id="d_id" placeholder="doctor id" autocomplete="off"  value="<?php echo $d_id;?>" required><br><br>

 
received:<input type="text" name="received" id="received" placeholder="received" autocomplete="off"  value="<?php echo $received;?>" required><br><br>

</center><br><br>
 <div class="col-lg-3 col-md-4 col-6 mx-auto">
<button type="submit" name="submit">Update</button>
</form>
</div>
<?php
}

?>
