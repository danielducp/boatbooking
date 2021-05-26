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
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table',
      toolbar: 'table',

      toolbar_mode: 'floating',
   });
  </script>
</body>
</html>


<body>
   <?php function load_countavailableboats()
{



  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT * FROM AvailableBoat;');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}

function load_availablerecurringoptions()
{



  $data='';
  require 'config.php';
  $sqlRecurringOptions=$pdo->prepare('SELECT * FROM RecurringBookings;');
  $sqlRecurringOptions ->execute();
  $data=$sqlRecurringOptions-> fetchAll();
  return $data;
}

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
        <a class="nav-link" href="http://peterboroughtestsite.42web.io/">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newboatbooking.php">Booking</a>
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


<br>




      <?php
        require 'config.php';
      $chosendate =  $_POST['ChosenDate'];
      $chosenboat =  $_POST['ChosenBoatID'];
      $chosentime =  $_POST['ChosenTime'];
      $UserID = $_POST['UserID'];
      $UserTypeID = $_SESSION['UserTypeID'];

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = ?');
$stmt->execute([$_POST['ChosenBoatID']]);
$stmt2 = $pdo->prepare('SELECT BoatName FROM Boat where BoatID = ?');
$stmt2->execute([$_POST['ChosenBoatID']]);
$recently_added_products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
foreach ($recently_added_products as $product): ?>

 

            </div>
    <?php $boatname = $product['BoatName'] ?></span>
              </p>
            </div>
            
            </div>
            </div>
         
          
<?php endforeach;
$chosentimewithoutseconds=substr($chosentime,0,-3);


     $startdateandtimetogether = "$chosendate $chosentime";
     $newstarttime = strtotime($startdateandtimetogether); 
     $StartTime =  date('Y-m-d H:i:s', $newstarttime); 
$sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime' AND BoatID = '$chosenboat'");
$row3=$sqlQuery->fetch();
$totalamountofbookings = $row3['total'];
 "<br>";
 $totalamountofbookings;

$sqlQuery = $pdo->query("SELECT count(*) as total  FROM AvailableBoat WHERE BoatID = '$chosenboat'");
$row4=$sqlQuery->fetch();
 $totalnumberofboats = $row4['total'];
 "<br>";


 $totalnumberofboats;
$remainingboats = $totalnumberofboats - $totalamountofbookings;

$newremainingboats=($remainingboats > 6)?(6):($remainingboats);
 $newremainingboats;

?>
   <div class ="UserOutput">
You have chosen to make a  <?php echo $boatname ?> booking on 

<?php 

     $ScreenOutputChosenTime =  date('l d F Y \a\t H:i', $newstarttime); 

        echo $ScreenOutputChosenTime;?>
        <br />
There are <?php echo  $remainingboats ?> remaining out of <?php echo  $totalnumberofboats ?> boats

     <br />
     

</div>   

             
             <?php foreach ($recently_added_products as $product): ?>
              
                         
                         </div>
                         </div>
                        
               <?php endforeach; ?>
     <?php
     
     $sqlQuery = $pdo->query("SELECT *  FROM SeasonDates");
$row10=$sqlQuery->fetch();
 $seasonstartdate = $row10['SeasonStartDate'];
 $seasonenddate = $row10['SeasonEndDate'];

     

     
      $seasonstartdate;
      $seasonenddate;
     
     
     $date_from = $seasonstartdate;
     $date_from = strtotime($date_from);
     
     $date_to=$seasonenddate;
     $date_to = strtotime($date_to);
     
     for ($i=$date_from; $i<=$date_to; $i+=86400) {
     $date = date("Y-m-d", $i);
     $unixTimestamp = strtotime($date);
     
     $dayOfWeek = date("l", $unixTimestamp);
     

     }//end for
     $date =  $_POST["ChosenDate"];
      $date;
     $UserID = $_POST['UserID'];
      "<br>";   $UserID;
      "<br>"; 
        $UserTypeID;
     ?>
     

  
                     
     
     
     <form action="completebooking.php" method="post">
          <input type="hidden" name="ChosenDate" value="<?=$date?>">
          <input type="hidden" name="UserID" value="<?=$UserID?>">
          <input type="hidden" name="ChosenBoatID" value="<?=$chosenboat?>">
          <input type="hidden" name="ChosenTime" value="<?=$chosentime?>">

          <?php
          $sqlQuery = $pdo->query("SELECT UserTypeID FROM User WHERE UserID = '$UserID'");
          $row8=$sqlQuery->fetch();
           $UserTypeID = $row8['UserTypeID'];


if ($UserTypeID ==1)
{
?>
   <div class ="UserOutput">
   <?php
  $Text = "Please enter any additional requirements you may have";
  
  $SingleUserBoatQuantity = 1;
  echo "Quantity Chosen: ";
  echo $SingleUserBoatQuantity;
  
  ?>
  </div>
  <input type="hidden" name="amountofboats" value="<?=$SingleUserBoatQuantity?>">

<?php
  }
  else if ($UserTypeID ==2){
    ?>
   <div class ="UserOutput">
   <?php
    echo "Please select your quantity below:";
    ?>
    </div> 
<?php
    $Text = "Please enter any additional requirements you may have, along with staff";

    ?>

<select required name="amountofboats" id="amountofboats"  searchable="Search here" >
      <option value="" disabled selected>Select your option</option>

    <?php
   $currentquantity = 1;
        foreach (range($currentquantity, $newremainingboats) as $row["BoatNumber"]) { ?>
        <option  value="<?php echo($row["BoatNumber"]); ?>"><?php echo($row["BoatNumber"]); ?></option>
        <?php } ?>
</select>
    <?php
}

  else{

    ?>
   <div class ="UserOutput">
   <?php
    echo "Please select your quantity below:";

      ?>
<br>
     
<select required name="amountofboats" id="amountofboats"  searchable="Search here" >
      <option value="" disabled selected>Select your option</option>

    <?php
   $currentquantity = 1;
        foreach (range($currentquantity, $newremainingboats) as $row["BoatNumber"]) { ?>
        <option  value="<?php echo($row["BoatNumber"]); ?>"><?php echo($row["BoatNumber"]); ?></option>
        <?php } ?>
</select>
</div> 

      <?php

  }
$Text = "Please enter any additional requirements you may have, along with staff";

  ?>

   <div class ="UserOutput">
 
<h4>Please enter enter any requirements below: </h4>
  <div class="info" >
    <textarea class="textarea" name="boatextrarequirements">
    <?php ?>
    </textarea>
    </div>
    </div>
     </div>
 
   <div class ="UserOutput">
   <br>


     <input style="margin-top:4px"  type="submit" value="Complete Booking" name="completeorder" id="order-button" class="btn btn-primary"/>
     
  


