<?php

    //Check if user is already logged in, if yes then redirect back to user dashboard
    session_start();

    if(isset($_SESSION['user_id'])){
        header('Location: ../dashboard/index.php');
    }  

    //Include PHP MySQL DB connection file
    include '../includes/connection.php';

    //Error message variable
    $errorMessage = "";

    //Check that registration form has been submitted
    if(isset($_POST['submit'])){

        $firstName = htmlentities($_POST['firstName']);
        $lastName = htmlentities($_POST['lastName']);
        $email = htmlentities($_POST['email']);
        $password = sha1(htmlentities($_POST['password']));    
        $confirm_password = sha1(htmlentities($_POST['confirmPassword']));
        $recovery_question_1 = mysqli_real_escape_string($conn, $_POST['passwordRecoveryQuestion1']);
        $recovery_answer_1 = sha1(htmlentities($_POST['passwordRecovery1']));
        $recovery_question_2 = mysqli_real_escape_string($conn, $_POST['passwordRecoveryQuestion2']);
        $recovery_answer_2 = sha1(htmlentities($_POST['passwordRecovery2']));

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
                include '../includes/registration_form.php';

            }
            else{

                //Check that $password and $confirm_password match
                if($password == $confirm_password){

                    //User doesn't yet exist in DB. Enter their details into the "users" table of the "logbook" DB
                    $sql = "INSERT INTO users (firstName, lastName, email, password, passwordRecoveryQuestion1, passwordRecoveryAnswer1, passwordRecoveryQuestion2, passwordRecoveryAnswer2) VALUES ('$firstName', '$lastName', '$email', '$password', '$recovery_question_1', '$recovery_answer_1', '$recovery_question_2', '$recovery_answer_2')";
 
                    if (mysqli_query($conn, $sql)) {
                        $errorMessage = "";
                    } else {
                        $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
                        include '../includes/registration_form.php';
                    }
                    
                    mysqli_close($conn);
                    //Create and set session variable (TO-DO) to log user in                  

                    //Send the user to the log in page
                    header('Location: ../login.php');

                }
                else{
                    
                    //Show error message and registration form
                    $errorMessage = "Please ensure that your passwords match and try again.";
                    include '../includes/registration_form.php';
                }



            }

        }
        else{

            //Set $errorMessage to let user know to fill in all form fields
            $errorMessage = "Please check that all form fields have been filled out and try again!";

            //Show registration form
            include '../includes/registration_form.php';  

        }

    }
    else{
        //Show registration form
        include '../includes/registration_form.php';
    }
?>