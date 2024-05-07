
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert | Export html Table to CSV & EXCEL File</title>
    <link rel="stylesheet" type="text/css" href="css/tablecss.css">
    <style>
      body {
    min-height: 100vh;
    background: url(images/html_table.jpg) center / cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.export__file .export__file-btn {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background: #fff6 url(images/export.png) center / 80% no-repeat;
    border-radius: 50%;
    transition: .2s ease-in-out;
}

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
    </style>
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Registration Table</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
                
            </div>
            <button onclick="navigate()" >GO BACK</button>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file" onclick=" printPage()">
               
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                    <th> Image </th>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Name  <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Username <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Type of user<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Gender </th>
                        <th> Password </th>
                        <th>Update</th>
                        <th>Delete </th>
                        
                    </tr>
                </thead>
                <tbody>


                    <?php
                      $conn = new mysqli("localhost","root","","user");
                   

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    else {
                       
                            $sql = "SELECT * FROM registration ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) 
                            {
                              
                               while($row= mysqli_fetch_assoc($result))
                               {
                                $username=$row['username'];
                            echo'<tbody>
                               <tr>
                               <td>';
                               $sql2 = "SELECT * FROM registration WHERE username = '$username' ";
$result2 = $conn->query($sql2);

// Check if a row with matching username and password was found
if ($result2->num_rows > 0) 
{
$row=mysqli_fetch_assoc($result2);

                               $file_array = explode(', ', $row['image_path']);
                               ?>
                               <div class="owl-carousel owl-theme" style="width: 100px;">
                               <?php
                               for ($j=0; $j < count($file_array); $j++) {
                               ?>


<img src="images/gallery/<?php echo $file_array[$j];?>">

                   
                               <?php
                               }}?><?php
                               echo'</td>
                             <td>'.$row['id'].'</td>
                               <td>'.$row['name'].'</td>
                               <td>'.$row['username'].'</td>
                               <td>'.$row['typeofuser'].'</td>
                               <td>'.$row['email'].'</td>
                               <td>'.$row['gender'].'</td>
                               <td>'.$row['password'].'</td>
                               <td>
                               <a href="update.php?data='.$row['id'].'"><button>Update</button></a>
                                </td>
                               
                               <td>
                               <a href="delete.php?data='.$row['id'].'&typeofuser='.$row['typeofuser'].'"><button>Delete</button>
                                </td>
                              
                                
                                
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

                </tbody>
                
            </table>
        </section>
        
    </main>
    
 
    
 

    <script src="js/script.js">

      
    </script>

</body>

</html>


  


</div>
</section>
<script>
    function printPage(){
        window.print();
    }
  function navigate(){
    window.location.href = "profile.php";
  }
</script>
    

    </body>
</html>
