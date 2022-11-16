<?php
session_start();
$error = "";

if (isset($_POST['login'])) {
  echo "login 1111";
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $adminEmail = validate($_POST['adminEmail']);
  $password = validate($_POST['password']);
  if (empty($adminEmail) || empty($password)) {
    $error = "Username & Password shoud not be empty!";
  } else {
    // populate the db user & pass based on your db account
    $dbUser = 'root';
    $dbPass = '';
    // connect to database
    $db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');
    $password = md5($password);
    $query = "SELECT a.`adminFullname`, s.`schoolName`, a.`adminSchoolID`, a.`isSuperAdmin`, a.`position` FROM `admin` a LEFT JOIN `school` s
                  ON a.`adminSchoolID` = s.`schoolID` WHERE a.`adminEmail`='$adminEmail' AND a.`adminPassword`='$password';";

    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      if ($results) {
        while ($row = $results->fetch_row()) {
          // we pass these values: admin full name, school name, school id 
          //to be used to query db in other pages
          $adminFullname = $row[0];
          $schoolName = $row[1];
          $adminSchoolID = $row[2];
          $position = $row[4];
          // isSuperAdmin
          if ($row[3] == 1) {
            header("Location: registerSchool.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position");
          } else {
            // if school admin 
            header("Location: adminDashboard.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position");
          }
        }
      }
    } else {
      $error = "Wrong Username or Password!";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<title>VMS</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css" />
<meta Http-Equiv="Cache-Control" Content="no-cache" />
<meta Http-Equiv="Pragma" Content="no-cache" />
<meta Http-Equiv="Expires" Content="0" />

<body id="home">
  <!-- navigation bar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">VMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- display login error -->
        <?php if (empty($error) == false) : ?>
          <div class="error text-danger"><?php echo $error ?></div>
        <?php endif ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"></li>
        </ul>


        <a href="viewAllRequests.php" class="btn btn-success mx-3">View Requsts</a>
        <form method="post" action="index.php" class="d-flex">
          <input type="text" class="form-control me-2 " id="adminEmail" name="adminEmail" placeholder="Email" value="john@help.my" />
          <input type="password" class="form-control me-2 passtrength" id="password" name="password" placeholder="********" />
      </div>

      <input class="form-control d-none" id="login" name="login" />
      <button type="submit" class="btn btn-primary">
        Login
      </button>
      </form>

    </div>
    </div>
  </nav>
  <!----------------------- end of navbar ------------------------->
  <!-- welcome -->
  <div class="container">
    <div class="h1 py-2 pb-2 pt-5 mt-4 mb-4 border-bottom border-ligth">
      Welcome to Volunteers Mangement System
    </div>
  </div>
  <!-- Volunteer form -->
  <div class="container">
    <form>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="volName">Full Name:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="volName" name="volName" /><br />
        </div>
      </div>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="volPass">Password:</label>
        <div class="col-sm-3">
          <input type="password" class="form-control" id="volPass" name="volPass" /><br />
        </div>
      </div>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="Dob">Date of Birth:</label>
        <div class="col-sm-3">
          <input type="date" class="form-control" id="Dob" name="Dob" /><br />
        </div>
      </div>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="occupation">Occupation:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="occupation" name="occupation" /><br />
        </div>
      </div>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="volPhone">Phone:</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" id="volPhone" name="volPhone" /><br />
        </div>
      </div>
      <div class="row">
        <label class="col-sm-1 col-form-label" for="volEmail">Email:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="volEmail" name="volEmail" /><br />
        </div>
      </div>

      <div class="row">
        <label class="col-sm-1 col-form-label" for="volEmail">&nbsp;</label>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
            Submit
          </button>
        </div>
      </div>

    </form>
    <br>
    <div class="col-sm-6">
      <br>
      <p>
        Covid-19 changed the shape of our world. Since 2019 our world has been changed in so many ways
        and pandemic had a huge impact on every aspect of our life. Certainly, education was not an
        exception in this regard. Many kids and youth were not able to continue their studies as pandemic
        shot down every school and education across the world. Fortunately, as we are in 21st century
        technology can provide solutions to overcome this. Now we can hold our classes online and no
        matter where students or teachers are physically located, they can communicate through the
        internet via various online platforms. Our organization at HELP school tries to provide tutors
        and digital resources to students all across the country, thus no one would left behind during
        this hard era.
      </p>
    </div>

  </div>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Volunteer Management System
            </h6>
            <p>
              Schools can register their requests and volunteers can contibute by tutoring or digital resources
            </p>
          </div>
          <!-- Grid column -->



          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Kuala Lumpur</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@vms.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">HELPUNIVERSITY</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>

</html>