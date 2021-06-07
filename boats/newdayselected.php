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
<?php
  
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
<?php
  require 'config.php';

$chosenboat = $_POST["ChosenBoatID"];

$stmt2 = $pdo->prepare("SELECT BoatName FROM Boat where BoatID = ?");
$stmt2->execute([$chosenboat]);
$product = $stmt2->fetch(PDO::FETCH_ASSOC);
$boatname = $product['BoatName'];
$chosenday = $_POST["ChosenDay"];
$UserID = $_POST['UserID'];

// Get the 4 most recently added products

?>
<div class="UserOutput">
    You have chosen a <?php echo $boatname . " on a " . $chosenday ?> <br/>

</div>

<div class="heading1"><h4> Our Upcoming Dates</h4></div>
                    <div class="container">
  <div class="row">

        <?php

        $stmt = $pdo->prepare("SELECT * FROM SeasonDates");
        $stmt->execute();
        $dates = $stmt->fetch();
     

        
        $seasonstartdate = $dates['SeasonStartDate'];
        $seasonenddate = $dates['SeasonEndDate'];

        $date_from = $seasonstartdate;
        $date_from = strtotime($date_from);

        $date_to = $seasonenddate;
        $todaysdate = date("Y-m-d");
        $date_to = strtotime($date_to);
        if ( $todaysdate > $seasonstartdate){ $date_from = strtotime($todaysdate);
           $todaysdate;}
        else  {  ;
    }

        for ($i = $date_from; $i <= $date_to; $i += 86400) {
          $date = date("d-m-Y", $i);
          $newdate = date("jS F Y", $i);

          $unixTimestamp = strtotime($date);
          $unixTimestamp = strtotime($newdate);

          $dayOfWeek = date("l", $unixTimestamp);
          $chosendate="";
            if ($dayOfWeek == $chosenday) {

                ?>

                    
                    <div class="card" style="text-align:center ">

                        <div class="card-body">
                            <h4 class="card-title"><?php echo $newdate ?></h4>

                <form action="newdateselected.php" method="post">
                    <input type="hidden" name="ChosenBoatID" value="<?=$chosenboat?>">
                    <input type="hidden" name="ChosenDay" value="<?=$chosenday?>">
                    <input type="hidden" name="ChosenDate" value="<?=$date?>">
                    <input type="hidden" name="UserID" value="<?=$UserID?>">

                            <input type="submit" value="Choose me" class="btn btn-primary"></input>


                        </div>
                                        </form>

                    </div>
             




                <?php
            }
        }
        ?>

    </div>
</div>



</div>
</div>

<footer>
    <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
        <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
    </div>
</footer>



<?php

?>
</body>
</html>
