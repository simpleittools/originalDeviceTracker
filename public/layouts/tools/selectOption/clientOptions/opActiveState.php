<?php
	echo "<select class='form-control' name='status'>";
	//Move this to a function
		global $con;
		$sql="SELECT  FROM permissions";
		foreach ($con->query($sql) as $endUserPermission){
			if ($endUserPermission[id] == $userPermission){
				echo "<option value=$endUserPermission[id] selected>$endUserPermission[level]</option>";
			} else {
				echo "<option value=$endUserPermission[id]>$endUserPermission[level]</option>";
			}
		}
	
	echo "</select>";
?>