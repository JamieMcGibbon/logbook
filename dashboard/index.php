<?php 

session_start(); 

//Check that a user is logged in (session variable is set)
if(!isset($_SESSION['user_id'])){

  //If user isn't logged in, redirect them back to the site homepage
  header('Location: ../index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flight Logbook - Dashboard</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">

    <!-- Bootstrap Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>

  <!-- Navigation Bar -->
  <?php include '../includes/navbar_logged_in.php' ?>
  <!-- / Navigation Bar -->

  <br />

    <!-- Main Container -->
    <div class="container">

        <div class="row">
        <div class="col-lg-12">

        <h2>My Logbook</h2>
        <br />

        <a href="./add.php" role="button" class="btn btn-success"><i class="fas fa-plane"></i> Add Entry</a>
        <a href="./progress/index.php" role="button" class="btn btn-primary"><i class="fas fa-tasks"></i> View Progress</a>
        <br />
        <br />

        <?php

          //Include MySQL connection file
          include '../includes/connection.php';

          //Store user ID in variable to make MySQL queries cleaner
          $user_id = $_SESSION['user_id'];

          //Query the "entries" table of the "logbook" database for user entries
          $sql = "SELECT * FROM entries WHERE user_id = '$user_id'";
          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){

            //User has logbook entries in the "entries" table of the DB
            while($row = mysqli_fetch_assoc($result)) {

              echo "<b>Total Flights:</b> ".mysqli_num_rows($result); //" | <b>Total Hours:</b> 30.5"; (ADD IN LATER)
              echo "<br /> <br />";

              ?> <!-- End PHP to display start of HTML table -->

              <div class="table-responsive">
              <table class="table table-responsive table_test">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Aircraft</th>
                    <th scope="col">Hours</th>
                    <th scope="col">Type</th>
                    <th scope="col">Instrument</th>
                    <th scope="col">Notes</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>

                <?php //Start PHP again
                  foreach($result as $row){
                ?>
                  <tr>
                    <th scope="row"><a href="#"><?php echo $row['date']; ?></a></th>
                    <td><?php echo $row['aircraft']; ?></td>
                    <td><?php echo $row['hours_day']; ?></td>
                    <td><?php echo $row['time_type']; ?></td>
                    <td><center><?php echo $row['hours_instrument']; ?></center></td>
                    <td><?php echo $row['notes']; ?></td>
                    <td><a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-pen-square"></i> Edit</a></td>
                  </tr>
                <?php
                  }
                ?>
                </tbody>
                </table>
                <center><button type="button" class="btn btn-primary">Load More</button></center>
            <?php
              

            }

          }
          else{ //User has no entries
            ?> <!-- End PHP and display empty table -->

            <b>Total Flights:</b> 0 | <b>Total Hours:</b> 0
            <br /> <br />

            <div class="table-responsive">
              <table class="table table-responsive table_test">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Aircraft</th>
                    <th scope="col">Hours</th>
                    <th scope="col">Type</th>
                    <th scope="col">Instrument</th>
                    <th scope="col">Notes</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                </table>

            <?php //Start PHP again
          }

        ?>


    </div>
  </div>
</div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php'; ?>
<!-- /Footer -->

<!-- Edit Flight Modal -->
<?php include '../includes/edit_flight_modal.php'; ?>
<!-- /Edit Flight Modal -->

</body>
</html>