
<div class="panel-body">
	<div class="col-sm-12 col-md-12">
		<div class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-addcertify" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add Certifying Agency</button></div></div>
		<table id="cerify_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="organization">Organization</th>
					<th data-column-id="effective_date">Most Recent Effective Date</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="add_certifymodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Certifications</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmcertify_add">
					<input type="hidden" value="add" name="action" id="action">
					  <div class="form-group">
						<label for="name" class="control-label">Organization:</label>
						<input type="text" class="form-control" id="add_certyorgan" name="add_certyorgan" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Most Recent Effective Date:</label>
						<input type="date" class="form-control" id="add_certydate" name="add_certydate" onchange="handler(event);"/>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_addcertify" class="btn btn-primary">Save</button>
				</div>
				
				</form>
			</div>
		</div>
	</div>
	<div id="edit_certifymodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Certifications</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmcertify_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_certyid" id="edit_certyid">
					  <div class="form-group">
						<label for="name" class="control-label">Organization:</label>
						<input type="text" class="form-control" id="edit_certyorgan" name="edit_certyorgan" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Most Recent Effective Date:</label>
						<input type="date" class="form-control" id="edit_certydate" name="edit_certydate" onchange="handler(event);"/>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_editcertify" class="btn btn-primary">Save</button>
				</div>
				
				</form>

			</div>
		</div>
	</div>	
</div>	
