
<div class="panel-body">
	<div class="col-sm-12 col-md-12" style="text-align:right; height:50px;">
		<select class="selectpicker" id="searchVendor" data-show-subtext="true" data-live-search="true" >
			<option selected disabled="disabled">Select Company..</option>
			<?php 
			foreach ($data as $key => $value) {?> 
				<option value="<?php echo $value['vendorid']; ?>"><?php echo $value['business_name']; ?></option>
			<?php } ?> 

		</select>
        <input class="btn btn-search" type="button" value="Search" id="searchBtn" >
	</div>
	<div class="col-sm-12 col-md-12" style="height:350px; overflow: auto;">

		<table id="vendor_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="date_signedup">Date Signup</th>
					<th data-column-id="last_name">Last name</th>
					<th data-column-id="first_name">First name</th>
					<th data-column-id="business_name">Business name</th>
					<th data-column-id="product_count">Product count</th>
					<th data-column-id="hq_status">Status</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="edit_vendormodel" class="modal fade">
		<div class="modal-dialog" style="width:400px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Approve Vendor</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_editvendor">
					<input type="hidden" value="edit" name="action_vendor" id="action_vendor">
					<input type="hidden" value="0" name="edit_vendorid" id="edit_vendorid">
					  <div class="form-group">
						<label for="name" class="control-label">Comment:</label>
						<textarea class="form-control" id="edit_commet" name="edit_commet" rows="8"></textarea>									

					  </div>
					  <div class="form-group">
							<label for="name" class="control-label">Status:</label>&nbsp;&nbsp;
							<select id="edit_status" style="width:150px; height:30px;">
								<option value="pending">Pending</option>
								<option value="accept">Accept</option>
								<option value="reject">Reject</option>
							</select>						
					   </div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_editvendor" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>	
