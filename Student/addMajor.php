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
        <title>Add Major</title>
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
    <h1>Add Major</h1>
        <form method="post" class="form" id="addSectionForm" action= "" onsubmit="return confirm('Are you sure you want to submit the form?')">
            <p><label for="semester"><b>Select your major: </b></label>
            <select name="semester" id="semester">
                <option value='0'>Mathematics</option>
                <option value='1'>Computer Science</option>
                <option value='99'>Childhood Education</option>
                <option value='98'>Visual Arts</option>
                <option value='97'>Psychology</option>
                <option value='96'>History</option>
                <option value='95'>English</option>
                <option value='94'>Biological</option>
            </select>
            <br><br>

            <p><input type="button" value="Submit">
            <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
         </form>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>