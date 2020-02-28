
(function($){
    $(function() {
        if(window.innerWidth <= 480 ){

            slider2 = $("#sidepanel2").slideReveal({
                width: "100%",
                push: false,
                position: "left",
                speed: 600
                // autoEscape: false,
            });

	        $("#close2").click(function() {
		        slider2.slideReveal("hide");
	        });
	        $("#trigger2").click(function() {
		        slider2.slideReveal("toggle").css('display', 'block');
	        });


        }
	        slider = $("#sidepanel").slideReveal({
		        width: "20%",
		        // push: false,
		        position: "left",
		        speed: 600
		        // autoEscape: false,
	        });


	        $("#close").click(function () {
		        slider.slideReveal("hide");
	        });
	        $("#trigger").click(function () {
		        slider.slideReveal("toggle").css('display', 'block');
	        });

	        $(".has-children").click(function () {
		        $(this).toggleClass("has-children-active");
	        });

    });

    $('.site-description').css("display", "none");

    $('nav.nav-primary').find(".wrap").addClass("left-menu");
    $('nav.nav-secondary').find(".wrap").addClass("right-menu");

    $('nav.nav-menu3').addClass("slider").attr('id', 'sidepanel').
    attr('itemtype', 'https://schema.org/SiteNavigationElement');

	$('nav.nav-menu4').addClass("slider").attr('id', 'sidepanel2').
	attr('itemtype', 'https://schema.org/SiteNavigationElement');

	$('p.site-title:not(span) ').css({'line-height': '1.3', 'margin-top': '0.2rem'	});

    $('.sidepanel-menu').find('li').addClass('sidepanel-item');
	$('.sidepanel-menu-mobile').find('li').addClass('sidepanel-item');

		const button = `<button id="close"><i class="fa fa-close"></i></button>
                  <div class="sidepanel-menu sidepanel-menu-search">
                    <a class="nav-search-button" id="search" href="#" title="Search">
                      <span class="fa fa-search"></span> <span>Search</span>
                    </a>
                  </div>`;

	const button2= `<button id="close2"><i class="fa fa-close"></i></button>
                  <div class="sidepanel-menu sidepanel-menu-search">
                    <a class="nav-search-button" id="search" href="#" title="Search">
                      <span class="fa fa-search"></span> <span>Search</span>
                    </a>
                  </div>`;

    $(button).insertBefore( ".sidepanel-menu" );
    $(button2).insertBefore( ".sidepanel-menu-mobile" );


    $('.sidepanel-item:has(ul) ').addClass('has-children').find('ul').addClass('sidepanel-submenu');

    // search bar
	$('#search').click( function(){
		$('.search-overlay').addClass('search-overlay-active');
	});
	$('#nav-search').click( function(){
		$('.search-overlay').addClass('search-overlay-active');
	});
	$('.search-overlay-close-button').click( function(){
		$('.search-overlay').removeClass('search-overlay-active');
	});

	// widgets area


	let front_page_1_widget = document.querySelector('.front-page-1-widget');
	if(front_page_1_widget){
		if(front_page_1_widget.className === "front-page-1-widget"){
			let widgets_articles = document.querySelectorAll('.front-page-1-widget article');
			let insertElement = document.querySelectorAll(".front-page-1-widget article .entry-header .entry-title");
			for(let i= 0; i <= widgets_articles.length; i++ ){
				let j = i;
				j +=1;
				let Number = "<p class='widget-title-number'>" + j + "</p>";

				$(Number).insertBefore( insertElement[i] );
			}
		}
}

})(window.jQuery);
