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
  <script src="https://cdn.tiny.cloud/1/cduwv63mn92wxuj0p5oy5a499ad912yssb01ofin2nh954zg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

 
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name'
  });
</script>

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

 $BookingNumber = $_POST['BookingNumber'];
 $ChosenDate = $_POST['ChosenDate'];



$sqlQuery = $pdo->prepare('SELECT * FROM Booking WHERE BookingNumber = ?');
$sqlQuery->execute([$BookingNumber]);

while($row = $sqlQuery->fetch())
{
?>



	
<br>
<div class ="UserOutput">

<fieldset>
            <form action="UpdateRequirements.php" method="post" >
            <input type="hidden" name="BookingNumber" value="<?=$BookingNumber?>">
            <input type="hidden" name="ChosenDate" value="<?=$ChosenDate?>">

            <textarea class="textarea" name="ExtraRequirements">
    <? ?><p> <?php echo $row['ExtraRequirements']; ?></p> 
    </textarea>
   


                <input name="submit" value="Update" class="btn btn-info" type="submit">
            </form>
        </fieldset>
</form>
</div>
<?php 
}
?>