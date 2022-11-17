<!DOCTYPE html>
<html>
<head>
	<title>Login As Volunteer</title>
</head>
<body>

	<style type="text/css">

	
	#text{

		height: 30px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #orangered;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: darkviolet;
		border: none;
	}

	#box{

		background-color: lightsalmon;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	body{
		background-image: url("lock.jpg");
		background-repeat: "no-repeat";
		background-size: 100%;
	}

	</style>

	<br>
	<br>
	<br>
	<br>

	<div id="box">
		
		<form action="Process.php" method="POST">
			<div style="font-size: 20px;margin: 10px;color: black;">Login As Volunteer</div>

			<input id="text" type="text" name="Username"><br><br>
			<input id="text" type="password" name="Password"><br><br>

			<a href = "register.php">Login</a><br><br>

			<a href="register.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>