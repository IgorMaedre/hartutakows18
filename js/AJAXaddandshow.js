
    function gorde(){ 
		url = $("#formularioa").attr('action'),
		type = $("#formularioa").attr('method'),
		data = $("#formularioa").serialize();

		$.ajax({
		
			url: url,
			type: type,
			data: data,
			success: function(response) {
				console.log(data);
				console.log(response);
				showfile();
			}

		});

		return false;

    }
