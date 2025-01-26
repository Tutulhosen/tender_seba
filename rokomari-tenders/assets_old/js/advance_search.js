$(document).ready(function() {
	$('#date_1').hide();
	$('#date_2').hide();

	$('#search_by_date').change(function() {
		var search_by = $('#search_by_date').val();

		if(search_by != 0 && search_by != '')
		{
			$('#date_1').show();
			$('#date_2').show();
		}
		else
		{
			$('#date_1').hide();
			$('#date_2').hide();
		}
	})
	//end search_by_date change

	$('#reset_adv_search').click(function(e){
		e.preventDefault();

		$("select").val('').change();

		location.reload();
	});

	$('#advance_search_btn').click(function(e){
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: webPath + "site/get_advance_search_result",
			data: $('#advance_search_form').serialize(),
			success: function(data)
			{
				$('#advance_search_result').fadeOut('slow');
				// $('#loader_image').show('slow');

				var jsonData = $.parseJSON(data);

				var total_tender = '';
				if(jsonData.total_tender != -1)
				{
					total_tender = '<p class="h5 text-primary">Showing '+ jsonData.total_tender +' Tender</p>';
				}
				setTimeout(function() {
					// $('#loader_image').hide();
					$('#advance_search_result').fadeIn('slow').html(total_tender + jsonData.result);    
				}, 2000);
			}
		});
	});
});