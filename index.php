<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intitial-scale=1">

    <title>Flight Logbook</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css" type="text/css">
    
  </head>

<body>

  <!-- Navigation Bar -->
    <?php 
    
    //Check to see if user is logged in
    if(!isset($_SESSION['user_id'])){

      //If no, display "logged out" nav bar
      include './includes/navbar_logged_out.php';

    }
    else{

      //If yes, display "logged in" nav bar (homepage version)
      include './includes/homepage_navbar_logged-in.php';
      
    }
    
    ?>

  <!-- / Navigation Bar -->

  <!-- <img src="http://via.placeholder.com/1200x300" class="img-responsive"> -->
  <img src="./includes/homepage_image.jpg" class="img-fluid home_image">

  <div class="container home_main_container">

    <div class="row home-text">
      <div class="col-md-12">
        <br />
        <p class="lead text-center">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam erat, dapibus non luctus et, porta ac tellus. Aliquam interdum viverra dolor in sodales. Sed quis pharetra urna. Fusce ut est quis lorem auctor porttitor eget sed diam. Maecenas feugiat sapien bibendum diam luctus, at interdum ante tempor. Fusce vitae suscipit dui. Aenean ac lacus vitae sem cursus posuere in nec mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam et purus et tellus tempus posuere nec ut purus.
      </div>
    </div>

    <div class="row home-bottom">
      <div class="col-md-4">
        <h1 class="text-center"><i class="fas fa-plane"></i></h1>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam erat, dapibus non luctus et, porta ac tellus. Aliquam interdum viverra dolor in sodales.</p>
      </div>

      <div class="col-md-4">
        <h1 class="text-center"><i class="fas fa-tasks"></i></h1>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam erat, dapibus non luctus et, porta ac tellus. Aliquam interdum viverra dolor in sodales.</p>
      </div>

      <div class="col-md-4">
        <h1 class="text-center"><i class="fas fa-laptop"></i></h1>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam erat, dapibus non luctus et, porta ac tellus. Aliquam interdum viverra dolor in sodales.</p>
      </div>
    </div>

  </div>

  <!-- Figure out why styles can't be applied to this div -->
  <div style="height: 30px;"></div>

  <?php include './includes/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
