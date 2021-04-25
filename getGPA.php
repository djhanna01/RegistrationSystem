<html>
<head>
<?php 
    
    include 'global.php';
    set_time_limit(0);
?>
</head>
<?php
$conn = connectToDB();
$sql = "SELECT userID, studentType, numOfCredits FROM student WHERE userID = 100";

$superResult = mysqli_query($conn, $sql);


while($superRow = $superResult->fetch_row()){
    $studentID = $superRow[0];
    $studentType = $superRow[1];
    $numOfCredits = $superRow[2];

    
$sql = "SELECT COUNT(CRN) FROM enrollment
        WHERE grade is null && studentID = $studentID && CRN NOT IN
        (SELECT CRN FROM coursesection
        WHERE semesterID = 1)";

$result = mysqli_query($conn, $sql);
$row = $result->fetch_row();
echo $row[0];




}



?>

<body>

</body>
</html>
