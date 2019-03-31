$(function() {
	$('.btn-like').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'process/aime.php',
			data: {
				id: $(this).attr('data-id')
			},
			dataType: 'json',
			success: function(json) {
				if (json.isSuccess) {
					location.reload();
				}
			}
		});
	});
});
