

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
            <h1>PENDING TABLE</h1>
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
                    <th>id</th>
           <th>doctor id</th>
           <th>department id</th>
           <th>doctor name</th>
           <th>consultation time from </th>
           <th>consultation time to</th>
           <th>location</th>
           <th>phone number</th>
           <th>fee</th>
           <th>number of consultation</th>
           <th>idproof</th>
           <th>Aprove Action</th>
           <th>Reject Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                      $conn = new mysqli("localhost","root","","user");
                   

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    else {
                       
                      $sql = "SELECT * FROM pending ";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) 
                            {
                              
                               while($row= mysqli_fetch_assoc($result))
                               {
                                echo'<tbody>
                                <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['d_id'].'</td>
                                <td>'.$row['dp_id'].'</td>
                                <td>'.$row['d_name'].'</td>
                                <td>'.$row['consult_time_from'].'</td>
                                <td>'.$row['consult_time_to'].'</td>
                                <td>'.$row['location'].'</td>
                                <td>'.$row['phonenumber'].'</td>
                                <td>'.$row['fee'].'</td>
                                <td>'.$row['number_of_consultation'].'</td>
                                <td>
                                <a href="viewidproof.php?doctordata='.$row['d_id'].'"><button>View idproof</button></a>
                                 </td>
                                <td>
                                <a href="approve.php?doctordata='.$row['d_id'].'"><button>Approve</button></a>
                                 </td>
                                 <td>
                               <a href="reject.php?doctordata='.$row['d_id'].'"><button>Reject</button></a>
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
