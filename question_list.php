 
<?php
// connecting to database
include("includes/db.php");


$lol = "SELECT * FROM chatbox";
$xcxcx = mysqli_query($con, $lol);
$fetch_data = mysqli_fetch_all($xcxcx);


echo json_encode($fetch_data[0]);
