<?php
session_start();

// variable declaration
$username = "";
$email = "";
$id = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'vms');

// REGISTER USER
if (isset($_POST['reg_school_admin'])) {
	// ____________ school ____________
	$schoolName = mysqli_real_escape_string($db, $_POST['schoolName']);
	$schoolAddress = mysqli_real_escape_string($db, $_POST['address']);
	$schoolCity = mysqli_real_escape_string($db, $_POST['city']);
	$adminUsername = $_SESSION['username'];
	$resRequestID = mysqli_real_escape_string($db, $_POST['resRequestID']);
	$tutReqID = mysqli_real_escape_string($db, $_POST['tutReqID']);
	$volunteerID = mysqli_real_escape_string($db, $_POST['volunteerID']);

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
	if (empty($adminUsername)) {
		array_push($errors, "Admin username is required");
	}

	// register school if there are no errors in the form
	$id = "";
	if (count($errors) == 0) {
		$query = "INSERT INTO `school` (schoolName, `address`, city, adminUsername, resRequestID, tutReqID, volunteerID) 
					VALUES('$schoolName', '$schoolAddress', '$schoolCity', '$adminUsername', '$resRequestID', '$tutReqID', '$volunteerID' )";
		mysqli_query($db, $query);
		$id = mysqli_insert_id($con);
	}

	// ____________ admin ____________
	$password = mysqli_real_escape_string($db, $_POST['adminPassword']);
	$fullname = mysqli_real_escape_string($db, $_POST['adminFullname']);
	$username = mysqli_real_escape_string($db, $fullname . $id);
	$staffID = mysqli_real_escape_string($db, $_POST['staffID']);
	$position = mysqli_real_escape_string($db, $_POST['position']);
	$phone = mysqli_real_escape_string($db, $_POST['adminPhone']);
	$email = mysqli_real_escape_string($db, $_POST['adminEmail']);
	$schoolID = mysqli_real_escape_string($db, $_POST['adminSchoolID']);

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
	}
	if (empty($schoolID)) {
		array_push($errors, "SchoolID is required");
	}

	// register admin if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password); //encrypt the password before saving in the database
		$query = "INSERT INTO `admin` (adminUsername, adminPassword, adminFullname, staffID, position, adminPhone, adminEmail, adminSchoolID) 
					VALUES('$username', '$password', '$fullname', '$staffID', '$position', '$phone', '$email', '$schoolID' )";
		mysqli_query($db, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}
}


// LOGIN USER
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['adminUsername']);
	$password = mysqli_real_escape_string($db, $_POST['adminPassword']);

	// form validation: ensure that the form is correctly filled
	$errors = [];
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM `admin` WHERE adminUsername='$username' AND adminPassword='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		} else {
			array_push($errors, "Wrong username/password!!!");
		}
	}
}

?>