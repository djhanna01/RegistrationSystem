
<!doctype html>
<html lang="en">
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Student"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>

    <head>
        <title>Student Homepage</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="student.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "logout"
                        break;
                    case 2:
                        id = "dropCourseSection"
                        break;
                    case 4:
                        id = "dropMajor"
                        break;
                    case 6:
                        id = "dropMinor"
                        break;
                    case 14:
                        id = "changePass"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
                
            }
             
            function confDropMinorSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropMinorForm();
            }    
        </script>
    </head>
    
    <body>
        <div>
            <h1>Welcome, Student!</h1>
        </div>
        <div class="linkContainer">
            <div class="buttonContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Class</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(2)">
                <h3>Drop Class</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Major</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(4)">
                <h3>Drop Major</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Minor</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(6)">
                <h3>Drop Minor</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Transcript</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Master Schedule</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Degree Audit</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Advisors</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Course List</h3>
            </div>

            <div class="buttonContainer">
                <h3>View Holds</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(14)">
                <h3>Change Password</h3>
            </div>
        </div>
        
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>