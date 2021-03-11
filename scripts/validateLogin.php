
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
	if ($result->num_rows == 1) {
	
		setcookie("user", $username, time() + (86400 /24), "/"); // 86400 = 1 day

        $row = $result->fetch_row();
        $userType = row[3];
        if(strcmp($row[3], "Student") == 0){
            header("Location:  $baseURL/Student/studentHomepage.php");
        }
        else if(strcmp($row[3], "Admin") == 0){
            header("Location:  $baseURL/Admin/adminHomepage.php");
        }
        else if(strcmp($row[3], "Faculty") == 0){
            header("Location:  $baseURL/Faculty/facultyHomepage.php");
        }
        else{
          echo "Invalid user: ". $row[3];
        }
  	}
    else if($result->num_rows < 0){
        echo "Invalid credentials";
    }
    else{
        echo "DUPLICATE ENTRY";
    }

	mysqli_close($conn);
	die();
?>
</body>
</html>