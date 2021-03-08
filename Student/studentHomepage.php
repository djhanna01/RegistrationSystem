
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
        <link rel="stylesheet" href="studentHomepage.css">
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
        </script>
    </head>
    
    <body>
        <div class="linkContainer">
            <div>
                <h1>Welcome, Student!</h1>
            </div>

            <div class="logOutContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>

            <div class="addClassContainer">
                <h3>Add Class</h3>
            </div>

            <div class="dropClassContainer">
                <h3>Drop Class</h3>
            </div>

            <div class="transcriptContainer">
                <h3>View Transcript</h3>
            </div>

            <div class="masterScheduleContainer">
                <h3>View Master Schedule</h3>
            </div>

            <div class="degreeAuditContainer">
                <h3>View Degree Audit</h3>
            </div>
        </div>
        
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>