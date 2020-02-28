<?php

add_theme_support(
    'genesis-menus', array(
        'primary'   => __( 'Left-side Menu', 'entrenamiento' ),
        'secondary' => __( 'Right side Menu', 'entrenamiento' ),
        'menu3' => __( 'Side Menu', 'entrenamiento' ),
        'menu4' => __( 'Mobile Menu', 'entrenamiento' ),
        'menu5' => __( 'Footer Menu', 'entrenamiento' ),

    )
);

//add_action( 'genesis_header', 'entrenamiento_custom_do_nav', 12 );
/**
 * Echoes the "Custom Navigation" menu.
 */
//function entrenamiento_custom_do_nav() {
//
//    // Do nothing if menu not supported.
//    if ( ! genesis_nav_menu_supported( 'menu3' ) || ! has_nav_menu( 'menu3' ) ) {
//        return;
//    }
//    if ( ! genesis_nav_menu_supported( 'menu4' ) || ! has_nav_menu( 'menu4' ) ) {
//        return;
//    }
//	if ( ! genesis_nav_menu_supported( 'menu5' ) || ! has_nav_menu( 'menu5' ) ) {
//		return;
//	}
//
//
//    $class = 'custom';
//    if ( genesis_superfish_enabled() ) {
//        $class .= ' js-superfish';
//    }
//
//    genesis_nav_menu( array(
//        'theme_location' => 'menu3',
//        'menu_class'     => $class,
//    ) );
//    genesis_nav_menu( array(
//        'theme_location' => 'menu4',
//        'menu_class'     => $class,
//    ) );
//	genesis_nav_menu( array(
//		'theme_location' => 'menu5',
//		'menu_class'     => $class,
//	) );
//
//}

// Add typical attributes for navigation elements.
add_filter( 'genesis_attr_nav-custom', 'genesis_attributes_nav' );

add_filter( 'genesis_attr_nav-custom', 'entrenamiento_skiplinks_attr_nav_custom' );
/**
 * Adds ID markup to custom navigation.
 *
 * @param array $attributes Existing attributes for custom navigation element.
 * @return array Amended attributes for custom navigation element.
 */
function entrenamiento_skiplinks_attr_nav_custom( $attributes ) {

    $attributes['id'] = 'menu-3';
    $attributes['id'] = 'menu-4';
    $attributes['id'] = 'menu-5';

    return $attributes;

}

add_filter( 'genesis_skip_links_output', 'entrenamiento_skip_links_output' );
/**
 * Adds skip link for custom navigation.
 *
 * @param array $links Exiting skiplinks.
 * @return array Amended skiplinks.
 */
function entrenamiento_skip_links_output( $links ) {

    if ( genesis_nav_menu_supported( 'menu3' ) && has_nav_menu( 'menu3' ) ) {
        $links['menu-3'] = __( 'Skip to menu3 navigation', 'genesis' );
    }
    if ( genesis_nav_menu_supported( 'menu4' ) && has_nav_menu( 'menu4' ) ) {
        $links['menu-4'] = __( 'Skip to menu4 navigation', 'genesis' );
    }
	if ( genesis_nav_menu_supported( 'menu5' ) && has_nav_menu( 'menu5' ) ) {
		$links['menu-5'] = __( 'Skip to menu5 navigation', 'genesis' );
	}

    return $links;

}


	add_action( 'genesis_footer', 'entrenamiento_do_menu5', 9 );

	function entrenamiento_do_menu5() {

		// Do nothing if menu not supported.
		if ( ! genesis_nav_menu_supported( 'menu5' ) || ! has_nav_menu( 'menu5' )) {
			return;
		}

		$class = 'footer-menu';
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}

		genesis_nav_menu(
			array(
				'theme_location' => 'menu5',
				'menu_class'     => $class,
			)
		);

	}

	add_filter('wp_nav_menu_items', 'entrenamiento_add_search_form', 10, 2);

	// Display search icon in menus and toggle search form
	function entrenamiento_add_search_form($items, $args) {
		if( $args->theme_location == 'secondary' )
			$items .= <<<HTML
				<li class="search">
					<a class="search_icon" id="nav-search">
					<span class="fa fa-search"></span>
					</a>
				</li>
HTML;
		return $items;
	}