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
        $AmountOfBoats = $_POST['amountofboats'];

  $AmountOfBoats;
        $boatextrarequirements = $_POST['boatextrarequirements'];
        if (empty($boatextrarequirements)) {
          $boatextrarequirements = 'No requirements';
      }
      




         $chosendate;

         $UserID;
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
                <?php endforeach; 
                $stmt = $pdo->prepare('SELECT * FROM BookedBoats order by BookedBoatsID DESC LIMIT 1');
        $stmt->execute();
        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
                 
                          <br>
                          <div class="card-group">
                <?php foreach ($recently_added_products as $product): ?>                   
      <? $mostrecentbookedboatid = $product['BookedBoatsID'];?>
              </div>
          
            </form> 
           
            <?  $mostrecentbookedboatid+1?>         
                <?php endforeach; ?>

          
       
       
       <?php
require ("config.php");


$BookingNumber = $mostrecentbooking+1;
$BookedBoatsIDNumber = $mostrecentbookedboatid+1;


$BookingCreationDate  = date('Y-m-d H:i:s');
$chosendate =  $_POST['ChosenDate'];
$ConfirmationSent = '0';
$ReminderSent = '0';

$newformatdate = date('Y-m-d', strtotime($chosendate));
 $newformatdate;


$query = "SELECT * FROM Boat  WHERE BoatID = ? ";
$stmt = $pdo->prepare($query);
$stmt->execute([$chosenboat]);

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
        <?php foreach ($recently_added_products as $product2): ?>

<?php 
 
   $Duration = $product2['HireDuration'];  $Duration; ?></h4>
    
        <?php endforeach; 



?>



<?PHP

$sqlQuery = $pdo->query('SELECT BookedBoatsID FROM BookedBoats order by BookedBoatsID DESC LIMIT 1');
$row2=$sqlQuery->fetch();
$BookedBoatsID = $row2['BookedBoatsID'];




$sqlQuery = $pdo->query('SELECT BookingNumber FROM `Booking` ORDER BY BookingNumber DESC
LIMIT 1');
$row3=$sqlQuery->fetch();
$BookingNumber2 = $row3['BookingNumber']+1;
 "<br>";

 $BookingNumber2;
 "<br>";


 "Time";

 $startdateandtimetogether;



           $chosenboat =  $_POST['ChosenBoatID'];
           $chosenstarttime =  $_POST['ChosenTime'];
           
           
           $startdateandtimetogether = "$chosendate $chosenstarttime";
           $newstarttime = strtotime($startdateandtimetogether); 
           $StartTime =  date('Y-m-d H:i:s', $newstarttime); 

           $weeklydays = 7;
           $weeklyStartTime = date('Y-m-d H:i:s', strtotime($startdateandtimetogether . "+" . $weeklydays . " days"));


           $fortnightlydays = 14;
           $fortnightlyStartTime = date('Y-m-d H:i:s', strtotime($startdateandtimetogether . "+" . $fortnightlydays . " days"));

            $fortnightlyStartTime;


           $monthlydays = 28;

           $monthlyStartTime = date('Y-m-d H:i:s', strtotime($startdateandtimetogether . "+" . $monthlydays . " days"));

            $monthlyStartTime;

$secs = strtotime($Duration)-strtotime("00:00:00");
$endingtime = date("H:i:s",strtotime($chosentime)+$secs);


$enddateandtimetogether = "$chosendate $endingtime";
$newendtime = strtotime($enddateandtimetogether); 
$EndTime =  date('Y-m-d H:i:s', $newendtime); 
   $EndTime;
   "<br>";

  "Checking Start Time : $StartTime";


  $sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime'");
  $row5=$sqlQuery->fetch();
  $Test = $row5['total'];
   "<br>";
   "Total Bookings:";


  
   "<br>";

  $sqlQuery = $pdo->query("SELECT max(BookedBoats.BoatNumber) AS total FROM AvailableBoat INNER JOIN BookedBoats ON AvailableBoat.BoatNumber = BookedBoats.BoatNumber WHERE  BookedBoats.StartTime = '$StartTime' AND AvailableBoat.BoatID = '$chosenboat' ");
  $row6=$sqlQuery->fetch();
  $Test = $row6['total'];
   "<br>";
   "Total Boats:";
 "<br>";
 $Test;
 "Total Bookings:";

 "<br>";
 $startdateandtimetogether;

 "<br>";


           
            $x = 1;
             $BoatNumber;
            $values = array();
           

          
            foreach (range($x, $AmountOfBoats) as $number) {
              $BookedBoatsID ;
              "<br>";         

               "testing";
               $NewBookedBoatsID = ($BookedBoatsID + $number);  
               "<br>";         

               "testing";
               $BoatNumberAssigned = ($Test + $number);
               "<br>";         
              $values[] = "('$NewBookedBoatsID','$BookingNumber2','$BoatNumberAssigned','$StartTime','$EndTime', '$chosenboat')"; // quoted value, not the raw value
    
   
 



               $number;
          }
          $query_values = implode(', ', $values);

// $query_values; 

$sqlQuery = $pdo->query("SELECT SeasonStartDate FROM SeasonDates");
$row8=$sqlQuery->fetch();
$SeasonStartDate = $row8['SeasonStartDate'];
 "<br>";
 "Total Boats:";
$sqlQuery = $pdo->query("SELECT SeasonEndDate FROM SeasonDates");
$row9=$sqlQuery->fetch();
$SeasonEndDate = $row9['SeasonEndDate'];
 "<br>";
 "Total Boats:";



$date1 = new DateTime($SeasonStartDate);


// Specify the end date
$date2 = new DateTime($SeasonEndDate);

"<br>";

$startTime = strtotime( $newformatdate );
$endTime = strtotime( $SeasonEndDate );

"Gap";
"<br>";
$One = 1;

$y=1;

$sqlQuery = $pdo->query('SELECT * FROM BookedBoats order by BookedBoatsID DESC LIMIT 1');
$row10=$sqlQuery->fetch();
$NRecentBookedBoatsID = $row10['BookedBoatsID'];
$RecentBookedBoatsID = $NRecentBookedBoatsID+1;
 $RecentBookingNumber;
$sqlQuery = $pdo->query('SELECT * FROM Booking order by BookingNumber DESC LIMIT 1');
$row11=$sqlQuery->fetch();
$NRecentBookingNumber = $row11['BookingNumber'];
$RecentBookingNumber = $NRecentBookingNumber+1;
 $RecentBookingNumber;


    $query = "INSERT INTO `Booking` (BookingNumber, BookingCreationDate, BookingSailingDate, ConfirmationSent, ReminderSent, Duration, UserID, QuantityBooked, ExtraRequirements) 
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$BookingNumber, $BookingCreationDate, $newformatdate, $ConfirmationSent, $ReminderSent, $Duration, $UserID, $AmountOfBoats, $boatextrarequirements]);
echo "Booking Complete. Now redirecting in 5 seconds";
header( "refresh:5;url=../login/logout.php" );

$newquery = "INSERT INTO `BookedBoats` (BookedBoatsID, BookingNumber, BoatNumber, StartTime, EndTime, BoatID)  VALUES $query_values";
$stmt = $pdo->prepare($newquery);
$stmt->execute();



 "booking done";


        
  // You can put your database insert query here



     
?>
         