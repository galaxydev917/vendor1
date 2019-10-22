
<div class="panel-body">
	<div class="col-sm-12 col-md-12">
		<div style="display: none" class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-addsales" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add Sales/Income</button></div></div>
		<table id="sales_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="sales_year">Year</th>
					<th data-column-id="gross">Gross Sales ($)</th>
					<th data-column-id="income">Net Income ($)</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
				
			</thead>
		</table>
	</div>
	<div id="add_salesmodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Sales</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmsales_add">
					<input type="hidden" value="add" name="action" id="action">
					  <div class="form-group">
						<label for="name" class="control-label">Year:</label>
						<input type="number" class="form-control" id="add_salesyear" name="add_salesyear" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Gross Sales:</label>
						<input type="number" class="form-control" id="add_salesgross" name="add_salesgross" />
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Net Income:</label>
						<input type="number" class="form-control" id="add_salesincome" name="add_salesincome" />
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_addsales" class="btn btn-primary">Save</button>
				</div>
				
				</form>
			</div>
		</div>
	</div>
	<div id="edit_salesmodel" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Sales</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frmsales_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_salesid" id="edit_salesid">
					  <div class="form-group">
						<label for="name" class="control-label">Year:</label>
						<input type="text" class="form-control" id="edit_salesyear" name="edit_salesyear" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="salary" class="control-label">Gross Sales:</label>
						<input type="text" class="form-control" id="edit_salesgross" name="edit_salesgross" />
					  </div>
					  <div class="form-group">
						<label for="salary" class="control-label">Net Income:</label>
						<input type="text" class="form-control" id="edit_salesincome" name="edit_salesincome" />
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_editsales" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
</div>	
