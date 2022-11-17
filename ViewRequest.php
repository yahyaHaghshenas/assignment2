<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>View Request</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="">
<style>
</style>
<script src=""></script>
<body>

<div class="container">
    
    <h1>Requests</h1>
    
</div>
<div class="container">
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="container">
            <div class="card-body">
            <h5 class="card-title">Request 1: Laptop</h5>

            <?php

            $schoolID = "YA111";
            echo "Schoo ID: $schoolID";
            echo "<br>";
            
            $schoolName = "Kolej Tingkatan Enam";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Petaling Jaya";
            echo "City: $city";
            echo "<br>";

            $requestID = "B1801";
            echo "Request ID: $requestID";
            echo "<br>";

            $requestDate = "6/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $description = "With RAM 16GB";
            echo "Description: $description";
            echo "<br>";

            $resourceType = "Machine";
            echo "Resource Type: $resourceType";
            echo "<br>";

            $numRequired = "10";
            echo "Number Required: $numRequired";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";

            ?>

            <br>
            <a href="submit.php" class="btn btn-primary">Make Offer</a>
<?php
            if(isset($_POST['Make']))
{
    $Offer = $_POST['Offer'];
    $Status = $_POST['Status'];
    
        $qry = "INSERT INTO offer (Offer,Status) VALUES ('$Offer','$Status')";
        $insert = mysqli_query($connection,$qry);

        if($qry){
            echo "done";
            $_SESSION['success'] =  "Volunteer is Added";
            header('Location: register.php');
        }
        else{
            echo "not done";
            $_SESSION['status'] =  "Volunteer is Not Added";
            header('Location: register.php');
}
        }
        ?>

            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="card-body">
            <h5 class="card-title">Request 2: Tutorial for Number Bases</h5>

            <?php

            $schoolID = "NA222";
            echo "School ID: $schoolID";
            echo "<br>";
            
            $schoolName = "Sri Sempurna International School";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Kuala Lumpur";
            echo "City: $city";
            echo "<br>";

            $requestID = "B1936";
            echo "Request ID: $requestID";
            echo "<br>";

            $requestDate = "8/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";

            $description = "Solution within 1 minute for Number Bases";
            echo "Description: $description";
            echo "<br>";

            $proposedDate = "9/10/2022";
            echo "Proposed Date: $proposedDate";
            echo "<br>";
            
            $proposedTime = "08:00AM";
            echo "Proposed Time: $proposedTime";
            echo "<br>";
            
            $studentLevel = "C";
            echo "Student Level: $studentLevel";
            echo "<br>";

            $numStudents = "12";
            echo "Number of Students: $numStudents";
            echo "<br>";

            ?>
            <br>
            <a href="submit.php" class="btn btn-primary">Make Offer</a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="container">
            <div class="card-body">
            <h5 class="card-title">Request 3: Books </h5>

            <?php

            $schoolID = "VI333";
            echo "Schoo ID: $schoolID";
            echo "<br>";
            
            $schoolName = "SMK Tropicana";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Petaling Jaya";
            echo "City: $city";
            echo "<br>";

            $requestDate = "11/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $description = "Dictionaries, Sejarah";
            echo "Description: $description";
            echo "<br>";

            $resourceType = "TextBooks";
            echo "Resource Type: $resourceType";
            echo "<br>";

            $numRequired = "20";
            echo "Number Required: $numRequired";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";
            
            ?>
            <br>
            <a href="submit.php" class="btn btn-primary">Make Offer</a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="card-body">
            <h5 class="card-title">Request 4: Tutorial for English Essay</h5>
            
            <?php

            $schoolID = "SE444";
            echo "School ID: $schoolID";
            echo "<br>";
            
            $schoolName = "SMK Tinggi Klang";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Klang";
            echo "City: $city";
            echo "<br>";

            $requestID = "C0123";
            echo "Request ID: $requestID";
            echo "<br>";

            $requestDate = "13/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";

            $description = "Easiest methods for writing an English's eaasy";
            echo "Description: $description";
            echo "<br>";

            $proposedDate = "15/10/2022";
            echo "Proposed Date: $proposedDate";
            echo "<br>";
            
            $proposedTime = "010:00AM";
            echo "Proposed Time: $proposedTime";
            echo "<br>";
            
            $studentLevel = "C-";
            echo "Student Level: $studentLevel";
            echo "<br>";

            $numStudents = "18";
            echo "Number of Students: $numStudents";
            echo "<br>";
            ?>
            <br>
            <a href="submit.php" class="btn btn-primary">Make Offer</a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="container">
            <div class="card-body">
            <h5 class="card-title">Request 5: Mobile</h5>
            
            <?php

            $schoolID = "MA555";
            echo "Schoo ID: $schoolID";
            echo "<br>";
            
            $schoolName = "SMK Selayang Bharu";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Selayang Bharu";
            echo "City: $city";
            echo "<br>";

            $requestDate = "15/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $description = "Install apps for taking virtual class notes";
            echo "Description: $description";
            echo "<br>";

            $resourceType = "Software";
            echo "Resource Type: $resourceType";
            echo "<br>";

            $numRequired = "15";
            echo "Number Required: $numRequired";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";

            ?>
            
            <br>
            <a href="#" class="btn btn-primary">Make Offer</a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card">
            <div class="card-header">
            Featured
            </div>
            <div class="card-body">
            <h5 class="card-title">Request 6: Tutorial for Learn Piano</h5>
            
            <?php

            $schoolID = "EL666";
            echo "School ID: $schoolID";
            echo "<br>";
            
            $schoolName = "SMK Seafield";
            echo "School Name: $schoolName";
            echo "<br>";
            
            $city = "Subang Jaya";
            echo "City: $city";
            echo "<br>";

            $requestID = "DC1R3";
            echo "Request ID: $requestID";
            echo "<br>";

            $requestDate = "15/10/2022";
            echo "Request Date is on $requestDate";
            echo "<br>";

            $status = "NEW";
            echo "Status: $status";
            echo "<br>";

            $description = "Extra-curicular activity";
            echo "Description: $description";
            echo "<br>";

            $proposedDate = "19/10/2022";
            echo "Proposed Date: $proposedDate";
            echo "<br>";
            
            $proposedTime = "09:30AM";
            echo "Proposed Time: $proposedTime";
            echo "<br>";
            
            $studentLevel = "B";
            echo "Student Level: $studentLevel";
            echo "<br>";

            $numStudents = "15";
            echo "Number of Students: $numStudents";
            echo "<br>";
            ?>
            <br>
            <a href="#" class="btn btn-primary">Make Offer</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
