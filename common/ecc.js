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
				'careers':'pages/careers.html'
		},

		ecc.pageLoad = function() {
			$.getJSON('index.php?cmd=templates&do=list').done(function(data){


				$.each(data,function(templateIndex,templateObj) {
					if (templateObj.ID == ecc.page) { 
						$('#eccContent').html( templateObj.Template );
						if ((typeof templateObj.LoadArticles !== 'undefined') &&
								(typeof templateObj.LoadArticlesElement !== 'undefined')) {

							ecc.articles.fillElement(1, templateObj.LoadArticlesElement);
						}
						if (ecc.user.details.loggedIn === true) {

							var $editLink = $('<a href="#" class="eccEdit">Edit</a>');

							$editLink.on('click',function(event) {
								event.preventDefault();
								$('#eccContent').empty().append( $('<textarea></textarea').attr('id','eccText').css(
										{'width':'90%','height':'300px'}
								).text( templateObj.Template ));

								var $editSave = $('<div><button class="eccSave">Save</button></div>');
								$editSave = $editSave.find('button');
								$editSave.on('click', function(event) {
									event.preventDefault(); 
									var $submit = {'eccTemplate':eccPage, 'html': $('#eccText').val() }; 
									$.post('?cmd=templates&do=edit', $submit
									).done(function(data){
										console.log(JSON.stringify(data));
									});
								});

								$('#eccContent').append($editSave);
							});
							$('#eccContent').prepend( $editLink.wrap('<div></div>'));
						}

						return false;
					}
				});
			});		
		}
	}( window.ecc = window.ecc || {}, jQuery ));

	if ( typeof urlParam('page') === 'string' ) {
		ecc.page = urlParam('page');
	}

	$.each(ecc.pageMap,function(pageKey, pageURL){ 
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
		var $eccArticleArea = $('[data-eccArticleArea="true"]');
		if ($eccArticleArea.length > 0) {
			$eccArticleArea.each(function(){
				$(this).text('placeholder articles');
			});
		}
	});
});
