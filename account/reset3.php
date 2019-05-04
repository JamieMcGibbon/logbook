<?php 

session_start(); 

$message = "";
$db_answer_1 = "";
$db_answer_2 = "";
$recoveryAnswer1 = "";
$recoveryAnswer2 = "";

if(!isset($_POST['passwordRecoveryAnswer1']) || !isset($_POST['passwordRecoveryAnswer2'])){
    header("Location: ../index.php");
}
else{
    
    //Recovery email address has been provided and recoveyr questions have been answered
    //Check that the user has correctly answered the password recovery questions.
    
    //Include PHP MySQL DB connection file
    include '../includes/connection.php';

    $email_address = htmlentities($_POST['emailAddress']);
    $recoveryAnswer1 = sha1(htmlentities($_POST['passwordRecoveryAnswer1']));
    $recoveryAnswer2 = sha1(htmlentities($_POST['passwordRecoveryAnswer2']));

    //Query the DB to see if the user-answered password recovery questions were correctly answered
    $sql = "SELECT * FROM users WHERE email = '$email_address'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        //Account exists in "users" table with the user-entered recovery email address
        while($row = mysqli_fetch_assoc($result)) {
            
            //Check that the user's recovery question answers match the answers that are the DB for their account

            //DB recovery answers
            $db_answer_1 = $row['passwordRecoveryAnswer1'];
            $db_answer_2 = $row['passwordRecoveryAnswer2'];

            if(($recoveryAnswer1 == $db_answer_1) && ($recoveryAnswer2 == $db_answer_2)){

              //Show form for user to enter new password
              $message =

              '
              <form action="" method="POST">

                <div class="form-group">
                  <label for="passwordResetField">Enter new password:</label>
                  <input type="password" class="form-control" name="newPassword" required>
                </div>

                <div class="form-group">
                  <label for="passwordResetField">Confirm new password:</label>
                  <input type="password" class="form-control" name="newPasswordConfirmation" required>
                </div>

                <input type="hidden" id="emailAddress" name="emailAddress" value="">

                <input type="submit" value="Submit" class="btn btn-primary" name="submit">

              </form>
              ';
              

            }
            else{
              $message = "Please check that the answers to your recovery questions were correctly entered and try again.
                          <br /><br /><a href='./reset.php'>Click here to try again</a>.";
            }

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

            <?php echo $message; ?>

          </div>
      </div>

    </div>
    <!-- / Main Container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>