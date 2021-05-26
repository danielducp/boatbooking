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
        <a class="nav-link" href="#">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Booking</a>
      </li>
      <li class="nav-item">
       
      <?php session_start();
      if( $_SESSION['user_logged_in']): ?>
        <a class="nav-link" href="../login/logout.php">Logout</a>
<?php else: ?>
  <a class="nav-link" href="login/login.php">Login</a>
<?php endif; ?>
      </li>    
    </ul>
  </div> 
</nav>


      <?php
      
        require '../config.php';

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM User');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php function load_usertypename()
{



  $data='';
  require '../config.php';
  $sqlMake=$pdo->prepare('SELECT * FROM User ORDER BY Name');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>
  <form action="newbooking.php" method="post" >

                <label for="Name" style="width: 150px">Select User </label>
                
                <select name="Name" id="Name" searchable="Search here" style="font-size: 40px; padding-right: 29px; display: inline-block;">
            <option value="" selected="true" disabled="disabled">Select Name </option>
            <?php
            $data=load_usertypename();
            foreach ($data as $row): 
            echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
            ?>
            <?php endforeach ?>
            </select>          
                <input name="submit" value="Make Booking" class="btn btn-info" type="submit">
            </form>        


                  <br>
                  <div class="container">
  <div class="row">

  <table class="table">

<thead>

<tr style="background: #E6F2FF;">

<th>Name  </th>
<th>ID</th>

<th>Make Booking</th>





</tr>

</thead>
  

        <?php foreach ($recently_added_products as $product): ?> 
          <tr>
  
          <td style="padding: 14px;"><?php echo $product['Name']; ?></td>
<td style="padding: 14px;"><?php echo $product['UserID']; ?></td>
     



<form action="newbooking.php" method="post">
          <input type="hidden" name="Name" value="<?=$product['Name']?>">


    
          
          <td style="align:center">

                    <input type="submit" value="Make a Booking"  class="btn btn-info"></input>
                    </form> </td>
                    </div>
                   
                 

    

      </div>
  
    </form> 
   
                  
        <?php endforeach; ?>
        </div>
        </div>
                    </div>
                    </div>
                    </div>
                 
   </div>

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
