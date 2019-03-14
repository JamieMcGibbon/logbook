<?php

session_start(); 

//Check that a user is logged in (session variable is set)
if(!isset($_SESSION['user_id'])){

  //If user isn't logged in, redirect them back to the site homepage
  header('Location: ../index.php');

}

//Get the ID of the logbook entry that the user would like to edit and store in $entryId variable
$entryId = $_GET['id'];

//Session variable (user_id)
$userId = $_SESSION['user_id'];

//Include MySQL connection file
include '../includes/connection.php';

//Check that the user ID of the user that's currently logged in matches the user ID associated with the logbook entry being edited

//Query the "entries" table of the "logbook" database for the entry taken from the "id" parameter of the URL
$sql = "SELECT * FROM entries WHERE entry_id = '$entryId'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

  //Check that the entry being edited belongs to the user trying to edit it (compare user ID stored in session to that
  //associated with the entry in the database. If they don't match, redirect the user back to the logbook dashboard.
  if($userId != $row['user_id']){
    header('Location: ./index.php');
  }

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

</head>
<body>

  <!-- Navigation Bar -->
  <?php include '../includes/navbar_logged_in.php' ?>
  <!-- / Navigation Bar -->

  <div class="container">

    <!-- Row 1 (Outside) -->
    <div class="row justify-content-lg-center">
        <div class="col-lg-6">
            
            <div class="page_heading">
                <h3>Edit a Flight</h3>
            </div>


            <form action="" method="POST">
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" class="form-control" name="date" required>
                </div>

                <div class="form-group">
                    <label>Aircraft:</label>
                    <input type="text" class="form-control" name="aircraft" placeholder="ex. Piper PA-28-161" required>
                </div>
                <div class="form-group">
                    <label>To/From:</label>
                    <input type="text" class="form-control" name="toFrom" placeholder="ex. KBOS to KBOS" required>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Hours (Day):</label>
                            <input type="number" class="form-control" name="hours_day">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Hours (Night):</label>
                            <input type="number" class="form-control" name="hours_night">
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Landings (Day):</label>
                            <input type="number" class="form-control" name="landings_day">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Landings (Night):</label>
                            <input type="number" class="form-control" name="landings_night">
                        </div>
                    </div>
                </div>
                <!-- /Row 2 -->

                <!-- Row 3  -->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Instrument:</label>
                            <input type="number" class="form-control" name="hours_instrument">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Simulated Instrument:</label>
                            <input type="number" class="form-control" name="hours_sim_instrument">
                        </div>
                    </div>
                </div>
                <!-- /Row 3 -->


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type Logged:</label>
                    <select class="form-control" id="type" name="timeType">
                        <option>PIC</option>
                        <option>SIC</option>
                        <option>Dual</option>
                        <option>Instructor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Notes:</label>
                    <input type="text" class="form-control" name="notes">
                </div>

                <input type="submit" class="btn btn-primary form_margin" name="submit" value="Edit Flight">

            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php'; ?>
<!-- /Footer -->



