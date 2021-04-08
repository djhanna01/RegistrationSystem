<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || ($_COOKIE['userType'] != "Admin" && $_COOKIE['userType'] != "Faculty")){
        header("Location:  $baseURL/homepage/homepage.php"); 
          die();
      }
?>
<html lang="en">
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="display.css">
<script type="text/javascript">
  function sendRedirectForm(value){
                

    var submissionFrom = document.getElementById("redirectForm"); 

    submissionFrom.innerHTML = "<input type = \"hidden\" name = \"courseID\" value = "+ value +" />" +
    "<input type = \"hidden\" name = \"backPage\" value = \"homepage\" />";

    submissionFrom.submit();
    }
    function sendGoToCourseForm(value){
                var submissionFrom = document.getElementById("gotoCourse"); 
            
                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"courseID\" value = "+ value +" />" +
                "<input type = \"hidden\" name = \"backPage\" value = \"homepage\" />";
            
                submissionFrom.submit();
                }
             
</script>

</head>
<body>
<form action= "../scripts/redirect.php" method="post" id="redirectForm">
<p><button type="submit">Back</button>


<?php 
    $CRN = $_POST['CRN'];
    
    $conn = connectToDB();
    $sql = "SELECT coursesection.*, user.FName, user.LName
                FROM courseSection
                LEFT JOIN user ON user.userID = coursesection.facultyID
                WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    //set variables here later

    if(!$result){
        echo "Something went wrong! $CRN";
    }

    $sql = "SELECT enrollment.studentID, user.FName, user.LName, enrollment.enrollDate, enrollment.grade from enrollment
                LEFT JOIN user ON user.userID = enrollment.studentID
                WHERE enrollment.CRN = $CRN";
    $result = mysqli_query($conn, $sql);


  echo "
  <h4>Fall 2021</h4>
<table>
<thead>
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Enroll Date</th>
<th>Grade</th>
</tr>
</thead>
<tbody>  
";


    while ($row = $result->fetch_row()) {
      echo "<tr>";
      echo "<td>$row[0]</td>";
      echo "<td>$row[1] $row[2]</td>";
      echo "<td>$row[3]</td>";
      echo "<td>$row[4]</td>";
    } 
    echo "
    </tbody>
    </table>
    ";
  


?>
</body>
</html>