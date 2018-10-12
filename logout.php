<?php

//Start session
session_start();

//Log the user out (destroy session)
session_destroy();

// //Display logged out message to user
// echo "You have been logged out! Happy flying!";

//Redirect back to login page
header('Location: ./login.php');

?>