
<!doctype html>
<html lang="en">
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
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
                    case 1:
                        id = "dropCourseSection"
                        break;
                    case 14:
                        id = "changePass"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }

            function confDropClassSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
            function confDropMajorSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropMajorForm();
            }   
            function confDropMinorSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropMinorForm();
            } 
            function confChangePassSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeChangePassForm();
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

            <div class="buttonContainer" onclick="sendRedirectForm(1)">
                <h3>Drop Class</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Major</h3>
            </div>

            <div class="buttonContainer" onclick="showDropMajorForm()">
                <h3>Drop Major</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Minor</h3>
            </div>

            <div class="buttonContainer" onclick="showDropMinorForm()">
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

        <div>
            <form method="post" class="formPopup" id="dropMajorForm" onsubmit="confDropMajorSubmit(this.form)">
                <p><b>Drop Major</b></p>
                <label><b>Major ID</b></label>
                <input type="text" class="field" placeholder="Enter Major ID of major you would like to drop" name="major" required>

                <input type="submit" value="Submit">
                <button type="button" onclick="closeDropMajorForm()">Cancel</button>
            </form>
        </div>

        <div>
            <form method="post" class="formPopup" id="dropMinorForm" onsubmit="confDropMinorSubmit(this.form)">
                <p><b>Drop Minor</b></p>
                <label><b>Minor ID</b></label>
                <input type="text" class="field" placeholder="Enter Minor ID of minor you would like to drop" name="minor" required>

                <input type="submit" value="Submit">
                <button type="submit" onclick="">Cancel</button>
            </form>
        </div>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>