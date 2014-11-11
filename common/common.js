$(document).ready(function () {

	(function( ecc, $, undefined ) { 
		ecc.academics = {
				'majorList':[], 'getMajorList':function(){
					return $.getJSON('index.php?cmd=academics&do=major_list').done(function(data){
						ecc.academics.majorList = data;
					});
				}	
		},
		ecc.articles = { 
				'list':[], 'getList':function(){
					return $.getJSON('index.php?cmd=articles&do=list').done(function(data){
						ecc.articles.list = data;
					});
				}
		},
		ecc.user = {
				'loggedIn':false,
				'name':'',

				'checkLogin':function() {
					return $.getJSON('index.php?cmd=users&do=check_login').done(function(loginData){

						if ((loginData !== null) && (loginData.hasOwnProperty('result') === true)) {
							if (loginData.result !== 'success') {
								return $.Deferred();
							}
							ecc.user.loggedIn = true;
							ecc.user.name = loginData.name;
						}
					});
				},
				'login':function() {
					return $.post('index.php?cmd=users&do=login', 
							{ 'eccUserEmail':$('#eccUserEmail').val(),
						'eccUserPassword':$('#eccUserPassword').val() },
						null, 'json'
					);

				},
				'makeNavbarMenu':function(){
					if (ecc.user.loggedIn === true) {
						$('#eccNavLoginDiv').hide();
						$('#eccNavLoggedInName').text(ecc.user.name).show(); 
						$('#eccLoginLink').hide();
					}
				}
		}
	}( window.ecc = window.ecc || {}, jQuery ));

	ecc.user.checkLogin().done(function(){
		ecc.user.makeNavbarMenu();
	});

	$('#eccLoginLink').on('click',function(event) {
		event.preventDefault();
		$('#eccNavLoginDiv').slideToggle(100);
	});

	$('#eccNavLoginForm').on('submit',function(event) {
		event.preventDefault();
		ecc.user.login().done(function(data) {
			if ((data != null) && (data.hasOwnProperty('result') === true)) {
				ecc.user.name = data.name;
				ecc.user.makeNavbarMenu();
			}
		});
	});
	
	ecc.academics.getMajorList().done(function(){
		console.log(JSON.stringify(ecc.academics.majorList));
	});

	ecc.articles.getList().done(function(){

		var $articleTemplate = $(
				'<div class="eccArticle"><h2 class="eccArticleTopic"></h2><p class="eccArticleData"></p>\
				<hr/><div class="eccArticleContent"></div></div>'
		);

		$.each(ecc.articles.list,function(articleIndex,articleObj){
			var $article = $articleTemplate.clone();
			$article.find('.eccArticleTopic').append(articleObj.Topic);
			$article.find('.eccArticleContent').append(articleObj.Content);
			$("#eccArticleArea").append($article);
		});
	});


});
