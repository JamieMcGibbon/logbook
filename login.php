<?php

    //Include PHP MySQL DB connection file
    include './includes/connection.php';

    $errorMessage = "";

    //Check that form has been submitted
    if(isset($_POST['submit'])){

        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        $sql = "SELECT id, email, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            //User account exists in "users" table
            while($row = mysqli_fetch_assoc($result)) {
                
                if(($row['email'] == $email) && ($row['password'] == $password)){
                    header('Location: ./dashboard/index.php');
                }

            }
        } else {
            $errorMessage = "Please check your username and password and try again.";
            include './includes/login_form.php';
        }

        mysqli_close($conn);

    }
    else{

        include './includes/login_form.php';
    }
?>

