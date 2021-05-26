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
?><!DOCTYPE html>
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
        $email = $_SESSION['email'];

  $Name = $_POST['Name'];
   
        $sqlQuery = $pdo->query("SELECT * FROM User WHERE NAME = '$Name'");
        $row2=$sqlQuery->fetch();
        $UserID = $row2['UserID'];
// Get the 4 most recently added products

 ?>


      <BR>           <h4 class="center">
                  <div class="text-center">Our</span> Boats</h4>

      <?php
        require '../config.php';

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM Boat');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
         
                  <br>
                 

        <?php foreach ($recently_added_products as $product): ?>                

            <form action="newboatbooking.php" method="post">
                    <input type="hidden" name="ChosenBoatID" value="<?=$product['BoatID']?>">
                    <input type="hidden" name="UserID" value="<?= $UserID?>">

         <div class="cards">
                    <div style="width:100%; text-align:center">
                    <div class="container">
    <h4><b><?php echo $product['BoatName']; ?></b></h4> 
                    <img class="cardimg" <?php echo "src='../pictures/".$product['BoatImage']."'";?> alt="Card image"></div>
 
    <p><?php echo $product['BoatDescription']; ?></p> 
    <input type="submit" value="Book now" class="btn btn-primary-new"></input>
    </div>
 </div> 
  <br> 
  
    </form> 
   
                  
        <?php endforeach; ?>
   
        <div class="container p-4">
 
 </div>


 <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
   <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
 </div>
</footer>
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
