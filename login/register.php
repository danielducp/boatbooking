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
  <?php function load_usertypename()
{



  $data='';
  require '../config.php';
  $sqlMake=$pdo->prepare('SELECT UserTypeName FROM UserType');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="./js/main.js"></script>
</body>
</html> <script>
function goBack() {
  window.history.back();
}
</script>


	<script>
$(document).ready(function(){
 $('#UserTypeID').change(function(){

   var UserType_ID = $(this).val();
   $.ajax({
    url:"FetchUserTypeID.php",
    method:"POST",
    data:{ UserTypeID:UserType_ID},
    success:function(data){
		
     $('#UserTypeName').html(data);
    }
   })
  
 });
});
</script> 
</head>
<body>
 <script src='https://cdn.tiny.cloud/1/cduwv63mn92wxuj0p5oy5a499ad912yssb01ofin2nh954zg/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
 <script>
tinymce.init({
  selector: 'textarea',
  placeholder:'<?php echo $Text ?>',

  plugins: 'a11ychecker advcode autoresize casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
  toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
  toolbar_mode: 'floating',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',

});
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
session_start();
$email = $_SESSION['email'];
$UserTypeID = $_SESSION['UserTypeID'];
// Get the 4 most recently added products


?>

<br>
<br>
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
     <div class="formarea">

            <br>
            <div class="outputresults">
            <form name="register" action="registerscript.php" method="post" align="center">
    
            <label for="name" style="width: 150px">Name</label>
                <input class="form-control" style="width: 200px; display: inline-block" name="name" type="text"><br>       <br>
        
                <label for="address" style="width: 150px">Address</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="address" type="text" ><br>       <br>

<label for="postcode" style="width: 150px">Postcode</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="postcode" type="text" ><br>       <br>

<label for="phonenumber" style="width: 150px">Phone Number</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="phonenumber" type="number" ><br>       <br>

<label for="email" style="width: 150px">Email</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="email" type="email" ><br>       <br>

<label for="password" style="width: 150px">Password</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="password" type="text" ><br>       <br>
                <div style="float: none; display: inline-block">
                <select name="UserTypeName" id="UserTypeName" searchable="Search here" style="font-size: 40px; padding-right: 29px; display: inline-block;">
            <option value="" selected="true" disabled="disabled">Select User Type Name </option>
            <?php
            $data=load_usertypename();
            foreach ($data as $row): 
            echo '<option value="'.$row["UserTypeName"].'">'.$row["UserTypeName"].'</option>';
            ?>
            <?php endforeach ?>
            </select>



            <br>
            <br>
            <br>

                <input style="margin-top:4px"  type="submit" value="Complete Registration" name="submit" class="btn btn-info">
                </div>
            </form>
    </div>

  
      
<?php
       
      break;
      case "4":
        ?>

    <div class="formarea">

            <br>
            <div class="outputresults">
            <form name="register" action="registerscript.php" method="post" align="center">
    
            <label for="name" style="width: 150px">Name</label>
                <input class="form-control" style="width: 200px; display: inline-block" name="name" type="text"><br>       <br>
        
                <label for="address" style="width: 150px">Address</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="address" type="text" ><br>       <br>

<label for="postcode" style="width: 150px">Postcode</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="postcode" type="text" ><br>       <br>

<label for="phonenumber" style="width: 150px">Phone Number</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="phonenumber" type="number" ><br>       <br>

<label for="email" style="width: 150px">Email</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="email" type="email" ><br>       <br>

<label for="password" style="width: 150px">Password</label>

<input  class="form-control" style="width: 200px; display: inline-block" name="password" type="text" ><br>       <br>
                <div style="float: none; display: inline-block">
                <select name="UserTypeName" id="UserTypeName" searchable="Search here" style="font-size: 40px; padding-right: 29px; display: inline-block;">
            <option value="" selected="true" disabled="disabled">Select User Type Name </option>
            <?php
            $data=load_usertypename();
            foreach ($data as $row): 
            echo '<option value="'.$row["UserTypeName"].'">'.$row["UserTypeName"].'</option>';
            ?>
            <?php endforeach ?>
            </select>


<br>
<br>
<br>

            <input style="margin-top:4px"  type="submit" value="Complete Registration" name="submit" class="btn btn-info">
                </div>
            </form>
    </div>

 
<?php
    
    
    break;
    default:
  
    
  
  }


?>

