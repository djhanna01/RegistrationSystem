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
        <title>Update Researcher's Account</title>
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
        </script>
    </head>
    <body>
        <div>
            <form method="post" class="form" action="updateResearcherAccount.php" onsubmit="return confirm('Are you sure you want to submit the form?')">
                <p><b>Enter Researcher's ID Number to Configure Changes into their Account</b></p>
                
                <p><label><b>Researcher ID: </b></label>
                <input type="text" class="field" placeholder="Researcher ID #" name="ID" required></p>
                <br></br>
                <p>Only enter information in the fields you wish to change</p>

                <label><b>First Name: </b></label>
                <input type="text" class="field" placeholder="First Name of Researcher" name="FName">
                
                <p><label><b>Last Name: </b></label>
                <input type="text" class="field" placeholder="Last Name of Researcher" name="LName" ></p>
                
                <p><label><b>Email: </b></label>
                <input type="text" class="field" placeholder="Researcher Email" name="Email"></p>

                <p><label><b>Gender</b></label>
                <select name="Gender" id="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>