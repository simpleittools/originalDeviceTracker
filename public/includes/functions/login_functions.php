
<?php


	function password_encrypt($password) {
		$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
		$salt_length = 22; 					// Blowfish salts should be 22-characters or more
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
		// Not 100% unique, not 100% random, but good enough for a salt
		// MD5 returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));
		
		// Valid characters for a salt are [a-zA-Z0-9./]
		$base64_string = base64_encode($unique_random_string);
		
		// But not '+' which is valid in base64 encoding
		$modified_base64_string = str_replace('+', '.', $base64_string);
		
		// Truncate string to the correct length
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
		$hash = crypt($password, $existing_hash);
		if ($hash === $existing_hash) {
			return true;
			} else {
			return false;
		}
	}
	
	
	function attempt_login($username, $password) {
		$user = find_user_by_username($username);
		if ($user) {
			// found admin, now check password
			if (password_check($password, $user["hashed_password"])) {
				// password matches
				return $user;
			} else {
				// password does not match
				return false;
			}
		} else {
		// admin not found
		return false;
		}
	}
	
	//THIS FUNCTION CHECKS IF THE LOGGED IN USER
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	//THIS FUNCTION PREVENTS ACCESS TO PAGES IF THE USER IS NOT LOGGED IN
	function confirm_logged_in() {
		if (!isset($_SESSION['user_id'])) {
			redirect_to("login.php");
		}
	}
	function confirm_permission() {
		$user_id = $_SESSION['user_id'];
		global $con;
		$query  = "SELECT permission ";
		$query .= "FROM users ";
		$query .= "WHERE id = {$user_id} ";
		$query .= "LIMIT 1";
		$permission_set = mysqli_query($con, $query);
		return($permission_set);
	}

?>
