<?php
//fetch.php
$connect = mysqli_connect("localhost", "danielst_daniel", "Otbcncfc1", "danielst_sailability");
$columns = array('BookingNumber', 'UserID', 'BookingSailingDate');

$chosenday = $_POST['ChosenDay'];
$chosenboat = $_POST['BoatName'];
$sqlQuery = $pdo->query("SELECT * FROM Boat WHERE BoatName = '$chosenboat'");
$row8=$sqlQuery->fetch();
$chosenboatid = $row8['BoatID'];  

$query = "SELECT * FROM BoatTimes WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'BookingSailingDate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (BookingNumber LIKE "%'.$_POST["search"]["value"].'%" 
  OR UserID LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY BookingNumber DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["BookingNumber"];
 $sub_array[] = $row["UserID"];

 $sub_array[] = $row["BookingSailingDate"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM Booking";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
