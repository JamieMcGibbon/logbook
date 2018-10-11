<?php

//Check that the user has filled in the necessary fields. If not, display error message.
$error_message = null;

//Check that the "add" form has been submitted

if(isset($_POST['submit'])){

    //Get user-submitted form data
    $date = htmlentities($_POST['date']);
    $aircraft = htmlentities($_POST['aircraft']);
    $destination = htmlentities($_POST['toFrom']);;
    $hours_day = htmlentities($_POST['hours_day']);
    $hours_night = htmlentities($_POST['hours_night']);
    $hours_instrument = htmlentities($_POST['hours_instrument']);
    $hours_sim_instrument = htmlentities($_POST['hours_sim_instrument']);
    $time_type = htmlentities($_POST['timeType']);
    $notes = htmlentities($_POST['notes']);
    $submit = htmlentities($_POST['submit']);

    //Check that necessary form fields were filled out with the correct values.
    if(is_numeric($hours_day) && is_numeric($hours_night) && is_numeric($hours_instrument) && is_numeric($hours_sim_instrument)){
        $error_message = "Please check that you have entered the hours as numeric values and try again.";
        include '../includes/add_form.php';
    }
    else{ //Check to see if this "else" statement is needed.
        include '../includes/add_form.php';
    }
}
else{ 
    //form was not submitted
    include '../includes/add_form.php';
}



?>