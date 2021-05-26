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
 
<?

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
   <?
  
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
        <a class="nav-link" href="newboatbooking.php">Booking</a>
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

$SeasonDatesID = $_POST['SeasonDatesID'];
$SeasonStartDate = $_POST['SeasonStartDate'];
$SeasonEndDate = $_POST['SeasonEndDate'];


$sqlQuery = $pdo->prepare('SELECT * FROM SeasonDates WHERE SeasonDatesID = ?');
$sqlQuery->execute([$SeasonDatesID]);

while($row = $sqlQuery->fetch())
{
?>



	
<br>
<div class ="UserOutput">

<fieldset>
            <form action="UpdateDates.php" method="post" >
            <input type="hidden" name="SeasonDatesID" value="<?=$SeasonDatesID?>">

                <label for="seasonstartdate" style="width: 150px">Season Start Date: </label>
                
				<input name="SeasonStartDate" class="form-control" type="date" value="<?php echo $row['SeasonStartDate'];?>" style="width: 300px; display: inline-block"><br><br>
                <label for="seasonenddate" style="width: 150px">Season End Date: </label>
				<input name="SeasonEndDate" class="form-control" type="date"  value="<?php echo $row['SeasonEndDate'];?>" style="width: 300px; display: inline-block"><br><br>

                <input name="submit" value="Update" class="btn btn-info" type="submit">
            </form>
        </fieldset>
</form>
</div>
<?php 
}
?>