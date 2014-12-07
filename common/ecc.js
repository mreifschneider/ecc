$(document).ready(function() {

	$.get('common/ui/header.html').done(function(headerHTML){
		$('#eccHeader').html(headerHTML);
	});

	(function( ecc, $, undefined ) { 

		ecc.articles = {
				'fetch': function(){
					if (typeof ecc.articles.storage === 'object') { 
						return $.Deferred();
					}
					return $.get('storage/articles.xml',function(articleXML) {
						ecc.articles.storage = $(articleXML).find('articles');
					});
				}
		},

		ecc.page = 'default',
		ecc.pageURL = false,
		ecc.pageMap = { 
				'default':'common/ui/default.html',
				'error':'common/ui/error.html',
				'careers':'pages/careers.html',
				'alumni':'pages/alumni.html',
				'read':'pages/read.html'
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
		ecc.process = function() {
			
			if (typeof urlParam('id') === 'string') {
				ecc.id = parseInt( urlParam('id') );
				
			}

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

					$(this).trigger('reset');
				});

				var $eccArticleArea = $('[data-eccArticleArea="true"]');
				if ($eccArticleArea.length > 0) {

					var eccArticleAreaCount = 3,
					eccArticleCharLimit = false, 
					eccArticleCategoryInclude = 'news', eccArticleOnlyMetadata = false;

					if (typeof $eccArticleArea.attr('data-eccArticleOnlyMetadata') === 'string') {
						eccArticleOnlyMetadata = true;
					}

					if (typeof $eccArticleArea.attr('data-eccArticleCharLimit') === 'string') {
						eccArticleCharLimit = parseInt( $eccArticleArea.attr('data-eccArticleCharLimit') );
					}

					$.get('templates/articles.html?id='+new Date().getTime()).done(function(articleTemplateHTML) { 

						var $eccArticleTemplate, $eccArticleTemplateMaster = $(
								articleTemplateHTML ).find('.eccTemplate').clone(); 

						$eccArticleTemplateMaster.removeClass('eccTemplate');

						ecc.articles.fetch().done(function() {
							var $articles = ecc.articles.storage;

							$articles.find('article').each(function(articleID){

								var $eccArticleLink = $('<a>Read More</a>').attr('href',
										'?page=read&id=' + (articleID + 1)
								).css('margin-left','5px'),
								$eccArticleContent = $('<span></span>').append( 
										$(this).find('content').text() 
								), 
								eccArticleAuthor = $(this).find('author').text(),
								eccArticleDate = $(this).find('date').text(), 
								eccArticleTitle = $(this).find('title').text();

								$eccArticleTemplate = $eccArticleTemplateMaster.clone();

								if ( eccArticleCharLimit !== false ) { 
									if ( $eccArticleContent.text().length > (eccArticleCharLimit - 2)) {
										$eccArticleContent.text(
												$eccArticleContent.text().substr(0,(eccArticleCharLimit-2)) + '..'
										);
									}
								}

								$eccArticleTemplate.find(
										'.eccArticleContent'
								).empty().append($eccArticleContent).after($eccArticleLink);

								$eccArticleTemplate.find('.eccArticleTitle').text( eccArticleTitle );
								$eccArticleTemplate.find('.eccArticleDate').text( eccArticleDate );
								$eccArticleTemplate.find('.eccArticleAuthor').text( eccArticleAuthor ); 

								$eccArticleArea.append( $eccArticleTemplate ); 
							});

						});
					});
				}
			});
		}
	}( window.ecc = window.ecc || {}, jQuery ));

	ecc.process();
});