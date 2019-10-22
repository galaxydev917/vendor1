function checkState(checkbox)
{
    if (checkbox.checked)
       $('#add_checkstate').val(1);
    else
	   $('#add_checkstate').val(0);

}

function imageview(imgObj){
	$('#img_product').attr('src', imgObj.src); //setting uploaded picture
	var full_width = $(document).width();
	var full_height = $(document).height();
	document.getElementById('imageview_dialog').style.width = full_width+"px";
	document.getElementById('imageview_content').style.height = full_height+"px";
	document.getElementById('img_product').style.width = (full_width-30)+"px";
	document.getElementById('img_product').style.height = "620px";
	
	$('#imageView_model').modal('show');

}

function changeInputState(Obj){
	Obj.className = "form-control input-md";	
}

$( document ).ready(function() {
	$('#add_targetLayer').hide();
		

	function readURL_forAdd(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $('#add_PreviewImg').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	
	$("#uploadFile").change(function() {
		$('#add_targetLayer').show();
		readURL_forAdd(this);
	});
	
	
	
	
	function readURL_forEdit(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $('#edit_PreviewImg').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#edituploadFile").change(function() {
		$('#edittargetLayer').show();
		readURL_forEdit(this);
	});
	
	var vendorid=$("#vendorid").val();
	var formData = new FormData();
	formData.append('vendorid', vendorid);

	var grid = $("#owner_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		data:formData,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				vendorid: $("#vendorid").val(),
		};			
		},
		
		url: "productlist/product.php",
		formatters: {
				"image": function(column, row) {
					var product_img = "";
					if(row.photofile == "")
						product_img = "<a href='products/noproductImg.png' target='new' ><img class='table-img' src='../../products/noproductImg.png' /></a>"
					else{
							var img_src = "../../products/"+ row.vendorid + "/" + row.photofile;
							product_img = "<a href='productlist/largeimage.php?imgpath=" + img_src + "' target='new' ><img class='table-img' src='../../products/" + row.vendorid + "/" + row.photofile + "'/></a>";
					}
					
					return product_img;
				},			
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
			var str_imgTag = ele.siblings(':nth-of-type(1)').html();
			
			var src_index = str_imgTag.indexOf("src");
			var str_imgSrc = str_imgTag.substring(src_index+5, str_imgTag.length - 6);
			$('#edit_PreviewImg').attr('src', str_imgSrc); //setting uploaded picture
			
			//document.getElementById('eidt_upload').parentNode.style.backgroundImage = "url(" + str_imgSrc + ")";  
            var g_name = $(this).parent().siblings(':nth-of-type(3)').html();
		//console.log(grid.data());//
		$('#edit_model').modal('show');
		if($(this).data("row-id") >0) {
			// collect the data
			$('#edit_id').val($(this).data("row-id")); // in case we're changing the key
			$('#edit_productname').val(ele.siblings(':nth-of-type(2)').html());
			$('#edit_productdesc').val(ele.siblings(':nth-of-type(3)').html());
			//$('#edit_note').val(ele.siblings(':nth-of-type(4)').html());

			//document.getElementById('exist_state').innerHTML = '';

					
		} else {
		 alert('Now row selected! First select row, then click edit button');
		}
    }).end().find(".command-delete").on("click", function(e){
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
		
			//alert(conf);
			if(conf){
				$.post('productlist/product.php', { id: $(this).data("row-id"), action:'delete'}
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
		var  vendorid = $('#vendorid').val();
		var  product_name = $('#' + action + '_productname').val();
		var  product_code = $('#' + action + '_productcode').val();
		var  product_desc = $.trim($('#' + action + '_productdesc').val());
		//var file_data = $('#' + action + '_upload').prop('files')[0];  
    var add_uploadfile = $('#uploadFile').prop('files')[0]; 
    var edit_uploadfile = $('#edituploadFile').prop('files')[0]; 
		var form_data = new FormData(); 
		if(action == "add"){
			if(product_name == ""){
				document.getElementById(action + '_productname').className = document.getElementById(action + '_productname').className + " error";	
				return;
			}
			if(product_desc == ""){
				document.getElementById(action + '_productdesc').className = document.getElementById(action + '_productdesc').className + " error";	
				return;
			}
			form_data.append('product_code', product_code);
			form_data.append('file', add_uploadfile);
		//	alert(document.getElementById(action + 'checkstate').value);
			form_data.append('links_logo', document.getElementById(action + 'checkstate').value);
		}
		if(action == "edit"){
			if(product_name == ""){
				document.getElementById(action + '_productname').className = document.getElementById(action + '_productname').className + " error";	
				return;
			}
			if(product_desc == ""){
				document.getElementById(action + '_productdesc').className = document.getElementById(action + '_productdesc').className + " error";	
				return;
			}
			form_data.append('edit_id', $('#edit_id').val());
			form_data.append('file', edit_uploadfile);
		}		
		
	//	form_data.append('file', uploadfile);
		form_data.append('action', action);
		form_data.append('product_name', product_name);
		
		form_data.append('product_desc', product_desc);
		form_data.append('vendorid', vendorid);
	
		$.ajax({
		  type: "POST",  
		  url: "productlist/product.php",  
		  data: form_data,
		  dataType: "json",  
          cache: false,
          contentType: false,
          processData: false,		  
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
		$( "#add_productname" ).val("");
		$( "#add_productcode" ).val("");
		$( "#add_productdesc" ).val("");
		$( "#add_targetLayer" ).hide();
		$("#uploadFile").val("");
		$('#add_model').modal('show');
	});
	$( "#btn_add" ).click(function() {
	  ajaxAction('add');
	});
	$( "#btn_edit" ).click(function() {
	  ajaxAction('edit');
	});
});
