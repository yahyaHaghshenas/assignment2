<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<title>School & Administrators</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script type="text/javascript">
    function preventBack() {
        // var d = document.referrer;
        // console.log(1111, d);
        // if (d === 'http://localhost/b2000382/' || d.indexOf('index.php') > -1)
        window.history.forward();
    }
    preventBack();
    // setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<body id="regSch">
    <!------------- nav bar ---------------->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light " href="#">VMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form method="post" action="index.php" class="d-flex">
                    <input class="form-control d-none" id="logout" name="logout" />
                    <button type="submit" class="btn btn-dark">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!--------- end of navbar ------------>
    <div class="container mt-5 pt-5">

        <!-- add new -->
        <div class="mb-5">
            <p>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#addNew" role="button" aria-expanded="false" aria-controls="addNew">
                    + Add new School and Administrator
                </button>

                <?php include('errors.php'); ?>

            </p>
            <div class="collapse" id="addNew">
                <div class="card card-body">
                    <form method="post" action="registerSchool.php">
                        <div class="container mb-4">
                            <div class="row align-items-start">
                                <!-- School Information -->
                                <div class="col col-sm-12 col-md-6">
                                    <div id="adminInfo">
                                        <h3 class="mt-3">School Information</h3>
                                        <!-- <form class="row"> -->
                                        <div class="mb-3">
                                            <label for="schoolName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="Write school name" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Write full address" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Write city" />
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>

                                <!-- Admin Information -->
                                <div class="col">
                                    <div id="adminInfo">
                                        <h3 class="mt-3">Admin Information</h3>
                                        <!-- <form class="row"> -->
                                        <div class="mb-3">
                                            <label for="adminFullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="adminFullname" name="adminFullname" placeholder="Write full name" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminPassword">Password</label>
                                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="********" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="staffID">Staff ID</label>
                                            <input type="text" class="form-control" id="staffID" name="staffID" placeholder="Write Staff ID" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control" id="position" name="position" placeholder="Write Position" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminPhone">Phone</label>
                                            <input type="phone" class="form-control" id="adminPhone" name="adminPhone" placeholder="0172552525" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminEmail">Email</label>
                                            <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="example@domain.com" />
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input class="form-control d-none" id="register" name="register" />

                        <button type="submit" class="btn btn-primary btn-lg" id="register">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- list of schools & administrators -->
        <!-- table -->
        <div class="col-sm-10">

            <?php if ($_SESSION) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">School</th>
                            <th scope="col">Address</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Position</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($_SESSION as $row) : ?>
                            <tr>
                                <?php foreach ($row as $cell) : ?>
                                    <td><?php echo $cell ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
    </div>
</body>

</html>