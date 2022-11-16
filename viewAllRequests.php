<?php
session_start();
$error = "";
// populate the db user & pass based on your db account
$dbUser = 'root';
$dbPass = '';
if (isset($_POST['login'])) {
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

        // connect to database
        $db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');
        $password = md5($password);
        $query = "SELECT a.`adminFullname`, s.`schoolName`, a.`adminSchoolID`, a.`isSuperAdmin`, a.`position` FROM `admin` a LEFT JOIN `school` s
                  ON a.`adminSchoolID` = s.`schoolID` WHERE a.`adminEmail`='$adminEmail' AND a.`adminPassword`='$password';";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            if ($results) {
                while ($row = $results->fetch_row()) {
                    $adminFullname = $row[0];
                    $schoolName = $row[1];
                    $adminSchoolID = $row[2];
                    $position = $row[4];
                    // isSuperAdmin
                    if ($row[3] == 1) {
                        header("Location: registerSchool.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position");
                    } else {
                        header("Location: adminDashboard.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position");
                    }
                }
            }
            // header("Location: registerSchool.php?");
        } else {
            $error = "Wrong Username or Password!";
        }
    }
} else if (isset($_POST['logout'])) {
    $error = "";
}
?>
<?php
$errors = [];
$_SESSION = [];


// // connect to database
$db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');

// $adminFullname = "";
// $schoolName = "";
// $adminSchoolID = -1;
// if (isset($_GET['adminSchoolID'])) {
//     $adminFullname = $_GET['adminFullname'];
//     $schoolName = $_GET['schoolName'];
//     $adminSchoolID = $_GET['adminSchoolID'];
// }

// if ($adminSchoolID == -1) return;



$_SESSION = [];
$query = "SELECT `id`, `subjectID`, `subjectName`, `requestDate`, `proposedDate`, `quantity`, `description`, `status`, `type` ,`schoolID` FROM `requests`";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) > 0) {
    $_SESSION = $results;
}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>View Request</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">

<body>
    <div class="container"></div>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark mb-5">
        <div class="container-fluid">
            <a class="navbar-brand text-light " href="index.php">VMS</a><span class="breadcrumb-content">&gt; All Requests</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (empty($error) == false) : ?>
                    <div class="error text-danger"><?php echo $error ?></div>
                <?php endif ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>



                <form method="post" action="index.php" class="d-flex" style="margin: 0;">
                    <input type="text" class="form-control me-2 " id="adminEmail" name="adminEmail" placeholder="Email" />
                    <input type="password" class="form-control me-2 passtrength" id="password" name="password" placeholder="********" />
            </div>

            <input class="form-control d-none" id="login" name="login" />
            <button type="submit" class="btn btn-primary">
                Login
            </button>
            </form>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">

            <?php if ($_SESSION) : ?>
                <?php foreach ($_SESSION as $row) : ?>
                    <div class="col-sm-4 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php foreach ($row as $key => $value) : ?>
                                    <?php
                                    if ($key == 'id') {
                                        echo "<h5 class='card-title'>Request ($value)</h5>";
                                    } else if ($value != '') {
                                        if ($key == 'type') {
                                            if ($value == 'tutorial') {
                                                echo "<div class='key-value'><div class='fw-bold'>$key</div><div class='fw-bold text-warning'>$value</div></div>";
                                            } else {
                                                echo "<div class='key-value'><div class='fw-bold'>$key</div><div class='fw-bold text-primary'>$value</div></div>";
                                            }
                                        } else {
                                            echo "<div class='key-value'><div>$key</div><div>$value</div></div>";
                                        }
                                    }
                                    ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
</body>

</html>