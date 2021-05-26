<?


require '../config.php';
session_start();
$email = $_SESSION['email'];
echo $email;
$message = "This is our test message";
   
   // Send
    mail($email, 'Test subject', $message);

    ?>