				<div class="panel-body">
					<form role="form" class="lead" method="post" id="frm_refInfo">
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									<label><font size="2">Reference #1: Business Name</font></label><font size="2">
									</font>
									<input type="text" name="client1_business" id="client1_business" value="<?php echo $_SESSION["client1_business"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Point of Contact & Title</font></label><font size="2">
									</font>
									<input type="text" name="client1_poc" id="client1_poc" value="<?php echo $_SESSION["client1_poc"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Address</font></label><font size="2">
									</font>
									<input type="text" name="client1_address" id="client1_address" value="<?php echo $_SESSION["client1_address"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Phone</font></label><font size="2">
									</font>
									<input type="text" name="client1_phone" id="client1_phone" value="<?php echo $_SESSION["client1_phone"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Email</font></label><font size="2">
									</font>
									<input type="text" name="client1_email" id="client1_email" value="<?php echo $_SESSION["client1_email"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									<label><font size="2">Reference #2: Business Name</font></label><font size="2">
									</font>
									<input type="text" name="client2_business" id="client2_business" value="<?php echo $_SESSION["client2_business"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Point of Contact & Title</font></label><font size="2">
									</font>
									<input type="text" name="client2_poc" id="client2_poc" value="<?php echo $_SESSION["client2_poc"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Address</font></label><font size="2">
									</font>
									<input type="text" name="client2_address" id="client2_address" value="<?php echo $_SESSION["client2_address"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Phone</font></label><font size="2">
									</font>
									<input type="text" name="client2_phone" id="client2_phone" value="<?php echo $_SESSION["client2_phone"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Email</font></label><font size="2">
									</font>
									<input type="text" name="client2_email" id="client2_email" value="<?php echo $_SESSION["client2_email"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									<label><font size="2">Reference #3: Business Name</font></label><font size="2">
									</font>
									<input type="text" name="client3_business" id="client3_business" value="<?php echo $_SESSION["client3_business"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Point of Contact & Title</font></label><font size="2">
									</font>
									<input type="text" name="client3_poc" id="client3_poc" value="<?php echo $_SESSION["client3_poc"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Address</font></label><font size="2">
									</font>
									<input type="text" name="client3_address" id="client3_address" value="<?php echo $_SESSION["client3_address"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Phone</font></label><font size="2">
									</font>
									<input type="text" name="client3_phone" id="client3_phone" value="<?php echo $_SESSION["client3_phone"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
								<div class="form-group">
									<label><font size="2">Email</font></label><font size="2">
									</font>
									<input type="text" name="client3_email" id="client3_email" value="<?php echo $_SESSION["client3_email"]; ?>" class="form-control input-md"><font size="2">
									</font>
								</div>
							</div>

						</div>
					
						<input type="button" value="Update Client References" class="btn btn-skin btn-block btn-lg" onclick="save_referenceinfo();">
					</form>
				</div>	