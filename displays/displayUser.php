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

<meta charset="utf-8">
<link rel="stylesheet" href="display.css">
<?php

$userID = $_POST['userID'];
$conn = connectToDB();
$sql = "SELECT user.* , LoginInfo.email
FROM user 
LEFT JOIN LoginInfo ON LoginInfo.userID = user.userID
WHERE user.userID = $userID";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_row();

$fullName = "$row[1] $row[2] $row[3]";
$gender = $row[4];
$address = "$row[5], $row[6], $row[7], $row[8]";
$phoneNum = $row[9];
$userType = $row[10];
$email = $row[11];

?>

</head>
<body>

<?php
echo "<h1>$userType</h1>";

echo "
        <label for='fullName'><b>Full Name:</b> $fullName </label>
        <br></br>
        <label for='gender'><b>Gender:</b> $gender</label>
        <br></br>
        <label for='address'><b>Address:</b> $address </label>
        <br></br>
        <label for='phoneNumber'><b>Phone Number:</b> $phoneNum </label>
        <br></br>
        <label for='email'><b>Email Address:</b> $email </label>
        <br></br>
        ";

?>


</body>
</html>