
    <?php

require '../config.php';



// Get the 4 most recently added products

$stmt = $pdo->prepare('SELECT * FROM Booking INNER JOIN User ON Booking.UserID = User.UserID WHERE BookingSailingDate = ?');
 $SailingDate = $_POST['SailingDate'];
 
 $newSailingDate = date("d-m-Y", strtotime($SailingDate));  

$stmt->execute([$_POST['SailingDate']]);

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

 


          <div id="bookingtable" >



      

<?php foreach ($recently_added_products as $product): ?>                   





            <tr >



<td style="padding: 14px;"><?php  $product['BookingNumber']; ?></td>

<td style="padding: 14px;"><?php  $email = $product['Email']; ?></td>
   <?  $email;
 $email;
 $message = "We are sorry but due to weather conditions or other unforeseen circumstance we have cancelled your sailing session for $newSailingDate. We look forward to seeing again in the future.";
   
   // Send
    mail($email, 'Cancellation', $message);    ?>

            </form> 

</td>

</tr>



</div>



</form> 


<?php
  ?>

<?php endforeach; 


$sql = "UPDATE Booking SET  
           CancelledStatus = 'Cancelled'
            WHERE BookingSailingDate = :BookingSailingDate";
            


$sqlQuery = $pdo->prepare($sql); 
$sqlQuery->bindParam(':BookingSailingDate', $_POST['SailingDate']); 
$sqlQuery->execute(); 


echo "<h1  align=center>Booking on $newSailingDate have been cancelled. You will be redirected in 5 seconds</h1>";
header('Refresh: 5; ../admin/adminpage.php');
?>


