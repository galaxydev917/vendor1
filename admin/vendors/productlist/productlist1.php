<?php 
session_start();
if(empty(isset($_SESSION['vendorid']))){
 header("location:../index.php"); //to redirect back to "index.php" after logging out
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Official Links, Inc. Vendor Portal</title>
	
    <!-- css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="../stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="../css/nivo-lightbox.css" rel="stylesheet" />
	<link href="../css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="../css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="../css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="../bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="../color/default.css" rel="stylesheet">
	
	<link href="../css/jquery.bootgrid.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/dist/bootstrap.min.css" type="text/css" media="all">
	<!-- Core JavaScript Files -->
	
	
    <script src="../js/jquery.min.js"></script>	
	<script src="../js/jquery.bootgrid.min.js"></script>
	
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.scrollTo.js"></script>
	<script src="../js/jquery.appear.js"></script>
	<script src="../js/stellar.js"></script>
	<script src="../plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/nivo-lightbox.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="product.js"></script>

	
<style>

.group-image-div {

     width: 200px;
     height: 150px;
     background: #EEEEEE;
     background-position: center;
     background-size: cover;
}
.table-img{ 
 width: 120px; height: 100px; }
 
.error {
  border:1px solid red;
}
</style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-md-5">
						<p style = "font-family:georgia,garamond,serif;font-size:26px;font-style:bold;">Licensed Vendor Application</p>
					</div>
					<div class="col-sm-5 col-md-5" style="margin-top:15px;">
						<p class="bold text-center">
						
						<font color="#FFFF00"><span style="text-decoration: none">Application status: <?php echo $_SESSION["status"]; ?></span></font></p>
					</div>
					<div class="col-sm-1 col-md-1" style="margin-top:15px;">
						<p class="bold text-right">
						<a href="../first.php">
						<font color="#FFFFFF"><span style="text-decoration: none">Owners</span></font></a></p>
					</div>
					
					<div class="col-sm-1 col-md-1" style="margin-top:15px;">
						<p class="bold text-left">
						<a href="../logout.php">
						<font color="#FFFFFF"><span style="text-decoration: none">Logout</span></font></a></p>
					</div>
					
				</div>
			</div>
		</div>
        
        <!-- /.container -->
    </nav>
	</div>
	<div class="container">
      <div class="" style="margin-top:150px;">
        <div class="col-sm-12">
			<div class="well clearfix">
				<div class="pull-left"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
				<span class="glyphicon glyphicon-plus"></span> Add New Product</button></div></div>
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
      </div>
    </div>
	<div id="add_model" class="modal fade">
		<div class="modal-dialog" style="width:500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Product</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="frm_add">
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
					  <div class="form-group">
						<label for="name" class="control-label">Product or Service:</label>&nbsp;&nbsp;
							<select id="add_prodsvc"  name="add_prodsvc" style="width:150px; height:30px;">
							  <option value="product">Product</option>
							  <option value="service">Service</option>
							</select>						
					  </div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Product Description</label>
									<textarea class="form-control" id="add_productdesc" name="add_productdesc" onchange="changeInputState(this)" rows="3"></textarea>									
								</div>
								<div class="form-group">
									<input type="checkbox" name="add_linkslogo" id="add_linkslogo" style="width:17px; height:17px;" onclick="checkState(this)" checked> &nbsp;Does product have Links, Inc logo<br>
								</div>
								
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Product Photo</label>
									<div class="group-image-div">
										<img id="add_product"  style="width:200px; height:150px;"  />
									</div>	
									<input type='file' id="add_upload" name="add_upload" />	
									
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
									<label for="salary" class="control-label">Product Photo:</label>
									<input type='file' id="edit_upload" name="edit_upload" />
									<img id="edit_picture" src="#" style="width:200px; height:150px; margin-top:10px;" alt="your image" />
									
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
	<div class="modal fade" id="overlay">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Business Info update</h4>
		  </div>
		  <div class="modal-body">
			<p>Update successful!</p>
		  </div>
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


</body>
<script type="text/javascript">
function onChangeGroupImage(imgObj) {
    var file = document.getElementById("upload").files[0];
    var reader = new FileReader();
    reader.onloadend = function(){
        imgObj.parentNode.style.backgroundImage = "url(" + reader.result + ")";        
    }
    if(file){
        reader.readAsDataURL(file);
    }else{
    }
}


function save_businessinfo(){
	var business_name = document.getElementById("business_name").value;
	var address = document.getElementById("address").value;
	var city = document.getElementById("city").value;
	var state = document.getElementById("state").value;
	var zip = document.getElementById("zip").value;
	var country = document.getElementById("country").value;
	var phone = document.getElementById("phone").value;
	var fax = document.getElementById("fax").value;
	var website = document.getElementById("website").value;
	
/*	if(first_name == ""){
		document.getElementById("first_name").className = document.getElementById("first_name").className + " error";	
		return;
	}	
	if(last_name == ""){
		document.getElementById("last_name").className = document.getElementById("last_name").className + " error";	
		return;
	}	
	if(email == "" || validateEmail(email) == false){
		document.getElementById("email").className = document.getElementById("email").className + " error";	
		return;
	}	
	if(pword == ""){
		document.getElementById("pword").className = document.getElementById("pword").className + " error";	
		return;
	}	*/


	$.ajax({
	  type: "POST",  
	  url: "business_info/business_info.php",  
	  data: ({business_name: business_name, address: address, city: city, state: state, zip: zip, country: country, phone: phone, fax: fax , website: website, action: "reg"}),
	  dataType: "json",       
	  success: function(response)  
	  {
		  if(response == 1){
			$('#overlay').modal('show');

			setTimeout(function() {
				$('#overlay').modal('hide');
			}, 4000);	  
		  }
		}   
	});

}


</script>
</html>