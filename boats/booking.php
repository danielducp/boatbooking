
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="../css/stylesheet.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <nav>
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

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM Boat');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row">
                <h4 class="center">
                  <span class="heading1">Our</span> Boats</h4>
             
        <?php foreach ($recently_added_products as $product): ?>

          <div class="col s12 m4">
                  <div class="card hoverable">
                    <div class="card-image">
                    <a href="boatbooking.php?BoatID=<?=$product['BoatID']?>" class="product">

                    <?php echo" <img class=imageofboat id=BoatImage src='../pictures/".$product['BoatImage']."'";  "onclick=location.href='productInformation.php?ProductCode=".$product['ProductCode']."'" ?>
                      <a class="tooltipped btn-floating  halfway-fab waves-effect waves-light red" data-position="bottom" data-tooltip="Select it"></a>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><?php echo $product['BoatName']; ?></span>
                      <p class="activator"><?php echo $product['BoatDescription']; ?>
                      </p>
                      <span class="card-title activator grey-text text-darken-4" alt="More Info"><i class="tooltipped material-icons right" data-position="bottom" data-tooltip="More Info">more_vert</i></span>
                    </div>
                    
                    </div>
                    </div>
                    
                  
        <?php endforeach; ?>
          
           <script>
function goBack() {
  window.history.back();
}
</script>`





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
