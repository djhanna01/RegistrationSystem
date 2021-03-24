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
        <title>Add Course Prerequisites</title>
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
            function confAddCoursePrerequisiteSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Add Course Prerequisites</h1>

        <div>
            <form method="post" class="form" onsubmit="confAddCoursePrerequisiteSubmit(this.form)">
                <p><b>Enter the Course CRN. (This course will need the prerequisites to be completed.) </b></p>

                <p><label><b>CRN: </b></label>
                <input type="text" class="field" placeholder="CRN #" name="CRN" required></p>
                <br></br>

                <p><b>Enter the Course CRN. (These courses will be assigned as the prerequisites.)  </b></p>

                <p><label><b>CRN of the course that will be assigned as prerequisite: </b></label>
                <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required></p>

                <label for="gradeRequirement"><b>Minimum Grade Required (<b class="gradeRequirement">MGR</b>) for the course: </b></label>
                    <select name="gradeRequirement" id="gradeRequirement">
                        <option value = "C">C</option>
                        <option value = "C-">C-</option>    
                        <option value = "D+">D+</option>
                        <option value = "D">D</option>
                    </select>
                <br></br>

                <p><b>Additional Prerequisites</b></p>

                <div>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>

                    <label class="gradeRequirement"><b>MGR </b></label><b>:</b>
                        <select name="gradeRequirement" id="gradeRequirement">
                            <option value = "C">C</option>
                            <option value = "C-">C-</option>    
                            <option value = "D+">D+</option>
                            <option value = "D">D</option>
                        </select>
                    <br></br>
                </div>

                <div>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>

                    <label class="gradeRequirement"><b>MGR </b></label><b>:</b>
                        <select name="gradeRequirement" id="gradeRequirement">
                            <option value = "C">C</option>
                            <option value = "C-">C-</option>    
                            <option value = "D+">D+</option>
                            <option value = "D">D</option>
                        </select>
                    <br></br>
                </div>

                <div>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>

                    <label class="gradeRequirement"><b>MGR </b></label><b>:</b>
                        <select name="gradeRequirement" id="gradeRequirement">
                            <option value = "C">C</option>
                            <option value = "C-">C-</option>    
                            <option value = "D+">D+</option>
                            <option value = "D">D</option>
                        </select>
                    <br></br>
                </div>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
        
        
    </body>
</html>