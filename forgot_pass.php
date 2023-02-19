<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
include("chat_test.php");

?>

<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Forgot</span> password
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->

    <div class="col-md-12"><!--- col-md-12 Starts -->

      <ul class="breadcrumb"><!-- breadcrumb Starts -->

        <li>
          <a href="index.php">Home</a>
        </li>

        <li>Register</li>

      </ul><!-- breadcrumb Ends -->



    </div><!--- col-md-12 Ends -->


    <div class="col-md-12"><!-- col-md-12 Starts -->

      <div class="box"><!-- box Starts -->

        <div class="box-header"><!-- box-header Starts -->

          <center>

            <h3> Enter Your Email Below , We Will Send You , Your Password </h3>

          </center>

        </div><!-- box-header Ends -->

        <div align="center"><!-- center div Starts -->

          <form action="" method="post"><!-- form Starts -->

            <input type="text" class="form-control" name="c_email" placeholder="Enter Your Email">

            <br>

            <input type="submit" name="forgot_pass" class="btn btn-primary" value="Send My Password">

          </form><!-- form Ends -->

        </div><!-- center div Ends -->

      </div><!-- box Ends -->

    </div><!-- col-md-12 Ends -->


  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['forgot_pass'])) {

  $mail =  new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = ''; //insert your email
  $mail->Password = ''; //see this video to find password https://www.youtube.com/watch?v=9tD8lA9foxw
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom(''); //insert your email

  $mail->addAddress($_POST['c_email']);


  $c_email = $_POST['c_email'];

  $sel_c = "select * from customers where customer_email='$c_email'";

  $run_c = mysqli_query($con, $sel_c);

  $count_c = mysqli_num_rows($run_c);

  $row_c = mysqli_fetch_array($run_c);

  $c_name = $row_c['customer_name'];

  $c_pass = $row_c['customer_pass'];

  if ($count_c == 0) {

    echo "<script> alert('Sorry, We do not have your email') </script>";

    exit();
  } else {

    $message = "

<h1 align='center'> Your Password Has Been Sent To You </h1>

<h2 align='center'> Dear $c_name </h2>

<h3 align='center'>

Your Password is : <span> <b>$c_pass</b> </span>

</h3>

<h3 align='center'>

<a href='localhost/ecom_store/checkout.php'>

Click Here To Login Your Account

</a>

</h3>

";
    $subject = "Your Password";

    // $headers = "From: $from\r\n";

    // $headers .= "Content-type: text/html\r\n";

    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $message;

    $mail->send();

    // if( $retval == true ) {
    //   die( "Message sent successfully...");
    // }else {
    //   die( "Message could not be sent...");
    // }
    // echo "<script> alert('Your Password has been sent to you, check your inbox ') </script>";

    // echo "<script>window.open('checkout.php','_self')</script>";

  }
}

?>