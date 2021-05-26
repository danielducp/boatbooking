<?php

session_start();




$pdo = new PDO("mysql:host=MYSQL5045.site4now.net;dbname=db_a74811_sail", "a74811_sail", "Otbcncfc1");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $_POST['email'];
    $password = $_POST['password'];


echo "You tried to login with ".$email. "and " .$password . "<br>";

//echo $email;
// Get the 4 most recently added products
// Create connection


$stmt = $pdo->prepare("SELECT  email, password, UserTypeID, UserID FROM User WHERE email = :email ");
$stmt->bindParam(":email", $email);


$stmt->execute();

//$stmt->debugDumpParams();

//$stmt->store_result();

//$stmt->bind_result($mail, $pw);
 if($stmt->rowCount() == 1){
    echo "I found 1 person with that email";
    
    $row = $stmt->fetch();
        $pw=$row['password'];
         $UserTypeID = $row['UserTypeID'];

    echo $pw;

     $password;
    if(password_verify($password, $pw)){
        echo "Password matches";
        echo "Login success <br>";
        $_SESSION['email'] = $email;
$_SESSION['user_logged_in'] = true;
 echo $UserTypeID;
 
    if ($UserTypeID == 3) {
        $_SESSION["UserTypeID"] = $UserTypeID;

        header("location: ../admin/adminpage.php");

    } else if ($UserTypeID == 2) {
        $_SESSION["UserTypeID"] = $UserTypeID;

        header("location: ../index.php");

    } else if ($UserTypeID == 1) {
        $_SESSION["UserTypeID"] = $UserTypeID;

        header("location: ../index.php");


    } else if ($UserTypeID == 4) {
        $_SESSION["UserTypeID"] = $UserTypeID;

        header("location: ../admin/adminpage.php");

    }
                 exit;

 
    }
    
    else
    {
        $_SESSION = [];
        session_destroy();
        echo "Username or Password is incorrect<br>";
        header("location:newlogin.php?msg=failed");

    }
    }
    else {
               $_SESSION = [];
        session_destroy();
         header("location:newlogin.php?msg=failed");
 
    }


echo "Login failed<br>";

print_r($_SESSION);
