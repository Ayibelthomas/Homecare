<?php
$id = $_GET['id'];
echo $id;
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>id proof</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   
    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" 
              action="idinsert.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Id proof</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>

            <div class="mb-3">
          
            <input type="text" hidden
                   class="form-control"
                   name="id" value='<?php echo$id ?>'>
            <label class="form-label">Doctor id proof</label>
            <input type="file" 
                   class="form-control"
                   name="pp">
                   

 </div>
                   
        
          
          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    
</body>
</html>

