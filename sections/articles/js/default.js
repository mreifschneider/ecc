ecc.articles.getList().done(function() {
	alert('hi');
	var $articleTemplate = $("#eccArticleArea").clone();
	$("#eccArticleArea").empty();
	$.each(ecc.articles.list, function(articleIndex, articleObj) {
		if (articleObj.CategoryID != 1) { 
			return 'non-false';
		}
		var $article = $articleTemplate;
		$article.find('.eccArticleTopic').append(articleObj.Topic);
		$article.find('.eccArticleContent').append(articleObj.Content);
		$article.find('.eccArticleDate').append(articleObj.Date);
		$("#eccArticleArea").append($article);
	});
});