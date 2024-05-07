<?php
$con=mysqli_connect('localhost','root','','user');
if(!$con)
{
die(mysql_error("error"+$con));
}

?>

<html>
<head><title>search</title>



<link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">



</head>
<body>
<form method="POST">
  <center>
  <br>   <br> <br>
<input type="text" placeholder="search here" name="search">
<button name="submit">search</button>
<br><br>
</center>
</form>

<table border="1" cellpadding="5" cellspacing="5">
<?php
if (isset($_POST['submit']))
{
  $search=$_POST['search'];
  $sql="Select * from doctor where location='$search' or d_name='$search'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
  echo'<thead> 
   <tr>
   <th>u_id</th>
   <th>d_id</th>
   <th>dp_id</th>
   <th>dg_id</th>
   <th>d_name</th>
   <th>consultation_time</th>
   <th>location</th>
   <th>phonenumber</th>
   <th>fee</th>
   <th>number_of_consultation</th>
  
   </thead>
   ';
$row=mysqli_fetch_assoc($result);
echo'<tbody>
   <tr>
   <td>'.$row['u_id'].'</td>
   <td>'.$row['d_id'].'</td>
   <td>'.$row['dp_id'].'</td>
   <td>'.$row['dg_id'].'</td>
   <td>'.$row['d_name'].'</td>
   <td>'.$row['consultation_time'].'</td>
   <td>'.$row['location'].'</td>
   <td>'.$row['phonenumber'].'</td>
   <td>'.$row['fee'].'</td>
   <td>'.$row['numbsr_of_consultation'].'</td>
   </tr>
   </tbody>';
  }
else
 {
  echo'<h2>Data does not exist in the table</h2>';
 }
}
?>
</table>





</body>