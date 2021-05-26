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



<?php
        require 'config.php';
        $chosenday = $_POST['ChosenDay'];

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT BoatName FROM `Boat` ORDER BY BoatID');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
                <h4 class="center">
                  <div class="text-center">Choose a Boat</div></h4>
             <br>
             <div class="d-flex justify-content-center">
        <?php foreach ($recently_added_products as $product2): ?>  <div class="card"  style="width: 50rem;text-align:center">
          <form action="chosenboatavailability2.php" method="post">

          <input type="hidden" name="BoatName" value="<?=$product2['BoatName']?>">
          <input type="hidden" name="ChosenDay" value="<?=$chosenday?>">

          <div class="card-body">

                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><?php echo $product2['BoatName']; ?></span>
                      </p>

                   

                    <input type="submit" value="Choose me" class="btn btn-primary"></input>
                    </form> 
                    </div>
                    </div>
  

            
        <?php endforeach; ?>  </div> 