


$( document ).ready(function() {
	//ajaxAction('get');
	var grid = $("#referrals_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		navigation: 0,
		rowCount: -1,

		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "referrals/referrals.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
	grid.find('.actions.btn-group').append('<button class="btn btn-primary" type="button">Edit <span class="icon glyphicon glyphicon-pencil"></span></button>');

    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        
		//alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
		//console.log(grid.data());//
		$('#edit_referralsmodel').modal('show');
		if($(this).data("row-id") >0) {
			// collect the data
			$('#edit_referralsid').val($(this).data("row-id")); // in case we're changing the key
			$('#edit_clientname').val(ele.siblings(':nth-of-type(1)').html());
			$('#edit_contactname').val(ele.siblings(':nth-of-type(2)').html());
			$('#edit_contactemail').val(ele.siblings(':nth-of-type(3)').html());
					
		} else {
		 alert('Now row selected! First select row, then click edit button');
		}
    }).end().find(".command-delete").on("click", function(e){
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
		
			//alert(conf);
			if(conf){
				$.post('referrals/referrals.php', { id: $(this).data("row-id"), action:'delete'}
					, function(){
						// when ajax returns (callback), 
						$("#referrals_grid").bootgrid('reload');
				}); 
					//$(this).parent('tr').remove();
					//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
			}
		});
	});

	function ajaxAction(action) {
		data = $("#frmreferrals_"+action).serializeArray();
		var clientname = $('#' + action + '_clientname').val();
		if(clientname == ""){
			document.getElementById(action + '_clientname').className = document.getElementById(action + '_clientname').className + " error";	
			return;
		}
		$.ajax({
		  type: "POST",  
		  url: "referrals/referrals.php",  
		  data: data,
		  dataType: "json",       
		  success: function(response)  
		  {
			/*if(response == 0){
				if(action == "edit")
					document.getElementById('exist_state').innerHTML = 'User email already exist !';
				if(action == "add")
					document.getElementById('addexist_state').innerHTML = 'User email already exist !';
				return;
			}*/
				$('#'+action+'_referralsmodel').modal('hide');
				$("#referrals_grid").bootgrid('reload');
		  }   
		});
	}
	
	$( "#command-addreferrals" ).click(function() {
		

		$('#add_referralsmodel').modal('show');
	});
	$( "#btn_addreferrals" ).click(function() {
	  ajaxAction('add');
	});
	$( "#btn_editreferrals" ).click(function() {
	  ajaxAction('edit');
	});
});
