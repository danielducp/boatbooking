<?php    session_cache_limiter('private, must-revalidate');
      session_cache_expire(60);
      session_start();

      
if( !isset($_SESSION['user_logged_in']) )
die("Redirecting in 5 seconds as you need to be logged to book a boat    <script>
var timer = setTimeout(function() {
    window.location='../login/newlogin.php'
}, 3000);
</script>");

      
      ?>

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
    Peteroborough Sailability
  </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <li class="nav-item">
                <a class="nav-link" href="index.php">Homepage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newbooking.php">Booking</a>
            </li>
            <li class="nav-item">
                <?php 
                ?>
                <a class="nav-link" href="../login/logout.php">Logout</a>

            </li>    
    </ul>
  </div> 
</nav>
<br>



 <?php   ?>

<?php
        require 'config.php';
        $BoatID = $_POST['ChosenBoatID'];
        $UserID = $_POST['UserID'];

 $BoatID;
// Get the 4 most recently added products


$query = "SELECT * FROM AvailableBoat INNER JOIN Boat ON AvailableBoat.BoatID = Boat.BoatID WHERE AvailableBoat.BoatID = ? GROUP BY  AvailableBoat.BoatID";
$stmt = $pdo->prepare($query);
$stmt->execute([$BoatID]);

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
  

                <h4 class="center">
                  <div class="text-center">Your chosen boat</div> </h4>
                  <br>

        <?php foreach ($recently_added_products as $product): ?>


          <div class="d-flex justify-content-center">

  
          <div class="card "  style="width: 18rem;text-align:center">



    <img class="card-img-top" <?php echo "src='../pictures/".$product['BoatImage']."'";?> alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $product['BoatName']; ?></h4>
      <p class="card-text"><?php echo $product['BoatDescription']; ?></p>
    
        <?php endforeach; ?>

   
        </div>
        </div>
        </div>   </div>


        <?php
        require 'config.php';

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT DayName FROM `Day` ORDER BY DAYOFWEEK (DayName)');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
            
                                <h4 class="center">
                  <div class="text-center">Book a day</div> </h4>
                               <div class="container">
  <div class="row">
        <?php foreach ($recently_added_products as $product2): ?> 
        
            <div class="card" style="text-align:center">
              <div class="card-body">
                  
                   <div class="card-title">
                       
                      <form action="newdayselected.php" method="post">
          <input type="hidden" name="UserID" value="<?=$UserID?>">

<input type="hidden" name="ChosenBoatID" value="<?=$product['BoatID']?>">
          <input type="hidden" name="ChosenDay" value="<?=$product2['DayName']?>">


       <?php echo $product2['DayName']; ?>
                    

                

                    <input type="submit" value="Choose me" class="btn btn-primary"></input>
                    </form> 
                                    


       
                       
                   </div>
                  
              </div>
             
         </div>
     
            
        <?php endforeach; ?>  
  <div class="container p-4">
 
  </div>
  </div>
  <footer>

  <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
    <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
  </div>
</footer>
