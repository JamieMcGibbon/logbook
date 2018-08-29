<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flight Logbook - My Profile</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">

</head>
<body>

  <?php include '../includes/navbar_logged_out.php'; ?>

  <div class="container page_heading">
      <div class="row">

          <div class="col text-center">
            <h1>Jamie McGibbon</h1>
            <br />
            <button type="button" class="btn btn-primary btn-sm">Student Pilot</button> <button type="button" class="btn btn-primary btn-sm">Private Pilot</button> <button type="button" class="btn btn-primary btn-sm">Commercial Pilot</button> <button type="button" class="btn btn-primary btn-sm">CFI</button> <button type="button" class="btn btn-primary btn-sm">CFII</button>
            <br />
            <br />
            <h2>Latest Flights</h2>
            <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Aircraft</th>
                <th scope="col">To/From</th>
                <th scope="col">Hours</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <th scope="row"><a href="#">7/19/2018</a></th>
                <td>PA 28-161</td>
                <td>KBOS / KBOS</td>
                <td>2.0</td>
              </tr>
                <th scope="row"><a href="#">7/19/2018</a></th>
                <td>PA 28-161</td>
                <td>KBOS / KBOS</td>
                <td>2.0</td>
              </tr>
                <th scope="row"><a href="#">7/19/2018</a></th>
                <td>PA 28-161</td>
                <td>KBOS / KBOS</td>
                <td>2.0</td>
              </tr>
                <th scope="row"><a href="#">7/19/2018</a></th>
                <td>PA 28-161</td>
                <td>KBOS / KBOS</td>
                <td>2.0</td>
              </tr>
                <th scope="row"><a href="#">7/19/2018</a></th>
                <td>PA 28-161</td>
                <td>KBOS / KBOS</td>
                <td>2.0</td>
              </tr>

            </tbody>
        </table>

        <div class="social_media">
          <h3>Follow Me:</h3>
          <button class="btn btn-primary">Twitter</button>
          <button class="btn btn-primary">Facebook</button>
          <button class="btn btn-primary">Instagram</button>
        </div>  
           
      </div>

  </div>

</body>
</html>