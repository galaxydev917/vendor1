<form method="post" id="frm_submission">
<div class="panel-body">
	<?php if($_SESSION["locked"] != 1) { ?>
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<p style = "font-family:Arial, Helvetica, sans-serif;font-size:12pt;">
			<u><b>Is your Application Ready for Submission?</b></u></p>	
			<button type="button" class="btn btn-xs btn-primary"  id="btn_checksubmission" style="width:200px; height:30px;" data-row-id="0">Check my Application</button>
			<img id="loadimg"  src="submission/loader.gif" style="width:50px; height:30px; display:none;"  />
			<div style="margin-top:20px;">
					<p id="business_check">1. Business Info required fields completed: 
						 <?php 
					   if($_SESSION["check1"] != 1){ 
					   		echo '<font color="#FF0000">Not Complete!</font>';
					   } else { 
					   		echo '<font color="#00A65E"><b>Complete!</b></font>'; 
					   }?></p>
			</div>
			<div><p id="client_references">
					2. Three(3) Client References (Name, Contact, Address, Phone, and Email):
					<?php 
					   if($_SESSION["check2"] != 1){ 
					   		echo '<font color="#FF0000">Not Complete!</font>';
					   } else { 
					   		echo '<font color="#00A65E"><b>Complete!</b></font>'; 
					   }?></p>
			</div>
			<div><p id="product_info">
					3. Products List submitted w/ images (Note: Product must include images; One image per product):
					<?php 
					   if($_SESSION["check3"] != 1){ 
					   		echo '<font color="#FF0000">Not Complete!</font>';
					   } else { 
					   		echo '<font color="#00A65E"><b>Complete!</b></font>'; 
					   }?></p>
			</div>
			<div><p id="agreement">
					4. Agreement electronically signed and dated:
					  <?php 
					   if($_SESSION["check4"] != 1){ 
					   		echo '<font color="#FF0000">Not Complete!</font>';
					   } else { 
					   		echo '<font color="#00A65E"><b>Complete!</b></font>'; 
					   }?></p>
			</div>
			<div><p id="receipt">
					5. Non-refundable $100 fee paid via PayPal (Paypal Receipt Number submitted):
					<?php 
					   if($_SESSION["check5"] != 1){ 
					   		echo '<font color="#FF0000">Not Complete!</font>';
					   } else { 
					   		echo '<font color="#00A65E"><b>Complete!</b></font>'; 
					   }?></p>
			</div>
		</div>
		<?php }else{ ?>
			<p align="center"><font color="#00A65E">
			<span style="font-size: 13pt; font-weight: 700">Thank you for your interest 
			in becoming a Brand Licensed Vendor for the Links, Incorporated.  
			</span></font>  
			</p>
			<p align="center"><font color="#00A65E">
			<span style="font-size: 13pt; font-weight: 700">Your application has been successfully submitted.  You will be contacted 
			soon regarding the status of your application.</span></font>
	    <?php }?>

	</div>
</form>