
<div class="panel-body">
	<div class="col-sm-12 col-md-12">
		<div class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add New Owner</button></div></div>
		<table id="owner_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="owner_name">Owner Name</th>
					<th data-column-id="owner_address">Owner Address</th>
					<th data-column-id="owner_pct">Owner Percent</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="add_model" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_add">
					<input type="hidden" value="add" name="action" id="action">
					  <div class="form-group">
						<label for="name" class="control-label">Owner Name:</label>
						<input type="text" class="form-control" id="add_ownername" name="add_ownername" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Owner Address:</label>
						<input type="text" class="form-control" id="add_owneraddress" name="add_owneraddress" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Owner Percent:</label>
						<input type="text" class="form-control" id="add_ownerpct" name="add_ownerpct" onchange="changeInputState(this)"/>
					  </div>
					  
					  <div class="form-group">
						<label for="email" class="control-label">Note:</label>
						<input type="text" class="form-control" id="add_notes" name="add_notes"/>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_add" class="btn btn-primary">Save</button>
				</div>
				
				</form>
			</div>
		</div>
	</div>
	<div id="edit_model" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Owner</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_id" id="edit_id">
					  <div class="form-group">
						<label for="name" class="control-label">Owner Name:</label>
						<input type="text" class="form-control" id="edit_ownername" name="edit_ownername" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="salary" class="control-label">Owner Address:</label>
						<input type="text" class="form-control" id="edit_owneraddress" name="edit_owneraddress" />
					  </div>
					  <div class="form-group">
						<label for="salary" class="control-label">Owner Percent:</label>
						<input type="text" class="form-control" id="edit_ownerpct" name="edit_ownerpct" onchange="changeInputState(this)"/>
					  </div>
					  <!--
					  <div class="form-group">
						<label for="email" class="control-label">Note:</label>
						<input type="text" class="form-control" id="edit_note" name="edit_note"/>
					  </div> -->
					  
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_edit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
</div>	
