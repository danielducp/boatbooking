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
        <a class="nav-link" href="../boats/newbooking.php">Booking</a>
      </li>
     
    </ul>
  </div> 
</nav>
<br>


<form  action="loggingin.php" method="post" style ="max-width:30%; padding: 30px">
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="">
                            <br>

                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-login" value="Login">
                
            </div>         <?php
if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
echo "Wrong Username / Password";
}?> 

      <!--    <p>Forgotten? <a href="resetpassword.php">Reset password</a>.</p>-->

        </form>

    </div>  

</body>
</html>