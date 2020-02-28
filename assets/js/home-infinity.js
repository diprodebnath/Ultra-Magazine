
(function($){
	$('.main-sec .container').infiniteScroll({

		// options
		path: '.pagination-next a',
		append: '.article-feed',
		status: '.scroller-status',
		hideNav: '.pagination',

	});

})(window.jQuery);