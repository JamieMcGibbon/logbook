<?php 

session_start(); 

if(!isset($_POST['recoveryEmail'])){
    header("Location: ../index.php");
}
else{
    
    //Recovery email address is set - check that the email address exists in the "users" table of the DB
    
    //Include PHP MySQL DB connection file
    include '../includes/connection.php';

    //Store user's recovery email address in the "$email_address" variable
    $email_address = $_POST['recoveryEmail'];

    //Query the DB to see if an account with the user-entered recovery email address exists
    $sql = "SELECT * FROM users WHERE email = '$email_address'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        //Account exists in "users" table with the user-entered recovery email address
        while($row = mysqli_fetch_assoc($result)) {
            
            //Display user's recovery questions and a form to submit the answers.
            //Form will have to submit to another recovery page that will enable the user to
            //reset their password.

            $recovery_question_1 = $row['passwordRecoveryQuestion1'];
            $recovery_question_2 = $row['passwordRecoveryQuestion2'];

        }
    } else {

        
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Flight Logbook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
          </ul>

          <!-- Right Side of Navbar -->
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../register.php">Register</a>
            </li>
            <li>
              <a class="nav-link" href="../login.php">Login</a>
            </li>
          </ul>
          <!-- /Right Side of Navbar -->

        </div>
      </nav>
      <!-- / Navigation Bar -->

  <br />

    <!-- Main Container -->
    <div class="container">

      <div class="row justify-content-center">
          <div class="col-lg-4 mt-3">

            <h2>Reset Your Password</h2>
            <p>In order to reset your account password, please answer your recovery questions below.</p>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="passwordRecoveryQuestion1"><?php echo $recovery_question_1; ?></label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="passwordRecoveryQuestion2"><?php echo $recovery_question_2; ?></label>
                    <input type="text" class="form-control" name="email" required>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary" name="submit">

            </form>
            

          </div>
      </div>

    </div>
    <!-- / Main Container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>