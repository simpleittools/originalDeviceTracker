<div class="modal-body">
	<div class="container-fluid">
		<div>
		<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Contact Support</button>
		
		<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						<!-- <h4 class="modal-title">Modal Header</h4> -->
						</div>
						<div class="modal-body">
							<?php include ("../../forms/frmSupport.php");?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>