				<div class="panel-body">
					<form role="form" class="lead" method="post" id="frm_businessInfo">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>First Name*</label>
									<input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Last Name*</label>
									<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Title*</label>
									<input type="text" name="principal_title" id="principal_title" value="<?php echo $principal_title; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>BBS Good Standing?*</label>
									<input type="text" name="good_bbs" id="good_bbs" value="<?php echo $good_bbs; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Business Name (include dba, aka)*</label>
									<input type="text" name="business_name" id="business_name" value="<?php echo $business_name; ?>" class="form-control input-md"  >
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Address*</label>
									<input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control input-md" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>State*</label>
									<input type="text" name="state" id="state" value="<?php echo $state; ?>" class="form-control input-md" >
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>City*</label>
									<input type="text" name="city" id="city" value="<?php echo $city; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Zip*</label>
									<input type="text" name="zip" id="zip" value="<?php echo $zip; ?>" class="form-control input-md" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Phone*</label>
									<input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Fax</label>
									<input type="text" name="fax" id="fax" value="<?php echo $fax; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Email* <font color="#808080"><i>
									<font size="2">(Read-Only)</font></i></font></label><font color="#808080"><i><font size="2">
									</font></i></font>
									<input type="text" name="email" id="email" value="<?php echo $email ?>" class="form-control input-md" readonly >
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Password*</label>
									<input type="password" name="pword" id="pword" value="<?php echo $pword; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label><font size="2">Previous Licensed Links Vendor?</font></label>
									<input type="text" name="prev_license" id="prev_license" value="<?php echo $prev_license; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">Do you plan to sell online?</font></label><font size="2">
									</font></b>
									<input type="text" name="sale_online" id="sale_online" value="<?php echo $sale_online; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">Are you Related to a Link? 
									</font> </label>
									</b>
									<input type="text" name="link_related" id="link_related" value="<?php echo $link_related; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<b>
									<label><font size="2">If a Link, Memberid#?</font></label></b>
									<input type="test" name="memberid" id="memberid" value="<?php echo $memberid; ?>" class="form-control input-md">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Website</label>
									<input type="text" name="website" id="website" value="<?php echo $website; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Facebook</label>
									<input type="text" name="facebook" id="facebook" value="<?php echo $facebook; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Twitter</label>
									<input type="text" name="twitter" id="twitter" value="<?php echo $twitter; ?>" class="form-control input-md">
								</div>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3">
								<div class="form-group">
									<label>Other Social Media</label>
									<input type="text" name="twitter" id="othersm" value="<?php echo $othersm; ?>" class="form-control input-md">
								</div>
							</div>
						</div><br>

						<input type="button" value="Update Business Info" class="btn btn-skin btn-block btn-lg" onclick="save_businessinfo();">
					</form>
				</div>	