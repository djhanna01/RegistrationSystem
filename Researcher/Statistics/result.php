<!doctype html>
<?php 
    
    include '../../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Researcher"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>Result</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Researcher.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "researcherHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>
    <body>
    <h1>Result</h1>
    <?php
        $conn = connectToDB();
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $studentType = $_POST['studentType'];
        $studentStatus = $_POST['studentStatus'];
        $semesterID = $_POST['semester'];
        $majorID = $_POST['major'];
        $minorID = $_POST['minor'];
        $courseID = $_POST['courseID'];
        $userType = $_POST['userType'];
        $facultyType = $_POST['facultyType'];
        $facultyRank = $_POST['facultyRank'];
        $gradProgram = $_POST['gradProgram'];

        $totalGPA = 0.00;
        $count = 0;

        if($gender == "male"){ 
            $genderWhere = "&& user.gender = 'Male'";

        }
        else if($gender == "female"){
            $genderWhere = "&& user.gender = 'Female'";
        }
        else if($gender == "other"){
            $genderWhere = "&& user.gender != 'Female' && user.gender != 'Male'";
        }

        if($semesterID != '-1'){

            $semesterIDWhere = "&& user.userID IN (SELECT studentID FROM enrollment
            LEFT JOIN coursesection ON coursesection.CRN = enrollment.CRN
            WHERE coursesection.semesterID = $semesterID)";

        }

        if($majorID != '-1'){
            $majorWhere = "&& undergradstudentmajor.majorID = $majorID";
        }
        if($minorID != '-1'){
            $minorWhere = "&& undergradstudentminor.minorID = $minorID";
        }
        if($gradProgram != "any"){
            $gradProgramWhere = " && gradstudent.gradProgram = '$gradProgram'";

        }


        if($type == "GPA"){

            if(($studentType == "undergraduate" || $studentType == "any") && $gradProgram == "any"){

                if($studentStatus == "fulltime"){ 
                    $statusWhere = "&& undergradstudent.status = 'Full Time'";
        
                }
                else if($studentStatus == "parttime"){
                    $statusWhere = "&& undergradstudent.status = 'Part Time'";
                }
                else if($studentStatus == "graduated"){
                    $statusWhere = "&& undergradstudent.status = 'graduated'";
                }


                $sql = "SELECT GPA, user.userID from undergradstudent
                        LEFT JOIN user ON user.userID = undergradstudent.userID
                        LEFT JOIN undergradstudentmajor ON undergradstudentmajor.undergradstudentID = user.userID
                        LEFT JOIN undergradstudentminor ON undergradstudentminor.undergradstudentID = user.userID
                        $enrollmentJOINs
                        WHERE undergradstudent.userID != -1 $genderWhere $statusWhere $semesterIDWhere $majorWhere $minorWhere";
                $undergradResult = mysqli_query($conn, $sql);
            }
            if(($studentType == "graduate" || $studentType == "any") && $majorID == "-1" && $minorID == "-1"){

                if($studentStatus == "fulltime"){ 
                    $statusWhere = "&& gradstudent.status = 'Full Time'";
        
                }
                else if($studentStatus == "parttime"){
                    $statusWhere = "&& gradstudent.status = 'Part Time'";
                }
                else if($studentStatus == "graduated"){
                    $statusWhere = "&& gradstudent.status = 'graduated'";
                }

                $sql = "SELECT GPA, user.userID from gradstudent
                        LEFT JOIN user ON user.userID = gradstudent.userID
                        WHERE gradstudent.userID != -1 $genderWhere $semesterIDWhere $statusWhere $gradProgramWhere";
                $gradResult = mysqli_query($conn, $sql);
            }

            
            if(!is_null($undergradResult)){
                while($row = $undergradResult->fetch_row()){
                    if($semesterID == -1){
                    $totalGPA += $row[0];
                    
                    }
                    else{
                        $totalGPA += getGPA($conn, $row[1], $semesterID);
                        
                    }
                    $count++;
                }
            }
            if(!is_null($gradResult)){
                while($row = $gradResult->fetch_row()){
                    if($semesterID == -1){
                        $totalGPA += $row[0];
                    }
                        else{
                            $totalGPA += getGPA($conn, $row[1], $semesterID);
                        }
                        $count++;
                }
                

            }
            $average = $totalGPA/$count;
            if($count == 0){
                $average = 0.00;
            }
            $average = round($average, 2);
            echo "<br>Total entries: $count <br> Average: " . $average;
            

        }
        else if($type == "courseGrade"){

        }
        else if($type == "salary"){

        }
    
    
    ?>
	
    </body>
</html>