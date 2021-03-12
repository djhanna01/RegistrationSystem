<!doctype html>
<html lang="en">
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="faculty.css">
    </head>
    <body>
        <h1>List of students you advise:</h1> 
    </body>
</html>
