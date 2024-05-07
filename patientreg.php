
<?php

$username = $_GET['username'];
$conn = new mysqli('localhost','root','','user');
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row=mysqli_fetch_assoc($result);
    $id =$row['id'];
    $pname=$row['name'];
    $gender=$row['gender'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$location = $_POST['location'];
$phonenumber = $_POST['phonenumber'];
$age=$_POST["age"];




if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
}else{
    
    $stmt=$conn->prepare("insert into patient (id,pname,location,phonenumber,age,gender) values( ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",$id,$pname, $location,$phonenumber,$age,$gender);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
  }

if (isset($_POST['submit']))
{

  header("Location:index.php");
}
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
<body>
<center><br><br>
<div class="form-container"> 

                       <form  method="post">
                                    
                                    
                                          
                                         <input type="text" name="location" id="location" placeholder="Location:" required><br><br>
                                         <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number:" required><br><br> 
                                         <input type="text" name="age" id="age" placeholder="age" required><br><br>
                                     <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                         <button type="submit" class="form-control" name="submit">Submit</button>
                                       
                                     </div>
                                 </div>
                             </form></center>

</div>






</body>

</html>