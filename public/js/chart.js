function get_values()
{
	jsonData = $.ajax
		({
			type: "POST",
			url: base_url + 'index.php/chart/test',
			data: {},
			dataType: "json",
			success: function( data )
			{
				// alert(JSON.stringify(data));
			}
		}).responseText;

		var data = new google.visualization.DataTable(jsonData);

		alert(data);


}