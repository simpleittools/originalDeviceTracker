<?php
	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}
	
	function redirect_to_home($home) {
	  header("Location: " . $home);
	  exit;
	}
/*
Login Functions
*/

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
			redirect_to("index.php");
		}
	}
	function confirm_permission() {
		$user_id = $_SESSION['user_id'];
		global $con;
		$permission_set = $con->prepare("SELECT permission FROM users WHERE id = {$user_id} LIMIT 1");
		$permission_set->execute();
		return $permission_set->fetch(PDO::FETCH_ASSOC);
	}

/*End Login Functions*/

/*Validation Functions*/
	function validate_presences($required_fields) {
		global $errors;
		foreach($required_fields as $field) {
			$value = trim($_POST[$field]);
			if (!has_presence($value)) {
				$errors[$field] = fieldname_as_text($field) . " can't be blank";
			}
		}
	}
	
	function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}
	
	
	function validate_max_lengths($fields_with_max_lengths) {
		global $errors;
		// Expects an assoc. array
		foreach($fields_with_max_lengths as $field => $max) {
			$value = trim($_POST[$field]);
		  if (!has_max_length($value, $max)) {
		    $errors[$field] = fieldname_as_text($field) . " is too long";
		  }
		}
	}
	
	function fieldname_as_text($fieldname) {
		$fieldname = str_replace("_", " ", $fieldname);
		$fieldname = ucfirst($fieldname);
		return $fieldname;
	}
	
	function has_presence($value) {
		return isset($value) && $value !== "";
	}
/*End Validation Functions*/
?>