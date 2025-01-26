$(document).ready(function() {


	$('#company_id_get_product').on("change", function() {
		//19-10-17

		var company = $(this).val();
		var url = $('#url_get_product_company_wise').val();

		if(company != '' || company != 0)
		{
			$.ajax({
				type: "POST",
				url: url,
				data: { company_id: company },
				success: function(data)
				{
					$('#product_id').html(data);
				}
			});
		}
	});

	$('#search_stock_report').click(function() {
		//21-10-17
		
		var company = $('#company_id_get_product').val();
		var product = $('#product_id').val();
		var url_stock_report = $('#url_stock_report').val();

		if(company == '' || company == 0)
		{
			alert('Select Company.');
			return;
		}

		$.ajax({
			type: "POST",
			url: url_stock_report,
			data: 
			{
				company_id : company,
				product_id : product
			},
			success: function(data)
			{
				var newWindow = window.open();
				newWindow.document.write(data);
			}
		});
	});
});