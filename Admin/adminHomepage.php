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
        <link rel="stylesheet" type="text/css" href="adminHomepage.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "homepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }

            function addStudentAccount(){
                document.getElementById("addStudentAccount").style.display = "block";
            }
            function updateStudentAccount(){
                document.getElementById("updateStudentAccount").style.display = "block";
            }
            function addFacultyAccount(){
                document.getElementById("addFacultyAccount").style.display = "block";
            }
            function updateFacultyAccount(){
                document.getElementById("updateFacultyAccount").style.display = "block";
            }
            function addResearcherAccount(){
                document.getElementById("addResearcherAccount").style.display = "block";
            }
            function updateResearcherAccount(){
                document.getElementById("updateResearcherAccount").style.display = "block";
            }
            function addAdminAccount(){
                document.getElementById("addAdminAccount").style.display = "block";
            }
            function updateAdminAccount(){
                document.getElementById("updateAdminAccount").style.display = "block";
            }
            function removeAccount(){
                document.getElementById("removeAccount").style.display = "block";
            }
            function assignFacultyAdvisor(){
                document.getElementById("addFacultyAdvisor").style.display = "block";
            }
            function removeFacultyAdvisor(){
                document.getElementById("removeFacultyAdvisor").style.display = "block";
            }
            function viewAdvisors(){
                document.getElementById("viewAdvisors").style.display = "block";
            }
            function viewEnrolledStudents(){
                document.getElementById("viewEnrolledStudents").style.display = "block";
            }
            function addCourseSection(){
                document.getElementById("addCourseSection").style.display = "block";
            }
            function updateCourseSection(){
                document.getElementById("updateCourseSection").style.display = "block";
            }
            function removeCourseSection(){
                document.getElementById("removeCourseSection").style.display = "block";
            }
            function addHold(){
                document.getElementById("addHold").style.display = "block";
            }
            function removeHold(){
                document.getElementById("removeHold").style.display = "block";
            }
            function addCoursePrerequisite(){
                document.getElementById("addCoursePrerequisite").style.display = "block";
            }
            function removeCoursePrerequisite(){
                document.getElementById("removeCoursePrerequisite").style.display = "block";
            }
            function viewCourseList(){
                document.getElementById("viewCourseList").style.display = "block";
            }
            function registerStudentToCourse(){
                document.getElementById("registerStudentToCourse").style.display = "block";
            }
            function addFacultyAccount(){
                document.getElementById("addFacultyAccount").style.display = "block";
            }
            function showChangePassForm(){
                document.getElementById("changePassForm").style.display = "block";
            }
            function closeChangePassForm(){
                document.getElementById("changePassForm").style.display = "none";
            }

            function confDropClassSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
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
            <h1>Welcome, Admin!</h1>
        </div>
        <div class="linkContainer">
            <div class="buttonContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>
           
            <div class="buttonContainer">
                <h3>Add Student Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Update Student Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Faculty Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Update Faculty Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Reseacher Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Update Reseacher Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Admin Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Update Admin Account</h3>
            </div>

            <div class="buttonContainer">
                <h3>Remove Account</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>Assign Faculty Advisor to Student</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>Remove Faculty Advisor from Student</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>View Advisors</h3>
            </div>
            
            <div class="buttonContainer">
                <h3>View Enrolled Students</h3>
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

            <div class="buttonContainer">
                <h3>View Courses</h3>
            </div>

            <div class="buttonContainer">
                <h3>Register Student to Course</h3>
            </div>
            
            <div class="buttonContainer" onclick="showChangePassForm()">
                <h3>Change Password</h3>
            </div>
        </div>
        
        <div>
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
        </div>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>