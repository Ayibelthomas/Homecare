
<?php
session_start();
$username = $_GET['username'];
$conn = new mysqli('localhost','root','','user');
$sql = "SELECT * FROM registration WHERE username = '$username' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row=mysqli_fetch_assoc($result);
    $id =$row['id'];
    $d_name=$row['name'];
    $img=$row['image_path'];
}


if (isset($_POST['submit']))
{

    $consult_time_from = $_POST['consult_time_from'];
    $consult_time_to = $_POST['consult_time_to'];
    $location = $_POST['location'];
    $phonenumber = $_POST['phonenumber'];
    $fee=$_POST["fee"];
    $number_of_consultation = $_POST['number_of_consultation'];
    $dp_id=$_POST["dropdown"];
    
    if($conn->connect_error){
        die('connection faild :'.$conn->connect_error);
    }else{
        
        $stmt=$conn->prepare("insert into pending (id,dp_id,d_name,consult_time_from,consult_time_to,location,phonenumber,fee,number_of_consultation,image_path) values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss",$id,$dp_id,$d_name, $consult_time_from, $consult_time_to, $location,$phonenumber,$fee,$number_of_consultation,$img,);
        $stmt->execute();
        
        $stmt->close();
        header("Location:idproof.php?id=$id"); 
      }
    
}


?>




<html>
    <head>
        <style>
            body{
                background: linear-gradient(to bottom,lightblue,lightblue);
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
            .form-container input[type="time"],
            .form-container input[type="file"]{
                width:100%;
                padding:10px;
                font-size:16px;
                margin-bottom:10px;
                border:1px solid #ccc;
                border-radius:3px;
             
            }
            .form-container select{
                width:100%;
                padding:10px;
                font-size:16px;
                background-color:#fff;
                color:#333;
                margin-bottom:10px;
                border:1px solid #ccc;
                border-radius:3px;
            }
            .form-container select::-ms-expand{
                display:none;
            }
            .form-container select:hover,
            .form-container select:focus{
                border-color:#007bff;
                box-shadow:0 0 5px rgba(0, 123, 255, 0.5);
            }
            .form-container select option :checked{
                border-color:#007bff;
                color:#fff;
            }
           select option {
               padding:10px;
               background-color: lightgray;
               color: black;

            }
            select option:hover {
              
               background-color: #007bff;
               color: #fff;
               
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
                                    
                                    
                                    <label for="consult_time_from">Consultation Time from:</label>
                                         <input type="time" name="consult_time_from" id="consult_time_from" placeholder=""  required><br><br>
                                    <label for="consult_time_to">Consultation Time To:</label>
                                         <input type="time" name="consult_time_to" id="consult_time_to" placeholder="Consultation Time To:"  required><br><br>
                                         <input type="text" name="location" id="location" placeholder="Location:" required><br><br>
                                         <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number:" required><br><br> 
                                         <input type="text" name="fee" id="fee" placeholder="Fee:" required><br><br>
                                         <input type="text" name="number_of_consultation" id="number_of_consultation" placeholder="Number of Consultation:" required><br><br>                                    
                                         <div class="col-lg-6 col-12">
                                           
                                           <select   name="dropdown" required  >
                                               <option selected ><b> Select depatment</option>
                                                   <option value="1">Cardiolagy</option>
                                                   <option value="2">Gastroenterology</option>
                                                   <option value="3">Neurology</option>
                                                   <option value="4">Orthopedic</option>
                                                   <option value="5">Otolaryngology(ENT)</option>
                                                   <option value="6">Pulmonology</option>
                                                   <option value="7">Rheumatology</option>
                                                   <option value="8">Nephrology</option>
                                               </select><br>
                                              
                                               <label for="consult_time_from">doctor id proof</label>
                                               <input type="file" class="form-control" name="pp">
                                        
                                           </div><br>
                                           
                                         
                                     <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                         <button type="submit" class="form-control" name="submit" value="upload">Submit</button>
                                        
                                     </div>
                                 </div>
                             </form></center>

</div>






</body>

</html>