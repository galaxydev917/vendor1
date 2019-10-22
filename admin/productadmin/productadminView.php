
<div class="panel-body">
	<div class="col-sm-4 col-md-4" style="text-align:right; height:50px;">
	&nbsp;
	</div>
	<div class="col-sm-3 col-md-3" style="text-align:right; height:50px;">
	</div>
	<div class="col-sm-5 col-md-5" style="text-align:right; height:50px;">

		<select class="selectpicker" id="searchProduct" data-show-subtext="true" data-live-search="true" >
			<option selected disabled="disabled">Select Company..</option>
			<?php 
			foreach ($data as $key => $value) {?> 
				<option value="<?php echo $value['vendorid']; ?>"><?php echo $value['business_name']; ?></option>
			<?php } ?> 

		</select>
        <input class="btn btn-search" type="button" value="Search" id="searchproductBtn" >
	</div>

	<div class="col-sm-12" style="height:350px; overflow: auto;">
		<table id="productadmin_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					
				<th data-column-id="id" data-formatter="image" data-header-align="center" data-align="center">Image</th>
				<th data-column-id="photofile" data-order="asc"  data-header-align="center" data-width="75%" data-type="string" data-visible="false">Img src</th>
				<th data-column-id="first_name" data-header-align="center" data-align="center">First Name</th>
				<th data-column-id="last_name"  data-header-align="center" data-align="center">Last Name</th>
				<th data-column-id="product_name" data-header-align="center" data-align="center">Product Name</th>
				<th data-column-id="hq_status" data-align="center" data-header-align="center">Status</th>
				<th data-column-id="commands" data-formatter="commands" data-sortable="false" data-header-align="center" data-align="center">Commands</th>									

					
			<!--	<th data-column-id="image" data-formatter="image" data-header-align="center">Image</th>
					<th data-column-id="photofile" data-identifier="true" data-type="string" data-visible="false">Img src</th>						
					<th data-column-id="first_name" data-align="center">First Name</th>
					<th data-column-id="last_name" data-align="center"  data-header-align="center">Last Name</th>
					<th data-column-id="product_name" data-align="center" data-header-align="center">Product Name</th>
					<th data-column-id="hq_status" data-align="center" data-header-align="center">Status</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false" style="display:flex; justify-content:center; align-items:center;">Commands</th>
				-->
			</thead>
		</table>
	</div>

	<div id="edit_model" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Product</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_edit">
					<input type="hidden" value="edit" name="edit_action" id="edit_action">

					<input type="hidden" value="0" name="edit_id" id="edit_id">
					  <div class="form-group">
						<label for="name" class="control-label">Product Name:</label>
						<input type="text" class="form-control" id="edit_productname" name="edit_productname"  readonly/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Product Description:</label>
						<input type="text" class="form-control" id="edit_productdesc" name="edit_productdesc"  readonly/>
					  </div>
					  <div class="form-group">
							<label for="name" class="control-label">Status:</label>&nbsp;&nbsp;
							<select id="hq_status" style="width:150px; height:30px;">
								<option value="Pending">Pending</option>
								<option value="Accepted">Accepted</option>
								<option value="Rejected">Rejected</option>
							</select>						
					   </div>
					   <div class="form-group">
						<label for="name" class="control-label">Comment:</label>
						<input type="text" class="form-control" id="hq_comments" name="hq_comments" />
					  </div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_edit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>		
	<div id="imageView_model" class="modal fade">
		<div class="modal-dialog" id="imageview_dialog">
			<div class="modal-content"  id="imageview_content" style="max-height:680px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					
				</div>
				<div class="modal-body">
					<img id="img_product" />
				</div>
			</div>
		</div>	
	</div>
</div>	
