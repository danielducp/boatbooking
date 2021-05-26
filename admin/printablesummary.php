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
  <script src="https://cdn.tiny.cloud/1/cduwv63mn92wxuj0p5oy5a499ad912yssb01ofin2nh954zg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
 $(document).ready(function(){

$(".detail_button").on("click",function(){
  var parentTr = $(this).closest("tr");
    var counter = 1;
    $("td", $(parentTr)).each(function(){
      if(!($(this).hasClass("detail_td"))){
            $(".modal-body tr td:nth-child("+counter+")").text($(this).text());
          counter++;
        }
    $(".modal-body").show();
$("#bodytable").hide();

    });
});

$("#hide_popup").on("click",function(){
$(".modal-body").hide();
$("#bodytable").show();
});

});
</script>
 
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name'
  });
</script>

</head>
<body>
 
<?php

session_cache_limiter('private, must-revalidate');
      session_cache_expire(60);
      session_start();
      if( !isset($_SESSION['user_logged_in']) )
      die("Redirecting in 5 seconds as you need to be logged to book a boat    <script>
      var timer = setTimeout(function() {
          window.location='../login/newlogin.php'
      }, 3000);
      </script>");

    ?>
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
                <a class="nav-link" href="index.php">Homepage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewallusers.php">Booking</a>
            </li>
            <li class="nav-item">
  <a class="nav-link" href="adminpage.php">Admin Page</a>
     </li>  
            <li class="nav-item">
              
                <a class="nav-link" href="../login/logout.php">Logout</a>

            </li>   
    </ul>
  </div> 
</nav>

 
 



     <?php  $_POST["ChosenDay"]; ?><br />
       <?php  $_POST["ChosenBoatID"]; ?><br />
      <?php  $_POST["ChosenDate"]; ?>


      <?php
$chosenday = $_POST["ChosenDay"];

        require 'config.php';
      $chosendate =  $_POST['ChosenDate'];
      $chosenboat =  $_POST['ChosenBoatID'];
      $UserID = $_POST['UserID'];


?>




      <div class ="UserOutput">
     

            <?php

 $newDate = date("Y-m-d", strtotime($chosendate));  
 $DateforHeading = date("l j F Y", strtotime($chosendate));  

echo "All bookings on " .$DateforHeading;
 $_POST['ChosenBoatID'];
// Get the 4 most recently added products





?>
<br><br>

 </div>
                   <div class="container">
  <div class="row">

<?php
$stmt2 = $pdo->prepare('SELECT DISTINCT BoatName FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber INNER JOIN User ON Booking.UserID = User.UserID INNER JOIN Boat ON BookedBoats.BoatID = Boat.BoatID where BookingSailingDate = ?');
$stmt2->execute([$newDate]);

$recently_added_products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
         
                  <br>
                 

        <?php foreach ($recently_added_products as $product): ?>                

          <table id="bodytable" class="table table-bordred table-striped" border="1">
          <tr style="background: #E6F2FF;">

          <th><?php echo $BoatName= $product['BoatName']; ?></th>

<?php $stmt3 = $pdo->prepare("SELECT DISTINCT BoatNumber FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber INNER JOIN User ON Booking.UserID = User.UserID INNER JOIN Boat ON BookedBoats.BoatID = Boat.BoatID where BookingSailingDate = '$newDate' AND BoatName = '$BoatName' ORDER BY BoatNumber ASC");
$stmt3->execute();

$recently_added_products = $stmt3->fetchAll(PDO::FETCH_ASSOC);
?>
         


                  <br>
                  <tr><th>Boat Number </th>
        
        <?php foreach ($recently_added_products as $product3): ?>  
        <th><?php echo $BoatNumber= $product3['BoatNumber']; ?></th> 

    
  
          <?php endforeach; ?>  
              
          </tr>
<thead>

</thead>
<?php
$stmt = $pdo->prepare("SELECT DISTINCT StartTime FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber INNER JOIN User ON Booking.UserID = User.UserID INNER JOIN Boat ON BookedBoats.BoatID = Boat.BoatID where BookingSailingDate = '$newDate' AND BoatName = '$BoatName' ORDER BY  StartTime ASC");
$stmt->execute();

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach ($recently_added_products as $product1): ?>        



<tr><th>
         <?php  

          $olddate= $product1['StartTime'];

       echo $TimeforTable = date("H:i", strtotime($olddate));  

          $BookingNumber = $product1['BookingNumber'];
                
      
   
          ?>
</th>
<?php
       $stmt = $pdo->prepare("SELECT DISTINCT Booking.BookingNumber, Name, QuantityBooked, User.UserID, StartTime, Boat.BoatID, BoatName, Booking.ArrivalStatusName, ExtraRequirements, BookedBoats.BoatNumber FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber INNER JOIN User ON Booking.UserID = User.UserID INNER JOIN Boat ON BookedBoats.BoatID = Boat.BoatID where BookingSailingDate = '$newDate' AND BoatName = '$BoatName' AND StartTime = '$olddate'");
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach ($recently_added_products as $product2): ?>        

  
    
<td>
         <?php  
      echo    $UserID= $product2['Name'];
                
      
   
          ?>


</div>



    </td >
       <?
 
          
          ?>
         
          </div> </div> </div>
         

        
                   
          <?php endforeach; ?>    <?php endforeach; ?>  </table>      <?php endforeach; ?>       


          </div>

          </div>
           
</div>
<div class="container p-4">
 
 </div>
 </div>



