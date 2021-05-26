<?php    session_cache_limiter('private, must-revalidate');
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
  <link rel="stylesheet" href="../css/stylesheet.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.tiny.cloud/1/cduwv63mn92wxuj0p5oy5a499ad912yssb01ofin2nh954zg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
        <a class="nav-link" href="index/php">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../boats/newbooking.php">Booking</a>
      </li>
      <li class="nav-item">
   
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>    
    </ul>
  </div> 
</nav>

      <?php

        require '../config.php';
      echo       $Email = $_SESSION['email'];

          $sqlQuery = $pdo->query("SELECT *  FROM User WHERE Email = '$Email'");
$row10=$sqlQuery->fetch();
echo $UserID = $row10['UserID'];
    $sqlQuery->closeCursor();

// Get the 4 most recently added products

$stmt = $pdo->prepare("SELECT * FROM Booking WHERE UserID = '$UserID'");

$stmt->execute();

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

         


                  <div id="bookingtable" >



                  <table class="table">

                  <thead>

        <tr style="background: #E6F2FF;">

          <th> Booking Number </th>
          <th>Booking Sail Date</th>
          <th>Confirmation Sent</th>
          <th>Reminder Sent</th>
          <th>Duration</th>
          <th>UserID</th>
          <th>Quantity Booked</th>
                    <th>More Information</th>

          <th>Cancel</th>



        </tr>

    </thead>

        <?php foreach ($recently_added_products as $product): ?>                   





                    <tr >



    <td style="padding: 14px;"><?php echo $product['BookingNumber']; ?></td>
<td style="padding: 14px;"><?php echo $product['BookingSailingDate']; ?></td>
<td style="padding: 14px;"><?php echo $product['ConfirmationSent']; ?></td>
<td style="padding: 14px;"><?php echo $product['ReminderSent']; ?></td>
<td style="padding: 14px;"><?php echo $product['Duration']; ?></td>
<td style="padding: 14px;"><?php echo $product['UserID']; ?></td>

        <td style="padding: 14px;"><?php echo $product['QuantityBooked']; ?></td>


<form action="bookinginformation.php" method="post">

          <input type="hidden" name="BookingNumber" value="<?=$product['BookingNumber']?>">

          <input type="hidden" name="QuantityBooked" value="<?=$product['QuantityBooked']?>">

          <td style="align:center">

                    <input type="submit" value="More Information"  class="btn btn-info"></input>

                    </form> </td>
                  


<form action=".php" method="post">

          <input type="hidden" name="BookingNumber" value="<?=$product['BookingNumber']?>">





    

          

          <td style="align:center">

                    <input type="submit" value="Cancel" onclick="clicked(event)" class="btn btn-danger"></input>

                    </form> 

</td>

        </tr>



      </div>

  

    </form> 

   

                  

        <?php endforeach; ?>

        </div>



  </table>    </div>



 <div class="wrapper">

    </div>



           <script>

function goBack() {

  window.history.back();

}

</script>`

<script>

function clicked(e)

{

    if(!confirm('Are you sure you sure you want to delete?')) {

        e.preventDefault();

    }

}

</script>
