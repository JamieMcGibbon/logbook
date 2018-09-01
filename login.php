<?php
    if(isset($_POST['submit'])){

        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        if($email != null && $password != null){
            
        //Check that user-entered email and PW match what's in the DB

        //header('./index.php');

        }
        else{

        }

    }
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Logbook - Login</title>

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
        <div class="col-lg-4 mt-3">

            <h2>Login</h2>

            <form action="#" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="email@example.com" name="email" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" required>
                </div>

                <input type="submit" value="Login" class="btn btn-primary" name="submit">
            </form>

        </div>
    </div>
</div>

<?php
    }
?>
    
</body>
</html>