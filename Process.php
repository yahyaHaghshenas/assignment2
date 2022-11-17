<?php

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$Username = stripcslashes($Username);
$Password = stripcslashes($Password);
$Username = mysql_real_escape_string($Username);
$Password = mysql_real_escape_string($Password);

mysql_connect("localhost","root","");
mysql_select_db("bitvolunteer");

$result = mysql_query("select * from assignment where Username= '$Username' and Password= '$Password' " ) or die ("Failed to query database".mysql_error());

$row = mysql_fetch_array($result);
if($row['Username'] == $Username && $row['Password'] == $Password){
	echo "Login Success... Welcome ".$row['Fullname'];
}
else{
	echo "Oops!!! Cannot Login";
}

?>