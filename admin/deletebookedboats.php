<?php

require '../config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$BookedBoatsID = $_POST['BookedBoatsID'];
$StartTime = $_POST['StartTime'];
$CarriedOverBoatNumber = $_POST['BoatNumber'];
 $CarriedOverBoatNumber;

/*
$stmt = $pdo->prepare('DELETE FROM BookedBoats  WHERE BookedBoatsID =  ?');
$stmt->execute([$_POST['BookedBoatsID']]);
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo"BookingNumber, ".$BookingNumber." has been deleted";
header('Refresh: 5; URL=../newindex.php');
*/


$query = "SELECT * FROM `BookedBoats` WHERE BookedBoatsID  = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$BookedBoatsID]);

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
        <?php foreach ($recently_added_products as $product2): ?>

<?php 
 
   $ChosenBoatNumber = $product2['BoatNumber']; ?></h4>
    
        <?php endforeach; 

 $ChosenBoatNumber;
$query = "SELECT * FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber WHERE BookedBoats.BoatNumber = ? AND BookedBoats.StartTime = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ChosenBoatNumber, $StartTime]);

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
        <?php foreach ($recently_added_products as $product3): ?>

<?php 
    $BookingNumber = $product3['BookingNumber']; 

   $BoatNumber = $product3['BoatNumber']; 
 "<br>";
   $Booked = $product3['QuantityBooked']; 





   ?></h4>
    
        <?php endforeach; 
        
        $username = "danielst_daniel";
        $password = "Otbcncfc1";
     $NewQuantityBooked = $Booked-1;
 $query = "UPDATE `Booking` SET QuantityBooked =  ? WHERE BookingNumber = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$NewQuantityBooked, $BookingNumber]);
    $stmt->closeCursor();



  
$stmt = $pdo->prepare('DELETE FROM BookedBoats  WHERE BookedBoatsID =  ?');
$stmt->execute([$_POST['BookedBoatsID']]);
    $stmt->closeCursor();

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


 "<br>";
 "Boat Number to delete:";
 $ChosenBoatNumber;
 "<br>";



$sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime'");
$row8=$sqlQuery->fetch();
$Test = $row8['total'];
$query = "SELECT BoatNumber FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber WHERE BookedBoats.BoatNumber >  ? AND BookedBoats.StartTime = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ChosenBoatNumber, $StartTime]);

"<br>";
"<br>";
 $row['BoatNumber'] = "";
while($row = $stmt->fetch()) {
       $CurrentBoatNumber =  $row['BoatNumber'];

       "New";
      $NewBoatNumbers = $CurrentBoatNumber -1;

    // echo $CurrentBoatNumber;
        $foodArray = [$CurrentBoatNumber];
        $newfoodArray = [$NewBoatNumbers];

        foreach ($foodArray as $food)  {
                 "Old Numbers";

                 $food ."<br />";


                foreach ($newfoodArray as $foods)  {
                         "New Numbers";
                                  
                
         
           $foods ."<br />";
           $query = "UPDATE `BookedBoats` SET BoatNumber =  BoatNumber-1 WHERE StartTime = ? AND BookedBoats.BoatNumber >  ? ";
           $stmt = $pdo->prepare($query);
           $stmt->execute([$StartTime, $ChosenBoatNumber]);
    $stmt->closeCursor();

   

           
        }
    }
}

echo "<h1  align=center>Booked Boat Deleted</h1>";

header('Refresh: 5; URL=viewallbookings.php');
?>

<?php 


/*
 $query = "UPDATE `BookedBoats` SET BoatNumber =  ? WHERE StartTime = ? AND BookedBoats.BoatNumber >  ? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$NewBoatNumber, $StartTime, $ChosenBoatNumber]);

*/

//print_r($firstquarter);


/*

$newquery = "UPDATE `BookedBoats`  SET (BoatNumber)  VALUES $query_values";
$stmt = $pdo->prepare($newquery);





echo"BookedBoatsID, ".$BookedBoatsID." has been deleted";

$DeletedValue = 1;
$NewBoatNumber = $BoatNumber - $DeletedValue;
ECHO $NewBoatNumber;




$query = "UPDATE `BookedBoats` SET BoatNumber =  ? WHERE BoatNumber > ? AND  `BookedBoats`.StartTime = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$NewBoatNumber, $BoatNumber, $StartTime]);

*/



?>