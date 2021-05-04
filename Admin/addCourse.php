<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Admin"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>Add a Course</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="admin.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "adminHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>
    <body>
        <h1>Add a Course</h1>


        <div>
            <form method="post" class="form" action= "../scripts/addCourse.php" onsubmit="return confirm('Are you sure you want to submit the form?')">
                <p><b>Add Course</b></p>

                <p><label><b>Course ID: </b></label>
                <input type="text" class="field" name="courseID" required></p>

                <p><label><b>Course Name: </b></label>
                <input type="text" class="field" name="courseName" required></p>

                <p><label><b>Department</b></label>
                <select name="departmentID" id="departmentID">
                <option value='0'>Mathematics</option>
                <option value='1'>Education</option>
                <option value='2'>Visual Arts</option>
                <option value='3'>Psychology</option>
                <option value='4'>History</option>
                <option value='5'>English</option>
                <option value='6'>Biological Sciences</option>
                <option value='7'>Modern Languages</option>
                </select>

               

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>

        
        
    </body>
</html>