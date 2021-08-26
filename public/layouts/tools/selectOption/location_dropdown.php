
<html>
<head>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "connectdb.php"; ?>
<script>
function getLocation(val) {
	$.ajax({
	type: "POST",
	url: "get_location.php",
	data:'c_id='+val,
	success: function(data){
		$("#location-list").html(data);
	}
	});
}

function showMsg()
{

	$("#msgC").html($("#client-list option:selected").text());
	$("#msgS").html($("#location-list option:selected").text());
	return false;
}
</script>
<body >
	<form>
	<label style="font-size:20px" >Client:</label>
		<select name="client" id="client-list" class="demoInputBox"  onChange="getLocation(this.value);">
		<option value="">Select Client</option>
		<?php
		$sql1="SELECT * FROM clients";
         $results=$dbhandle->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["id"]; ?>"><?php echo $rs["client_name"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >Location:</label>
		<select id="location-list" name="location"  >
		<option value="">Select State</option>
		</select>
		<button value="submit" onclick="return showMsg()">Submit</button>
	</form>

		Selected Client: <span id="msgC"></span><br>
		Selected Location:  <span id="msgS"></span>
</body>
</html>