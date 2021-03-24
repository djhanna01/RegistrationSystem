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
        <title>Drop Minor</title>
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
            function confDropMinorSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else{
                    sendRedirectForm(0);
                }
            }  
        </script>
    </head>
    <body>
        <form method="post" class="form" id="dropMajorForm" onsubmit="return confDropMinorSubmit(this.form)">
            <p><b>Drop Minor</b></p>
            <label><b>Minor ID</b></label>
             <input type="text" class="field" placeholder="Enter Major ID of major you would like to drop" name="major" required>

            <p><input type="button" value="Submit" onclick="confDropMinorSubmit(this.form)">
            <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
        </form>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>