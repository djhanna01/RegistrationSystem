
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
	if ($result->num_rows == 1) {

        $row = $result->fetch_row();
                
        setcookie("userID", $row[2], time() + (86400/24), "/");
	
		setcookie("user", $username, time() + (86400 /24), "/"); // 86400 = 1 day

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
          session_abort();
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