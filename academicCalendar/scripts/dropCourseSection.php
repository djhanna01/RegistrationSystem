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
    $sql = "SELECT CRN FROM CourseSection WHERE CRN = " . $section;
    $result = mysqli_query($conn, $sql);

    if($result > 0){
        echo "Successfully found and dropped section: $section!";
        echo $userID;

        $sql = "DELETE FROM enrollment WHERE studentID = ". $userID ." && CRN = " . $section;
        mysqli_query($conn, $sql);
    }
    else{
        echo "Could not find Section: $section.";
    }


?>

<script type="text/javascript">
window.onload = function() {

    history.go(-1);
    
};
    </script>
</body>
</html>