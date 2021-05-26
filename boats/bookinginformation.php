
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="../css/stylesheet.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>


  <div class="topnav" id="myTopnav">
  <a href="../index.php" >Home</a>
  <a href="booking.php" class="active">Booking</a>
  <a href="../login/login.php">Login/Register</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>






      <BR>    
<?php 
echo"<h2>Please confirm the information below:</h2>";
echo "<br>";

?>
      <?php
        require 'config.php';
      $chosendate =  $_GET['DateSelected'];
      $chosenboat =  $_GET['BoatID'];
      $chosentime =  $_GET['TimeStart'];

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = ?');
$stmt->execute([$_GET['BoatID']]);
$stmt2 = $pdo->prepare('SELECT BoatName FROM Boat where BoatID = ?');
$stmt2->execute([$_GET['BoatID']]);
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

echo  "Date chosen: ".$chosendate;
echo "<br>";
echo  "Boat chosen: ".$boatname;
;
echo "<br>";

echo  "Time chosen: ".$chosentimewithoutseconds;

?>
<div class="row">
                <h4 class="center">
             
        <?php foreach ($recently_added_products as $product): ?>
         
                    
                    </div>
                    </div>
                   
          <?php endforeach; ?>

<?$seasonstartdate = $product['SeasonStartDate'];
$seasonenddate = $product['SeasonEndDate'];

//echo $seasonstartdate;
//echo $seasonenddate;


$date_from = $seasonstartdate;
$date_from = strtotime($date_from);

$date_to=$seasonenddate;
$date_to = strtotime($date_to);

for ($i=$date_from; $i<=$date_to; $i+=86400) {
$date = date("Y-m-d", $i);
$unixTimestamp = strtotime($date);

$dayOfWeek = date("l", $unixTimestamp);

if ($dayOfWeek == $chosenday) {

  ?>
  <div class="col s12 m4">
  <div class="card hoverable">
    <div class="card-image">
    <a class="timebuttontext" href="dateselected.php?DateSelected=<?=$date?>&&BoatID=<?=$product['BoatID']?>" class="product">

    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $date; ?></span>
      <span class="card-title activator grey-text text-darken-4" alt="More Info"><i class="tooltipped material-icons right" data-position="bottom" data-tooltip="More Info">more_vert</i></span>
    </div>
    
    </div>
    </div>
    <?
}
}//end for
?>

<div class="col s12 m4">
                  <div class="card hoverable">
                    <div class="card-image">
                    Confirm Booking
                    <a href="completebooking.php?TimeStart=<?=$product['TimeStart']?>&&BoatID=<?=$chosenboat?>&&DateSelected=<?=$chosendate?>" class="product">

                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><?php echo $product['TimeStart']; ?></span>
                      <p class="activator"><?php echo $product['']; ?>
                      </p>
                    </div>
                    
                    </div>   </div>   </div>
                


<form action="completebooking.php" method="post">


</div><input style="margin-top:4px"  type="submit" value="Backup" name="completeorder" id="order-button" class="btn btn-success"/>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

    
           <script>
function goBack() {
  window.history.back();
}
</script>





<?php function load_starttime()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT * from Time');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

    </script> 
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html> 
