
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="../css/stylesheet.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <nav class="indigo-light-2">
    <div class="nav-wrapper">
      <a href="../index.php" class="brand-logo">Sailability</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../index.php">Home</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="../login/login.php">Login/Register</a></li>

      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../index.php">Home</a></li>
    <li><a href="booking.php">Booking</a></li>
    <li><a href="../login/login.php">Login/Register</a></li>
  </ul>




      <BR>    

      <?php
        require 'config.php';
      $chosendate =  $_GET['DateSelected'];
      $chosenboat =  $_GET['BoatID'];

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = ?');
$stmt->execute([$_GET['BoatID']]);
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo  "Date chosen: ".$chosendate;
echo "<br>";
echo  "Boat ID chosen: ".$chosenboat;
?>
<div class="row">
                <h4 class="center">
                  <span class="heading1">Our</span> Times</h4>
             
        <?php foreach ($recently_added_products as $product): ?>
          <div class="col s12 m4">
                  <div class="card hoverable">
                    <div class="card-image">
                    <a href="bookinginformation.php?TimeStart=<?=$product['TimeStart']?>&&BoatID=<?=$chosenboat?>&&DateSelected=<?=$chosendate?>" class="product">

                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><?php echo $product['TimeStart']; ?></span>
                      <p class="activator"><?php echo $product['']; ?>
                      </p>
                    </div>
                    
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
