
<div class="panel-body">
	<div class="col-sm-12">
		<div class="well clearfix">
			<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add New Product...</button></div></div>
		<table id="owner_grid" class="table table-condensed table-hover table-striped" cellspacing="0" data-toggle="bootgrid">
			<thead>
					<th data-column-id="image" data-formatter="image">Item</th>
					<th data-column-id="photofile" data-identifier="true" data-type="string" data-visible="false">Img src</th>						
					<th data-column-id="product_name" style="display:flex; justify-content:center; align-items:center;">Product Name</th>
					<th data-column-id="product_desc">Description</th>
					<th data-column-id="hq_status">Status</th>
					
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
				
			</thead>
		</table>
	</div>
	<div id="add_model" class="modal fade">
		<div class="modal-dialog" style="width:500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Product</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_add" enctype="multipart/form-data">
					<input type="hidden" value="add" name="action" id="action">
					<input type="hidden" value="" name="add_checkstate" id="add_checkstate">
					  <div class="form-group">
						<label for="name" class="control-label">Product Name:</label>
						<input type="text" class="form-control" id="add_productname" name="add_productname" onchange="changeInputState(this)"/>
					  </div>
					  <div class="form-group">
						<label for="name" class="control-label">Product Code:</label>
						<input type="text" class="form-control" id="add_productcode" name="add_productcode"/>
					  </div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Product Description</label>
									<textarea class="form-control" id="add_productdesc" name="add_productdesc" onchange="changeInputState(this)" rows="3"></textarea>									
								</div>
							  <div class="form-group">
								<label for="name" class="control-label">Does product have Links, Inc. logo?:</label>&nbsp;&nbsp;
									<select id="addcheckstate" style="width:150px; height:30px;">
									  <option value="1">Yes</option>
									  <option value="0">No</option>
									</select>						
							  </div>
								
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">

								<div class="form-group">
									<label>Product Photo</label>
									<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
								</div>
								<div id="add_targetLayer">
									<img id="add_PreviewImg"  style="width:200px; height:150px;"  />
								</div>

								
							</div>
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
					<h4 class="modal-title">Edit Product</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_edit">
					<input type="hidden" value="edit" name="action" id="action">
					<input type="hidden" value="0" name="edit_id" id="edit_id">
					  <div class="form-group">
						<label for="name" class="control-label">Product Name:</label>
						<input type="text" class="form-control" id="edit_productname" name="edit_productname" onchange="changeInputState(this)"/>
					  </div>
					  
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Product Description</label>
									<textarea class="form-control" id="edit_productdesc" name="edit_productdesc" onchange="changeInputState(this)" rows="8"></textarea>									
								</div>
								
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Product Photo</label>
									<input type="file" name="edituploadFile" id="edituploadFile" accept=".jpg, .png"/>
								</div>
								<div id="edittargetLayer">
									<img id="edit_PreviewImg"  style="width:200px; height:150px;"  />
								</div>
							</div>
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
