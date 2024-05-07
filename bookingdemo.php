
<?php
session_start();
$username=$_SESSION['username'] ;
$search1= $_SESSION['id'];
$conn = new mysqli('localhost','root','','user');
$sql="Select pid from patient where id='$search1'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
 

while($row= mysqli_fetch_assoc($result))
{

$pid=$row['pid'];
}}
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOMECARE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <style>
        			   button { 
      padding: 10px 20px;
       background-color: green; 
       color: #fff; border: none;
        border-radius: 5px;
         cursor: pointer; 
         margin-right: 10px;
          /* Add space between buttons */
    } 
    .product-img{ 
        text-align: center;
         padding: 0px 0px 0px 0px; 
         }
    .img-fluid{
        width:100%;
        height: 250px;
        overflow: hidden;
 display: flex;
 justify-content: center;
 align-items:center;
    }

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
                <a class="navbar-brand" href="#">HOMECARE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <form action="" method="get">
                                <button name="goback">Home</button>
    
                            </form>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
            <div class="container-fluid dashboard-content">    
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> AVAILABLE DOCTORS</h2>
                           
                        </div>
                    </div>
                </div>

                <div class="row mx-5">

                <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$dp_id = $_POST['dropdown'];

$_SESSION['dp_id']= $dp_id;
$search = $dp_id;

  
  $sql="Select * from doctor where dp_id= $search";
  $result=mysqli_query($conn,$sql);
}
  if(mysqli_num_rows($result)>0)
  {


while($row= mysqli_fetch_assoc($result))
{
  
 ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="product-thumbnail rounded">
                            <div class="product-img-head">
                                <div class="product-img">
                                   
                                <?php
                $file_array = explode(', ', $row['image_path']);
                ?>
                  
                <?php
                for ($j=0; $j < count($file_array); $j++) {
                ?>
                <img src="images/gallery/<?php echo $file_array[$j];?>" class="img-fluid" >

                <?php
                }
                ?>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title"><?php  echo$row['d_name'];?></h3>
                                    
                                </div>
                                <div class="product_btn">
                                <?php echo' <a href="booking3.php?doctordata='.$row['d_id'].'" class="btn btn-rounded btn-dark">BOOK</a>'?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                

            </div>
            <?php
  

  }


  
else
 {
  echo'<h2>Data does not exist in the table</h2>';
 }

 if (isset($_GET['goback']))
    {
      
      header("Location:homepage.php?username=$username");
      exit();
     
    }


?>
           
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        <!-- </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    
</body>
 
</html>