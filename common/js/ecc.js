function urlParam(paramKey) {
	/* modified from http://stackoverflow.com/a/5448595 */

	var items = location.search.substr(1).split("&");
	for (var index = 0, tempArray = []; index < items.length; index++) {
		tempArray = items[index].split("=");
		if (tempArray[0] === paramKey) {  
			return tempArray[1];
		}
	}
	return null;
}

$(document).ready(function() {

	$.get('common/ui/header.html').done(function(headerHTML){
		$('#eccHeader').html(headerHTML);
	});


	(function( ecc, $, undefined ) { 

		ecc.page = 'default',
		ecc.pageURL = false,
		ecc.pageMap = { 
				'default':'common/ui/default.html',
				'error':'common/ui/error.html',
				'careers':'pages/careers.html',
				'alumni':'pages/alumni.html',
				'read':'pages/read.html',
				'faculty':'pages/faculty.html',
				'news':'pages/news.html'
		},

		ecc.process = function() {

			if ( typeof urlParam('page') === 'string' ) {
				ecc.page = urlParam('page');
			}

			$.each(ecc.pageMap,function(pageKey, pageURL) { 
				if (pageKey == ecc.page) {
					ecc.pageURL = pageURL;
					return false;
				}
			});
			if (ecc.pageURL === false) {
				ecc.pageURL = ecc.pageMap['error'];
			}

			$.get( ecc.pageURL ).done(function(pageHTML){
				$('#eccContent').html(pageHTML);
			}).done(function() {

				$('form.eccPseudoForm').on('submit',function(event){
					event.preventDefault();
					$.post( $(this).attr('action'), $(this).serialize() );						
					$('#eccContent div.eccPseudoFormStatus').text('Your information has been submitted.');

				}).trigger('reset');

			});

		}
	}( window.ecc = window.ecc || {}, jQuery ));

	ecc.process();
});