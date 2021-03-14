<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>Remove Course Prerequisites</title>
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
            function confRemoveCoursePrerequisiteSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Remove Course Prerequisites</h1>

        <div>
            <form method="post" class="form" onsubmit="confRemoveCoursePrerequisiteSubmit(this.form)">
                <p><b>Enter the Course CRN. (This course will have the prerequisites removed as requirements.) </b></p>

                <p><label><b>CRN: </b></label>
                <input type="text" class="field" placeholder="CRN #" name="CRN" required></p>
                <br></br>

                <p><b>Enter the Course CRN. (These courses will be removed as the prerequisites.)  </b></p>

                <p><label><b>CRN of the course that will be removed as a prerequisite: </b></label>
                <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required></p>

                <br></br>


                <p><b>Additional Prerequisites to Remove</b></p>

                <p>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>
                </p>

                <p>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>
                </p>

                <p>
                    <label><b>CRN: </b></label>
                    <input type="text" class="field" placeholder="Course CRN" name="CourseCRN" required>
                </p>
                <br></br>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>

        <?php

        $conn = connectToDB();
        //php code here

        ?>
        
        
    </body>
</html>