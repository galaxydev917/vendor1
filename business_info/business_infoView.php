				<div class="panel-body">
					<form role="form" class="lead" method="post" id="frm_businessInfo">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>First Name*</label>
									<input type="text" name="first_name" id="first_name" value="<?php echo $_SESSION["first_name"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Last Name*</label>
									<input type="text" name="last_name" id="last_name" value="<?php echo $_SESSION["last_name"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Title*</label>
									<input type="text" name="principal_title" id="principal_title" value="<?php echo $_SESSION["principal_title"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>BBS Good Standing?(Y/N)*</label>
									<input type="text" name="good_bbs" id="good_bbs" value="<?php echo $_SESSION["good_bbs"]; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Business Name (include dba, aka)*</label>
									<input type="text" name="business_name" id="business_name" value="<?php echo $_SESSION["business_name"]; ?>" class="form-control input-md"  >
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Address*</label>
									<input type="text" name="address" id="address" value="<?php echo $_SESSION["address"]; ?>" class="form-control input-md" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>State*</label>
									<input type="text" name="state" id="state" value="<?php echo $_SESSION["state"]; ?>" class="form-control input-md" >
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>City*</label>
									<input type="text" name="city" id="city" value="<?php echo $_SESSION["city"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Zip*</label>
									<input type="text" name="zip" id="zip" value="<?php echo $_SESSION["zip"]; ?>" class="form-control input-md" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Phone*</label>
									<input type="text" name="phone" id="phone" value="<?php echo $_SESSION["phone"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Fax</label>
									<input type="text" name="fax" id="fax" value="<?php echo $_SESSION["fax"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Email* <font color="#808080"><i>
									<font size="2">(Read-Only)</font></i></font></label><font color="#808080"><i><font size="2">
									</font></i></font>
									<input type="text" name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" class="form-control input-md" readonly >
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Password*</label>
									<input type="password" name="pword" id="pword" value="<?php echo $_SESSION["pword"]; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label><font size="2">Previous Licensed Links Vendor?(Y/N)</font></label>
									<input type="text" name="prev_license" id="prev_license" value="<?php echo $_SESSION["prev_license"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">Do you plan to sell online?(Y/N)</font></label><font size="2">
									</font></b>
									<input type="text" name="sale_online" id="sale_online" value="<?php echo $_SESSION["sale_online"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">Are you Related to a Link?(Y/N) 
									</font> </label>
									</b>
									<input type="text" name="link_related" id="link_related" value="<?php echo $_SESSION["link_related"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">If a Link, Memberid#?</font></label></b>
									<input type="test" name="memberid" id="memberid" value="<?php echo $_SESSION["memberid"]; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Website (link)</label>
									<input type="text" name="website" id="website" value="<?php echo $_SESSION["website"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Facebook (link)</label>
									<input type="text" name="facebook" id="facebook" value="<?php echo $_SESSION["facebook"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Twitter (link)</label>
									<input type="text" name="twitter" id="twitter" value="<?php echo $_SESSION["twitter"]; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Other Social Media (link)</label>
									<input type="text" name="twitter" id="othersm" value="<?php echo $_SESSION["othersm"]; ?>" class="form-control input-md">
								</div>
							</div>
						</div><br>

						<input type="button" value="Update Business Info" class="btn btn-skin btn-block btn-lg" onclick="save_businessinfo();">
					</form>
				</div>	