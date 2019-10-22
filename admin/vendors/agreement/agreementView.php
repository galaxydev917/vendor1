<form method="post" id="frm_agreement">
<input type="hidden" value="" name="action" id="action">
<input type="hidden" value="<?php echo $first_name;?>" name="first_name" id="first_name">
<input type="hidden" value="<?php echo $last_name;?>" name="last_name" id="last_name">
<input type="hidden" value="<?php echo $vendorid; ?>" name="vendorid" id="vendorid">

<div class="panel-body">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<p style = "font-family:Arial, Helvetica, sans-serif;font-size:12pt;">
			<u><b>Agreement Information</b></u></p>			
			<div class="well clearfix">
				<div class="pull-left">
					<p class="MsoNormal" style="text-align:justify">
					<span style="font-size: 13pt; line-height: 115%; font-family: Times New Roman">
					If approved, you agree to comply with all the information 
					contained within this document and, if applicable, agree to 
					enter into a limited Trademark License Agreement that 
					governs your company's use of The Links, Incorporated logo 
					on merchandise and/or promotional products sold by your 
					company. </span></p>
					<span style="line-height: 115%; font-family: Times New Roman">
					<span style="font-size: 13pt">IN WITNESS WHEREOF, the 
					parties have hereunto set their hands to this Agreement on 
					the dates indicated and do affirm that the above information 
					is true and correct to the best of their knowledge and 
					belief.</span><br>
					&nbsp;</span>&nbsp;<p>
					<?php if($signed != 1){?>
					<button type="button" class="btn btn-xs btn-primary"  id="btn_agreement" style="width:150px; height:30px;" data-row-id="0">
				Click to Agree</button><?php } ?>
				</div>
				<div class="col-sm-4 col-md-4" style="text-align:right;">
					<font color="#29AA6D face="Bookman Old Style" size="3"><p id="signed_user"><?php if($signed == 1)  echo $first_name.' '.$last_name." agreed to on " ?></p></font>	
				</div>
				<div class="col-sm-8 col-md-8" style="text-align:left;">
					<font color="#29AA6D face="Bookman Old Style" size="3"><p id="signed_date"> <?php if($signed == 1) echo $signed_date; ?></p></font> 	
				</div>
					
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-md-10">
			<p style = "font-family:georgia,garamond,serif;font-size:20px;font-style:bold;" id="first_name"> <p style = "font-family:georgia,garamond,serif;font-size:20px;font-style:bold;" id="signed_date"></p></p>
		</div>
	</div>
	<div id="paypal_div">	
		<div class="row" style="margin-top:20px;">
			<div class="col-sm-12">
				<p style = "font-family:Arial, Helvetica, sans-serif;font-size:12pt;">
				<u><b>Payment Information</b></u></p>
				<a target="_blank" href="https://www.paypal.com/us/signin" >Click here to make $100 fee payment at Paypal.</a> 
				Once you make payment, you will receive a &quot;Paypal Receipt Number&quot;.&nbsp; 
				Please enter that number below.</div>
			<div class="col-sm-8 col-md-8">
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-sm-3 col-md-3">
				<p style = "font-family:Arial, Helvetica, sans-serif;font-size:16px;">Paypal Receipt Number: </p>
			</div>
			<div class="col-sm-4 col-md-4">
				<input type="text" name="receipt_number" id="receipt_number" value="<?php echo $reg_receipt; ?>" class="form-control" style="margin-left:-80px;" >
			</div>
			<div class="col-sm-5 col-md-5" id="reciept_div">
			<?php if($signed == 1){?>
				<input type="button" value="Save Paypal Receipt Number" class="btn btn-skin btn-block" id="save_receipt" style="margin-left:-80px; width:300px;">	<?php }?>	
			</div>
		
		</div>	
	</div>
	
</div>
	<div class="modal fade" id="overlay_receipt">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Regist Receipt Number</h4>
		  </div>
		  <div class="modal-body">
			<p>Regist successful!</p>
		  </div>
		</div>
	  </div>
	</div>
	
</form>