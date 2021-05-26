<?php
    $servername='192.168.5.42';
    $username='root';
    $password='Password1?';
    $dbname = "sailability";
    $port="3307"
    $conn=mysqli_connect($servername,$username,$password,"$dbname", $port);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>