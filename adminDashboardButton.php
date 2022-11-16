<?php if (isset($_GET['adminFullname']) && isset($_GET['schoolName'])) {
	$adminFullname = $_GET['adminFullname'];
	$schoolName = $_GET['schoolName'];
	$schoolID = $_GET['adminSchoolID'];
	$position = $_GET['position'];
	echo "<a href='adminDashboard.php?adminFullname=$adminFullname&schoolName=$schoolName&adminSchoolID=$schoolID&position=$position' class='btn btn-dark mx-3'>Dashboard</a>";
}
