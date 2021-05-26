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
 $(document).ready(function(){

$(".detail_button").on("click",function(){
  var parentTr = $(this).closest("tr");
    var counter = 1;
    $("td", $(parentTr)).each(function(){
      if(!($(this).hasClass("detail_td"))){
            $(".modal-body tr td:nth-child("+counter+")").text($(this).text());
          counter++;
        }
    $(".modal-body").show();
$("#bodytable").hide();

    });
});

$("#hide_popup").on("click",function(){
$(".modal-body").hide();
$("#bodytable").show();
});

});
</script>
 
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
                <a class="nav-link" href="index.php">Homepage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewallusers.php">Booking</a>
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

 
 



     <?php  $_POST["ChosenDay"]; ?><br />
       <?php  $_POST["ChosenBoatID"]; ?><br />
      <?php  $_POST["ChosenDate"]; ?>


      <?php
$chosenday = $_POST["ChosenDay"];

        require 'config.php';
      $chosendate =  $_POST['ChosenDate'];
      $chosenboat =  $_POST['ChosenBoatID'];
      $UserID = $_POST['UserID'];


?>


<td>
    <form action="printablesummary.php" method="post" >
            <input type="hidden" name="ChosenDate" value="<?=$chosendate?>">

            <input name="submit" value="Click to view printable summary" class="btn btn-info" type="submit">
</td>    
</form> 

      <div class ="UserOutput">
     

            <?php

$newDate = date("Y-m-d", strtotime($chosendate));  
echo "All bookings on " .$chosendate;
 $_POST['ChosenBoatID'];
// Get the 4 most recently added products
$stmt = $pdo->prepare("SELECT DISTINCT Booking.BookingNumber, Name, QuantityBooked, User.UserID, StartTime, Boat.BoatID, BoatName, Booking.ArrivalStatusName, ExtraRequirements, BoatNumber FROM Booking INNER JOIN BookedBoats ON Booking.BookingNumber = BookedBoats.BookingNumber INNER JOIN User ON Booking.UserID = User.UserID INNER JOIN Boat ON BookedBoats.BoatID = Boat.BoatID where BookingSailingDate = '$newDate' ORDER BY BoatName ASC, StartTime ASC");
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
 <?php function load_usertypename()
{



  $data='';
  require '../config.php';
  $sqlMake=$pdo->prepare('SELECT ArrivalStatusName FROM ArrivalStatus');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>
 </div>

     
                  <div class="container">
  <div class="row">

  <table id="bodytable" class="table table-bordred table-striped" border="1">

<thead>

<tr style="background: #E6F2FF;">

          <th>Name</th>
          <th>Quantity Booked</th>          <th>Boat Number</th>

          <th>Start Time</th>
          <th>Boat Type</th>
          <th>Extra Requirements</th>
          <th>Extra Requirements</th>
          <th>Status</th>
          <th>Update Status</th>
   


        </tr>

</thead>
        <?php foreach ($recently_added_products as $product): ?>        

         <?php  
          $olddate= $product['StartTime'];
          $BookingNumber = $product['BookingNumber'];
                
                         
                   $newDate = date("H:i", strtotime($olddate));  
                   $newDate;
   
          ?>
   <tr >


    <td style="padding: 14px;"><?php echo $product['Name']; ?></td>
    <td style="padding: 14px;"><?php echo $product['QuantityBooked']; ?></td>
    <td style="padding: 14px;"><?php echo $product['BoatNumber']; ?></td>

    <td style="padding: 14px;"><?php echo $newDate ?></td>
    <td style="padding: 14px;"><?php echo $product['BoatName']; ?></td>
    


    <td id="info" style="padding: 14px;"><?php echo $product['ExtraRequirements']; ?></td>

<td>
    <form action="EditRequirements.php" method="post" >
            <input type="hidden" name="BookingNumber" value="<?=$BookingNumber?>">
            <input type="hidden" name="ChosenDate" value="<?=$chosendate?>">

            <input name="submit" value="Click to update" class="btn btn-info" type="submit">
</td>    
</form> 

</div>

<form action="UpdateBookings.php" method="post" >
            <input type="hidden" name="BookingNumber" value="<?=$BookingNumber?>">
    <td>
    <select name="ArrivalStatusName" id="ArrivalStatusName" searchable="Search here" style="font-size: 40px; padding-right: 29px; display: inline-block;">
            <option value="" selected="true" disabled="disabled"><?php echo $product["ArrivalStatusName"]?></option>
            <?php
            $data=load_usertypename();
            foreach ($data as $row): 
            echo '<option value="'.$row["ArrivalStatusName"].'">'.$row["ArrivalStatusName"].'</option>';
            ?>
            <?php endforeach ?>
            </select>   </td>   

            <td>
            <input name="submit" value="Update" class="btn btn-info" type="submit">
</td>    
</form> 

    </tr >
       <?
 
          
          ?>
         
          </div> </div> </div>
         

        
                   
          <?php endforeach; ?>
          </div>

          </div>
           
</div>
<div class="container p-4">
 
 </div>
 </div>



