
<!doctype html>
<html lang="en">
<?php 
	session_start();
	include 'global.php';

	header("Location:  $baseURL/homepage/homepage.php"); 
	die();	
?>

    <head>
        <title>NHU Index</title>
        <meta charset="utf-8">

    </head>
    
    <body>
        <p>If you are not redirected, 
            <a href="http://localhost:8080/project/homepage/homepage.php">this</a>
        </p>


    </body>
</html>