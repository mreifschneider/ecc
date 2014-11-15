var ecc_postLoad = null; 

$(document).ready(function () {

	(function( ecc, $, undefined ) { 
		ecc.academics = {
				'majorList':[], 'getMajorList':function() {
					return $.getJSON('index.php?cmd=academics&do=major_list').done(function(data){
						ecc.academics.majorList = data;
					});
				}	
		},
		ecc.articles = {
				'homePageCharLimit':300,				
				'list':[], 'getList':function() {
					return $.getJSON('index.php?cmd=articles&do=list').done(function(data){
						ecc.articles.list = data;
					});
				}
		},
		ecc.user = {
				'details': { 'role': null },
				'loggedIn':false,
				'name':'',
				'checkLogin':function() {
					return $.getJSON('index.php?cmd=users&do=check_login').done(function(loginData){
						console.log(JSON.stringify(loginData));
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
				'makeNavbarMenu':function() {
					if (ecc.user.loggedIn === true) {
						$('#eccNavLoginDiv').hide(); 
						$('#eccNavLogin').hide();
						$('#eccNavUser').show().find('#eccNavLoggedInName').text(ecc.user.name);
					}
				}
		}
	}( window.ecc = window.ecc || {}, jQuery ));

	ecc.user.checkLogin().done(function(){
		ecc.user.makeNavbarMenu();
	});

	$('#eccNavLoginLink').on('click',function(event) {
		event.preventDefault();
		$('#eccNavLoginDiv').slideToggle(100);
	});

	$('#eccNavLoginForm').on('submit',function(event) {
		event.preventDefault();
		ecc.user.login().done(function(data) {  
			if ((data != null) && (data.hasOwnProperty('result') === true)) {
				if (data.result === 'success') {
					ecc.user.checkLogin().done(function(){
						ecc.user.makeNavbarMenu();
					});
				}
				else if (data.result == 'failure') {
					$('#eccNavLoginStatus').text('Invalid email/password combination.  ');
					$('#eccNavLoginForm').trigger('reset');
				}
			}
		});
	});

	ecc.academics.getMajorList().done(function() {
		console.log(JSON.stringify(ecc.academics.majorList));
	});

	if (typeof ecc_postLoad === 'function') { 
		ecc_postLoad();
	}
});
