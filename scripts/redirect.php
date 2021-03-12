
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
	else if($_POST["webpage"] == "changePass"){
		header("Location: $baseURL/changePassword/changePassword.php");
	}

	//Student stuff:
	else if($_POST["webpage"] == "studentHomepage"){
		header("Location: $baseURL/Student/studentHomepage.php");
	}
	else if($_POST["webpage"] == "dropCourseSection"){
		header("Location: $baseURL/Student/dropCourseSection.php");
	}
	//End of student

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
	
	//End of faculty stuff.

	//Admin stuff:
	else if($_POST["webpage"] == "listUnderGradStudents"){
		header("Location: $baseURL/Admin/viewListUndergradStudents.php");
	}
	else if($_POST["webpage"] == "listGradStudents"){
		header("Location: $baseURL/Admin/viewListGradStudents.php");
	}
	else if($_POST["webpage"] == "listCourses"){
		header("Location: $baseURL/Admin/viewListCourses.php");
	}
	//End of admin stuff.
	else{
		echo "bad redirect, webpage variable was" . $_POST["webpage"];
	}	

	die();
?>
</body>
</html>