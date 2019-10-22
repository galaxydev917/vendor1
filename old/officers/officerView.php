
<div class="panel-body">
	<div class="col-sm-12 col-md-12">
		<div class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-addofficer" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add New Officer</button></div></div>
		<table id="officer_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="officer_name">Officer Name</th>
					<th data-column-id="officer_position">Officer Position</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="add_officermodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Officer</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmofficer_add">
					<input type="hidden" value="add" name="action" id="action">
					  <div class="form-group">
						<label for="name" class="control-label">Officer Name:</label>
						<input type="text" class="form-control" id="add_officername" name="add_officername" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Officer Position:</label>
						<input type="text" class="form-control" id="add_ownerposition" name="add_ownerposition" onchange="changeInputState(this)"/>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_addofficer" class="btn btn-primary">Save</button>
				</div>
				
				</form>
			</div>
		</div>
	</div>
	<div id="edit_officermodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Officer</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmofficer_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_officerid" id="edit_officerid">
					  <div class="form-group">
						<label for="name" class="control-label">Officer Name:</label>
						<input type="text" class="form-control" id="edit_officername" name="edit_officername" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="salary" class="control-label">Officer Position:</label>
						<input type="text" class="form-control" id="edit_ownerposition" name="edit_ownerposition" onchange="changeInputState(this)"/>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_editofficer" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
</div>	
