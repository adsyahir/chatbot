<!-- Created By CodingNepal -->
<?php
// connecting to database
include("includes/db.php");

// getting user message through ajax
// $getMesg = mysqli_real_escape_string($con, $_POST['text']);
$id = $_POST['text'];
//checking user query to database query
$check_data = "SELECT answer FROM chatbox WHERE id=$id";
$run_query = mysqli_query($con, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if (mysqli_num_rows($run_query) > 0) {
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['answer'];
    // echo $replay;


    $lol = "SELECT * FROM chatbox";
    $xcxcx = mysqli_query($con, $lol);
    $fetch_data = mysqli_fetch_all($xcxcx);


    echo json_encode([$replay, $fetch_data]);
} else {
    echo "Sorry can't be able to understand you!";
}
