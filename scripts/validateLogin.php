
<html>
<body>

<?php 

	include '../global.php';
    $username = "'" . $_POST['email'] . "'";
    $password = "'" . $_POST['password'] . "'";
    echo $username;

    $conn = connectToDB();
    $sql = "SELECT * FROM LoginInfo WHERE email = " . $username . " && pWord = " . $password;
			
    $result = mysqli_query($conn, $sql);
    echo is_null($conn);
	if ($result->num_rows > 0) {
  		echo "it worked!!!!";
  	}
    else {
        echo "it did not work...";
    }

	mysqli_close($conn);
	die();
?>
</body>
</html>