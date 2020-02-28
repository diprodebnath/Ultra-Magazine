//search page
(function($){
$('.main-sec .container .row').infiniteScroll({

	// options
	path: '.pagination-next a',
	append: '.article',
	history: true,
	status: '.scroller-status',
	hideNav: '.pagination',

});

})(window.jQuery);