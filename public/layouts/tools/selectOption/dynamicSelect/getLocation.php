<?php
	global $con
	$query ="SELECT * FROM locations WHERE c_id = '" . $_POST["c_id"] . "'";
	$results = $con->query($query);
?>
	<option value="">Select location</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["id"]; ?>"><?php echo $rs["location"]; ?></option>
<?php

}