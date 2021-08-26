<?php include ("./layouts/tools/userInsert.php");?>
<?php
	$user_set = find_all_users();
?>
<!-- Modal Prep -->
<div class="modal fade" id="newUserModal" role="dialog">
	<div class="modal-dialog modal-lg">
	
		<!-- Modal content-->
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div> -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<br>
				<?php include ("./layouts/forms/frmNewUser.php");?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	
	</div>
</div>
<div class="modal fade" id="userListModal" role="dialog">
	<div class="modal-dialog modal-lg">
	
		<!-- Modal content-->
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div> -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<br>
				<?php include ("./layouts/tables/tblUserList.php");?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	
	</div>
</div>
<!-- End Modal Prep -->

<!-- Buttons -->
<div class=row>
	<div class="report-border report-box">
		<div class="report-listing">
			<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#newUserModal">
				Add User
			</button><!-- <a href="inactiveClientLookup.php" >Add User</a> -->
		</div>
	</div>
	<div class="report-border report-box">
		<div class="report-listing">
			<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#userListModal">
				User List
			</button>
		</div>
	</div>
	<div class="report-border report-box">
		<div class="report-listing">
			<a ></a>
		</div>
	</div>
</div>