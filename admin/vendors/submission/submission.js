


$( document ).ready(function() {
	$( "#btn_checksubmission" ).click(function() {
	 	document.getElementById('loadimg').style.display = "inline";
		 ajaxSubmissionAction();
	});
	function ajaxSubmissionAction(action) {
		var vendorid = $( "#vendorid" ).val();
		$.ajax({
		  type: "POST",  
		  url: "submission/submission.php",  
		  data: ({vendorid:vendorid}),
		  dataType: "text",       
		  success: function(response)  
		  {
			var splitArray = response.split("&");
			setTimeout(function() {
				if(splitArray[0] == 1)
				document.getElementById('business_check').innerHTML = "1. Business Info required fields completed: <font color='#00A65E'><b>Complete!</b></font>";
				else
					document.getElementById('business_check').innerHTML = '1. Business Info required fields completed: <font color="#FF0000">Not Complete!</font>';

				if(splitArray[1] == 1)
					document.getElementById('client_references').innerHTML = '2. Three(3) Client References (Name, Contact, Address, Phone, and Email): <font color="#00A65E"><b>Complete!</b></font>';
				else
					document.getElementById('client_references').innerHTML = '2. Three(3) Client References (Name, Contact, Address, Phone, and Email): <font color="#FF0000">Not Complete!</font>';

				if(splitArray[2] == 1)
					document.getElementById('product_info').innerHTML = '3. Products List submitted w/ images (Note: Product must include images; One image per product): <font color="#00A65E"><b>Complete!</b></font>';
				else
					document.getElementById('product_info').innerHTML = '3. Products List submitted w/ images (Note: Product must include images; One image per product): <font color="#FF0000">Not Complete!</font>';

				if(splitArray[3] == 1)
					document.getElementById('agreement').innerHTML = '4. Agreement electronically signed and dated: <font color="#00A65E"><b>Complete!</b></font>';
				else
					document.getElementById('agreement').innerHTML = '4. Agreement electronically signed and dated: <font color="#FF0000">Not Complete!</font>';
				
				if(splitArray[4] == 1)
					document.getElementById('receipt').innerHTML = '5. Non-refundable $100 fee paid via PayPal (Paypal Receipt Number submitted): <font color="#00A65E"><b>Complete!</b></font>';
				else
					document.getElementById('receipt').innerHTML = '5. Non-refundable $100 fee paid via PayPal (Paypal Receipt Number submitted): <font color="#FF0000">Not Complete!</font>';					
			document.getElementById('loadimg').style.display = "none";
			}, 1200);
		  }   
		});
	}	
});
