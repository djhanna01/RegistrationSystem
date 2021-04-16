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
        <title>List Of All Advisors</title>
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

        <h1>List Of All Advisors</h1>
        <?php

        $conn = connectToDB();
        //php code here


        ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FName</th>
                        <th>LName</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Faculty Type</th>
                        <th>Course Load</th>
                    </tr>
                <thead>
            </table>
    </body>
        
</html>