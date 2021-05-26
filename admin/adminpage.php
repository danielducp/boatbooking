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

 <script src='https://cdn.tiny.cloud/1/cduwv63mn92wxuj0p5oy5a499ad912yssb01ofin2nh954zg/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>

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
        <a class="nav-link" href="../index.php">Homepage</a>
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
session_start();
$email = $_SESSION['email'];
$UserTypeID = $_SESSION['UserTypeID'];
// Get the 4 most recently added products

$sqlQuery = $pdo->query("SELECT UserID FROM User WHERE Email = '$email' ");
$row3=$sqlQuery->fetch();
 $MyUserID = $row3['UserID'];

 $_SESSION["MyUserID"] = $MyUserID;
 
 
?>


<?php
switch ($UserTypeID) {
    case "1":
   echo "Not allowed to see";
       "done";
    
    break;
    case "2":
        echo "Not allowed to see";
        "done";    break;
      case "3":
   ?>
           <div class="container">
  <div class="row text-center">
    <div class="col-4">
<button class="btn btn-info" onclick="window.location.href='viewallbookings.php'">View bookings</button>
</div>
    <div class="col-4">
<button class="btn btn-info" onclick="window.location.href='../login/register.php'">Register</button>
</div>
    <div class="col-4">
<button class="btn btn-info" onclick="window.location.href='sendemail.php'">Send Email</button>

</div>
<div class="col-4">
<button class="btn btn-info" onclick="window.location.href='boatavailability.php'">View Boat Availability</button>

</div>
  </div>
</div>
<?php
       
      break;
      case "4":
        ?>
        <div class="container">
  <div class="row text-center">

    <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">View all bookings</h4>
      <p class="card-text">View bookings made</p>
<button class="btn btn-info" onclick="window.location.href='viewallbookings.php'">Click me</button>
</div>
</div>

    <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">Register</h4>
      <p class="card-text">Register new users or groups and administer them</p>
<button class="btn btn-info" onclick="window.location.href='../login/register.php'">Click me</button>
</div>
</div>

   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">Make a Booking for a user</h4>
      <p class="card-text">Make a booking on behalf of the user</p>
<button class="btn btn-info" onclick="window.location.href='viewallusers.php'">Click me</button>
</div>
</div>

   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">View boat availability</h4>
      <p class="card-text">Show boats availability</p>
<button class="btn btn-info" onclick="window.location.href='boatavailability.php'">Click me</button>
</div>
</div>


   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">View season dates</h4>
      <p class="card-text">View the start and end date of the season. This can be edited too.</p>
<button class="btn btn-info" onclick="window.location.href='viewseasondates.php'">Click me</button>
</div>
</div>

   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">View sailing dates</h4>
      <p class="card-text">View sailing days, Tuesday Thursday only.</p>
<button class="btn btn-info" onclick="window.location.href='viewsailingbookings.php'">Click me</button>
</div>
</div>


   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">Edit a user</h4>
      <p class="card-text">This is where you can edit the access rights of the user </p>

<button class="btn btn-info" onclick="window.location.href='viewalluserstoedit.php'">Click me</button>
</div>
</div>

   <div class="card "  style="width: 18rem;text-align:center">
    <div class="card-body">
      <h4 class="card-title">Black Flag Day</h4>
      <p class="card-text">Cancel sailing day and send notification to user </p>

<button class="btn btn-info" onclick="window.location.href='viewallsailingdates.php'">Click me</button>
</div>
</div>




<?php echo  $_SESSION['UserID'];?>





</div>
  </div>
</div>
<?php
    
    
    break;
    default:
  
    
  
  }


?>


