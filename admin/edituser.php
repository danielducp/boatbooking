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

  <?php function load_usertypename()
{



  $data='';
  require '../config.php';
  $sqlMake=$pdo->prepare('SELECT UserTypeID FROM UserType');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>

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

 $UserID = $_POST['NewUserID'];




$sqlQuery = $pdo->prepare('SELECT * FROM User WHERE UserID = ?');
$sqlQuery->execute([$UserID]);

while($row = $sqlQuery->fetch())
{
?>



	
<br>
<div class ="UserOutput">

<fieldset>
            <form action="UpdateUser.php" method="post" >
            <input type="hidden" name="UserID" value="<?=$UserID?>">

                         <label for="Name" style="width: 150px">Name: </label>
                
				<input name="Name" class="form-control" type="text" value="<?php echo $row['Name'];?>" style="width: 300px; display: inline-block"><br><br>
            
            
            
                         <label for="Address" style="width: 150px">Address: </label>
                
				<input name="Address" class="form-control" type="text" value="<?php echo $row['Address'];?>" style="width: 300px; display: inline-block"><br><br>
				
				
				     <select name="UserTypeID" id="UserTypeID" searchable="Search here" style="font-size: 40px; padding-right: 29px; display: inline-block;">
            <option value="" selected="true" disabled="disabled"><?php echo $row['UserTypeID'];?> </option>
            <?php
            $data=load_usertypename();
            foreach ($data as $row): 
            echo '<option value="'.$row["UserTypeID"].'">'.$row["UserTypeID"].'</option>';
            ?>
            <?php endforeach ?>
            </select>          
            
            
            <br><br>
   


                <input name="submit" value="Update" class="btn btn-info" type="submit">
            </form>
        </fieldset>
</form>
</div>
<?php 
}
?>
<div class="UserOutput">
<table border="1" style="width:90% ">
        <tr >
                    <th colspan="2" style="text-align: center; vertical-align: middle;">User Information Table
</td>

</tr>
    <tr>
            <th>User Type ID</th>
    <th>User Type Name</th>
        
    </tr>
<?php
$sqlQuery = $pdo->prepare('SELECT * FROM UserType');
$sqlQuery->execute();
 
while($row = $sqlQuery->fetch())
{
    ?>
  <tr>
   <td><?php echo $row["UserTypeID"]; ?>  </td>
   <td><?php echo $row["UserTypeName"]; ?>  </td></tr>
<?php
}

?>

</table>
</div>