


$( document ).ready(function() {
	//ajaxAction('get');
	var grid = $("#officer_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "officers/officers.php",
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
		$('#edit_officermodel').modal('show');
		if($(this).data("row-id") >0) {
			// collect the data
			$('#edit_officerid').val($(this).data("row-id")); // in case we're changing the key
			$('#edit_officername').val(ele.siblings(':nth-of-type(1)').html());
			$('#edit_ownerposition').val(ele.siblings(':nth-of-type(2)').html());
					
		} else {
		 alert('Now row selected! First select row, then click edit button');
		}
    }).end().find(".command-delete").on("click", function(e){
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
		
			//alert(conf);
			if(conf){
				$.post('officers/officers.php', { id: $(this).data("row-id"), action:'delete'}
					, function(){
						// when ajax returns (callback), 
						$("#officer_grid").bootgrid('reload');
				}); 
					//$(this).parent('tr').remove();
					//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
			}
		});
	});

	function ajaxAction(action) {
		data = $("#frmofficer_"+action).serializeArray();
		var officername = $('#' + action + '_officername').val();
		var ownerpostion = $('#' + action + '_ownerposition').val();
		if(officername == ""){
			document.getElementById(action + '_officername').className = document.getElementById(action + '_officername').className + " error";	
			return;
		}
		if(ownerpostion == ""){
			document.getElementById(action + '_ownerposition').className = document.getElementById(action + '_ownerposition').className + " error";	
			return;
		}
		$.ajax({
		  type: "POST",  
		  url: "officers/officers.php",  
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
				$('#'+action+'_officermodel').modal('hide');
				$("#officer_grid").bootgrid('reload');
		  }   
		});
	}
	
	$( "#command-addofficer" ).click(function() {
		

		$('#add_officermodel').modal('show');
	});
	$( "#btn_addofficer" ).click(function() {
	  ajaxAction('add');
	});
	$( "#btn_editofficer" ).click(function() {
	  ajaxAction('edit');
	});
});
