<?php 
//
	session_start();
	if(empty(isset($_SESSION['vendorid']))){
	 header("location:../index.php"); //to redirect back to "index.php" after logging out
	}
	include_once("../connection.php");
	$db = new dbObj();
	$connString =  $db->getConnstring();
	
	$sql = "SELECT vendorid, business_name, first_name FROM vendor WHERE business_name IS NOT NULL";
	$queryRecords = mysqli_query($connString, $sql) or die("error to fetch employees data");
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		$data[] = $row;
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
	<link rel="stylesheet" type="text/css" href="../plugins/cubeportfolio/css/cubeportfolio.min.css">
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
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />	
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery.bootgrid.min.js"></script>
	<script src="../js/jquery.form.js"></script>
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

	<script src="vendors/vendor.js"></script>	
	<script src="productadmin/product.js"></script>	
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<style>

#exTab2 .tab-content {
  background-color: #FFFFFF;
  padding : 15px 15px;
}
.error {
  border:1px solid red;
}
.table-img{ 
 width: 120px; height: 100px; }
 
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
.btn-search {
	  background: #424242;
	  border-radius: 0;
	  color: #fff;
	  border-width: 1px;
	  border-style: solid;
	  border-color: #1c1c1c;
	}
	.btn-search:link, .btn-search:visited {
	  color: #fff;
	}
	.btn-search:active, .btn-search:hover {
	  background: #1c1c1c;
	  color: #fff;
}
</style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-md-4">
						<p style = "font-family:georgia,garamond,serif;font-size:26px;font-style:bold;">Licensed Vendor Application</p>
					</div>
					<div class="col-sm-5 col-md-4" style="margin-top:15px;">
						<p class="bold text-center">
						
						<font color="#FFFF00"><span style="text-decoration: none">Application Status: <u><?php echo $_SESSION["status"]; ?></u></span></font></p>
					</div>
					
					<div align="right" class="col-sm-2 col-md-2" style="margin-top:15px;">
						<p class="bold text-right">
						<a href="../logout.php">
						<font color="#FFFFFF"><span style="text-decoration: none">Logout</span></font></a></p>
					</div>
					
				</div>
			</div>
		</div>
        
        <!-- /.container -->
    </nav>
	</div>
	<div id="exTab2" class="container" style="margin-top:100px;">	
		<p><font color="#00A65E" style = "font-family:georgia,garamond,serif;font-size:28px;font-style:italic;">Welcome <?php echo $_SESSION["first_name"]; ?><br>
		</font><font color="#808080"><i>(Please enter as much information as possible to 
		expedite your application review.)</i></font></p>
		<ul class="nav nav-tabs">
			<li class="active"><a  href="#blank" data-toggle="tab"><u>1.Vendors</u></a></li>		
			<li><a href="#products" data-toggle="tab"><u>2. Products by Vendor</u></a></li>
		</ul>

		<div class="tab-content ">
			<div class="tab-pane active" id="blank">
				<?php include_once("vendors/vendorView.php"); ?>
			</div>
			<!-- starting business info tab-->
			<div class="tab-pane" id="products">
				<?php include_once("productadmin/productadminView.php"); ?>
			</div>
			<!--end business info tab-->
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
	<div class="modal fade" id="overlay_refer">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Client Reference update</h4>
		  </div>
		  <div class="modal-body">
			<p>Update successful!</p>
		  </div>
		</div>
	  </div>
	</div>
<p>&nbsp;</p><p></p>
	<section>	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>About Links, Incorporated<br>
						<br>
						<img border="0" src="../img/Links%20Logo%20GIF.gif" width="120" height="72"></h5>
						<p>
						The Links, Incorporated is an international, not-for-profit corporation, established in 1946. It is one of the nation's oldest and largest volunteer service organizations.
						</p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Headquarters</h5>
						<p>
						Please contact us if you have any questions regarding being a Vendor.
						</p>
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> (202) 842-8686
								ext. 212</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Friday, 9:00am to 5:00pm EST
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> vendors@linksinc.org
							</li>

						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Our location</h5>
						<p>1200 Massachusettes Ave. NW<br>Washington, DC 20005</p>		
						
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Follow us</h5>
						<ul class="company-social">
								<li class="social-facebook"><a target="_blank" href="https://www.facebook.com/thelinksinc"><i class="fa fa-facebook"></i></a></li>
								<li class="social-twitter"><a target="_blank" href="https://twitter.com/linksinc"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p>&copy; Copyright 2019 - Links, Incorporated. All rights reserved.</p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="text-right">
						<p><a href="http://bootstraptaste.com/">
						<font color="#F7F7F7">Bootstrap Themes</font></a><font color="#F7F7F7"> by BootstrapTaste</font></p>
					</div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
					</div>
				</div>
			</div>	
		</div>
		</div>
		
	</section>	

</body>
<script type="text/javascript">
function handler(e){
  e.target.className = "form-control";
}
function changeInputState(Obj){
	Obj.className = "form-control";	
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function save_businessinfo(){
	var business_name = document.getElementById("business_name").value;
	var address = document.getElementById("address").value;
	var city = document.getElementById("city").value;
	var state = document.getElementById("state").value;
	var zip = document.getElementById("zip").value;
	var pword = document.getElementById("pword").value;
	var phone = document.getElementById("phone").value;
	var fax = document.getElementById("fax").value;
	var website = document.getElementById("website").value;
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var principal_title = document.getElementById("principal_title").value;
	var facebook = document.getElementById("facebook").value;
	var twitter = document.getElementById("twitter").value;
	var othersm = document.getElementById("othersm").value;
	var good_bbs = document.getElementById("good_bbs").value;
	var link_related = document.getElementById("link_related").value;
	var prev_license = document.getElementById("prev_license").value;
	var memberid = document.getElementById("memberid").value;
	var sale_online = document.getElementById("sale_online").value;
	
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
	  data: ({link_related: link_related, prev_license: prev_license, memberid: memberid, sale_online: sale_online, good_bbs: good_bbs, first_name: first_name, last_name:last_name, principal_title: principal_title, business_name: business_name, address: address, city: city, state: state, zip: zip, pword: pword, phone: phone, fax: fax , website: website, facebook: facebook, twitter: twitter, othersm: othersm, action: "reg"}),
	  dataType: "json",       
	  success: function(response)  
	  {
		  if(response == 1){
			$('#overlay').modal('show');

			setTimeout(function() {
				$('#overlay').modal('hide');
			}, 2000);	  
		  }
		}   
	});

}

function save_referenceinfo(){
	var client1_business = document.getElementById("client1_business").value;
	var client1_poc = document.getElementById("client1_poc").value;
	var client1_address = document.getElementById("client1_address").value;
	var client1_phone = document.getElementById("client1_phone").value;
	var client1_email = document.getElementById("client1_email").value;
	var client2_business = document.getElementById("client2_business").value;
	var client2_poc = document.getElementById("client2_poc").value;
	var client2_address = document.getElementById("client2_address").value;
	var client2_phone = document.getElementById("client2_phone").value;
	var client2_email = document.getElementById("client2_email").value;
	var client3_business = document.getElementById("client3_business").value;
	var client3_poc = document.getElementById("client3_poc").value;
	var client3_address = document.getElementById("client3_address").value;
	var client3_phone = document.getElementById("client3_phone").value;
	var client3_email = document.getElementById("client3_email").value;
	
	$.ajax({
	  type: "POST",  
	  url: "refs/ref_info.php",  
	  data: ({client1_business: client1_business, client1_poc: client1_poc, client1_address: client1_address, client1_phone: client1_phone, client1_email: client1_email, client2_business: client2_business, client2_poc: client2_poc, client2_address: client2_address, client2_phone: client2_phone, client2_email: client2_email,client3_business: client3_business, client3_poc: client3_poc, client3_address: client3_address, client3_phone: client3_phone, client3_email: client3_email, action: "reg"}),
	  dataType: "json",       
	  success: function(response)  
	  {
		  if(response == 1){
			$('#overlay_refer').modal('show');

			setTimeout(function() {
				$('#overlay_refer').modal('hide');
			}, 2000);	  
		  }
		}   
	});

}

</script>
</html>