<?php 
	$baseURL = "http://localhost/RegistrationSystem";
	
	

	class User{
		public $username;
		public $type;

		public function __construct($username, $type){
			$this->username = $username;
			$this->type = $type;
		}
	}

	function connectToDB(){
	$DBservername = "localhost:3307";
	$DBusername = "root";
	$DBpassword = "arceus12";
	$DBname = "nhu";
		$conn = mysqli_connect($DBservername, $DBusername, $DBpassword, $DBname);

		// Check connection
		if (!$conn) {
			  die("Connection failed!: " . mysqli_connect_error());
		}
		echo "Connected successfully";
		return $conn;
	}

?>