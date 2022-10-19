<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8" />
  <title>VMS</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
    crossorigin="anonymous"
  />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="style.css" />
  <body id="home">
    <!-- navigation bar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">VMS</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"></li>
          </ul>
          
          <form class="d-flex">
                <input
                  type="text"
                  class="form-control me-2"
                  id="username"
                  name="username"
                  placeholder="Username"
                />
                <input
                  type="password"
                  class="form-control me-2"
                  id="password"
                  name="password"
                  placeholder="********"
                />
              </div>
              <a type="submit" class="btn btn-primary" id="login" name="login" href="registerSchool.php">
                Login
                </a>
          </form>
          
        </div>
      </div>
    </nav>

    <!-- welcome -->
    <div class="container">
      <div class="h1 py-2 pb-2 pt-5 mt-4 mb-4 border-bottom border-ligth">
        Welcom to Volunteers Mangement System
      </div>
    </div>
    <!-- Volunteer form -->
    <div class="container">
        <form>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="volName"
              >Full Name:</label
            >
            <div class="col-sm-3">
              <input
                type="text"
                class="form-control"
                id="volName"
                name="volName"
              /><br />
            </div>
          </div>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="volPass"
              >Password:</label
            >
            <div class="col-sm-3">
              <input
                type="password"
                class="form-control"
                id="volPass"
                name="volPass"
              /><br />
            </div>
          </div>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="Dob"
              >Date of Birth:</label
            >
            <div class="col-sm-3">
              <input
                type="date"
                class="form-control"
                id="Dob"
                name="Dob"
              /><br />
            </div>
          </div>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="occupation"
              >Occupation:</label
            >
            <div class="col-sm-3">
              <input
                type="text"
                class="form-control"
                id="occupation"
                name="occupation"
              /><br />
            </div>
          </div>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="volPhone">Phone:</label>
            <div class="col-sm-3">
              <input
                type="number"
                class="form-control"
                id="volPhone"
                name="volPhone"
              /><br />
            </div>
          </div>
          <div class="row">
            <label class="col-sm-1 col-form-label" for="volEmail">Email:</label>
            <div class="col-sm-3">
              <input
                type="email"
                class="form-control"
                id="volEmail"
                name="volEmail"
              /><br />
            </div>
          </div>

          <div class="row">
            <label class="col-sm-1 col-form-label" for="volEmail">&nbsp;</label>
            <div class="col-sm-3">
                <button
                type="submit"
                class="btn btn-primary btn-lg"
                style="width: 100%;"
              >
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
  </body>
</html>