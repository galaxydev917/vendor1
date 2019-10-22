<?php 
//
include_once("../../connection.php");
$db = new dbObj();
$connString =  $db->getConnstring();
		$sql = "SELECT * FROM vendor WHERE vendorid =".$_GET['vendorid'];
		$queryRecords = mysqli_query($connString, $sql) or die("error to fetch employees data");
		$row = mysqli_fetch_assoc($queryRecords);
		$vendorid = $row['vendorid'];
		$email = $row['email'];
		$pword = $row['pword'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$hq_status = $row['hq_status'];
		$business_name = $row['business_name'];
		$address= $row['address'];
		$city = $row['city'];
		$state = $row['state'];
		$zip = $row['zip'];
		$phone = $row['phone'];
		$fax = $row['fax'];
		$website = $row['website'];
		$signed = $row['signed'];
		$signed_date = $row['signed_date'];
		$facebook = $row['facebook'];
		$twitter = $row['twitter'];
		$othersm = $row['othersm'];
		$client1_business = $row['client1_business'];
		$client1_poc = $row['client1_poc'];
		$client1_address = $row['client1_address'];
		$client1_phone = $row['client1_phone'];
		$client1_email = $row['client1_email'];
		$client2_business = $row['client2_business'];
		$client2_poc = $row['client2_poc'];
		$client2_address = $row['client2_address'];
		$client2_phone = $row['client2_phone'];
		$client2_email = $row['client2_email'];
		$client3_business = $row['client3_business'];
		$client3_poc = $row['client3_poc'];
		$client3_address = $row['client3_address'];
		$client3_phone = $row['client3_phone'];
		$client3_email = $row['client3_email'];
		$reg_receipt = $row['reg_receipt'];
		$good_bbs = $row['good_bbs'];
		$principal_title = $row['principal_title'];
		$link_related = $row['link_related'];
		$prev_license = $row['prev_license'];
		$memberid = $row['memberid'];
		$sale_online = $row['sale_online'];	
		if ($row['app_submit_date']!=""){
			//app already submitted disable check - turn everyting on
			$locked = 1;
			
		}else{
			//run submit check
			$locked = 0;
		}
		if($row['business_name'] != "" && $row['address'] != "" && $row['city'] !="" && $row['state'] !="" && $row['zip'] !="" && $row['phone'] !="")
			$check1 = 1;	
	  else
		  $check1 = 0;	

		if($row['client1_business'] != "" && $row['client1_poc'] != "" && $row['client1_address'] !="" && $row['client1_phone'] !="" && $row['client1_email'] !="")
			$check2 = 1;			
		else
			$check2 = 0;			

		

		if($row['signed'] == 1 && $row['signed_date'] != "")
			$check4 = 1;	
		else
			$check4 = 0;

		if($row['reg_receipt'] != "")
			$check5 = 1;	
		else
			$check5 = 0;	

		$sql = "SELECT * FROM `vendor_products` WHERE vendorid = ".$vendorid." LIMIT 1";
		$result = mysqli_query($connString, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row['photofile'] != "")
			$check3 = 1;
		else
			$check3 = 0;
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
  <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="../../css/nivo-lightbox.css" rel="stylesheet" />
	<link href="../../css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="../../css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="../../css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="../../css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="../../bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="../../color/default.css" rel="stylesheet">
	
	<link href="../../css/jquery.bootgrid.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../css/dist/bootstrap.min.css" type="text/css" media="all">
	<!-- Core JavaScript Files -->
	
	
	<script src="../../js/jquery-1.10.2.min.js"></script>
	<script src="../../js/jquery.bootgrid.min.js"></script>
	<script src="../../js/jquery.form.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.easing.min.js"></script>
	<script src="../../js/wow.min.js"></script>
	<script src="../../js/jquery.scrollTo.js"></script>
	<script src="../../js/jquery.appear.js"></script>
	<script src="../../js/stellar.js"></script>
	<script src="../../plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="../../js/owl.carousel.min.js"></script>
	<script src="../../js/nivo-lightbox.min.js"></script>
	<script src="../../js/custom.js"></script>
	<script src="productlist/product.js"></script>	
	<script src="agreement/agreement.js"></script>	
	<script src="submission/submission.js"></script>	


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
						
						<font color="#FFFF00"><span style="text-decoration: none">Application Status: <u><?php echo $hq_status; ?></u></span></font></p>
					</div>
					
					
				</div>
			</div>
		</div>
        
        <!-- /.container -->
    </nav>
	</div>
	<div id="exTab2" class="container" style="margin-top:100px;">	
		<p><font color="#00A65E" style = "font-family:georgia,garamond,serif;font-size:28px;font-style:italic;">Welcome <?php echo $first_name; ?><br>
		</font><font color="#808080"><i>(Please enter as much information as possible to 
		expedite your application review.)</i></font></p>
		<ul class="nav nav-tabs">
			<li class="active"><a  href="#blank" data-toggle="tab"><u>1. Application Requirements</u></a></li>		
			<li><a  href="#business_info" data-toggle="tab"><u>2. Business Info</u></a></li>
			<li><a href="#referrals" data-toggle="tab"><u>3. Client References</u></a></li>
			<li><a href="#products" data-toggle="tab"><u>4. Products List</u></a></li>
			<li><a href="#agreementtab" data-toggle="tab"><u>5. Agreement & Payment</u></a></li>
			<li><a href="#submission" data-toggle="tab"><u>6. Application Submission</u></a></li>
		</ul>

		<div class="tab-content ">
			<div class="tab-pane active" id="blank">
				<?php include_once("requirements/requirementsView.php"); ?>
			</div>
			<!-- starting business info tab-->
			<div class="tab-pane" id="business_info">
				<?php include_once("business_info/business_infoView.php"); ?>
			</div>
			<!--end business info tab-->
			<div class="tab-pane" id="referrals">
				<?php include_once("refs/refView.php"); ?>
			</div>
			<div class="tab-pane" id="products">
				<?php include_once("productlist/productlist.php"); ?>
			</div>
			<div class="tab-pane" id="agreementtab">
				<?php include_once("agreement/agreementView.php"); ?>
			</div>
			<div class="tab-pane" id="submission">
				<?php include_once("submission/submissionView.php"); ?>
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
						<img border="0" src="../../img/Links%20Logo%20GIF.gif" width="120" height="72"></h5>
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