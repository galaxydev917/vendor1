$( document ).ready(function() {
	//ajaxAction('get');
	var grid = $("#owner_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "owners/owners.php",
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
		$('#edit_model').modal('show');
		if($(this).data("row-id") >0) {
			// collect the data
			$('#edit_id').val($(this).data("row-id")); // in case we're changing the key
			$('#edit_ownername').val(ele.siblings(':nth-of-type(1)').html());
			$('#edit_owneraddress').val(ele.siblings(':nth-of-type(2)').html());
			$('#edit_ownerpct').val(ele.siblings(':nth-of-type(3)').html());
			//$('#edit_note').val(ele.siblings(':nth-of-type(4)').html());

			//document.getElementById('exist_state').innerHTML = '';

					
		} else {
		 alert('Now row selected! First select row, then click edit button');
		}
    }).end().find(".command-delete").on("click", function(e){
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
		
			//alert(conf);
			if(conf){
				$.post('owners/owners.php', { id: $(this).data("row-id"), action:'delete'}
					, function(){
						// when ajax returns (callback), 
						$("#owner_grid").bootgrid('reload');
				}); 
					//$(this).parent('tr').remove();
					//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
			}
		});
	});

	function ajaxAction(action) {
		data = $("#frm_"+action).serializeArray();
		var ownername = $('#' + action + '_ownername').val();
		var ownerpct = $('#' + action + '_ownerpct').val();
		if(ownername == ""){
			document.getElementById(action + '_ownername').className = document.getElementById(action + '_ownername').className + " error";	
			return;
		}
		if(ownerpct == ""){
			document.getElementById(action + '_ownerpct').className = document.getElementById(action + '_ownerpct').className + " error";	
			return;
		}
		$.ajax({
		  type: "POST",  
		  url: "owners/owners.php",  
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
				$('#'+action+'_model').modal('hide');
				$("#owner_grid").bootgrid('reload');
		  }   
		});
	}
	
	$( "#command-add" ).click(function() {
		$( "#add_ownername" ).val("");
		$( "#add_owneraddress" ).val("");
		$( "#add_ownerpct" ).val("");
		$( "#add_note" ).val("");
		//document.getElementById('addexist_state').innerHTML = '';
		

		$('#add_model').modal('show');
	});
	$( "#btn_add" ).click(function() {
	  ajaxAction('add');
	});
	$( "#btn_edit" ).click(function() {
	  ajaxAction('edit');
	});
});
