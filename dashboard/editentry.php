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




