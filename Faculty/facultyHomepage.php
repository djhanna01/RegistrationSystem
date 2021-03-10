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
        <title>Faculty Homepage</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="faculty.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "logout"
                        break;
                    case 1:
                        id = "editGrade"
                        break;
                    case 2:
                        id = "coursesTaught"
                        break;
                    case 3:
                        id = "advisees"
                        break;
                    case 4:
                        id = "changePass"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
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
            <h1>Welcome, Faculty!</h1>
        </div>
        <div class="linkContainer">
            <div class="buttonContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(1)">
                <h3>Edit Student's grade</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(2)">
                <h3>View list of courses taught</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(3)">
                <h3>View list of advisees</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(4)">
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
                <button type="submit" onclick="closeDropMinorForm()">Cancel</button>
            </form>
        </div>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>