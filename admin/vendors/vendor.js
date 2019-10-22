


$( document ).ready(function() {
	//ajaxAction('get');
	var searchParam = "";
	var grid = $("#vendor_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		templates: {
        search: "",
		pagination:"",
		footer:"",
		header:""
		},	
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				searchParam: searchParam

			};
		},
		
		url: "vendors/vendor.php",
		formatters: {
		        "commands": function(column, row)
		        {
								return "<button type=\"button\" class=\"btn btn-xs btn-default command-view\" data-row-id=\"" + row.vendorid + "\" style='margin-right:5px;'><span class=\"glyphicon glyphicon-eye-open\"></span></button> "+
											 "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.vendorid + "\"><span class=\"glyphicon glyphicon-ok-sign\"></span></button>" +
											 "<button type=\"button\" class=\"btn btn-xs btn-default command-print\" data-row-id=\"" + row.vendorid + "\" style='margin-left:5px;'><span class=\"glyphicon glyphicon-print\"></span></button>";;
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
	grid.find('.actions.btn-group').append('<button class="btn btn-primary" type="button">Edit <span class="icon glyphicon glyphicon-pencil"></span></button>');

    /* Executes after data is loaded and rendered */
    grid.find(".command-view").on("click", function(e)
    {
			window.open('vendors/detail.php?vendorid='+ $(this).data("row-id"), '_blank');    
		//alert("You pressed edit on row: " + $(this).data("row-id"));
		}),
    grid.find(".command-print").on("click", function(e)
    {
			$('#edit_vendorid').val($(this).data("row-id")); // in case we're changing the key
			window.open('vendors/print/printModal.php?vendorid='+ $('#edit_vendorid').val(), '_blank');    
			//alert("You pressed edit on row: " + $(this).data("row-id"));
    })		
		.end().find(".command-edit").on("click", function(e){
			$('#edit_vendormodel').modal('show');
			var ele =$(this).parent();
			if($(this).data("row-id") >0) {
				// collect the data
				$('#edit_vendorid').val($(this).data("row-id")); // in case we're changing the key
				
				var status = $(this).parent().siblings(':nth-of-type(6)').html();
				switch(status){
					case "Pending":
						document.getElementById("edit_status").selectedIndex = "0";
					break;
					case "Accepted":
						document.getElementById("edit_status").selectedIndex = "1";
					break;
					case "Rejected":
						document.getElementById("edit_status").selectedIndex = "2";
					break;
					default:
						document.getElementById("edit_status").selectedIndex = "0";
						break;
				}
			}	
		});
	});

	function openDialog(url,width,height,bModal) {
		if(bModal)
			openModalDialog(url, width, height);
		else
			openCommonDialog(url, width, height);
	}
	function openModalDialog(url,width,height) {
		var features="location=no; menubar=no; addressbar=no; status=yes; scrollbars=no; resizable=no; toolbar=no";
		
		if (width) {
			 if (window.screen.width > width)
					features+="; dialogLeft="+(window.screen.width-width)/2;
			 else
				 width=window.screen.width;
			 features+="; dialogWidth=" + width + "px;";
		}
		
		if (height) {
			 if (window.screen.height > height)
					features+="; dialogTop="+(window.screen.height-height)/2;
			 else
				 height=window.screen.height;
			 features+="; dialogHeight=" + height + "px;";
		}
		window.showModalDialog(url,'',features);
	}
	function openCommonDialog(url,width,height) {
		var features="location=no, menubar=no, status=yes, scrollbars=yes, resizable=no, toolbar=no";
		
		if (width) {
			 if (window.screen.width > width)
					features+=", left="+(window.screen.width-width)/2;
			 else width=window.screen.width;
				 features+=", width="+width;
		}
		
		if (height) {
			 if (window.screen.height > height)
					features+=", top="+(window.screen.height-height)/2;
			 else height=window.screen.height;
				 features+=", height="+height;
		}
		window.open(url,'',features);
	}

	function ajaxAction() {
		//var form_data = new FormData(); 
	//	form_data.append('action', "edit");
		$.ajax({
		  type: "POST",  
		  url: "vendors/vendor.php",  
		  data: ({action: 'edit', edit_comments : $('#edit_commet').val(), edit_status : $('#edit_status').val(), edit_vendorid : $('#edit_vendorid').val()}),
		  dataType: "json",       
		  success: function(response)  
		  {
				$('#edit_vendormodel').modal('hide');
				$("#vendor_grid").bootgrid('reload');
		  }   
		});
	}

	$("#searchBtn").click(function(){ 
		searchParam = $('#searchVendor').val();
		$.ajax({
		  type: "POST",  
		  url: "vendors/vendor.php",  
		  data: ({action: 'search', searchParam : searchParam}),
		  dataType: "json",       
		  success: function(response)  
		  {
				$("#vendor_grid").bootgrid('reload');
		  }   
		});

	}); 	

	function download(filename) {
    var element = document.createElement('a');
    element.setAttribute('href', 'vendors/pdf/'+filename );
		element.setAttribute('target', 'new');
	//	element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}

function ajaxPrintAction() {
		//var form_data = new FormData(); 
	//	form_data.append('action', "edit");
		$.ajax({
		  type: "POST",  
		  url: "vendors/exportpdf/exportpdf.php",  
		  data: ({edit_vendorid : $('#edit_vendorid').val()}),
		  dataType: "text",       
		  success: function(response)  
		  {
			//	download(response);		  
			}   
		});
	}	

	$( "#command-edit" ).click(function() {
		$('#edit_vendormodel').modal('show');
	});		

	$( "#btn_editvendor" ).click(function() {
	  ajaxAction();
	});
});
