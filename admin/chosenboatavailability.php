<?php    session_cache_limiter('private, must-revalidate');
      session_cache_expire(60);
      session_start();
      if( !isset($_SESSION['user_logged_in']) )
      die("Redirecting in 5 seconds as you need to be logged to see availability   <script>
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
                <a class="nav-link" href="../admin/viewallusers.php">Booking</a>
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

    <h1 style="text-align: center;">Boat availability</h1>
    <div class="container">
    <div class="row">
    <br>
<?php
require 'config.php';


$chosenday = $_POST['ChosenDay'];
$chosenboat = $_POST['BoatName'];
$sqlQuery = $pdo->query("SELECT * FROM Boat WHERE BoatName = '$chosenboat'");
$row8=$sqlQuery->fetch();
$chosenboatid = $row8['BoatID'];  



  $stmt = $pdo->prepare("SELECT * FROM SeasonDates");
        $stmt->execute();
        $dates = $stmt->fetch();

?>

                <label for="seasonstartdate" style="width: 150px">Season Start Date: </label>
                
				<input name="SeasonStartDate" class="form-control" type="date" value="<?php echo $seasonstartdate = $dates['SeasonStartDate'];?>" style="width: 300px; display: inline-block"><br><br>
                <label for="seasonenddate" style="width: 150px">Season End Date: </label>
				<input name="SeasonEndDate" class="form-control" type="date"  value="<?php echo $seasonenddate = $dates['SeasonEndDate'];?>" style="width: 300px; display: inline-block"><br><br>
<?php


        $date_from = $seasonstartdate;
        $date_from = strtotime($date_from);

        $date_to = $seasonenddate;
        $date_to = strtotime($date_to);

        for ($i = $date_from; $i <= $date_to; $i += 86400) {
            $date = date("d-m-Y", $i);
            $unixTimestamp = strtotime($date);

            $dayOfWeek = date("l", $unixTimestamp);
            $chosendate="";
         
        $newDate = date("l d F Y", strtotime($date));  
        $newDate;
         
            if ($dayOfWeek == $chosenday) {

                ?>

<table id="myTable" class="table table-bordered">

<thead>
<tr>
   
   <th>Time</th>
   <th> Boats Remaining</th>


 </tr>

 <div class="heading1">      <tr>    <?echo $newDate?></tr> 

   
 
                    
                            <?


$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $pdo->prepare("SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = '$chosenboatid'");
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);



 "<br>";
?>
 
 </div>

     
                  <div class="container">
  <div class="row">
        <?php foreach ($recently_added_products as $product): ?>        
   

       
   

<?php  

    
          
          $chosentime = $product['TimeStart']; 

          $startdateandtimetogether = "$date $chosentime";
          $newstarttime = strtotime($startdateandtimetogether); 
          $StartTime =  date('Y-m-d H:i:s', $newstarttime); 

          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM AvailableBoat WHERE BoatID = '$chosenboatid'");
          $row3=$sqlQuery->fetch();
          $totalnumberofboats = $row3['total'];
          
          


          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime' and BoatID = '$chosenboatid'");
          $row6=$sqlQuery->fetch();
          $totalamountofbookings = $row6['total'];
          
             

?>


<?
          $remainingboats = $totalnumberofboats - $totalamountofbookings;

          
       


          $chosentimewithoutseconds=substr($chosentime,0,-3);
          
         ?> 
         <tr> <td> <?echo $chosentimewithoutseconds;?></td>
<?
?>
<td><?echo   $remainingboats." boats remaining "; ?> </td>
     </tr>

          </div>    </div>    </div>    </div>    </div>
     
          </div>
         

        
                   
          <?php endforeach; ?>

                    

                        </div>
                    </div>




                <?php
            }
        }
        ?>

    </div>
</div>




</div>
</div>
</div></div></div>



<?php

?>
</body>
</html>
