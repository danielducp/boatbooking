<!DOCTYPE html>
<html lang="en">
<head>
  <title>Peterborough Sailability</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/stylesheet.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 <div id="page-container">

<nav class="navbar navbar-expand-md navbar-custom">
<a class="navbar-brand" href="#">
<img src="../pictures/Sailability.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Peterborough Sailability
  </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../boats/newbooking.php">Booking</a>
      </li>
      <li class="nav-item">
       
      <?php session_start();
      if( $_SESSION['user_logged_in']): ?>
        <a class="nav-link" href="../login/logout.php">Logout</a>
<?php else: ?>
  <a class="nav-link" href="login/login.php">Login</a>
<?php endif; ?>
      </li>    
    </ul>
  </div> 
</nav>


      <?php
      
        require '../config.php';

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM User');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
         
                  <br>
                  <div class="container">
  <div class="row">

  

        <?php foreach ($recently_added_products as $product): ?>   
          <div class="card"  style="text-align:center ">    
          <div class="card-body">            
          <h4 class="card-title"><?php echo $product['Name'] ?></h4>
          <h4 class="card-description"><?php echo $product['UserID'] ?></h4>



<form action="edituser.php" method="post">
          <input type="hidden" name="NewUserID" value="<?=$product['UserID']?>">


    
          
        
                    <input type="submit" value="Edit me"  class="btn btn-primary"></input>
                    </form>

                    </div>
                   
                 

    

      </div>
  
    </form> 
   
                  
        <?php endforeach; ?>
        </div>
        </div>
                    </div>
                    </div>
                    </div>
                 
   </div>

 <div class="wrapper">
    </div>

           <script>
function goBack() {
  window.history.back();
}
</script>`
<script>
function clicked(e)
{
    if(!confirm('Are you sure you sure you want to delete?')) {
        e.preventDefault();
    }
}
</script>



<?php function load_starttime()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT * from Time');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>
<footer id="footer">

<div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
  <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
</div>
</footer>
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

    </script> 
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</div>
</body>
</html> 
