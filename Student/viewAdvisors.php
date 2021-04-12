<!doctype html>

<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Student"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>View Advisors</title>
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
        <h1>Advisors</h1>
        <?php
            $userID = $_COOKIE['userID'];

            $conn = connectToDB();

            //Lists the userID, name, email, and the student's ID who is being advised.
            $sql = "SELECT
            User.FName,
            User.LName,
            logininfo.email,
            Advises.studentID
            FROM User 
            LEFT JOIN logininfo ON User.userID = logininfo.userID
            LEFT JOIN advises ON User.userID = Advises.facultyID
            WHERE studentID = $userID";

            echo "
        <table>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Student's ID who is being advised.</th>
        </tr>
        </thead>
        <tbody>
        ";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "</tr>";
          } 
          echo "
          </tbody>
          </table>
          ";
        
        ?>
    </body>
</html>