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



<script>

function myFunction() {

  var input, filter, table, tr, td, i, txtValue;

  input = document.getElementById("myInput");

  filter = input.value.toUpperCase();

  table = document.getElementById("myTable1");

  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[0];

    if (td) {

      txtValue = td.textContent || td.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

        tr[i].style.display = "";

      } else {

        tr[i].style.display = "none";

      }

    }       

  }

}

</script>

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

<script>

    

</script>

<div class="searcharea">





<input type="text" class="searchfield" id="myInput" onkeyup="myFunction()" placeholder="Search for a date" title="Type in a date"/></div>



    <h1 style="text-align: center;">Boat availability</h1>

     <table id="myTable1" style=" border: 3px solid black;" class="table table-bordered">













    <br>

     

<?php

require 'config.php';





$chosenday = $_POST['ChosenDay'];

$chosenboat = $_POST['BoatName'];

$sqlQuery = $pdo->query("SELECT * FROM Boat WHERE BoatName = '$chosenboat'");

$row8=$sqlQuery->fetch();

$chosenboatid = $row8['BoatID'];  







  $stmt = $pdo->prepare("SELECT * FROM SeasonDates");

        $stmt->execute();

        $dates = $stmt->fetch();



        $seasonstartdate = $dates['SeasonStartDate'];

        $seasonenddate = $dates['SeasonEndDate'];



        $date_from = $seasonstartdate;

        $date_from = strtotime($date_from);



        $date_to = $seasonenddate;

        $date_to = strtotime($date_to);



        for ($i = $date_from; $i <= $date_to; $i += 86400) {

            $date = date("d-m-Y", $i);

            $unixTimestamp = strtotime($date);



            $dayOfWeek = date("l", $unixTimestamp);

            $chosendate="";

         

        $newDate = date("l d F Y", strtotime($date));  

        $newDate;

         

            if ($dayOfWeek == $chosenday) {



                ?>

               <tr> 

             <td id="date" name="date" >    <?php echo $newDate?></td>













   

 

                    

                            <?php





$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM BoatTimes INNER JOIN `Time` ON BoatTimes.TimeID = `Time`.TimeID where BoatID = '$chosenboatid'");

$stmt->execute();

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);







 "<br>";

?>



 </div>



  



      <td>

                  <table id="myTable2" style=" border: 2px solid black" class="table table-bordered">

                       <tr class="header">

    <th style="width:50%;">Time</th>

    <th style="width:50%;">Total Left</th>

  </tr>

        <?php foreach ($recently_added_products as $product): ?>        

   



 

   



<?php  



    

          

          $chosentime = $product['TimeStart']; 



          $startdateandtimetogether = "$date $chosentime";

          $newstarttime = strtotime($startdateandtimetogether); 

          $StartTime =  date('Y-m-d H:i:s', $newstarttime); 



          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM AvailableBoat WHERE BoatID = '$chosenboatid'");

          $row3=$sqlQuery->fetch();

          $totalnumberofboats = $row3['total'];

          

          





          $sqlQuery = $pdo->query("SELECT count(*) as total  FROM BookedBoats WHERE StartTime = '$StartTime' and BoatID = '$chosenboatid'");

          $row6=$sqlQuery->fetch();

          $totalamountofbookings = $row6['total'];

          

             



?>





<?php

          $remainingboats = $totalnumberofboats - $totalamountofbookings;



          

       





          $chosentimewithoutseconds=substr($chosentime,0,-3);

          

         ?> 

         <tr>

     <td>  <div hidden> <?php echo $newDate?></div><?php echo $chosentimewithoutseconds;?></td>

<?php

?>

     <td> <?php echo   $remainingboats." boats remaining "; ?> </td></tr>

    

          </div>    </div>    </div>    </div>    </div>

     

          </div>

         





        

                   

          <?php endforeach; ?>

</table>

</td>

                        </div>

                    </div>









                <?php

            }

        }

        ?>

</tr> 

    </div>

</div>









</div>

</div>

</div></div></div>







<?php



?>

</table>

</body>

</html>

