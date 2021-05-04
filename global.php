<?php 
	$baseURL = "http://localhost:100/RegistrationSystem";

	class User{
		public $username;
		public $type;

		public function __construct($username, $type){
			$this->username = $username;
			$this->type = $type;
		}
	}

	function connectToDB(){
		$DBservername = "96.250.39.100:3307";
		$DBusername = "superUser";
		$DBpassword = "victor0dany1seb2";
		$DBname = "nhu";
		$conn = mysqli_connect($DBservername, $DBusername, $DBpassword, $DBname);

		// Check connection
		if (!$conn) {
			  die("Connection failed!: " . mysqli_connect_error());
		}
		return $conn;
	}

function setGPA($conn, $studentID){
		
$sql = "SELECT numOfCredits FROM student WHERE userID = $studentID";

$superResult = mysqli_query($conn, $sql);


while($superRow = $superResult->fetch_row()){
    
    $numOfCredits = $superRow[0];

    $sql = "SELECT grade From Enrollment WHERE studentID = $studentID && grade IS NOT NULL";
    $result = mysqli_query($conn, $sql);
    $gradePoints = 0;
    while($row = $result->fetch_row()){
        switch($row[0]){
            case "A":
                $gradePoints += 16;
                break;
            case "B":
                
                $gradePoints += 12;
                break;
            case "C":
                
                $gradePoints += 8;
                break;
            case "D":
                
                $gradePoints += 4;
                break;
            case "F":
                break;
            default:
                break;
            
        }
    }
   $GPA = $gradePoints/$numOfCredits;

   $sql = "UPDATE undergradstudent SET GPA = $GPA WHERE userID = $studentID";
   $result = mysqli_query($conn, $sql);
   $sql = "UPDATE gradstudent SET GPA = $GPA WHERE userID = $studentID";
   $result = mysqli_query($conn, $sql);

}


	}

?>