<?php


//remove initial header functions
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'entrenamiento_header_markup_open', 5 );
add_action( 'genesis_header', 'entrenamiento_header_markup_close', 15 );
add_action( 'genesis_header', 'entrenamiento_do_header' );
//New Header functions
function entrenamiento_header_markup_open() {
	//	search box
	do_action('mobile_menu');
	get_template_part('searchform');
    genesis_markup( array(
        'html5'   => '<header %s>',
        'context' => 'site-header',
    ) );
    // Added in content

    genesis_structural_wrap( 'header' );
}
function entrenamiento_header_markup_close() {
    genesis_structural_wrap( 'header', 'close' );

    genesis_markup( array(
        'close'   => '</header>',
        'context' => 'site-header',
    ) );
}
function entrenamiento_do_header() {
    global $wp_registered_sidebars;

	echo <<<HTML
	<div class="menu-sec">
		<div class="menu-container container">
			<div class="left-sec">
            <p id="trigger">
              <i class="fa fa-bars bar-icon" aria-hidden="true"></i>
            </p>
            <p id="trigger2">
              <i class="fa fa-bars bar-icon" aria-hidden="true"></i>
            </p>
HTML;
    genesis_markup( array(
        'open'    => '<div %s>',
        'context' => 'title-area',
    ) );
    do_action( 'genesis_site_title' );
    do_action( 'genesis_site_description' );

    genesis_markup( array(
        'close'    => '</div>',
        'context' => 'title-area',
    ));
	do_action( 'main_nav' );
	echo <<<HTML
			</div >
		
           
HTML;
//    if (( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
//        genesis_markup( array(
//            'open'    => '<div %s>' . genesis_sidebar_title( 'header-right' ),
//            'context' => 'header-widget-area',
//        ) );
//        do_action( 'genesis_header_right' );
//        add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
//        add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
//        dynamic_sidebar( 'header-right' );
//        remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
//        remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
//        genesis_markup( array(
//            'close'   => '</div>',
//            'context' => 'header-widget-area',
//        ) );
//    }
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'right-sec',
	) );

	do_action('second_nav');

	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'right-sec',
	));
	echo <<<HTML
			
		</div >
	</div >
           
HTML;

}

	add_action( 'main_nav', 'entrenamiento_do_nav' );
	/**
	 * Echo the "Primary Navigation" menu.
	 *
	 * Applies the `genesis_do_nav` filter.
	 *
	 * @since 1.0.0
	 */
	function entrenamiento_do_nav() {

		// Do nothing if menu not supported.
		if ( ! genesis_nav_menu_supported( 'primary' ) || ! has_nav_menu( 'primary' ) ) {
			return;
		}

		$class = 'nav';
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_class'     => $class,
			)
		);

	}
	add_action( 'second_nav', 'entrenamiento_do_subnav' );
	/**
	 * Echo the "Secondary Navigation" menu.
	 *
	 * Applies the `genesis_do_subnav` filter.
	 *
	 * @since 1.0.0
	 */
	function entrenamiento_do_subnav() {

		// Do nothing if menu not supported.
		if ( ! genesis_nav_menu_supported( 'secondary' ) ) {
			return;
		}

		$class = 'nav';
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu(
			array(
				'theme_location' => 'secondary',
				'menu_class'     => $class,
			)
		);

	}

add_action( 'genesis_before_header', 'entrenamiento_do_menu3' );

	function entrenamiento_do_menu3() {

	// Do nothing if menu not supported.
	if ( ! genesis_nav_menu_supported( 'menu3' ) || ! has_nav_menu( 'menu3' )) {
		return;
	}

	$class = 'sidepanel-menu';
	if ( genesis_superfish_enabled() ) {
		$class .= ' js-superfish';
	}

	genesis_nav_menu(
		array(
			'theme_location' => 'menu3',
			'menu_class'     => $class,
		)
	);

}
add_action( 'mobile_menu', 'entrenamiento_do_menu4' );

	function entrenamiento_do_menu4() {

		// Do nothing if menu not supported.
		if ( ! genesis_nav_menu_supported( 'menu4' ) || ! has_nav_menu( 'menu4' )) {
			return;
		}

		$class = 'sidepanel-menu-mobile';
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu(
			array(
				'theme_location' => 'menu4',
				'menu_class'     => $class,
			)
		);

	}

