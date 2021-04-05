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
        <title>Add Semester</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="admin1.css">
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
        <h1>Time Window for Semester Registration Date</h1>
        <div>
            <form method="post" class="form" action= "../scripts/addSemester.php" onsubmit="return confirm('Are you sure you want to submit the form?')">
                <p><b>Add Semester</b></p>

                <p><label for ="StartDate">Start Date: </label>
                <input type="date" id="StartDate" name="StartDate"></p>

                <p><label for ="EndDate">End Date: </label>
                <input type="date" id="EndDate" name="EndDate"></p>

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