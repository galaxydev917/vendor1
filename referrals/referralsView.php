
<div class="panel-body">
	<div class="col-sm-12 col-md-12">
		<div class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-addreferrals" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add Major Client Reference</button></div></div>
		<table id="referrals_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="client">Business Client Name</th>
					<th data-column-id="poc_name">Contact Name </th>
					<th data-column-id="poc_email">Contact Email</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="add_referralsmodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Referrals</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmreferrals_add">
					<input type="hidden" value="add" name="action" id="action">
					  <div class="form-group">
						<label for="name" class="control-label">Business Client:</label>
						<input type="text" class="form-control" id="add_clientname" name="add_clientname" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Name:</label>
						<input type="text" class="form-control" id="add_contactname" name="add_contactname" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Title:</label>
						<input type="text" class="form-control" id="add_contacttitle" name="add_contacttitle" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Address:</label>
						<input type="text" class="form-control" id="add_contactaddress" name="add_contactaddress" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Phone:</label>
						<input type="text" class="form-control" id="add_contactphone" name="add_contactphone" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Fax:</label>
						<input type="text" class="form-control" id="add_contactfax" name="add_contactfax" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Email:</label>
						<input type="text" class="form-control" id="add_contactemail" name="add_contactemail" />
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_addreferrals" class="btn btn-primary">Save</button>
				</div>
				
				</form>
			</div>
		</div>
	</div>
	<div id="edit_referralsmodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Sales</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmreferrals_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_referralsid" id="edit_referralsid">
					  <div class="form-group">
						<label for="name" class="control-label">Client Name:</label>
						<input type="text" class="form-control" id="edit_clientname" name="edit_clientname" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Name:</label>
						<input type="text" class="form-control" id="edit_contactname" name="edit_contactname" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Title:</label>
						<input type="text" class="form-control" id="edit_contacttitle" name="edit_contacttitle" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Address:</label>
						<input type="text" class="form-control" id="edit_contactaddress" name="edit_contactaddress" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Phone:</label>
						<input type="text" class="form-control" id="edit_contactphone" name="edit_contactphone" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Fax:</label>
						<input type="text" class="form-control" id="edit_contactfax" name="edit_contactfax" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Contact Email:</label>
						<input type="text" class="form-control" id="edit_contactemail" name="edit_contactemail" />
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_editreferrals" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
</div>	
