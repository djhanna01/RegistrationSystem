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
        <title>Admin Homepage</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="admin.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "homepage"
                        break;
                    case 1:
                        id = "addStudentAccount"
                        break;
                    case 2:
                        id = "updateStudentAccount"
                        break;
                    case 3:
                        id = "addFacultyAccount"
                        break;
                    case 4:
                        id = "updateFacultyAccount"
                        break;
                    case 5:
                        id = "addResearcherAccount"
                        break;
                    case 6:
                        id = "updateResearcherAccount"
                        break;
                    case 7:
                        id = "addAdminAccount"
                        break;
                    case 8:
                        id = "updateAdminAccount"
                        break;
                    case 9:
                        id = "removeAccount"
                        break;
                    case 10:
                        id = "assignFacultyAdvisor"
                        break;
                    case 11:
                        id = "removeFacultyAdvisor"
                        break;
                    case 13:
                        id = "listUnderGradStudents"
                        break;
                    case 14:
                        id = "listGradStudents"
                        break;
                    case 22:
                        id = "listCourses"
                        break;
                    case 24:
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
        </script>
    </head>
    
    <body>
        <div>
            <h1>Welcome, Admin!</h1>
        </div>
        <div class="linkContainer">
            <div class="buttonContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>
           
            <div class="buttonContainer" onclick="sendRedirectForm(1)">
                <h3>Add Student Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(2)">
                <h3>Update Student Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(3)">
                <h3>Add Faculty Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(4)">
                <h3>Update Faculty Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(5)">
                <h3>Add Reseacher Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(6)">
                <h3>Update Reseacher Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(7)">
                <h3>Add Admin Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(8)">
                <h3>Update Admin Account</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(9)">
                <h3>Remove Account</h3>
            </div>
            
            <div class="buttonContainer" onclick="sendRedirectForm(10)">
                <h3>Assign Faculty Advisor to Student</h3>
            </div>
            
            <div class="buttonContainer" onclick="sendRedirectForm(11)">
                <h3>Remove Faculty Advisor from Student</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>View Advisors</h3>
            </div>
            
            <div class="buttonContainer" onclick="sendRedirectForm(13)">
                <h3>View Enrolled Undergraduate Students</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(14)">
                <h3>View Enrolled Graduate Students</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>Add Course Section</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>Update Course Section</h3>
            </div>

            <div class="buttonContainer">
                <h3>Remove Course Section</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Hold</h3>
            </div>

            <div class="buttonContainer">
                <h3>Remove Hold</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Course Prerequisite</h3>
            </div>

            <div class="buttonContainer">
                <h3>Remove Course Prerequisite</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(22)">
                <h3>View Courses</h3>
            </div>

            <div class="buttonContainer">
                <h3>Register Student to Course</h3>
            </div>
            
            <div class="buttonContainer" onclick="sendRedirectForm(24)">
                <h3>Change Password</h3>
            </div>
        </div>
        
        <!--<div>
            <form method="post" class="formPopup" id="dropSectionForm" onsubmit="confDropClassSubmit(this.form)">
                <p><b>Drop Class</b></p>
                <label><b>CRN</b></label>
                <input type="text" class="field" placeholder="Enter CRN of section you would like to drop" name="section" required>

                <input type="submit" value="Submit">
                <input type="button" onclick="closeDropClassForm()" value="Cancel">
            </form>
        </div>

        <div>
            <form method="post" class="formPopup" id="changePassForm" onsubmit="confChangePassSubmit(this.form)">
                <p><b>Change Password</b></p>
                <label><b>Current Password</b></label>
                <input type="text" class="field" placeholder="Enter current password" name="oldPasword" required>

                <label><b>New Password</b></label>
                <input type="text" class="field" placeholder="Enter new password" name="newPasword" required>

                <label><b>Re-enter New Password</b></label>
                <input type="text" class="field" placeholder="Re-enter new password" name="reNewPasword" required>

                <input type="submit" value="Submit">
                <button type="submit" onclick="closeChangePassForm()">Cancel</button>
            </form>
        </div>-->

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>