
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
        <link rel="stylesheet" type="text/css" href="studentHomepage.css">
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

            function showForm(){
                document.getElementById("dropSectionForm").style.display = "block";
            }
            function closeForm(){
                document.getElementById("dropSectionForm").style.display = "none";
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

            <div class="buttonContainer" onclick="showForm()">
                <h3>Drop Class</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Major</h3>
            </div>

            <div class="buttonContainer">
                <h3>Drop Major</h3>
            </div>

            <div class="buttonContainer">
                <h3>Add Minor</h3>
            </div>

            <div class="buttonContainer">
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

            <div class="buttonContainer">
                <h3>Change Password</h3>
            </div>
        </div>
        
        <div>
            <form method="post" class="formPopup" id="dropSectionForm">
                <p><b>Drop Class</b></p>
                <label><b>CRN</b></label>
                <input type="text" class="field" placeholder="Enter CRN of section you would like to drop" name="section" required>

                <button type="submit">Submit</button>
                <button type="submit" onclick="closeForm()">Cancel</button>
            </form>
        </div>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>