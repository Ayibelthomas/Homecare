<?php


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$typeofuser=$_POST["dropdown"];
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
}else{
  if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];
    
    if($error === 0){
       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
       $img_ex_to_lc = strtolower($img_ex);

       $allowed_exs = array('jpg', 'jpeg', 'png');
       if(in_array($img_ex_to_lc, $allowed_exs)){
          $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
          $img_upload_path = 'images/gallery/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);



          $sql = "SELECT * FROM registration WHERE username = '$username' ";
          $result = $conn->query($sql);
          
          // Check if a row with matching username was found
          if ($result->num_rows > 0) {
        

            
              header("Location: usernameerror.php?username=$username");
              exit();
          } else {
       
   
    $stmt=$conn->prepare("insert into registration(name,username,typeofuser,gender,email,password,image_path) values( ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$name, $username,$typeofuser, $gender, $email, $password, $new_img_name);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
  }

  }}

if ($typeofuser=="doctor")
{

  header("Location:docext.php?username=$username");
  exit();

}
elseif ($typeofuser=="admin")
{

  header("Location:index.php?username=$username");
  exit();

}
elseif($typeofuser=="user")
{

  header("Location:patientreg.php?username=$username");
  exit();

}}}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Page</title>
    
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

       

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

<style>
  body{
     
    display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      
    background-image: url('images/slider/img2.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover;
  }
  .wrapper {
    width: 420px;
    background: white;
    color: #fff;
   padding: 10px 50px;
  }
  
  .wrapper .form-control {
 width: 100%;
 height: 45px;
 background:#fff;
 border:none;
 outline:none;
 border-radius: 40px;
 font: weight 200px;
 font: size 16px;
  }
</style>



</head>
<body  >

</body>
</html>
