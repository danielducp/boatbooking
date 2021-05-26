 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Peterborough Sailability</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/stylesheet.css">

</head>
<body>

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
        <a class="nav-link" href="#">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Booking</a>
      </li>
      <li class="nav-item">
      <?php 
      session_cache_limiter('private, must-revalidate');
      session_cache_expire(60);
      session_start();
      
      if( $_SESSION['user_logged_in']): ?>
        <a class="nav-link" href="../login/logout.php">Logout</a>
<?php else: ?>
  <a class="nav-link" href="../login/login.php">Login</a>
<?php endif; ?>        </li>    
    </ul>
  </div> 
</nav>
<br>



      <BR>    
      You have selected day <?php echo $_POST["ChosenDay"]; ?>.<br />
      You have selected boat <?php echo $_POST["ChosenBoatID"]; ?>.<br />
      You have selected date <?php echo $_POST["ChosenDate"]; ?>.<br />


      <?php
$chosenday = $_POST["ChosenDay"];

        require 'config.php';
      $chosendate =  $_POST['ChosenDate'];
      $chosenboat =  $_POST['ChosenBoatID'];
      $UserID = $_POST['UserID'];

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = ?');
$stmt->execute([$_POST['ChosenBoatID']]);
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo  "Date chosen: ".$chosendate;
echo "<br>";
echo  "Boat ID chosen: ".$chosenboat;
?>

                <h4 class="center">
                  <span class="heading1">Our</span> Times</h4>
     
                  <div class="container">
  <div class="row">
        <?php foreach ($recently_added_products as $product): ?>        
   

           <div class="card"  style="text-align:center">
          <form action="newbookinginformation.php" method="post">
               <input type="hidden" name="ChosenBoatID" value="<?=$chosenboat?>">
          <input type="hidden" name="ChosenDay" value="<?=$chosenday?>">
          <input type="hidden" name="ChosenDate" value="<?=$chosendate?>">
          <input type="hidden" name="ChosenTime" value="<?=$product['TimeStart'];?>">
          <input type="hidden" name="UserID" value="<?=$UserID?>">

       
          <div class="card-body">
          <h4 class="card-title"><?php  
          
          
          $chosentime = $product['TimeStart']; 
          
          
          $chosentimewithoutseconds=substr($chosentime,0,-3);
          echo $chosentimewithoutseconds;
          
          ?></h4>
      
          <input type="submit" value="Choose me" class="btn btn-primary"></input>
          </div>
     
          </form> 
          </div>
         

        
                   
          <?php endforeach; ?>
          </div>

          </div>
           
</div>
<div class="container p-4">
 
 </div>
 </div>
<footer class="static-bottom">
 <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
   <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
 </div>
</footer>







