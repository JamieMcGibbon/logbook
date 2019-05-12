<?php

session_start();

//Check that a user is logged in (session variable is set)
if(!isset($_SESSION['user_id'])){

    //If user isn't logged in, redirect them back to the site homepage
    header('Location: ../index.php');
  
}

//Check that the user has filled in the necessary fields. If not, display error message.
$error_message = null;

//Check that the "add" form has been submitted

if(isset($_POST['submit'])){

    //Get user ID (from session variable)
    $user_id = $_SESSION['user_id'];

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
    if( is_int($hours_day)/*is_numeric($hours_day) && is_numeric($hours_night) && is_numeric($hours_instrument) && is_numeric($hours_sim_instrument) */){
        $error_message = "Please check that you have entered the hours as numeric values and try again.";
        include '../includes/add_form.php';
    }
    else{ //Insert data into the "entries" table of the DB

        //Include PHP MySQL DB connection file
        include '../includes/connection.php';

        //SQL statement to insert data into the "entries" table of the DB
        $sql = "INSERT INTO entries (user_id, date, aircraft, destination, hours_day, hours_night, landings_day, landings_night, hours_instrument, hours_sim_instrument, time_type, notes) 
                VALUES ('$user_id', '$date', '$aircraft', '$destination', '$hours_day', '$hours_night', '$landings_day', '$landings_night', '$hours_instrument',
                        '$hours_sim_instrument', '$time_type', '$notes')";

        //Insert the data into the "entries" table of the database
        if (mysqli_query($conn, $sql)) {
            $error_message = "Flight Successfully Added!";
            include '../includes/add_form.php';
        } else {
            $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
            include '../includes/add_form.php';
        }           
        
    }
}
else{ 
    //form was not submitted
    include '../includes/add_form.php';
}



?>