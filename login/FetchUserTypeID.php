<?php
require '../config.php';
$output='';
$UserTypeName=$_POST['UserTypeName'];
$sqlQuery=$pdo -> prepare('SELECT DISTINCT UserTypeID FROM store WHERE UserTypeName=? ');
$sqlQuery ->execute([$UserTypeName]);
while($row=$sqlQuery->fetch())
{
    $output .= '<option value="'.$row["UserTypeID"].'">'.$row["UserTypeID"].'</option>';
}

echo $output;


?>