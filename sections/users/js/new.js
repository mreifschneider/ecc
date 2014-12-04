$('#eccUserNew').on('submit',function(event){
	event.preventDefault();
	$.post('?cmd=users&do=new',$('#eccUserNew').serialize()).done(function(data){
		if (data) {
			if (data.hasOwnProperty('result') === true) {
				if (data.result === 'success') {
					$('#eccContent').empty().append('<p>Successfully registered new user!</p>');
				}
			}
		}	
	});		
});

