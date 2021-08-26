	$(document).ready(function(){
		$('#client').change(function(){
			let c_id = $('#client').val()/*gets the value from the selected client and stores in the in the variable c_id*/
			$.ajax({
				url: './layouts/tools/processors/locationProcessor.php', /*calls the SQL data result location*/
				method: 'post',
				data: 'c_id=' + c_id
			}).done(function(locations){
				$('#location').empty();
				locations = JSON.parse(locations);
				locations.forEach(function(locations){
					$('#location').append('<option>' + locations.location + '</option>')
				})
			})
		})
	})