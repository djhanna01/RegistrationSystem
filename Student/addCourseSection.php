<!doctype html>
<html lang="en" class="page">
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Student"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
    <head>
        <title>Add Course Section</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="student.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "studentHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>
    <body>
        <form method="post" class="form" id="addSectionForm" action= "../scripts/registerForCourse.php" onsubmit="return confirm('Are you sure you want to submit the form?')">
            <p><b>Add Class</b></p>
            <label><b>CRN</b></label>
            <input type="text" class="field" placeholder="Enter CRN of section you would like to add" name="CRN" required>

            <p><input type="button" value="Submit" onclick="confDropClassSubmit(this.form)">
            <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
         </form>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>