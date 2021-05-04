<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Researcher"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>View Student by Gender</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Researcher.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "researcherHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
        <style>
            table,tr,th,td{
                border:3px solid black;
                background-color:orange;
                color:black;
            }
        </style>
    </head>
    <body>
    <h1>List of Students</h1>
        <?php
            $userID = $_COOKIE['userID'];

            $conn = connectToDB();

                $sql = "SELECT User.userID, User.gender
                FROM User
                INNER JOIN student 
                ON User.userID = student.userID
                WHERE User.userType = 'Student'";
         
            echo "
                <table>
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                ";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_row()) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "</tr>";
                } 
                echo "
                </tbody>
                </table>
                ";
            die();
        ?>

    </body>
</html>