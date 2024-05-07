<html>
    <head>
   <style>




table {
  border-collapse: collapse;
  width:100%;

}
th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;

}
th {
  background-color: #f2f2f2;

}
 button { padding: 10px 20px; /* Adjust padding as needed */
   background-color: #3498db; /* Button background color */
    color: #fff; /* Text color */ border: none;
     /* Remove button border */
      border-radius: 5px;
       /* Rounded corners */ cursor: pointer; 
       /* Show pointer cursor on hover */ font-size: 16px; 
       /* Font size */ } /* Hover effect */
        button:hover { background-color: #2980b9;
           /* Change background color on hover */ }
            /* Active (clicked) state */
             button:active { background-color: #1c6ca7; 
              /* Change background color when clicked */
             }





/* Style the profile container */
.profile-container { 
max-width: 1000px;
height:relative;
margin: 0 auto; 
padding: 20px; 
text-align: center;
background-color: #f5f5f5; 
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
} /* Style the buttons */ 

button { 
padding: 10px 20px;
 background-color: green; 
 color: #fff; border: none;
  border-radius: 5px;
   cursor: pointer; 
   margin-right: 10px;
    /* Add space between buttons */
} /* Style the anchor (link) button */
button a { 
      text-decoration:underline; 
      color: #fff;
 } 
 /* Style the heading */ 
     h1 { color: #333; } /* Center align the content */ 
     .center-content { text-align: center; } /* Style the HTML body */
      body { background-color:gray; 
        font-family: Arial, sans-serif;
         margin: 0; padding: 0;
         }

.profile-photo { 

  width: 150px;
 /* Adjust the width and height as needed */
  height: 150px; border-radius: 50%; 
  /* Makes the image round */ 
  overflow: hidden;
   /* Hide any overflowing parts of the image */
    } 
    /* Style the image itself */
.profile-photo img{
 width: 100%;
  height: 100%;
   object-fit: cover;
    /* Maintain aspect ratio and cover the container */
     } 
.userdisplay{
padding:20px;
width: 25%;
 
  font: optional;
  text-align:left;

}
</style>
    </head>
    <body>
    <br> <br>
    <div class="profile-container">
    <table border="1" cellpadding="5" cellspacing="5">
   <?php
    session_start(); 
      $pid =$_SESSION['pid'];
   $conn = new mysqli("localhost","root","","user");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
   
        $sql = "SELECT * FROM diagnosis WHERE pid=$pid";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {
          echo"<b>DIAGNOSIS TABLE </b>";
            echo'<thead> 
           <tr>
           <th>diagnosis id</th>
           <th>booking id</th>
           <th>doctor id</th>
           <th>Patient id</th>
           <th>diagnosis details</th>
         
           </thead>';
           while($row= mysqli_fetch_assoc($result))
           {
        echo'<tbody>
           <tr>
           <td>'.$row['dg_id'].'</td>
           <td>'.$row['bid'].'</td>
           <td>'.$row['d_id'].'</td>
           <td>'.$row['pid'].'</td>
           <td>'.$row['diagnosis_details'].'</td>
           
           
           </tr>
           </tbody>';
           }
          }
        else
         {
          echo'<td colspan="10" style="text-align: center;"><b>Data does not exist in the table</b></td>';
         }
    

}




?>



</table>
<button onclick="navigate()" >GO BACK</button>



<script>
  function navigate(){
    window.location.href = "profile.php";
  }
</script>

</div>

    

    </body>
</html>