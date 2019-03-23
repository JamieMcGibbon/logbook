<?php

    //Start session
    session_start();

    //Check that session is set (user is logged in)
    if(!isset($_SESSION['user_id'])){
        header('Location: ../index.html');
    }
    else{

        //User is logged in. Get user ID from session variable
        $userId = $_SESSION['user_id'];

        //Get the ID of the entry that the user would like to delete (from URL parameter)
        $entryId = $_GET['id'];

        //Include PHP connection file
        include '../includes/connection.php';

        //Query database to see if user's session ID is the same as the user's ID in the database
        $sql = "SELECT * FROM entries WHERE entry_id = '$entryId'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            
            //Compare user ID stored in session against ID associated with DB entry
            if($userId == $row['user_id']){

                //Delete entry from 'entries' table of MySQL DB
                $sql = "DELETE FROM entries WHERE entry_id = '$entryId'";

                mysqli_query($conn, $sql);

                //Send user back to logbook dashboard
                header("Location: ./index.php");

            }
            else{
                //User trying to delete the entry is not the same user that created it. Send them back to logbook dashboard page.
                header("Location: ./index.php");
            }

        }



    }


?>