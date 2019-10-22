function checkState(checkbox)
{
    if (checkbox.checked)
       $('#add_checkstate').val(1);
    else
	   $('#add_checkstate').val(0);

}
function changeImage(){
	document.getElementById("progress_div").style.display = "none";
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
	var searchParam1 = "";

	$('#frm_add').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				url: "productlist/upload.php",
				beforeSubmit:function(){
					$('.progress-bar').width('0%');
					$('#progress_div').show();
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
				//	setTimeout(function() {
						$('#targetLayer').show();
					//	$('#progress_div').hide();
				//	}, 5000);					
					//document.getElementById("progress_div").style.display="none";
					
				},
				complete: function(xhr) {
				},
    			resetForm: false
			});
		}
		return false;
	});


	$('#frm_edit').submit(function(event){
		//	alert("a");
			if($('#edituploadFile').val())
			{
			
				event.preventDefault();
			//	$('#edittargetLayer').hide();
				$(this).ajaxSubmit({
					target: '#edittargetLayer',
					url: "productlist/uploadedit.php",
					beforeSubmit:function(){
						$('.progress-bar').width('0%');
						$('#progress_editdiv').show();
					},
					uploadProgress: function(event, position, total, percentageComplete)
					{
						$('.progress-bar').animate({
							width: percentageComplete + '%'
						}, {
							duration: 1000
						});
					},
					success:function(){
					//	setTimeout(function() {
							$('#edittargetLayer').show();
						//	$('#progress_div').hide();
					//	}, 5000);					
						//document.getElementById("progress_div").style.display="none";
						
					},
					complete: function(xhr) {
					},
						resetForm: false
				});
			}
			return false;
		});		
	function readURL_forAdd(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $('#add_product').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#add_upload").change(function() {
	  readURL_forAdd(this);
	});
	
	$("#searchproductBtn").click(function(){ 
		searchParam1 = $('#searchProduct').val();
		$.ajax({
		  type: "POST",  
		  url: "productadmin/product.php",  
		  data: ({action: 'search', searchParam : searchParam1}),
		  dataType: "json",       
		  success: function(response)  
		  {
				$("#productadmin_grid").bootgrid('reload');
		  }   
		});

	}); 	
	
	function readURL_forEdit(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $('#edit_picture').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	$("#edit_upload").change(function() {
	  readURL_forEdit(this);
	});
	var vendorid=$("#vendorid").val();
	var formData = new FormData();
	formData.append('vendorid', vendorid);
	
	var grid = $("#productadmin_grid").bootgrid({

		ajax: true,
		rowSelect: true,
		data:formData,
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
				searchParam: searchParam1
		};			
		},
		
		url: "productadmin/product.php",
		formatters: {
				"image": function(column, row) {
					var product_img = "";
					if(row.photofile == "")
						product_img = "<a href='products/noproductImg.png' target='new' ><img class='table-img' src='../products/noproductImg.png' /></a>"
					else{
							var img_src = "../products/"+ row.vendorid + "/" + row.photofile;
							product_img = "<a href='productadmin/largeimage.php?imgpath=" + img_src + "' target='new' ><img class='table-img' src='../products/" + row.vendorid + "/" + row.photofile + "'/></a>";
					}
					
					return product_img;
				},			
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\" data-row-productdesc=\"" + row.product_desc + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> "
		                
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
			$('#edit_product').attr('src', str_imgSrc); //setting uploaded picture
			
			//document.getElementById('eidt_upload').parentNode.style.backgroundImage = "url(" + str_imgSrc + ")";  
            var g_name = $(this).parent().siblings(':nth-of-type(3)').html();
		//console.log(grid.data());//
		$('#edit_model').modal('show');

		if($(this).data("row-id") >0) {
			// collect the data
			$('#edit_id').val($(this).data("row-id")); // in case we're changing the key
			$('#edit_productname').val(ele.siblings(':nth-of-type(4)').html());
			$('#edit_productdesc').val($(this).data("row-productdesc"));
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
						$("#productadmin_grid").bootgrid('reload');
				}); 
					//$(this).parent('tr').remove();
					//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
			}
		});
	});

	function ajaxAction(action) {
		var form_data = new FormData(); 
		form_data.append('action', "edit");
		form_data.append('hq_status', $("#hq_status").val());
		form_data.append('hq_comments', $("#hq_comments").val());
		form_data.append('edit_id', $("#edit_id").val());
		$.ajax({
		  type: "POST",  
		  url: "productadmin/product.php",  
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
				$("#productadmin_grid").bootgrid('reload');
		  }   
		});
	}
	
	$( "#command-add" ).click(function() {
		/*$( "#add_ownername" ).val("");
		$( "#add_owneraddress" ).val("");
		$( "#add_ownerpct" ).val("");
		$( "#add_note" ).val("");*/
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
