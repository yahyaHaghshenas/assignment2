<?php
$errors = [];
$success = false;

// populate the db user & pass based on your db account
$dbUser = 'root';
$dbPass = '';
// connect to database
$db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');

$adminFullname = "";
$schoolName = "";
$position = "";
$adminSchoolID = -1;
if (isset($_GET['adminSchoolID'])) {
    $adminFullname = $_GET['adminFullname'];
    $schoolName = $_GET['schoolName'];
    $adminSchoolID = $_GET['adminSchoolID'];
    $position = $_GET['position'];
}
//break, if there is no school admin ID
if ($adminSchoolID == -1) return;

$query = '';

if (isset($_POST['update'])) {
    $errors = [];

    // register resource if there are no errors in the form
    $adminFullname = mysqli_real_escape_string($db, $_POST['adminFullname']);
    $adminPassword = mysqli_real_escape_string($db, $_POST['adminPassword']);
    $staffID = mysqli_real_escape_string($db, $_POST['staffID']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $adminPhone = mysqli_real_escape_string($db, $_POST['adminPhone']);
    $adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);

    $valueAdminFullname = trim($adminFullname) != '' ?  "`adminFullname`='$adminFullname'," : "";
    $valueAdminPassword = trim($adminPassword) != '' ?  "`adminPassword`='" . md5($adminPassword) . "'," : "";
    $valueStaffID = trim($staffID) != '' ?  "`staffID`=$staffID," : "";
    $valuePosition = trim($position) != '' ?  "`position`='$position'," : "";
    $valueAdminPhone = trim($adminPhone) != '' ?  "`adminPhone`='$adminPhone'," : "";
    $valueAdminEmail = trim($adminEmail) != '' ?  "`adminEmail`='$adminEmail'," : "";

    $values =
        substr($valueAdminFullname . $valueAdminPassword . $valueStaffID . $valuePosition . $valuePosition . $valueAdminPhone . $valueAdminEmail, 0, -1);

    $query = "UPDATE `admin` SET $values WHERE `adminSchoolID`=$adminSchoolID;";
    $temp = $db->query($query);
    if (!$temp) {
        array_push($errors,  $db->error);
    } else {
        $success = true;
    }
}
?>
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
        window.history.forward();
    }
    preventBack();
    window.onunload = function() {
        null
    };
</script>

<body id="regSch">
    <!------------- nav bar ---------------->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light " href="#">VMS</a><span class="breadcrumb-content">&gt; Admin</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form method="post" action="index.php" class="d-flex">
                    <input class="form-control d-none" id="logout" name="logout" />
                    <?php include('adminDashboardButton.php') ?>
                    <button type="submit" class="btn btn-dark">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5 pt-5">
        <!-- <div class="h1 py-2 pb-2 mb-4 border-bottom border-dark">
            Schools and Administrators
        </div> -->
        <!-- add new -->
        <div class="mb-5">
            <?php echo $query; ?>
            <?php include('errors.php'); ?>
            <?php if ($success) : ?>
                <div class="alert alert-success">
                    <?php echo "admin Information Updated!" ?>
                </div>
            <?php endif ?>
            <div id="addNew">
                <div class="card card-body">
                    <!-- TODO: set the values in the action  -->

                    <?php $adminUpdateUrl = "adminUpdate.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position"; ?>

                    <form method="post" action="<?php $adminUpdateUrl ?>">
                        <div class="container mb-4">
                            <div class="row align-items-start">

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

                                        <div class="mb-3">
                                            <label for="adminPassword">Password</label>
                                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="********" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminPassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmAdminPassword" name="confirmAdminPassword" placeholder="********" />
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="form-control d-none" id="update" name="update" />
                        <button type="submit" class="btn btn-primary btn-lg">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>