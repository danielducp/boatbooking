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

<nav class="navbar navbar-expand-md navbar-custom">
<a class="navbar-brand" href="#">
    <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Peterborough Sailability
  </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../newindex.php">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Booking</a>
      </li>
      <li class="nav-item">
      <?php session_start();
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




      <BR> 

      <?php
        require 'config.php';
        $chosendate =  $_POST['ChosenDate'];
        $chosenboat =  $_POST['ChosenBoatID'];
        $chosentime =  $_POST['ChosenTime'];
        $UserID = $_POST['UserID'];

        

        ECHO $chosendate;

        echo $UserID;
        // Get the 4 most recently added products
        $stmt = $pdo->prepare('SELECT * FROM Booking order by BookingNumber DESC LIMIT 1');
        $stmt->execute();
        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
                 
                          <br>
                          <div class="card-group">
        
                <?php foreach ($recently_added_products as $product): ?>                   

        
  
      <? $mostrecentbooking = $product['BookingNumber'];?>
              </div>
          
            </form> 
           
            <?  $mostrecentbooking+1?>         
                <?php endforeach; ?>

          
       
       
       <?php
require ("config.php");
$BookingNumber = $mostrecentbooking+1;
$BookingCreationDate  = date('Y-m-d H:i:s');
$chosendate =  $_POST['ChosenDate'];
$ConfirmationSent = '0';
$ReminderSent = '0';
$Duration = '00:30:00';

$newformatdate = date('Y-m-d', strtotime($chosendate));
$AmountOfBoats = $_POST['amountofboats'];
echo $AmountOfBoats;

echo "Booking Complete";

$query = "INSERT INTO `Booking` (BookingNumber, BookingCreationDate, BookingSailingDate, ConfirmationSent, ReminderSent, Duration, UserID, QuantityBooked) 
             VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$BookingNumber, $BookingCreationDate, $newformatdate, $ConfirmationSent, $ReminderSent, $Duration, $UserID, $AmountOfBoats]);
?>