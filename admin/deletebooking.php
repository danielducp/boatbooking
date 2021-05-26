<?php

require '../config.php';

$BookingNumber = $_POST['BookingNumber'];
$BookingNumber;
// Get the 4 most recently added products


$stmt = $pdo->query("SELECT * FROM Booking WHERE BookingNumber = '$BookingNumber'");
$row4=$stmt->fetch();
 $totalnumberofboats = $row4['QuantityBooked'];
if ($totalnumberofboats > 0){
  echo "<h1>Booking cannot be deleted as there are boats booked linked to the booking. Please wait 5 seconds</h1>";
  header('Refresh: 5; URL=viewallbookings.php');

}


 else {



$stmt = $pdo->prepare('DELETE FROM Booking WHERE BookingNumber =  ?');
$stmt->execute([$BookingNumber]);


echo "<h1  align=center>Booking Deleted</h1>";

header('Refresh: 5; URL=viewallbookings.php');


}
?>
