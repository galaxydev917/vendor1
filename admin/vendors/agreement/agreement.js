

$( document ).ready(function() {
	//loadAction();
	
	$( "#btn_agreement" ).click(function() {
		
	  $( "#action" ).val("signed");	
	  
		ajaxAgreeAction();
	});
	
	$( "#reciept_div" ).click(function() {
	  $( "#action" ).val("save");
	  if($( "#receipt_number" ).val() == "")
			return;
			ajaxAgreeAction();
		$('#overlay_receipt').modal('show');

		setTimeout(function() {
			$('#overlay_receipt').modal('hide');
		}, 2000);	  
	});

	function ajaxAgreeAction() {
		//data = $("#frm_agreement").serializeArray();
	//	alert("a");
		var action = $( "#action" ).val();
		var receipt_number = $( "#receipt_number" ).val();
		var vendorid = $( "#vendorid" ).val();
	//	alert(vendorid);

		$.ajax({
		  type: "POST",  
		  url: "agreement/agreement.php",  
		  data: ({action: action, receipt_number: receipt_number, vendorid:vendorid}),
		  dataType: "text",       
		  success: function(response)  
		  {
				//$( "#receipt_number" ).val("");
				document.getElementById("signed_user").innerHTML = document.getElementById('first_name').value + document.getElementById('last_name').value + " agree to on ";
			  document.getElementById("signed_date").innerHTML = response;
			  document.getElementById('btn_agreement').style.visibility = 'hidden';	
			  document.getElementById('reciept_div').innerHTML = '<input type="button" value="Save Paypal Receipt Number" class="btn btn-skin btn-block"  id="save_receipt" style="margin-left:-80px; width:300px;">';	
          }   
		});
	}
	
	function loadAction() {
		//data = $("#frm_agreement").serializeArray();
		var action = $( "#action" ).val();
		$.ajax({
		  type: "POST",  
		  url: "agreement/agreement.php",  
		  data: ({action: action}),
		  dataType: "text",       
		  success: function(response)  
		  {
			  alert(response);
			  if(response != "unsigned"){
				document.getElementById("signed_date").innerHTML = response;
				document.getElementById("btn_agreement").className = "btn btn-xs btn-disable";
			  }	

		  }   
		});
	}

});
