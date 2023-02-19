 
<?php
// connecting to database
include("includes/db.php");


$sql = "SELECT id, question FROM chatbox";
$result = $con->query($sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Convert the data to JSON format
$json_data = json_encode($data);
echo $json_data;
?>
