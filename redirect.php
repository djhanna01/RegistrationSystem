
<html>
<body>

<?php 
	include 'global.php';
	if($_POST["webpage"] == "loginPage"){
		header("Location:  $baseURL/login/login.php"); 
	}
	else if($_POST["webpage"] == "academicCalendar"){
		header("Location:  $baseURL/academicCalendar/academicCalendar.php"); 
	}

	else{
		echo "didnt work";
	}	


	die();
?>
</body>
</html>