<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Logbook - Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css" type="text/css">

</head>
<body>

<!-- Navbar -->
<?php include './includes/navbar_logged_out.php'; ?>
<!-- End Navbar -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-3">

            <h2>Register</h2>

            <p>In order to register for a free logbook account, please fill out the form below.

             <?php 
                if($errorMessage){
                    echo "<div class='alert alert-danger'>".$errorMessage."</div>"; 
                }
            ?>           


            <form action="#" method="POST">

                <!-- Name Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name:*</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="firstName" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name:*</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="lastName" required>
                        </div>
                    </div>
                </div>
                <!-- /Name Section -->

                <!-- Email Address -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address:*</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@example.com" name="email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <!-- /Email Address -->

                <!-- Password Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password:*</label>
                            <input type="password" class="form-control" aria-describedby="password" name="password" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password:*</label>
                            <input type="password" class="form-control" aria-describedby="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>
                </div>
                <!-- /Password Section -->
                
                <h4>Password Recovery Questions:</h4>
                

                <!-- Password Recovery Questions Section -->
                <div class="form-group">
                    <label for="passwordRecoveryQuestion1">Password Recovery Question #1:*</label>
                    <input type="text" class="form-control" aria-describedby="passwordRecoveryQuestion1" name="passwordRecoveryQuestion1" required>
                </div>

                <div class="form-group">
                    <label for="passwordRecoveryAnswer1">Answer:*</label>
                    <input type="text" class="form-control" aria-describedby="passwordRecoveryQuestion1" name="passwordRecovery1" required>
                </div>

                <div class="form-group">
                    <label for="passwordRecoveryQuestion2">Password Recovery Question #2:*</label>
                    <input type="text" class="form-control" aria-describedby="passwordRecoveryQuestion2" name="passwordRecoveryQuestion2" required>
                </div>

                <div class="form-group">
                    <label for="passwordRecoveryAnswer2">Answer:*</label>
                    <input type="text" class="form-control" aria-describedby="epasswordRecoveryQuestion2" name="passwordRecovery2" required>
                </div>
                <!-- /Password Recovery Questions Section -->
                
                <!-- Submit Button -->
                <input type="submit" value="Register" class="btn btn-primary" name="submit">
                <!-- /Submit Button -->
                
                <br /><br />
                Already have an account? <a href="./login.php">Click here</a> to login.
            </form>
            
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>