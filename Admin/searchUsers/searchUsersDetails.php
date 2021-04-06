<?php 

include '../../global.php';


if($_POST['userType'] == "undergradStudent"){

    header("Location: $baseURL/admin/searchUsers/searchUnderGradStudent.php");
        }
else if($_POST['userType'] == "gradStudent"){

header("Location: $baseURL/admin/searchUsers/searchGradStudent.php");
    }
else if($_POST['userType'] == "faculty"){

    header("Location: $baseURL/admin/searchUsers/searchFaculty.php");
    }
else if($_POST['userType'] == "admin"){

    header("Location: $baseURL/admin/searchUsers/searchAdmin.php");
    }
else if($_POST['userType'] == "researcher"){
        header("Location: $baseURL/admin/searchUsers/searchResearcher.php");
        }
?>