
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
        require '../config.php';
        $BoatID = $_POST['ChosenBoatID'];
        $UserID = $_POST['UserID'];


        // Get the 4 most recently added products
        
        $stmt = $pdo->prepare('SELECT * FROM Booking WHERE UserID = ?');
        
        $stmt->execute($_POST['UserID']);
        
        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        
                 
        
                          <br>
        
                          <div id="bookingtable" >
        
        
        
                          <table class="table">
        
                          <thead>
        
                <tr style="background: #E6F2FF;">
        
                  <th> Booking Number </th>
                  <th>Booking Creation Date</th>
                  <th>Booking Sail Date</th>
                  <th>Confirmation Sent</th>
                  <th>Reminder Sent</th>
                  <th>Duration</th>
                  <th>UserID</th>
                  <th>Quantity Booked</th>
                  <th>More Information</th>
                  <th>Delete</th>
        
        
        
                </tr>
        
            </thead>
        
                <?php foreach ($recently_added_products as $product): ?>                   
        
        
        
        
        
                            <tr >
        
        
        
            <td style="padding: 14px;"><?php echo $product['BookingNumber']; ?></td>
        <td style="padding: 14px;"><?php echo $product['BookingCreationDate']; ?></td>
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
        
                            <input type="submit" value="MoreInformation"  class="btn btn-primary"></input>
        
                            </form> </td>
        
        
        
        <form action="deletebooking.php" method="post">
        
                  <input type="hidden" name="BookingNumber" value="<?=$product['BookingNumber']?>">
        
        
        
        
        
            
        
                  
        
                  <td style="align:center">
        
                            <input type="submit" value="Delete" onclick="clicked(event)" class="btn btn-danger"></input>
        
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
        
        <footer>
        
        
        
        <div class="text-center p-3" style="background-color: rgba(1, 33, 101, 0.5)">
        
          <a class="text-light" href="http://192.168.5.42/boats/newboatbooking.php">Peterborough Sailability</a>
        
        </div>
        
        </footer>
        
        <script>
        
          $(document).ready(function(){
        
            $('.sidenav').sidenav();
        
          });
        
        
        
            </script> 
        
        
        
        
        </body>
        
        </html> 
        
       