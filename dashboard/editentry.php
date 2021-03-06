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

//Error message variable
$error_message = "";

//Code to process the edited logbook entry
if(isset($_POST['submit'])){

    //Get user-submitted form data
    $date = htmlentities($_POST['date']);
    $aircraft = htmlentities($_POST['aircraft']);
    $destination = htmlentities($_POST['toFrom']);;
    $hours_day = htmlentities($_POST['hours_day']);
    $hours_night = htmlentities($_POST['hours_night']);
    $landings_day = htmlentities($_POST['landings_day']);
    $landings_night = htmlentities($_POST['landings_night']);
    $hours_instrument = htmlentities($_POST['hours_instrument']);
    $hours_sim_instrument = htmlentities($_POST['hours_sim_instrument']);
    $time_type = htmlentities($_POST['timeType']);
    $notes = htmlentities($_POST['notes']);
    $submit = htmlentities($_POST['submit']);

    //Check that necessary form fields were filled out with the correct values. (NEEDS EDITING/REFACTORING)
    if(is_int($hours_day)/*is_numeric($hours_day) && is_numeric($hours_night) && is_numeric($hours_instrument) && is_numeric($hours_sim_instrument) */){
        $error_message = "Please check that you have entered the hours as numeric values and try again.";
    }
    else{ 

        //Insert data into the "entries" table of the DB

        //SQL statement to insert data into the "entries" table of the DB
        $sql = "UPDATE entries SET user_id='$userId', date='$date', aircraft='$aircraft', destination='$destination', hours_day='$hours_day', hours_night='$hours_night', hours_instrument='$hours_instrument', hours_sim_instrument='$hours_sim_instrument', time_type='$time_type', notes='$notes' 
                WHERE entry_id='$entryId'";

        //Update the entry data in the "entries" table of the database
        if (mysqli_query($conn, $sql)) {
            $error_message = "Flight Successfully Added!";
        } else {
            $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }           

    }
    
}

//Check that the user ID of the user that's currently logged in matches the user ID associated with the logbook entry being edited

//Query the "entries" table of the "logbook" database for the entry taken from the "id" parameter of the URL
$sql = "SELECT * FROM entries WHERE entry_id = '$entryId'";
$result = mysqli_query($conn, $sql);

$date = $aircraft = $hours_day = $hours_night = $time_type = $landings_day = $landings_night = $sim_instrument =
$instrument = $entry_id = "";


while($row = mysqli_fetch_assoc($result)){

  //Check that the entry being edited belongs to the user trying to edit it (compare user ID stored in session to that
  //associated with the entry in the database. If they don't match, redirect the user back to the logbook dashboard.
  if($userId != $row['user_id']){
    header('Location: ./index.php');
  }

    $date = date('Y-m-d' ,strtotime($row['date'])); 
    $aircraft = $row['aircraft'];
    $destination = $row['destination'];
    $hours_day = $row['hours_day']; 
    $hours_night = $row['hours_night']; 
    $time_type = $row['time_type']; 
    $landings_day = $row['landings_day']; 
    $landings_night = $row['landings_night']; 
    $sim_instrument = $row['hours_sim_instrument']; 
    $instrument = $row['hours_instrument']; 
    $notes = $row['notes'];
    $entry_id = $row['entry_id'];

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

  <?php if($error_message != ""){ echo $error_message; } ?>

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
                    <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" required>
                </div>

                <div class="form-group">
                    <label>Aircraft:</label>
                    <input type="text" class="form-control" name="aircraft" value="<?php echo $aircraft; ?>" required>
                </div>
                <div class="form-group">
                    <label>To/From:</label>
                    <input type="text" class="form-control" name="toFrom" value="<?php echo $destination; ?>" required>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Hours (Day):</label>
                            <input type="number" step=".1" min="0" class="form-control" value="<?php echo $hours_day; ?>"  name="hours_day">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Hours (Night):</label>
                            <input type="number" step=".1" min="0" class="form-control" value="<?php echo $hours_night; ?>" name="hours_night">
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Landings (Day):</label>
                            <input type="number" class="form-control" value="<?php echo $landings_day; ?>" name="landings_day">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Landings (Night):</label>
                            <input type="number" class="form-control" value="<?php echo $landings_night; ?>" name="landings_night">
                        </div>
                    </div>
                </div>
                <!-- /Row 2 -->

                <!-- Row 3  -->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Instrument:</label>
                            <input type="number" step=".1" min="0" class="form-control" value="<?php echo $instrument; ?>" name="hours_instrument">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Simulated Instrument:</label>
                            <input type="number" step=".1" min="0" class="form-control" value="<?php echo $sim_instrument; ?>" name="hours_sim_instrument">
                        </div>
                    </div>
                </div>
                <!-- /Row 3 -->


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type Logged:</label>
                    <select class="form-control" id="type" name="timeType">
                        <option><?php echo $time_type; ?></option> <!-- Add logic so the option being returned from the DB isn't shown twice -->
                        <option>PIC</option>
                        <option>SIC</option>
                        <option>Dual</option>
                        <option>Instructor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Notes:</label>
                    <input type="text" class="form-control" value="<?php echo $notes; ?>" name="notes">
                </div>

                <input type="submit" class="btn btn-primary form_margin" name="submit" value="Edit Flight">

            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php'; ?>
<!-- /Footer -->



