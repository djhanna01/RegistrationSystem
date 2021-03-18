
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
	else if($_POST["webpage"] == "dropMajor"){
		header("Location: $baseURL/Student/dropMajor.php");
	}
	else if($_POST["webpage"] == "dropMinor"){
		header("Location: $baseURL/Student/dropMinor.php");
	}
	//End of student

	//Faculty stuff:
	else if($_POST["webpage"] == "facultyHomepage"){
		header("Location: $baseURL/Faculty/facultyHomepage.php");
	}
	else if($_POST["webpage"] == "editGrade"){
		header("Location: $baseURL/Faculty/editGrade.php");
	}
	else if($_POST["webpage"] == "coursesTaught"){
		header("Location: $baseURL/Faculty/coursesTaught.php");
	}
	else if($_POST["webpage"] == "adviseesList"){
		header("Location: $baseURL/Faculty/adviseesList.php");
	}
	else if($_POST["webpage"] == "viewStudentTranscript"){
		header("Location: $baseURL/Faculty/viewStudentTranscript.php");
	}
	else if($_POST["webpage"] == "viewStudentDegreeAudit"){
		header("Location: $baseURL/Faculty/viewStudentDegreeAudit.php");
	}
	else if($_POST["webpage"] == "viewCourseSectionStudentList"){
		header("Location: $baseURL/Faculty/viewCourseSectionStudentList.php");
	}
	//End of faculty stuff.

	//Admin stuff:
	//case 0
	else if($_POST["webpage"] == "adminHomepage"){
		header("Location: $baseURL/Admin/adminHomepage.php");
	}

	//case 1
	else if($_POST["webpage"] == "addStudentAccount"){
		header("Location: $baseURL/Admin/addStudentAccount.php");
	}

	//case 2
	else if($_POST["webpage"] == "updateStudentAccount"){
		header("Location: $baseURL/Admin/updateStudentAccount.php");
	}
	
	//case 3
	else if($_POST["webpage"] == "addFacultyAccount"){
		header("Location: $baseURL/Admin/addFacultyAccount.php");
	}
	
	//case 4
	else if($_POST["webpage"] == "updateFacultyAccount"){
		header("Location: $baseURL/Admin/updateFacultyAccount.php");
	}
	
	//case 5
	else if($_POST["webpage"] == "addResearcherAccount"){
		header("Location: $baseURL/Admin/addResearcherAccount.php");
	}
	
	//case 6
	else if($_POST["webpage"] == "updateResearcherAccount"){
		header("Location: $baseURL/Admin/updateResearcherAccount.php");
	}
	
	//case 7
	else if($_POST["webpage"] == "addAdminAccount"){
		header("Location: $baseURL/Admin/addAdminAccount.php");
	}
	
	//case 8
	else if($_POST["webpage"] == "updateAdminAccount"){
		header("Location: $baseURL/Admin/updateAdminAccount.php");
	}
	
	//case 9
	else if($_POST["webpage"] == "removeAccount"){
		header("Location: $baseURL/Admin/removeAccount.php");
	}
	
	//case 10
	else if($_POST["webpage"] == "assignFacultyAdvisor"){
		header("Location: $baseURL/Admin/assignFacultyAdvisor.php");
	}
	
	//case 11
	else if($_POST["webpage"] == "removeFacultyAdvisor"){
		header("Location: $baseURL/Admin/removeFacultyAdvisor.php");
	}

	//case 12
	else if($_POST["webpage"] == "listAdvisors"){
		header("Location: $baseURL/Admin/viewListAdvisors.php");
	}
	
	//case 13
	else if($_POST["webpage"] == "listUnderGradStudents"){
		header("Location: $baseURL/Admin/viewListUndergradStudents.php");
	}
	
	//case 14
	else if($_POST["webpage"] == "listGradStudents"){
		header("Location: $baseURL/Admin/viewListGradStudents.php");
	}

	//case 15
	else if($_POST["webpage"] == "addCourseSection"){
		header("Location: $baseURL/Admin/addCourseSection.php");
	}

	//case 16
	else if($_POST["webpage"] == "updateCourseSection"){
		header("Location: $baseURL/Admin/updateCourseSection.php");
	}

	else if($_POST["webpage"] == "updateCourseSectionDetails"){
		header("Location: $baseURL/Admin/updateCourseSectionDetails.php");
	}

	//case 17
	else if($_POST["webpage"] == "removeCourseSection"){
		header("Location: $baseURL/Admin/removeCourseSection.php");
	}

	else if($_POST["webpage"] == "removeCourseSectionWithDetails"){
		header("Location: $baseURL/Admin/removeCourseSectionWithDetails.php");
	}

	//case 18
	else if($_POST["webpage"] == "addHold"){
		header("Location: $baseURL/Admin/addHold.php");
	}

	//case 19
	else if($_POST["webpage"] == "removeHold"){
		header("Location: $baseURL/Admin/removeHold.php");
	}

	//case 20
	else if($_POST["webpage"] == "addCoursePrerequisite"){
		header("Location: $baseURL/Admin/addCoursePrerequisite.php");
	}

	//case 21
	else if($_POST["webpage"] == "removeCoursePrerequisite"){
		header("Location: $baseURL/Admin/removeCoursePrerequisite.php");
	}
	
	//case 22
	else if($_POST["webpage"] == "listCourses"){
		header("Location: $baseURL/Admin/viewListCourses.php");
	}

	//case 23
	else if($_POST["webpage"] == "registerStudentToCourse"){
		header("Location: $baseURL/Admin/registerStudentToCourse.php");
	}
	//End of admin stuff.

	//Researcher Department stuff
	else if($_POST["webpage"] == "ResearcherHomepage"){
		header("Location: $baseURL/ResearchDepartment/ResearcherHomepage.php");
	}
	else if($_POST["webpage"] == "inputNewStatistic"){
		header("Location: $baseURL/ResearchDepartment/inputNewStatistic.php");
	}
	else if($_POST["webpage"] == "updateStatistic"){
		header("Location: $baseURL/ResearchDepartment/updateStatistic.php");
	}
	else if($_POST["webpage"] == "removeStatistic"){
		header("Location: $baseURL/ResearchDepartment/removeStatistic.php");
	}
	//End of Researcher Department stuff

	else{
		echo "bad redirect, webpage variable was" . $_POST["webpage"];
	}	

	die();
?>
</body>
</html>