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
 dropSection
</head>

<body>
<?php 
    $section =  $_POST['section'];
    $userID = $_COOKIE['userID'];
    $conn = connectToDB();
    $sql = "SELECT CRN FROM enrollment WHERE studentID = $userID && CRN = " . $section;
    $result = mysqli_query($conn, $sql);

    if($result->num_rows <= 0){
        echo "Something went wrong <br>";
        die();
    }

    $sql = "DELETE FROM enrollment WHERE studentID = ". $userID ." && CRN = " . $section;
    $result = mysqli_query($conn, $sql);

    if(!$result){
        $sql = "UPDATE coursesection set seatsAvailable = seatsAvailable + 1 WHERE CRN = " . $section;
        $result = mysqli_query($conn, $sql);
        if(!$result){echo "something went wrong with seatsAvailable += 1 <br>";die();}
        $sql = "UPDATE coursesection set seatsTaken = seatsTaken -1 WHERE CRN = " . $section;
        $result = mysqli_query($conn, $sql);
        if(!$result){echo "something went wrong with seatsTaken -= 1 <br>";die();}
    }

?>

</body>
</html>