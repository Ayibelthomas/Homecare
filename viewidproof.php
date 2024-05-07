<?php
if(isset($_GET['doctordata'])){

    $conn = new mysqli("localhost","root","","user");
    $d_id=$_GET['doctordata'];
    // Query to check if the username and password match an entry in your database table
    $sql = "SELECT * FROM pending WHERE d_id = '$d_id' ";
    $result = $conn->query($sql);
    
    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) 
    {
    $row=mysqli_fetch_assoc($result);
    
              
                                                        $file_array = explode(', ', $row['idproof']);
                                                        ?>
                                                        <div class="owl-carousel owl-theme" style="width: 1000px;">
                                                        <?php
                                                        for ($j=0; $j < count($file_array); $j++) {
                                                        ?>
    
    
                <img src="images/gallery/<?php echo $file_array[$j];?>"
                     class="rounded-circle"
                     style="width: 700px">
                <input type="text"
                       hidden="hidden" 
                       name="old_pp"
                       value="<?= $file_array[$j]?>" >
                                            
                                                        <?php
                                                        }
                                                        ?>
                                                      
                                                        </div>
                                                       <?php
    
     }
     echo'<br><br>
     <a href="pending.php"><button>Go back</button></a>';

    }

if(isset($_GET['doctorid'])){

    $conn = new mysqli("localhost","root","","user");
    $d_id=$_GET['doctorid'];
    // Query to check if the username and password match an entry in your database table
    $sql = "SELECT * FROM doctor WHERE d_id = '$d_id' ";
    $result = $conn->query($sql);
    
    // Check if a row with matching username and password was found
    if ($result->num_rows > 0) 
    {
    $row=mysqli_fetch_assoc($result);
    
              
                                                        $file_array = explode(', ', $row['idproof']);
                                                        ?>
                                                        <div class="owl-carousel owl-theme" style="width: 1000px;">
                                                        <?php
                                                        for ($j=0; $j < count($file_array); $j++) {
                                                        ?>
    
    
                <img src="images/gallery/<?php echo $file_array[$j];?>"
                     class="rounded-circle"
                     style="width: 700px">
                <input type="text"
                       hidden="hidden" 
                       name="old_pp"
                       value="<?= $file_array[$j]?>" >
                                            
                                                        <?php
                                                        }
                                                        ?>
                                                      
                                                        </div>
                                                       <?php
    
     }
     echo'<br><br>
     <a href="viewdoctor.php"><button>Go back</button></a>';

    }

?>

<style>
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