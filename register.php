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

            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="firstName">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="lastName">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@example.com">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="password">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="confirmPassword">
            </div>

            <input type="submit" value="Register" class="btn btn-primary" name="submit">

        </div>
    </div>
</div>
    
</body>
</html>