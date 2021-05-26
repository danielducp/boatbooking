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
   <?
  
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
    Peterborough Sailability
  </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
         <li class="nav-item">
        <a class="nav-link" href="http://peterboroughtestsite.42web.io/">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newbooking.php">Booking</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../login/logout.php">Logout</a>

    </li>    
    </ul>
  </div> 
</nav>
<br>



      <BR>    


     <?php  $_POST["ChosenDay"]; ?>
       <?php  $_POST["ChosenBoatID"]; ?>
      <?php  $_POST["ChosenDate"]; ?>


      <?php
$chosenday = $_POST["ChosenDay"];

        require 'config.php';
      $chosendate =  $_POST['ChosenDate'];
      $chosenboat =  $_POST['ChosenBoatID'];
      $UserID = $_POST['UserID'];



      $stmt2 = $pdo->prepare('SELECT BoatName FROM Boat where BoatID = ?');
      $stmt2->execute([$_POST['ChosenBoatID']]);
      $recently_added_products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      foreach ($recently_added_products as $product): ?>
      
       
      
                  </div>
          <?php  $boatname = $product['BoatName'] ?>
               
                  </div>
                  
                  </div>
                  </div>
               
                
      <?php endforeach;?>

      <div class ="UserOutput">
         You have chosen a  <?php echo $boatname ?> on 

            <?php  
 $_POST['ChosenBoatID'];
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = ?');
$stmt->execute([$_POST['ChosenBoatID']]);
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $chosendate;
$newDate = date("l d F Y", strtotime($chosendate));  
echo  $newDate;


 "<br>";
  "Boat ID chosen: ".$chosenboat;
?>
 
 </div>

 <div class="heading1">      <h4>    Our Times</h4> </div>
     
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

          $startdateandtimetogether = "$chosendate $chosentime";
          $newstarttime = strtotime($startdateandtimetogether); 
          $StartTime =  date('Y-m-d H:i:s', $newstarttime); 

          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM AvailableBoat WHERE BoatID = '$chosenboat'");
          $row4=$sqlQuery->fetch();
          $totalnumberofboats = $row4['total'];


   
          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime' and BoatID = '$chosenboat'");
          $row3=$sqlQuery->fetch();
          $totalamountofbookings = $row3['total'];

          $remainingboats = $totalnumberofboats - $totalamountofbookings;
          echo   $remainingboats." boats remaining ";
          echo "<br>";
          
       


          $chosentimewithoutseconds=substr($chosentime,0,-3);

          if ($totalamountofbookings < $totalnumberofboats) {
            echo $chosentimewithoutseconds;
?></h4>
          <input type="submit" value="Choose me" class="btn btn-primary"></input>
<?php
          } else {
            echo $chosentimewithoutseconds;
            ?></h4>
            <input type="submit" value="Fully Booked" class="btn btn-danger" disabled></input>
            <?php
          }
          
          ?></h4>
      
          </div>
     
          </form> 
          </div>
         

        
                   
          <?php endforeach; ?>
          </div>

          </div>
           
</div>

 </div>
 </div>
<footer class="static-bottom">
 <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
   <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
 </div>
</footer>




<?
?>