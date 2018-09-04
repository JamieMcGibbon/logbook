<?php

    //Include PHP MySQL DB connection file
    include './includes/connection.php';

    //Error message variable
    $errorMessage = "";

    //Check that registration form has been submitted
    if(isset($_POST['submit'])){

        $firstName = htmlentities($_POST['firstName']);
        $lastName = htmlentities($_POST['lastName']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);    
        $confirm_password = htmlentities($_POST['confirmPassword']);

        //Check that the user has filled in all fields
        if(($firstName != null) && ($lastName != null) && ($email != null) && ($password != null) && ($confirm_password != null)){

            //Check that user data doesn't already exist in database
            $sql = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                //User account exists in "users" table; set $errorMessage to let user know that the email
                //address they entered is already in use
                $errorMessage = "The email address you entered is already in use. If you already have an account, please <a href='./login.php'>login here</a>.";

                //Show registration form with error message
                include './includes/registration_form.php';

            }
            else{

                //User doesn't yet exist in DB. Enter their details into the "users" table of the "logbook" DB
                
                //Send the user to the logged in dashboard
                header('Location: ./dashboard/index.php');

            }

        }
        else{

            //Set $errorMessage to let user know to fill in all form fields
            $errorMessage = "Please check that all form fields have been filled out and try again!";

            //Show registration form
            include './includes/registration_form.php';  

        }

    }
    else{
        //Show registration form
        include './includes/registration_form.php';
    }
?>