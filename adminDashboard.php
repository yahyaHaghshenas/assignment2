<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<body>

    <!------------- nav bar ---------------->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark ">
        <div class="container-fluid ">
            <a class="navbar-brand text-light " href="index.html">VMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form method="post" action="index.php" class="d-flex">
                    <input class="form-control d-none" id="logout" name="logout" />
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!---------------- end of navbar ---------------->

    <div class="container mt-5 pt-3">

        <!-- school and admin info -->
        <div>
            <?php
            if (isset($_GET['adminFullname']) && isset($_GET['schoolName'])) {
                $adminFullname = $_GET['adminFullname'];
                $schoolName = $_GET['schoolName'];
                $schoolID = $_GET['adminSchoolID'];
                echo "<figure><blockquote class='blockquote'><p> Welcome <b>$adminFullname</b> to VMS</p></blockquote>" .
                    "<figcaption class='blockquote-footer'>School $schoolName <cite title='Scholl ID'>($schoolID)</cite></figcaption></figure>";
            }
            ?>
        </div>

        <!-- action buttons -->
        <?php
        if (isset($_GET['adminFullname']) && isset($_GET['schoolName']) && isset($_GET['adminSchoolID'])) {
            $adminFullname = $_GET['adminFullname'];
            $schoolName = $_GET['schoolName'];
            $adminSchoolID = $_GET['adminSchoolID'];
            $adminUpdateUrl = "adminUpdate.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID";
            $submitRequestsUrl = "submitRequests.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID";
            //echo "<div class='m-2'><a class='btn btn-lg btn-primary' href=$adminUpdateUrl>Edit Administrator</a></div>";
            //echo "<div class='m-2'><a class='btn btn-lg btn-primary' href=$submitRequestsUrl>Submit Request</a></div>";
        }
        ?>

        <!-- <div class="m-2">
            <button class="btn btn-lg btn-primary">View Offers</button>
        </div> -->

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Admin</h5>
                        <p class="card-text">if your school has a new admin please update admin information here</p>
                        <?php echo "<a href='$adminUpdateUrl' class='btn btn-primary'>Updatee</a>" ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Submit Requests</h5>
                        <p class="card-text">Submit new requests for tutorial sesssions or digital resources here</p>
                        <?php echo "<a href='$submitRequestsUrl' class='btn btn-primary'>Submit</a>" ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Requests</h5>
                        <p class="card-text">You can see the list of requests that belongs to your school here</p>
                        <a href="viewrequest.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>