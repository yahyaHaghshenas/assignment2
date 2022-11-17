<?php
if (isset($_GET['adminFullname']) && isset($_GET['schoolName'])) {
	$adminFullname = $_GET['adminFullname'];
	$schoolName = $_GET['schoolName'];
	$schoolID = $_GET['adminSchoolID'];
	$position = $_GET['position'];
	echo "<div style='padding-top:10px;'><figure><blockquote class='blockquote'><p><b>$adminFullname</b></p></blockquote>" .
		"<figcaption class='blockquote-footer'>Position: $position</figcaption>" .
		"<figcaption class='blockquote-footer'>School: $schoolName</figcaption>" .
		"<figcaption class='blockquote-footer'>School ID: $schoolID</figcaption>" .
		"</figure></div>";
}
