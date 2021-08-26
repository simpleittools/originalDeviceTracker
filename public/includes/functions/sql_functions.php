<?php
//include("./includes/config/db.php");
	/****************************************
		Start Device Search SQL functions
	****************************************/
	function device_search($search){
		$db = new DbConnect;
		$con = $db->connect();
		$query = "SELECT * FROM devices WHERE serial_number LIKE '%$search%' OR device_name LIKE '%$search%'	OR device_type LIKE '%$search%'";
		$result = $con->prepare($query);
		$result->execute();
		return $result->fetchAll();

	}
	
	function find_device_by_id($device_id) {
		$db = new DbConnect;
		$con = $db->connect();
		$query  = "SELECT * FROM devices WHERE id = $device_id";
		$result = $con->prepare($query);
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	
		function find_device_by_client($client_id) {
		$db = new DbConnect;
		$con = $db->connect();
		$query  = "SELECT * FROM devices WHERE c_id = $client_id";
		$result = $con->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}
	
	function find_device_status($status) {
		$db = new DbConnect;
		$con = $db->connect();
		$query  = "SELECT * FROM device_status WHERE id = $status";
		$result = $con->prepare($query);
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	
	
	/****************************************
		End Device Serch SQL functions
	****************************************/
	/****************************************
		Start Device Insert SQL functions
	****************************************/
	function backup_device_insert(){
		$result = 	$con->prepare(
					"INSERT INTO devices (device_name, serial_number, device_type, enabled, c_id, status, change_by_id)
					VALUES '{$device_name}', '{$serial_number}', '{$device_type}', '1', '{$c_id}', '{$status}', '{$user_id}'");
		$result->execute();
	}
	/****************************************
		End Device Insert SQL functions
	****************************************/	   

	    
	
	/*******************************
		Start Client SQL functions
	*******************************/
	function find_all_clients(){
		$db = new DbConnect;
		$con = $db->connect();
		$all_client_result = $con->query("SELECT * FROM clients ORDER BY client_name ASC");
		$all_client_result->execute();
		return $all_client_result->fetchAll();
	}
	
	function find_active_clients(){
		$db = new DbConnect;
		$con = $db->connect();
		$all_client_result = $con->query("SELECT * FROM clients WHERE enabled = 1 ORDER BY client_name ASC");
		$all_client_result->execute();
		return $all_client_result->fetchAll();
	}
	
		function find_inactive_clients(){
		$db = new DbConnect;
		$con = $db->connect();
		$all_client_result = $con->query("SELECT * FROM clients WHERE enabled = 2 ORDER BY client_name ASC");
		$all_client_result->execute();
		return $all_client_result->fetchAll();
	}
	
	function find_client_by_id($client_id) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$full_client_result = $con->prepare("SELECT * FROM clients WHERE id = $client_id");
		$full_client_result->execute();
		return $full_client_result->fetch(PDO::FETCH_ASSOC);
	}
	
	function find_client_name_by_id($client_id) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$client_name_result = $con->prepare("SELECT client_name FROM clients WHERE id = $client_id");
		$client_name_result->execute();
		return $client_name_result->fetch(PDO::FETCH_ASSOC);
	}
	
	function client_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$ops='';
		$all_client_result = $con->query("SELECT * FROM clients WHERE enabled = '1' ORDER BY client_name ASC ");
		while ($option = $all_client_result->fetch(PDO::FETCH_ASSOC)){
			$ops.= "<option value='" . $option['id'] . "'>" . $option['client_name'] . "</option>";
		}
		return $ops;
	}
	function new_client($client_name){
		$db = new DbConnect;
		$con = $db->connect();
		$insert= $con->query("INSERT INTO clients (client_name, enabled) VALUES '{$client_name}', '1'");
		$insert->execute(); 
	}
	

	/*******************************
		End Client SQL functions
	*******************************/
	
	/*******************************
		Start User SQL functions
	*******************************/
	function find_user_name_by_id($user_id) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$result = $con->prepare("SELECT FirstName FROM users WHERE id = $user_id");
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	function find_user_by_id($user_id) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$result = $con->prepare("SELECT * FROM users WHERE id = $user_id");
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	
	function find_user_by_username($username) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$user  = $con->prepare("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
		$user->execute();
		return $user->fetch(PDO::FETCH_ASSOC);
	}
	
	function permission_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$ops='';
		$all_Permission_Result = $con->query("SELECT * FROM permissions ORDER BY level_id ASC");
		while ($option = $all_Permission_Result->fetch(PDO::FETCH_ASSOC)){
			$ops.= "<option value='" . $option['id'] . "'>" . $option['level'] . "</option>";
		}
		return $ops;
	}
	function check_permission($user_id){
		$db = new DbConnect;
		$con = $db->connect();
		$permission_set = $con->query("SELECT Permission FROM users WHERE id = {$user_id} LIMIT 1");
		//$permission_set->execute();
		
		while($rows = $permission_set->fetch(PDO::FETCH_ASSOC)){
		$permission=$rows['Permission'];
		};
		return $permission;
	}
	
	function check_theme($user_id){
		$db = new DbConnect;
		$con = $db->connect();
		$themeSelect = $con->query("SELECT theme_id FROM users WHERE id = {$user_id} LIMIT 1");
		$themeSelect->execute();
		
		/*while($rows = mysqli_fetch_array($permission_set)){
		$permission=$rows['Permission'];
		};*/
		return $themeSelect->fetch(PDO::FETCH_ASSOC);
	}
	
	function user_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$ops='';
		$all_user_result = $con->query("SELECT * FROM users ORDER BY FirstName ASC");
		while ($option = $all_user_result->fetch(PDO::FETCH_ASSOC)){
			$ops.= "<option value='" . $option['id'] . "'>" . $option['FirstName'] . "</option>";
		}
		return $ops;
	}
	
	function find_all_users(){
		$db = new DbConnect;
		$con = $db->connect();
		$query = "SELECT * FROM users ORDER BY FirstName ASC";
		$user_set = $con->prepare($query);
		$user_set->execute();
		return $user_set->fetchAll();
	}
	
	/*******************************
		END User SQL functions
	*******************************/
	
	/*******************************
		Start Status functions
	*******************************/
	//checks items in
	function check_in($id){
		$date_change = date("Y.m.d h:i A");
		$user_id = $_SESSION['user_id'];
		$db = new DbConnect;
		$con = $db->connect();
		$check_in= $con->prepare("UPDATE devices SET date_change = '$date_change', change_by_id='$user_id', status='1' WHERE id='$id'");
		$check_in->execute();
		
	}
	//checks items out
	function check_out($id){
		$date_change = date("Y.m.d h:i A");
		$user_id = $_SESSION['user_id'];
		$db = new DbConnect;
		$con = $db->connect();
		$check_out=$con->prepare("UPDATE devices SET date_change = '$date_change', change_by_id='$user_id', status='2' WHERE id='$id'");
		$check_out->execute();

	}
	
	function frozen_out($id){
		$date_change = date("Y.m.d h:i A");
		$user_id = $_SESSION['user_id'];
		$db = new DbConnect;
		$con = $db->connect();
		$check_frozen = $con->prepare("UPDATE devices SET date_change = '$date_change', change_by_id='$user_id', status='4' WHERE id='$id'");
		$check_frozen->execute();
	}
	
	function frozen_in($id){
		$date_change = date("Y.m.d h:i A");
		$user_id = $_SESSION['user_id'];
		$db = new DbConnect;
		$con = $db->connect();
		$check_frozen=$con->prepare("UPDATE devices SET date_change = '$date_change', change_by_id='$user_id', status='3' WHERE id='$id'");
		$check_frozen->execute();
	}
	
	function device_Retire(){
		$db = new DbConnect;
		$con = $db->connect();
		$id=$_GET['id'];
		//echo $id;
		$check_out=$con->prepare("UPDATE devices SET status='5' WHERE id='$id'");
		$execute->execute();
	}

	function status_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$ops='';
		$all_status_result = $con->query("SELECT * FROM device_status ORDER BY id ASC LIMIT 5");
		while ($option = $all_status_result->fetch(PDO::FETCH_ASSOC)){
			$ops.= "<option value='" . $option['id'] . "'>" . $option['status'] . "</option>";
		}
		return $ops;
	}
	
	function client_device_status_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$ops='';
		$all_status_result = $con->query("SELECT * FROM device_status ORDER BY id LIMIT 2 OFFSET 5");
		while ($option = $all_status_result->fetch(PDO::FETCH_ASSOC)){
			$ops.= "<option value='" . $option['id'] . "'>" . $option['status'] . "</option>";
		}
		return $ops;
	}
	
	function find_client_status_by_id($status) {
		$db = new DbConnect;
		$con = $db->connect();
		
		$result = $con->prepare("SELECT * FROM status WHERE id = $status");
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	
	/*******************************
		End Status functions
	*******************************/
	
	/*Start Page Functions*/
	function page_select_loop(){
		$db = new DbConnect;
		$con = $db->connect();
		$startPageSelectOptions='';
		$all_page_result = $con->query("SELECT * FROM pages ORDER BY startPages ASC");
		while ($option = $all_page_result->fetch(PDO::FETCH_ASSOC)){
			$startPageSelectOptions.= "<option value='" . $option['url'] . "'>" . $option['startPages'] . "</option>";
		}
		return $startPageSelectOptions;
	}
	
	function page_select(){
		$db = new DbConnect;
		$con = $db->connect();
		$query = "SELECT * FROM pages ORDER BY startPages ASC";
		$startPageSelectOptions = $con->prepare($query);
		$startPageSelectOptions->execute();
		$startPageSelectOptions->fetch(PDO::FETCH_ASSOC);
		return $startPageSelectOptions;
	}
	
	function find_start_page($startPageId){
		$db = new DbConnect;
		$con = $db->connect();
		$query = "SELECT url FROM pages WHERE id = $startPageId";
		$startPages = $con->prepare($query);
		$startPages->execute();
		$startPages->fetch(PDO::FETCH_ASSOC);
		return $startPages;
	}
	
	/*Start Location Functions*/
	function find_all_locations(){
		$db = new DbConnect;
		$con = $db->connect();
		$all_location_result = $con->query("SELECT * FROM locations ORDER BY location ASC");
		$all_location_result->execute();
		return $all_location_result->fetch(PDO::FETCH_ASSOC);
	}
	
	
	function find_location_by_client_id($client_id){
		$db = new DbConnect;
		$con = $db->connect();
		$all_location_result = $con->query("SELECT * FROM locations WHERE c_id = $client_id ORDER BY location ASC" );
		$all_location_result->execute();
		return $all_location_result->fetchAll();
	}
	
	function find_location_by_id($location_id){
		$db = new DbConnect;
		$con = $db->connect();
		$location_result = $con->query("SELECT * FROM locations WHERE id = $location_id ORDER BY location ASC" );
		$location_result->execute();
		return $location_result->fetch(PDO::FETCH_ASSOC);
	}
?>