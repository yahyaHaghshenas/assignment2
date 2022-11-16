<!-- Notice: In order to establish the database connection is required to provide your db user and password. 
Please proceed to the project directory: “server.php”  and for variables $dbUser and $dbPass key in your database 
username and password respectively.  -->

<?php
session_start();

// variable declaration
$username = "";
$email = "";
$id = "";
$errors = array();
$_SESSION = [];

// populate the db user & pass based on your db account
$dbUser = 'root';
$dbPass = '';

// connect to database
$db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');

// GET DATA
$errors = [];
$_SESSION = [];
$query = "SELECT sch.`schoolName` school, CONCAT(sch.`city`, ', ',  sch.`address`) `address`, 
	ad.`adminFullname` fullname, ad.`staffID`, ad.`position`, ad.`adminPhone` phone, ad.`adminEmail` email 
	FROM vms.`school` sch LEFT JOIN vms.`admin` ad ON sch.`schoolID` = ad.`adminSchoolID` WHERE ad.`isSuperAdmin`=0;";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) > 0) {
	$_SESSION = $results;
}

// REGISTER USER
if (isset($_POST['register'])) {
	// ____________ school ____________
	$schoolName = mysqli_real_escape_string($db, $_POST['schoolName']);
	$schoolAddress = mysqli_real_escape_string($db, $_POST['address']);
	$schoolCity = mysqli_real_escape_string($db, $_POST['city']);
	// $resRequestID = mysqli_real_escape_string($db, $_POST['resRequestID']);
	// $tutReqID = mysqli_real_escape_string($db, $_POST['tutReqID']);
	// $volunteerID = mysqli_real_escape_string($db, $_POST['volunteerID']);

	// form validation: ensure that the form is correctly filled
	$errors = [];
	if (empty($schoolName)) {
		array_push($errors, "School name is required");
	}
	if (empty($schoolAddress)) {
		array_push($errors, "Address is required");
	}
	if (empty($schoolCity)) {
		array_push($errors, "City is required");
	}

	// register school if there are no errors in the form
	$id = 0;
	if (count($errors) == 0) {
		$query = "INSERT INTO `school` (schoolName, `address`, city) 
					VALUES('$schoolName', '$schoolAddress', '$schoolCity')";
		if (!$db->query($query)) {
			array_push($errors,  $db->error);
		}
		$id = mysqli_insert_id($db);
	}
	if ($id == 0) {
		array_push($errors, $schoolName . " has been already registered! ($schoolAddress)");
	} else {
		// ____________ admin ____________
		$password = mysqli_real_escape_string($db, $_POST['adminPassword']);
		$fullname = mysqli_real_escape_string($db, $_POST['adminFullname']);
		$username = mysqli_real_escape_string($db, $fullname . $id);
		$staffID = mysqli_real_escape_string($db, $_POST['staffID']);
		$position = mysqli_real_escape_string($db, $_POST['position']);
		$phone = mysqli_real_escape_string($db, $_POST['adminPhone']);
		$email = mysqli_real_escape_string($db, $_POST['adminEmail']);
		$schoolID = 101; // mysqli_real_escape_string($db, $_POST['adminSchoolID']);

		// form validation: ensure that the form is correctly filled
		$errors = [];
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (empty($fullname)) {
			array_push($errors, "Fullname is required");
		}
		if (empty($staffID)) {
			array_push($errors, "StaffID is required");
		}
		if (empty($position)) {
			array_push($errors, "Position is required");
		}
		if (empty($phone)) {
			array_push($errors, "Phone is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		} else {
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($errors, "Invalid email address");
			}
		}

		// register admin if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password); //encrypt the password before saving in the database
			$query = "INSERT INTO `admin` (adminUsername, adminPassword, adminFullname, staffID, position, adminPhone, adminEmail, adminSchoolID) 
						VALUES('$username', '$password', '$fullname', '$staffID', '$position', '$phone', '$email', '$id')";
			if (!$db->query($query)) {
				array_push($errors,  $db->error);
			}



			$errors = [];
			$_SESSION = [];
			$query = "SELECT sch.`schoolName` school, CONCAT(sch.`city`, ', ',  sch.`address`) `address`, 
				ad.`adminFullname` fullname, ad.`staffID`, ad.`position`, ad.`adminPhone` phone, ad.`adminEmail` email 
				FROM vms.`school` sch LEFT JOIN vms.`admin` ad ON sch.`schoolID` = ad.`adminSchoolID`;";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				$_SESSION = $results; //->fetch_array(MYSQLI_ASSOC);
			}
		}
	}
}

?>