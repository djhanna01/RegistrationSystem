
<html>
<body>

<?php 
	include '../global.php';
	if($_POST["webpage"] == "loginPage"){
		header("Location:  $baseURL/login/login.php"); 
	}
	else if($_POST["webpage"] == "academicCalendar"){
		header("Location:  $baseURL/academicCalendar/academicCalendar.php"); 
	}
	else if($_POST["webpage"] == "catalog"){
		header("Location: $baseURL/catalog/catalog.php");
	}
	else if($_POST["webpage"] == "homepage"){
		header("Location: $baseURL/homepage/homepage.php");
	}
	else if($_POST["webpage"] == "masterSchedule"){
		header("Location: $baseURL/masterSchedule/masterSchedule.php");
	}
	else if($_POST["webpage"] == "logout"){
		header("Location: $baseURL/scripts/logout.php");
	}


	//Faculty stuff:
	else if($_POST["webpage"] == "editGrade"){
		header("Location: $baseURL/Faculty/editGrade.php");
	}
	else if($_POST["webpage"] == "coursesTaught"){
		header("Location: $baseURL/Faculty/coursesTaught.php");
	}
	else if($_POST["webpage"] == "advisees"){
		header("Location: $baseURL/Faculty/adviseesList.php");
	}
	else if($_POST["webpage"] == "changePass"){
		header("Location: $baseURL/Faculty/changePassword.php");
	}
	//End of faculty stuff.
	else{
		echo "bad redirect, webpage variable was" . $_POST["webpage"];
	}	

	die();
?>
</body>
</html>