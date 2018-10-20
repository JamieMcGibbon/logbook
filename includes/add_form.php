<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flight Logbook - Add Flight</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">

</head>
<body>

  <!-- Navigation Bar -->
    <?php include '../includes/navbar_logged_in.php'; ?>
  <!-- / Navigation Bar -->


    <div class="container">

    <?php echo $error_message; ?>

        <!-- Row 1 (Outside) -->
        <div class="row justify-content-lg-center">
            <div class="col-lg-6">
                
                <div class="page_heading">
                    <h3>Add a Flight</h3>
                </div>


                <form action="" method="POST">
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="form-group">
                        <label>Aircraft:</label>
                        <input type="text" class="form-control" name="aircraft" placeholder="ex. Piper PA-28-161" required>
                    </div>
                    <div class="form-group">
                        <label>To/From:</label>
                        <input type="text" class="form-control" name="toFrom" placeholder="ex. KBOS to KBOS" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Day:</label>
                                <input type="number" class="form-control" name="hours_day">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Night:</label>
                                <input type="number" class="form-control" name="hours_night">
                            </div>
                        </div>
                    </div>

                    <!-- Row 2  -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Instrument:</label>
                                <input type="number" class="form-control" name="hours_instrument">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Simulated Instrument:</label>
                                <input type="number" class="form-control" name="hours_sim_instrument">
                            </div>
                        </div>
                    </div>
                    <!-- /Row 2 -->


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type:</label>
                        <select class="form-control" id="type" name="timeType">
                            <option>PIC</option>
                            <option>SIC</option>
                            <option>Dual</option>
                            <option>Instructor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Notes:</label>
                        <input type="text" class="form-control" name="notes">
                    </div>

                    <input type="submit" class="btn btn-primary form_margin" name="submit" value="Add Flight">

                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>
    <!-- /Footer -->

</body>
</html>