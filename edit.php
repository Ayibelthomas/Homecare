<?php
session_start();
$username =$_SESSION['username'];

$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
}
else{

   $sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

// Check if a row with matching username and password was found
if ($result->num_rows > 0) 
{
$row=mysqli_fetch_assoc($result);
$id=$row['id'];

}
  if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];
    
    if($error === 0){
       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
       $img_ex_to_lc = strtolower($img_ex);

       $allowed_exs = array('jpg', 'jpeg', 'png');
       if(in_array($img_ex_to_lc, $allowed_exs)){
          $new_img_name = uniqid( true).'.'.$img_ex_to_lc;
          $img_upload_path = 'images/gallery/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);
          $sql="UPDATE registration SET image_path='$new_img_name' WHERE id=$id ";
          $result=mysqli_query($conn,$sql);
          if($result)
          {
            header("location:profile.php");
            exit();
          }
          else {
            die(mysqli_error($conn));
          }
  }}
  }}?>



