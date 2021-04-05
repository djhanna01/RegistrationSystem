<?php 
	$baseURL = "http://localhost:8080/Project";

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

?>