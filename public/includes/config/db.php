<?php


	session_start();
	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			$_SESSION["message"] = null;
			return $output;
		}
	}
	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			$_SESSION["errors"] = null;
			return $errors;
		}
	}

	class DbConnect {
		private $servername = "localhost";
		private $dbname = 'backuptracker2';
		private $username = "bu";
		private $password = "mGJWUcBVvp0pr90w";
	
		public function connect(){
			try {
			    $con = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
			    // set the PDO error mode to exception
			    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    //echo "Connected successfully"; 
			    return $con;
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }
		}
	}
?>