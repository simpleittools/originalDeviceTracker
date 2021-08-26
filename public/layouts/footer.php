						
			</div>
			<!--Right Sidebar Div-->
			</div>	
			</div><!--End Main Form Div-->
			<br>  
				<!-- Support Modal Form -->
				  <div class="modal fade" id="supportModal" role="dialog">
				    <div class="modal-dialog modal-lg">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <!-- <h4 class="modal-title">Modal Header</h4> -->
				        </div>
				        <div class="modal-body">
				          <?php include ("./layouts/forms/frmSupport.php");?>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>
							
				<div class="header-footer-border"></div>
				<div class="p-3 bg-dark text-white row" id='footer'>
					<div>
					<!-- <?php echo $company;?><br>
					<?php echo $company_street_address;?><br>
					<?php echo $company_street_address_2;?><br>
					<?php echo $company_city;?>,
					<?php echo $company_state;?>
					<?php echo $company_zip_code;?> -->
					
					</div>
					<div class="pull-right ml-auto">
						<?php //include('./layouts/tools/buttons/modalTest.php');?>
						<button type="button" class="btn confirmButton" data-toggle="modal" data-target="#supportModal">
							Feedback/Support
						</button>
						
					</div>
				</div>
				<div class="header-footer-border"></div>

		</div><!--End main container-->
		    

		<script src="includes/js/menu_rotate.js"></script>
		
		
	</body>
</html>