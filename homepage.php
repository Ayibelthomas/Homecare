
<script>
 
if (!localStorage.getItem('alertShown')) {
    alert("Welcome to our website..");
    localStorage.setItem('alrtShown','true');
}

</script>

<?php

session_start();


$username = $_GET['username'];

$conn = new mysqli("localhost","root","","user");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
        $_SESSION['id']= $id;
        $_SESSION['username']= $username;
    }
$sql = "SELECT pid FROM patient WHERE id = '$id' ";
$result = $conn->query($sql);

    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $pid=$row['pid'];
        $_SESSION['pid']= $pid;
       
        
    }
    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home Care</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">
        <link href="style3.css" rel="stylesheet">
        <style>
            
            .profile-container { 
  max-width: 1000px;
  height:400px;
   margin: 0 auto; 
   padding: 30px; 
   text-align: center;
    background-image: url('image23.jpg'); 
 
    background-repeat:no-repeat;
    background-attachment:local;
    background-size:cover;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            }
    
   
            
        </style>
        <style>
/* Style The Dropdown Button */
.dropbtn {
  background-color:lightblue;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color:gray;
}
</style>


    </head>
    
    <body id="top">
       
        <main>

            <nav class="navbar navbar-expand-lg bg-white fixed-top shadow-lg ">
                <div class="container">
                    <a class="navbar-brand mx-auto d-lg-none" href="index.html">
                        Medic Care
                        <strong class="d-block">Health Specialist</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">

                            <a class="navbar-brand d-none d-lg-block" href="index.html">
                                <div class="d-block col-lg-3 col-4 ps-5">
                                    <img src="images/gallery/homecare1.jpg" width="150" height="150" class="img-fluid galleryImage" alt="get a vaccine"
                                        title="get a vaccine for yourself">
                                        Home<span>Care</span>
                                </div>
                                
                                <strong class="d-block"></strong>
                            </a>
                            <li class="nav-item active">
                                <a class="nav-link" href="#hero"><ion-icon name="home-outline"></ion-icon>Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                           
                            <li class="nav-item">
                                <a  class="nav-link" href="#booking">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="#contact"><ion-icon name="call-outline"></ion-icon>Contact</a>
                            </li>
                           
                           
                          
                            <li class="nav-item">
                               <a  class="nav-link" href="profile.php"><ion-icon name="person-circle"></ion-icon>Profile</a>
                           
                            </li>
                            
                        </ul>
                    </div>

                </div>
            </nav>

            <section class="hero" id="hero">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slider/portrait-successful-mid-adult-doctor-with-crossed-arms.jpg" class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg" class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/doctor-s-hand-holding-stethoscope-closeup.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="heroText d-flex flex-column justify-content-center">

                                <h1 class="mt-auto mb-2">
                                    <div class="animated-info">
                                          <span class="animated-item">Better</span>
                                          <span class="animated-item">Excellent</span>
                                          <span class="animated-item">Good</span>
                                    </div> 
                                    <div class="animated-info">
                                          <span class="animated-item">Health</span>
                                          <span class="animated-item">Lives</span>
                                          <span class="animated-item">Days</span>
                                    </div>
                                </h1>

                                <p class="mb-4"><i> Healthcare is a state of complete physical , mental and social wellbeing, not merely the absence of disease or infirmity."</i> -<b> WORLD Health ORGANIZATION</b></p>  
                                                  
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="section-padding" id="about">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12">
                            <h2 class="mb-lg-3 mb-3"> Dr. Carson</h2>

                            <p><b> Healthcare website is dedicated to ensuring that the elderly ,who may find the challenging to visit the hospitals,can access expert medical care from the comfort of their homes.We simplify healthcare by offering easy appointment scheduling for doctor consultaionat your doorstep. </b></p>     
                        </div>

                        <div class="col-lg-4 col-md-5 col-12 mx-auto">
                            <div class="featured-circle bg-white  d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number"><img src="images/gallery/logo1.jpg"</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="gallery">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-6 ps-0">
                            <img src="images/gallery/medium-shot-man-getting-vaccine.jpg" class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                        </div>

                        <div class="col-lg-6 col-6 pe-0">
                            <img src="images/gallery/female-doctor-with-presenting-hand-gesture.jpg" class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                        </div>

                    </div>
                </div>
            </section>
<br><br>

            <section class="gallery">
                <div class="container">
                    <div class="row">
<p>OUR BEST DOCTORS</p>

                    <ul class="cards">
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--fence"></div>
      <div class="card__content">
        <div class="card__title">Dr.Abhishek S</div>
        <a href="#booking"><button >Book</button></a>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--record"></div>
      <div class="card__content">
        <div class="card__title">Dr.Kezia Elizabeth</div>
        <a href="#booking"><button >Book</button></a>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--river"></div>
      <div class="card__content">
        <div class="card__title">Dr.Joice Antony</div>
        <a href="#booking"><button >Book</button></a>
      </div>
    </div>
  </li>

</ul>
         
</div>   
                </div>
            </section>

            <section class="section-padding" id="booking">
            <div class="profile-container">
            <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="booking-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Booking</h2>
                            <h4>Select the department for booking</h4>
                                <form role="form" action="bookingdemo.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                    <div class="dropdown">
                                    

                                        <select class="dropbtn"  name="dropdown" required  >
                                            <option selected ><b>-- Select depatment--</option>
                                                <option value="1">Cardiolagy</option>
                                                <option value="2">Gastroenterology</option>
                                                <option value="3">Neurology</option>
                                                <option value="4">Orthopedic</option>
                                                <option value="5">Otolaryngology(ENT)</option>
                                                <option value="6">Pulmonology</option>
                                                <option value="7">Rheumatology</option>
                                                <option value="8">Nephrology</option>
                                            </select>
                                            </div>
                                        </div>

                                        </div>
                                    
                                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                            <button type="submit" class="form-control" id="submit-button" name="submit">Continue</button>
                                            
                                        </div>
                                    </div>
                                   
                               
                            </div>
                        </div>

                    </div>
                </div>
</div>
            </section>

        </main>

        <footer class="site-footer section-padding" id="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 me-auto col-5">
                        <h5 class="mb-lg-4 mb-3">Opening Hours</h5><br>
                        <h1 class="mt-auto mb-2">
                            <div class="animated-info">
                                  <span class="animated-item">24hrs</span>
                                  <span class="animated-item">24hrs</span>
                                  <span class="animated-item">24hrs</span>
                                  
                                  
                            </div> 
                          
                        </h1>

                    </div>


                    <div class="col-lg-6 col-md-6 col-6 ms-auto">
                        <h5 class="mb-lg-4 mb-3">Socials</h5>
                        <br>

                        <ul class="social-icon">
                            <li><a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="https://www.instagram.com/accounts/login/" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="https://www.youtube.com/" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-6 my-4 my-lg-3">
                        <h5 class="mb-lg-4 mb-3">Our Wesite</h5>

                        <p><a href="mailto:hello@company.co">homecare@gmail.com</a><p>

                        <p>123 Digital Art Street, San Diego, CA 92123</p>
                        <div class="heroLinks d-flex flex-wrap align-items-center">
                            <a class="custom-link me-4" href="#about" data-hover="Learn More">Contact Us</a>

                            <p class="contact-phone mb-0"><i class="bi-phone"></i> 892-107-5434</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-10 ms-auto mt-9 mt-lg-10">
                        <p class="copyright-text">Copyright © Home Care 2021 
                            <div class="col-lg-12 col-12 mt-12 mt-lg-0">
                            <img src="images/gallery/homecare1.jpg"  width="200" height="200"></div>
                    </div>

                </div>
            </section>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>




<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>





    </body>
    
</html>
