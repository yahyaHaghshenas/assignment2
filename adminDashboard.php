<?php
if (isset($_POST['logout'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<meta Http-Equiv="Cache-Control" Content="private, no-cache, must-revalidate, max-age=0, proxy-revalidate, s-" />
<meta Http-Equiv="Pragma" Content="no-cache" />
<meta Http-Equiv="Expires" Content="0" />
<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    preventBack();
    window.onunload = function() {
        null
    };
</script>

<body id="admdsh">

    <!------------- nav bar ---------------->
    <nav class="navbar fixed-top navbar-expand-lg bg-dark ">
        <div class="container-fluid ">
            <a class="navbar-brand text-light " href="index.php">VMS</a><span class="breadcrumb-content">&gt; Dashboard</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form method="post" action="adminDashboard.php" class="d-flex">
                    <input class="form-control d-none" id="logout" name="logout" />
                    <button type="submit" class="btn btn-dark">
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
                $position = $_GET['position'];
                echo "<figure><blockquote class='blockquote'><p> Welcome <b>$adminFullname</b> to VMS</p></blockquote>" .
                    "<figcaption class='blockquote-footer'>Position: $position</figcaption>" .
                    "<figcaption class='blockquote-footer'>School: $schoolName</figcaption>" .
                    "<figcaption class='blockquote-footer'>School ID: $schoolID</figcaption>" .
                    "</figure>";
            }
            ?>
        </div>

        <!-- navigation urls for cards -->
        <?php
        $adminUpdateUrl = "";
        $submitRequestsUrl = "";
        $viewRequestsUrl = "";
        $viewOffersUrl = "";
        if (isset($_GET['adminFullname']) && isset($_GET['schoolName']) && isset($_GET['adminSchoolID'])) {
            $adminFullname = $_GET['adminFullname'];
            $schoolName = $_GET['schoolName'];
            $adminSchoolID = $_GET['adminSchoolID'];
            $position = $_GET['position'];
            $adminUpdateUrl = "adminUpdate.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position";
            $submitRequestsUrl = "submitRequests.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position";
            $viewRequestsUrl = "viewrequest.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position";
            $viewOffersUrl = "viewOffers.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$adminSchoolID&position=$position";
        }
        ?>
        <!-- generating cards -->
        <div class="container">
            <div class="row">
                <!-- adminUpdate -->
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Admin</h5>
                            <p class="card-text">if your school has a new admin please update admin information here</p>
                            <?php echo "<a href='$adminUpdateUrl' class='btn btn-primary'>Updatee</a>" ?>
                        </div>
                    </div>
                </div>
                <!-- submitRequests -->
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Submit Requests</h5>
                            <p class="card-text">Submit new requests for tutorial sesssions or digital resources here</p>
                            <?php echo "<a href='$submitRequestsUrl' class='btn btn-primary'>Submit</a>" ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- viewRequests -->
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Requests</h5>
                            <p class="card-text">You can see the list of requests that belongs to your school here</p>
                            <?php echo "<a href='$viewRequestsUrl' class='btn btn-primary'>View</a>" ?>
                        </div>
                    </div>
                </div>
                <!-- viewOffers -->
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Offers</h5>
                            <p class="card-text">You can see the listt of offers that already has been made for your requests</p>
                            <?php echo "<a href='$viewOffersUrl' class='btn btn-primary'>View</a>" ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>