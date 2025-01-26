var total_company = 1;

function delete_color(id)
{
	//12-10-17
	r = confirm('Delete this color?');
	if( r == true)
	{
		$.ajax({
			type: "POST",
			url: $('#delete_color_url').val(),
			data: { color_id : id},
			success: function(data)
			{
				alert(data);
				location.reload();
			}
		});
	}
}

function remove_company(company, e)
{
	//12-10-17
	e.preventDefault();

	$('#company_num' + company).remove();

	total_company--;
}

function remove_color(color, e)
{
	//14-10-17
	e.preventDefault();

	$('#color_num' + color).remove();
}

$(document).ready(function(){

	
	// var total_color = 1;

	$("#product_category_id").unbind('change');		//12-10-17

	$('#product_category_id').on("change", function(){
		//12-10-17
		var category_id = $(this).val();
		var url = $('#get_sub_category_url').val();

		$.ajax({
			type: "POST",
			url: url,
			data: { category_id : category_id},
			success: function(data)
			{
				$('#product_sub_cat_id').html(data);
			}
		});
	});

	$("#add_more_company").unbind('click');		//12-10-17
	
	$('#add_more_company').click(function(e){
		//12-10-17
		e.preventDefault();

		total_company++;

		var get_company_url = $('#get_company_url').val();

		$.ajax({
			type: "POST",
			url: get_company_url,
			success: function(data)
			{
				var com_n_unit = $.parseJSON(data);

				if($('#color_wise_inv').is(':checked') || $('#color_wise_inv_stock').val() == 1)
				{
					$('#company_info').append('<div id="company_num'+ total_company +'"><hr> <div class="row"> <div class="col-md-3"><div class="form-group"><label>Company</label><select class="form-control" name="company_id[]">' + com_n_unit.company + '</select></div></div> <div class="col-md-2"><div class="form-group"><label>Total Quantity</label><input type="number" class="form-control" name="total_qty[]" id="total_qty' + total_company + '" ></div></div> <div class="col-md-2"><div class="form-group"><label>Unit</label><select class="form-control" name="unit_id[]">' + com_n_unit.unit + '</select></div></div> <div class="col-md-2"><div class="form-group"><label>Retail Price</label><input type="number" class="form-control" name="retail_price[]" ></div></div> <div class="col-md-2"><div class="form-group"><label>Purchase Cost</label><input type="number" class="form-control" name="purchase_price[]" ></div></div> <div class="col-md-1"><div class="form-group"><button class="btn btn-danger form-control" onclick="remove_company( ' + total_company + ', event)"> <span class="fa fa-minus">&nbsp;</span> </button></div></div> </div> <div class="row"><div class="col-md-2"><div class="form-group"><label>Red</label><input type="number" class="form-control" name="red_qty[]" id="red_qty' + total_company + '"></div></div> <div class="col-md-2"><div class="form-group"><label>Black</label><input type="number" class="form-control" name="black_qty[]" id="black_qty' + total_company + '"></div></div> <div class="col-md-2"><div class="form-group"><label>Yellow</label><input type="number" class="form-control" name="yellow_qty[]" id="yellow_qty' + total_company + '"></div></div> <div class="col-md-2"><div class="form-group"><label>Green</label><input type="number" class="form-control" name="green_qty[]" id="green_qty' + total_company + '"></div></div> <div class="col-md-2"><div class="form-group"><label>Blue</label><input type="number" class="form-control" name="blue_qty[]" id="blue_qty' + total_company + '"></div></div> <div class="col-md-2"><div class="form-group"><label>Others</label><input type="number" class="form-control" name="other_qty[]" id="other_qty' + total_company + '"></div></div></div> </div>');
				}
				else
				{
					$('#company_info').append('<div class="row" id="company_num'+ total_company +'"> <div class="col-md-3"><div class="form-group"><select class="form-control" name="company_id[]">' + com_n_unit.company + '</select></div></div> <div class="col-md-2"><div class="form-group"><input type="number" class="form-control" name="total_qty[]" ></div></div> <div class="col-md-2"><div class="form-group"><select class="form-control" name="unit_id[]">' + com_n_unit.unit + '</select></div></div> <div class="col-md-2"><div class="form-group"><input type="number" class="form-control" name="retail_price[]" ></div></div> <div class="col-md-2"><div class="form-group"><input type="number" class="form-control" name="purchase_price[]" ></div></div> <div class="col-md-1"><div class="form-group"><button class="btn btn-danger form-control" onclick="remove_company( ' + total_company + ', event)"> <span class="fa fa-minus">&nbsp;</span> </button></div></div> </div>');
				}
			}
		})
	});

	$("#submit_product").unbind('click');		//14-10-17
	$('#submit_product').click(function(e) {
		//14-10-17
		e.preventDefault();

		if($('#product_name').val() == '')
		{
			alert('Product Name field is required.');
			return;
		}

		if($('#product_sub_cat_id').val() == '' || $('#product_sub_cat_id').val() == 0)
		{
			alert('Sub Category field is required.');
			return;
		}

		if($('.product_add_date').val() == '')
		{
			alert('Date field is required.');
			return;
		}

		if($('#company_id').val() == '')
		{
			alert('Company field is required.');
			return;
		}

		if($('#total_qty1').val() == '')
		{
			alert('Total Quantity field is required.');
			return;
		}

		if($('#unit_id').val() == '')
		{
			alert('Unit field is required.');
			return;
		}

		if($('#retail_price1').val() == '')
		{
			alert('Retail Price field is required.');
			return;
		}

		// if($('#wholesale_price1').val() == '')
		// {
		// 	alert('Wholesale Price field is required.');
		// 	return;
		// }

		if($('#purchase_price1').val() == '')
		{
			alert('Purchase Price field is required.');
			return;
		}


		//check total_qty == sum of all other qty
		var total_qty = 0;
		var color_qty = 0;
		var red_qty = 0;
		var black_qty = 0;
		var yellow_qty = 0;
		var green_qty = 0;
		var blue_qty = 0;
		var other_qty = 0;

		for(ij = 1; ij <= total_company; ij++)
		{
			total_qty = $('#total_qty' + ij).val();

			if(total_qty < 0)
			{
				$('#total_qty' + ij).css('border', '1px solid red');
				alert('Negative Quantity is not allowed.');
				return;
			}

			red_qty = $('#red_qty' + ij).val();
			if(isNaN(red_qty) || red_qty == '' )
			{
				color_qty = 0;
			}
			else color_qty = red_qty;

			black_qty = $('#black_qty' + ij).val();
			if(isNaN(black_qty) || black_qty == '' )
			{
				color_qty = parseInt(color_qty) + parseInt(0);
			}
			else color_qty = parseInt(color_qty) + parseInt(black_qty);

			yellow_qty = $('#yellow_qty' + ij).val();
			if(isNaN(yellow_qty) || yellow_qty == '' )
			{
				color_qty = parseInt(color_qty) + parseInt(0);
			}
			else color_qty += parseInt(yellow_qty);

			green_qty = $('#green_qty' + ij).val();
			if(isNaN(green_qty) || green_qty == '' )
			{
				color_qty = parseInt(color_qty) + parseInt(0);
			}
			else color_qty += parseInt(green_qty);

			blue_qty = $('#blue_qty' + ij).val();
			if(isNaN(blue_qty) || blue_qty == '' )
			{
				color_qty = parseInt(color_qty) + parseInt(0);
			}
			else color_qty += parseInt(blue_qty);

			other_qty = $('#other_qty' + ij).val();
			if(isNaN(other_qty) || other_qty == '' )
			{
				color_qty = parseInt(color_qty) + parseInt(0);
			}
			else color_qty += parseInt(other_qty);
			
			if(total_qty != color_qty && ($('#color_wise_inv').is(':checked') || $('#color_wise_inv_stock').val() == 1))
			{
				$('#total_qty' + ij).css('border', '1px solid red');
				alert('Total Quantity is not equal to sum of all other quantity.');
				return;
			}
			else
			{
				$('#total_qty' + ij).css('border', '1px solid #d2d6de');
			}

		}

		$("form")[0].submit();
	});

	$('#color_info_row').hide();	//14-10-17

	$('#color_wise_inv').click(function() {
		//14-10-17	//26-10-17
		$('#color_info_row').toggle();
	})

	if($('#color_wise_inv_stock').val() == 1)
	{
		//15-10-17
		$('#color_info_row').show();
	}

	$('#search_company_wise').click(function(e){
		//16-10-17
		e.preventDefault();

		var url_company_wise_report = $('#url_company_wise_report').val();

		if($('#company_id').val() == '')
		{
			$('#company_id').css('border', '1px solid red');
			alert('Select Company.');
			return;
		}
		$('#company_id').css('border', '1px solid #d2d6de');

		if($('#product_category_id').val() == '')
		{
			$('#product_category_id').css('border', '1px solid red');
			alert('Select Category.');
			return;
		}

		$('#product_category_id').css('border', '1px solid #d2d6de');

		$.ajax({
			type: "POST",
			url: url_company_wise_report,
			data: 
			{
				company_id: $('#company_id').val(),
				product_category_id: $('#product_category_id').val()
			},
			success: function(data)
			{
				var newWindow = window.open();
				newWindow.document.write(data);
			}
		});
	});

	$('#search_category_wise').click(function(e){
		//16-10-17
		e.preventDefault();

		var url_category_wise_report = $('#url_category_wise_report').val();

		if($('#product_category_id').val() == '')
		{
			$('#product_category_id').css('border', '1px solid red');
			alert('Select Product Category.');
			return;
		}

		$('#product_category_id').css('border', '1px solid #d2d6de');

		$.ajax({
			type: "POST",
			url: url_category_wise_report,
			data: 
			{
				product_category_id: $('#product_category_id').val(),
				product_sub_cat_id: $('#product_sub_cat_id').val()
			},
			success: function(data)
			{
				var newWindow = window.open();
				newWindow.document.write(data);
			}
		});
	});
});

