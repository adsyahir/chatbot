<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

    <!-- Main -->
    <div class="wrapper">
            <h1>Jersey Collection<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
   

      <div class="page-footer__subline">
        <div class="container clearfix">

          <div class="copyright">
            &copy; <?php echo date("Y");?> Beenutclo&trade;
          </div>

          <div class="developer">
            Developed by Izat Shah
          </div>

          <div class="designby">
            Design by Izat Shah
          </div>

        </div>
      </div>
    </footer>
</body>

</html>
