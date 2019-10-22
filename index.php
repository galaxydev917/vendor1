<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Official Links, Inc. Vendor Portal</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">
<style>
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
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left"></p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">
					<a target="_blank" href="http://www.linksinc.org">
					<font color="#FFFFFF"><span style="text-decoration: none">Visit Links, Incorporated National Website</span></font></a></p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#intro">Home</a></li>
				<li><a href="#callaction">Welcome</a></li>
				<li><a href="#aboutus">About Us</a></li>
				<li><a href="#pricing">Fees</a></li>
				<li><a href="#" data-toggle="modal" data-target="#loginmodel">Login</a></li>
				<li><a href="#partner">Contact Us</a></li>
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	

	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
					<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
					<h2 class="h-ultra">Official Links Vendor</h2>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					<h4 class="h-light">Register to be a <span class="color">Licensed Vendor</span> today!</h4>
					</div>
						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

						<ul class="lead-list">
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Licensed Vendor Application</strong></span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Trademark License Agreement</strong></span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Submit Product Samples</strong></span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Get Approved Online</strong></span></li>
						</ul>

						</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title">Register &amp; Submit 
									your Application Today!</h3>
									</div>
									<div class="panel-body">
									<form role="form" class="lead" method="post" id="frm_regist">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="first_name" id="first_name" class="form-control input-md" onchange="chaneFirstName()" >
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="last_name" id="last_name" class="form-control input-md" onchange="chaneLastName()">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" id="email" class="form-control input-md" onchange="chaneEmail()">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Create Password*</label><input type="text" name="pword" id="pword" class="form-control input-md" onchange="chanePwd()">
												</div>
											</div>
										</div>
										
										<input type="button" value="Submit" class="btn btn-skin btn-block btn-lg" onclick="regist_user();">
										<p id="exist_state" style="color:red; font-weight: 100; float:center;"></p>	
										<p class="lead-footer">* You will have 
										the ability to create a Vendor Account.</p>
									
									</form>
								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>
	
	<!-- /Section: intro -->
	<section id="callaction" class="home-section paddingtop-40">	
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">
							<div class="row">
								<p><br> </p>
								<div class="col-md-12">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3>Welcome Prospective Vendors</h3>
									<p style="text-align: justify">Thank you for 
									your interest in becoming a Licensed Vendor 
									with The Links, Incorporated. This website 
									will provide detailed information about The 
									Links, Incorporated and vendor fees. The 
									attached application and Trademark License 
									Agreement is for Licensed Vendor applicants 
									only. Vendors that do not wish to produce 
									merchandise bearing The Links, Incorporated 
									name, logo and identity marks, should submit 
									the Certified Vendor Application.</p>
									<p style="text-align: justify">The Trademark 
									License Agreement does not grant a vendor 
									the right to sell products bearing The 
									Links, Incorporated identity marks at events 
									other than those organized by The Links, 
									Incorporated. Any piece of merchandise sold 
									by a Licensed Vendor MUST be approved by The 
									Links, Incorporated. Licensed or unlicensed 
									vendors selling unapproved merchandise with 
									The Links, Incorporated name, logo and other 
									identity marks will have their certification 
									terminated and will be subject to legal 
									action.</p>
									<p style="text-align: justify"><i>
									<font color="#FF0000">Vendors who would like 
									to use The Links, Incorporated name, logo, 
									and other identity marks must meet certain 
									qualifications prior to being approved to 
									sell any and all merchandise and promotional 
									products bearing The Links, Incorporated 
									identity marks at an event hosted by The 
									Links, Incorporated (national, area or 
									chapter). Vendors must complete the 
									Trademark License Agreement and will be 
									asked to submit a sample of their products 
									before being approved to affix the logo or 
									any identity marks. The Links, Incorporated 
									has the authority to make the final decision 
									as to whether an item is appropriate for 
									bearing The Links, Incorporated logo or 
									identity marks. Upon approval, an official 
									logo with the trademark will be forwarded.</font></i></p>
									<p style="text-align: justify">The official 
									&quot;Call to Exhibit&quot; for each event listed 
									below will be released closer to the event 
									dates. Each &quot;Call to Exhibit&quot; will contain 
									all information including the fees required 
									to become a vendor at the National Assembly, 
									Area Conference or chapter events. <b>Please 
									note that certifying as a vendor with The 
									Links, Incorporated does not guarantee you a 
									booth at any event.</b></p>
									<p style="text-align: justify">Vendors are 
									not allowed to display or offer for sale 
									counterfeit goods at events sponsored by The 
									Links, Incorporated. This includes 
									counterfeit clothes, shoes, jewelry and 
									handbags that infringe upon the trademark 
									rights of a third party. Counterfeit goods 
									(sometimes referred to as &quot;knock-offs&quot;) are 
									items containing marks identical to a 
									protected trademark or a mark that is so 
									similar in its essential aspects that it 
									cannot be distinguished from a protected 
									trademark. Any vendor that attempts to offer 
									for sale such items will be immediately 
									asked to remove such items from sale and may 
									forfeit the opportunity to be a vendor at 
									future events sponsored by The Links, 
									Incorporated.</p>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
	</section>	

	<!-- /Section: about -->
	<section id="aboutus" class="home-section paddingtop-40">	
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">&nbsp;</h2>
					<h2 class="h-bold">&nbsp;</h2>
					<h2 class="h-bold">About The Links, Incorporated</h2>
					<p>Take charge of your health today with our specially designed health packages</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
           <div class="container">
				<div class="row">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<p style="text-align: justify">The Links, 
									Incorporated is an international, 
									not-for-profit corporation, established in 
									1946. The membership consists of 12,000 
									professional women of color in 280 chapters 
									located in 41 states, the District of 
									Columbia and the Commonwealth of the 
									Bahamas. It is one of the nation's oldest 
									and largest volunteer service organizations 
									of extraordinary women who are committed to 
									enriching, sustaining and ensuring the 
									culture and economic survival of African 
									Americans and other persons of African 
									ancestry.</p>
									<p style="text-align: justify">The members 
									of The Links, Incorporated are influential 
									decision makers and opinion leaders. The 
									Links, Inc. has attracted many distinguished 
									women who are individual achievers and have 
									made a difference in their communities and 
									the world. They are business and civic 
									leaders, role models, mentors, activists and 
									volunteers who work towards a common vision 
									by engaging like-minded organizations and 
									individuals for partnership. Links members 
									contribute more than 500,000 documented 
									hours of community service annually - 
									strengthening their communities and 
									enhancing the nation. The organization is 
									the recipient of awards from the UN 
									Association of New York and the Leon H. 
									Sullivan Foundation for its premier 
									programs.</p>
									<p style="text-align: justify">The 
									outstanding programming of The Links, 
									Incorporated has five facets which include 
									Services to Youth, Arts, National Trends and 
									Services, International Trends and Services 
									and Health and Human Services. The programs 
									are implemented through strategies such as 
									public information and education, economic 
									development, and public policy campaigns.</p>
									</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<img border="0" src="img/founders.jpg" width="326" height="471"></div>
									</div>
								</div>
							</div>
					</div>
				</div>
            </div>
	</section>	
	
	<!-- Section: pricing -->	
	<section id="pricing" class="home-section bg-gray paddingbot-60">	
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Vendor Application Fees</h2>
					<p>(Note: Fees are subject to change without notice)</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
           
		   <div class="container">
			
			<div class="row">

				<div class="col-sm-4 pricing-box">
					<div class="wow bounceInUp" data-wow-delay="0.1s">
					<div class="pricing-content general">
						<h2>Small Business<br>(One Area Conference / National 
						Assembly Only)</h2>
						<h3>$2,250.00</h3>
					</div>
					</div>
				</div>

				<div class="col-sm-4 pricing-box featured-price">
					<div class="wow bounceInUp" data-wow-delay="0.3s">
					<div class="pricing-content featured">
						<h2>Link, Connecting LInk, or Heir-o-Link<br>(2 yr. Agreement)</h2>
						<h3>$2,250.00</h3>
					</div>
					</div>
				</div>

				<div class="col-sm-4 pricing-box">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
					<div class="pricing-content general last">
						<h2>Small Business<br>(2 yr. Agreement)</h2>
						<h3>$2,500.00</h3>
					</div>
					</div>
				</div>

			</div>				
				
            </div>
           <div class="container">
				<div class="row">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<p style="text-align: justify">&nbsp;</p>
									<p style="text-align: justify">The licensing 
									program consists of two parts:</p>
									<p style="text-align: justify">1)
									<font color="#29AA6D"><b>Vendors must be 
									certified by The Links, Incorporated</b></font> 
									to sell products and provide services at any 
									event hosted by The Links, Incorporated 
									(national, area or chapter). To do this, the 
									vendor must complete one of two applications 
									depending on the type of product they would 
									like to sell. Vendors who intend to use 
									identity marks of The Links, Incorporated 
									should complete the attached Licensed Vendor 
									Application.</p>
									<p style="text-align: justify">2)
									<font color="#29AA6D"><b>Vendors who would 
									like to use The Links, Incorporated name, 
									logo or identity marks </b></font>must meet 
									certain qualifications prior to being 
									approved to sell merchandise and promotional 
									products bearing The Links, Incorporated 
									identity marks. Vendors must complete the 
									Trademark License Agreement and will be 
									asked to submit a sample of their products 
									before being approved to affix the name, 
									logo or identity marks. The Links, 
									Incorporated has the authority to make the 
									final decision as to whether an item is 
									appropriate for bearing The Links, 
									Incorporated name, logo or identity marks. 
									Upon approval, the official logo with the 
									trademark will be forwarded.</p>
									</div>
									</div>
								</div>
							</div>
					</div>
				</div>
            </div>

	</section>	 
	<!-- /Section: pricing -->
	
	<section id="partner" class="home-section paddingbot-60">	
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Contact Us</h2>
					<p>Take charge of your health today with our specially designed health packages</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>About Links, Incorporated<br>
						<br>
						<img border="0" src="img/Links%20Logo%20GIF.gif" width="120" height="72"></h5>
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
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Friday, 8:30am to 5:00pm EST
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> (202)842-8686
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
					<p>&copy;Copyright 2019 - Links, Incorporated. All rights reserved.</p>
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
	<section id="login">

	<div class="modal fade" id="loginmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content martop105" style="width:400px;">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text_center"  id="exampleModalLabel">Login</h4>
               </div>
               <div class="modal-body">
                  <form >
                     <div class="row margin0 text_center">
                        <div class="col-md-12 col-sm-12 col-xs-12"> 
							<div class="col-md-4 col-sm-4 col-xs-4" align="center" style="margin-top:10px;">
							User Email:
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<input type="email" id="login_email"  name="login_email" placeholder="Email*" class="form-control"/>
								
							</div>
						</div>
						<br></br>
                        <div class="col-md-12 col-sm-12 col-xs-12 martop20">
							<div class="col-md-4 col-sm-4 col-xs-4" align="center" style="margin-top:10px;">
								Password:
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
							   <input type="Password" id="login_password" id="login_password" placeholder="Password*" class="form-control" required />
							</div>
                        </div>
                     </div>
                     <br>
                     <div class="row" style="text-align:center">
                        <button type="button" onclick="login();" class="btn btn-skin btn-block btn-lg" style="width:300px;">Login</button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
	  </section>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>	 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script>


</body>
<script type="text/javascript">
function chaneFirstName(){
	document.getElementById("first_name").className = "form-control input-md";	
}
function chaneLastName(){
	document.getElementById("last_name").className = "form-control input-md";	
}
function chaneEmail(){
	document.getElementById("email").className = "form-control input-md";
	document.getElementById('exist_state').innerHTML = '';	
}
function chanePwd(){
	document.getElementById("pword").className = "form-control input-md";	
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function regist_user(){
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var email = document.getElementById("email").value;
	var pword = document.getElementById("pword").value;
	
	if(first_name == ""){
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
	}	


	$.ajax({
	  type: "POST",  
	  url: "user.php",  
	  data: ({first_name: first_name, last_name: last_name, email: email, pword: pword, action: "reg"}),
	  dataType: "json",       
	  success: function(response)  
	  {
		if(response == 0){
			document.getElementById('exist_state').innerHTML = 'User email already exist !';
			
			return;
		}else{
			document.getElementById('exist_state').innerHTML = '';
			window.location = "first.php";	 
		}
			
	  }   
	});

}

function login(){
	var login_email = document.getElementById("login_email").value;
	var login_password = document.getElementById("login_password").value;

	$.ajax({
	  type: "POST",  
	  url: "user.php",  
	  data: ({login_email: login_email, login_password: login_password, action: "login"}),
	  dataType: "json",       
	  success: function(response)  
	  {
		//window.location = "admin/index.php";	
		if(response == 1)
			window.location = "admin/index.php";	 
		if(response == 0)
		  window.location = "first.php";	 
		   
	  }   
	});

}
</script>
</html>