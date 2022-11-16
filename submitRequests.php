<?php
$errors = [];
$_SESSION = [];

// populate the db user & pass based on your db account
$dbUser = 'root';
$dbPass = '';
// connect to database
$db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');

$adminFullname = "";
$schoolName = "";
$adminSchoolID = -1;
if (isset($_GET['adminSchoolID'])) {
    $adminFullname = $_GET['adminFullname'];
    $schoolName = $_GET['schoolName'];
    $adminSchoolID = $_GET['adminSchoolID'];
}

if ($adminSchoolID == -1) return;

if (isset($_POST['registerResource'])) {
    // REGISTER RESOURCE
    // form validation: ensure that the form is correctly filled
    $errors = [];
    if (empty($_POST['type'])) {
        array_push($errors, "type is required");
    }
    if (empty($_POST['quantity'])) {
        array_push($errors, "quantity is required");
    }
    if (empty($_POST['description'])) {
        array_push($errors, "description is required");
    }

    // register resource if there are no errors in the form
    if (count($errors) == 0) {
        $type = mysqli_real_escape_string($db, $_POST['type']);
        $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $status = 'p';

        $query = "SELECT `id` FROM `requests` WHERE 
                    `quantity`=$quantity AND
                    `description`='$description' AND 
                    `status`='$status' AND 
                    `type`='$type' AND 
                    `schoolID`=$adminSchoolID;";
        $temp = $db->query($query);
        if (!$temp) {
            array_push($errors,  $db->error);
        } else {
            $row = $temp->fetch_row();
            if ($row == null) {
                $query = "REPLACE INTO `requests` (`quantity`, `description`, `status`, `type`, `schoolID`) 
            VALUES($quantity, '$description', '$status', '$type', $adminSchoolID);";
                if (!$db->query($query)) {
                    array_push($errors,  $db->error);
                }
            }
        }
    }
} else if (isset($_POST['registerTutorial'])) {
    // REGISTER TUTORIAL
    // form validation: ensure that the form is correctly filled
    $errors = [];
    if (empty($_POST['subjectID'])) {
        array_push($errors, "subjectID is required");
    }
    if (empty($_POST['subjectName'])) {
        array_push($errors, "subjectName is required");
    }
    if (empty($_POST['proposedDate'])) {
        array_push($errors, "proposedDate is required");
    }
    if (empty($_POST['proposedTime'])) {
        array_push($errors, "proposedTime is required");
    }
    if (empty($_POST['quantity'])) {
        array_push($errors, "quantity is required");
    }
    if (empty($_POST['description'])) {
        array_push($errors, "description is required");
    }

    // register resource if there are no errors in the form
    if (count($errors) == 0) {
        $subjectID = mysqli_real_escape_string($db, $_POST['subjectID']);
        $subjectName = mysqli_real_escape_string($db, $_POST['subjectName']);
        $proposedDate = mysqli_real_escape_string($db, $_POST['proposedDate']);
        $proposedTime = mysqli_real_escape_string($db, $_POST['proposedTime']);
        $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $status = 'p';

        $query = "SELECT `id` FROM `requests` WHERE 
                    `subjectID`=$subjectID AND
                    `subjectName`='$subjectName' AND
                    `quantity`=$quantity AND
                    `description`='$description' AND 
                    `status`='$status' AND 
                    `schoolID`=$adminSchoolID;";
        $temp = $db->query($query);
        if (!$temp) {
            array_push($errors,  $query);
        } else {
            $row = $temp->fetch_row();
            if ($row == null) {
                $query = "REPLACE INTO `requests` (`subjectID`, `subjectName`, `proposedDate`, `quantity`, `description`, `status`, `type`, `schoolID`) 
                            VALUES($subjectID, '$subjectName', '$proposedDate $proposedTime', $quantity, '$description', '$status', 'tutorial', $adminSchoolID);";
                if (!$db->query($query)) {
                    array_push($errors,  $db->error);
                }
            }
        }
    }
}


if (count($errors) == 0) {
    $_SESSION = [];
    $query = "SELECT `id`, `subjectID`, `subjectName`, `requestDate`, `proposedDate`, `quantity`, `description`, `status`, `type` FROM `requests` WHERE `schoolID` = $adminSchoolID;";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) > 0) {
        $_SESSION = $results; //->fetch_array(MYSQLI_ASSOC);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<title>Submit Requests</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="functions.js"></script>

<body id="subReq">
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
                    <?php
                    if (isset($_GET['adminFullname']) && isset($_GET['schoolName'])) {
                        $adminFullname = $_GET['adminFullname'];
                        $schoolName = $_GET['schoolName'];
                        $schoolID = $_GET['adminSchoolID'];
                        echo "<a href='adminDashboard.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$schoolID' class='btn btn-success mx-3'>Dashboard</a>";
                    }
                    ?>
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <!------------------ end of navbar ------------------------->
    <div class="container mt-5 pt-5">
        <div class="mb-5">
            <p>
                <button type="button" class="btn btn-outline-secondary" href="#addNewTut" role="button" aria-expanded="false" onclick="toggleAddNewTut()">
                    + Add New Tutorial Request
                </button>
                <button type="button" class="btn btn-outline-secondary" href="#addNewRes" role="button" aria-expanded="false" onclick="toggleAddNewRes()">
                    + Add New Resource Request
                </button>

                <?php include('errors.php'); ?>

            </p>
            <div class="collapse" id="addNewTut">
                <div class="card card-body">
                    <form class="needs-validation" novalidate method="post" <?php echo "action='submitRequests.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID'" ?>>
                        <div class="container mb-4">
                            <div class="row align-items-start">
                                <!-- tutorial session Information -->
                                <div class="col col-sm-12 col-md-6">
                                    <div id="tutInfo">
                                        <div class="mb-3">
                                            <label for="subjectID" class="form-label">Subject ID</label>
                                            <input type="text" class="form-control" id="subjectID" name="subjectID" placeholder="Subject ID" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="subjectName">Subject Name</label>
                                            <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="subject name" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="proposedDate">Proposed Date</label>
                                            <input type="date" class="form-control" id="proposedDate" name="proposedDate" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="proposedTime">Proposed Time</label>
                                            <input type="time" class="form-control" id="proposedTime" name="proposedTime" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="quantity">Number of Student</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="number of student" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description" placeholder="description" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <input class="form-control d-none" id="adminSchoolID" name="adminSchoolID" />

                        <input class="form-control d-none" id="registerTutorial" name="registerTutorial" />

                        <button type="submit" class="btn btn-primary btn-lg" id="registerTutorial">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

            <div class="collapse" id="addNewRes">
                <div class="card card-body">
                    <form class="needs-validation" novalidate method="post" <?php echo "action='submitRequests.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID'" ?>>
                        <div class="container mb-4">
                            <div class="row align-items-start">
                                <!-- resource  Information -->
                                <div class="col col-sm-12 col-md-6">
                                    <div id="resInfo">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <input type="text" class="form-control" id="type" name="type" placeholder="Type" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="resNum">RequiredNumber</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="resDisc">Description</label>
                                            <input type="text" class="form-control" id="description" name="description" placeholder="description" />
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <input class="form-control d-none" id="adminSchoolID" name="adminSchoolID" />

                        <input class="form-control d-none" id="registerResource" name="registerResource" />

                        <button type="submit" class="btn btn-primary btn-lg" id="registerResource">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!----------------------- resource request form --------------------->

        <!-- table -->
        <div class="col-sm-10">
            <?php if ($_SESSION) : ?>
                <table class="table" id="requests">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">ID</th>
                            <th scope="col">Subject ID</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Proposed Date</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Type</th>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
</body>

</html>