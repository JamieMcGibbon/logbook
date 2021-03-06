<?php

    //Check if user is already logged in, if yes then redirect back to user dashboard
    session_start();

    if(isset($_SESSION['user_id'])){
        header('Location: ./dashboard/index.php');
    }

    //Include PHP MySQL DB connection file
    include './includes/connection.php';

    $errorMessage = "";

    //Check that form has been submitted
    if(isset($_POST['submit'])){

        $email = htmlentities($_POST['email']);
        $password = sha1(htmlentities($_POST['password']));

        $sql = "SELECT id, email, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            //User account exists in "users" table
            while($row = mysqli_fetch_assoc($result)) {
                
                if(($row['email'] == $email) && ($row['password'] == $password)){

                    //Send user to the logged in dashboard
                    header('Location: ./dashboard/index.php');

                    //Start PHP session
                    session_start();

                    //Set session variable to the user's ID
                    $_SESSION['user_id'] = $row['id'];
                }
                else{
                    $errorMessage = "Invalid credentials! Please check your username and password and try again.";
                    include './includes/login_form.php';
                }

            }
        } else {
            $errorMessage = "Invalid credentials! Please check your username and password and try again.";
            include './includes/login_form.php';
        }

        mysqli_close($conn);

    }
    else{

        include './includes/login_form.php';
    }
?>

